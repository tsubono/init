@extends('layouts.app')

@section('title', 'メッセージ')

@section('content')
    <section class="p-message l-content-block">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap mt-3">
                <h1 class="fs-2 fw-bold">「{{ $attendance->lesson->name }}」 に関するメッセージ</h1>
                @if (auth()->guard('adviser')->check() && $canAction)
                    <button type="button" class="p-btn p-btn__defalut px-70px mt-3" data-bs-toggle="modal" data-bs-target="#closeModal">
                        受講完了にする
                    </button>
                @endif
            </div>

            @forelse ($attendance->messages as $message)
                <div class="p-message__message-box">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <img src="{{ $message->user->avatar_image }}" class="p-message__avatar" alt="{{ $message->user->full_name }}のプロフィール画像">
                            <span class="fw-bold ms-3">{{ $message->user->full_name }}</span>
                        </div>
                        <time>{{ $message->created_at->format('Y/m/d H:i') }}</time>
                    </div>
                    <div class="p-message__content ms-3">
                        <div class="p-message__message">{!! nl2br(e($message->content)) !!}</div>

                        <ul class="p-message__attachment-list mt-4">
                            @if (!is_null($message->file_path_1))
                                <li>
                                    <a class="p-message__attachment" href="{{ route('attendances.download', compact('attendance') + ['attendanceMessage' => $message, 'fileIndex' => 1]) }}">
                                        {{ $message->file_name_1 }}
                                    </a>
                                </li>
                            @endif
                            @if (!is_null($message->file_path_2))
                                <li>
                                    <a class="p-message__attachment" href="{{ route('attendances.download', compact('attendance') + ['attendanceMessage' => $message, 'fileIndex' => 2]) }}">
                                        {{ $message->file_name_2 }}
                                    </a>
                                </li>
                            @endif
                            @if (!is_null($message->file_path_3))
                                <li>
                                    <a class="p-message__attachment" href="{{ route('attendances.download', compact('attendance') + ['attendanceMessage' => $message, 'fileIndex' => 3]) }}">
                                        {{ $message->file_name_3 }}
                                    </a>
                                </li>
                            @endif
                        </ul>

                        <div class="p-message__is-read">
                            @if ($message->is_read)
                                @if ((auth()->guard('adviser')->check() && $message->adviser_user_id == auth()->guard('adviser')->user()->id) ||
                                    auth()->guard('mate')->check() && $message->mate_user_id == auth()->guard('mate')->user()->id)
                                    既読
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-message__message-box">
                    <p class="text-center m-3">まだメッセージはありません</p>
                </div>
            @endforelse

            @if ($canAction)
                <div class="p-message__message-box">
                    <form action="{{ route('attendances.send-message', compact('attendance')) }}" method="post">
                        @csrf
                        <textarea class="p-message__textarea" placeholder="メッセージを入力"
                                  name="content">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        <div class="d-flex justify-content-between align-items-start mt-4">
                            <div class="d-flex flex-column">
                                <file-upload-not-preview
                                        name-file-path="file_path_1"
                                        name-file-name="file_name_1"
                                        upload-dir="uploaded/messages/{{ $attendance->id }}"
                                        value-file-path="{{ old('file_path_1') }}"
                                        value-file-name="{{ old('file_name_1') }}"
                                ></file-upload-not-preview>

                                <div class="mt-10px">
                                    <file-upload-not-preview
                                            name-file-path="file_path_2"
                                            name-file-name="file_name_2"
                                            upload-dir="uploaded/messages/{{ $attendance->id }}"
                                            value-file-path="{{ old('file_path_2') }}"
                                            value-file-name="{{ old('file_name_2') }}"
                                    ></file-upload-not-preview>
                                </div>

                                <div class="mt-10px">
                                    <file-upload-not-preview
                                            name-file-path="file_path_3"
                                            name-file-name="file_name_3"
                                            upload-dir="uploaded/messages/{{ $attendance->id }}"
                                            value-file-path="{{ old('file_path_3') }}"
                                            value-file-name="{{ old('file_name_3') }}"
                                    ></file-upload-not-preview>
                                </div>
                            </div>
                            <button type="submit" class="p-btn p-btn--rect p-btn__black px-75px">送信する</button>
                        </div>
                    </form>
                </div>

                <div class="p-message__action">
                    @if (auth()->guard('adviser')->check())
                        <button type="button" class="p-btn p-btn__defalut d-inline-block px-70px" data-bs-toggle="modal" data-bs-target="#closeModal">
                            受講完了にする
                        </button>
                    @endif
                </div>
            @else
                <div class="p-message__message-box text-center p-error-text">この受講は完了しているのでメッセージの送受信は行えません</div>
            @endif
        </div><!-- /.container -->

        @if (auth()->guard('adviser')->check() && $canAction)
            <!-- 受講完了モーダル -->
            <div class="modal p-modal p-setting fade" id="closeModal" tabindex="-1" aria-labelledby="closeModalLabel">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                        <div class="modal-body">
                            <h2 class="p-heading2 mt-0 text-center">受講完了確認</h2>
                            <p class="text-center">{{ $attendance->mateUser->full_name }}さんの受講を完了します。<br>よろしいですか？</p>
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
    </section>
@endsection