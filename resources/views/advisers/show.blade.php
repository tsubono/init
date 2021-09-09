@extends('layouts.app')

@section('title', 'アドバイザープロフィール')

@section('content')
    <section class="p-layer-head">
        <div class="container">
            <div class="p-layer-head__title">
                <h1>
                    <span class="p-layer-head__en">Advisor Profile</span>
                    アドバイザープロフィール
                </h1>
            </div>
        </div>
    </section>
    <section class="l-content-block p-profile">
        <div class="container">
            <div class="p-profile__edit">
                @if (auth()->guard('adviser')->check() && auth()->guard('adviser')->user->id === $adviserUser->id)
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
                        <div class="col-md-12">
                            <h3 class="p-heading2">メッセージ</h3>
                            <div class="p-profile__message">
                                <p>{!! nl2br(e($adviserUser->pr_text)) !!}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3 class="p-heading2">動画URL</h3>
                            <movie-list :movies="{{ $adviserUser->adviserUserMovies }}"></movie-list>
                        </div><!-- /.col-md-12 -->
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
                        <div class="col-md-12 mt-4">
                            <div class="row">
                                @foreach ($adviserUser->adviserUserImages as $image)
                                    <div class="col-4">
                                        <img class="img-fluid" src="{{ $image->image_path }}" alt="">
                                    </div>
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
                    @foreach ($adviserUser->lessons as $lesson)
                        <div class="p-card p-card--lesson">
                            <a href="{{ route('lessons.show', compact('lesson')) }}" class="h-100">
                                <div class="p-card__img">
                                    <img src="{{ $lesson->eye_catch_image }}" alt="{{ $lesson->title }}">
                                </div>
                                <div class="p-card__info text-start">
                                    <div class="p-card__name">{{ $lesson->title }}</div>
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
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
