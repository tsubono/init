<div class="p-lesson-show__avatar">
    <img src="{{ $adviserUser->avatar_image }}" alt="講師画像">
</div>
<h2 class="fw-bold fs-4 text-center mx-auto my-20px">
    {{ $adviserUser->full_name }}
</h2>
<div class="row text-center">
    <div class="col-6 mb-3">
        <h4 class="p-heading3">出身国</h4>
        <div>{{ $adviserUser->fromCountry->name }}</div>
    </div>
    <div class="col-6 mb-3">
        <h4 class="p-heading3">居住国</h4>
        <div>{{ $adviserUser->residenceCountry->name }}</div>
    </div>
    <div class="col-6 mb-3">
        <h4 class="p-heading3">性別</h4>
        @if (!empty($adviserUser->gender))
            <div class="p-label__age {{ $adviserUser->gender === '男性' ? 'men' : 'woman' }}">{{ $adviserUser->gender }}</div>
        @else
            未登録
        @endif
    </div>
    <div class="col-6 mb-3">
        <h4 class="p-heading3">年齢</h4>
        <p>{{ $adviserUser->age_txt }}</p>
    </div>
</div>
<h4 class="p-heading3">ステータス</h4>
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
            受講生徒
        </div>
    </div><!-- /.p-status__box -->
    <div class="p-status__box">
        <div class="p-status__icon"><img src="{{ asset('img/status-cancel.svg') }}" alt=""></div>
        <div class="p-status__info">
            <div class="num">{{ $adviserUser->cancel_rate }}%</div>
            キャンセル
        </div>
    </div><!-- /.p-status__box -->
    <div class="p-status__box  border-start">
        <div class="p-status__icon"><img src="{{ asset('img/status-login.svg') }}" alt=""></div>
        <div class="p-status__info">
            <div class="num">{{ $adviserUser->last_login_txt }}</div>
        </div>
    </div><!-- /.p-status__box -->

</div><!-- /.p-status -->
<h4 class="p-heading3 mt-4">レッスン可能時間帯</h4>
<p class="small mb-2">通常、希望レッスン日時の12時間前まで申込みを受け付けています。</p>
<div class="p-timezone border text-center">
    <div class="inner p-3">
        <ul class="p-timezone__list">
            <li>
                月　
                <span class="time time-first">{{ $adviserUser->available_time_monday_start }}</span>
                <span class="time time-last">{{ $adviserUser->available_time_monday_end }}</span>
            </li>
            <li>
                火　
                <span class="time time-first">{{ $adviserUser->available_time_tuesday_start }}</span>
                <span class="time time-last">{{ $adviserUser->available_time_tuesday_end }}</span>
            </li>
            <li>
                水　
                <span class="time time-first">{{ $adviserUser->available_time_wednesday_start }}</span>
                <span class="time time-last">{{ $adviserUser->available_time_wednesday_end }}</span>
            </li>
            <li>
                木　
                <span class="time time-first">{{ $adviserUser->available_time_thursday_start }}</span>
                <span class="time time-last">{{ $adviserUser->available_time_thursday_end }}</span>
            </li>
            <li>
                金　
                <span class="time time-first">{{ $adviserUser->available_time_friday_start }}</span>
                <span class="time time-last">{{ $adviserUser->available_time_friday_end }}</span>
            </li>
            <li>
                土　
                <span class="time time-first">{{ $adviserUser->available_time_saturday_start }}</span>
                <span class="time time-last">{{ $adviserUser->available_time_saturday_end }}</span>
            </li>
            <li>
                日　
                <span class="time time-first">{{ $adviserUser->available_time_sunday_start }}</span>
                <span class="time time-last">{{ $adviserUser->available_time_sunday_end }}</span>
            </li>
        </ul>
    </div>
</div>
