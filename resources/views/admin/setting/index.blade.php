@extends('layouts.app')

@section('title', __('message.Site setting'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <form class="p-form" action="{{ route('admin.setting.update', compact('setting')) }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <h3 class="p-heading2">{{ __('message.Maintenance mode') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input type="radio"
                                   class="form-check-input"
                                   name="is_maintenance"
                                   id="form-radio__notification-on"
                                   value="1"
                                    {{ old('is_maintenance', $setting->is_maintenance) == 1 ? 'checked' : '' }}
                            />
                            <label class="form-check-label" for="form-radio__notification-on">
                                ON
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input type="radio"
                                   class="form-check-input"
                                   name="is_maintenance"
                                   id="form-radio__notification-off"
                                   value="0"
                                    {{ old('is_maintenance', $setting->is_maintenance) == 0 ? 'checked' : '' }}
                            />
                            <label class="form-check-label" for="form-radio__notification-off">
                                OFF
                            </label>
                        </div>
                    </div>
                    @error('is_maintenance')
                    <div class="p-error-text" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="my-80px">
                    <button type="submit" class="p-btn p-btn__defalut">{{ __('message.Update') }} </button>
                </div>
            </form>
        </div>
    </section>
@endsection
