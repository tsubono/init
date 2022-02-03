@extends('layouts.app')

@section('title', {{ __('message.sign up') }} )

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('message.We re-sent authentication mail') }} 
                </div>
            @endif
            <div class="text-center">
                <p>{{ __('message.I sent an authentication email to the registered email address.') }} </p>
                <p>{{ __('message.Check the received email and complete registration from the listed link.') }} </p>
                <p>{{ __('message.If you have not received an email, please click below.') }} </p></div>
            <form class="d-inline" method="POST" action="{{ route('mate.verification.resend') }}">
                @csrf
                <div class="my-4">
                    <button type="submit"
                            class="p-btn p-btn__defalut">{{ __('message.Restart Authentication Mail') }} </button>
                </div>
            </form>
        </div>
    </section>
@endsection
