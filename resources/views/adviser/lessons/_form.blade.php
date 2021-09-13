<div class="row">
    <div class="col-12">
        <h3 class="p-heading2">レッスン名<span class="badge bg-danger ms-2">必須</span></h3>
        <input type="text" class="form-control">
    </div>

    <div class="col-12">
        <h3 class="p-heading2">プロフィール画像<span class="badge bg-danger ms-2">必須</span></h3>
        <div class="row">
            <div class="col">
                <file-upload></file-upload>
            </div>
            <div class="col">
                <file-upload></file-upload>
            </div>
            <div class="col">
                <file-upload></file-upload>
            </div>
        </div>
    </div>

    <div class="col-12">
        <h3 class="p-heading2">説明<span class="badge bg-danger ms-2">必須</span></h3>
        <textarea rows="10" class="form-control"></textarea>
    </div>

    <div class="col-12">
        <h3 class="p-heading2">言語<span class="badge bg-danger ms-2">必須</span></h3>
        <!-- 切り替えボタンの設定 -->
        <button type="button" class="p-btn p-btn__black" data-bs-toggle="modal" data-bs-target="#form-languagemodal">
            選択してください
        </button>

        <!-- モーダルの設定 -->
        <div class="modal p-modal fade" id="form-languagemodal" tabindex="-1" aria-labelledby="form-languagemodalLabel">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    <div class="modal-body">
                        <h2 class="p-heading2 mt-0">言語</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="form-check__language1">
                                    <label class="form-check-label" for="form-check__language1">
                                        日本語ネイティブ
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="form-check__language2">
                                    <label class="form-check-label" for="form-check__language2">
                                        英語日常会話
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="form-check__language3">
                                    <label class="form-check-label" for="form-check__language3">
                                        テキストが入ります
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="form-check__language4">
                                    <label class="form-check-label" for="form-check__language4">
                                        テキストが入ります
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="form-check__language5">
                                    <label class="form-check-label" for="form-check__language5">
                                        テキストが入ります
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="form-check__language6">
                                    <label class="form-check-label" for="form-check__language6">
                                        テキストが入ります
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="form-check__language7">
                                    <label class="form-check-label" for="form-check__language7">
                                        テキストが入ります
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="form-check__language8">
                                    <label class="form-check-label" for="form-check__language8">
                                        テキストが入ります
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="form-check__language9">
                                    <label class="form-check-label" for="form-check__language9">
                                        テキストが入ります
                                    </label>
                                </div>
                            </div>
                        </div><!-- /. row -->
                        <button type="button" class="p-btn p-btn__defalut" data-bs-dismiss="modal">保存する</button>
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

        <!-- モーダルの設定 -->
        <div class="modal p-modal fade" id="form-categorymodal" tabindex="-1" aria-labelledby="form-categorymodalLabel">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    <div class="modal-body">
                        <h2 class="p-heading2 mt-0">カテゴリ</h2>
                        <div class="row">
                            <div class="col-12 mb-3"><h3><strong>ビジネスルーム</strong></h3></div>
                            <div class="col-6 col-md-3">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate1">
                                    <label class="form-check-label" for="form-check__cate1">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-language.svg') }}" alt=""></div>
                                        語学
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate2">
                                    <label class="form-check-label" for="form-check__cate2">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-qualification.svg') }}" alt=""></div>
                                        資格取得
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mb-3 mt-3 mt-md-0">
                                <h3><strong>自分磨きルーム</strong></h3>
                            </div>

                            <div class="col-6 col-md-3">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate3">
                                    <label class="form-check-label" for="form-check__cate3">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-fashion.svg') }}" alt=""></div>
                                        ファッション
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate4">
                                    <label class="form-check-label" for="form-check__cate4">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-lifestyle.svg') }}" alt=""></div>
                                        ライフスタイル
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate5">
                                    <label class="form-check-label" for="form-check__cate5">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-beauty.svg') }}" alt=""></div>
                                        ビューティー
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate6">
                                    <label class="form-check-label" for="form-check__cate6">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-fitness.svg') }}" alt=""></div>
                                        フィットネス
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 mb-3 mt-3 mt-md-0">
                                <h3><strong>スキルアップルーム</strong></h3>
                            </div>

                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate7">
                                    <label class="form-check-label" for="form-check__cate7">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-language.svg') }}" alt=""></div>
                                        語学
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate8">
                                    <label class="form-check-label" for="form-check__cate8">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-music.svg') }}" alt=""></div>
                                        音楽
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate9">
                                    <label class="form-check-label" for="form-check__cate9">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-sports.svg') }}" alt=""></div>
                                        スポーツ
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate10">
                                    <label class="form-check-label" for="form-check__cate10">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-it.svg') }}" alt=""></div>
                                        IT
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate11">
                                    <label class="form-check-label" for="form-check__cate11">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-design.svg') }}" alt=""></div>
                                        芸術
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="form-check p-card">
                                    <input class="form-check-input" type="checkbox" id="form-check__cate12">
                                    <label class="form-check-label" for="form-check__cate12">
                                        <div class="p-card2__icon"><img src="{{ asset('img/category/icon-therapy.svg') }}" alt=""></div>
                                        セラピー
                                    </label>
                                </div>
                            </div>

                        </div><!-- /. row -->
                        <button type="button" class="p-btn p-btn__defalut" data-bs-dismiss="modal">保存する</button>
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div><!-- /.col-12 -->

    <div class="col-12">
        <h3 class="p-heading2">必要コイン<span class="badge bg-danger ms-2">必須</span></h3>
        <input type="text" class="form-control">
    </div>

    <div class="col-12">
        <h3 class="p-heading2">動画URL</h3>
        <input type="text" class="form-control mt-2" placeholder="https://">
        <input type="text" class="form-control mt-2" placeholder="https://">
        <input type="text" class="form-control mt-2" placeholder="https://">
    </div>

    <div class="col-12">
        <h3 class="p-heading2">ステータス</h3>
    </div>
    <div class="col-6">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="form-control-status">
            <label class="form-check-label" for="form-control-status">
                受講停止にする
            </label>
        </div>
    </div>
</div><!-- /.row -->
