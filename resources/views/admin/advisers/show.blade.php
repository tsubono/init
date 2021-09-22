@extends('layouts.app')

@section('title', '講師詳細')

@section('content')
    <section class="p-admin-show l-content-block">
        <div class="container">
            <div class="mb-3">
                <h3 class="p-heading3">氏名</h3>
                <p>
                    <a href="{{ route('advisers.show', compact('adviserUser')) }}" class="primary-link" target="_blank">
                        {{ $adviserUser->full_name }}
                    </a>
                </p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">電話番号</h3>
                <p>{{ $adviserUser->tel }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">メール</h3>
                <p>{{ $adviserUser->email }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">メール認証</h3>
                <p>{{ !empty($adviserUser->email_verified_at) ? \Carbon\Carbon::parse($adviserUser->email_verified_at)->format('Y/m/d H:i') : '未認証' }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">生年月日</h3>
                <p>{{ $adviserUser->birthday }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">住所</h3>
                <p>〒{{ $adviserUser->zipcode }} <br> {{ $adviserUser->address }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">Skype</h3>
                <p>Name: {{ $adviserUser->skype_name }} / ID: {{ $adviserUser->skype_id }}</p>
            </div>
            @if (count($adviserUser->adviserUserPersonalInfos) !== 0)
                <div class="mb-3">
                    <h3 class="p-heading3">個人情報確認画像</h3>
                    <div class="row align-items-center">
                        <p>表面：</p>
                        <div class="d-flex flex-wrap p-image-list">
                            @for ($i=0; $i<4; $i++)
                                @if (!empty($adviserUser->personal_info_front[$i]['image_path']))
                                    <a data-bs-toggle="modal" data-bs-target="#personalModalFront{{ $i }}" class="w-25 mx-1">
                                        <img src="{{ $adviserUser->personal_info_front[$i]['image_path'] }}" class="w-75 m-1 p-image-list__thumbnail" alt="個人情報確認画像" />
                                    </a>
                                    <div class="modal fade p-modal" id="personalModalFront{{ $i }}" tabindex="-1" aria-labelledby="personalModalFront{{ $i }}Label">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                <div class="modal-body">
                                                    <div class="iframe-wrapper">
                                                        <img src="{{ $adviserUser->personal_info_front[$i]['image_path'] }}" alt="個人情報確認画像" class="w-100">
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                @endif
                            @endfor
                        </div>
                        <p class="mt-3">裏面：</p>
                        <div class="d-flex flex-wrap p-image-list">
                            @for ($i=0; $i<4; $i++)
                                @if (!empty($adviserUser->personal_info_back[$i]['image_path']))
                                    <a data-bs-toggle="modal" data-bs-target="#personalModalBack{{ $i }}" class="w-25 mx-1">
                                        <img src="{{ $adviserUser->personal_info_back[$i]['image_path'] }}" class="w-75 m-1 image-list__thumbnail" alt="個人情報確認画像" />
                                    </a>
                                    <div class="modal fade p-modal" id="personalModalBack{{ $i }}" tabindex="-1" aria-labelledby="personalModalBack{{ $i }}Label">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                <div class="modal-body">
                                                    <div class="iframe-wrapper">
                                                        <img src="{{ $adviserUser->personal_info_back[$i]['image_path'] }}" alt="個人情報確認画像" class="w-100">
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            @endif
            <div class="mb-3">
                <h3 class="p-heading3">支払い情報</h3>
                @if (!empty($adviserUser->payment_method))
                    <p>{{ $adviserUser->payment_method }}</p>
                    <div class="my-3 mx-2">
                        @if (!empty($adviserUser->paypal_email))
                            <div class="p-text-underline my-3">○ paypalメールアドレス</div>
                            <p>{{ $adviserUser->paypal_email }}</p>
                        @endif
                        @if (!empty($adviserUser->account_image_1) || !empty($adviserUser->account_image_2))
                            <div class="p-text-underline my-3">○ 口座画像</div>
                            <div class="row align-items-center p-image-list">
                                <div class="col-md-4">
                                    @if (!empty($adviserUser->account_image_1))
                                        <p>表面：</p>
                                        <a data-bs-toggle="modal" data-bs-target="#accountModal1" class="w-25 mx-1">
                                            <img src="{{ $adviserUser->account_image_1 }}" class="w-75 p-image-list__thumbnail" alt="口座画像1" />
                                        </a>
                                        <div class="modal fade p-modal" id="accountModal1" tabindex="-1" aria-labelledby="accountModal1Label">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                    <div class="modal-body">
                                                        <div class="iframe-wrapper">
                                                            <img src="{{ $adviserUser->account_image_1 }}" alt="口座画像1" class="w-100">
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @if (!empty($adviserUser->account_image_1))
                                        <p>裏面：</p>
                                        <a data-bs-toggle="modal" data-bs-target="#accountModal2" class="w-25 mx-1">
                                            <img src="{{ $adviserUser->account_image_2 }}" class="w-75 p-image-list__thumbnail" alt="口座画像2" />
                                        </a>
                                        <div class="modal fade p-modal" id="accountModal2" tabindex="-1" aria-labelledby="accountModal2Label">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                                    <div class="modal-body">
                                                        <div class="iframe-wrapper">
                                                            <img src="{{ $adviserUser->account_image_2 }}" alt="口座画像1" class="w-100">
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <p>未登録</p>
                @endif
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">マッチングフィー率 (%)</h3>
                <p>{{ $adviserUser->fee_rate }} %</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">最終ログイン日時</h3>
                <p>{{ !empty($adviserUser->last_login_at) ? $adviserUser->last_login_at->format('Y/m/d H:i') : '' }}</p>
            </div>

            <div class="my-5 text-center">
                <a href="{{ route('admin.advisers.index') }}" class="p-btn p-btn__defalut d-inline-block px-80px">
                    講師一覧へ戻る
                </a>
            </div>
        </div><!-- /.container -->
    </section>
@endsection
