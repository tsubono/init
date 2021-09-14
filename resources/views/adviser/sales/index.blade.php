@extends('layouts.app')

@section('title', '売上一覧')

@section('content')
    <section class="p-sale l-content-block">
        <div class="container">
            <div class="text-end">
                <a href="{{ route('mate.coins.buy') }}" class="p-btn p-btn__defalut d-inline-block px-80px">コイン購入</a>
            </div>
            <h3 class="p-heading3 text-center mt-5">累計売上</h3>
            <div class="text-center my-5 price-total">¥ {{ number_format($totalPrice) }}</div>

            <h3 class="p-heading3 text-center mt-5">売上金残高</h3>
            <div class="text-center my-5 price-remain">¥ {{ number_format($remainTotalPrice) }}</div>

            <div class="my-5 text-center">
                @if ($remainTotalPrice !== 0)
                    <form action="{{ route('adviser.sales.request') }}" method="POST">
                        @csrf
                        <button type="submit" class="p-btn p-btn__defalut d-inline-block px-80px">
                            振り込み申請する
                        </button>
                    </form>
                @else
                    <button class="p-btn p-btn__defalut d-inline-block px-80px" disabled>
                        振り込み申請する
                    </button>
                @endif

                @if ($scheduledTransferPrice !== 0)
                    <div class="my-3">
                        <p class="small p-text-underline">次回振り込み予定: ¥ {{ number_format($scheduledTransferPrice) }}</p>
                    </div>
                @endif
            </div>

            <h3 class="p-heading3 text-center">売上一覧</h3>
            <!-- パネル部分 -->
            <div class="p-search__content tab-content">
                <div id="new" class="tab-pane active" role="tabpanel" aria-labelledby="new-tab">
                    @forelse ($sales as $sale)
                        <div class="p-card3">
                            <div class="p-card3__price">
                                ¥ {{ number_format($sale->subtotal) }}
                            </div>
                            <div class="p-card3__note">
                                <p><span class="small">受講日時:</span> {{ $sale->attendance->datetime_txt }}</p>
                                「{{ $sale->name }}」の売上
                            </div>
                            <div class="p-card3__link">
                                <a href="{{ route('attendances.show', ['attendance' => $sale->attendance]) }}" class="primary-link">
                                    受講詳細へ
                                </a>
                            </div>
                        </div><!-- /.p-card3 -->
                    @empty
                        <div class="text-center">売上は見つかりませんでした。</div>
                    @endforelse
                </div><!--/.tab-pane -->
            </div><!-- /.p-search__content -->
            <!-- TODO ページネーション -->
        </div><!-- /.container -->
    </section>
@endsection
