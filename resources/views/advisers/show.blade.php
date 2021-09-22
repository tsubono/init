@extends('layouts.app')

@section('title', '講師プロフィール')

@section('content')
    <section class="l-content-block p-profile">
        <div class="container">
            <div class="p-profile__edit">
                @if (auth()->guard('adviser')->check() && auth()->guard('adviser')->user()->id === $adviserUser->id)
                <a href="{{ route('adviser.profile.edit') }}" class="p-btn p-btn--edit p-btn__outline">プロフィールを編集</a>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 p-profile__summary">
                    @include('components.adviser-info-block', ['adviserUser' => $adviserUser])
                </div><!-- /.p-profile__summary -->
                <div class="col-lg-9 col-md-8 p-profile__detail">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="p-heading2">教えられる言語</h3>
                            <ul class="p-profile__language">
                                @foreach ($adviserUser->languages as $language)
                                    <li>・{{ $language->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3 class="p-heading2">教えられるカテゴリ</h3>
                            <ul class="p-profile__category">
                                @foreach ($adviserUser->categories as $category)
                                    <li>
                                        <div class="p-category">
                                            <img src="{{ $category->icon_path }}" alt="アイコン" />
                                            {{ $category->name }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @if (!empty($adviserUser->qualification_text))
                            <div class="col-md-12">
                                <h3 class="p-heading2">保有資格</h3>
                                <div class="p-profile__message">
                                    <p>{!! nl2br(e($adviserUser->qualification_text)) !!}</p>
                                </div>
                            </div>
                        @endif
                        @if (!empty($adviserUser->pr_text))
                            <div class="col-md-12">
                                <h3 class="p-heading2">自己PR</h3>
                                <div class="p-profile__message">
                                    <p>{!! nl2br(e($adviserUser->pr_text)) !!}</p>
                                </div>
                            </div>
                        @endif
                        @if (count($adviserUser->adviserUserMovies) !== 0)
                            <div class="col-md-12">
                                <h3 class="p-heading2">動画URL</h3>
                                <movie-list :movies="{{ $adviserUser->adviserUserMovies }}"></movie-list>
                            </div><!-- /.col-md-12 -->
                        @endif
                        <div class="col-md-12">
                            <h3 class="p-heading2">講師をするきっかけ</h3>
                            <div class="p-profile__reason">
                                <p>{!! nl2br(e($adviserUser->reason_text)) !!}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3 class="p-heading2">講師をする意気込み</h3>
                            <div class="p-profile__enthusiasm">
                                <p>{!! nl2br(e($adviserUser->passion_text)) !!}</p>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="d-flex flex-wrap p-image-list">
                                @foreach ($adviserUser->adviserUserImages as $index => $image)
                                    <a data-bs-toggle="modal" data-bs-target="#imageModal{{ $index }}">
                                        <img class="img-fluid p-image-list__thumbnail m-1" src="{{ $image->image_path }}" alt="{{ $adviserUser->full_name }}">
                                    </a>
                                    <div class="modal fade p-modal" id="imageModal{{ $index }}" tabindex="-1" aria-labelledby="imageModal{{ $index }}Label">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                <div class="modal-body">
                                                    <div class="iframe-wrapper">
                                                        <img src="{{ $image->image_path }}" alt="{{ $adviserUser->full_name }}" class="w-100">
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div><!-- /.p-profile__detail -->
            </div>
            <div class="p-profile__lesson-block">
                <h2 class="p-heading1 text-center">
                    <div class="p-heading1__en blue">lessons</div>
                    レッスン一覧
                </h2>
                <div class="p-profile__lesson-list">
                    @forelse ($adviserUser->open_lessons as $lesson)
                        <div class="p-card p-card--lesson">
                            <a href="{{ route('lessons.show', compact('lesson')) }}" class="h-100">
                                <div class="p-card__img">
                                    <img src="{{ $lesson->eye_catch_image }}" alt="{{ $lesson->name }}">
                                </div>
                                <div class="p-card__info text-start">
                                    <div class="p-card__name">{{ $lesson->name }}</div>
                                    <div class="text-black-50 mt-2">{{ Str::limit($lesson->descripton, 20) }}</div>
                                    <div class="p-card__category mt-3">
                                        <ul class="justify-content-start">
                                            @foreach ($lesson->categories as $category)
                                                <li>#{{ $category->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="d-flex">
                                        <span class="ms-3">
                                            <img src="{{ asset('img/icon-point.svg') }}" alt="Point" class="me-1">
                                            {{ number_format($lesson->coin_amount) }}コイン
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="text-center w-100">
                            <p>まだレッスンを公開していません</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
