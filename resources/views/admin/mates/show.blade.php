@extends('layouts.app')

@section('title', '受講者詳細')

@section('content')
    <section class="p-admin-show l-content-block">
        <div class="container">
            <div class="mb-3">
                <h3 class="p-heading3">氏名</h3>
                <p>{{ $mateUser->full_name }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">電話番号</h3>
                <p>{{ $mateUser->tel }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">メール</h3>
                <p>{{ $mateUser->email }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">メール認証</h3>
                <p>{{ !empty($mateUser->email_verified_at) ? \Carbon\Carbon::parse($mateUser->email_verified_at)->format('Y/m/d H:i') : '未認証' }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">生年月日</h3>
                <p>{{ $mateUser->birthday }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">Skype</h3>
                <p>Name: {{ $mateUser->skype_name }} / ID: {{ $mateUser->skype_id }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">PAY.JP 顧客ID</h3>
                <p>{{ $mateUser->payjp_customer_id }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">通知設定</h3>
                <p>{{ $mateUser->is_notice ? 'ON' : 'OFF' }}</p>
            </div>
            <div class="mb-3">
                <h3 class="p-heading3">最終ログイン日時</h3>
                <p>{{ !empty($mateUser->last_login_at) ? $mateUser->last_login_at->format('Y/m/d H:i') : '' }}</p>
            </div>

            <div class="my-5 text-center">
                <a href="{{ route('admin.mates.index') }}" class="p-btn p-btn__defalut d-inline-block px-80px">
                    受講者一覧へ戻る
                </a>
            </div>
        </div><!-- /.container -->
    </section>
@endsection
