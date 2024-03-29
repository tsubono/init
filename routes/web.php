<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['check.maintenance'])->namespace('App\Http\Controllers')->group(function () {
    /**
     * フロント
     */
    // TOP
    Route::get('/', 'TopController@index')->name('top');
    // レッスン検索・詳細
    Route::get('/lessons', 'LessonController@index')->name('lessons.index');
    Route::get('/lessons/{lesson}', 'LessonController@show')->name('lessons.show');
    // 講師検索・詳細
    Route::get('/advisers', 'AdviserController@index')->name('advisers.index');
    Route::get('/advisers/{adviserUser}', 'AdviserController@show')->name('advisers.show');
    // お問い合わせフォーム・送信
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::post('/contact/send', 'ContactController@send')->name('contact.send');

    /**
     * Auth 共通
     */
    Route::middleware(['auth.common'])->group(function () {
        // 受講アクション関連
        Route::get('/attendances', 'AttendanceController@index')->name('attendances.index');
        Route::get('/attendances/{attendance}', 'AttendanceController@show')->name('attendances.show');
        Route::post('/attendances/request/{lesson}', 'AttendanceController@request')->name('attendances.request');
        Route::post('/attendances/{attendance}/cancel-request', 'AttendanceController@cancelRequest')->name('attendances.cancel-request');
        Route::post('/attendances/{attendance}/approval', 'AttendanceController@approval')->name('attendances.approval');
        Route::post('/attendances/{attendance}/reject', 'AttendanceController@reject')->name('attendances.reject');
        // メッセージ関連
        Route::get('/attendances/{attendance}/messages', 'AttendanceMessageController@messages')->name('attendances.messages');
        Route::post('/attendances/{attendance}/send-message', 'AttendanceMessageController@sendMessage')->name('attendances.send-message');
        Route::get('/attendances/{attendance}/download/{attendanceMessage}/{fileIndex}', 'AttendanceMessageController@downloadMessageFile')->name('attendances.download');
        // レビュー関連
        Route::get('/attendances/{attendance}/review', 'AttendanceReviewController@reviewForm')->name('attendances.review-form');
        Route::post('/attendances/{attendance}/review', 'AttendanceReviewController@review')->name('attendances.review');
        Route::post('/attendances/{attendance}/cancel', 'AttendanceController@cancel')->name('attendances.cancel');
        Route::post('/attendances/{attendance}/report', 'AttendanceController@report')->name('attendances.report');
        Route::post('/attendances/{attendance}/close', 'AttendanceController@close')->name('attendances.close');
        // 受講関連通知
        Route::get('/attendance-notifications', 'AttendanceNotificationController@index')->name('attendance-notifications.index');
        Route::post('/attendance-notifications/{notification}/read', 'AttendanceNotificationController@readNotification')->name('attendance-notifications.read');
        Route::post('/attendance-notifications/read-all', 'AttendanceNotificationController@readAllNotification')->name('attendance-notifications.read-all');
        // 運営からのお知らせ
        Route::get('/infos', 'InfoController@index')->name('infos.index');
        Route::get('/infos/{information}', 'InfoController@show')->name('infos.show');
        Route::post('/infos/notifications/{notification}/read', 'InfoController@readNotification')->name('info.notifications.read');
        Route::post('/infos/notifications/read-all', 'InfoController@readAllNotification')->name('info.notifications.read-all');
    });

    /**
     * 講師 Group
     */
    Route::prefix('adviser')->as('adviser.')->namespace('Adviser')->group(function () {
        Auth::routes(['verify' => true]);
        Route::get('/register/complete', function () { return view('adviser.auth.register-complete'); })->name('register.complete');

        Route::middleware(['auth.adviser', 'verified.adviser'])->group(function () {
            // プロフィール
            Route::get('/profile/basic', 'ProfileController@editBasic')->name('profile.edit');
            Route::post('/profile/basic', 'ProfileController@updateBasic')->name('profile.update');
            Route::get('/profile/teach', 'ProfileController@editTeach')->name('profile.edit.teach');
            Route::post('/profile/teach', 'ProfileController@updateTeach')->name('profile.update.teach');
            Route::get('/profile/password', 'ProfileController@editPassword')->name('profile.edit.password');
            Route::post('/profile/password', 'ProfileController@updatePassword')->name('profile.update.password');
            Route::get('/profile/personal', 'ProfileController@editPersonal')->name('profile.edit.personal');
            Route::post('/profile/personal', 'ProfileController@updatePersonal')->name('profile.update.personal');
            Route::post('/profile/withdrawal', 'ProfileController@withdrawal')->name('profile.withdrawal');
            // レッスン管理
            Route::resource('/lessons', 'LessonController')->except(['show']);
            // 売上管理
            Route::get('/sales', 'SaleController@index')->name('sales.index');
            Route::post('/sales/request', 'SaleController@request')->name('sales.request');
        });
    });

    /**
     * 受講者 Group
     */
    Route::prefix('mate')->as('mate.')->namespace('Mate')->group(function () {
        Auth::routes(['verify' => true]);
        Route::get('/register/complete', function () { return view('mate.auth.register-complete'); })->name('register.complete');

        Route::middleware(['auth.mate', 'verified.mate'])->group(function () {
            // プロフィール
            Route::get('/profile/basic', 'ProfileController@editBasic')->name('profile.edit');
            Route::post('/profile/basic', 'ProfileController@updateBasic')->name('profile.update');
            Route::get('/profile/learn', 'ProfileController@editLearn')->name('profile.edit.learn');
            Route::post('/profile/learn', 'ProfileController@updateLearn')->name('profile.update.learn');
            Route::get('/profile/password', 'ProfileController@editPassword')->name('profile.edit.password');
            Route::post('/profile/password', 'ProfileController@updatePassword')->name('profile.update.password');
            Route::get('/profile/notice', 'ProfileController@editNotice')->name('profile.edit.notice');
            Route::post('/profile/notice', 'ProfileController@updateNotice')->name('profile.update.notice');
            Route::post('/profile/withdrawal', 'ProfileController@withdrawal')->name('profile.withdrawal');
            // コイン管理
            Route::get('/coins', 'CoinController@index')->name('coins.index');
            Route::get('/coins/buy', 'CoinController@buy')->name('coins.buy');
            Route::post('/coins/payment-by-payjp', 'CoinController@paymentByPayJp')->name('coins.payment-by-payjp');
        });
    });

    /**
     * Admin Group
     */
    Route::prefix('admin')->as('admin.')->namespace('Admin')->group(function () {
        Auth::routes(['register' => false]);

        Route::middleware('auth.admin')->group(function () {
            // 講師管理
            Route::get('/advisers', 'AdviserController@index')->name('advisers.index');
            Route::post('/advisers/export-csv', 'AdviserController@exportCsv')->name('advisers.export-csv');
            Route::get('/advisers/{adviserUser}', 'AdviserController@show')->name('advisers.show');
            Route::post('/advisers/{adviserUser}', 'AdviserController@update')->name('advisers.update');
            // 受講者管理
            Route::get('/mates', 'MateController@index')->name('mates.index');
            Route::post('/mates/export-csv', 'MateController@exportCsv')->name('mates.export-csv');
            Route::get('/mates/{mateUser}', 'MateController@show')->name('mates.show');
            Route::post('/mates/{mateUser}', 'MateController@update')->name('mates.update');
            // コイン管理
            Route::get('/coins', 'CoinController@index')->name('coins.index');
            Route::get('/coins/{coin}', 'CoinController@show')->name('coins.show');
            Route::post('/coins/export-csv', 'CoinController@exportCsv')->name('coins.export-csv');
            // 受講管理
            Route::get('/attendances', 'AttendanceController@index')->name('attendances.index');
            // 詳細は共通のページを使用する
            // Route::get('/attendances/{attendance}', 'AttendanceController@show')->name('attendances.show');
            // 振り込み申請管理
            Route::get('/transfer-requests', 'TransferRequestController@index')->name('transfer-requests.index');
            Route::post('/transfer-requests/{transferRequest}/update-status', 'TransferRequestController@updateStatus')->name('transfer-requests.update-status');
            // お知らせ管理
            Route::resource('/infos', 'InfoController')->except(['show']);
            // お知らせ配信管理
            Route::resource('/info-mails', 'InfoMailController')->except(['show']);
            // サイト設定
            Route::get('/setting', 'SettingController@index')->name('setting.index');
            Route::post('/setting/{setting}', 'SettingController@update')->name('setting.update');
        });
    });

    /**
     * 固定ページ
     */
    Route::get('/about', function () { return view('about'); })->name('about');
    Route::get('/team', function () { return view('team'); })->name('team');
    Route::get('/tradelaw', function () { return view('tradelaw'); })->name('tradelaw');
    Route::get('/privacy', function () { return view('privacy'); })->name('privacy');
    Route::get('/cancel-policy', function () { return view('cancel-policy'); })->name('cancel-policy');
    Route::get('/mate-terms', function () { return view('mate-terms'); })->name('mate-terms');
    Route::get('/adviser-terms', function () { return view('adviser-terms'); })->name('adviser-terms');
    Route::get('/withdrawal', function () { return view('withdrawal'); })->name('withdrawal');
    Route::get('/intellectual-property', function () { return view('intellectual-property'); })->name('intellectual-property');
    Route::get('/tax-payment', function () { return view('tax-payment'); })->name('tax-payment');

    // 言語切り替え
    Route::get('/language/switch/{language}','LanguageController@switch')->name('language.switch');
});