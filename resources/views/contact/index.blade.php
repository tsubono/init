@extends('layouts.app')

@section('title', 'お問い合わせ')

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <form class="p-form" action="{{ route('contact.send') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <h3 class="p-heading2">氏名<span class="badge bg-danger ms-2">必須</span></h3>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

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
                        <h3 class="p-heading2">カテゴリ<span class="badge bg-danger ms-2">必須</span></h3>
                        <select class="form-select" name="category">
                            <option value="">選択してください</option>
                            @foreach (config('const.contact_categories') as $category)
                                <option value="{{ $category }}" {{ old('category') === $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <h3 class="p-heading2">件名<span class="badge bg-danger ms-2">必須</span></h3>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>


                    <div class="col-12">
                        <h3 class="p-heading2">内容<span class="badge bg-danger ms-2">必須</span></h3>
                        <textarea rows="10" class="form-control" name="content">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div><!-- /.row -->

                <div class="my-80px">
                    <button type="submit" class="p-btn p-btn__defalut">送信する</button>
                </div>
            </form>
        </div>
    </section>
@endsection
