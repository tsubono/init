@extends('layouts.app')

@section('title', __('message.Taking details'))

@section('content')
    <section class="p-attendance l-content-block">
        <div class="container">
            <div class="d-flex flex-wrap mb-3 justify-content-between">
                <div class="p-status-label {{ $attendance->status_class }}">
                    {{ $attendance->status_txt }}
                </div>
                <div class="p-attendance__header">
                    @if ($attendance->status_txt === __('message.Request'))
                        @if (auth()->guard('adviser')->check())
                            <button type="button" class="p-btn--rect py-1 px-2 btn-success" data-bs-toggle="modal" data-bs-target="#approvalModal">
                            {{ __('message.approve') }}
                            </button>
                            <button type="button" class="p-btn--rect py-1 px-2 btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                            {{ __('message.deny') }}
                            </button>
                            <!-- 承認モーダル -->
                            <div class="modal p-modal p-setting fade" id="approvalModal" tabindex="-1" aria-labelledby="approvalModalLabel">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                        <div class="modal-body">
                                            <h2 class="p-heading2 mt-0 text-center">{{ __('message.Approval confirmation') }}</h2>
                                            <p class="text-center">{{ __('message.Approve the application from username', ['username' => $attendance->mateUser->full_name ?? '退会ユーザー']) }}<br>{{ __('message.Is it OK?') }}</p>
                                            <form action="{{ route('attendances.approval', compact('attendance')) }}" method="post">
                                                @csrf
                                                <button class="p-btn p-btn__defalut">{{ __('message.approve') }}</button>
                                            </form>
                                        </div><!-- /.modal-body -->
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- /承認モーダル -->
                            <!-- 否認モーダル -->
                            <div class="modal p-modal p-setting fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                        <div class="modal-body">
                                            <h2 class="p-heading2 mt-0 text-center">{{ __('message.Denial confirmation') }}</h2>
                                            <p class="text-center">{{ __('message.Denial an request from username', ['username' => $attendance->mateUser->full_name ?? '退会ユーザー']) }}</p>
                                            <form action="{{ route('attendances.reject', compact('attendance')) }}" method="post">
                                                @csrf
                                                <textarea rows="5" class="form-control mt-2" name="reject_text" placeholder="{{ __('message.Please be sure to enter a non-negative message') }}" required></textarea>
                                                <button class="p-btn p-btn__defalut">{{ __('message.deny') }}</button>
                                            </form>
                                        </div><!-- /.modal-body -->
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- /否認モーダル -->
                        @elseif (auth()->guard('mate')->check())
                            <button type="button" class="p-btn--rect py-1 px-2 btn-danger" data-bs-toggle="modal" data-bs-target="#requestCancelModal">
                            {{ __('message.Cancellation') }}
                            </button>
                            <!-- 申請キャンセルモーダル -->
                            <div class="modal p-modal p-setting fade" id="requestCancelModal" tabindex="-1" aria-labelledby="requestCancelModalLabel">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                        <div class="modal-body">
                                            <h2 class="p-heading2 mt-0 text-center">{{ __('message.Request Cancel Confirmation') }}</h2>
                                            <p class="text-center">{{ __('message.Cancel the request for username', ['username' => $attendance->lesson->name]) }}</p>
                                            <form action="{{ route('attendances.cancel-request', compact('attendance')) }}" method="post">
                                                @csrf
                                                <button class="p-btn p-btn__defalut">{{ __('message.Cancel') }}</button>
                                            </form>
                                        </div><!-- /.modal-body -->
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- /申請キャンセルモーダル -->
                        @endif
                    @endif
                    @if ($attendance->status_txt === __('message.Taking') || $attendance->status_txt === __('message.Completion') ||
                         $attendance->status_txt === __('message.Cancel') || $attendance->status_txt === __('message.Report'))
                        <a class="p-btn--rect py-2 px-3 p-btn__defalut" href="{{ route('attendances.messages', compact('attendance')) }}">{{ __('message.message') }}</a>
                    @endif
                    @if ($attendance->status_txt === __('message.Taking'))
                        @if (auth()->guard('adviser')->check())
                            <button type="button" class="p-btn--rect py-1 px-2 btn-success" data-bs-toggle="modal" data-bs-target="#closeModal">
                            {{ __('message.To attend the completion') }}
                            </button>
                            <!-- 受講完了モーダル -->
                            <div class="modal p-modal p-setting fade" id="closeModal" tabindex="-1" aria-labelledby="closeModalLabel">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                        <div class="modal-body">
                                            <h2 class="p-heading2 mt-0 text-center">{{ __('message.Confirmation of completion of attendance') }}</h2>
                                            <p class="text-center">{{ __('message.Complete the attendance for username', ['username' => $attendance->mateUser->full_name ?? '退会ユーザー']) }}<br>{{ __('message.Is it OK?') }}</p>
                                            <form action="{{ route('attendances.close', compact('attendance')) }}" method="post">
                                                @csrf
                                                <button class="p-btn p-btn__defalut">{{ __('message.Be completed') }}</button>
                                            </form>
                                        </div><!-- /.modal-body -->
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- /受講完了モーダル -->
                        @endif
                        @if (auth()->guard('adviser')->check() || auth()->guard('mate')->check())
                            <button type="button" class="p-btn--rect py-1 px-2 btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">
                                {{ __('message.Cancel') }}
                            </button>
                            @if ($attendance->datetime <= now())
                                <button type="button" class="p-btn--rect py-1 px-2 btn-danger" data-bs-toggle="modal" data-bs-target="#reportModal">
                                {{ __('message.report') }}
                                </button>
                            @endif
                            <!-- キャンセルモーダル -->
                            <div class="modal p-modal p-setting fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                        <div class="modal-body">
                                            <h2 class="p-heading2 mt-0 text-center">{{ __('message.Cancel confirmation') }}</h2>
                                            <p class="text-center">{{ __('message.Cancel the attendance for username', ['username' => $attendance->lesson->name]) }}<br>{{ __('message.Is it OK?') }}</p>
                                            <form action="{{ route('attendances.cancel', compact('attendance')) }}" method="post">
                                                @csrf
                                                <button class="p-btn p-btn__defalut">{{ __('message.Cancel') }}</button>
                                            </form>
                                        </div><!-- /.modal-body -->
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- /キャンセルモーダル -->
                            @if ($attendance->datetime <= now())
                                <!-- 通報モーダル -->
                                <div class="modal p-modal p-setting fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                            <div class="modal-body">
                                                <h2 class="p-heading2 mt-0 text-center">{{ __('message.Report confirmation') }}</h2>
                                                <p class="text-center">{{ __('message.Report of lesson', ['lesson' => $attendance->lesson->name]) }}<br>{{ __('message.Is it OK?') }}</p>
                                                <form action="{{ route('attendances.report', compact('attendance')) }}" method="post">
                                                    @csrf
                                                    <button class="p-btn p-btn__defalut">{{ __('message.report') }}</button>
                                                </form>
                                            </div><!-- /.modal-body -->
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <!-- /通報モーダル -->
                            @endif
                        @endif
                    @endif
                    @if ($attendance->can_review)
                        @if (!$attendance->done_review)
                            <a class="p-btn--rect py-1 px-2 btn-warning" href="{{ route('attendances.review-form', compact('attendance')) }}">{{ __('message.Review registration') }}</a>
                        @else
                            <a class="p-btn--rect py-1 px-2 btn-warning btn-disabled" disabled>{{ __('message.Reviewed') }}</a>
                        @endif
                    @endif
                </div><!-- /.p-attendance__header -->
            </div>

            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Date of attendance') }}</h3>
                <p>{{ $attendance->datetime_txt }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Lesson name') }}</h3>
                <a href="{{ route('lessons.show', ['lesson' => $attendance->lesson]) }}" class="primary-link" target="_blank">
                    <p>{{ $attendance->lesson->name }}</p>
                </a>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Teacher') }}</h3>
                @if ($attendance->adviserUser)
                    <a href="{{ route('advisers.show', ['adviserUser' => $attendance->adviserUser]) }}" class="primary-link" target="_blank">
                        <p>{{ $attendance->adviserUser->full_name ?? '退会ユーザー' }}</p>
                    </a>
                @else
                    <p>{{ __('message.Withdrawal user') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Students') }}</h3>
                <p>{{ $attendance->mateUser->full_name ?? '退会ユーザー' }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Take application message') }}</h3>
                <p>{!! nl2br(e($attendance->request_text)) !!}</p>
            </div>
            @if (!is_null($attendance->reject_text))
                <div class="mb-3">
                    <h3 class="p-heading3">{{ __('message.Certificate message') }}</h3>
                    <p>{!! nl2br(e($attendance->reject_text)) !!}</p>
                </div>
            @endif
            <div class="mb-3">
                @if ($attendance->status == \App\Models\Attendance::STATUS_CANCEL)
                    <p>{{ __('message.Canceled user') }}: {{ !is_null($attendance->cancel_cause_mate_user_id) ? $attendance->mateUser->full_name ?? '退会ユーザー' : $attendance->adviserUser->full_name ?? '退会ユーザー' }}</p>
                @endif
                @if ($attendance->status == \App\Models\Attendance::STATUS_REPORT)
                    <p>{{ __('message.Reported user') }}: {{ !is_null($attendance->cancel_cause_mate_user_id) ? $attendance->mateUser->full_name ?? '退会ユーザー' : $attendance->adviserUser->full_name ?? '退会ユーザー' }}</p>
                @endif
            </div>
            @if (count($attendance->reviews) !== 0)
                <div class="mb-3 p-review">
                    <h3 class="p-heading3">{{ __('message.review') }}</h3>
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
                                        <img src="{{ $review->user->avatar_image ?? asset('img/default-avatar.png') }}" class="p-review-box__avatar" alt="{{ $review->user ? $review->user->full_name : '退会ユーザー' }}{{ __('message.Profile image') }}">
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
                @if (auth()->guard('admin')->check())
                    <a href="{{ route('admin.attendances.index') }}" class="p-btn p-btn__defalut d-inline-block px-80px">
                    {{ __('message.Back to the list') }}
                    </a>
                @else
                    <a href="{{ route('attendances.index') }}" class="p-btn p-btn__defalut d-inline-block px-80px">
                    {{ __('message.Back to the list') }}
                    </a>
                @endif
            </div>
        </div><!-- /.container -->
    </section>
@endsection
