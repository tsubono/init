@extends('layouts.app')

@section('title', 'レビュー登録')

@section('content')
    <section class="l-content-block p-setting p-review">
        <div class="container">
            <form class="p-form" action="{{ route('attendances.review', compact('attendance')) }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <h3 class="p-heading2">評点<span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                        <div class="rate-form">
                            <input id="star5" type="radio" name="rate" value="5" {{ old('rate' == 5 ? 'checked' : '') }}>
                            <label for="star5">★</label>
                            <input id="star4" type="radio" name="rate" value="4" {{ old('rate' == 4 ? 'checked' : '') }}>
                            <label for="star4">★</label>
                            <input id="star3" type="radio" name="rate" value="3" {{ old('rate' == 3 ? 'checked' : '') }}>
                            <label for="star3">★</label>
                            <input id="star2" type="radio" name="rate" value="2" {{ old('rate' == 2 ? 'checked' : '') }}>
                            <label for="star2">★</label>
                            <input id="star1" type="radio" name="rate" value="1" {{ old('rate' == 1 ? 'checked' : '') }}>
                            <label for="star1">★</label>
                        </div>
                    </div>
                    @error('rate')
                    <div class="p-error-text pt-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror

                    <div class="col-12">
                        <h3 class="p-heading2">{{ __('message.Content') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                        <textarea rows="10" class="form-control" name="content">{{ old('content') }}</textarea>
                    </div>
                    @error('content')
                    <div class="p-error-text" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div><!-- /.row -->

                <div class="my-80px">
                    <button type="submit" class="p-btn p-btn__defalut">{{ __('message.sign up') }} </button>
                </div>
            </form>
        </div>
    </section>
@endsection
