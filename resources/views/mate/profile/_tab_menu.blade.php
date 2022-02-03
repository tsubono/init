<ul class="nav nav-pills p-setting__tab nav-fill" role="tablist">
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('mate/profile/basic') ? 'active' : '' }}" href="{{ route('mate.profile.edit') }}">
            {{ __('message.Basic information change') }} 
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('mate/profile/learn') ? 'active' : '' }}" href="{{ route('mate.profile.edit.learn') }}">
        {{ __('message.Setting you want to learn') }} 
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('mate/profile/password') ? 'active' : '' }}" href="{{ route('mate.profile.edit.password') }}">
            {{ __('message.change Password') }} 
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('mate/profile/notice') ? 'active' : '' }}" href="{{ route('mate.profile.edit.notice') }}">
            {{ __('message.Notification settings') }} 
        </a>
    </li>
</ul>