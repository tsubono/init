<div class="row">
    <div class="col-12">
        <h3 class="p-heading2">{{ __('message.date') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
        <input type="text" class="form-control" name="date" value="{{ old('date', !is_null($infoMail->date) ? $infoMail->date->format('Y-m-d') : '') }}">
        @error('date')
        <div class="p-error-text" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <div class="col-12">
        <h3 class="p-heading2">{{ __('message.kinds') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
        <select class="form-select" name="type">
            <option value="">{{ __('message.Please select') }} </option>
            <option value="{{ \App\Models\InformationMail::TYPE_ALL }}" {{ old('type', $infoMail->type) == \App\Models\InformationMail::TYPE_ALL ? 'selected' : '' }}>
                {{ __('message.Notification to everyone') }} 
            </option>
            <option value="{{ \App\Models\InformationMail::TYPE_ONLY_IS_NOTICE }}" {{ old('type', $infoMail->type) == \App\Models\InformationMail::TYPE_ONLY_IS_NOTICE ? 'selected' : '' }}>
                {{ __('message.Notification ON only') }} 
            </option>
        </select>
        @error('type')
        <div class="p-error-text" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <div class="col-12">
        <h3 class="p-heading2">{{ __('message.title') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
        <input type="text" class="form-control" name="title" value="{{ old('title', $infoMail->title) }}">
        @error('title')
        <div class="p-error-text" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <div class="col-12">
        <h3 class="p-heading2">{{ __('message.Content') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
        <textarea rows="10" class="form-control" name="content">{{ old('content', $infoMail->content) }}</textarea>
        @error('content')
        <div class="p-error-text" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
</div><!-- /.row -->
