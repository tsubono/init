<div class="row">
    <div class="col-12">
        <h3 class="p-heading2">レッスン名<span class="badge bg-danger ms-2">必須</span></h3>
        <input type="text" class="form-control" name="name" value="{{ old('name', $lesson->name) }}">
        @error('name')
        <div class="p-error-text" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <div class="col-12">
        <h3 class="p-heading2">画像<span class="badge bg-danger ms-2">必須</span></h3>
        <div class="row">
            <div class="col">
                <file-upload
                        name="images[0]"
                        image-path="{{ old('images.0', isset($lesson->images[0]) ? $lesson->images[0]['image_path'] : null) }}"
                        upload-dir="uploaded/advisers/{{ auth()->guard('adviser')->user()->id }}/lesson"
                ></file-upload>
            </div>
            <div class="col">
                <file-upload
                        name="images[1]"
                        image-path="{{ old('images.1', isset($lesson->images[1]) ? $lesson->images[1]['image_path'] : null) }}"
                        upload-dir="uploaded/advisers/{{ auth()->guard('adviser')->user()->id }}/lesson"
                ></file-upload>
            </div>
            <div class="col">
                <file-upload
                        name="images[2]"
                        image-path="{{ old('images.2', isset($lesson->images[2]) ? $lesson->images[2]['image_path'] : null) }}"
                        upload-dir="uploaded/advisers/{{ auth()->guard('adviser')->user()->id }}/lesson"
                ></file-upload>
            </div>
            @error('images')
            <div class="p-error-text" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            @error('images.0')
            <div class="p-error-text" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
    </div>

    <div class="col-12">
        <h3 class="p-heading2">説明<span class="badge bg-danger ms-2">必須</span></h3>
        <textarea rows="10" class="form-control" name="description">{{ old('description', $lesson->description) }}</textarea>
        @error('description')
            <div class="p-error-text" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="col-12">
        <h3 class="p-heading2">言語<span class="badge bg-danger ms-2">必須</span></h3>
        <!-- 切り替えボタンの設定 -->
        <button type="button" class="p-btn p-btn__black" data-bs-toggle="modal" data-bs-target="#form-languagemodal">
            選択してください
        </button>
        @error('mst_language_id')
            <div class="p-error-text" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror

        <!-- モーダルの設定 -->
        <div class="modal p-modal fade" id="form-languagemodal" tabindex="-1" aria-labelledby="form-languagemodalLabel">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    <div class="modal-body">
                        <h2 class="p-heading2 mt-0">言語</h2>
                        <div class="row">
                            @foreach ($mst_languages as $index => $mst_language)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               name="mst_language_id"
                                               id="form-check__language{{ $index }}"
                                               value="{{ $mst_language->id }}"
                                               {{ old('mst_language_id', $lesson->mst_language_id) == $mst_language->id ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="form-check__language{{ $index }}">
                                          {{ $mst_language->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- /. row -->
                        <button type="button" class="p-btn p-btn__defalut" data-bs-dismiss="modal">閉じる</button>
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div><!-- /.col-12 -->

    <div class="col-12">
        <h3 class="p-heading2">カテゴリ<span class="badge bg-danger ms-2">必須</span></h3>
        <!-- 切り替えボタンの設定 -->
        <button type="button" class="p-btn p-btn__black" data-bs-toggle="modal" data-bs-target="#form-categorymodal">
            選択してください
        </button>
        @error('mst_category_ids')
            <div class="p-error-text" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror

        <!-- モーダルの設定 -->
        <div class="modal p-modal fade" id="form-categorymodal" tabindex="-1" aria-labelledby="form-categorymodalLabel">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    <div class="modal-body">
                        <h2 class="p-heading2 mt-0">カテゴリ</h2>
                        <div class="row">
                            @foreach ($mst_rooms as $index => $mst_room)
                                <div class="col-12 mb-3"><h3><strong>{{ $mst_room->name }}</strong></h3></div>
                                @foreach ($mst_room->categories as $index2 => $category)
                                    <div class="col-6 col-md-3">
                                        <div class="form-check p-card">
                                            <input type="checkbox"
                                                   class="form-check-input"
                                                   name="mst_category_ids[]"
                                                   id="form-check__cate{{ $index }}{{ $index2 }}"
                                                   value="{{ $category->id }}"
                                                   {{ in_array($category->id, old('mst_category_ids', $lesson->category_ids)) ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="form-check__cate{{ $index }}{{ $index2 }}">
                                                <div class="p-card2__icon"><img src="{{ $category->icon_path }}" alt="{{ $category->name }}"></div>
                                              {{ $category->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div><!-- /. row -->
                        <button type="button" class="p-btn p-btn__defalut" data-bs-dismiss="modal">閉じる</button>
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div><!-- /.col-12 -->

    <div class="col-12">
        <h3 class="p-heading2">必要コイン<span class="badge bg-danger ms-2">必須</span></h3>
        <input type="number" class="form-control" name="coin_amount" value="{{ old('coin_amount', $lesson->coin_amount) }}">
    </div>

    <div class="col-12">
        <h3 class="p-heading2">必要ポイント<span class="badge bg-danger ms-2">必須</span></h3>
        <textarea rows="10" class="form-control" name="point_text">{{ old('point_text', $lesson->point_text) }}</textarea>
        @error('point_text')
        <div class="p-error-text" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <div class="col-12">
        <h3 class="p-heading2">動画URL</h3>
        <div class="d-flex flex-wrap">
            @for ($i=0; $i<3; $i++)
                <div class="mb-2 mx-2 flex-grow-1">
                    <p class="small">アイキャッチ画像</p>
                    <file-upload
                            name="movies[{{ $i }}][eye_catch_path]"
                            image-path="{{ old("movies.{$i}.eye_catch_path", isset($lesson->movies[$i]) ? $lesson->movies[$i]['eye_catch_path'] : null) }}"
                            upload-dir="uploaded/advisers/{{ auth()->guard('adviser')->user()->id }}/lessons"
                    ></file-upload>
                    <p class="small mt-1">動画種別</p>
                    <select class="form-select col-2" name="movies[{{ $i }}][type]">
                        @foreach (config('const.movie_types') as $movie_type)
                            <option value="{{ $movie_type }}"
                                    {{ old("movies.{$i}.type", (isset($lesson->movies[$i]) ? $lesson->movies[$i]['type'] : '')) === $movie_type ? 'selected' : '' }}>
                                {{ $movie_type }}
                            </option>
                        @endforeach
                    </select>
                    <p class="small mt-1">動画URL</p>
                    <input type="text"
                           class="form-control"
                           placeholder="https://"
                           name="movies[{{ $i }}][movie_path]"
                           value="{{ old("movies.{$i}.movie_path", (isset($lesson->movies[$i]) ? $lesson->movies[$i]['movie_path'] : '')) }}"
                    />
                </div>
            @endfor
        </div>
        <p class="small p-error-text mx-3">※ 画像・種別・URL全てが入力されていないと登録されませんのでご注意ください</p>
    </div>

    <div class="col-12">
        <h3 class="p-heading2">ステータス</h3>
    </div>
    <div class="col-6">
        <div class="form-check">
            @if (auth()->guard('adviser')->user()->can_open_lesson)
                <input type="hidden" name="is_stop" value="0" />
                <input type="checkbox"
                       class="form-check-input"
                       id="form-control-status"
                       name="is_stop"
                       value="1"
                       {{ old('is_stop', $lesson->is_stop) == 1 ? 'checked' : '' }}
                />
            @else
                <input type="checkbox"
                       class="form-check-input"
                       id="form-control-status"
                       name="is_stop"
                       value="1"
                       checked
                       disabled
                />
                <input type="hidden" name="is_stop" value="1" />
            @endif
            <label class="form-check-label" for="form-control-status">
                受講停止にする
            </label>
        </div>
    </div>
    @if (!auth()->guard('adviser')->user()->can_open_lesson)
        <p class="p-error-text font-weight-bold"><b>※ レッスンを公開するためには<a class="primary-link" href="{{ route('adviser.profile.edit') }}">プロフィール更新画面</a>で必須項目の登録が必要です</b></p>
    @endif
</div><!-- /.row -->
