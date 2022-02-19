<a tabindex="0"
   data-bs-toggle="attendance-notification-popover"
   data-bs-trigger="focus"
   class="p-notification-icon {{ $user->is_unread_attendance_notification ? 'p-notification-icon--has-items' : '' }}"
>
    <img src="{{ asset('img/chat-icon.svg') }}" alt="{{ __('message.notice') }}">
</a>