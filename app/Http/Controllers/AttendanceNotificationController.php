<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class AttendanceNotificationController extends Controller
{
    /**
     * 通知一覧
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        // ログインユーザー取得
        $user = auth()->guard('adviser')->check() ? auth()->guard('adviser')->user() : auth()->guard('mate')->user();
        $page =  $request->get('page', 1);

        $attendanceNotifications = $user->attendanceNotifications()
            ->paginate(20, ['*'], 'page', $page);

        return view('attendance-notifications.index', compact('attendanceNotifications'));
    }

    /**
     * 通知を既読にする
     *
     * @param DatabaseNotification $notification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function readNotification(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return redirect($notification->data['url']);
    }

    /**
     * 全通知を既読にする
     *
     * @param DatabaseNotification $notification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function readAllNotification(DatabaseNotification $notification)
    {
        // ログインユーザー取得
        $user = auth()->guard('adviser')->check() ? auth()->guard('adviser')->user() : auth()->guard('mate')->user();

        $user->unreadAttendanceNotifications()->get()->markAsRead();

        return redirect(route('attendance-notifications.index'));
    }
}
