{{ $attendance->mateUser->full_name }} {{ __('message.looks') }} <br>
<br>
{{ __('message.Hi, INIT.') }}<br>
@if ($attendance->status == \App\Models\Attendance::STATUS_APPROVAL)
{{ __('message.lesson') }}「{{ $attendance->lesson->name }}」{{ __('message.Apply for attendance to!') }}<br>
@else
{{ __('message.lesson') }}「{{ $attendance->lesson->name }}」{{ __('message.An application for attendance was denied.') }}<br>
@endif
<br>
{{ __('message.You can check the details of the attendance application from the link below.') }} <br>
<a href="{{ route('attendances.show', compact('attendance')) }}?type=mate">{{ __('message.Taking details') }}</a>
<br>
<p>※{{ __('message.This email is sent from the send-only email address. Excuse me, but please do not reply directly.') }}</p>

@include('emails._footer')