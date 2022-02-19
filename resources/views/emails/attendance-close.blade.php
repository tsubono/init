{{ $attendance->mateUser->full_name }} {{ __('message.looks') }} <br>
<br>
{{ __('message.Hi, INIT.') }}<br>
{{ __('message.lesson') }}「{{ $attendance->lesson->name }}」{{ __('message.The entrance to it is complete.') }}<br>
<br>
{{ __('message.You can check the details of the attendance from the link below.') }} <br>
<a href="{{ route('attendances.show', compact('attendance')) }}?type=mate">{{ __('message.Taking details') }}</a>
<br>
<p>※{{ __('message.This email is sent from the send-only email address. Excuse me, but please do not reply directly.') }}</p>

@include('emails._footer')