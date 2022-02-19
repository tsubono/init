@extends('layouts.app')

@section('title', '{{ __('message.Coin Details') }}')

@section('content')
    <section class="p-coin l-content-block">
        <div class="container">
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Purchase / date and time') }}</h3>
                <p>
                    {{ $coin->created_at->format('Y/m/d H:i') }} <br>
                    @if (!is_null($coin->expiration_date))
                        <p class="small">{{ __('message.Expiration date') }}</p>
                        {{ \Carbon\Carbon::parse($coin->expiration_date)->format('Y/m/d') }} <br>
                    @endif
                </p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Number of sheets') }}</h3>
                <p class="coin-amount {{ 0 < $coin->amount ? '' : 'minus' }}">
                    {{ 0 < $coin->amount ? '+'. $coin->amount : $coin->amount }} Coin
                </p>
            </div>
            @if (!empty($coin->payjp_charge_id) || !empty($coin->paypal_transaction_id))
                <div class="mb-3">
                    <h3 class="p-heading3">{{ __('message.Settlement information') }}</h3>
                    <div>
                        @if (!empty($coin->payjp_charge_id))
                            <p>{{ __('message.Pay.jp payment') }}</p>
                            <p>{{ __('message.Settlement ID') }}: {{ $coin->payjp_charge_id }}</p>
                        @else
                            <p>{{ __('message.PayPal payment') }}</p>
                            <p>{{ __('message.Transaction ID') }}: {{ $coin->paypal_transaction_id }}</p>
                        @endif
                    </div>
                </div>
            @endif
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Students') }}</h3>
                <p>{{ $coin->mateUser->full_name ?? '退会ユーザー' }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.remarks') }}</h3>
                <p>{{ $coin->note }}</p>
            </div>

            <div class="my-5 text-center">
                <a href="{{ route('admin.coins.index') }}" class="p-btn p-btn__defalut d-inline-block px-80px">
                    {{ __('message.Return to the coin list') }}
                </a>
            </div>
        </div><!-- /.container -->
    </section>
@endsection
