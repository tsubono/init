@extends('layouts.app')

@section('title', __('message.Notice List'))

@section('content')
    <section class="p-info-list l-content-block">
        <div class="container">
            @if (count($infoNotifications) !== 0)
                <div class="mb-3 text-end">
                    <form action="{{ route('info.notifications.read-all') }}" method="post">
                        @csrf
                        <button type="submit" class="p-btn btn-default py-1 px-2 d-inline">{{ __('message.All read') }}</button>
                    </form>
                </div>
            @endif

            @if (count($infoNotifications) !== 0)
                <ul class="p-info-list__information-list">
                    @foreach ($infoNotifications as $index => $infoNotification)
                        <li class="{{ is_null($infoNotification->read_at) ? 'unread' : '' }}">
                            <a onclick="document.getElementById('notifyForm-{{ $index }}').submit()">
                                <time class="p-info-list__date">{{ \Carbon\Carbon::parse($infoNotification->data['date'])->format('Y/m/d') }}</time>
                                <span class="p-info-list__title">{{ $infoNotification->data['title'] }}</span>
                            </a>
                            <form action="{{ route('info.notifications.read', ['notification' => $infoNotification]) }}" method="post" id="notifyForm-{{ $index }}">
                                @csrf
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-center">{{ __('message.Notice has not been registered yet') }}</div>
            @endif

            <div class="text-center">
                {{ $infoNotifications->links('vendor.pagination.custom') }}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
