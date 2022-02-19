@extends('layouts.app')

@section('title', __('message.Teacher details'))

@section('content')
    <section class="p-admin-show l-content-block">
        <div class="container">
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Full name') }}</h3>
                <p>{{ $mateUser->full_name }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.telephone number') }}</h3>
                <p>{{ $mateUser->tel }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Email') }}</h3>
                <p>{{ $mateUser->email }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Mail authentication') }}</h3>
                <p>{{ !empty($mateUser->email_verified_at) ? \Carbon\Carbon::parse($mateUser->email_verified_at)->format('Y/m/d H:i') : '未認証' }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.date of birth') }}</h3>
                <p>{{ $mateUser->birthday }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">Skype</h3>
                <p>Name: {{ $mateUser->skype_name }} / ID: {{ $mateUser->skype_id }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Pay.jp Customer ID') }}</h3>
                <p>{{ $mateUser->payjp_customer_id }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Notification settings') }}</h3>
                <p>{{ $mateUser->is_notice ? 'ON' : 'OFF' }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">{{ __('message.Last login date and time') }}</h3>
                <p>{{ !empty($mateUser->last_login_at) ? $mateUser->last_login_at->format('Y/m/d H:i') : '' }}</p>
            </div>

            <div class="my-5 text-center">
                <a href="{{ route('admin.mates.index') }}" class="p-btn p-btn__defalut d-inline-block px-80px">
                    {{ __('message.Back to the list of students') }}
                </a>
            </div>
        </div><!-- /.container -->
    </section>
@endsection
