<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Repositories\Information\InformationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class InfoController extends Controller
{
    private InformationRepositoryInterface $informationRepository;

    /**
     * InfoController constructor.
     * @param InformationRepositoryInterface $informationRepository
     */
    public function __construct(InformationRepositoryInterface $informationRepository)
    {
        $this->informationRepository = $informationRepository;
    }

    /**
     * お知らせ一覧
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        // ログインユーザー取得
        $user = auth()->guard('adviser')->check() ? auth()->guard('adviser')->user() : auth()->guard('mate')->user();
        $page =  $request->get('page', 1);

        // 押下時に既読処理をしたいため、informationsテーブルではなくnotificationsテーブルから取得する
        $infoNotifications = $user->infoNotifications()
            ->paginate(20, ['*'], 'page', $page);

        return view('infos.index', compact('infoNotifications'));
    }

    /**
     * お知らせ詳細
     *
     * @param Information $information
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Information $information)
    {
        return view('infos.show', compact('information'));
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

        $user->unreadInfoNotifications()->get()->markAsRead();

        return redirect(route('infos.index'));
    }
}
