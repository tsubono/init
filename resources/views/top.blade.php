@extends('layouts.app')

@section('title', __('message.top page'))

@section('content')
    <div id="jsParticles"></div>
    <section class="p-index-main">
        <div class="p-index-main__inner">
            <h1 class="p-index-main__catch">{{ __('message.From all over the world online') }}<br>
                {{ __('message.Find your lecturer') }}</h1>
            <div class="p-index-main__read"><span class="p-obi p-obi__blue">“{{ __('message.Thing you want to do') }}”</span>を<span class="p-obi p-obi__purple">“{{ __('message.Language to learn') }}”</span>で。<br>
                Init!（イニット）{{ __('message.Support people who challenge') }}</div>
            <div class="btn-area">
                <a href="{{ route('mate.register') }}" class="p-index-main__btn p-btn p-btn__defalut">{{ __('message.Newly register') }}</a>
                <a href="{{ route('adviser.register') }}" class="p-index-main__btn p-btn p-btn__defalut">{{ __('message.Lecturer') }}</a>
            </div>
        </div>
    </section>
    <section class="p-index-about l-content-block top">
        <div class="p-index-about__inner container">
            <div class="p-index-about__img"><img src="{{ asset('img/index-about-img01@2x.png') }}" alt=""></div>
            <div class="p-index-about__text">
                <h2 class="p-heading1">
                    <div class="p-heading1__en blue">About</div>
                    {{ __('message.About init') }}
                </h2>
                <p>{{ __('message.Fun and enhancement in learning') }}<br class="d-md-none">{{ __('message.Provided on the theme') }}<br class="d-none d-md-block">
                    {{ __('message.Online with lecturers around the world') }}<br>
                    {{ __('message.Create a place where you can match') }}</p>
                <a href="{{ route('about') }}" class="p-index-about__btn p-btn p-btn__defalut">{{ __('message.To the first one') }}</a>
            </div>
        </div>
    </section>
    <section class="p-room-intro p-bg-gradient l-content-block">
        <div class="container">
            <h2 class="p-heading1 white">
                <div class="p-heading1__en">Room</div>
                {{ __('message.Room introduction') }}
            </h2>
            <div class="p-room-intro__list">
                <ul>
                    <li>
                        <div class="p-room-intro__box business">
                            <h3 class="p-room-intro__head">{{ __('message.Business room') }}</h3>
                            <p>{{ __('message.Language (business term),') }}<br class="d-none d-md-block">{{ __('message.Seminars, qualifications, etc.') }}<br class="d-none d-md-block">{{ __('message.You can learn the skills you need.') }}</p>
                            <a class="p-room-intro__btn" href="{{ route('about') }}#roomSection">MORE</a>
                        </div>
                    </li>
                    <li>
                        <div class="p-room-intro__box yourself">
                            <h3 class="p-room-intro__head">{{ __('message.Ishore room') }}</h3>
                            <p>{{ __('message.Fashion, Lifestyle, Beauty,') }}<br class="d-none d-md-block">{{ __('message.You can learn knowledge such as fitness.') }}<br>{{ __('message.Have fun with your lecturer.') }}</p>
                            <a class="p-room-intro__btn" href="{{ route('about') }}#roomSection">MORE</a>
                        </div>
                    </li>
                    <li>
                        <div class="p-room-intro__box skillup">
                            <h3 class="p-room-intro__head">{{ __('message.Skill up room') }}</h3>
                            <p>{{ __('message.Language (free talk), music, sports,') }}<br class="d-none d-md-block">{{ __('message.In various fields such as IT, art and therapy') }}<br class="d-none d-md-block">{{ __('message.Find new hobbies and aim to improve yourself.') }}</p>
                            <a class="p-room-intro__btn" href="{{ route('about') }}#roomSection">MORE</a>
                        </div>
                    </li>
                </ul>
            </div>
            <a href="{{ route('about') }}" class="p-room-intro__btn2 p-btn p-btn__white">{{ __('message.To the first one') }}</a>
        </div>
    </section>
    <section class="index-flow l-content-block">
        <div class="container">
            <h2 class="p-heading1">
                <div class="p-heading1__en purple">Flow</div>
                {{ __('message.Flow to attend') }}
            </h2>
            <div class="p-flowlist">
                <ul>
                    <li class="p-flowlist__box num01">
                        <div class="p-flowlist__num">1</div>
                        <div class="p-flowlist__icon">
                            <img src="{{ asset('img/flow-icon01.svg') }}" alt="">
                        </div>
                        <p>{{ __('message.After new registration') }}<br class="d-none d-md-block">{{ __('message.Purchase coin') }}</p>
                    </li>
                    <li class="p-flowlist__box num02">
                        <div class="p-flowlist__num">2</div>
                        <div class="p-flowlist__icon">
                            <img src="{{ asset('img/flow-icon02.svg') }}" alt="">
                        </div>
                        <p>{{ __('message.From each room') }}<br class="d-none d-md-block">{{ __('message.Select lesson') }}</p>
                    </li>
                    <li class="p-flowlist__box num03">
                        <div class="p-flowlist__num">3</div>
                        <div class="p-flowlist__icon">
                            <img src="{{ asset('img/flow-icon03.svg') }}" alt="">
                        </div>
                        <p>{{ __('message.Lecturer') }}<br class="d-none d-md-block">{{ __('message.Offer') }}</p>
                    </li>
                    <li class="p-flowlist__box num04">
                        <div class="p-flowlist__num">4</div>
                        <div class="p-flowlist__icon">
                            <img src="{{ asset('img/flow-icon04.svg') }}" alt="">
                        </div>
                        <p>{{ __('message.After reservation confirmation') }}<br class="d-none d-md-block">{{ __('message.Start') }}</p>
                    </li>
                </ul>
            </div>
            <a href="{{ route('about') }}#aboutSection" class="p-room-intro__btn2 p-btn p-btn__defalut">{{ __('message.Click here for details') }}</a>
        </div>
    </section>
    <section class="p-index-advisor p-bg-light l-content-block">
        <div class="container">
            <h2 class="p-heading1">
                <div class="p-heading1__en purple">Advisor</div>
                {{ __('message.Instructor introduction') }}
            </h2>
            <div class="p-index-advisor__list">
                @foreach ($adviserUsers as $adviserUser)
                    <div class="p-card">
                        <a href="{{ route('advisers.show', compact('adviserUser')) }}">
                            <div class="p-card__img">
                                <img src="{{ $adviserUser->avatar_image }}" alt="{{ __('message.Lecturer image') }}">
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
                                <div class="p-card__btn" onclick="location.href='{{ route('advisers.show', compact('adviserUser')) }}'">{{ __('message.View Profile Details') }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div><!-- index-advisor__list -->
            <a href="{{ route('advisers.index') }}" class="p-index-advisor__btn p-btn p-btn__defalut">{{ __('message.Search for lecturers') }}</a>
        </div>
    </section>
    <section class="p-index-lesson l-content-block">
        <div class="container">
            <h2 class="p-heading1">
                <div class="p-heading1__en purple">Lesson</div>
                {{ __('message.Lesson introduction') }}
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
                                <div class="p-lesson__adviser-img"><img src="{{ $lesson->adviserUser->avatar_image }}" alt="{{ __('message.Lecturer image') }}"></div>
                                <div class="p-lesson__adviser-info">
                                    <div class="p-lesson__name">{{ $lesson->adviserUser->full_name }}</div>
                                    <div class="p-lesson__details">
                                        <div class="p-lesson__details_item">
                                            {{ __('message.Country of origin') }}：<div class="p-lang p-lang__france">{{ $lesson->adviserUser->fromCountry->name }}</div>
                                        </div>
                                        <div class="p-lesson__details_item">{{ __('message.age') }}：{{ $lesson->adviserUser->age_txt }}</div>
                                    </div>
                                </div>

                            </div>
                        </a>
                        <div class="p-lesson__img"><img src="{{ asset('img/lesson-img01.png') }}" alt=""></div>
                    </div>
                @endforeach
            </div><!-- p-index-lesson__list -->
            <a href="{{ route('lessons.index') }}" class="p-index-lesson__btn p-btn p-btn__defalut">{{ __('message.Find a lesson') }}</a>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/particles/particles.js') }}"></script>
    <script src="{{ asset('assets/particles/setting.js') }}"></script>
@endsection
