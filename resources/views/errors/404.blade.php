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
                    <div class="fs-5 fw-bold">Page Not Found</div>
                    <div class="mt-3 lh-lg">
                        ページが見つかりませんでした。<br>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
