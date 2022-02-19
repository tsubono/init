@extends('layouts.app')

@section('title', 'TEAM INIT')

@section('content')
    <section class="l-content-block p-team">
        <div class="container pt-40px pb-100px">
            <div class="border rounded member-list">
                <div class="member-list__item">
                    <img src="{{ asset('img/team/koshi.png') }}" alt="koshi" class="team-icon">
                    <p class="team-name">CEO Koshi</p>
                </div>
                <div class="member-list__item">
                    <img src="{{ asset('img/team/Atsushi.png') }}" alt="Atsushi" class="team-icon">
                    <p class="team-name">CSO Atsushi</p>
                </div>
                <div class="member-list__item">
                    <img src="{{ asset('img/team/Natsuko.png') }}" alt="Natsuko" class="team-icon">
                    <p class="team-name">CMO Natsuko</p>
                </div>
                <div class="member-list__item">
                    <img src="{{ asset('img/team/maki.png') }}" alt="maki" class="team-icon">
                    <p class="team-name">CFO Maki</p>
                </div>
                <div class="member-list__item">
                    <img src="{{ asset('img/team/jun.png') }}" alt="jun" class="team-icon">
                    <p class="team-name">SA Jun</p>
                </div>
                <div class="member-list__item">
                    <img src="{{ asset('img/team/seiko.png') }}" alt="seiko" class="team-icon">
                    <p class="team-name">SA Seiko</p>
                </div>
            </div>
            <div class="mt-5 w-75 mx-auto">
                <a class="p-btn p-btn__defalut" href="{{ route('adviser.register') }}">{{ __('message.Register as a lecturer') }}</a>
                <a class="p-btn p-btn__defalut mt-3" href="{{ route('contact.index') }}">{{ __('message.Under recruiting staff') }}</a>
            </div>
        </div>
    </section>
@endsection
