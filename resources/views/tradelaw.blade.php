@extends('layouts.app')

@section('title', __('message.Display based on special business'))

@section('content')
    <section class="l-content-block p-team">
        <div class="container pb-100px">
            <b>{{ __('message.Seller') }}：INIT</b> <br>
            <br>
            <b>{{ __('message.Representative') }}</b>： {{ __('message.Takeshi Ozaki') }}<br>
            <b>{{ __('message.email address') }}</b>： k.ozaki@init-online.com<br>
            <br>
            <b>{{ __('message.Compensation of services') }}</b><br>
            {{ __('message.We will provide matching services to students as a service through this service. As a consideration for the service, the student will pay us a matching fee. The amount of the matching fee, which is the consideration for the service, is the balance after deducting the amount of the lesson fee from the amount of the service fee paid by the student.') }}<br>
            {{ __('message.The amount of the service fee is the amount corresponding to the number of coins set by the instructor, and the ratio of the amount of the matching fee, which is the consideration for the service, to the amount of the lesson fee in the amount of the service fee is individually between our company and the instructor. It shall be determined. The number of coins set by the above instructor will be displayed on our website.') }}<br>
            「<b>{{ __('message.Operating company') }}</b>」{{ __('message.And') }}<br>
            「<b>{{ __('message.This service') }}</b>」{{ __('message.And INIT is called the service operated by our company.') }}<br>
            「<b>{{ __('message.Our site') }}</b>」{{ __('message.And the latest websites managed by our company.') }}<br>
            「<b>{{ __('message.lesson') }}</b>」{{ __('message.Is a generic term for providing knowledge and information of knowledge, conversation and performance training, advice act.') }}<br>
            「<b>{{ __('message.Students') }}</b>」{{ __('message.And the person who wants to attend lessons or actually attends.') }}<br>
            「<b>{{ __('message.Teacher') }}</b>」{{ __('message.And, I would like to offer or actually provide lessons.') }}<br>
            「<b>{{ __('message.Lesson contract') }}</b>」{{ __('message.And is a contract on the provision and attendance of lessons concluded between the adviser and the student.') }}<br>
            「<b>{{ __('message.Lesson Fee') }}</b>」{{ __('message.And, as a compensation for the lesson contract, the number of students pay the adviser through our company.') }}<br>
            「<b>{{ __('message.Matching service') }}</b>」{{ __('message.Is a service that mediates a lesson contract and a lesson fee payment, and it is a service that mediates a lesson-fee payment.') }}<br>
            「<b>{{ __('message.Matching fee') }}</b>」{{ __('message.And, as a compensation for matching service use, the number of charges paid to the Company (the amount of consumption tax equivalent fractional amount), which is compensation for the service in this service.') }}<br>
            「<b>{{ __('message.Service fee') }}</b>」{{ __('message.And is the total amount of matching fee for lessons and services (the amount of consumption tax equivalent).') }}<br>
            「<b>{{ __('message.coin') }}</b>」{{ __('message.Is the electromagnetic records granted to students from our company as consideration for certain money, and is the payment of service fees.') }}<br>
            <br>
            <b>{{ __('message.Money to bear other than the conventional service') }}</b><br>
            {{ __('message.It is the following costs and rates to pay for students outside the matching fee for the role.') }}<br>
            {{ __('message.Bank transfer fee for payment proceedings for coin purchase price and other costs') }}<br>
            {{ __('message.Lesson Fee') }}<br>
            {{ __('message.Communication charges and connection fees that use this service or to take lessons') }}<br>
            {{ __('message.Purchase costs of equipment needed to use headset, microphone, earphone etc. Skype') }}<br>
            <br>
            <b>{{ __('message.Payment time of service consideration') }}</b><br>
            {{ __('message.Students shall pay the matching fee, which is compensation for the service, along with the lesson fee when the student applying for a lesson contract.') }}<br>
            <br>
            <b>{{ __('message.Method of payment of services') }}</b><br>
            {{ __('message.Students shall pay a matching fee, which is a compensation for the service, in combination with the lesson fee, purchasing coins and using it.') }}<br>
            {{ __('message.Payment method: Credit card · PayPal · Rakuten ID payment') }}<br>
            <br>
            <b>{{ __('message.Service when the service is provided') }}</b><br>
            {{ __('message.When a student has applied for a lesson contract, the service will be started.') }}<br>
            <br>
            <b>{{ __('message.Coin validity period') }}</b><br>
            {{ __('message.We will be three months from the day when we issued coins to the students.') }}<br>
            <br>
            <b>{{ __('message.Usage coin return') }}</b>
            {{ __('message.If the Company applies to the following 1. or 2., the company returns the coin used by the student when applying for a lesson contract.') }}<br>
            1：{{ __('message.After applying for a lesson contract by a student, a lesson contract application is canceled by the student before the adviser sends an e-mail of the application consent') }}<br>
            2：{{ __('message.After the lesson contract is established, 24 hours before the lesson start date and time of the lesson contract, the lesson contract after the establishment is canceled by the student') }}<br>
            <br>
            「<b>{{ __('message.Coin return') }}</b>」{{ __('message.Is that, at the same time as the student applies for the lesson contract, the coins deducted from the students coins as coins equivalent to the service fee related to the lesson contract are returned as the students coins based on the cancellation policy. I say that.') }}<br>
            <br>
            <b>{{ __('message.penalty') }}</b><br>
            {{ __('message.Change lesson time by applying for students') }}<br>
            →{{ __('message.In addition to the service fees defined in the lesson contract, we will draw a single coin as a penalty from the carrier coin.') }}<br>
        </div>
</section>
@endsection
