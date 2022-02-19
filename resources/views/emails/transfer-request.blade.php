<br>
「{{ $transferRequest->adviserUser->full_name }}」様から振り込み申請が届きました。<br>
<br>
下記のリンクから申請の一覧を確認できます。 <br>
<a href="{{ route('admin.transfer-requests.index') }}">振り込み申請一覧</a>
<br>
<p>※こちらのメールは送信専用のメールアドレスより送信しています。恐れ入りますが、直接返信しないようお願いします。</p>

@include('emails._footer')
