@extends('layouts.app')

@section('title', '（講師）レッスン一覧')

@section('content')
    <section class="p-lesson-list l-content-block">
        <div class="container">
            <div class="text-end">
                <a href="{{ route('adviser.lessons.create') }}" class="p-btn p-btn__defalut d-inline-block px-80px">新規追加</a>
            </div>
            <div class="row row-cols-3 mt-5">
                <!-- TODO: 実データに置き換え -->
                <div class="col text-center mb-4">
                    <div class="p-card p-card--lesson h-100">
                        <a href="#" class="h-100">
                            <div class="p-card__img">
                                <img src="{{ asset('img/lesson-img01.png') }}" alt="">
                            </div>
                            <div class="p-card__info text-start">
                                <div class="p-card__name">フリートークフランス語</div>
                                <div class="text-black-50 mt-2">楽しく会話しましょう。文法はあまり気になさらずに！</div>
                                <div class="p-card__category mt-3">
                                    <ul class="justify-content-start">
                                        <li>#語学</li>
                                    </ul>
                                </div>
                                <div class="d-flex">
                                  <span>
                                    <img src="{{ asset('img/icon-time.svg') }}" alt="Time" class="me-1">
                                    60分
                                  </span>
                                  <span class="ms-3">
                                    <img src="{{ asset('img/icon-point.svg') }}" alt="Point" class="me-1">
                                    1,200ポイント
                                </span>
                                </div>
                                <div class="d-flex mt-4">
                                    <button type="button" class="p-btn p-btn--rect btn-success fw-normal px-3 py-1 ms-auto">編集</button>
                                    <button type="button" class="p-btn p-btn--rect btn-danger fw-normal px-3 py-1 ms-2">削除</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col text-center mb-4">
                    <div class="p-card p-card--lesson h-100">
                        <a href="#" class="h-100">
                            <div class="p-card__img">
                                <img src="{{ asset('img/lesson-img02.png') }}" alt="">
                            </div>
                            <div class="p-card__info text-start">
                                <div class="p-card__name">まずは30分! 初めてのヴァイオリンレッスン</div>
                                <div class="text-black-50 mt-2">お得な4回パックのコースです。大人の方もお子様もご受講頂けます！</div>
                                <div class="p-card__category mt-3">
                                    <ul class="justify-content-start">
                                        <li>#語学</li>
                                    </ul>
                                </div>
                                <div class="d-flex">
                                  <span>
                                    <img src="{{ asset('img/icon-time.svg') }}" alt="Time" class="me-1">
                                    60分
                                  </span>
                                  <span class="ms-3">
                                    <img src="{{ asset('img/icon-point.svg') }}" alt="Point" class="me-1">
                                    1,200ポイント
                                  </span>
                                </div>
                                <div class="d-flex mt-4">
                                    <button type="button" class="p-btn p-btn--rect btn-success fw-normal px-3 py-1 ms-auto">編集</button>
                                    <button type="button" class="p-btn p-btn--rect btn-danger fw-normal px-3 py-1 ms-2">削除</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col text-center mb-4">
                    <div class="p-card p-card--lesson h-100">
                        <a href="#" class="h-100">
                            <div class="p-card__img">
                                <img src="{{ asset('img/lesson-img03.png') }}" alt="">
                            </div>
                            <div class="p-card__info text-start">
                                <div class="p-card__name">ヨガを始めてキレイになる？！初回体験</div>
                                <div class="text-black-50 mt-2">お得な4回パックのコースです。大人の方もお子様もご受講頂けます！</div>
                                <div class="p-card__category mt-3">
                                    <ul class="justify-content-start">
                                        <li>#語学</li>
                                    </ul>
                                </div>
                                <div class="d-flex">
                                  <span>
                                    <img src="{{ asset('img/icon-time.svg') }}" alt="Time" class="me-1">
                                    60分
                                  </span>
                                  <span class="ms-3">
                                    <img src="{{ asset('img/icon-point.svg') }}" alt="Point" class="me-1">
                                    1,200ポイント
                                  </span>
                                </div>
                                <div class="d-flex mt-4">
                                    <button type="button" class="p-btn p-btn--rect btn-success fw-normal px-3 py-1 ms-auto">編集</button>
                                    <button type="button" class="p-btn p-btn--rect btn-danger fw-normal px-3 py-1 ms-2">削除</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col text-center mb-4">
                    <div class="p-card p-card--lesson h-100">
                        <a href="#" class="h-100">
                            <div class="p-card__img">
                                <img src="{{ asset('img/lesson-img01.png') }}" alt="">
                            </div>
                            <div class="p-card__info text-start">
                                <div class="p-card__name">フリートークフランス語</div>
                                <div class="text-black-50 mt-2">楽しく会話しましょう。文法はあまり気になさらずに！</div>
                                <div class="p-card__category mt-3">
                                    <ul class="justify-content-start">
                                        <li>#語学</li>
                                    </ul>
                                </div>
                                <div class="d-flex">
                                  <span>
                                    <img src="{{ asset('img/icon-time.svg') }}" alt="Time" class="me-1">
                                    60分
                                  </span>
                                  <span class="ms-3">
                                    <img src="{{ asset('img/icon-point.svg') }}" alt="Point" class="me-1">
                                    1,200ポイント
                                  </span>
                                </div>
                                <div class="d-flex mt-4">
                                    <button type="button" class="p-btn p-btn--rect btn-success fw-normal px-3 py-1 ms-auto">編集</button>
                                    <button type="button" class="p-btn p-btn--rect btn-danger fw-normal px-3 py-1 ms-2">削除</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col text-center mb-4">
                    <div class="p-card p-card--lesson h-100">
                        <a href="#" class="h-100">
                            <div class="p-card__img">
                                <img src="{{ asset('img/lesson-img02.png') }}" alt="">
                            </div>
                            <div class="p-card__info text-start">
                                <div class="p-card__name">まずは30分! 初めてのヴァイオリンレッスン</div>
                                <div class="text-black-50 mt-2">お得な4回パックのコースです。大人の方もお子様もご受講頂けます！</div>
                                <div class="p-card__category mt-3">
                                    <ul class="justify-content-start">
                                        <li>#語学</li>
                                    </ul>
                                </div>
                                <div class="d-flex">
                                  <span>
                                    <img src="{{ asset('img/icon-time.svg') }}" alt="Time" class="me-1">
                                    60分
                                  </span>
                                  <span class="ms-3">
                                    <img src="{{ asset('img/icon-point.svg') }}" alt="Point" class="me-1">
                                    1,200ポイント
                                  </span>
                                </div>
                                <div class="d-flex mt-4">
                                    <button type="button" class="p-btn p-btn--rect btn-success fw-normal px-3 py-1 ms-auto">編集</button>
                                    <button type="button" class="p-btn p-btn--rect btn-danger fw-normal px-3 py-1 ms-2">削除</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col text-center mb-4">
                    <div class="p-card p-card--lesson h-100">
                        <a href="#" class="h-100">
                            <div class="p-card__img">
                                <img src="{{ asset('img/lesson-img03.png') }}" alt="">
                            </div>
                            <div class="p-card__info text-start">
                                <div class="p-card__name">ヨガを始めてキレイになる？！初回体験</div>
                                <div class="text-black-50 mt-2">お得な4回パックのコースです。大人の方もお子様もご受講頂けます！</div>
                                <div class="p-card__category mt-3">
                                    <ul class="justify-content-start">
                                        <li>#語学</li>
                                    </ul>
                                </div>
                                <div class="d-flex">
                                  <span>
                                    <img src="{{ asset('img/icon-time.svg') }}" alt="Time" class="me-1">
                                    60分
                                  </span>
                                  <span class="ms-3">
                                    <img src="{{ asset('img/icon-point.svg') }}" alt="Point" class="me-1">
                                    1,200ポイント
                                  </span>
                                </div>
                                <div class="d-flex mt-4">
                                    <button type="button" class="p-btn p-btn--rect btn-success fw-normal px-3 py-1 ms-auto">編集</button>
                                    <button type="button" class="p-btn p-btn--rect btn-danger fw-normal px-3 py-1 ms-2">削除</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col text-center mb-4">
                    <div class="p-card p-card--lesson h-100">
                        <a href="#" class="h-100">
                            <div class="p-card__img">
                                <img src="{{ asset('img/lesson-img01.png') }}" alt="">
                            </div>
                            <div class="p-card__info text-start">
                                <div class="p-card__name">フリートークフランス語</div>
                                <div class="text-black-50 mt-2">楽しく会話しましょう。文法はあまり気になさらずに！</div>
                                <div class="p-card__category mt-3">
                                    <ul class="justify-content-start">
                                        <li>#語学</li>
                                    </ul>
                                </div>
                                <div class="d-flex">
                                  <span>
                                    <img src="{{ asset('img/icon-time.svg') }}" alt="Time" class="me-1">
                                    60分
                                  </span>
                                  <span class="ms-3">
                                    <img src="{{ asset('img/icon-point.svg') }}" alt="Point" class="me-1">
                                    1,200ポイント
                                  </span>
                                </div>
                                <div class="d-flex mt-4">
                                    <button type="button" class="p-btn p-btn--rect btn-success fw-normal px-3 py-1 ms-auto">編集</button>
                                    <button type="button" class="p-btn p-btn--rect btn-danger fw-normal px-3 py-1 ms-2">削除</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col text-center mb-4">
                    <div class="p-card p-card--lesson h-100">
                        <a href="#" class="h-100">
                            <div class="p-card__img">
                                <img src="{{ asset('img/lesson-img02.png') }}" alt="">
                            </div>
                            <div class="p-card__info text-start">
                                <div class="p-card__name">まずは30分! 初めてのヴァイオリンレッスン</div>
                                <div class="text-black-50 mt-2">お得な4回パックのコースです。大人の方もお子様もご受講頂けます！</div>
                                <div class="p-card__category mt-3">
                                    <ul class="justify-content-start">
                                        <li>#語学</li>
                                    </ul>
                                </div>
                                <div class="d-flex">
                                  <span>
                                    <img src="{{ asset('img/icon-time.svg') }}" alt="Time" class="me-1">
                                    60分
                                  </span>
                                  <span class="ms-3">
                                    <img src="{{ asset('img/icon-point.svg') }}" alt="Point" class="me-1">
                                    1,200ポイント
                                  </span>
                                </div>
                                <div class="d-flex mt-4">
                                    <button type="button" class="p-btn p-btn--rect btn-success fw-normal px-3 py-1 ms-auto">編集</button>
                                    <button type="button" class="p-btn p-btn--rect btn-danger fw-normal px-3 py-1 ms-2">削除</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <!-- TODO ページネーション -->
                <nav class="p-pagination mt-5">
                    <ul>
                        <li>
                            <a href="#"><img src="{{ asset('img/arrow-previous.svg') }}" class="p-pagination__previous" alt="前へ"></a>
                        </li>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('img/arrow-next.svg') }}" class="p-pagination__next" alt="次へ"></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection
