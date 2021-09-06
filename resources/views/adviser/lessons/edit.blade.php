@extends('layouts.app')

@section('title', 'レッスン編集')

@section('content')
    <section class="p-layer-head">
        <div class="container">
            <div class="p-layer-head__title">
                <h1>
                    <span class="p-layer-head__en">Edit Lesson</span>
                    レッスン編集
                </h1>
            </div>
        </div>
    </section>
    <section class="l-content-block p-setting">
        <div class="container">
            <form class="p-form" action="{{ route('adviser.lessons.update', compact('lesson')) }}" method="post">
                @csrf
                @method('PUT')

                @include('adviser.lessons._form')

                <div class="my-80px">
                    <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                </div>
            </form>
        </div>
    </section>
@endsection
