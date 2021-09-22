@extends('layouts.app')

@section('title', '受講一覧')

@section('content')
    <section class="p-searchblock bg-light l-content-block">
        <div class="container">
            <form action="" class="p-form">
                <a class="p-btn p-btn__outline d-md-none" data-bs-toggle="collapse" href="#collapseDetail" role="button" aria-expanded="false" aria-controls="collapseDetail">
                    検索
                </a>
                <div class="collapse" id="collapseDetail">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">レッスン名</h3>
                            <input type="text" class="form-control" placeholder="記入してください"
                                   name="condition[lesson_name]"
                                   value="{{ isset($condition['lesson_name']) ? $condition['lesson_name'] : '' }}"
                            />
                        </div>
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">ユーザー名</h3>
                            <input type="text" class="form-control" placeholder="記入してください"
                                   name="condition[user_name]"
                                   value="{{ isset($condition['user_name']) ? $condition['user_name'] : '' }}"
                            />
                        </div>
                        <div class="col-md-6 mb-md-4">
                            <h3 class="p-heading3">ステータス</h3>
                            <select class="form-select" name="condition[status]">
                                <option value="">指定しない</option>
                                <option value="-1" {{ (isset($condition['status']) ? $condition['status'] : '') == -1 ? 'selected' : '' }}>
                                    受講申請キャンセル
                                </option>
                                <option value="1" {{ (isset($condition['status']) ? $condition['status'] : '') == 1 ? 'selected' : '' }}>
                                    受講申請中
                                </option>
                                <option value="2" {{ (isset($condition['status']) ? $condition['status'] : '') == 2 ? 'selected' : '' }}>
                                    受講中
                                </option>
                                <option value="3" {{ (isset($condition['status']) ? $condition['status'] : '') == 3 ? 'selected' : '' }}>
                                    受講否認
                                </option>
                                <option value="4" {{ (isset($condition['status']) ? $condition['status'] : '') == 4 ? 'selected' : '' }}>
                                    キャンセル
                                </option>
                                <option value="5" {{ (isset($condition['status']) ? $condition['status'] : '') == 5 ? 'selected' : '' }}>
                                    通報
                                </option>
                                <option value="6" {{ (isset($condition['status']) ? $condition['status'] : '') == 6 ? 'selected' : '' }}>
                                    受講完了
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h3 class="p-heading3">受講日</h3>
                            <div class="d-flex align-items-center">
                                <input type="date" class="form-control" placeholder="記入してください"
                                       name="condition[date_start]"
                                       value="{{ isset($condition['date_start']) ? $condition['date_start'] : '' }}"
                                />
                                <span class="mx-2">〜</span>
                                <input type="date" class="form-control" placeholder="記入してください"
                                       name="condition[date_end]"
                                       value="{{ isset($condition['date_end']) ? $condition['date_end'] : '' }}"
                                />
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <div class="d-flex justify-content-end align-items-center p-searchblock__controls">
                        @if (auth()->guard('admin')->check())
                            <a class="primary-link mx-5" href="{{ route('admin.attendances.index') }}">リセット</a>
                        @else
                            <a class="primary-link mx-5" href="{{ route('attendances.index') }}">リセット</a>
                        @endif
                        <button class="p-btn p-btn__black d-inline-block mt-2 py-2 px-5">検索</button>
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
                                        <img src="{{ $attendance->adviserUser->avatar_image ?? asset('img/default-avatar.png') }}" alt="講師画像">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <p>講師</p>
                                        <h4>
                                            @if ($attendance->adviserUser)
                                                <a href="{{ route('advisers.show', ['adviserUser' => $attendance->adviserUser]) }}" target="_blank">
                                                    {{ $attendance->adviserUser->full_name ?? '退会ユーザー' }}
                                                </a>
                                            @else
                                                退会ユーザー
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                            @elseif ($userType === 'adviser')
                                <div class="p-card3__advisor">
                                    <div class="p-card3__advisor_img">
                                        <img src="{{ $attendance->mateUser->avatar_image ?? asset('img/default-avatar.png') }}" alt="講師画像">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <p>受講者</p>
                                        <h4>{{ $attendance->mateUser->full_name ?? '退会ユーザー' }}</h4>
                                    </div>
                                </div>
                            @else
                                <div class="p-card3__advisor">
                                    <div class="p-card3__advisor_img">
                                        <img src="{{ $attendance->adviserUser->avatar_image ?? asset('img/default-avatar.png') }}" alt="講師画像">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <p>講師</p>
                                        <h4>
                                            @if ($attendance->adviserUser)
                                                <a href="{{ route('advisers.show', ['adviserUser' => $attendance->adviserUser]) }}" target="_blank">
                                                    {{ $attendance->adviserUser->full_name ?? '退会ユーザー' }}
                                                </a>
                                            @else
                                                退会ユーザー
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                                <div class="p-card3__advisor">
                                    <div class="p-card3__advisor_img">
                                        <img src="{{ $attendance->mateUser->avatar_image ?? asset('img/default-avatar.png') }}" alt="講師画像">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <p>受講者</p>
                                        <h4>{{ $attendance->mateUser->full_name ?? '退会ユーザー' }}</h4>
                                    </div>
                                </div>
                           @endif
                            <div class="p-card3__detail">
                                <div class="mb-4">
                                    <p>レッスン名</p>
                                    <a href="{{ route('lessons.show', ['lesson' => $attendance->lesson ]) }}" target="_blank">
                                        <h3>{{ $attendance->lesson->name }}</h3>
                                    </a>
                                </div>
                                <div>
                                    <p>受講日時</p>
                                    <h3>{{ $attendance->datetime_txt }}</h3>
                                </div>
                                <a href="{{ route('attendances.show', compact('attendance')) }}" class="p-btn p-btn__defalut d-inline-block mt-2 py-2 px-3">
                                    受講詳細へ
                                </a>
                            </div><!--/.p-card3__detail -->

                            @if ($userType !== 'admin')
                                <!-- ********* ステータスに応じた各アクション ********* -->
                                <div class="p-card3__controls">
                                        @if ($attendance->status_txt === '受講申請中')
                                            @if (auth()->guard('adviser')->check())
                                                <button type="button" class="p-btn--rect btn-success" data-bs-toggle="modal" data-bs-target="#approvalModal{{ $index }}">
                                                    承認する
                                                </button>
                                                <button type="button" class="p-btn--rect btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $index }}">
                                                    否認する
                                                </button>
                                            @else
                                                <button type="button" class="p-btn--rect btn-danger" data-bs-toggle="modal" data-bs-target="#requestCancelModal{{ $index }}">
                                                    申請キャンセル
                                                </button>
                                            @endif
                                        @endif
                                        @if ($attendance->status_txt === '受講中' || $attendance->status_txt === '受講完了' ||
                                             $attendance->status_txt === 'キャンセル' || $attendance->status_txt === '通報')
                                            <a class="p-btn--rect py-2 px-3 p-btn__defalut" href="{{ route('attendances.messages', compact('attendance')) }}">メッセージ</a>
                                        @endif
                                        @if ($attendance->status_txt === '受講中')
                                            @if (auth()->guard('adviser')->check())
                                                <button type="button" class="p-btn--rect btn-success" data-bs-toggle="modal" data-bs-target="#closeModal{{ $index }}">
                                                    受講完了にする
                                                </button>
                                            @endif
                                            <button type="button" class="p-btn--rect btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal{{ $index }}">
                                                キャンセル
                                            </button>
                                            <button type="button" class="p-btn--rect btn-danger" data-bs-toggle="modal" data-bs-target="#reportModal{{ $index }}">
                                                通報する
                                            </button>
                                        @endif
                                        @if ($attendance->can_review)
                                            @if (!$attendance->done_review)
                                                <a class="p-btn--rect btn-warning" href="{{ route('attendances.review-form', compact('attendance')) }}">レビュー登録</a>
                                            @else
                                                <a class="p-btn--rect btn-warning btn-disabled" disabled>レビュー済み</a>
                                            @endif
                                        @endif
                                    </div><!-- /.p-card3__controls -->
                                <!-- ********* /ステータスに応じた各アクション ********* -->
                                <!-- ************ モーダルたち ************ -->
                                @if ($attendance->status_txt === '受講申請中')
                                    @if (auth()->guard('adviser')->check())
                                        <!-- 承認モーダル -->
                                            <div class="modal p-modal p-setting fade" id="approvalModal{{ $index }}" tabindex="-1" aria-labelledby="approvalModalLabel{{ $index }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                        <div class="modal-body">
                                                            <h2 class="p-heading2 mt-0 text-center">承認確認</h2>
                                                            <p class="text-center">{{ $attendance->mateUser->full_name ?? '退会ユーザー' }}さんからの受講申請を承認します。<br>よろしいですか？</p>
                                                            <form action="{{ route('attendances.approval', compact('attendance')) }}" method="post">
                                                                @csrf
                                                                <button class="p-btn p-btn__defalut">承認する</button>
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
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                        <div class="modal-body">
                                                            <h2 class="p-heading2 mt-0 text-center">否認確認</h2>
                                                            <p class="text-center">{{ $attendance->mateUser->full_name ?? '退会ユーザー' }}さんからの受講申請を否認します。</p>
                                                            <form action="{{ route('attendances.reject', compact('attendance')) }}" method="post">
                                                                @csrf
                                                                <textarea rows="5" class="form-control mt-2" name="reject_text" placeholder="否認メッセージを必ず入力してください" required></textarea>
                                                                <button class="p-btn p-btn__defalut">否認する</button>
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
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                        <div class="modal-body">
                                                            <h2 class="p-heading2 mt-0 text-center">申請キャンセル確認</h2>
                                                            <p class="text-center">「{{ $attendance->lesson->name }}」の受講申請をキャンセルします。</p>
                                                            <form action="{{ route('attendances.cancel-request', compact('attendance')) }}" method="post">
                                                                @csrf
                                                                <button class="p-btn p-btn__defalut">キャンセルする</button>
                                                            </form>
                                                        </div><!-- /.modal-body -->
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            <!-- /申請キャンセルモーダル -->
                                    @endif
                                @endif
                                @if ($attendance->status_txt === '受講中')
                                    @if (auth()->guard('adviser')->check())
                                        <!-- 受講完了モーダル -->
                                            <div class="modal p-modal p-setting fade" id="closeModal{{ $index }}" tabindex="-1" aria-labelledby="closeModalLabel{{ $index }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                        <div class="modal-body">
                                                            <h2 class="p-heading2 mt-0 text-center">受講完了確認</h2>
                                                            <p class="text-center">{{ $attendance->mateUser->full_name ?? '退会ユーザー' }}さんの受講を完了します。<br>よろしいですか？</p>
                                                            <form action="{{ route('attendances.close', compact('attendance')) }}" method="post">
                                                                @csrf
                                                                <button class="p-btn p-btn__defalut">完了する</button>
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
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                    <div class="modal-body">
                                                        <h2 class="p-heading2 mt-0 text-center">キャンセル確認</h2>
                                                        <p class="text-center">「{{ $attendance->lesson->name }}」の受講をキャンセルします。<br>よろしいですか？</p>
                                                        <form action="{{ route('attendances.cancel', compact('attendance')) }}" method="post">
                                                            @csrf
                                                            <button class="p-btn p-btn__defalut">キャンセルする</button>
                                                        </form>
                                                    </div><!-- /.modal-body -->
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <!-- /キャンセルモーダル -->
                                        <!-- 通報モーダル -->
                                        <div class="modal p-modal p-setting fade" id="reportModal{{ $index }}" tabindex="-1" aria-labelledby="reportModalLabel{{ $index }}">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                    <div class="modal-body">
                                                        <h2 class="p-heading2 mt-0 text-center">通報確認</h2>
                                                        <p class="text-center">「{{ $attendance->lesson->name }}」の受講を通報します。<br>よろしいですか？</p>
                                                        <form action="{{ route('attendances.report', compact('attendance')) }}" method="post">
                                                            @csrf
                                                            <button class="p-btn p-btn__defalut">通報する</button>
                                                        </form>
                                                    </div><!-- /.modal-body -->
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <!-- /通報モーダル -->
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
                        <div>該当の受講は見つかりませんでした。</div>
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
