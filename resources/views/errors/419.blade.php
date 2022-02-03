@extends('layouts.app')

@section('title', '__('message.404 error')')

@section('content')
    <section class="l-content-block">
        <div class="container pt-40px pb-100px">
            <div class="border rounded p-box-with-icon">
                <div class="p-box-with-icon__icon">
                    <img src="{{ asset('img/mood-bad.svg') }}" alt="{{ __('message.error') }} ">
                </div>
                <div>
                    <div class="fs-5 fw-bold">Page Expired</div>
                    <div class="mt-3 lh-lg">
                    {{ __('message.Page information is old') }} <br>
                    {{ __('message.Reload the page and try again.') }} 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
