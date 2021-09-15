@extends('layouts.app')

@section('title', '受講詳細')

@section('content')
    <section class="p-attendance l-content-block">
        <div class="container">
            <div class="mb-3">
                <h3 class="p-heading3">受講日時</h3>
                <p>{{ $attendance->datetime_txt }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">レッスン名</h3>
                <a href="{{ route('lessons.show', ['lesson' => $attendance->lesson]) }}" class="primary-link">
                    <p>{{ $attendance->lesson->name }}</p>
                </a>
            </div>
            @if (auth()->guard('mate')->check())
                <div class="mb-3">
                    <h3 class="p-heading3">アドバイザー</h3>
                    @if ($attendance->adviserUser)
                        <a href="{{ route('advisers.show', ['adviserUser' => $attendance->adviserUser]) }}" class="primary-link">
                            <p>{{ $attendance->adviserUser->full_name ?? '退会ユーザー' }}</p>
                        </a>
                    @else
                        <p>退会ユーザー</p>
                    @endif
                </div>
            @else
                <div class="mb-3">
                    <h3 class="p-heading3">メイト</h3>
                    <p>{{ $attendance->mateUser->full_name ?? '退会ユーザー' }}</p>
                </div>
            @endif
            <div class="mb-3">
                <h3 class="p-heading3">受講申請メッセージ</h3>
                <p>{!! nl2br(e($attendance->request_text)) !!}</p>
            </div>
            @if (!is_null($attendance->reject_text))
                <div class="mb-3">
                    <h3 class="p-heading3">受講否認メッセージ</h3>
                    <p>{!! nl2br(e($attendance->reject_text)) !!}</p>
                </div>
            @endif
            <div class="mb-3">
                <h3 class="p-heading3">ステータス</h3>
                <div class="p-status-label {{ $attendance->status_class }}">
                    {{ $attendance->status_txt }}
                </div>

                @if ($attendance->status == \App\Models\Attendance::STATUS_CANCEL)
                    <p>キャンセルしたユーザー: {{ !is_null($attendance->cancel_cause_mate_user_id) ? $attendance->mateUser->full_name ?? '退会ユーザー' : $attendance->adviserUser->full_name ?? '退会ユーザー' }}</p>
                @endif
                @if ($attendance->status == \App\Models\Attendance::STATUS_REPORT)
                    <p>通報されたユーザー: {{ !is_null($attendance->cancel_cause_mate_user_id) ? $attendance->mateUser->full_name ?? '退会ユーザー' : $attendance->adviserUser->full_name ?? '退会ユーザー' }}</p>
                @endif
            </div>
            @if (count($attendance->reviews) !== 0)
                <div class="mb-3 p-review">
                    <h3 class="p-heading3">レビュー</h3>
                    <div class="p-review__list">
                        @foreach ($attendance->reviews as $review)
                            <div class="p-review-box my-2 w-100">
                                <div class="p-review-box__rate">
                                    <label class="{{ 1 <= $review->rate ? 'active' : '' }}">★</label>
                                    <label class="{{ 2 <= $review->rate ? 'active' : '' }}">★</label>
                                    <label class="{{ 3 <= $review->rate ? 'active' : '' }}">★</label>
                                    <label class="{{ 4 <= $review->rate ? 'active' : '' }}">★</label>
                                    <label class="{{ 5 <= $review->rate ? 'active' : '' }}">★</label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <img src="{{ $review->user->avatar_image ?? asset('img/default-avatar.png') }}" class="p-review-box__avatar" alt="{{ $review->user ? $review->user->full_name : '退会ユーザー' }}のプロフィール画像">
                                        <span class="fw-bold ms-3">{{ $review->user->full_name ?? '退会ユーザー' }}</span>
                                    </div>
                                    <time>{{ $review->created_at->format('Y/m/d H:i') }}</time>
                                </div>
                                <div class="p-review-box__content ms-3">
                                    <div class="content-text">{!! nl2br(e($review->content)) !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="my-5 text-center">
                <a href="{{ route('attendances.index') }}" class="p-btn p-btn__defalut d-inline-block px-80px">
                    受講一覧へ戻る
                </a>
            </div>
        </div><!-- /.container -->
    </section>
@endsection
