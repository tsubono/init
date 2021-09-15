<header>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{ asset('img/brand-white.svg') }}" alt="INIT"></a>
            <!-- タブレット・スマホ用ヘッダーボタン -->
            <div class="d-flex align-items-center">
                <div class="d-lg-none mx-2">
                    <!-- TODO -->
                    <a tabindex="0" data-bs-toggle="notification-popover" data-bs-trigger="focus" class="p-notification-icon p-notification-icon--has-items">
                        <img src="{{ asset('img/notification.svg') }}" alt="お知らせ">
                    </a>
                </div>
                <button type="button" class="navbar-toggler mypage-toggler" data-bs-toggle="collapse" data-bs-target="#Navber2" aria-controls="Navber2" aria-expanded="false" aria-label="ナビゲーション切替">
                    <span class="navbar-toggler-icon mypage-icon"></span>
                </button>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーション切替">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!-- /タブレット・スマホ用ヘッダーボタン -->
            <!-- メニュー一覧 -->
            <div class="collapse navbar-collapse" id="Navber">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"><a href="{{ route('top') }}">ホーム</a></li>
                    <li class="nav-link {{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">はじめての方</a></li>
                    <li class="nav-link {{ request()->is('lessons', 'lessons/*') ? 'active' : '' }}"><a href="{{ route('lessons.index') }}">レッスン検索</a></li>
                    <li class="nav-link {{ request()->is('advisers', 'advisers/*') ? 'active' : '' }}"><a href="{{ route('advisers.index') }}">アドバイザー検索</a></li>
                    @if (auth()->guard('mate')->check())
                        <li class="nav-link nav-link__login">
                            <a onclick="document.getElementById('logoutForm').submit()">ログアウト</a>
                            <form action="{{ route('mate.logout') }}" id="logoutForm" method="post">@csrf</form>
                        </li>
                    @elseif (auth()->guard('adviser')->check())
                        <li class="nav-link nav-link__login">
                            <a onclick="document.getElementById('logoutForm').submit()">ログアウト</a>
                            <form action="{{ route('adviser.logout') }}" id="logoutForm" method="post">@csrf</form>
                        </li>
                    @elseif (auth()->guard('admin')->check())
                        <li class="nav-link nav-link__login">
                            <a onclick="document.getElementById('logoutForm').submit()">ログアウト</a>
                            <form action="{{ route('admin.logout') }}" id="logoutForm" method="post">@csrf</form>
                        </li>
                    @else
                        <li class="nav-link nav-link__login {{ request()->is('mate/login', 'adviser/login') ? 'active' : '' }}"><a href="{{ route('mate.login') }}">ログイン</a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
            <!-- /メニュー一覧 -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- メニュー一覧 (ログイン後のみ) -->
    @if (auth()->guard('mate')->check() || auth()->guard('adviser')->check() || auth()->guard('admin')->check())
        <nav class="navbar navbar-expand-md navbar-light sub-menu">
            <div class="collapse navbar-collapse" id="Navber2">
                <ul class="navbar-nav">
                    @if (auth()->guard('mate')->check())
                        <li class="mx-3 d-none d-lg-block">
                            <!-- TODO -->
                            <a tabindex="0" data-bs-toggle="notification-popover" data-bs-trigger="focus" class="p-notification-icon p-notification-icon--has-items">
                                <img src="{{ asset('img/notification.svg') }}" alt="お知らせ">
                            </a>
                        </li>
                        <li class="nav-link {{ request()->is('mate/profile/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('mate.profile.edit') }}">プロフィール</a></li>
                        <li class="nav-link {{ request()->is('attendances', 'attendances/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('attendances.index') }}">受講一覧</a></li>
                        <li class="nav-link {{ request()->is('mate/coins', 'mate/coins/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('mate.coins.index') }}">コイン管理</a></li>
                    @elseif (auth()->guard('adviser')->check())
                        <li class="mx-3 d-none d-lg-block">
                            <!-- TODO -->
                            <a tabindex="0" data-bs-toggle="notification-popover" data-bs-trigger="focus" class="p-notification-icon p-notification-icon--has-items">
                                <img src="{{ asset('img/notification.svg') }}" alt="お知らせ">
                            </a>
                        </li>
                        <li class="nav-link {{ request()->is('adviser/profile/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('adviser.profile.edit') }}">プロフィール</a></li>
                        <li class="nav-link {{ request()->is('attendances', 'attendances/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('attendances.index') }}">受講一覧</a></li>
                        <li class="nav-link {{ request()->is('adviser/lessons', 'adviser/lessons/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('adviser.lessons.index') }}">レッスン管理</a></li>
                        <li class="nav-link {{ request()->is('adviser/sales', 'adviser/sales/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('adviser.sales.index') }}">売上管理</a></li>
                    @elseif (auth()->guard('admin')->check())
                    <!-- TODO -->
                        <li class="nav-link {{ request()->is('admin/advisers/*', 'admin/advisers/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.advisers.index') }}">アドバイザー管理</a></li>
                        <li class="nav-link {{ request()->is('admin/mates', 'admin/mates/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.mates.index') }}">メイト管理</a></li>
                        <li class="nav-link {{ request()->is('admin/coins', 'admin/coins/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.coins.index') }}">コイン管理</a></li>
                        <li class="nav-link {{ request()->is('admin/attendances', 'admin/attendances/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.attendances.index') }}">受講管理</a></li>
                        <li class="nav-link {{ request()->is('admin/transfer-requests', 'admin/transfer-requests/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.transfer-requests.index') }}">振り込み申請管理</a></li>
                        <li class="nav-link {{ request()->is('admin/infos', 'admin/infos/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.infos.index') }}">お知らせ管理</a></li>
                        <li class="nav-link {{ request()->is('admin/info-mails', 'admin/info-mails/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.info-mails.index') }}">お知らせ管理</a></li>
                        <li class="nav-link {{ request()->is('admin/setting') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.setting.index') }}">サイト設定</a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    @endif
    <!-- /メニュー一覧 (ログイン後のみ) -->
</header>