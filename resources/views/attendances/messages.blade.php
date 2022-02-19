@extends('layouts.app')

@section('title', __('message.message'))

@section('content')
    <section class="p-message l-content-block">
        <div class="container">
            @if (count($attendance->reviews) !== 0)
            <div class="p-5 p-review">
                <h3 class="p-heading3"><b>{{ __('message.review') }}</b></h3>
                <div class="px-5 d-flex flex-column align-items-center p-review__list">
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

            @if ($attendance->can_review && !$attendance->done_review)
                <div class="text-center mb-70px">
                    <a class="p-btn--rect btn-warning p-4" href="{{ route('attendances.review-form', compact('attendance')) }}">{{ __('message.Register Review') }}</a>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap mt-3">
                <h1 class="fs-2 fw-bold">「{{ $attendance->lesson->name }}」 {{ __('message.Message about') }}</h1>
                @if (auth()->guard('adviser')->check() && $attendance->can_message_action)
                    <button type="button" class="p-btn p-btn__defalut px-70px mt-3" data-bs-toggle="modal" data-bs-target="#closeModal">
                    {{ __('message.To attend the completion') }}
                    </button>
                @endif
            </div>

            @forelse ($attendance->messages as $message)
                <div class="p-message__message-box">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <img src="{{ $message->user->avatar_image ?? asset('img/default-avatar.png') }}" class="p-message__avatar" alt="{{ $message->user ? $message->user->full_name : '退会ユーザー' }}{{ __('message.Profile image') }}">
                            <span class="fw-bold ms-3">{{ $message->user->full_name ?? '退会ユーザー' }}</span>
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
                    <p class="text-center m-3">{{ __('message.There is no message yet') }}</p>
                </div>
            @endforelse

            @if ($attendance->can_message_action)
                @if (!auth()->guard('admin')->check())
                    <div class="p-message__message-box">
                    <form action="{{ route('attendances.send-message', compact('attendance')) }}" method="post">
                        @csrf
                        <textarea class="p-message__textarea" placeholder="{{ __('message.Enter a message') }}"
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
                            <button type="submit" class="p-btn p-btn--rect p-btn__black px-75px">{{ __('message.Send') }}</button>
                        </div>
                    </form>
                </div>

                    <div class="p-message__action">
                        @if (auth()->guard('adviser')->check())
                            <button type="button" class="p-btn p-btn__defalut d-inline-block px-70px" data-bs-toggle="modal" data-bs-target="#closeModal">
                            {{ __('message.To attend the completion') }}
                            </button>
                        @endif
                    </div>
                @endif
            @else
                <div class="p-message__message-box text-center p-error-text">
                {{ __('message.This will be closed, so you can not send and receive messages.') }}<br>
                {{ __('message.If you have trouble') }}<a class="primary-link" href="{{ route('contact.index') }}" target="_blank">{{ __('message.inquiry') }}</a>{{ __('message.Please give me.') }}
                </div>
            @endif
        </div><!-- /.container -->

        @if (auth()->guard('adviser')->check() && $attendance->can_message_action)
            <!-- 受講完了モーダル -->
            <div class="modal p-modal p-setting fade" id="closeModal" tabindex="-1" aria-labelledby="closeModalLabel">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                        <div class="modal-body">
                            <h2 class="p-heading2 mt-0 text-center">{{ __('message.Recruitment confirmation confirmation') }}</h2>
                            <p class="text-center">{{ $attendance->mateUser->full_name ?? '' }}{{ __('message.Complete the attendance of.') }}<br>{{ __('message.Is it OK?') }}</p>
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
    </section>
@endsection