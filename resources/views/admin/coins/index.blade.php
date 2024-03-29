@extends('layouts.app')

@section('title', __('message.Coin list'))

@section('content')
    <section class="p-searchblock bg-light l-content-block">
        <div class="container">
            <form action="" class="p-form">
                <a class="p-btn p-btn__outline d-md-none" data-bs-toggle="collapse" href="#collapseDetail" role="button" aria-expanded="false" aria-controls="collapseDetail">
                    {{ __('message.search') }}
                </a>
                <div class="collapse" id="collapseDetail">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">{{ __('message.username') }}</h3>
                            <input type="text" class="form-control" placeholder="{{ __('message.Please fill in') }}"
                                   name="condition[user_name]"
                                   value="{{ isset($condition['user_name']) ? $condition['user_name'] : '' }}"
                            />
                        </div>
                        <div class="col-md-6">
                            <h3 class="p-heading3">{{ __('message.Purchase / usage date') }}</h3>
                            <div class="d-flex align-items-center">
                                <input type="date" class="form-control" placeholder="{{ __('message.Please fill in') }}"
                                       name="condition[date_start]"
                                       value="{{ isset($condition['date_start']) ? $condition['date_start'] : '' }}"
                                />
                                <span class="mx-2">〜</span>
                                <input type="date" class="form-control" placeholder="{{ __('message.Please fill in') }}"
                                       name="condition[date_end]"
                                       value="{{ isset($condition['date_end']) ? $condition['date_end'] : '' }}"
                                />
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <div class="d-flex justify-content-end align-items-center p-searchblock__controls">
                        <a class="primary-link mx-5" href="{{ route('admin.coins.index') }}">{{ __('message.reset') }}</a>
                        <button class="p-btn p-btn__black d-inline-block mt-2 py-2 px-5">{{ __('message.search') }}</button>
                    </div>
                </div><!-- /.collapse -->
            </form>
        </div>
    </section>
    <section class="p-coin p-admin-list l-content-block">
        <div class="container">
            <div class="text-end">
                <a onclick="document.getElementById('exportForm').submit()" class="p-btn p-btn__defalut d-inline-block px-80px">
                    {{ __('message.export') }}
                </a>
                <form action="{{ route('admin.coins.export-csv') }}" method="post" id="exportForm">
                    @csrf
                    <input type="hidden" name="condition[user_name]" value="{{ !empty($condition['user_name']) ? $condition['user_name'] : null }}">
                    <input type="hidden" name="condition[date_start]" value="{{ !empty($condition['date_start']) ? $condition['date_start'] : null }}">
                    <input type="hidden" name="condition[date_end]" value="{{ !empty($condition['date_end']) ? $condition['date_end'] : null }}">
                </form>
            </div>
            <div class="p-search__content tab-content">
                <div class="p-admin-list__infos">
                    @forelse ($coins as $coin)
                        <div class="p-card3">
                            <div class="p-card3__date">
                                <p class="small">{{ __('message.Purchase date') }}</p>
                                {{ $coin->created_at->format('Y/m/d H:i') }} <br>
                                @if (!is_null($coin->expiration_date))
                                    <p class="small">{{ __('message.Expiration date') }}</p>
                                    {{ \Carbon\Carbon::parse($coin->expiration_date)->format('Y/m/d') }} <br>
                                @endif
                            </div>
                            <div class="p-card3__amount {{ 0 < $coin->amount ? '' : 'minus' }}">
                                {{ 0 < $coin->amount ? '+'. $coin->amount : $coin->amount }} Coin
                            </div>
                            <div class="p-card3__note">
                                {{ $coin->note }}
                            </div>
                            <div class="p-card3__controls">
                                <a href="{{ route('admin.coins.show', compact('coin')) }}" class="p-btn p-btn__defalut d-inline-block mt-2 py-2 px-4">
                                    {{ __('message.detail') }}
                                </a>
                            </div>
                        </div><!-- /.p-card3 -->
                    @empty
                        <div class="text-center">{{ __('message.No coin was found.') }}</div>
                    @endforelse
                </div>
            </div><!-- /.p-search__content -->
            <div class="text-center">
                {!! $coins->appends([
                 'condition[user_name]' => $condition['user_name'] ?? '',
                 'condition[date_start]' => $condition['date_start'] ?? '',
                 'condition[date_end]' => $condition['date_end'] ?? '',
             ])->render('vendor.pagination.custom')!!}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
