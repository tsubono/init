@extends('layouts.app')

@section('title', 'はじめての方')

@section('content')
    <section class="p-layer-head">
        <div class="container">
            <div class="p-layer-head__title">
                <h1>
                    <span class="p-layer-head__en">Beginners</span>
                    はじめての方
                </h1>
            </div>
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
            </div>
        </div>
    </section>
    <section class="p-room-intro p-bg-gradient l-content-block" id="roomSection">
        <div class="container">
            <h2 class="p-heading1 white">
                <div class="p-heading1__en">Room</div>
                ルーム紹介
            </h2>
            <div class="accordion" id="accordionRoom">

                <div class="p-room-intro__box business" id="headingOne">
                    <h3 class="p-room-intro__head">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            ビジネスルーム
                        </button>
                    </h3>
                </div>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRoom">
                    <div class="accordion-body">
                        <h4>受講可能レッスン</h4>
                        <div class="p-room-intro__resson-list">
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-language.svg') }}" alt=""></div>
                                語学
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-qualification.svg') }}" alt=""></div>
                                資格取得
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-room-intro__box yourself" id="headingTwo">
                    <h3 class="p-room-intro__head">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            自分磨きルーム
                        </button>
                    </h3>
                </div>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionRoom">
                    <div class="accordion-body">
                        <h4>受講可能レッスン</h4>
                        <div class="p-room-intro__resson-list">
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-fashion.svg') }}" alt=""></div>
                                ファッション
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-lifestyle.svg') }}" alt=""></div>
                                ライフスタイル
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-beauty.svg') }}" alt=""></div>
                                ビューティー
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-fitness.svg') }}" alt=""></div>
                                フィットネス
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-room-intro__box skillup" id="headingThree">
                    <h3 class="p-room-intro__head">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            スキルアップルーム
                        </button>
                    </h3>
                </div>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionRoom">
                    <div class="accordion-body">
                        <h4>受講可能レッスン</h4>
                        <div class="p-room-intro__resson-list">
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-language.svg') }}" alt=""></div>
                                語学
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-music.svg') }}" alt=""></div>
                                音楽
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-sports.svg') }}" alt=""></div>
                                スポーツ
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-it.svg') }}" alt=""></div>
                                IT
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-design.svg') }}" alt=""></div>
                                芸術
                            </div>
                            <div class="p-card2">
                                <div class="p-card2__icon"><img src="{{ asset('img/category/icon-therapy.svg') }}" alt=""></div>
                                セラピー
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
                INITの使い方
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
                            <h3>Skypeの登録</h3>
                            <p>Initのレッスンでは、Skypeを使用します。<br>
                                <a href="#" target="_blank">Skypeのダウンロード・登録方法はこちら</a></p>
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
                            <h3>会員登録（無料）</h3>
                            <p>Initのサービスをご利用いただくには、無料の会員登録が必要です。<br>初期費用や月額費は一切かかりませんので、ご安心ください。</p>
                            <a href="#" class="p-btn p-btn__defalut">新規登録する</a>
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
                            <h3>Init Pointの購入</h3>
                            <p>Initでは、専用ポイントを購入し、毎レッスンお申込みの際にご使用頂きます。<br>
                                1ポイント＝100円（税別）でクレジットカードやPaypalから決済選択できます。</p>
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
                            <h3>アドバイザー/レッスンを探す</h3>
                            <p>講師やレッスンを探してみましょう。“やりたいこと”や“学びたい言語” から探してみましょう。<br>
                                アドバイザーの出身国や人気度から探すこともできます。</p>
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
                            <h3>レッスンを予約</h3>
                            <p>気に入った講師やレッスンが見つかったら「スケジュールを確認する」<br>
                                からレッスンのリクエストを行います。</p>
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
                            <h3>レッスン日確定後、受講スタート</h3>
                            <p>講師があなたのレッスンリクエストを確定すると、成約メールが届きます。これでレッスンの予約が成立した事になります。レッスン前には講師からスカイプ連絡先の追加依頼が届きますので、承認しておきましょう。</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
