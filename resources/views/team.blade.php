@extends('layouts.app')

@section('title', 'TEAM INITについて')

@section('content')
    <section class="l-content-block p-team">
        <div class="container pt-40px pb-100px">
            <div class="border rounded p-box-with-icon">
                <div class="p-box-with-icon__icon">
                    <img src="{{ asset('img/mood-bad.svg') }}" alt="エラー">
                </div>
                <div>
                    <div class="fs-5 fw-bold">ただいま準備中です</div>
                </div>
            </div>
            <div class="mt-5 w-75 mx-auto">
                <a class="p-btn p-btn__defalut" href="{{ route('adviser.register') }}">講師として登録する</a>
                <a class="p-btn p-btn__defalut mt-3" href="#">スタッフ募集中</a>
            </div>
        </div>
    </section>
@endsection
