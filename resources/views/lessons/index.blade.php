@extends('layouts.app')

@section('title', 'レッスンを探す')

@section('content')
    <section class="p-layer-head">
        <div class="container">
            <div class="p-layer-head__title">
                <h1>
                    <span class="p-layer-head__en">Lesson search</span>
                    レッスンを探す
                </h1>
            </div>
        </div>
    </section>
    <section class="p-searchblock bg-light l-content-block">
        <div class="container">
            <form action="" class="p-form">
                <h2 class="p-searchblock__all"><span class="d-none d-md-inline">探しているのは</span>
                    <select class="form-select" id="">
                        <option selected>すべてのカテゴリ</option>
                    </select>のレッスン。</h2>
                <a class="p-btn p-btn__outline d-md-none" data-bs-toggle="collapse" href="#collapseDetail" role="button" aria-expanded="false" aria-controls="collapseDetail">
                    詳細検索
                </a>
                <div class="collapse" id="collapseDetail">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">アドバイザーが話せる言語</h3>
                            <select class="form-select" id="">
                                <option selected>指定しない</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">ルーム名</h3>
                            <input type="text" class="form-control" placeholder="記入してください">
                        </div>
                        <div class="col-lg-3 col-6 mb-md-4">
                            <h3 class="p-heading3"><span class="d-none d-md-inline">アドバイザーの</span>出身国</h3>
                            <select class="form-select" id="">
                                <option selected>指定しない</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-6">
                            <h3 class="p-heading3"><span class="d-none d-md-inline">アドバイザーの</span>性別</h3>
                            <select class="form-select" id="">
                                <option selected>すべて</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="p-heading3">必要コイン</h3>
                            <div class="d-flex align-items-center">
                                <select class="form-select mb-0" id="">
                                    <option selected>最低コイン</option>
                                </select>
                                <span class="mx-2">〜</span>
                                <select class="form-select mb-0" id="">
                                    <option selected>上限コイン</option>
                                </select>
                            </div>

                        </div>

                    </div><!-- /.row -->
                </div><!-- /.collapse -->

            </form>
        </div>
    </section>
    <section class="p-searchresult l-content-block">
        <div class="container">
            <div class="p-searchresult__info">
                <div class="p-searchresult__num">検索結果 <span class="num">1,000</span></div>
                <div class="p-searchresult__tab">
                    <ul id="p-searchresult__sort" class="nav p-sort" role="tablist">
                        <li role="presentation">
                            <button id="new-tab" class="p-sort__parts active" data-bs-toggle="tab" data-bs-target="#new" type="button" role="tab" aria-controls="new" aria-selected="true">新着順</button>
                        </li>
                        <li role="presentation">
                            <button id="fav-tab" class="p-sort__parts" data-bs-toggle="tab" data-bs-target="#fav" type="button" role="tab" aria-controls="fav" aria-selected="false">人気順</button>
                        </li>
                        <li role="presentation">
                            <button id="coin-little-tab" class="p-sort__parts" data-bs-toggle="tab" data-bs-target="#coin-little" type="button" role="tab" aria-controls="coin-little" aria-selected="false">必要コイン少ない順</button>
                        </li>
                        <li role="presentation">
                            <button id="coin-many-tab" class="p-sort__parts" data-bs-toggle="tab" data-bs-target="#coin-many" type="button" role="tab" aria-controls="coin-many" aria-selected="false">必要コイン多い順</button>
                        </li>
                        <li role="presentation">
                            <button id="evaluation-tab" class="p-sort__parts" data-bs-toggle="tab" data-bs-target="#evaluation" type="button" role="tab" aria-controls="evaluation" aria-selected="false">評価が高い順</button>
                        </li>
                    </ul>
                </div><!-- /.p-searchresult__tab -->
            </div><!-- /.p-searchresult__info -->

            <!-- パネル部分 -->
            <div class="p-search__content tab-content">
                <div id="new" class="tab-pane active" role="tabpanel" aria-labelledby="new-tab">

                    <div class="p-card3 p-room">
                        <div class="p-card3__img2">
                            <a href="#">
                                <img src="{{ asset('img/lesson-img01.png') }}" alt="">
                            </a>
                        </div>
                        <div class="p-card3__detail">
                            <a href="#">
                                <h3>フリートークフランス語</h3>
                                <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章で…<span class="more">もっと見る</span></p>
                                <div class="p-card3__info">
                                    <div class="p-card3__info_cate">
                                        <ul class="p-profile__category">
                                            <li>
                                                <div class="p-category language">語学</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-card3__info_point">
                                        1,200コイン
                                    </div>
                                </div><!-- /.p-card3__info -->
                                <div class="p-card3__advisor">
                                    <div class="p-card3__advisor_img">
                                        <img src="{{ asset('img/profile-img01.png') }}" alt="">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <h4>佐藤 花子</h4>
                                        <div class="p-card3__box">
                                            <h5 class="p-heading3">言語</h5>
                                            <div class="p-card3__country">
                                                <p>英語 / 日本語 / フランス語</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!--/.p-card3__detail -->
                        <div class="p-card3__timezone">
                            <div class="border p-timezone text-center">
                                <a data-bs-toggle="collapse" href="#collapseDetail2" role="button" aria-expanded="false" aria-controls="collapseDetail2">
                                    <h3>レッスン可能な時間帯</h3>
                                </a>
                                <div class="collapse" id="collapseDetail2">
                                    <div class="inner py-4">
                                        <ul class="p-timezone__list">
                                            <li>月　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                                            <li>火　<span class="time time-first">12:00</span><span class="time time-last">13:30</span></li>
                                            <li>水　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                                            <li>木　<span class="time time-first">14:00</span><span class="time time-last">18:30</span></li>
                                            <li>金　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                                            <li>土　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                                            <li>日　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- /.p-timezone -->
                        </div><!-- /.p-card3__timezone -->
                    </div><!-- /.p-card3 -->

                    <div class="p-card3 p-room">
                        <div class="p-card3__img2">
                            <a href="#">
                                <img src="{{ asset('img/lesson-img02.png') }}" alt="">
                            </a>
                        </div>
                        <div class="p-card3__detail">
                            <a href="#">
                                <h3>まずは30分! 初めてのヴァイオリンレッスン</h3>
                                <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章で…<span class="more">もっと見る</span></p>
                                <div class="p-card3__info">
                                    <div class="p-card3__info_cate">
                                        <ul class="p-profile__category">
                                            <li>
                                                <div class="p-category language">語学</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-card3__info_point">
                                        1,200コイン
                                    </div>
                                </div><!-- /.p-card3__info -->
                                <div class="p-card3__advisor">
                                    <div class="p-card3__advisor_img">
                                        <img src="{{ asset('img/profile-img01.png') }}" alt="">
                                    </div>
                                    <div class="p-card3__advisor_text">
                                        <h4>佐藤 花子</h4>
                                        <div class="p-card3__box">
                                            <h5 class="p-heading3">言語</h5>
                                            <div class="p-card3__country">
                                                <p>英語 / 日本語 / フランス語</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--/.p-card3__detail -->
                        <div class="p-card3__timezone">
                            <div class="border p-timezone text-center">
                                <a data-bs-toggle="collapse" href="#collapseDetail2" role="button" aria-expanded="false" aria-controls="collapseDetail2">
                                    <h3>レッスン可能な時間帯</h3>
                                </a>
                                <div class="collapse" id="collapseDetail2">
                                    <div class="inner py-4">
                                        <ul class="p-timezone__list">
                                            <li>月　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                                            <li>火　<span class="time time-first">12:00</span><span class="time time-last">13:30</span></li>
                                            <li>水　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                                            <li>木　<span class="time time-first">14:00</span><span class="time time-last">18:30</span></li>
                                            <li>金　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                                            <li>土　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                                            <li>日　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- /.p-timezone -->
                        </div><!-- /.p-card3__timezone -->
                    </div><!-- /.p-card3 -->
                </div><!--/.tab-pane -->
                <div id="fav" class="tab-pane" role="tabpanel" aria-labelledby="fav-tab">
                    <p>人気順</p>
                </div>
                <div id="coin-little" class="tab-pane" role="tabpanel" aria-labelledby="coin-little-tab">
                    <p>必要コイン少ない順</p>
                </div>
                <div id="coin-many" class="tab-pane" role="tabpanel" aria-labelledby="coin-many-tab">
                    <p>必要コイン多い順</p>
                </div>
                <div id="evaluation" class="tab-pane" role="tabpanel" aria-labelledby="evaluation-tab">
                    <p>評価が高い順</p>
                </div>
            </div><!-- /.p-search__content -->
        </div><!-- /.container -->
    </section>
@endsection
