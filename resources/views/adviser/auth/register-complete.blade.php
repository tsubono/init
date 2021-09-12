@extends('layouts.app')

@section('title', '登録完了')

@section('content')
    <section class="l-content-block p-register-complete">
        <div class="container pt-40px pb-100px">
            <h2 class="fs-2 fw-bold text-center mb-5">登録が完了しました</h2>
            <div class="d-flex justify-content-center">
                <div class="border rounded d-inline-flex justify-content-center py-100px px-90px">
                    <div class="p-register-complete__icon-profile me-5">
                        <img src="{{ asset('img/about-flow02.svg') }}" alt="プロフィール入力">
                    </div>
                    <div>
                        <div class="fs-5 fw-bold">プロフィールを入力しましょう</div>
                        <div class="mt-3 lh-lg">
                            ご登録いただきありがとうございます。<br>
                            サービスを利用するためにプロフィールの入力をお願いします。
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('adviser.profile.edit') }}" class="p-btn p-btn__defalut px-5">プロフィール設定</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
