@extends('layouts.app')

@section('title', __('message.Maintenance mode'))

@section('content')
    <section class="l-content-block">
        <div class="container pt-40px pb-100px">
            <div class="border rounded p-box-with-icon">
                <div class="p-box-with-icon__icon">
                    <img src="{{ asset('img/mood-bad.svg') }}" alt="{{ __('message.error') }}">
                </div>
                <div>
                    <div class="fs-5 fw-bold">{{ __('message.Maintenance mode now') }}</div>
                    <div class="mt-3 lh-lg">
                        {{ __('message.Excuse me, but please wait for the public until public.') }}<br>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
