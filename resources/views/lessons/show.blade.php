@extends('layouts.app')

@section('title', __('message.Lesson Details'))

@section('content')
    <section class="l-content-block p-lesson-show">
        <div class="container">
            @if (auth()->guard('adviser')->check() && auth()->guard('adviser')->user()->id === $lesson->adviser_user_id)
                <div class="p-lesson-show__edit-btn">
                    <a href="{{ route('adviser.lessons.edit', compact('lesson')) }}" class="p-btn p-btn--edit p-btn__outline">{{ __('message.Edit lesson') }}</a>
                </div>
            @endif
            <div class="d-flex align-items-baseline mb-40px">
                <ul class="p-lesson-show__categories">
                    @foreach ($lesson->categories as $category)
                        <li>
                            <div class="p-category d-inline-block pe-5">
                                <img src="{{ $category->icon_path }}" alt="{{ __('message.icon') }}" />
                                {{ $category->name }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-40px">
                            <h2 class="fs-2 fw-bold mb-4">{{ $lesson->name }}</h2>
                            <img src="{{ $lesson->eye_catch_image }}" alt="{{ $lesson->name }}" class="w-100 img-fluid eye-catch-img">
                            <div class="d-flex flex-wrap p-image-list mt-2 mx-3">
                                @foreach ($lesson->images as $index => $image)
                                    @if (!$loop->first)
                                        <a data-bs-toggle="modal" data-bs-target="#imageModal{{ $index }}">
                                            <img src="{{ $image->image_path }}" alt="{{ $lesson->name }}" class="img-fluid p-image-list__thumbnail m-1">
                                        </a>
                                        <div class="modal fade p-modal" id="imageModal{{ $index }}" tabindex="-1" aria-labelledby="imageModal{{ $index }}Label">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                                    <div class="modal-body">
                                                        <div class="iframe-wrapper">
                                                            <img src="{{ $image->image_path }}" alt="{{ $lesson->name }}" class="w-100">
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3 class="p-heading2">{{ __('message.Explanation') }}</h3>
                            <p class="ws-pre-line">{!! nl2br(e($lesson->description)) !!}</p>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div class="flex-fill me-3">
                                    <h3 class="p-heading2 mb-0">{{ __('message.Required coin') }}</h3>
                                    <div class="border p-3">{{ number_format($lesson->coin_amount) }}{{ __('message.coin') }}</div>
                                </div>
                                <div class="flex-fill ms-3">
                                    <h3 class="p-heading2 mb-0">{{ __('message.language') }}</h3>
                                    <div class="border p-3">{{ $lesson->language->name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3 class="p-heading2">{{ __('message.movie') }}</h3>
                            <movie-list :movies="{{ $lesson->movies }}"></movie-list>
                        </div><!-- /.col-md-12 -->
                        @if (auth()->guard('mate')->check())
                            <div class="col-md-12 mt-5">
                                <div class="border request-form">
                                    <form class="p-form" action="{{ route('attendances.request', compact('lesson')) }}" method="post">
                                        @csrf
                                        <div>
                                            <label class="mb-2">{{ __('message.Desired date and time') }}</label>
                                            <div class="row pe-100px">
                                                <div class="col-md-6 col-xs-12">
                                                    <input type="date" class="form-control" placeholder="2021/12/12" name="date" value="{{ old('date') }}">
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <input type="time" class="form-control" placeholder="20:30" name="time" value="{{ old('time') }}">
                                                </div>
                                            </div>
                                            <p class="small p-error-text">
                                                {{ __('message.※ The advisers lessonable time is a summer time deployment country and an uninfected country, and the display may be shifted by one hour.') }}
                                            </p>
                                            @error('date')
                                            <div class="p-error-text" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                            @error('time')
                                            <div class="p-error-text" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mt-40px">
                                            <label class="mb-2">{{ __('message.message') }}</label>
                                            <textarea class="form-control" rows="6" name="request_text">{{ old('request_text') }}</textarea>
                                            @error('request_text')
                                            <div class="p-error-text" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="text-center mt-5">
                                            <button type="submit" class="p-btn p-btn__defalut d-inline-block px-90px"
                                                {{ auth()->guard('mate')->user()->total_coin_amount < $lesson->coin_amount ? 'disabled' : '' }}>
                                                {{ __('message.Attendance application') }}
                                            </button>
                                            @if (auth()->guard('mate')->user()->total_coin_amount < $lesson->coin_amount)
                                                <p class="p-error-text">
                                                    {{ __('message.There is a shortage of coins held') }} <br>
                                                    <a href="{{ route('mate.coins.buy') }}" target="_blank" class="primary-link">{{ __('message.Here') }}</a>{{ __('message.Please purchase from') }}
                                                </p>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 adviser-info">
                    @include('components.adviser-info-block', ['adviserUser' => $lesson->adviserUser])

                    <div class="text-center mt-5">
                        <a href="{{ route('advisers.show', ['adviserUser' => $lesson->adviserUser]) }}" class="p-btn p-btn__defalut d-inline-block px-90px mb-3">{{ __('message.profile') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
