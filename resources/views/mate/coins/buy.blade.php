@extends('layouts.app')

@section('title', 'コイン購入')

@section('content')
    <section class="p-coin l-content-block">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h3 class="p-heading2">購入コイン枚数<span class="badge bg-danger ms-2">必須</span></h3>
                    <input type="number" name="amount" class="form-control" placeholder="コイン枚数を入力してください" min="1" />
                    <p class="mt-1">※ 1コイン = 100円になります</p>
                    <p class="p-error-text" id="errorTxt"></p>
                </div>
            </div>
            <div class="row" id="paymentButtons">
                <div class="col-6">
                    <h3 class="p-heading3 text-center mt-5">PayPal決済</h3>
                    <!-- PayPal決済ボタン表示 -->
                    <div id="paypal-button-container"></div>
                </div>

                <div class="col-6">
                    <h3 class="p-heading3 text-center mt-5">PAY.JP決済</h3>
                    <form action="{{ route('mate.coins.payment-by-payjp') }}" method="post" id="payjpForm1">
                        @csrf
                        <input type="hidden" name="price" class="price-input" />
                        <script
                                src="https://checkout.pay.jp/"
                                class="payjp-button"
                                data-key="{{ config('services.payjp.public_key') }}"
                                data-text="クレジットカード情報を入力する"
                                data-submit-text="クレジットカードを登録する"
                        ></script>
                    </form>
                    @if (!empty($cardList))
                        <p class="my-3">もしくは登録済みのカードで支払い</p>
                        <form action="{{ route('mate.coins.payment-by-payjp') }}" method="post" id="payjpForm2">
                            @csrf
                            <input type="hidden" name="price" class="price-input" />
                            @foreach ($cardList as $card)
                                <div class="border p-3">
                                    <label>
                                        <input type="radio" name="payjp_card_id" value="{{ $card['id'] }}" required />
                                        <span class="brand">{{ $card['brand'] }}</span>
                                        <span>{{ $card['number'] }}</span>
                                        <div>
                                            <p>名義: {{ $card['name'] }}</p>
                                            <p>期限: {{ $card['exp_year'] }}/{{ $card['exp_month'] }}</p>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                            <div class="text-center">
                                <button type="submit" class="p-btn p-btn__defalut d-inline-block mt-3">選択したカードで決済する</button>
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
    <!-- PayPal決済設定 -->
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
              description: 'メイトユーザーID: {{ auth()->user()->id }} によるコイン購入'
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
          document.querySelector('#errorTxt').textContent = '1コイン以上を入力してください'
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


