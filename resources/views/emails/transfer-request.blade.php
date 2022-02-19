<br>
「{{ $transferRequest->adviserUser->full_name }}」{{ __('message.We received an application for transfer from a while.') }}<br>
<br>
{{ __('message.You can check the list of applications from the link below.') }} <br>
<a href="{{ route('admin.transfer-requests.index') }}">{{ __('message.Transfer application list') }}</a>
<br>
<p>※{{ __('message.This email is sent from the send-only email address. Excuse me, but please do not reply directly.') }}</p>

@include('emails._footer')