@extends('layouts.app')

@section('title', '受講お知らせ一覧')

@section('content')
    <section class="p-info-list l-content-block">
        <div class="container">
            @if (count($attendanceNotifications) !== 0)
                <div class="mb-3 text-end">
                    <form action="{{ route('attendance-notifications.read-all') }}" method="post">
                        @csrf
                        <button type="submit" class="p-btn btn-default py-1 px-2 d-inline">全て既読にする</button>
                    </form>
                </div>
            @endif

            @if (count($attendanceNotifications) !== 0)
                <ul class="p-info-list__information-list">
                    @foreach ($attendanceNotifications as $index => $attendanceNotification)
                        <li class="{{ is_null($attendanceNotification->read_at) ? 'unread' : '' }}">
                            <a onclick="document.getElementById('notifyForm-{{ $index }}').submit()">
                                <time class="p-info-list__date">{{ $attendanceNotification->created_at->format('Y/m/d') }}</time>
                                <span class="p-info-list__title">{{ $attendanceNotification->data['title'] }}</span>
                            </a>
                            <form action="{{ route('attendance-notifications.read', ['notification' => $attendanceNotification]) }}" method="post" id="notifyForm-{{ $index }}">
                                @csrf
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-center">まだお知らせは登録されていません</div>
            @endif

            <div class="text-center">
                {{ $attendanceNotifications->links('vendor.pagination.custom') }}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
