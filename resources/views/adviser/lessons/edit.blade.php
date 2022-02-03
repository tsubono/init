@extends('layouts.app')

@section('title', __('message.Lesson edit'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <form class="p-form" action="{{ route('adviser.lessons.update', compact('lesson')) }}" method="post">
                @csrf
                @method('PUT')

                @include('adviser.lessons._form')

                <div class="my-80px">
                    <button type="submit" class="p-btn p-btn__defalut">{{ __('message.save') }} </button>
                </div>
            </form>
        </div>
    </section>
@endsection
