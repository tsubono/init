{{ $userType === 'mate' ? $attendance->mateUser->full_name : $attendance->adviserUser->full_name }} さま <br>
<br>
こんにちは、INITです。<br>
レッスン「{{ $attendance->lesson->name }}」への受講リマインダー通知です。<br>
<br>
下記のリンクから受講の詳細を確認できます。 <br>
<a href="{{ route('attendances.show', compact('attendance')) }}?type={{ $userType }}">受講詳細</a>
<br>
<p>※こちらのメールは送信専用のメールアドレスより送信しています。恐れ入りますが、直接返信しないようお願いします。</p>

@include('emails._footer')