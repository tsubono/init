@extends('layouts.app')

@section('title', 'プロフィール設定')

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <!-- タブ部分 -->
            @include('mate.profile._tab_menu')

            <!-- パネル部分 -->
            <form class="p-form" action="{{ route('mate.profile.update.learn') }}" method="post">
            @csrf
                <div class="tab-content p-setting__content">
                    <div id="learn">
                        <h2 class="p-heading1">学びたい設定</h2>
                        <div class="p-form">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="p-heading2">学びたい言語<span class="badge bg-danger ms-2">必須</span></h3>
                                    <!-- 切り替えボタンの設定 -->
                                    <button type="button" class="p-btn p-btn__black" data-bs-toggle="modal" data-bs-target="#form-languagemodal">
                                        選択してください
                                    </button>
                                    @error('mst_language_ids')
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
                                                    <h2 class="p-heading2">教えられる言語</h2>
                                                    <div class="row">
                                                        @foreach ($mst_languages as $index => $mst_language)
                                                            <div class="col-md-4">
                                                                <div class="form-check">
                                                                    <input type="checkbox"
                                                                           class="form-check-input"
                                                                           name="mst_language_ids[]"
                                                                           id="form-check__language{{ $index }}"
                                                                           value="{{ $mst_language->id }}"
                                                                            {{ in_array($mst_language->id, old('mst_language_ids', $user->language_ids)) ? 'checked' : '' }}
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
                                    <h3 class="p-heading2">学びたいカテゴリ<span class="badge bg-danger ms-2">必須</span></h3>
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
                                                    <h2 class="p-heading2">教えられるカテゴリ</h2>
                                                    <div class="row">
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
                                                                                    {{ in_array($category->id, old('mst_category_ids', $user->category_ids)) ? 'checked' : '' }}
                                                                            />
                                                                            <label class="form-check-label" for="form-check__cate{{ $index }}{{ $index2 }}">
                                                                                <div class="p-card2__icon"><img src="{{ $category->icon_path }}" alt="{{ $category->name }}"></div>
                                                                                {{ $category->name }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endforeach
                                                        </div><!-- /.row  -->
                                                    </div><!-- /. row -->
                                                    <button type="button" class="p-btn p-btn__defalut" data-bs-dismiss="modal">閉じる</button>
                                                </div><!-- /.modal-body -->
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div><!-- /.col-12 -->

                                <div class="col-12">
                                    <h3 class="p-heading2">自己PR</h3>
                                    <textarea class="form-control" cols="20" rows="10" name="pr_text">{{ old('pr_text', $user->pr_text) }}</textarea>
                                    @error('pr_text')
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
