@extends('layouts.app')

@section('title', __('message.Profile setting'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <!-- タブ部分 -->
            @include('mate.profile._tab_menu')

            <!-- パネル部分 -->
            <form class="p-form" action="{{ route('mate.profile.update.learn') }}" method="post">
            @csrf
                <div class="tab-content p-setting__content">
                    <div id="learn">
                        <h2 class="p-heading1">{{ __('message.Setting you want to learn') }}</h2>
                        <div class="p-form">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.Language to learn') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                    <language-select-multi
                                            :languages="{{ $mst_languages }}"
                                            :value="{{ json_encode(old('mst_language_ids', $user ? $user->language_ids : [])) }}"
                                    ></language-select-multi>
                                    @error('mst_language_ids')
                                        <div class="p-error-text" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div><!-- /.col-12 -->
                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.Category you want to learn') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                    <category-select
                                            :rooms="{{ $mst_rooms }}"
                                            :value="{{ json_encode(old('mst_category_ids', $user ? $user->category_ids : [])) }}"
                                    ></category-select>
                                    @error('mst_category_ids')
                                        <div class="p-error-text" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div><!-- /.col-12 -->

                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.Self-PR') }}</h3>
                                    <textarea class="form-control" cols="20" rows="10" name="pr_text">{{ old('pr_text', $user->pr_text) }}</textarea>
                                    @error('pr_text')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div><!-- /.col12 -->
                            </div><!-- /.row -->
                            <button type="submit" class="p-btn p-btn__defalut">{{ __('message.save') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
