<a tabindex="0"
   data-bs-toggle="info-notification-popover"
   data-bs-trigger="focus"
   class="p-notification-icon {{ $user->is_unread_info_notification ? 'p-notification-icon--has-items' : '' }}"
>
    <img src="{{ asset('img/notification.svg') }}" alt="お知らせ">
</a>