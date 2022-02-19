@extends('layouts.app')

@section('title', __('message.Profile setting'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <!-- タブ部分 -->
        @include('mate.profile._tab_menu')
        <!-- パネル部分 -->
            <form class="p-form" action="{{ route('mate.profile.update.password') }}" method="post">
                @csrf
                <div class="tab-content p-setting__content">
                    <div id="password">
                        <h2 class="p-heading1">{{ __('message.change Password') }}</h2>
                        <form action="">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.Current Password') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                    <input type="password" class="form-control p-form__pass" name="current_password">
                                    @error('current_password')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror

                                    <h3 class="p-heading2">{{ __('message.new password') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                    <input type="password" class="form-control p-form__pass" name="password">
                                    <p class="my-2">{{ __('message.Please enter again.') }}</p>
                                    <input type="password" class="form-control p-form__pass" name="password_confirmation">
                                    @error('password')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div><!--/.row -->
                            <button type="submit" class="p-btn p-btn__defalut">{{ __('message.save') }}</button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
