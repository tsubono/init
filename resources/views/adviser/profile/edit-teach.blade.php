@extends('layouts.app')

@section('title', 'プロフィール設定')

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
                        <h2 class="p-heading1 mt-0">教える設定</h2>
                        <div class="p-form">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="p-heading2">教えられる言語<span class="badge bg-danger ms-2">必須</span></h3>
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
                                    <h3 class="p-heading2">教えられるカテゴリ<span class="badge bg-danger ms-2">必須</span></h3>
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
                                    <h3 class="p-heading2">保有する資格</h3>
                                    <textarea class="form-control" cols="20" rows="10" name="qualification_text">{{ old('qualification_text', $user->qualification_text) }}</textarea>
                                    @error('qualification_text')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror

                                    <h3 class="p-heading2">動画URL</h3>
                                    <div class="d-flex flex-wrap">
                                        @for ($i=0; $i<3; $i++)
                                            <div class="mb-2 mx-2 flex-grow-1">
                                                <p class="small">アイキャッチ画像</p>
                                                <file-upload
                                                        name="movies[{{ $i }}][eye_catch_path]"
                                                        image-path="{{ old("movies.{$i}.eye_catch_path", isset($user->adviserUserMovies[$i]) ? $user->adviserUserMovies[$i]['eye_catch_path'] : null) }}"
                                                        upload-dir="uploaded/advisers/{{ $user->id }}/movie"
                                                ></file-upload>
                                                <p class="small mt-1">動画種別</p>
                                                <select class="form-select col-2" name="movies[{{ $i }}][type]">
                                                    @foreach (config('const.movie_types') as $movie_type)
                                                        <option value="{{ $movie_type }}"
                                                                {{ old("movies.{$i}.type", (isset($user->adviserUserMovies[$i]) ? $user->adviserUserMovies[$i]['type'] : '')) === $movie_type ? 'selected' : '' }}>
                                                            {{ $movie_type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p class="small mt-1">動画URL</p>
                                                <input type="text"
                                                       class="form-control"
                                                       placeholder="https://"
                                                       name="movies[{{ $i }}][movie_path]"
                                                       value="{{ old("movies.{$i}.movie_path", (isset($user->adviserUserMovies[$i]) ? $user->adviserUserMovies[$i]['movie_path'] : '')) }}"
                                                />
                                            </div>
                                        @endfor
                                    </div>
                                    <p class="small p-error-text mx-3">※ 画像・種別・URL全てが入力されていないと登録されませんのでご注意ください</p>

                                    <h3 class="p-heading2">自己PR</h3>
                                    <textarea class="form-control" cols="20" rows="10" name="pr_text">{{ old('pr_text', $user->pr_text) }}</textarea>
                                    @error('pr_text')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror

                                    <h3 class="p-heading2">レッスン可能時間帯</h3>
                                    <table class="p-form__timezone">
                                        <tr>
                                            <th class="pt-4">月</th>
                                            <td class="pt-4">
                                                <div class="p-form__timezone__column">
                                                    <input type="text" class="form-control" name="available_time_monday_start" value="{{ old('available_time_monday_start', $user->available_time_monday_start) }}">
                                                    <span>〜</span>
                                                    <input type="text" class="form-control" name="available_time_monday_end" value="{{ old('available_time_monday_end', $user->available_time_monday_end) }}">
                                                </div>
                                            </td>
                                            <th class="pt-4">火</th>
                                            <td class="pt-4">
                                                <div class="p-form__timezone__column">
                                                    <input type="text" class="form-control" name="available_time_tuesday_start" value="{{ old('available_time_tuesday_start', $user->available_time_tuesday_start) }}">
                                                    <span>〜</span>
                                                    <input type="text" class="form-control" name="available_time_tuesday_end" value="{{ old('available_time_tuesday_end', $user->available_time_tuesday_end) }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>水</th>
                                            <td class="pt-4">
                                                <div class="p-form__timezone__column">
                                                    <input type="text" class="form-control" name="available_time_wednesday_start" value="{{ old('available_time_wednesday_start', $user->available_time_wednesday_start) }}">
                                                    <span>〜</span>
                                                    <input type="text" class="form-control" name="available_time_wednesday_end" value="{{ old('available_time_wednesday_end', $user->available_time_wednesday_end) }}">
                                                </div>
                                            </td>
                                            <th>木</th>
                                            <td class="pt-4">
                                                <div class="p-form__timezone__column">
                                                    <input type="text" class="form-control" name="available_time_thursday_start" value="{{ old('available_time_thursday_start', $user->available_time_thursday_start) }}">
                                                    <span>〜</span>
                                                    <input type="text" class="form-control" name="available_time_thursday_end" value="{{ old('available_time_thursday_end', $user->available_time_thursday_end) }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>金</th>
                                            <td class="pt-4">
                                                <div class="p-form__timezone__column">
                                                    <input type="text" class="form-control" name="available_time_friday_start" value="{{ old('available_time_friday_start', $user->available_time_friday_start) }}">
                                                    <span>〜</span>
                                                    <input type="text" class="form-control" name="available_time_friday_end" value="{{ old('available_time_friday_end', $user->available_time_friday_end) }}">
                                                </div>
                                            </td>
                                            <th>土</th>
                                            <td class="pt-4">
                                                <div class="p-form__timezone__column">
                                                    <input type="text" class="form-control" name="available_time_saturday_start" value="{{ old('available_time_saturday_start', $user->available_time_saturday_start) }}">
                                                    <span>〜</span>
                                                    <input type="text" class="form-control" name="available_time_saturday_end" value="{{ old('available_time_saturday_end', $user->available_time_saturday_end) }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>日</th>
                                            <td class="pt-4">
                                                <div class="p-form__timezone__column">
                                                    <input type="text" class="form-control" name="available_time_sunday_start" value="{{ old('available_time_sunday_start', $user->available_time_sunday_start) }}">
                                                    <span>〜</span>
                                                    <input type="text" class="form-control" name="available_time_sunday_end" value="{{ old('available_time_sunday_end', $user->available_time_sunday_end) }}">
                                                </div>
                                            </td>
                                            <th></th>
                                            <td></td>
                                        </tr>
                                    </table>

                                    <h3 class="p-heading2">講師をするきっかけ・理由<span class="badge bg-danger ms-2">必須</span></h3>
                                    <textarea class="form-control" cols="20" rows="10" name="reason_text">{{ old('reason_text', $user->reason_text) }}</textarea>
                                    @error('reason_text')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror

                                    <h3 class="p-heading2">講師をする意気込み<span class="badge bg-danger ms-2">必須</span></h3>
                                    <textarea class="form-control" cols="20" rows="10" name="passion_text">{{ old('passion_text', $user->passion_text) }}</textarea>
                                    @error('passion_text')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div><!-- /.col12 -->
                            </div><!-- /.row -->
                            <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
