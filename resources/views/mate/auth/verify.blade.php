@extends('layouts.app')

@section('title', __('Verify Your Email Address'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('mate.verification.resend') }}">
                @csrf
                <div class="my-80px">
                    <button type="submit"
                            class="p-btn p-btn__defalut">{{ __('click here to request another') }}</button>
                </div>
            </form>
        </div>
    </section>
@endsection
