@extends('layouts.app')

@section('title', __('message.Completion of registration'))

@section('content')
    <section class="l-content-block">
        <div class="container pt-40px pb-100px">
            <h2 class="fs-2 fw-bold text-center mb-5">{{ __('message.Registration has been completed') }}</h2>
            <div class="border rounded p-box-with-icon">
                <div class="p-box-with-icon__icon">
                    <img src="{{ asset('img/about-flow02.svg') }}" alt="{{ __('message.Profile input') }}">
                </div>
                <div>
                    <div class="fs-5 fw-bold">{{ __('message.Lets enter a profile') }}</div>
                    <div class="mt-3 lh-lg">
                        {{ __('message.Thank you for your registration.') }}<br>
                        {{ __('message.Please enter your profile to use the service.') }}
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('adviser.profile.edit') }}" class="p-btn p-btn__defalut px-5">{{ __('message.Profile setting') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
