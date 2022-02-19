@extends('layouts.app')

@section('title', __('message.notice'))

@section('content')
    <section class="p-info l-content-block">
        <div class="container">
            <h1 class="p-heading2 mt-0 mb-4">
                <time>{{ $information->date->format('Y/m/d') }}</time>
                <span class="ms-2">{{ $information->title }}</span>
            </h1>
            <p class="p-info__content">{!! nl2br(e($information->content)) !!}</p>
            <div class="my-5 text-center">
                <a href="{{ route('infos.index') }}" class="p-btn p-btn__defalut d-inline-block px-80px">{{ __('message.back to the list') }}</a>
            </div>
        </div><!-- /.container -->
    </section>
@endsection
