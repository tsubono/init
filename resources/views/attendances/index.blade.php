@extends('layouts.app')

@section('title', '受講一覧')

@section('content')
    <section class="p-searchblock bg-light l-content-block">
        <div class="container">
            <form action="" class="p-form">
                <div class="collapse" id="collapseDetail">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">レッスン名</h3>
                            <input type="text" class="form-control" placeholder="記入してください"
                                   name="search[lesson_name]"
                                   value="{{ isset($search['lesson_name']) ? $search['lesson_name'] : '' }}"
                            />
                        </div>
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">ユーザー名</h3>
                            <input type="text" class="form-control" placeholder="記入してください"
                                   name="search[user_name]"
                                   value="{{ isset($search['user_name']) ? $search['user_name'] : '' }}"
                            />
                        </div>
                        <div class="col-md-6 mb-md-4">
                            <h3 class="p-heading3">ステータス</h3>
                            <select class="form-select" name="search[status]">
                                <option selected>指定しない</option>
                                <option value="1" {{ (isset($search['status']) ? $search['status'] : '') == 1 ? 'selected' : '' }}>
                                    受講申請中
                                </option>
                                <option value="2" {{ (isset($search['status']) ? $search['status'] : '') == 2 ? 'selected' : '' }}>
                                    受講中
                                </option>
                                <option value="3" {{ (isset($search['status']) ? $search['status'] : '') == 3 ? 'selected' : '' }}>
                                    受講否認
                                </option>
                                <option value="4" {{ (isset($search['status']) ? $search['status'] : '') == 4 ? 'selected' : '' }}>
                                    キャンセル
                                </option>
                                <option value="5" {{ (isset($search['status']) ? $search['status'] : '') == 5 ? 'selected' : '' }}>
                                    通報
                                </option>
                                <option value="6" {{ (isset($search['status']) ? $search['status'] : '') == 6 ? 'selected' : '' }}>
                                    受講完了
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <h3 class="p-heading3">受講日</h3>
                            <div class="d-flex align-items-center">
                                <input type="date" class="form-control" placeholder="記入してください"
                                       name="search[date_start]"
                                       value="{{ isset($search['date_start']) ? $search['date_start'] : '' }}"
                                />
                                <span class="mx-2">〜</span>
                                <input type="date" class="form-control" placeholder="記入してください"
                                       name="search[date_end]"
                                       value="{{ isset($search['date_end']) ? $search['date_end'] : '' }}"
                                />
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.collapse -->
                <div class="d-flex justify-content-end">
                    <button class="p-btn p-btn__black w-25">検索</button>
                </div>
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
                            <div class="p-card3__advisor">
                                @if ($userType === 'mate')
                                    <div class="p-card3__advisor_img">
                                        <img src="{{ $attendance->adviserUser->avatar_image ?? asset('img/default-avatar.png') }}" alt="アドバイザー画像">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <p>講師</p>
                                        <h4>
                                            @if ($attendance->adviserUser)
                                                <a href="{{ route('advisers.show', ['adviserUser' => $attendance->adviserUser]) }}">
                                                    {{ $attendance->adviserUser->full_name ?? '退会ユーザー' }}
                                                </a>
                                            @else
                                                退会ユーザー
                                            @endif
                                        </h4>
                                    </div>
                                @else
                                    <div class="p-card3__advisor_img">
                                        <img src="{{ $attendance->mateUser->avatar_image ?? asset('img/default-avatar.png') }}" alt="アドバイザー画像">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <p>受講者</p>
                                        <h4>
                                            {{ $attendance->mateUser->full_name ?? '退会ユーザー' }}
                                        </h4>
                                    </div>
                                @endif
                            </div>
                            <div class="p-card3__detail">
                                <div class="mb-5">
                                    <p>レッスン名</p>
                                    <a href="{{ route('lessons.show', ['lesson' => $attendance->lesson ]) }}">
                                        <h3>{{ $attendance->lesson->name }}</h3>
                                    </a>
                                </div>
                                <div>
                                    <p>受講日時</p>
                                    <h3>{{ $attendance->datetime_txt }}</h3>
                                </div>
                                <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#detailModal{{ $index }}">
                                    詳細
                                </button>
                            </div><!--/.p-card3__detail -->
                            <!-- TODO 講師が受講承諾するまでの間に、生徒から受講キャンセルが可能としたい -->
                            <div class="p-card3__controls">
                                @if ($attendance->status_txt === '受講申請中' && auth()->guard('adviser')->check())
                                    <button type="button" class="p-btn--rect btn-success" data-bs-toggle="modal" data-bs-target="#approvalModal{{ $index }}">
                                        承認する
                                    </button>
                                    <button type="button" class="p-btn--rect btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $index }}">
                                        否認する
                                    </button>
                                @endif
                                @if ($attendance->status_txt === '受講中')
                                    <a class="p-btn--rect btn-default" href="{{ route('attendances.messages', compact('attendance')) }}">メッセージ</a>
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
                                @if ($attendance->status_txt === '受講完了')
                                        <a class="p-btn--rect btn-default" href="{{ route('attendances.messages', compact('attendance')) }}">メッセージ</a>
                                @endif
                            </div><!-- /.p-card3__controls -->
                            <div class="p-card3__status">
                                <div class="p-card3__status_label {{ $attendance->status_class }}">
                                    {{ $attendance->status_txt }}
                                </div>
                            </div><!-- /.p-card3__status -->
                        </div><!-- /.p-card3 -->

                        <!-- ************ モーダルたち ************ -->
                        @if ($attendance->status_txt === '受講申請中' && auth()->guard('adviser')->check())
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
                                <!-- /キャンセルモーダル -->
                        @endif
                        <!-- 詳細モーダル -->
                        <div class="modal p-modal p-setting fade" id="detailModal{{ $index }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $index }}">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                    <div class="modal-body">
                                        <h2 class="p-heading2 mt-0 text-center">受講詳細</h2>
                                        <div class="mb-3">
                                            <h3 class="p-heading3">レッスン名</h3>
                                            <a href="{{ route('lessons.show', ['lesson' => $attendance->lesson]) }}">
                                                <p>{{ $attendance->lesson->name }}</p>
                                            </a>
                                        </div>
                                        @if (auth()->guard('mate')->check())
                                            <div class="mb-3">
                                                <h3 class="p-heading3">アドバイザー</h3>
                                                @if ($attendance->adviserUser)
                                                    <a href="{{ route('advisers.show', ['adviserUser' => $attendance->adviserUser]) }}">
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
                                            <p>{{ $attendance->status_txt }}</p>

                                            @if ($attendance->status == \App\Models\Attendance::STATUS_CANCEL)
                                                <p>キャンセルしたユーザー: {{ !is_null($attendance->cancel_cause_mate_user_id) ? $attendance->mateUser->full_name ?? '退会ユーザー' : $attendance->adviserUser->full_name ?? '退会ユーザー' }}</p>
                                            @endif
                                            @if ($attendance->status == \App\Models\Attendance::STATUS_REPORT)
                                                <p>通報されたユーザー: {{ !is_null($attendance->cancel_cause_mate_user_id) ? $attendance->mateUser->full_name ?? '退会ユーザー' : $attendance->adviserUser->full_name ?? '退会ユーザー' }}</p>
                                            @endif
                                        </div>
                                    </div><!-- /.modal-body -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- /詳細モーダル -->
                        <!-- ************ /モーダルたち ************ -->
                    @empty
                        <div>該当の受講は見つかりませんでした。</div>
                    @endforelse
                </div><!--/.tab-pane -->
            </div><!-- /.p-search__content -->
            <!-- TODO ページネーション -->
        </div><!-- /.container -->
    </section>
@endsection
