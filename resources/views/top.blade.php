@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
    <div id="jsParticles"></div>
    <section class="p-index-main">
        <div class="p-index-main__inner">
            <h1 class="p-index-main__catch">オンラインで世界中から<br>
                あなただけの講師を見つけよう</h1>
            <div class="p-index-main__read"><span class="p-obi p-obi__blue">“やりたいこと”</span>を<span class="p-obi p-obi__purple">“学びたい言語”</span>で。<br>
                Init!（イニット）は挑戦する方々を応援します</div>
            <a href="{{ route('mate.register') }}" class="p-index-main__btn p-btn p-btn__defalut">新規登録する</a>
            <a href="{{ route('adviser.register') }}" class="p-index-main__btn p-btn p-btn__defalut">講師登録する</a>
        </div>
    </section>
    <section class="p-index-about l-content-block">
        <div class="p-index-about__inner container">
            <div class="p-index-about__img"><img src="{{ asset('img/index-about-img01@2x.png') }}" alt=""></div>
            <div class="p-index-about__text">
                <h2 class="p-heading1">
                    <div class="p-heading1__en blue">About</div>
                    INITについて
                </h2>
                <p>「学びの中に楽しさと充実さ」を<br class="d-md-none">テーマに掲げ<br class="d-none d-md-block">
                    世界中の講師とオンラインで<br>
                    マッチングできる場所を創造します</p>
                <a href="{{ route('about') }}" class="p-index-about__btn p-btn p-btn__defalut">はじめての方へ</a>
            </div>
        </div>
    </section>
    <section class="p-room-intro p-bg-gradient l-content-block">
        <div class="container">
            <h2 class="p-heading1 white">
                <div class="p-heading1__en">Room</div>
                ルーム紹介
            </h2>
            <div class="p-room-intro__list">
                <ul>
                    <li>
                        <div class="p-room-intro__box business">
                            <h3 class="p-room-intro__head">ビジネスルーム</h3>
                            <p>語学（ビジネス用語）、<br class="d-none d-md-block">セミナーや資格取得など、ビジネスで<br class="d-none d-md-block">必要となるスキルを学べます。</p>
                            <a class="p-room-intro__btn" href="{{ route('about') }}#roomSection">MORE</a>
                        </div>
                    </li>
                    <li>
                        <div class="p-room-intro__box yourself">
                            <h3 class="p-room-intro__head">自分磨きルーム</h3>
                            <p>ファッション、ライフスタイル、ビューティー、<br class="d-none d-md-block">フィットネスなどの知識を学べます。<br>講師と一緒に楽しく自分磨きを。</p>
                            <a class="p-room-intro__btn" href="{{ route('about') }}#roomSection">MORE</a>
                        </div>
                    </li>
                    <li>
                        <div class="p-room-intro__box skillup">
                            <h3 class="p-room-intro__head">スキルアップルーム</h3>
                            <p>語学（フリートーク）、音楽、スポーツ、<br class="d-none d-md-block">IT、芸術、 セラピーなど、様々な分野にて<br class="d-none d-md-block">新たな趣味を見つけ、自分自身の向上を目指せます。</p>
                            <a class="p-room-intro__btn" href="{{ route('about') }}#roomSection">MORE</a>
                        </div>
                    </li>
                </ul>
            </div>
            <a href="{{ route('about') }}" class="p-room-intro__btn2 p-btn p-btn__white">はじめての方へ</a>
        </div>
    </section>
    <section class="index-flow l-content-block">
        <div class="container">
            <h2 class="p-heading1">
                <div class="p-heading1__en purple">Flow</div>
                受講までの流れ
            </h2>
            <div class="p-flowlist">
                <ul>
                    <li class="p-flowlist__box num01">
                        <div class="p-flowlist__num">1</div>
                        <div class="p-flowlist__icon">
                            <img src="{{ asset('img/flow-icon01.svg') }}" alt="">
                        </div>
                        <p>新規登録後<br class="d-none d-md-block">ポイント購入</p>
                    </li>
                    <li class="p-flowlist__box num02">
                        <div class="p-flowlist__num">2</div>
                        <div class="p-flowlist__icon">
                            <img src="{{ asset('img/flow-icon02.svg') }}" alt="">
                        </div>
                        <p>各ルームから<br class="d-none d-md-block">レッスンを選択</p>
                    </li>
                    <li class="p-flowlist__box num03">
                        <div class="p-flowlist__num">3</div>
                        <div class="p-flowlist__icon">
                            <img src="{{ asset('img/flow-icon03.svg') }}" alt="">
                        </div>
                        <p>講師に<br class="d-none d-md-block">オファーする</p>
                    </li>
                    <li class="p-flowlist__box num04">
                        <div class="p-flowlist__num">4</div>
                        <div class="p-flowlist__icon">
                            <img src="{{ asset('img/flow-icon04.svg') }}" alt="">
                        </div>
                        <p>予約確定後<br class="d-none d-md-block">受講スタート</p>
                    </li>
                </ul>
            </div>
            <a href="{{ route('about') }}#aboutSection" class="p-room-intro__btn2 p-btn p-btn__defalut">詳しくはこちら</a>
        </div>
    </section>
    <section class="p-index-advisor p-bg-light l-content-block">
        <div class="container">
            <h2 class="p-heading1">
                <div class="p-heading1__en purple">Advisor</div>
                講師紹介
            </h2>
            <div class="p-index-advisor__list">
                @foreach ($adviserUsers as $adviserUser)
                    <div class="p-card">
                        <a href="{{ route('advisers.show', compact('adviserUser')) }}">
                            <div class="p-card__img">
                                <img src="{{ $adviserUser->avatar_image }}" alt="講師画像">
                            </div>
                            <div class="p-card__info">
                                <div class="p-card__name">{{ $adviserUser->full_name }}</div>
                                <div class="p-card__lang">
                                    <div class="p-lang">{{ $adviserUser->fromCountry->name ?? '' }}</div>
                                </div>
                                <div class="p-card__category">
                                    <ul>
                                        @foreach ($adviserUser->categories as $category)
                                            <li>#{{ $category->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="p-card__btn" onclick="location.href='{{ route('advisers.show', compact('adviserUser')) }}'">プロフィール詳細を見る</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div><!-- index-advisor__list -->
            <a href="{{ route('advisers.index') }}" class="p-index-advisor__btn p-btn p-btn__defalut">講師を探す</a>
        </div>
    </section>
    <section class="p-index-lesson l-content-block">
        <div class="container">
            <h2 class="p-heading1">
                <div class="p-heading1__en purple">Lesson</div>
                レッスン紹介
            </h2>
            <div class="p-index-lesson__list">
                @foreach ($lessons as $lesson)
                    <div class="p-lesson">
                        <a href="#">
                            <div class="p-lesson__title">{{ $lesson->name }}</div>
                            <div class="p-lesson__desc">{!! Str::limit($lesson->description, 100) !!}</div>
                            <div class="p-lesson__info">
                                @foreach ($lesson->categories as $index => $category)
                                    @if ($index < 2)
                                        <div class="p-lesson__category">{{ $category->name }}</div>
                                    @endif
                                @endforeach
                                <div class="p-lesson__point">{{ number_format($lesson->coin_amount) }} Coin</div>
                            </div>
                            <div class="p-lesson__adviser">
                                <div class="p-lesson__adviser-img"><img src="{{ $lesson->adviserUser->avatar_image }}" alt="講師画像"></div>
                                <div class="p-lesson__adviser-info">
                                    <div class="p-lesson__name">{{ $lesson->adviserUser->full_name }}</div>
                                    <div class="p-lesson__details">
                                        <div class="p-lesson__details_item">
                                            出身国：<div class="p-lang p-lang__france">{{ $lesson->adviserUser->fromCountry->name }}</div>
                                        </div>
                                        <div class="p-lesson__details_item">年齢：{{ $lesson->adviserUser->age_txt }}</div>
                                    </div>
                                </div>

                            </div>
                        </a>
                        <div class="p-lesson__img"><img src="{{ asset('img/lesson-img01.png') }}" alt=""></div>
                    </div>
                @endforeach
            </div><!-- p-index-lesson__list -->
            <a href="{{ route('lessons.index') }}" class="p-index-lesson__btn p-btn p-btn__defalut">レッスンを探す</a>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/particles/particles.js') }}"></script>
    <script src="{{ asset('assets/particles/setting.js') }}"></script>
@endsection
