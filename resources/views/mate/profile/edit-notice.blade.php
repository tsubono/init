@extends('layouts.app')

@section('title', __('message.Profile setting'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <!-- タブ部分 -->
            @include('mate.profile._tab_menu')

            <!-- パネル部分 -->
            <form class="p-form" action="{{ route('mate.profile.update.notice') }}" method="post">
            @csrf
                <div class="tab-content p-setting__content">
                    <div id="notification">
                        <h2 class="p-heading1">{{ __('message.Notification settings') }}</h2>
                        <p class="small">{{ __('message.If you have contact from the adviser, you can set or set an email notification') }}</p>
                        <div class="p-form">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.Notification settings') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               name="is_notice"
                                               id="form-radio__notification-on"
                                               value="1"
                                               {{ old('is_notice', $user->is_notice) == 1 ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="form-radio__notification-on">
                                        {{ __('message.Receive') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               name="is_notice"
                                               id="form-radio__notification-off"
                                               value="0"
                                                {{ old('is_notice', $user->is_notice) == 0 ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="form-radio__notification-off">
                                        {{ __('message.Not received') }}
                                        </label>
                                    </div>
                                </div>
                                @error('is_notice')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <!--/.row -->
                            <button type="submit" class="p-btn p-btn__defalut">{{ __('message.save') }}</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
