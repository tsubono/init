@extends('layouts.app')

@section('title', __('message.Profile setting'))

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
                        <h2 class="p-heading1">{{ __('message.Change of personal information') }}</h2>
                        <div class="p-form">
                            <div class="row">
                                <h3 class="p-heading2">{{ __('message.Personal information confirmation image (surface)') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                <p class="small mb-2">
                                    {{ __('message.※ Please attach one of the drivers license, insurance card, and minbal card.') }}<br>
                                    {{ __('message.If you have a qualification, please attach the certificate.') }}
                                </p>
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

                                <h3 class="p-heading2">{{ __('message.Personal information confirmation image (back side)') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                <p class="small mb-2">{{ __('message.※ Please attach one of the drivers license, insurance card, and minbal card.') }}</p>
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

                                <h3 class="p-heading2">{{ __('message.method of payment') }}</h3>
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
                                            {{ __('message.PayPal remittance') }}
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
                                            {{ __('message.Account transfer') }}
                                        </label>
                                    </div>
                                </div>
                                <p class="mt-2">
                                    {{ __('message.※ If it is not an account in Japan, it will be a payment method for PayPal remittance only.') }}<br>
                                    {{ __('message.※ Control of payment method for overseas people is only in Japan for bank transfer.') }}
                                </p>
                                @error('payment_method')
                                <div class="p-error-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror

                                <h3 class="p-heading2 js-paypal-only">{{ __('message.PayPal E-mail Address') }}</h3>
                                <input type="text" class="form-control js-paypal-only" name="paypal_email" value="{{ old('paypal_email', $user->paypal_email) }}">
                                @error('paypal_email')
                                <div class="p-error-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror

                                <h3 class="p-heading2 js-account-only">{{ __('message.Account image') }}</h3>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0 js-account-only">
                                    <h4 class="mb-2"><strong>{{ __('message.cover') }}</strong></h4>
                                    <file-upload
                                            name="account_image_1"
                                            image-path="{{ old('account_image_1', $user->account_image_1) }}"
                                            upload-dir="uploaded/advisers/{{ $user->id }}/personal"
                                    ></file-upload>
                                </div>
                                <div class="col-md-6 col-lg-3 js-account-only">
                                    <h4 class="mb-2"><strong>{{ __('message.Space-open page') }}</strong></h4>
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
                            <button type="submit" class="p-btn p-btn__defalut">{{ __('message.save') }}</button>
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
