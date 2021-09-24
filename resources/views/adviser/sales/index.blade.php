@extends('layouts.app')

@section('title', '売上一覧')

@section('content')
    <section class="p-sale l-content-block">
        <div class="container">
            <h3 class="p-heading3 text-center mt-5">累計売上</h3>
            <div class="text-center my-5 price-total">¥ {{ number_format($totalPrice) }}</div>

            <h3 class="p-heading3 text-center mt-5">売上金残高</h3>
            <div class="text-center my-5 price-remain">¥ {{ number_format($remainTotalPrice) }}</div>

            <div class="my-5 text-center">
                @if ($remainTotalPrice > 0 && !empty(auth()->guard('adviser')->user()->payment_method))
                    <button type="button" class="p-btn p-btn__defalut d-inline-block px-80px" data-bs-toggle="modal" data-bs-target="#requestModal">
                        振り込み申請する
                    </button>
                    <!-- 振り込み申請モーダル -->
                    <div class="modal p-modal p-setting fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                <div class="modal-body">
                                    <h2 class="p-heading2 mt-0 text-center">振り込み申請確認</h2>
                                    <p class="text-center">
                                        売上金残高 ¥ {{ number_format($remainTotalPrice) }} を振り込み申請します。<br>
                                        よろしいですか？
                                    </p>
                                    <form action="{{ route('adviser.sales.request') }}" method="post">
                                        @csrf
                                        <button class="p-btn p-btn__defalut">振り込み申請する</button>
                                    </form>
                                </div><!-- /.modal-body -->
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- /振り込み申請モーダル -->
                @else
                    <button class="p-btn p-btn__defalut d-inline-block px-80px" disabled>
                        振り込み申請する
                    </button>
                @endif

                @if (empty(auth()->guard('adviser')->user()->payment_method))
                    <p class="p-error-text font-weight-bold mt-3">
                        <b>※ 振り込み申請をするためには<a class="primary-link" href="{{ route('adviser.profile.edit.personal') }}">プロフィール更新画面</a>で支払い方法の登録が必要です</b>
                    </p>
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
            <div class="text-center">
                {{ $sales->links('vendor.pagination.custom') }}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
