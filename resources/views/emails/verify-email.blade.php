<p>{{ __('message.Please click the following authentication link.') }}</p>

<a href="{{ $url }}" rel="nofollow" target="_blank">→{{ __('message.Authenticate email address') }}</a>

<p>
    ※{{ __('message.If you can not click Log in and complete this registration button, copy the following URL and paste it into the browser.') }}<br>
    {{ $url }}
</p>
<p>※{{ __('message.This email is sent from the send-only email address. Excuse me, but please do not reply directly.') }}</p>

@include('emails._footer')