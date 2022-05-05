@extends('layouts.app')

@section('title', __('message.Profile setting'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <!-- タブ部分 -->
            @include('mate.profile._tab_menu')

            <!-- パネル部分 -->
            <form class="p-form" action="{{ route('mate.profile.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ auth()->guard('mate')->user()->id }}">

                <div class="tab-content p-setting__content">
                    <div id="basic">
                        <h2 class="p-heading1">{{ __('message.Basic information change') }}</h2>

                        <div class="p-form">
                            <div class="row">
                                <div class="col-12"><h3 class="p-heading2">{{ __('message.name') }}</h3></div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">{{ __('message.Surname') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></div>
                                    </label>
                                    <input type="text" class="form-control" name="family_name" value="{{ old('family_name', $user->family_name) }}">
                                    @error('family_name')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">{{ __('message.middle name') }}</div>
                                    </label>
                                    <input type="text" class="form-control" name="middle_name" value="{{ old('middle_name', $user->middle_name) }}">
                                    @error('middle_name')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">{{ __('message.Name') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></div>
                                    </label>
                                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                                    @error('first_name')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.Letter') }}</h3>
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">{{ __('message.Surname') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></div>
                                    </label>
                                    <input type="text" class="form-control" name="family_name_kana" value="{{ old('family_name_kana', $user->family_name_kana) }}">
                                    @error('family_name_kana')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">{{ __('message.middle name') }}</div>
                                    </label>
                                    <input type="text" class="form-control" name="middle_name_kana" value="{{ old('middle_name_kana', $user->middle_name_kana) }}">
                                    @error('middle_name_kana')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">{{ __('message.Name') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></div>
                                    </label>
                                    <input type="text" class="form-control" name="first_name_kana" value="{{ old('first_name_kana', $user->first_name_kana) }}">
                                    @error('first_name_kana')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.sex') }}</h3>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               name="gender"
                                               id="form-radio__gender2"
                                               value="男性"
                                                {{ old('gender', $user->gender) === '男性' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="form-radio__gender2">
                                            {{ __('message.male') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               name="gender"
                                               id="form-radio__gender1"
                                               value="女性"
                                                {{ old('gender', $user->gender) === '女性' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="form-radio__gender1">
                                            {{ __('message.woman') }}
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                <div class="p-error-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror

                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.date of birth') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <div class="p-form__label">{{ __('message.Year') }}</div>
                                    </label>
                                    <select class="form-select" name="birthday_y">
                                        <option value="">----</option>
                                        @for ($i=1900; $i<=now()->year; $i++)
                                            <option value="{{ $i }}"
                                                    {{ old('birthday_y', (!empty($user->birthday_year) ? $user->birthday_year : 2000)) == $i  ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('birthday_y')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <div class="p-form__label">{{ __('message.Month') }}</div>
                                    </label>
                                    <select class="form-select" name="birthday_m">
                                        <option value="">----</option>
                                        @for ($i=1; $i<=12; $i++)
                                            <option value="{{ $i }}"
                                                    {{ old('birthday_m', $user->birthday_month) == $i  ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('birthday_m')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <div class="p-form__label">{{ __('message.Day') }}</div>
                                    </label>
                                    <select class="form-select" name="birthday_d">
                                        <option value="">----</option>
                                        @for ($i=1; $i<=31; $i++)
                                            <option value="{{ $i }}"
                                                    {{ old('birthday_d', $user->birthday_day) == $i  ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('birthday_d')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.TEL') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                    <input type="tel" class="form-control" name="tel" value="{{ old('tel', $user->tel) }}">
                                    @error('tel')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.email address') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                    <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <h3 class="p-heading2">{{ __('message.Skype name') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                    <input type="text" class="form-control" name="skype_name" value="{{ old('skype_name', $user->skype_name) }}">
                                    @error('skype_name')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <h3 class="p-heading2">SkypeID<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                    <input type="text" class="form-control" name="skype_id" value="{{ old('skype_id', $user->skype_id) }}">
                                    @error('skype_id')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.profile image') }}</h3>
                                    <div class="col-md-4">
                                        <file-upload
                                                name="image_path"
                                                image-path="{{ old('image_path', $user->image_path) }}"
                                                upload-dir="uploaded/mates/{{ $user->id }}"
                                        ></file-upload>
                                    </div>
                                    @error('image_path')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <h3 class="p-heading2">{{ __('message.Country of origin') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                    <select class="form-select" name="from_country_id">
                                        <option value="">{{ __('message.Please select') }}</option>
                                        @foreach ($mst_countries as $mst_country)
                                            <option value="{{ $mst_country->id }}"
                                                    {{ old('from_country_id', $user->from_country_id) == $mst_country->id ? 'selected' : '' }}>
                                                {{ $mst_country->name_locale }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('from_country_id')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <h3 class="p-heading2">{{ __('message.Country of Residence') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
                                    <select class="form-select" name="residence_country_id">
                                        <option value="">{{ __('message.Please select') }}</option>
                                        @foreach ($mst_countries as $mst_country)
                                            <option value="{{ $mst_country->id }}"
                                                    {{ old('residence_country_id', $user->residence_country_id) == $mst_country->id ? 'selected' : '' }}>
                                                {{ $mst_country->name_locale }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('residence_country_id')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div><!-- /.row -->
                            <button type="submit" class="p-btn p-btn__defalut">{{ __('message.save') }}</button>
                        </div>
                    </div><!-- /.tab-pane -->
                </div>
            </form>
            <div class="text-end mt-3">
                @if ($user->has_active_attendance)
                    <button type="button" class="p-btn--rect btn-default small py-1 px-3" disabled>
                        {{ __('message.Withdraw') }}
                    </button>
                    <p class="p-error-text small">{{ __('message.I can not withdrawber because there is a lesson during or taking a trial application') }}</p>
                @else
                    <button type="button" class="p-btn--rect btn-default small py-1 px-3" data-bs-toggle="modal" data-bs-target="#withdrawalModal">
                        {{ __('message.Withdraw') }}
                    </button>
                @endif
            </div>
            <!-- 退会確認モーダル -->
            <div class="modal p-modal p-setting fade" id="withdrawalModal" tabindex="-1" aria-labelledby="withdrawalModal">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }}"></button>
                        <div class="modal-body">
                            <h2 class="p-heading2 mt-0 text-center">{{ __('message.Withdrawal confirmation') }}</h2>
                            <p class="text-center">
                                {{ __('message.With Init, all registered data will be deleted.') }}<br>{{ __('message.Is it OK?') }}
                            </p>
                            <div class="text-center mt-2">
                                <form action="{{ route('mate.profile.withdrawal') }}" method="post">
                                    @csrf
                                    <button class="p-btn--rect btn-default py-1 px-3">{{ __('message.Withdraw') }}</button>
                                </form>
                            </div>
                        </div><!-- /.modal-body -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- /退会確認モーダル -->
        </div>
    </section>
@endsection
