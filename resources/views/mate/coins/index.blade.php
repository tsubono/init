@extends('layouts.app')

@section('title', 'コイン一覧')

@section('content')
    <section class="p-coin l-content-block">
        <div class="container">
            <div class="text-end">
                <a href="{{ route('mate.coins.buy') }}" class="p-btn p-btn__defalut d-inline-block px-80px">コイン購入</a>
            </div>
            <h3 class="p-heading3 text-center mt-5">保有コイン</h3>
            <div class="text-center my-5 coin-amount">{{ number_format(auth()->guard('mate')->user()->total_coin_amount) }}Coin</div>
            <h3 class="p-heading3 text-center">コイン使用・購入履歴</h3>
            <!-- パネル部分 -->
            <div class="p-search__content tab-content">
                <div id="new" class="tab-pane active" role="tabpanel" aria-labelledby="new-tab">
                    @forelse ($coins as $coin)
                        <div class="p-card3">
                            <div class="p-card3__date">
                                <p class="small">購入日</p>
                                {{ $coin->created_at->format('Y/m/d H:i') }} <br>
                                @if (!is_null($coin->expiration_date))
                                    <p class="small">有効期限日</p>
                                    {{ \Carbon\Carbon::parse($coin->expiration_date)->format('Y/m/d') }} <br>
                                @endif
                            </div>
                            <div class="p-card3__amount {{ 0 < $coin->amount ? '' : 'minus' }}">
                                {{ 0 < $coin->amount ? '+'. $coin->amount : $coin->amount }}
                            </div>
                            <div class="p-card3__note">
                                {{ $coin->note }}
                            </div>
                        </div><!-- /.p-card3 -->
                    @empty
                        <div class="text-center">コインは見つかりませんでした。</div>
                    @endforelse
                </div><!--/.tab-pane -->
            </div><!-- /.p-search__content -->
            <div class="text-center">
                {{ $coins->links('vendor.pagination.custom') }}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
