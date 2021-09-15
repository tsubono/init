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
/**
 * フロント
 */
Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/', 'TopController@index')->name('top');
    Route::get('/lessons', 'LessonController@index')->name('lessons.index');
    Route::get('/lessons/{lesson}', 'LessonController@show')->name('lessons.show');
    Route::get('/advisers', 'AdviserController@index')->name('advisers.index');
    Route::get('/advisers/{adviserUser}', 'AdviserController@show')->name('advisers.show');
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::post('/contact/send', 'ContactController@send')->name('contact.send');
});

/**
 * Auth 共通
 */
Route::middleware(['auth.common'])->namespace('App\Http\Controllers')->group(function () {
    Route::get('/attendances', 'AttendanceController@index')->name('attendances.index');
    Route::get('/attendances/{attendance}', 'AttendanceController@show')->name('attendances.show');
    Route::post('/attendances/request/{lesson}', 'AttendanceController@request')->name('attendances.request');
    Route::post('/attendances/{attendance}/cancel-request', 'AttendanceController@cancelRequest')->name('attendances.cancel-request');
    Route::post('/attendances/{attendance}/approval', 'AttendanceController@approval')->name('attendances.approval');
    Route::post('/attendances/{attendance}/reject', 'AttendanceController@reject')->name('attendances.reject');
    Route::get('/attendances/{attendance}/messages', 'AttendanceController@messages')->name('attendances.messages');
    Route::post('/attendances/{attendance}/send-message', 'AttendanceController@sendMessage')->name('attendances.send-message');
    Route::get('/attendances/{attendance}/download/{attendanceMessage}/{fileIndex}', 'AttendanceController@downloadMessageFile')->name('attendances.download');
    Route::get('/attendances/{attendance}/review', 'AttendanceController@reviewForm')->name('attendances.review-form');
    Route::post('/attendances/{attendance}/review', 'AttendanceController@review')->name('attendances.review');
    Route::post('/attendances/{attendance}/cancel', 'AttendanceController@cancel')->name('attendances.cancel');
    Route::post('/attendances/{attendance}/report', 'AttendanceController@report')->name('attendances.report');
    Route::post('/attendances/{attendance}/close', 'AttendanceController@close')->name('attendances.close');
    Route::get('/infos', 'InfoController@index')->name('infos.index');
    Route::get('/infos/{information}', 'InfoController@show')->name('infos.show');
});

/**
 * アドバイザー Group
 */
Route::prefix('adviser')->as('adviser.')->namespace('App\Http\Controllers\Adviser')->group(function () {
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
 * メイト Group
 */
Route::prefix('mate')->as('mate.')->namespace('App\Http\Controllers\Mate')->group(function () {
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
Route::prefix('admin')->as('admin.')->namespace('App\Http\Controllers\Admin')->group(function () {
    Auth::routes(['register' => false]);

    Route::middleware('auth.admin')->group(function () {
        // アドバイザー管理
        Route::get('/advisers', 'AdviserController@index')->name('advisers.index');
        Route::get('/advisers/{adviser}', 'AdviserController@show')->name('advisers.show');
        Route::post('/advisers/{adviser}', 'AdviserController@update')->name('advisers.update');
        Route::post('/advisers/export-csv', 'AdviserController@exportCsv')->name('advisers.export-csv');
        // メイト管理
        Route::get('/mates', 'MateController@index')->name('mates.index');
        Route::get('/mates/{mate}', 'MateController@show')->name('mates.show');
        Route::post('/mates/{mate}', 'MateController@update')->name('mates.update');
        Route::post('/mates/export-csv', 'MateController@exportCsv')->name('mates.export-csv');
        // コイン管理
        Route::get('/coins', 'CoinController@index')->name('coins.index');
        Route::get('/coins/{coin}', 'CoinController@show')->name('coins.show');
        Route::post('/coins/export-csv', 'CoinController@exportCsv')->name('coins.export-csv');
        // 受講管理
        Route::get('/attendances', 'AttendanceController@index')->name('attendances.index');
        Route::get('/attendances/{attendance}', 'AttendanceController@show')->name('attendances.show');
        // 振り込み申請管理
        Route::get('/transfer-requests', 'TransferRequestController@index')->name('transfer-requests.index');
        Route::post('/transfer-requests/{attendance}/update-status', 'TransferRequestController@updateStatus')->name('transfer-requests.update-status');
        // お知らせ管理
        Route::resource('/infos', 'InfoController')->except(['show']);
        // お知らせ配信管理
        Route::resource('/info-mails', 'InfoMailController')->except(['show']);
        // サイト設定
        Route::get('/setting', 'SettingController@index')->name('setting.index');
        Route::post('/setting', 'SettingController@update')->name('setting.update');
    });
});

/**
 * 固定ページ
 */
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/team', function () { return view('team'); })->name('team');
Route::get('/tradelaw', function () { return view('tradelaw'); })->name('tradelaw');
Route::get('/privacy', function () { return view('privacy'); })->name('privacy');
Route::get('/cancel-policy-adviser', function () { return view('cancel-policy-adviser'); })->name('cancel-policy-adviser');
Route::get('/cancel-policy-mate', function () { return view('cancel-policy-mate'); })->name('cancel-policy-mate');
Route::get('/mate-terms', function () { return view('mate-terms'); })->name('mate-terms');
Route::get('/adviser-terms', function () { return view('adviser-terms'); })->name('adviser-terms');
Route::get('/withdrawal', function () { return view('withdrawal'); })->name('withdrawal');
