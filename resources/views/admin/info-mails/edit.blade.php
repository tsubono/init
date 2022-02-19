@extends('layouts.app')

@section('title', __('message.Notice Delivery Edit'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <form class="p-form" action="{{ route('admin.info-mails.update', ['info_mail' => $infoMail]) }}" method="post">
                @csrf
                @method('PUT')

                @include('admin.info-mails._form')

                <div class="my-80px">
                    <button type="submit" class="p-btn p-btn__defalut">{{ __('message.save') }}</button>
                </div>
            </form>
        </div>
    </section>
@endsection
