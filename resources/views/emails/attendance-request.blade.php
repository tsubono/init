{{ $attendance->adviserUser->full_name }} さま <br>
<br>
こんにちは、INITです。<br>
あなたのレッスン「{{ $attendance->lesson->name }}」に受講申請がありました！<br>
<br>
下記のリンクから受講申請の詳細を確認できます。 <br>
<a href="{{ route('attendances.show', compact('attendance')) }}?type=adviser">受講詳細</a>
<br>
<p>※こちらのメールは送信専用のメールアドレスより送信しています。恐れ入りますが、直接返信しないようお願いします。</p>

@include('emails._footer')