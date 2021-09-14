@extends('layouts.app')

@section('title', 'レッスンを探す')

@section('content')
    <section class="p-searchblock bg-light l-content-block">
        <div class="container">
            <!-- TODO: セレクトボックスを実データに置き換え・検索処理実装 -->
            <form action="" class="p-form">
                <h2 class="p-searchblock__all"><span class="d-none d-md-inline">探しているのは</span>
                    <select class="form-select" id="category">
                        <option selected>すべてのカテゴリ</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>のレッスン。</h2>
                <a class="p-btn p-btn__outline d-md-none" data-bs-toggle="collapse" href="#collapseDetail" role="button" aria-expanded="false" aria-controls="collapseDetail">
                    詳細検索
                </a>
                <div class="collapse" id="collapseDetail">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">アドバイザーが話せる言語</h3>
                            <select class="form-select" id="language">
                                <option selected>指定しない</option>
                                @foreach($languages as $language)
                                    <option value="{{ $language->id  }}">{{ $language->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">ルーム名</h3>
                            <input type="text" class="form-control" placeholder="記入してください">
                        </div>
                        <div class="col-lg-3 col-6 mb-md-4">
                            <h3 class="p-heading3"><span class="d-none d-md-inline">アドバイザーの</span>出身国</h3>
                            <select class="form-select" id="country">
                                <option selected>指定しない</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-6">
                            <h3 class="p-heading3"><span class="d-none d-md-inline">アドバイザーの</span>性別</h3>
                            <select class="form-select" id="gender">
                                <option selected>すべて</option>
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="p-heading3">必要コイン</h3>
                            <div class="d-flex align-items-center">
                                <input type="number" id="coin-min" class="form-control" placeholder="最低コイン">
                                <span class="mx-2">〜</span>
                                <input type="number" id="coin-max" class="form-control" placeholder="上限コイン">
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
                <!-- TODO: 件数を実データに置き換え -->
                <div class="p-searchresult__num">検索結果 <span class="num">1,000</span></div>
                <div class="p-searchresult__tab">
                    <!-- TODO: ソート -->
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

                    @forelse ($lessons as $lesson)
                        @if (!$lesson->is_stop)
                            <div class="p-card3 p-room">
                                <div class="p-card3__img2">
                                    <a href="{{ route('lessons.show', compact('lesson')) }}">
                                        <img src="{{ $lesson->eye_catch_image }}" alt="{{ $lesson->name }}">
                                    </a>
                                </div>
                                <div class="p-card3__detail">
                                    <a href="{{ route('lessons.show', compact('lesson')) }}">
                                        <h3>{{ $lesson->name }}</h3>
                                        <p>
                                          {{ Str::limit($lesson->description, 200) }}
                                            <a href="{{ route('lessons.show', compact('lesson')) }}"><span class="more">もっと見る</span></a>
                                        </p>
                                        <div class="p-card3__info">
                                            <div class="p-card3__info_cate">
                                                <ul class="p-profile__category">
                                                    @foreach ($lesson->categories as $category)
                                                    <li>
                                                        <div class="p-category">
                                                            <img src="{{ $category->icon_path }}" alt="アイコン" />
                                                            {{ $category->name }}
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="p-card3__info_point">
                                              {{ number_format($lesson->coin_amount) }}コイン
                                            </div>
                                        </div><!-- /.p-card3__info -->
                                        <div class="p-card3__advisor">
                                            <div class="p-card3__advisor_img">
                                                <img src="{{ $lesson->adviserUser->avatar_image }}" alt="アドバイザー画像">
                                            </div>
                                            <div class="p-card3__advisor_text">
                                                <h4>
                                                    {{ $lesson->adviserUser->full_name }}
                                                </h4>
                                                <div class="p-card3__box">
                                                    <h5 class="p-heading3">言語</h5>
                                                    <div class="p-card3__country">
                                                        <p>
                                                            @foreach ($lesson->adviserUser->languages as $language)
                                                              {{ $language->name }}
                                                                @if (!$loop->last) / @endif
                                                            @endforeach
                                                        </p>
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
                                                    <li>
                                                        月　
                                                        <span class="time time-first">{{ $lesson->adviserUser->available_time_monday_start }}</span>
                                                        <span class="time time-last">{{ $lesson->adviserUser->available_time_monday_end }}</span>
                                                    </li>
                                                    <li>
                                                        火　
                                                        <span class="time time-first">{{ $lesson->adviserUser->available_time_tuesday_start }}</span>
                                                        <span class="time time-last">{{ $lesson->adviserUser->available_time_tuesday_end }}</span>
                                                    </li>
                                                    <li>
                                                        水　
                                                        <span class="time time-first">{{ $lesson->adviserUser->available_time_wednesday_start }}</span>
                                                        <span class="time time-last">{{ $lesson->adviserUser->available_time_wednesday_end }}</span>
                                                    </li>
                                                    <li>
                                                        木　
                                                        <span class="time time-first">{{ $lesson->adviserUser->available_time_thursday_start }}</span>
                                                        <span class="time time-last">{{ $lesson->adviserUser->available_time_thursday_end }}</span>
                                                    </li>
                                                    <li>
                                                        金　
                                                        <span class="time time-first">{{ $lesson->adviserUser->available_time_friday_start }}</span>
                                                        <span class="time time-last">{{ $lesson->adviserUser->available_time_friday_end }}</span>
                                                    </li>
                                                    <li>
                                                        土　
                                                        <span class="time time-first">{{ $lesson->adviserUser->available_time_saturday_start }}</span>
                                                        <span class="time time-last">{{ $lesson->adviserUser->available_time_saturday_end }}</span>
                                                    </li>
                                                    <li>
                                                        日　
                                                        <span class="time time-first">{{ $lesson->adviserUser->available_time_sunday_start }}</span>
                                                        <span class="time time-last">{{ $lesson->adviserUser->available_time_sunday_end }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- /.p-timezone -->
                                </div><!-- /.p-card3__timezone -->
                            </div><!-- /.p-card3 -->
                        @endif
                    @empty
                        <div>該当のレッスンは見つかりませんでした。</div>
                    @endforelse
                </div><!--/.tab-pane -->

                <!-- TODO: ソート -->
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
            <!-- TODO ページネーション -->
        </div><!-- /.container -->
    </section>
@endsection
