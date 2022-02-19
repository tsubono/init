@extends('layouts.app')

@section('title', __('message.For the first time'))

@section('content')
    <section class="p-index-about l-content-block">
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
            </div>
        </div>
    </section>
    <section class="p-room-intro p-bg-gradient l-content-block" id="roomSection">
        <div class="container">
            <h2 class="p-heading1 white">
                <div class="p-heading1__en">Room</div>
                {{ __('message.Room introduction') }}
            </h2>
            <div class="accordion" id="accordionRoom">

                <div class="p-room-intro__box business" id="headingOne">
                    <h3 class="p-room-intro__head">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            {{ __('message.Business room') }}
                            <p>{{ __('message.Language (business term),') }}<br class="d-none d-md-block">{{ __('message.Seminars, qualifications, etc.') }}<br class="d-none d-md-block">{{ __('message.You can learn the skills you need.') }}</p>
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRoom">
                    <div class="accordion-body">
                        <h4>{{ __('message.Lessable lessons') }}</h4>
                        <div class="p-room-intro__resson-list">
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-language.svg') }}" alt=""></div>
                                {{ __('message.Language') }}
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-qualification.svg') }}" alt=""></div>
                                {{ __('message.Qualification') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-room-intro__box yourself" id="headingTwo">
                    <h3 class="p-room-intro__head">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{ __('message.Ishore room') }}
                            <p>{{ __('message.Fashion, Lifestyle, Beauty,') }}<br class="d-none d-md-block">{{ __('message.You can learn knowledge such as fitness.') }}<br>{{ __('message.Have fun with your lecturer.') }}</p>
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionRoom">
                    <div class="accordion-body">
                        <h4>{{ __('message.Lessable lessons') }}</h4>
                        <div class="p-room-intro__resson-list">
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-fashion.svg') }}" alt=""></div>
                                {{ __('message.fashion') }}
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-lifestyle.svg') }}" alt=""></div>
                                {{ __('message.Lifestyle') }}
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-beauty.svg') }}" alt=""></div>
                                {{ __('message.Beauty') }}
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-fitness.svg') }}" alt=""></div>
                                {{ __('message.Fitness') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-room-intro__box skillup" id="headingThree">
                    <h3 class="p-room-intro__head">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{ __('message.Skill up room') }}
                            <p>{{ __('message.Language (free talk), music, sports,') }}<br class="d-none d-md-block">{{ __('message.In various fields such as IT, art and therapy') }}<br class="d-none d-md-block">{{ __('message.Find new hobbies and aim to improve yourself.') }}</p>
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionRoom">
                    <div class="accordion-body">
                        <h4>{{ __('message.Lessable lessons') }}</h4>
                        <div class="p-room-intro__resson-list">
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-language.svg') }}" alt=""></div>
                                {{ __('message.Language') }}
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-music.svg') }}" alt=""></div>
                                {{ __('message.music') }}
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-sports.svg') }}" alt=""></div>
                                {{ __('message.Sports') }}
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-it.svg') }}" alt=""></div>
                                {{ __('message.IT') }}
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-design.svg') }}" alt=""></div>
                                {{ __('message.art') }}
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-therapy.svg') }}" alt=""></div>
                                {{ __('message.Therapy') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- accordion -->
        </div>
    </section>
    <section class="p-about-flow l-content-block" id="aboutSection">
        <div class="container">
            <h2 class="p-heading1">
                <div class="p-heading1__en blue">About</div>
                {{ __('message.How to use init') }}
            </h2>
            <div class="p-aboutlist">
                <ul>
                    <li class="p-aboutlist__box num01">
                        <div class="p-aboutlist__num">1</div>
                        <div class="p-aboutlist__icon">
                            <div class="p-aboutlist__icon_inner">
                                <img src="{{ asset('img/about-flow01.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="p-aboutlist__text">
                            <h3>{{ __('message.Skype registration') }}</h3>
                            <p>{{ __('message.In INIT lessons, use Skype.') }}<br>
                                <a href="https://support.skype.com/ja/faq/FA11098/skype-noshi-ishi-mefang-wojiao-etekudasai" target="_blank" class="primary-link">{{ __('message.Click here for Skypes download and registration method') }}</a></p>
                        </div>
                    </li>
                    <li class="p-aboutlist__box num02">
                        <div class="p-aboutlist__num">2</div>
                        <div class="p-aboutlist__icon">
                            <div class="p-aboutlist__icon_inner">
                                <img src="{{ asset('img/about-flow02.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="p-aboutlist__text">
                            <h3>{{ __('message.Membership registration (free)') }}</h3>
                            <p>{{ __('message.Free member registration is required to use INIT service.') }}<br>{{ __('message.Please do not worry about initial costs and monthly expenses.') }}</p>
                            <a href="{{ route('mate.register') }}" class="p-btn p-btn__defalut">{{ __('message.Newly register') }}</a>
                        </div>
                    </li>
                    <li class="p-aboutlist__box num03">
                        <div class="p-aboutlist__num">3</div>
                        <div class="p-aboutlist__icon">
                            <div class="p-aboutlist__icon_inner">
                                <img src="{{ asset('img/about-flow03.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="p-aboutlist__text">
                            <h3>{{ __('message.Init Coin Buy') }}</h3>
                            <p>{{ __('message.Init, purchase a dedicated coin and use it for each lesson application.') }}<br>
                                {{ __('message.You can choose payment from credit cards and PayPal with one coin = 100 yen (tax excluding).') }}</p>
                        </div>
                    </li>
                    <li class="p-aboutlist__box num04">
                        <div class="p-aboutlist__num">4</div>
                        <div class="p-aboutlist__icon">
                            <div class="p-aboutlist__icon_inner">
                                <img src="{{ asset('img/about-flow04.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="p-aboutlist__text">
                            <h3>{{ __('message.Lecturer / Lesson') }}</h3>
                            <p>{{ __('message.Look for lecturers and lessons. Lets look for what you want to do or Language to learn') }}。<br>
                                {{ __('message.You can also look for from the origin of the instructor and the popularity.') }}</p>
                        </div>
                    </li>
                    <li class="p-aboutlist__box num05">
                        <div class="p-aboutlist__num">5</div>
                        <div class="p-aboutlist__icon">
                            <div class="p-aboutlist__icon_inner">
                                <img src="{{ asset('img/about-flow05.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="p-aboutlist__text">
                            <h3>{{ __('message.Reserve a lesson') }}</h3>
                            <p>{{ __('message.If you find lecturers and lessons you like, Check the schedule') }}<br>
                                {{ __('message.Make a request from the lesson.') }}</p>
                        </div>
                    </li>
                    <li class="p-aboutlist__box num06">
                        <div class="p-aboutlist__num">6</div>
                        <div class="p-aboutlist__icon">
                            <div class="p-aboutlist__icon_inner">
                                <img src="{{ asset('img/about-flow06.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="p-aboutlist__text">
                            <h3>{{ __('message.After the lesson date, we will start') }}</h3>
                            <p>{{ __('message.When your teacher confirms your lesson request, you will receive a contract email. This completes the lesson reservation. Before the lesson, the instructor will send you a request to add Skype contact information, so please approve it.') }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
