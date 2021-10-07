@extends('layouts.app')

@section('title', '受講者登録')

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <form class="p-form" method="POST" action="{{ route('mate.register') }}">
                @csrf
                <div class="row">
                    <div class="col-12"><h3 class="p-heading2">お名前</h3></div>
                    <div class="col-md-4">
                        <label>
                            <div class="p-form__label">姓<span class="badge bg-danger ms-2">必須</span></div>
                        </label>
                        <input type="text" class="form-control" value="{{ old('family_name') }}" name="family_name">
                        @error('family_name')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>
                            <div class="p-form__label">ミドルネーム</div>
                        </label>
                        <input type="text" class="form-control" value="{{ old('middle_name') }}" name="middle_name">
                        @error('middle_name')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>
                            <div class="p-form__label">名<span class="badge bg-danger ms-2">必須</span></div>
                        </label>
                        <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name">
                        @error('first_name')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <h3 class="p-heading2">英字</h3>
                    </div>
                    <div class="col-md-4">
                        <label>
                            <div class="p-form__label">姓<span class="badge bg-danger ms-2">必須</span></div>
                        </label>
                        <input type="text" class="form-control" value="{{ old('family_name_kana') }}" name="family_name_kana">
                        @error('family_name_kana')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>
                            <div class="p-form__label">ミドルネーム</div>
                        </label>
                        <input type="text" class="form-control" value="{{ old('middle_name_kana') }}" name="middle_name_kana">
                        @error('middle_name_kana')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>
                            <div class="p-form__label">名<span class="badge bg-danger ms-2">必須</span></div>
                        </label>
                        <input type="text" class="form-control" value="{{ old('first_name_kana') }}" name="first_name_kana">
                        @error('first_name_kana')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <h3 class="p-heading2">メールアドレス<span class="badge bg-danger ms-2">必須</span></h3>
                        <input type="text" class="form-control" value="{{ old('email') }}" name="email">
                        @error('email')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <h3 class="p-heading2">パスワード<span class="badge bg-danger ms-2">必須</span></h3>
                        <input type="password" class="form-control" name="password">
                        <div class="mt-3 mb-1">もう一度、ご入力ください。</div>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="my-80px">
                    <div>
                        <div class="form-check p-card">
                            <input class="form-check-input" type="checkbox" name="agree_check" onchange="toggleSubmitButton()" />
                            <label class="form-check-label">
                                <a href="{{ route('privacy') }}" target="_blank" class="primary-link">プライバシーポリシー</a>に同意する
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="p-btn p-btn__defalut" id="submitButton" disabled>登録する</button>
                    <div class="text-center mt-4">
                        <a href="{{ route('mate.login') }}" class="primary-link">ログインはこちら</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section ('js')
    <script>
      function toggleSubmitButton() {
        if (document.querySelector('input[name="agree_check"]:checked') === null) {
          document.getElementById('submitButton').disabled = true
        } else {
          document.getElementById('submitButton').disabled = false
        }
      }
    </script>
@endsection
