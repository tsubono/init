@extends('layouts.app')

@section('title', __('message.List of sales'))

@section('content')
    <section class="p-sale l-content-block">
        <div class="container">
            <h3 class="p-heading3 text-center mt-5">{{ __('message.Cumulative sales') }}</h3>
            <div class="text-center my-5 price-total">¥ {{ number_format($totalPrice) }}</div>

            <h3 class="p-heading3 text-center mt-5">{{ __('message.Situation balance') }}</h3>
            <div class="text-center my-5 price-remain">¥ {{ number_format($remainTotalPrice) }}</div>

            <div class="my-5 text-center">
                @if (auth()->guard('adviser')->user()->has_active_transfer_request)
                    <button type="button" class="p-btn p-btn__defalut d-inline-block px-80px" disabled>
                        {{ __('message.Under application') }}
                    </button>
                @elseif ($remainTotalPrice > 0 && !empty(auth()->guard('adviser')->user()->payment_method))
                    <button type="button" class="p-btn p-btn__defalut d-inline-block px-80px" data-bs-toggle="modal" data-bs-target="#requestModal">
                        {{ __('message.Apply for transfer') }}
                    </button>
                    <!-- 振り込み申請モーダル -->
                    <div class="modal p-modal p-setting fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                                <div class="modal-body">
                                    <h2 class="p-heading2 mt-0 text-center">{{ __('message.Transfer application confirmation') }}</h2>
                                    <p class="text-center">
                                        {{ __('message.Situation balance') }} ¥ {{ number_format($remainTotalPrice) }} {{ __('message.We apply for transfer.') }}<br>
                                        {{ __('message.Is it OK?') }}
                                    </p>
                                    <form action="{{ route('adviser.sales.request') }}" method="post">
                                        @csrf
                                        <button class="p-btn p-btn__defalut">{{ __('message.Apply for transfer') }}</button>
                                    </form>
                                </div><!-- /.modal-body -->
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- /振り込み申請モーダル -->
                @else
                    <button class="p-btn p-btn__defalut d-inline-block px-80px" disabled>
                        {{ __('message.Apply for transfer') }}
                    </button>
                @endif

                @if (empty(auth()->guard('adviser')->user()->payment_method))
                    <p class="p-error-text font-weight-bold mt-3">
                        <b>※ {{ __('message.In order to apply for transfer') }}<a class="primary-link" href="{{ route('adviser.profile.edit.personal') }}">{{ __('message.Profile Update Screen') }}</a>{{ __('message.Requires registration of payment method') }}</b>
                    </p>
                @endif

                @if ($scheduledTransferPrice !== 0)
                    <div class="my-3">
                        <p class="small p-text-underline">{{ __('message.Next time planned') }}: ¥ {{ number_format($scheduledTransferPrice) }}</p>
                    </div>
                @endif
            </div>

            <h3 class="p-heading3 text-center">{{ __('message.List of sales') }}</h3>
            <!-- パネル部分 -->
            <div class="p-search__content tab-content">
                <div id="new" class="tab-pane active" role="tabpanel" aria-labelledby="new-tab">
                    @forelse ($sales as $sale)
                        <div class="p-card3">
                            <div class="p-card3__price">
                                ¥ {{ number_format($sale->subtotal) }}
                            </div>
                            <div class="p-card3__note">
                                <p><span class="small">{{ __('message.Date of attendance') }}:</span> {{ $sale->attendance->datetime_txt }}</p>
                                「{{ $sale->name }}」{{ __('message.Sales') }}
                            </div>
                            <div class="p-card3__link">
                                <a href="{{ route('attendances.show', ['attendance' => $sale->attendance]) }}" class="primary-link">
                                    {{ __('message.To take details') }}
                                </a>
                            </div>
                        </div><!-- /.p-card3 -->
                    @empty
                        <div class="text-center">{{ __('message.Sales were not found.') }}</div>
                    @endforelse
                </div><!--/.tab-pane -->
            </div><!-- /.p-search__content -->
            <div class="text-center">
                {{ $sales->links('vendor.pagination.custom') }}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
