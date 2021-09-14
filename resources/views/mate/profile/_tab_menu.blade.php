<ul class="nav nav-pills p-setting__tab nav-fill" role="tablist">
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('mate/profile/basic') ? 'active' : '' }}" href="{{ route('mate.profile.edit') }}">
            基本情報の変更
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('mate/profile/learn') ? 'active' : '' }}" href="{{ route('mate.profile.edit.learn') }}">
            学びたい設定
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('mate/profile/password') ? 'active' : '' }}" href="{{ route('mate.profile.edit.password') }}">
            パスワードの変更
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('mate/profile/notice') ? 'active' : '' }}" href="{{ route('mate.profile.edit.notice') }}">
            通知設定
        </a>
    </li>
</ul>