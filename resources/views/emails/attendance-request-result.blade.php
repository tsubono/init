{{ $attendance->mateUser->full_name }} さま <br>
<br>
こんにちは、INITです。<br>
@if ($attendance->status == \App\Models\Attendance::STATUS_APPROVAL)
    レッスン「{{ $attendance->lesson->name }}」への受講申請が承認されました！<br>
@else
    レッスン「{{ $attendance->lesson->name }}」への受講申請が否認されました。<br>
@endif
<br>
下記のリンクから受講申請の詳細を確認できます。 <br>
<a href="{{ route('attendances.index') }}?type=mate">受講一覧</a>
<br>
<p>※こちらのメールは送信専用のメールアドレスより送信しています。恐れ入りますが、直接返信しないようお願いします。</p>

@include('emails._footer')