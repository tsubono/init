@extends('layouts.app')

@section('title', 'プロフィール設定')

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
                        <h2 class="p-heading1">通知設定</h2>
                        <p class="small">講師からの連絡があった場合、メール通知を行うか設定できます</p>
                        <div class="p-form">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="p-heading2">通知設定<span class="badge bg-danger ms-2">必須</span></h3>
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
                                            受信する
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
                                            受信しない
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
                            <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
