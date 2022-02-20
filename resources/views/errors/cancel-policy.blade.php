@extends('layouts.app')

@section('title', __('message.cancellation policy'))

@section('content')
    <section class="l-content-block p-team">
        <div class="container pb-100px">
            <!-- タブ部分 -->
            <ul class="nav nav-pills p-setting__tab nav-fill" role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="basic-tab" class="nav-link active" data-bs-toggle="tab" data-bs-target="#mate" type="button" role="tab" aria-controls="mate" aria-selected="true">
                        {{ __('message.Students') }}
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="learn-tab" class="nav-link" data-bs-toggle="tab" data-bs-target="#adviser" type="button" role="tab" aria-controls="adviser" aria-selected="false">
                    {{ __('message.Teacher') }}
                    </button>
                </li>
            </ul>

            <!-- パネル部分 -->
            <div class="tab-content p-setting__content">
                <div id="mate" class="tab-pane active" role="tabpanel" aria-labelledby="mate-tab">
                    {{ __('message.After applying for a lesson contract, the student will not be penalized for the lesson contract until the adviser uses the system on this service to send an e-mail to the effect that the application is accepted. If the student cancels the lesson contract application, the Company shall return the points used by the student when applying for the lesson contract.') }}<br>
                    <br>
                    {{ __('message.After the lesson contract is concluded by sending an e-mail to the effect that the adviser accepts the lesson contract application by the student using the system on this service, the student will be subject to the following cancellation policy, and the date will be changed. Regardless, the adviser will be charged a cancellation fee of 50% and the secretariat will be charged a cancellation fee of 50%.') }}<br>
                    <br>
                        {{ __('message.· 7 days or more ago') }} {{ __('message.0% of the tuition fee') }}<br>
                        {{ __('message.· 7 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_mate')[7] * 100 }}%<br>
                        {{ __('message.· 6 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_mate')[6] * 100 }}%<br>
                        {{ __('message.· 5 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_mate')[5] * 100 }}%<br>
                        {{ __('message.· 4 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_mate')[4] * 100 }}%<br>
                        {{ __('message.· 3 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_mate')[3] * 100 }}%<br>
                        {{ __('message.· 2 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_mate')[2] * 100 }}%<br>
                        {{ __('message.· １ days ago') }}  {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_mate')[1] * 100 }}%<br>
                        ・{{ __('message.Day') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_mate')[0] * 100 }}%<br>
                    <br>
                    {{ __('message.About matters that are not specified in this policy, we') }}「<a href="{{ route('mate-terms') }}" target="_blank" class="primary-link">{{ __('message.Terms of study') }}</a>」{{ __('message.Is applied.') }}<br>
                    <br>
                    {{ __('message.【About notification measures】') }}<br>
                    {{ __('message.· Report to adviser') }}<br>
                    {{ __('message.If the adviser does not appear after a certain amount of time has passed since the start time of the lesson on the day, the student will be given the right to use the report button. If the adviser is notified, the adviser will refund the full tuition fee to the student, and the evaluation may be lowered by the review from the student.') }}<br>
                    <br>
                    {{ __('message.· Report to the student') }}<br>
                    {{ __('message.If the student does not appear after a certain amount of time has passed since the start time of the lesson on the day, the adviser will be given the right to use the report button. If there is a report to the student, the secretariat shall collect 50% of the tuition fee from the student as the adviser and the remaining 50% as the operation and maintenance fee.') }}
                </div>
                <div id="adviser" class="tab-pane" role="tabpanel" aria-labelledby="adviser-tab">
                    {{ __('message.This Cancellation Policy (Adviser, Cancel Policy (Adviser) ) ) Below is called "this policy.). In addition, the definition of terms in this policy is based on the definition of the Terms of Terms (please URL) separately defined by the Company unless otherwise specified in this policy.') }}<br>
                    <br>
                    1. {{ __('message.The adviser shall freely judge whether or not to reject the lesson contract received from the student.') }}<br>
                    <br>
                    2. {{ __('message.The adviser sends an e-mail to accept the application of the lesson contract by the student using the system on the service and the following cancellation policy is applied, and the following cancellation policy is applied, and regardless of the date The secretariat shall be paid for cancellation fee.') }}<br>
                    <br>
                        {{ __('message.· 7 days or more ago') }} {{ __('message.0% of the tuition fee') }}<br>
                        {{ __('message.· 7 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_adviser')[7] * 100 }}%<br>
                        {{ __('message.· 6 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_adviser')[6] * 100 }}%<br>
                        {{ __('message.· 5 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_adviser')[5] * 100 }}%<br>
                        {{ __('message.· 4 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_adviser')[4] * 100 }}%<br>
                        {{ __('message.· 3 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_adviser')[3] * 100 }}%<br>
                        {{ __('message.· 2 days ago') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_adviser')[2] * 100 }}%<br>
                        {{ __('message.· １ days ago') }}  {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_adviser')[1] * 100 }}%<br>
                        ・{{ __('message.Day') }}   {{ __('message.Tuition') }}{{ config('const.cancel_rate.to_adviser')[0] * 100 }}%<br>
                    <br>
                    {{ __('message.In addition, if the adviser does not appear after a certain amount of time has passed since the start time of the lesson on the day, the student will be given the right to use the report button. If there is a report to the adviser, the entire tuition fee will be collected from the adviser as an operating fee, and the evaluation may be lowered by the review from the adviser.') }}<br>
                    <br>
                    3. {{ __('message.About matters that are not specified in this policy, we') }}「<a href="{{ route('adviser-terms') }}" target="_blank" class="primary-link">{{ __('message.Terms of adviser') }}</a>」{{ __('message.Is applied.') }}<br>
                    <br>
                    {{ __('message.【About notification measures】') }}<br>
                    {{ __('message.· Report to adviser') }}<br>
                    {{ __('message.If the adviser does not appear after a certain amount of time has passed since the start time of the lesson on the day, the student will be given the right to use the report button. If the adviser is notified, the adviser will refund the full tuition fee to the student, and the evaluation may be lowered by the review from the student.') }}<br>
                    <br>
                    {{ __('message.· Report to the student') }}<br>
                    {{ __('message.If the student does not appear after a certain amount of time has passed since the start time of the lesson on the day, the adviser will be given the right to use the report button. If there is a report to the student, the secretariat shall collect 50% of the tuition fee from the student as the adviser and the remaining 50% as the operation and maintenance fee.') }}
                </div>
            </div>
@endsection
