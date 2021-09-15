@extends('layouts.app')

@section('title', 'レッスン管理')

@section('content')
    <section class="p-lesson-list l-content-block">
        <div class="container">
            <div class="text-end">
                <a href="{{ route('adviser.lessons.create') }}" class="p-btn p-btn__defalut d-inline-block px-80px">新規追加</a>
            </div>
            <div class="row row-cols-3 mt-5">
                @forelse ($lessons as $index => $lesson)
                    <div class="col text-center mb-4">
                        <div class="p-card p-card--lesson h-100">
                            <div class="p-card__img">
                                <img src="{{ $lesson->eye_catch_image }}" alt="{{ $lesson->name }}">
                            </div>
                            <div class="p-card__info text-start">
                                <div class="p-card__name">{{ $lesson->name }}</div>
                                <div class="text-black-50 mt-2">
                                    {{ Str::limit($lesson->description, 200) }}
                                </div>
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
                                <div class="d-flex mt-auto">
                                    <button type="button" class="p-btn p-btn--rect btn-success fw-normal px-3 py-1 ms-auto" onclick="location.href='{{ route('adviser.lessons.edit', compact('lesson')) }}'">
                                        編集
                                    </button>
                                    <button type="button" class="p-btn p-btn--rect btn-danger fw-normal px-3 py-1 ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $index }}">
                                        削除
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 削除確認モーダル -->
                    <div class="modal p-modal p-setting fade" id="deleteModal{{ $index }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $index }}">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                <div class="modal-body">
                                    <h2 class="p-heading2 mt-0 text-center">削除確認</h2>
                                    <p class="text-center">「{{ $lesson->name }}」を削除します。<br>よろしいですか？</p>
                                    <form action="{{ route('adviser.lessons.destroy', compact('lesson')) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="p-btn p-btn__defalut">削除する</button>
                                    </form>
                                </div><!-- /.modal-body -->
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- /削除確認モーダル -->
                @empty

                @endforelse
                <div class="col text-center mb-4">
                    <div class="p-card p-card--lesson h-100">
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
                            <div class="d-flex mt-auto">
                                <button type="button" class="p-btn p-btn--rect btn-success fw-normal px-3 py-1 ms-auto">編集</button>
                                <button type="button" class="p-btn p-btn--rect btn-danger fw-normal px-3 py-1 ms-2">削除</button>
                            </div>
                        </div>
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
