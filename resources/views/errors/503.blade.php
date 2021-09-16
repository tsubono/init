@extends('layouts.app')

@section('title', 'メンテナンスモード')

@section('content')
    <section class="l-content-block">
        <div class="container pt-40px pb-100px">
            <div class="border rounded p-box-with-icon">
                <div class="p-box-with-icon__icon">
                    <img src="{{ asset('img/mood-bad.svg') }}" alt="エラー">
                </div>
                <div>
                    <div class="fs-5 fw-bold">ただいまメンテナンスモードです</div>
                    <div class="mt-3 lh-lg">
                        恐れ入りますが公開までしばしお待ちいただきますようお願い申し上げます。<br>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
