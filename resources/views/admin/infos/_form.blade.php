<div class="row">
    <div class="col-12">
        <h3 class="p-heading2">{{ __('message.date') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
        <input type="text" class="form-control" name="date" value="{{ old('date', !is_null($info->date) ? $info->date->format('Y-m-d') : '') }}">
        @error('date')
        <div class="p-error-text" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <div class="col-12">
        <h3 class="p-heading2">{{ __('message.category') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
        <select class="form-select" name="category">
            <option value="">{{ __('message.Please select') }}</option>
            @foreach (config('const.info_categories') as $category)
                <option value="{{ $category }}" {{ old('category', $info->category) === $category ? 'selected' : '' }}>
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
        <h3 class="p-heading2">{{ __('message.title') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
        <input type="text" class="form-control" name="title" value="{{ old('title', $info->title) }}">
        @error('title')
        <div class="p-error-text" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <div class="col-12">
        <h3 class="p-heading2">{{ __('message.Content') }}<span class="badge bg-danger ms-2">{{ __('message.Required') }}</span></h3>
        <textarea rows="10" class="form-control" name="content">{{ old('content', $info->content) }}</textarea>
        @error('content')
        <div class="p-error-text" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
</div><!-- /.row -->
