@extends('layouts.app')

@section('title', __('message.Notice edit'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <form class="p-form" action="{{ route('admin.infos.update', compact('info')) }}" method="post">
                @csrf
                @method('PUT')

                @include('admin.infos._form')

                <div class="my-80px">
                    <button type="submit" class="p-btn p-btn__defalut">{{ __('message.save') }} </button>
                </div>
            </form>
        </div>
    </section>
@endsection
