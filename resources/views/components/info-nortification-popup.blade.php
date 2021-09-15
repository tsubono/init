<template id="notification-content">
    <div>
        <ul class="p-notification-popover__list">
            @php $user = auth()->guard('adviser')->check() ? auth()->guard('adviser')->user() : auth()->guard('mate')->user()@endphp
            @forelse($user->info_notifications_for_popup as $index => $notification)
                <li class="{{ is_null($notification->read_at) ? 'unread' : '' }}">
                    <a onclick="document.getElementById('notifyForm-{{ $index }}').submit()">
                        <span>{{ $notification->data['title'] }}</span>
                    </a>
                    <form action="{{ route('info.notifications.read', ['notification' => $notification]) }}" method="post" id="notifyForm-{{ $index }}">
                        @csrf
                    </form>
                </li>
            @empty
                <p>まだ通知はありません</p>
            @endforelse
        </ul>
        <a href="{{ route('infos.index') }}" class="p-notification-popover__to-list primary-link">一覧へ</a>
    </div>
</template>

<script type="text/javascript">
  const notificationLinks = document.querySelectorAll('[data-bs-toggle="notification-popover"]');
  for (let i = 0; i < notificationLinks.length; i++) {
    let popover = new bootstrap.Popover(notificationLinks[i], {
      template: `
            <div class="popover p-notification-popover" role="tooltip">
                <div class="popover-body p-0"></div>
            </div>`,
      html: true,
      content: document.querySelector('#notification-content').content.firstElementChild,
      offset: [165, 10],
      placement: 'bottom',
    });
  }
</script>