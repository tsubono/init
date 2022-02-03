<div class="p-lesson-show__avatar">
    <img src="{{ $adviserUser->avatar_image }}" alt="講師画像">
</div>
<h2 class="fw-bold fs-4 text-center mx-auto my-20px">
    {{ $adviserUser->full_name }}
</h2>
<div class="row text-center">
    <div class="col-6 mb-3">
        <h4 class="p-heading3">{{ __('message.Country of origin') }} </h4>
        <div>{{ $adviserUser->fromCountry->name }}</div>
    </div>
    <div class="col-6 mb-3">
        <h4 class="p-heading3">{{ __('message.Country of Residence') }} </h4>
        <div>{{ $adviserUser->residenceCountry->name }}</div>
    </div>
    <div class="col-6 mb-3">
        <h4 class="p-heading3">{{ __('message.sex') }} </h4>
        @if (!empty($adviserUser->gender))
            <div class="p-label__age {{ $adviserUser->gender === '男性' ? 'men' : 'woman' }}">{{ $adviserUser->gender }}</div>
        @else
            {{ __('message.Unregistered') }} 
        @endif
    </div>
    <div class="col-6 mb-3">
        <h4 class="p-heading3">{{ __('message.age') }} </h4>
        <p>{{ $adviserUser->age_txt }}</p>
    </div>
</div>
<h4 class="p-heading3">{{ __('message.status') }} </h4>
<div class="p-status">
    <div class="p-status__box border-bottom">
        <div class="p-status__icon"><img src="{{ asset('img/status-lesson.svg') }}" alt=""></div>
        <div class="p-status__info">
            <div class="num">{{ count($adviserUser->lessons) }}</div>
            レッスン
        </div>
    </div><!-- /.p-status__box -->
    <div class="p-status__box border-bottom border-start">
        <div class="p-status__icon"><img src="{{ asset('img/status-lesson.svg') }}" alt=""></div>
        <div class="p-status__info">
            <div class="num">{{ $adviserUser->mate_count }}</div>
            {{ __('message.Attendance') }} 
        </div>
    </div><!-- /.p-status__box -->
    <div class="p-status__box">
        <div class="p-status__icon"><img src="{{ asset('img/status-cancel.svg') }}" alt=""></div>
        <div class="p-status__info">
            <div class="num">{{ $adviserUser->cancel_rate }}%</div>
            {{ __('message.Cancel') }} 
        </div>
    </div><!-- /.p-status__box -->
    <div class="p-status__box  border-start">
        <div class="p-status__icon"><img src="{{ asset('img/status-login.svg') }}" alt=""></div>
        <div class="p-status__info">
            <div class="num">{{ $adviserUser->last_login_txt }}</div>
        </div>
    </div><!-- /.p-status__box -->

</div><!-- /.p-status -->
<h4 class="p-heading3 mt-4">{{ __('message.Lessonable time zone') }} </h4>
<p class="small mb-2">{{ __('message.Usually, we accept applications 12 hours before the desired lesson date.') }} </p>
<div class="p-timezone border text-center">
    <div class="inner p-3">
        <ul class="p-timezone__list">
            @foreach($adviserUser->available_times as $available_time)
                <li>
                    {{ $available_time['dayText'] }}
                    <span class="time time-first">{{ $available_time['start'] }}</span>
                    <span class="time time-last">{{ $available_time['end'] }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
