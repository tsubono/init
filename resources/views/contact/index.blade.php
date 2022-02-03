@extends('layouts.app')

@section('title', __('message.inquiry'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <form class="p-form" action="{{ route('contact.send') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <h3 class="p-heading2">{{ __('message.Full name') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <h3 class="p-heading2">{{ __('message.email address') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <h3 class="p-heading2">{{ __('message.category') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                        <select class="form-select" name="category">
                            <option value="">{{ __('message.Please select') }} </option>
                            @foreach (config('const.contact_categories') as $category)
                                <option value="{{ $category }}" {{ old('category') === $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <h3 class="p-heading2">{{ __('message.subject') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>


                    <div class="col-12">
                        <h3 class="p-heading2">{{ __('message.Content') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                        <textarea rows="10" class="form-control" name="content">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="p-error-text" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div><!-- /.row -->

                <div class="my-4">
                    <div>
                        <div class="form-check p-card">
                            <input class="form-check-input" type="checkbox" name="agree_check" onchange="toggleSubmitButton()" />
                            <label class="form-check-label">
                                <a href="{{ route('privacy') }}" target="_blank" class="primary-link">{{ __('message.privacy policy') }} </a>{{ __('message.Agree') }} 
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="p-btn p-btn__defalut" id="submitButton" disabled>{{ __('message.Send') }} </button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section ('js')
   <script>
        function toggleSubmitButton() {
          if (document.querySelector('input[name="agree_check"]:checked') === null) {
            document.getElementById('submitButton').disabled = true
          } else {
            document.getElementById('submitButton').disabled = false
          }
        }
   </script>
@endsection
