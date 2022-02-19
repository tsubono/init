@extends('layouts.app')

@section('title', __('message.Lecturer list'))

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
                            <h3 class="p-heading3"> {{ __('message.username') }}</h3>
                            <input type="text" class="form-control" placeholder="{{ __('message.Please fill in') }}"
                                   name="condition[user_name]"
                                   value="{{ isset($condition['user_name']) ? $condition['user_name'] : '' }}"
                            />
                        </div>
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">{{ __('message.telephone number') }}</h3>
                            <input type="text" class="form-control" placeholder="{{ __('message.Please fill in') }}"
                                   name="condition[tel]"
                                   value="{{ isset($condition['tel']) ? $condition['tel'] : '' }}"
                            />
                        </div>
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">{{ __('message.Email') }}</h3>
                            <input type="text" class="form-control" placeholder="{{ __('message.Please fill in') }}"
                                   name="condition[email]"
                                   value="{{ isset($condition['email']) ? $condition['email'] : '' }}"
                            />
                        </div>
                    </div><!-- /.row -->
                    <div class="d-flex justify-content-end align-items-center p-searchblock__controls">
                        <a class="primary-link mx-5" href="{{ route('admin.advisers.index') }}">{{ __('message.reset') }}</a>
                        <button class="p-btn p-btn__black d-inline-block mt-2 py-2 px-5">{{ __('message.search') }}</button>
                    </div>
                </div><!-- /.collapse -->
            </form>
        </div>
    </section>
    <section class="p-adviser p-admin-list l-content-block">
        <div class="container">
            <div class="text-end">
                <a onclick="document.getElementById('exportForm').submit()" class="p-btn p-btn__defalut d-inline-block px-80px">
                    {{ __('message.export') }}
                </a>
                <form action="{{ route('admin.advisers.export-csv') }}" method="post" id="exportForm">
                    @csrf
                    <input type="hidden" name="condition[user_name]" value="{{ !empty($condition['user_name']) ? $condition['user_name'] : null }}">
                    <input type="hidden" name="condition[email]" value="{{ !empty($condition['email']) ? $condition['email'] : null }}">
                    <input type="hidden" name="condition[tel]" value="{{ !empty($condition['tel']) ? $condition['tel'] : null }}">
                </form>
            </div>
            <div class="p-search__content tab-content">
                <div class="p-admin-list__infos">
                    @forelse ($adviserUsers as $adviserUser)
                        <div class="p-card3">
                            <div class="p-card3__user_info">
                                <div class="user_info-name my-2">
                                    <a href="{{ route('advisers.show', compact('adviserUser')) }}">
                                        {{ $adviserUser->full_name }}
                                    </a>
                                </div>
                                <div class="my-2">
                                    TEL：{{ $adviserUser->tel }}
                                    メール：{{ $adviserUser->email }}
                                </div>
                            </div>
                            <div class="p-card3__controls">
                                <a href="{{ route('admin.advisers.show', compact('adviserUser')) }}" class="p-btn p-btn__defalut d-inline-block mt-2 py-2 px-4">
                                    {{ __('message.detail') }}
                                </a>
                            </div>
                        </div><!-- /.p-card3 -->
                    @empty
                        <div class="text-center">{{ __('message.Lecturer was not found.') }}</div>
                    @endforelse
                </div>
            </div><!-- /.p-search__content -->
            <div class="text-center">
                {!! $adviserUsers->appends([
                 'condition[user_name]' => $condition['user_name'] ?? '',
                 'condition[tel]' => $condition['tel'] ?? '',
                 'condition[email]' => $condition['email'] ?? '',
             ])->render('vendor.pagination.custom')!!}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
