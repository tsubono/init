@extends('layouts.app')

@section('title', __('message.Withdrawal completion'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <div class="text-center">
                <p>{{ __('message.I accepted withdrawal.') }} </p>
                <p>{{ __('message.Thank you very much for using this time.') }} </p>
        </div>
    </section>
@endsection
