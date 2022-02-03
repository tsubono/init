<header>
    @php $hasSubMenu = auth()->guard('mate')->check() || auth()->guard('adviser')->check() || auth()->guard('admin')->check(); @endphp
    <nav class="navbar navbar-expand-md navbar-light" {{ $hasSubMenu ? 'has-sub-menu' : '' }}>
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{ asset('img/brand-white.svg') }}" alt="INIT"></a>
            <!-- タブレット・スマホ用ヘッダーボタン -->
            <div class="d-flex align-items-center">
                    @if (auth()->guard('mate')->check())
                        <div class="d-lg-none mx-2">
                            @include('components.info-notification-icon', ['user' => auth()->guard('mate')->user()])
                        </div>
                        <div class="d-lg-none mx-2">
                            @include('components.attendance-notification-icon', ['user' => auth()->guard('mate')->user()])
                        </div>
                    @elseif (auth()->guard('adviser')->check())
                        <div class="d-lg-none mx-2">
                            @include('components.info-notification-icon', ['user' => auth()->guard('adviser')->user()])
                        </div>
                        <div class="d-lg-none mx-2">
                            @include('components.attendance-notification-icon', ['user' => auth()->guard('adviser')->user()])
                        </div>
                    @endif
                @if ($hasSubMenu)
                    <button type="button" class="navbar-toggler mypage-toggler" data-bs-toggle="collapse" data-bs-target="#Navber2" aria-controls="Navber2" aria-expanded="false" aria-label="{{ __('message.Navigation switching') }} ">
                        <span class="navbar-toggler-icon mypage-icon"></span>
                    </button>
                @endif
                @if (!$hasSubMenu)
                    <div class="login-link dropdown d-lg-none">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('message.Login') }} 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('mate.login') }}">{{ __('message.Studer login') }} </a></li>
                            <li><a class="dropdown-item" href="{{ route('adviser.login') }}">{{ __('message.Lecturer login') }} </a></li>
                        </ul>
                    </div>
                @endif
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="{{ __('message.Navigation switching') }} ">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!-- /タブレット・スマホ用ヘッダーボタン -->
            <!-- メニュー一覧 -->
            <div class="collapse navbar-collapse" id="Navber">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"><a href="{{ route('top') }}">{{ __('message.home') }} </a></li>
                    <li class="nav-link {{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">{{ __('message.For the first time') }} </a></li>
                    <li class="nav-link {{ request()->is('lessons', 'lessons/*') ? 'active' : '' }}"><a href="{{ route('lessons.index') }}">{{ __('message.Lesson search') }} </a></li>
                    <li class="nav-link {{ request()->is('advisers', 'advisers/*') ? 'active' : '' }}"><a href="{{ route('advisers.index') }}">{{ __('message.Lecturer search') }} </a></li>
                    @if (auth()->guard('mate')->check())
                        <li class="nav-link nav-link__login">
                            <a onclick="document.getElementById('logoutForm').submit()">{{ __('message.Logout') }} </a>
                            <form action="{{ route('mate.logout') }}" id="logoutForm" method="post">@csrf</form>
                        </li>
                    @elseif (auth()->guard('adviser')->check())
                        <li class="nav-link nav-link__login">
                            <a onclick="document.getElementById('logoutForm').submit()">{{ __('message.Logout') }} </a>
                            <form action="{{ route('adviser.logout') }}" id="logoutForm" method="post">@csrf</form>
                        </li>
                    @elseif (auth()->guard('admin')->check())
                        <li class="nav-link nav-link__login">
                            <a onclick="document.getElementById('logoutForm').submit()">{{ __('message.Logout') }} </a>
                            <form action="{{ route('admin.logout') }}" id="logoutForm" method="post">@csrf</form>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
            <!-- /メニュー一覧 -->
        </div><!-- /.container-fluid -->
        @if (!$hasSubMenu)
            <div class="login-link dropdown d-none d-lg-block">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('message.Login') }} 
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('mate.login') }}">{{ __('message.Studer login') }} </a></li>
                    <li><a class="dropdown-item" href="{{ route('adviser.login') }}">{{ __('message.Lecturer login') }} </a></li>
                </ul>
            </div>
        @endif
    </nav>
    <!-- サブメニュー一覧 -->
    @if ($hasSubMenu)
        <nav class="navbar navbar-expand-md navbar-light sub-menu">
            <div class="collapse navbar-collapse" id="Navber2">
                <ul class="navbar-nav">
                    @if (auth()->guard('mate')->check())
                        <li class="mx-3 d-none d-lg-block">
                            @include('components.info-notification-icon', ['user' => auth()->guard('mate')->user()])
                        </li>
                        <li class="mx-3 d-none d-lg-block">
                            @include('components.attendance-notification-icon', ['user' => auth()->guard('mate')->user()])
                        </li>
                        <li class="nav-link {{ request()->is('mate/profile/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('mate.profile.edit') }}">{{ __('message.profile') }} </a></li>
                        <li class="nav-link {{ request()->is('attendances', 'attendances/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('attendances.index') }}">{{ __('message.List of students') }} </a></li>
                        <li class="nav-link {{ request()->is('mate/coins', 'mate/coins/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('mate.coins.index') }}">{{ __('message.Coin management') }} </a></li>
                    @elseif (auth()->guard('adviser')->check())
                        <li class="mx-3 d-none d-lg-block">
                            @include('components.info-notification-icon', ['user' => auth()->guard('adviser')->user()])
                        </li>
                        <li class="mx-3 d-none d-lg-block">
                            @include('components.attendance-notification-icon', ['user' => auth()->guard('adviser')->user()])
                        </li>
                        <li class="nav-link {{ request()->is('adviser/profile/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('adviser.profile.edit') }}">{{ __('message.profile') }} </a></li>
                        <li class="nav-link {{ request()->is('attendances', 'attendances/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('attendances.index') }}">{{ __('message.List of students') }} </a></li>
                        <li class="nav-link {{ request()->is('adviser/lessons', 'adviser/lessons/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('adviser.lessons.index') }}">{{ __('message.Lesson management') }} </a></li>
                        <li class="nav-link {{ request()->is('adviser/sales', 'adviser/sales/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('adviser.sales.index') }}">{{ __('message.sales management') }} </a></li>
                    @elseif (auth()->guard('admin')->check())
                        <!-- TODO -->
                        <li class="nav-link {{ request()->is('admin/advisers/*', 'admin/advisers/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.advisers.index') }}">{{ __('message.Lecturer management') }} </a></li>
                        <li class="nav-link {{ request()->is('admin/mates', 'admin/mates/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.mates.index') }}">{{ __('message.Student management') }} </a></li>
                        <li class="nav-link {{ request()->is('admin/coins', 'admin/coins/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.coins.index') }}">{{ __('message.Coin management') }} </a></li>
                        <li class="nav-link {{ request()->is('admin/attendances', 'admin/attendances/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.attendances.index') }}">{{ __('message.Taking management') }} </a></li>
                        <li class="nav-link {{ request()->is('admin/transfer-requests', 'admin/transfer-requests/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.transfer-requests.index') }}">{{ __('message.Transfer application management') }} </a></li>
                        <li class="nav-link {{ request()->is('admin/infos', 'admin/infos/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.infos.index') }}">{{ __('message.Notice management') }} </a></li>
                        <li class="nav-link {{ request()->is('admin/info-mails', 'admin/info-mails/*') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.info-mails.index') }}">{{ __('message.Notice Delivery Management') }} </a></li>
                        <li class="nav-link {{ request()->is('admin/setting') ? 'active' : '' }}" aria-current="page"><a href="{{ route('admin.setting.index') }}">{{ __('message.Site setting') }} </a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    @endif
    <!-- /サブメニュー一覧 -->
</header>