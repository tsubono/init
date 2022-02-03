@extends('layouts.app')

@section('title', __('message.Transfer application list'))

@section('content')
    <section class="p-admin-list l-content-block">
        <div class="container">
            <div class="p-admin-list__infos tab-content pt-25px">
                <div>
                    @forelse ($transferRequests as $index => $transferRequest)
                        <div class="p-card3">
                            <div class="p-card3__date">
                                <p class="small">{{ __('message.Application date') }} </p>
                                {{ $transferRequest->created_at->format('Y/m/d') }}
                            </div>
                            <div class="p-card3__amount">
                                ¥ {{ number_format($transferRequest->price) }}
                            </div>
                            <div class="p-card3__name">
                                {{ $transferRequest->adviserUser->full_name }}
                            </div>
                            <div class="p-label">{{ $transferRequest->adviserUser->payment_method }}</div>
                            <div class="p-card3__controls">
                                <button type="button" class="p-btn p-btn--rect btn-secondary px-3 py-1 m-2" data-bs-toggle="modal" data-bs-target="#transferInfoModal{{ $index }}">
                                    {{ __('message.Confirmation of transfer destination') }} 
                                </button>
                                @if ($transferRequest->status === \App\Models\TransferRequest::STATUS_COMPLETE)
                                    <button type="button" class="p-btn--rect py-2 px-3 p-btn__defalut" disabled>
                                        {{ __('message.Transfered') }} 
                                    </button>
                                @else
                                    <button type="button" class="p-btn--rect py-2 px-3 p-btn__defalut" data-bs-toggle="modal" data-bs-target="#updateModal{{ $index }}">
                                        {{ __('message.Binded') }} 
                                    </button>
                                @endif
                            </div>
                        </div><!-- /.p-card3 -->
                        <!-- 振込先確認モーダル -->
                        <div class="modal p-modal p-setting fade" id="transferInfoModal{{ $index }}" tabindex="-1" aria-labelledby="transferInfoModalLabel{{ $index }}">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }} "></button>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            @if ($transferRequest->adviserUser->payment_method === 'Paypal送金')
                                                <h2 class="p-heading2 mt-0 text-center">{{ __('message.PayPal E-mail Address') }} </h2>
                                                <p class="m-5 text-large">{{ $transferRequest->adviserUser->paypal_email }}</p>
                                            @elseif ($transferRequest->adviserUser->payment_method === '口座振替')
                                                <h2 class="p-heading2 mt-0 text-center">{{ __('message.Account information') }} </h2>
                                                <p class="my-2 p-label w-25 mx-auto">{{ __('message.surface') }} </p>
                                                <img src="{{ $transferRequest->adviserUser->account_image_1  }}" alt="{{ __('message.Account information') }} " />
                                                <p class="my-2 mt-3 p-label w-25 mx-auto">{{ __('message.Back') }} </p>
                                                <img src="{{ $transferRequest->adviserUser->account_image_2  }}" alt="{{ __('message.Account information') }} " />
                                            @else
                                                <p class="p-error-text">※ {{ __('message.Payment method has not been registered') }} </p>
                                            @endif
                                        </div>
                                    </div><!-- /.modal-body -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- /振込先確認モーダル -->
                        <!-- 振り込み済みにするモーダル -->
                        <div class="modal p-modal p-setting fade" id="updateModal{{ $index }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $index }}">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }} "></button>
                                    <div class="modal-body">
                                        <h2 class="p-heading2 mt-0 text-center">{{ __('message.Update confirmation') }} </h2>
                                        <p class="text-center">
                                            「{{ $transferRequest->adviserUser->full_name }}」{{ __('message.Transfer application status of') }} <br>
                                            {{ __('message.Update to transfer.') }} <br>{{ __('message.Is it OK?') }} 
                                        </p>
                                        <form action="{{ route('admin.transfer-requests.update-status', compact('transferRequest')) }}" method="post">
                                            @csrf
                                            <button class="p-btn p-btn__defalut">{{ __('message.Update') }} </button>
                                        </form>
                                    </div><!-- /.modal-body -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- /振り込み済みにするモーダル -->
                    @empty
                        <div class="text-center">{{ __('message.Importing application is not registered.') }} </div>
                    @endforelse
                </div><!--/.tab-pane -->
            </div><!-- /.p-search__content -->

            <div class="text-center">
                {{ $transferRequests->links('vendor.pagination.custom') }}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
