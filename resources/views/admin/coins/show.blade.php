@extends('layouts.app')

@section('title', 'コイン詳細')

@section('content')
    <section class="p-coin l-content-block">
        <div class="container">
            <div class="mb-3">
                <h3 class="p-heading3">購入・使用日時</h3>
                <p>
                    {{ $coin->created_at->format('Y/m/d H:i') }} <br>
                    @if (!is_null($coin->expiration_date))
                        <p class="small">有効期限日</p>
                        {{ \Carbon\Carbon::parse($coin->expiration_date)->format('Y/m/d') }} <br>
                    @endif
                </p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">枚数</h3>
                <p class="coin-amount {{ 0 < $coin->amount ? '' : 'minus' }}">
                    {{ 0 < $coin->amount ? '+'. $coin->amount : $coin->amount }} Coin
                </p>
            </div>
            @if (!empty($coin->payjp_charge_id) || !empty($coin->paypal_transaction_id))
                <div class="mb-3">
                    <h3 class="p-heading3">決済情報</h3>
                    <div>
                        @if (!empty($coin->payjp_charge_id))
                            <p>PAY.JP決済</p>
                            <p>決済ID: {{ $coin->payjp_charge_id }}</p>
                        @else
                            <p>PayPal決済</p>
                            <p>取引ID: {{ $coin->paypal_transaction_id }}</p>
                        @endif
                    </div>
                </div>
            @endif
            <div class="mb-3">
                <h3 class="p-heading3">受講者</h3>
                <p>{{ $coin->mateUser->full_name ?? '退会ユーザー' }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">備考</h3>
                <p>{{ $coin->note }}</p>
            </div>

            <div class="my-5 text-center">
                <a href="{{ route('admin.coins.index') }}" class="p-btn p-btn__defalut d-inline-block px-80px">
                    コイン一覧へ戻る
                </a>
            </div>
        </div><!-- /.container -->
    </section>
@endsection
