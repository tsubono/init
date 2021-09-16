@extends('layouts.app')

@section('title', '404エラー')

@section('content')
    <section class="l-content-block">
        <div class="container pt-40px pb-100px">
            <div class="border rounded p-box-with-icon">
                <div class="p-box-with-icon__icon">
                    <img src="{{ asset('img/mood-bad.svg') }}" alt="エラー">
                </div>
                <div>
                    <div class="fs-5 fw-bold">Page Expired</div>
                    <div class="mt-3 lh-lg">
                        ページ情報が古くなっています<br>
                        ページをリロードして再度実行してください。
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
