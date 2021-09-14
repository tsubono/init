<ul class="nav nav-pills p-setting__tab nav-fill" role="tablist">
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('adviser/profile/basic') ? 'active' : '' }}" href="{{ route('adviser.profile.edit') }}">
            基本情報の変更
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('adviser/profile/teach') ? 'active' : '' }}" href="{{ route('adviser.profile.edit.teach') }}">
            教える設定
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('adviser/profile/password') ? 'active' : '' }}" href="{{ route('adviser.profile.edit.password') }}">
            パスワードの変更
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('adviser/profile/personal') ? 'active' : '' }}" href="{{ route('adviser.profile.edit.personal') }}">
            個人情報の変更
        </a>
    </li>
</ul>