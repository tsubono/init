@extends('layouts.app')

@section('title', 'レッスン詳細')

@section('content')
    <section class="p-layer-head">
        <div class="container">
            <div class="p-layer-head__title">
                <h1>
                    <span class="p-layer-head__en">Lesson details</span>
                    レッスン詳細
                </h1>
            </div>
        </div>
    </section>
    <section class="l-content-block p-lesson-show">
        <div class="container">
            <div class="d-flex align-items-baseline mb-40px">
                <ul class="p-lesson-show__categories">
                    @foreach ($lesson->categories as $category)
                        <li>
                            <div class="p-category d-inline-block pe-5">
                                <img src="{{ $category->icon_path }}" alt="アイコン" />
                                {{ $category->name }}
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if (auth()->guard('adviser')->check() && auth()->guard('adviser')->user->id === $lesson->adviser_user_id)
                    <a href="{{ route('adviser.lessons.edit', compact('lesson')) }}" class="p-btn p-btn--edit p-btn__outline">レッスンを編集</a>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-40px">
                            <h2 class="fs-2 fw-bold mb-4">{{ $lesson->title }}</h2>
                            <img src="{{ $lesson->eye_catch_image }}" alt="{{ $lesson->title }}" class="w-100 img-fluid">
                        </div>
                        <div class="col-md-12">
                            <h3 class="p-heading2">説明</h3>
                            <p class="ws-pre-line">{!! nl2br(e($lesson->description)) !!}</p>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex">
                                <div class="flex-fill me-3">
                                    <h3 class="p-heading2 mb-0">必要コイン</h3>
                                    <div class="border p-3">{{ number_format($lesson->coin_amount) }}コイン</div>
                                </div>
                                <div class="flex-fill ms-3">
                                    <h3 class="p-heading2 mb-0">言語</h3>
                                    <div class="border p-3">{{ $lesson->language->name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3 class="p-heading2">動画</h3>
                            <div class="row">
                                @foreach ($lesson->movies as $index => $movie)
                                    <!-- TODO: アイキャッチ画像の表示 -->
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <a data-bs-toggle="modal" data-bs-target="#profire-movieModal{{ $index }}">
                                            <img src="{{ asset('img/movie-sample01@2x.png') }}" class="w-100" alt="">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <!-- 動画モーダルの設定 -->
                            @foreach ($lesson->movies as $index => $movie)
                                <!-- TODO: 動画種別によって表示方法を変更する -->
                                    <div class="modal fade p-modal p-modal__movie" id="profire-movieModal{{ $index }}" tabindex="-1" aria-labelledby="profire-movieModal{{ $index }}Label">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                <div class="modal-body">
                                                    <div class="iframe-wrapper">
                                                        <iframe src="https://www.youtube.com/embed/Ll7mjhBzqpM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                            @endforeach
                        </div><!-- /.col-md-12 -->
                        <div class="col-md-12 mt-5">
                            <div class="border p-5">
                                <form class="p-form">
                                    <div>
                                        <label class="mb-2">希望日時</label>
                                        <div class="d-flex pe-100px">
                                            <input type="text" class="form-control" placeholder="2021/12/12">
                                            <input type="text" class="form-control ms-4" placeholder="20:30">
                                        </div>
                                    </div>
                                    <div class="mt-40px">
                                        <label class="mb-2">メッセージ</label>
                                        <textarea class="form-control" rows="6"></textarea>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="p-btn p-btn__defalut d-inline-block px-90px">受講申請</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    @include('components.adviser-info-block', ['adviserUser' => $lesson->adviserUser])

                    <div class="text-center mt-5">
                        <a href="{{ route('advisers.show', ['adviserUser' => $lesson->adviserUser]) }}" class="p-btn p-btn__defalut d-inline-block px-90px">プロフィール</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
