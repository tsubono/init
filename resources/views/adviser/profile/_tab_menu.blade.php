<ul class="nav nav-pills p-setting__tab nav-fill" role="tablist">
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('adviser/profile/basic') ? 'active' : '' }}" href="{{ route('adviser.profile.edit') }}">
            {{ __('message.Basic information change') }} 
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('adviser/profile/teach') ? 'active' : '' }}" href="{{ route('adviser.profile.edit.teach') }}">
            {{ __('message.Teaching settings') }} 
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('adviser/profile/password') ? 'active' : '' }}" href="{{ route('adviser.profile.edit.password') }}">
            {{ __('message.change Password') }} 
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a id="learn-tab" class="nav-link {{ request()->is('adviser/profile/personal') ? 'active' : '' }}" href="{{ route('adviser.profile.edit.personal') }}">
            {{ __('message.Change of personal information') }} 
        </a>
    </li>
</ul>