<template id="attendance-notification-content">
    <div>
        <ul class="p-notification-popover__list">
            @php $user = auth()->guard('adviser')->check() ? auth()->guard('adviser')->user() : auth()->guard('mate')->user()@endphp
            @forelse($user->attendance_notifications_for_popup as $index => $notification)
                <li class="{{ is_null($notification->read_at) ? 'unread' : '' }}">
                    <a onclick="document.getElementById('notifyForm-{{ $index }}').submit()">
                        <span>{{ $notification->data['title'] }}</span>
                    </a>
                    <form action="{{ route('attendance-notifications.read', ['notification' => $notification]) }}" method="post" id="notifyForm-{{ $index }}">
                        @csrf
                    </form>
                </li>
            @empty
                <p class="m-2">{{ __('message.There is no notification yet') }} </p>
            @endforelse
        </ul>
        <a href="{{ route('attendance-notifications.index') }}" class="p-notification-popover__to-list primary-link">{{ __('message.To List') }} </a>
    </div>
</template>

<script type="text/javascript">
  const attendanceNotificationLinks = document.querySelectorAll('[data-bs-toggle="attendance-notification-popover"]');
  for (let i = 0; i < attendanceNotificationLinks.length; i++) {
    let popover = new bootstrap.Popover(attendanceNotificationLinks[i], {
      template: `
            <div class="popover p-notification-popover" role="tooltip">
                <div class="popover-body p-0"></div>
            </div>`,
      html: true,
      content: document.querySelector('#attendance-notification-content').content.firstElementChild,
      offset: [165, 10],
      placement: 'bottom',
    });
  }
</script>