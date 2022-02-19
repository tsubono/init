@extends('layouts.app')

@section('title', __('message.List of attendances'))

@section('content')
    <section class="p-searchblock bg-light l-content-block">
        <div class="container">
            <form action="" class="p-form">
                <a class="p-btn p-btn__outline d-md-none" data-bs-toggle="collapse" href="#collapseDetail" role="button" aria-expanded="false" aria-controls="collapseDetail">
                    {{ __('message.search') }}
                </a>
                <div class="collapse" id="collapseDetail">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">{{ __('message.Lesson name') }}</h3>
                            <input type="text" class="form-control" placeholder="{{ __('message.Please fill in') }}"
                                   name="condition[lesson_name]"
                                   value="{{ isset($condition['lesson_name']) ? $condition['lesson_name'] : '' }}"
                            />
                        </div>
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">{{ __('message.username') }}</h3>
                            <input type="text" class="form-control" placeholder="{{ __('message.Please fill in') }}"
                                   name="condition[user_name]"
                                   value="{{ isset($condition['user_name']) ? $condition['user_name'] : '' }}"
                            />
                        </div>
                        <div class="col-md-6 mb-md-4">
                            <h3 class="p-heading3">{{ __('message.status') }}</h3>
                            <select class="form-select" name="condition[status]">
                                <option value="">{{ __('message.Not specified') }}</option>
                                <option value="-1" {{ (isset($condition['status']) ? $condition['status'] : '') == -1 ? 'selected' : '' }}>
                                {{ __('message.Cancel Cancel Cancel') }}
                                </option>
                                <option value="1" {{ (isset($condition['status']) ? $condition['status'] : '') == 1 ? 'selected' : '' }}>
                                {{ __('message.Request') }}
                                </option>
                                <option value="2" {{ (isset($condition['status']) ? $condition['status'] : '') == 2 ? 'selected' : '' }}>
                                {{ __('message.Taking') }}
                                </option>
                                <option value="3" {{ (isset($condition['status']) ? $condition['status'] : '') == 3 ? 'selected' : '' }}>
                                {{ __('message.Denial') }}
                                </option>
                                <option value="4" {{ (isset($condition['status']) ? $condition['status'] : '') == 4 ? 'selected' : '' }}>
                                    {{ __('message.Cancel') }}
                                </option>
                                <option value="5" {{ (isset($condition['status']) ? $condition['status'] : '') == 5 ? 'selected' : '' }}>
                                {{ __('message.Report') }}
                                </option>
                                <option value="6" {{ (isset($condition['status']) ? $condition['status'] : '') == 6 ? 'selected' : '' }}>
                                {{ __('message.Completion') }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h3 class="p-heading3">{{ __('message.Students Date') }}</h3>
                            <div class="d-flex align-items-center">
                                <input type="date" class="form-control" placeholder="{{ __('message.Please fill in') }}"
                                       name="condition[date_start]"
                                       value="{{ isset($condition['date_start']) ? $condition['date_start'] : '' }}"
                                />
                                <span class="mx-2">〜</span>
                                <input type="date" class="form-control" placeholder="{{ __('message.Please fill in') }}"
                                       name="condition[date_end]"
                                       value="{{ isset($condition['date_end']) ? $condition['date_end'] : '' }}"
                                />
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <div class="d-flex justify-content-end align-items-center p-searchblock__controls">
                        @if (auth()->guard('admin')->check())
                            <a class="primary-link mx-5" href="{{ route('admin.attendances.index') }}">{{ __('message.reset') }}</a>
                        @else
                            <a class="primary-link mx-5" href="{{ route('attendances.index') }}">{{ __('message.reset') }}</a>
                        @endif
                        <button class="p-btn p-btn__black d-inline-block mt-2 py-2 px-5">{{ __('message.search') }}</button>
                    </div>
                </div><!-- /.collapse -->
            </form>
        </div>
    </section>
    <section class="p-searchresult l-content-block">
        <div class="container">
            <!-- パネル部分 -->
            <div class="p-search__content tab-content">
                <div id="new" class="tab-pane active" role="tabpanel" aria-labelledby="new-tab">
                    @forelse ($attendances as $index => $attendance)
                        <div class="p-card3 p-attendance">
                            @if ($userType === 'mate')
                                <div class="p-card3__advisor">
                                    <div class="p-card3__advisor_img">
                                        <img src="{{ $attendance->adviserUser->avatar_image ?? asset('img/default-avatar.png') }}" alt="{{ __('message.Adviser image') }}">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <p>{{ __('message.Teacher') }}</p>
                                        <h4>
                                            @if ($attendance->adviserUser)
                                                <a href="{{ route('advisers.show', ['adviserUser' => $attendance->adviserUser]) }}" target="_blank">
                                                    {{ $attendance->adviserUser->full_name ?? '退会ユーザー' }}
                                                </a>
                                            @else
                                                {{ __('message.Withdrawal user') }}
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                            @elseif ($userType === 'adviser')
                                <div class="p-card3__advisor">
                                    <div class="p-card3__advisor_img">
                                        <img src="{{ $attendance->mateUser->avatar_image ?? asset('img/default-avatar.png') }}" alt="{{ __('message.Adviser image') }}">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <p>{{ __('message.Students') }}</p>
                                        <h4>{{ $attendance->mateUser->full_name ?? '退会ユーザー' }}</h4>
                                    </div>
                                </div>
                            @else
                                <div class="p-card3__advisor">
                                    <div class="p-card3__advisor_img">
                                        <img src="{{ $attendance->adviserUser->avatar_image ?? asset('img/default-avatar.png') }}" alt="{{ __('message.Adviser image') }}">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <p>{{ __('message.Teacher') }}</p>
                                        <h4>
                                            @if ($attendance->adviserUser)
                                                <a href="{{ route('advisers.show', ['adviserUser' => $attendance->adviserUser]) }}" target="_blank">
                                                    {{ $attendance->adviserUser->full_name ?? '退会ユーザー' }}
                                                </a>
                                            @else
                                                {{ __('message.Withdrawal user') }}
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                                <div class="p-card3__advisor">
                                    <div class="p-card3__advisor_img">
                                        <img src="{{ $attendance->mateUser->avatar_image ?? asset('img/default-avatar.png') }}" alt="{{ __('message.Adviser image') }}">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <p>{{ __('message.Students') }}</p>
                                        <h4>{{ $attendance->mateUser->full_name ?? '退会ユーザー' }}</h4>
                                    </div>
                                </div>
                           @endif
                            <div class="p-card3__detail">
                                <div class="mb-4">
                                    <p>{{ __('message.Lesson name') }}</p>
                                    <a href="{{ route('lessons.show', ['lesson' => $attendance->lesson ]) }}" target="_blank">
                                        <h3>{{ $attendance->lesson->name }}</h3>
                                    </a>
                                </div>
                                <div>
                                    <p>{{ __('message.Date of attendance') }}</p>
                                    <h3>{{ $attendance->datetime_txt }}</h3>
                                </div>
                                <a href="{{ route('attendances.show', compact('attendance')) }}" class="p-btn p-btn__defalut d-inline-block mt-2 py-2 px-3">
                                    {{ __('message.To take details') }}
                                </a>
                            </div><!--/.p-card3__detail -->

                            @if ($userType !== 'admin')
                                <!-- ********* ステータスに応じた各アクション ********* -->
                                <div class="p-card3__controls">
                                        @if ($attendance->status_txt === __('message.Request'))
                                            @if (auth()->guard('adviser')->check())
                                                <button type="button" class="p-btn--rect btn-success" data-bs-toggle="modal" data-bs-target="#approvalModal{{ $index }}">
                                                {{ __('message.approve') }}
                                                </button>
                                                <button type="button" class="p-btn--rect btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $index }}">
                                                {{ __('message.deny') }}
                                                </button>
                                            @else
                                                <button type="button" class="p-btn--rect btn-danger" data-bs-toggle="modal" data-bs-target="#requestCancelModal{{ $index }}">
                                                {{ __('message.Cancellation') }}
                                                </button>
                                            @endif
                                        @endif
                                        @if ($attendance->status_txt === __('message.Taking') || $attendance->status_txt === __('message.Completion') ||
                                             $attendance->status_txt === __('message.Cancel') || $attendance->status_txt === __('message.Report'))
                                            <a class="p-btn--rect py-2 px-3 p-btn__defalut" href="{{ route('attendances.messages', compact('attendance')) }}">{{ __('message.message') }}</a>
                                        @endif
                                        @if ($attendance->status_txt === __('message.Taking'))
                                            @if (auth()->guard('adviser')->check())
                                                <button type="button" class="p-btn--rect btn-success" data-bs-toggle="modal" data-bs-target="#closeModal{{ $index }}">
                                                {{ __('message.To attend the completion') }}
                                                </button>
                                            @endif
                                            <button type="button" class="p-btn--rect btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal{{ $index }}">
                                                {{ __('message.Cancel') }}
                                            </button>
                                            @if ($attendance->datetime <= now())
                                                <button type="button" class="p-btn--rect btn-danger" data-bs-toggle="modal" data-bs-target="#reportModal{{ $index }}">
                                                {{ __('message.report') }}
                                                </button>
                                           @endif
                                        @endif
                                        @if ($attendance->can_review)
                                            @if (!$attendance->done_review)
                                                <a class="p-btn--rect btn-warning" href="{{ route('attendances.review-form', compact('attendance')) }}">{{ __('message.Review registration') }}</a>
                                            @else
                                                <a class="p-btn--rect btn-warning btn-disabled" disabled>{{ __('message.Reviewed') }}</a>
                                            @endif
                                        @endif
                                    </div><!-- /.p-card3__controls -->
                                <!-- ********* /ステータスに応じた各アクション ********* -->
                                <!-- ************ モーダルたち ************ -->
                                @if ($attendance->status_txt === __('message.Request'))
                                    @if (auth()->guard('adviser')->check())
                                        <!-- 承認モーダル -->
                                            <div class="modal p-modal p-setting fade" id="approvalModal{{ $index }}" tabindex="-1" aria-labelledby="approvalModalLabel{{ $index }}">
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
                                            <div class="modal p-modal p-setting fade" id="rejectModal{{ $index }}" tabindex="-1" aria-labelledby="rejectModalLabel{{ $index }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                                        <div class="modal-body">
                                                            <h2 class="p-heading2 mt-0 text-center">{{ __('message.Absurdity') }}</h2>
                                                            <p class="text-center">{{ __('message.Representing an application from username', ['username' => $attendance->mateUser->full_name ?? '退会ユーザー']) }}</p>
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
                                    @else
                                        <!-- 申請キャンセルモーダル -->
                                            <div class="modal p-modal p-setting fade" id="requestCancelModal{{ $index }}" tabindex="-1" aria-labelledby="requestCancelModalLabel{{ $index }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                                        <div class="modal-body">
                                                            <h2 class="p-heading2 mt-0 text-center">{{ __('message.Application Cancel Confirmation') }}</h2>
                                                            <p class="text-center">「{{ $attendance->lesson->name }}」{{ __('message.Cancel the attendance application.') }}</p>
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
                                @if ($attendance->status_txt === __('message.Taking'))
                                    @if (auth()->guard('adviser')->check())
                                        <!-- 受講完了モーダル -->
                                            <div class="modal p-modal p-setting fade" id="closeModal{{ $index }}" tabindex="-1" aria-labelledby="closeModalLabel{{ $index }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                                        <div class="modal-body">
                                                            <h2 class="p-heading2 mt-0 text-center">{{ __('message.Recruitment confirmation confirmation') }}</h2>
                                                            <p class="text-center">{{ $attendance->mateUser->full_name ?? '退会ユーザー' }}{{ __('message.Complete the attendance of.') }}<br>{{ __('message.Is it OK?') }}</p>
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
                                    <!-- キャンセルモーダル -->
                                        <div class="modal p-modal p-setting fade" id="cancelModal{{ $index }}" tabindex="-1" aria-labelledby="cancelModalLabel{{ $index }}">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                                    <div class="modal-body">
                                                        <h2 class="p-heading2 mt-0 text-center">{{ __('message.Cancel confirmation') }}</h2>
                                                        <p class="text-center">「{{ $attendance->lesson->name }}」{{ __('message.Cancel the attendant.') }}<br>{{ __('message.Is it OK?') }}</p>
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
                                            <div class="modal p-modal p-setting fade" id="reportModal{{ $index }}" tabindex="-1" aria-labelledby="reportModalLabel{{ $index }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                                        <div class="modal-body">
                                                            <h2 class="p-heading2 mt-0 text-center">{{ __('message.Confirmation confirmation') }}</h2>
                                                            <p class="text-center">「{{ $attendance->lesson->name }}」{{ __('message.Report of') }}<br>{{ __('message.Is it OK?') }}</p>
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
                                <!-- ************ /モーダルたち ************ -->
                            @endif

                            <!-- ********* 右上に表示するステータスラベル ********* -->
                            <div class="p-card3__status">
                                <div class="p-status-label {{ $attendance->status_class }}">
                                    {{ $attendance->status_txt }}
                                </div>
                            </div><!-- /.p-card3__status -->
                        </div><!-- /.p-card3 -->
                        <!-- ********* /右上に表示するステータスラベル ********* -->
                    @empty
                        <div>{{ __('message.Could not find applicable.') }}</div>
                    @endforelse
                </div><!--/.tab-pane -->
            </div><!-- /.p-search__content -->
            <div class="text-center">
                {!! $attendances->appends([
                        'condition[lesson_name]' => $condition['lesson_name'] ?? '',
                        'condition[user_name]' => $condition['user_name'] ?? '',
                        'condition[status]' => $condition['status'] ?? '',
                        'condition[date_start]' => $condition['date_start'] ?? '',
                        'condition[date_end]' => $condition['date_end'] ?? '',
                    ])->render('vendor.pagination.custom')!!}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
