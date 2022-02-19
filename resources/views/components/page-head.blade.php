<section class="p-layer-head">
    <div class="container">
        <div class="p-layer-head__title">
            <h1>@yield('title', '')</h1>
        </div>
    </div>
</section>

<!-- messages -->
@if (session('success_message'))
    <div class="alert alert-success text-center">{!! session('success_message') !!}</div>
@endif
@if (session('error_message'))
    <div class="alert alert-danger text-center">{!! session('error_message') !!}</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger text-center">{{ __('message.There is an error in the input form') }}</div>
@endif
<!-- /messages -->
