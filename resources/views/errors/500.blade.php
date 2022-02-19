@extends('layouts.app')

@section('title', __('message.404 error'))

@section('content')
    <section class="l-content-block">
        <div class="container pt-40px pb-100px">
            <div class="border rounded p-box-with-icon">
                <div class="p-box-with-icon__icon">
                    <img src="{{ asset('img/mood-bad.svg') }}" alt="{{ __('message.error') }}">
                </div>
                <div>
                    <div class="fs-5 fw-bold">System Error</div>
                    <div class="mt-3 lh-lg">
                    {{ __('message.A system error has occurred.') }}<br>
                    {{ __('message.Take time to try again,') }}
                        <a href="{{ route('contact.index') }}" class="primary-link">{{ __('message.Inquiry form') }}></a>{{ __('message.Please contact me more.') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
