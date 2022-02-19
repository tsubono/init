{{ $user->full_name }} {{ __('message.looks') }} <br>
<br>
{{ __('message.Hi, INIT.') }}<br>
{{ __('message.The withdrawal process has been completed.') }}<br>
{{ __('message.Thank you for using it.') }}<br>
<br>
<p>※{{ __('message.This email is sent from the send-only email address. Excuse me, but please do not reply directly.') }}</p>

@include('emails._footer')