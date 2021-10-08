@extends('layouts.app')

@section('title', 'プロフィール設定')

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <!-- タブ部分 -->
            @include('adviser.profile._tab_menu')
            <!-- パネル部分 -->
            <form class="p-form" action="{{ route('adviser.profile.update.personal') }}" method="post">
            @csrf
                <div class="tab-content p-setting__content">
                    <div id="privacy">
                        <h2 class="p-heading1">個人情報の変更</h2>
                        <div class="p-form">
                            <div class="row">
                                <h3 class="p-heading2">個人情報確認画像（表面）<span class="badge bg-danger ms-2">必須</span></h3>
                                <p class="small mb-2">※運転免許証、保険証、マイナンバーカードのいずれかをご添付ください。</p>
                                <div class="row">
                                    @for ($i=0; $i<4; $i++)
                                        <div class="col">
                                            <file-upload
                                                    name="personal_images_1[{{ $i }}]"
                                                    image-path="{{ old("personal_images_1.{$i}", isset($user->personal_info_front[$i]) ? $user->personal_info_front[$i]['image_path'] : null) }}"
                                                    upload-dir="uploaded/advisers/{{ $user->id }}/personal"
                                            ></file-upload>
                                        </div>
                                    @endfor
                                    @error('personal_images_1')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                    @error('personal_images_1.0')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <h3 class="p-heading2">個人情報確認画像（裏面）<span class="badge bg-danger ms-2">必須</span></h3>
                                <p class="small mb-2">※運転免許証、保険証、マイナンバーカードのいずれかをご添付ください。</p>
                                <div class="row">
                                    @for ($i=0; $i<4; $i++)
                                        <div class="col">
                                            <file-upload
                                                    name="personal_images_2[{{ $i }}]"
                                                    image-path="{{ old("personal_images_2.{$i}", isset($user->personal_info_back[$i]) ? $user->personal_info_back[$i]['image_path'] : null) }}"
                                                    upload-dir="uploaded/advisers/{{ $user->id }}/personal"
                                            ></file-upload>
                                        </div>
                                    @endfor
                                    @error('personal_images_2')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                    @error('personal_images_2.0')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <h3 class="p-heading2">支払い方法</h3>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               name="payment_method"
                                               id="form-radio__payment2"
                                               value="Paypal送金"
                                               {{ old('payment_method', $user->payment_method) === 'Paypal送金' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="form-radio__payment2">
                                            Paypal送金
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               name="payment_method"
                                               id="form-radio__payment1"
                                               value="口座振替"
                                                {{ old('payment_method', $user->payment_method) === '口座振替' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="form-radio__payment1">
                                            口座振替
                                        </label>
                                    </div>
                                </div>
                                <p class="mt-2">※日本国内の口座でない場合は、PayPal送金のみのお支払い方法となります。</p>
                                @error('payment_method')
                                <div class="p-error-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror

                                <h3 class="p-heading2 js-paypal-only">Paypalメールアドレス</h3>
                                <input type="text" class="form-control js-paypal-only" name="paypal_email" value="{{ old('paypal_email', $user->paypal_email) }}">
                                @error('paypal_email')
                                <div class="p-error-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror

                                <h3 class="p-heading2 js-account-only">口座画像</h3>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0 js-account-only">
                                    <h4 class="mb-2"><strong>表紙</strong></h4>
                                    <file-upload
                                            name="account_image_1"
                                            image-path="{{ old('account_image_1', $user->account_image_1) }}"
                                            upload-dir="uploaded/advisers/{{ $user->id }}/personal"
                                    ></file-upload>
                                </div>
                                <div class="col-md-6 col-lg-3 js-account-only">
                                    <h4 class="mb-2"><strong>見開きページ</strong></h4>
                                    <file-upload
                                            name="account_image_2"
                                            image-path="{{ old('account_image_2', $user->account_image_2) }}"
                                            upload-dir="uploaded/advisers/{{ $user->id }}/personal"
                                    ></file-upload>
                                </div>
                                @error('account_image_1')
                                <div class="p-error-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                @error('account_image_2')
                                <div class="p-error-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div><!--/.row -->
                            <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script>
      window.addEventListener('DOMContentLoaded', () => {
        togglePaymentDisplay()

        document.getElementsByName('payment_method').forEach(
          target => target.addEventListener('change',
            () => {
              togglePaymentDisplay()
          })
        )
      })

      function togglePaymentDisplay() {
        const selectedPayment = document.querySelector('input[name="payment_method"]:checked').value
        if (selectedPayment === 'Paypal送金') {
          Array.from(document.getElementsByClassName('js-paypal-only')).forEach(target => target.style.display = 'block')
          Array.from(document.getElementsByClassName('js-account-only')).forEach(target => target.style.display = 'none')
        } else if (selectedPayment === '口座振替') {
          Array.from(document.getElementsByClassName('js-paypal-only')).forEach(target => target.style.display = 'none')
          Array.from(document.getElementsByClassName('js-account-only')).forEach(target => target.style.display = 'block')
        }
      }
    </script>
@endsection
