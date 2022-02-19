@extends('layouts.app')

@section('title', __('message.Lesson management'))

@section('content')
    <section class="p-lesson-list l-content-block">
        <div class="container">
            <div class="text-end">
                <a href="{{ route('adviser.lessons.create') }}" class="p-btn p-btn__defalut d-inline-block px-80px">{{ __('message.New add') }}</a>
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
                                        {{ number_format($lesson->coin_amount) }}{{ __('message.coin') }}
                                    </span>
                                </div>
                                <div class="d-flex mt-auto">
                                    <button type="button" class="p-btn p-btn--rect btn-success fw-normal px-3 py-1 ms-auto" onclick="location.href='{{ route('adviser.lessons.edit', compact('lesson')) }}'">
                                        {{ __('message.edit') }}
                                    </button>
                                    <button type="button" class="p-btn p-btn--rect btn-danger fw-normal px-3 py-1 ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $index }}">
                                        {{ __('message.Delete') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 削除確認モーダル -->
                    <div class="modal p-modal p-setting fade" id="deleteModal{{ $index }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $index }}">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                <div class="modal-body">
                                    <h2 class="p-heading2 mt-0 text-center">{{ __('message.Deletion confirmation') }}</h2>
                                    <p class="text-center">「{{ $lesson->name }}」{{ __('message.Remove.') }}<br>{{ __('message.Is it OK?') }}</p>
                                    <form action="{{ route('adviser.lessons.destroy', compact('lesson')) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="p-btn p-btn__defalut">{{ __('message.delete') }}</button>
                                    </form>
                                </div><!-- /.modal-body -->
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- /削除確認モーダル -->
                @empty
                    <div class="text-center">{{ __('message.It has not been registered yet.') }}</div>
                @endforelse
            </div>
            <div class="text-center">
                {{ $lessons->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
