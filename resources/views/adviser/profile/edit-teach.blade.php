@extends('layouts.app')

@section('title', __('message.Profile setting'))

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <!-- タブ部分 -->
            @include('adviser.profile._tab_menu')
            <!-- パネル部分 -->
            <form class="p-form" action="{{ route('adviser.profile.update.teach') }}" method="post">
            @csrf
                <div class="tab-content p-setting__content">
                    <div id="learn">
                        <h2 class="p-heading1 mt-0">{{ __('message.Teaching settings') }} </h2>
                        <div class="p-form">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.Language to be taught') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                                    <language-select-multi
                                        :languages="{{ $mst_languages }}"
                                        :value="{{ json_encode(old('mst_language_ids', $user ? $user->language_ids : [])) }}"
                                    ></language-select-multi>
                                    @error('mst_language_ids')
                                        <div class="p-error-text" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div><!-- /.col-12 -->
                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.Category taught') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                                    <category-select
                                        :rooms="{{ $mst_rooms }}"
                                        :value="{{ json_encode(old('mst_category_ids', $user ? $user->category_ids : [])) }}"
                                    ></category-select>
                                    @error('mst_category_ids')
                                        <div class="p-error-text" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div><!-- /.col-12 -->
                                <div class="col-12">
                                    <h3 class="p-heading2">{{ __('message.Qualification to hold') }} </h3>
                                    <textarea class="form-control" cols="20" rows="10" name="qualification_text">{{ old('qualification_text', $user->qualification_text) }}</textarea>
                                    @error('qualification_text')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror

                                    <h3 class="p-heading2">{{ __('message.Video URL') }} </h3>
                                    <div class="d-flex flex-wrap">
                                        @for ($i=0; $i<3; $i++)
                                            <div class="mb-2 mx-2 flex-grow-1">
                                                <p class="small">{{ __('message.I catch image') }} </p>
                                                <file-upload
                                                        name="movies[{{ $i }}][eye_catch_path]"
                                                        image-path="{{ old("movies.{$i}.eye_catch_path", isset($user->adviserUserMovies[$i]) ? $user->adviserUserMovies[$i]['eye_catch_path'] : null) }}"
                                                        upload-dir="uploaded/advisers/{{ $user->id }}/movie"
                                                ></file-upload>
                                                <p class="small mt-1">{{ __('message.Videos') }} </p>
                                                <select class="form-select col-2" name="movies[{{ $i }}][type]">
                                                    @foreach (config('const.movie_types') as $movie_type)
                                                        <option value="{{ $movie_type }}"
                                                                {{ old("movies.{$i}.type", (isset($user->adviserUserMovies[$i]) ? $user->adviserUserMovies[$i]['type'] : '')) === $movie_type ? 'selected' : '' }}>
                                                            {{ $movie_type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p class="small mt-1">{{ __('message.Video URL') }} </p>
                                                <input type="text"
                                                       class="form-control"
                                                       placeholder="https://"
                                                       name="movies[{{ $i }}][movie_path]"
                                                       value="{{ old("movies.{$i}.movie_path", (isset($user->adviserUserMovies[$i]) ? $user->adviserUserMovies[$i]['movie_path'] : '')) }}"
                                                />
                                            </div>
                                        @endfor
                                    </div>
                                    <p class="small p-error-text mx-3">{{ __('message.※ Please note that the image, type type, and URL are not registered without all input') }} </p>

                                    <h3 class="p-heading2">{{ __('message.Self-PR') }} </h3>
                                    <textarea class="form-control" cols="20" rows="10" name="pr_text">{{ old('pr_text', $user->pr_text) }}</textarea>
                                    @error('pr_text')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror

                                    <h3 class="p-heading2">{{ __('message.Lessonable time zone') }} </h3>
                                    <table class="p-form__timezone">
                                        @foreach(collect($user->available_times)->chunk(2) as $available_times_row)
                                            <tr>
                                                @foreach($available_times_row as $available_time)
                                                    <th class="pt-4">{{ $available_time['dayText'] }}</th>
                                                    <td class="pt-4">
                                                        <div class="p-form__timezone__column">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                name="available_times[{{ $available_time['day'] }}][start]"
                                                                value="{{ old("available_times[{$available_time['day']}][start]", $available_time['start']) }}"
                                                            >
                                                            <span>〜</span>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                name="available_times[{{ $available_time['day'] }}][end]"
                                                                value="{{ old("available_times[{$available_time['day']}][end]", $available_time['end']) }}"
                                                            >
                                                        </div>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </table>

                                    <h3 class="p-heading2">{{ __('message.Reason for the trainee') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                                    <textarea class="form-control" cols="20" rows="10" name="reason_text">{{ old('reason_text', $user->reason_text) }}</textarea>
                                    @error('reason_text')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror

                                    <h3 class="p-heading2">{{ __('message.An enthusiasm to give a lecturer') }} <span class="badge bg-danger ms-2">{{ __('message.Required') }} </span></h3>
                                    <textarea class="form-control" cols="20" rows="10" name="passion_text">{{ old('passion_text', $user->passion_text) }}</textarea>
                                    @error('passion_text')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div><!-- /.col12 -->
                            </div><!-- /.row -->
                            <button type="submit" class="p-btn p-btn__defalut">{{ __('message.save') }} </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
