{{ $userType === 'mate' ? $attendance->mateUser->full_name : $attendance->adviserUser->full_name }} さま <br>
<br>
こんにちは、INITです。<br>
レッスン「{{ $attendance->lesson->name }}」への受講メッセージが届きました。<br>
<br>
下記のリンクからメッセージの詳細を確認できます。 <br>
<a href="{{ route('attendances.messages', compact('attendance')) }}?type={{ $userType }}">メッセージ画面</a>
<br>
<p>※こちらのメールは送信専用のメールアドレスより送信しています。恐れ入りますが、直接返信しないようお願いします。</p>

@include('emails._footer')