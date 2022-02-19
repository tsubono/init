<br>
{!! nl2br(e($informationMail->content)) !!}<br>
<br>
<br>
<p>※{{ __('message.This email is sent from the send-only email address. Excuse me, but please do not reply directly.') }}</p>

@include('emails._footer')