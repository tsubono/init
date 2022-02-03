{{ $attendance->adviserUser->full_name }} {{ __('message.looks') }}  <br>
<br>
{{ __('message.Hi, INIT.') }} <br>
{{ __('message.Your lesson') }} 「{{ $attendance->lesson->name }}」{{ __('message.There was an application for attendance!') }} <br>
<br>
{{ __('message.You can check the details of the attendance application from the link below.') }}  <br>
<a href="{{ route('attendances.show', compact('attendance')) }}?type=adviser">{{ __('message.Taking details') }} </a>
<br>
<p>※{{ __('message.This email is sent from the send-only email address. Excuse me, but please do not reply directly.') }} </p>

@include('emails._footer')