<br>
@if ($isAdmin)
    {{ __('message.Inquiry I received an inquiry from the inquiry form.') }}<br>
    {{ __('message.Please check the following contents.') }}<br>
@else
    {{ $contact->name }} {{ __('message.looks') }} <br>
    <br>
    {{ __('message.Thank you very much for contacting Init.') }}<br>
    {{ __('message.We received inquiries with the following contents.') }}<br>
    {{ __('message.If there is no reply even after a few days, please contact us again.') }}<br>
@endif
<br>
================================ <br>
▼{{ __('message.Contents of inquiry') }} <br>
-------------------------------- <br>
【{{ __('message.name') }}】{{ $contact->name }} {{ __('message.looks') }} <br>
【{{ __('message.email address') }}】{{ $contact->email }} <br>
【{{ __('message.category') }}】{{ $contact->category }} <br>
【{{ __('message.subject') }}】{{ $contact->title }} <br>
【{{ __('message.Content') }}】<br>
{!! nl2br(e($contact->content)) !!}<br>
<br>
<br>
<p>※{{ __('message.This email is sent from the send-only email address. Excuse me, but please do not reply directly.') }}</p>

@include('emails._footer')