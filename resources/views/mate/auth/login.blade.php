@extends('layouts.app')

@section('title', '受講者ログイン')

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <form method="POST" action="{{ route('mate.login') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h3 class="p-heading2">メールアドレス<span class="badge bg-danger ms-2">必須</span></h3>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <h3 class="p-heading2">パスワード<span class="badge bg-danger ms-2">必須</span></h3>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="my-80px">
                    <button type="submit" class="p-btn p-btn__defalut">ログインする</button>
                    <div class="text-center mt-4">
                        <a href="{{ route('mate.register') }}" class="primary-link">新規登録はこちら</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
