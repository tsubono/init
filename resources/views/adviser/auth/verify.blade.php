@extends('layouts.app')

@section('title', 'メールアドレス確認')

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    認証メールを再送信しました
                </div>
            @endif
            <div class="text-center">
                <p>ご登録のメールアドレスに認証メールを送信しました。</p>
                <p>届いたメールをご確認の上、記載のリンクから登録を完了させてください。</p>
                <p>メールが届いていない場合は、下記をクリックしてください。</p></div>
            <form class="d-inline" method="POST" action="{{ route('adviser.verification.resend') }}">
                @csrf
                <div class="my-80px">
                    <button type="submit"
                            class="p-btn p-btn__defalut">認証メールを再送する</button>
                </div>
            </form>
        </div>
    </section>
@endsection
