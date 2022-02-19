@extends('layouts.app')

@section('title', __('message.Purchase coin'))

@section('content')
    <div class="alert alert-warning text-center">{{ __('message.Coin expiration date is from the date of purchase') }} {{ config('const.coin_expiration_month') }} {{ __('message.It is a month') }}</div>
    <section class="p-coin l-content-block">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <h3 class="p-heading2">{{ __('message.Buy coin number') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                    <input type="number" name="amount" class="form-control" placeholder="{{ __('message.Please enter the number of coins') }}" min="1" />
                    <p class="mt-1">※ {{ __('message.1 coin = 100 yen') }}</p>
                    <p class="p-error-text" id="errorTxt"></p>
                </div>
            </div>
            <div class="row button-area" id="paymentButtons">
                <div class="col-md-6 col-xs-12">
                    <h3 class="p-heading3 text-center mt-3">{{ __('message.PayPal payment') }}</h3>
                    <div id="paypal-button-container" class="pe-none o-60"></div>
                </div>

                <div class="col-md-6 col-xs-12">
                    <h3 class="p-heading3 text-center mt-3">{{ __('message.Pay.jp payment') }}</h3>
                    <form action="{{ route('mate.coins.payment-by-payjp') }}" method="post" id="payjpForm1" class="pe-none o-60">
                        @csrf
                        <input type="hidden" name="price" class="price-input" />
                        <script
                                src="https://checkout.pay.jp/"
                                class="payjp-button"
                                data-key="{{ config('services.payjp.public_key') }}"
                                data-text="{{ __('message.Enter Credit Card Information') }}"
                                data-submit-text="{{ __('message.Register your credit card') }}"
                        ></script>
                    </form>
                    @if (!empty($cardList))
                        <p class="my-3">{{ __('message.Or pay by a registered card') }}</p>
                        <form action="{{ route('mate.coins.payment-by-payjp') }}" method="post" id="payjpForm2" class="pe-none o-60">
                            @csrf
                            <input type="hidden" name="price" class="price-input" />
                            @foreach ($cardList as $card)
                                <div class="border p-3">
                                    <label>
                                        <input type="radio" name="payjp_card_id" value="{{ $card['id'] }}" required />
                                        <span class="brand">{{ $card['brand'] }}</span>
                                        <span>{{ $card['number'] }}</span>
                                        <div>
                                            <p>{{ __('message.name') }}: {{ $card['name'] }}</p>
                                            <p>{{ __('message.Duration') }}: {{ $card['exp_year'] }}/{{ $card['exp_month'] }}</p>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                            <div class="text-center">
                                <button type="submit" class="p-btn p-btn__defalut d-inline-block mt-3">{{ __('message.Settle with the selected card') }}</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <style>
        #payjp_checkout_box input[type=button] {
            width: 100%;
            padding: 15px 0;
            font-size: 15px;
            font-weight: bold;
        }
    </style>
@endsection

@section('js')
    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=JPY&locale=ja_JP&disable-funding=card&intent=capture"></script>
    <script>
      paypal.Buttons({
        // 自動生成されたボタンが押下された際に実行され、決済内容の設定を行う
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: document.querySelector('[name=amount]').value * 100,
              },
              description: '受講者ユーザーIDID: {{ auth()->user()->id }} によるコイン購入'
            }],
          });
        },

        // PayPalログイン・支払い承認後実行される
        onApprove: function(data, actions) {
          return actions.order.capture().then(function (orderData) {
            // 決済が成功した場合
            const transaction = orderData.purchase_units[0].payments.captures[0]
            // 決済情報レコードを登録
            fetch('/api/paypal/order-capture', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                user_id: '{{ auth()->user()->id }}',
                amount: document.querySelector('[name=amount]').value,
                transaction_status: transaction.status,
                transaction_id: transaction.id,
              }),
            }).then(function (response) {
              return response.clone().json()
            }).then(function (json) {
              if (json.status === 'ok') {
                location.href = '{{ route('mate.coins.index') }}'
              }
            }).catch(error => {
              console.log(error)
            })
          })
        }
      }).render('#paypal-button-container');

      // 金額入力フォーム変更時
      const amountInput = document.querySelector('[name=amount]')
      amountInput.addEventListener('change', (event) => {
        const value = event.target.value;
        const className = ['pe-none', 'o-60'];
        const payContainers = document.querySelectorAll('#paypal-button-container, #payjpForm1, #payjpForm2');

        if (value === '' || parseInt(value) < 1) {
          document.querySelector('#errorTxt').textContent = "{{ __('message.Please enter one coin or more') }}"
          payContainers.forEach(element => element.classList.add(...className));
        } else {
          document.querySelector('#errorTxt').textContent = ''
          const payjpForm = document.querySelectorAll('#payjpForm1 [name=price], #payjpForm2 [name=price]');
          payjpForm.forEach(element => element.value = value * 100);
          payContainers.forEach(element => element.classList.remove(...className));
        }
      })
    </script>
@endsection


