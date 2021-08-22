@extends('layouts.app')

@section('content')
    <section class="p-index-main">
        <div class="p-index-main__inner">
            <h1 class="p-index-main__catch">オンラインで世界中から<br>
                あなただけの講師を見つけよう</h1>
            <div class="p-index-main__read"><span class="p-obi p-obi__blue">“やりたいこと”</span>を<span class="p-obi p-obi__purple">“学びたい言語”</span>で。<br>
                Init!（イニット）は挑戦する方々を応援します</div>
            <a href="#" class="p-index-main__btn p-btn p-btn__defalut">新規登録する</a>
        </div>
        <div class="p-index-main__bg">
            <img src="assets/img/index-mv.png" class="d-none d-md-block" alt="">
            <img src="assets/img/index-mv-sp.png" class="d-md-none" alt="">
        </div>
    </section>
    <section class="p-index-about l-content-block">
        <div class="p-index-about__inner container">
            <div class="p-index-about__img"><img src="assets/img/index-about-img01@2x.png" alt=""></div>
            <div class="p-index-about__text">
                <h2 class="p-heading1">
                    <div class="p-heading1__en blue">About</div>
                    INITについて
                </h2>
                <p>「学びの中に楽しさと充実さ」を<br class="d-md-none">テーマに掲げ<br class="d-none d-md-block">
                    世界中の講師とオンラインで<br>
                    マッチングできる場所を創造します</p>
                <a href="#" class="p-index-about__btn p-btn p-btn__defalut">はじめての方へ</a>
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
                            <a class="p-room-intro__btn" href="#">MORE</a>
                        </div>
                    </li>
                    <li>
                        <div class="p-room-intro__box yourself">
                            <h3 class="p-room-intro__head">自分磨きルーム</h3>
                            <p>ファッション、ライフスタイル、ビューティー、<br class="d-none d-md-block">フィットネスなどの知識を学べます。<br>講師と一緒に楽しく自分磨きを。</p>
                            <a class="p-room-intro__btn" href="#">MORE</a>
                        </div>
                    </li>
                    <li>
                        <div class="p-room-intro__box skillup">
                            <h3 class="p-room-intro__head">スキルアップルーム</h3>
                            <p>語学（フリートーク）、音楽、スポーツ、<br class="d-none d-md-block">IT、芸術、 セラピーなど、様々な分野にて<br class="d-none d-md-block">新たな趣味を見つけ、自分自身の向上を目指せます。</p>
                            <a class="p-room-intro__btn" href="#">MORE</a>
                        </div>
                    </li>
                </ul>
            </div>
            <a href="#" class="p-room-intro__btn2 p-btn p-btn__white">はじめての方へ</a>
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
                            <img src="assets/img/flow-icon01.svg" alt="">
                        </div>
                        <p>新規登録後<br class="d-none d-md-block">ポイント購入</p>
                    </li>
                    <li class="p-flowlist__box num02">
                        <div class="p-flowlist__num">2</div>
                        <div class="p-flowlist__icon">
                            <img src="assets/img/flow-icon02.svg" alt="">
                        </div>
                        <p>各ルームから<br class="d-none d-md-block">レッスンを選択</p>
                    </li>
                    <li class="p-flowlist__box num03">
                        <div class="p-flowlist__num">3</div>
                        <div class="p-flowlist__icon">
                            <img src="assets/img/flow-icon03.svg" alt="">
                        </div>
                        <p>講師に<br class="d-none d-md-block">オファーする</p>
                    </li>
                    <li class="p-flowlist__box num04">
                        <div class="p-flowlist__num">4</div>
                        <div class="p-flowlist__icon">
                            <img src="assets/img/flow-icon04.svg" alt="">
                        </div>
                        <p>予約確定後<br class="d-none d-md-block">受講スタート</p>
                    </li>
                </ul>
            </div>
            <a href="#" class="p-room-intro__btn2 p-btn p-btn__defalut">詳しくはこちら</a>
        </div>
    </section>
    <section class="p-index-advisor p-bg-light l-content-block">
        <div class="container">
            <h2 class="p-heading1">
                <div class="p-heading1__en purple">Advisor</div>
                アドバイザー紹介
            </h2>
            <div class="p-index-advisor__list">
                <div class="p-card">
                    <a href="#">
                        <div class="p-card__img">
                            <img src="assets/img/profile-img01.png" alt="">
                        </div>
                        <div class="p-card__info">
                            <div class="p-card__name">佐藤 花子</div>
                            <div class="p-card__lang">
                                <div class="p-lang p-lang__japan">日本</div>
                            </div>
                            <div class="p-card__category">
                                <ul>
                                    <li>#語学</li>
                                    <li>#資格取得</li>
                                </ul>
                            </div>
                            <div class="p-card__btn">プロフィール詳細を見る</div>
                        </div>
                    </a>
                </div>
                <div class="p-card">
                    <a href="#">
                        <div class="p-card__img">
                            <img src="assets/img/profile-img02.png" alt="">
                        </div>
                        <div class="p-card__info">
                            <div class="p-card__name">佐藤 花子</div>
                            <div class="p-card__lang">
                                <div class="p-lang p-lang__america">アメリカ</div>
                            </div>
                            <div class="p-card__category">
                                <ul>
                                    <li>#語学</li>
                                    <li>#資格取得</li>
                                </ul>
                            </div>
                            <div class="p-card__btn">プロフィール詳細を見る</div>
                        </div>
                    </a>
                </div>
                <div class="p-card">
                    <a href="#">
                        <div class="p-card__img">
                            <img src="assets/img/profile-img03.png" alt="">
                        </div>
                        <div class="p-card__info">
                            <div class="p-card__name">田中 太郎</div>
                            <div class="p-card__lang">
                                <div class="p-lang p-lang__france">フランス</div>
                            </div>
                            <div class="p-card__category">
                                <ul>
                                    <li>#語学</li>
                                    <li>#資格取得</li>
                                </ul>
                            </div>
                            <div class="p-card__btn">プロフィール詳細を見る</div>
                        </div>
                    </a>
                </div>

            </div><!-- index-advisor__list -->
            <a href="#" class="p-index-advisor__btn p-btn p-btn__defalut">アドバイザーを探す</a>
        </div>
    </section>
    <section class="p-index-lesson l-content-block">
        <div class="container">
            <h2 class="p-heading1">
                <div class="p-heading1__en purple">Lesson</div>
                レッスン紹介
            </h2>
            <div class="p-index-lesson__list">
                <div class="p-lesson">
                    <a href="#">
                        <div class="p-lesson__title">フリートークフランス語</div>
                        <div class="p-lesson__desc">お得な4回パックのコースです。大人の方もお子様もご受講頂けます！</div>
                        <div class="p-lesson__info">
                            <div class="p-lesson__category">語学</div>
                            <div class="p-lesson__time">60分</div>
                            <div class="p-lesson__point">1,200pt</div>
                        </div>
                        <div class="p-lesson__adviser">
                            <div class="p-lesson__adviser-img"><img src="assets/img/profile-img01.png" alt=""></div>
                            <div class="p-lesson__adviser-info">
                                <div class="p-lesson__name">佐藤 花子</div>
                                <div class="p-lesson__details">
                                    <div class="p-lesson__details_item">出身国：<div class="p-lang p-lang__france">フランス</div>
                                    </div>
                                    <div class="p-lesson__details_item">年齢：32歳</div>
                                </div>
                            </div>

                        </div>
                    </a>
                    <div class="p-lesson__img"><img src="assets/img/lesson-img01.png" alt=""></div>
                </div>
                <div class="p-lesson">
                    <a href="#">
                        <div class="p-lesson__title">フリートークフランス語</div>
                        <div class="p-lesson__desc">お得な4回パックのコースです。大人の方もお子様もご受講頂けます！</div>
                        <div class="p-lesson__info">
                            <div class="p-lesson__category">語学</div>
                            <div class="p-lesson__time">60分</div>
                            <div class="p-lesson__point">1,200pt</div>
                        </div>
                        <div class="p-lesson__adviser">
                            <div class="p-lesson__adviser-img"><img src="assets/img/profile-img01.png" alt=""></div>
                            <div class="p-lesson__adviser-info">
                                <div class="p-lesson__name">佐藤 花子</div>
                                <div class="p-lesson__details">
                                    <div class="p-lesson__details_item">出身国：<div class="p-lang p-lang__france">フランス</div></div>
                                    <div class="p-lesson__details_item">年齢：32歳</div>
                                </div>
                            </div>

                        </div>
                    </a>
                    <div class="p-lesson__img"><img src="assets/img/lesson-img02.png" alt=""></div>
                </div>
                <div class="p-lesson">
                    <a href="#">
                        <div class="p-lesson__title">フリートークフランス語</div>
                        <div class="p-lesson__desc">お得な4回パックのコースです。大人の方もお子様もご受講頂けます！</div>
                        <div class="p-lesson__info">
                            <div class="p-lesson__category">語学</div>
                            <div class="p-lesson__time">60分</div>
                            <div class="p-lesson__point">1,200pt</div>
                        </div>
                        <div class="p-lesson__adviser">
                            <div class="p-lesson__adviser-img"><img src="assets/img/profile-img01.png" alt=""></div>
                            <div class="p-lesson__adviser-info">
                                <div class="p-lesson__name">佐藤 花子</div>
                                <div class="p-lesson__details">
                                    出身国：<div class="p-lang p-lang__france">フランス</div>年齢：32歳
                                </div>
                            </div>

                        </div>
                    </a>
                    <div class="p-lesson__img"><img src="assets/img/lesson-img01.png" alt=""></div>
                </div>
                <div class="p-lesson">
                    <a href="#">
                        <div class="p-lesson__title">フリートークフランス語</div>
                        <div class="p-lesson__desc">お得な4回パックのコースです。大人の方もお子様もご受講頂けます！</div>
                        <div class="p-lesson__info">
                            <div class="p-lesson__category">語学</div>
                            <div class="p-lesson__time">60分</div>
                            <div class="p-lesson__point">1,200pt</div>
                        </div>
                        <div class="p-lesson__adviser">
                            <div class="p-lesson__adviser-img"><img src="assets/img/profile-img01.png" alt=""></div>
                            <div class="p-lesson__adviser-info">
                                <div class="p-lesson__name">佐藤 花子</div>
                                <div class="p-lesson__details">
                                    出身国：<div class="p-lang p-lang__france">フランス</div>年齢：32歳
                                </div>
                            </div>

                        </div>
                    </a>
                    <div class="p-lesson__img"><img src="assets/img/lesson-img01.png" alt=""></div>
                </div>
            </div><!-- p-index-lesson__list -->
            <a href="#" class="p-index-lesson__btn p-btn p-btn__defalut">レッスンを探す</a>
    </section>
@endsection
