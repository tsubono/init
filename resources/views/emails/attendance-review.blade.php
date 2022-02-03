{{ $userType === 'mate' ? $attendance->mateUser->full_name : $attendance->adviserUser->full_name }} {{ __('message.looks') }}  <br>
<br>
{{ __('message.Hi, INIT.') }} <br>
{{ __('message.lesson') }} 「{{ $attendance->lesson->name }}」{{ __('message.A review review has arrived.') }} <br>
<br>
{{ __('message.You can check the details of the review from the link below.') }}  <br>
<a href="{{ route('attendances.messages', compact('attendance')) }}?type={{ $userType }}">{{ __('message.Message screen') }} </a>
<br>
<p>※{{ __('message.This email is sent from the send-only email address. Excuse me, but please do not reply directly.') }} </p>

@include('emails._footer')