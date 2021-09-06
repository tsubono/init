@extends('layouts.app')

@section('title', '（講師）プロフィール設定')

@section('content')
    <section class="p-layer-head">
        <div class="container">
            <div class="p-layer-head__title">
                <h1>
                    <span class="p-layer-head__en">Profile Settings</span>
                    プロフィール設定
                </h1>
            </div>
        </div>
    </section>
    <section class="l-content-block p-setting">
        <div class="container">
            <!-- タブ部分 -->
            <ul class="nav nav-pills p-setting__tab nav-fill" role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="basic-tab" class="nav-link active" data-bs-toggle="tab" data-bs-target="#basic" type="button" role="tab" aria-controls="basic" aria-selected="true">基本情報の変更</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="learn-tab" class="nav-link" data-bs-toggle="tab" data-bs-target="#learn" type="button" role="tab" aria-controls="learn" aria-selected="false">教える設定</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="password-tab" class="nav-link" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">パスワードの変更</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="privacy-tab" class="nav-link" data-bs-toggle="tab" data-bs-target="#privacy" type="button" role="tab" aria-controls="privacy" aria-selected="false">個人情報の変更</button>
                </li>
            </ul>

            <form class="p-form" action="{{ route('adviser.profile.update') }}" method="post">
            @csrf
                <!-- パネル部分 -->
                <div class="tab-content p-setting__content">
                    <div id="basic" class="tab-pane active" role="tabpanel" aria-labelledby="basic-tab">
                        <h2 class="p-heading1">基本情報の変更</h2>

                        <div class="p-form">
                            <div class="row">
                                <div class="col-12"><h3 class="p-heading2">お名前</h3></div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">姓<span class="badge bg-danger ms-2">必須</span></div>
                                    </label>
                                    <input type="text" class="form-control" value="田中">
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">ミドルネーム</div>
                                    </label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">名<span class="badge bg-danger ms-2">必須</span></div>
                                    </label>
                                    <input type="text" class="form-control" value="太郎">
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">ふりがな</h3>
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">せい<span class="badge bg-danger ms-2">必須</span></div>
                                    </label>
                                    <input type="text" class="form-control" value="たなか">
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">みどるねーむ</div>
                                    </label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">めい<span class="badge bg-danger ms-2">必須</span></div>
                                    </label>
                                    <input type="text" class="form-control" value="たろう">
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">性別<span class="badge bg-danger ms-2">必須</span></h3>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="form-radio__gender" id="form-radio__gender2">
                                        <label class="form-check-label" for="form-radio__gender2">
                                            男性
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="form-radio__gender" id="form-radio__gender1">
                                        <label class="form-check-label" for="form-radio__gender1">
                                            女性
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">生年月日<span class="badge bg-danger ms-2">必須</span></h3>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <div class="p-form__label">西暦</div>
                                    </label>
                                    <select class="form-select" id="">
                                        <option selected>----</option>
                                        <option value="1900">1900</option>
                                        <option value="1901">1901</option>
                                        <option value="1902">1902</option>
                                        <option value="1903">1903</option>
                                        <option value="1904">1904</option>
                                        <option value="1905">1905</option>
                                        <option value="1906">1906</option>
                                        <option value="1907">1907</option>
                                        <option value="1908">1908</option>
                                        <option value="1909">1909</option>
                                        <option value="1910">1910</option>
                                        <option value="1911">1911</option>
                                        <option value="1912">1912</option>
                                        <option value="1913">1913</option>
                                        <option value="1914">1914</option>
                                        <option value="1915">1915</option>
                                        <option value="1916">1916</option>
                                        <option value="1917">1917</option>
                                        <option value="1918">1918</option>
                                        <option value="1919">1919</option>
                                        <option value="1920">1920</option>
                                        <option value="1921">1921</option>
                                        <option value="1922">1922</option>
                                        <option value="1923">1923</option>
                                        <option value="1924">1924</option>
                                        <option value="1925">1925</option>
                                        <option value="1926">1926</option>
                                        <option value="1927">1927</option>
                                        <option value="1928">1928</option>
                                        <option value="1929">1929</option>
                                        <option value="1930">1930</option>
                                        <option value="1931">1931</option>
                                        <option value="1932">1932</option>
                                        <option value="1933">1933</option>
                                        <option value="1934">1934</option>
                                        <option value="1935">1935</option>
                                        <option value="1936">1936</option>
                                        <option value="1937">1937</option>
                                        <option value="1938">1938</option>
                                        <option value="1939">1939</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <div class="p-form__label">月</div>
                                    </label>
                                    <input type="text" class="form-control" value="1">
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <div class="p-form__label">日</div>
                                    </label>
                                    <input type="text" class="form-control" value="1">
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">TEL<span class="badge bg-danger ms-2">必須</span></h3>
                                    <input type="tel" class="form-control" value="012034567890">
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">メールアドレス<span class="badge bg-danger ms-2">必須</span></h3>
                                    <input type="email" class="form-control" value="sample@gmail.com">
                                </div>

                                <div class="col-md-6">
                                    <h3 class="p-heading2">Skype名<span class="badge bg-danger ms-2">必須</span></h3>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <h3 class="p-heading2">SkypeID<span class="badge bg-danger ms-2">必須</span></h3>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">プロフィール画像<span class="badge bg-danger ms-2">必須</span></h3>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-file__img">
                                        <img id="file1-preview">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-file1" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-file__img">
                                        <img id="file2-preview">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-file2" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-file__img">
                                        <img id="file3-preview">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-file3" accept="image/*">
                                </div>
                                <div class="col-md-6">
                                    <h3 class="p-heading2">出身国<span class="badge bg-danger ms-2">必須</span></h3>
                                    <select class="form-select" id="">
                                        <option selected>選択してください</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <h3 class="p-heading2">居住国<span class="badge bg-danger ms-2">必須</span></h3>
                                    <select class="form-select" id="">
                                        <option selected>選択してください</option>
                                    </select>
                                </div>
                            </div><!-- /.row -->
                            <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                        </div>
                    </div><!-- /.tab-pane -->
                    <div id="learn" class="tab-pane" role="tabpanel" aria-labelledby="learn-tab">
                        <h2 class="p-heading1 mt-0">教える設定</h2>
                        <div class="p-form">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="p-heading2">教えられる言語<span class="badge bg-danger ms-2">必須</span></h3>
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
                                                    <h2 class="p-heading2">教えられる言語</h2>
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
                                                    <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                                                </div><!-- /.modal-body -->
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div><!-- /.col-12 -->
                                <div class="col-12">
                                    <h3 class="p-heading2">教えられるカテゴリ<span class="badge bg-danger ms-2">必須</span></h3>
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
                                                    <h2 class="p-heading2">教えられるカテゴリ</h2>
                                                    <div class="row">
                                                        <div class="col-12 mb-3"><h3><strong>ビジネスルーム</strong></h3></div>
                                                        <div class="row">
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
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <h3><strong>自分磨きルーム</strong></h3>
                                                        </div>
                                                        <div class="row">
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
                                                        </div><!-- /.row -->
                                                        <div class="col-12 mb-3">
                                                            <h3><strong>スキルアップルーム</strong></h3>
                                                        </div>
                                                        <div class="row">
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
                                                        </div><!-- /.row  -->

                                                    </div><!-- /. row -->
                                                    <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                                                </div><!-- /.modal-body -->
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div><!-- /.col-12 -->
                                <div class="col-12">
                                    <h3 class="p-heading2">保有する資格<span class="badge bg-danger ms-2">必須</span></h3>
                                    <textarea class="form-control" cols="20" rows="10">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</textarea>

                                    <h3 class="p-heading2">動画URL<span class="badge bg-danger ms-2">必須</span></h3>
                                    <input type="text" class="form-control" value="https://google.com">
                                    <input type="text" class="form-control mt-2" placeholder="https://">
                                    <input type="text" class="form-control mt-2" placeholder="https://">

                                    <h3 class="p-heading2">自己PR<span class="badge bg-danger ms-2">必須</span></h3>
                                    <textarea class="form-control" cols="20" rows="10">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</textarea>

                                    <h3 class="p-heading2">レッスン可能時間帯<span class="badge bg-danger ms-2">必須</span></h3>
                                    <table class="p-form__timezone">
                                        <tr>
                                            <th class="pt-4">月</th>
                                            <td class="pt-4"><div class="p-form__timezone__column"><input type="text" class="form-control" value="10:00"><span>〜</span><input type="text" class="form-control" value="15:00"></div></td>
                                            <th class="pt-4">火</th>
                                            <td class="pt-4"><div class="p-form__timezone__column"><input type="text" class="form-control"><span>〜</span><input type="text" class="form-control"></div></td>
                                        </tr>
                                        <tr>
                                            <th>水</th>
                                            <td><div class="p-form__timezone__column"><input type="text" class="form-control"><span>〜</span><input type="text" class="form-control"></div></td>
                                            <th>木</th>
                                            <td><div class="p-form__timezone__column"><input type="text" class="form-control"><span>〜</span><input type="text" class="form-control"></div></td>
                                        </tr>
                                        <tr>
                                            <th>金</th>
                                            <td><div class="p-form__timezone__column"><input type="text" class="form-control"><span>〜</span><input type="text" class="form-control"></div></td>
                                            <th>土</th>
                                            <td><div class="p-form__timezone__column"><input type="text" class="form-control"><span>〜</span><input type="text" class="form-control"></div></td>
                                        </tr>
                                        <tr>
                                            <th>日</th>
                                            <td class="pb-4"><div class="p-form__timezone__column"><input type="text" class="form-control"><span>〜</span><input type="text" class="form-control"></div></td>
                                            <th></th>
                                            <td></td>
                                        </tr>
                                    </table>

                                    <h3 class="p-heading2">講師をするきっかけ・理由<span class="badge bg-danger ms-2">必須</span></h3>
                                    <textarea class="form-control" cols="20" rows="10">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</textarea>

                                    <h3 class="p-heading2">講師をする意気込み<span class="badge bg-danger ms-2">必須</span></h3>
                                    <textarea class="form-control" cols="20" rows="10">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</textarea>
                                </div><!-- /.col12 -->
                            </div><!-- /.row -->
                            <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                        </div>
                    </div>
                    <div id="password" class="tab-pane" role="tabpanel" aria-labelledby="password-tab">
                        <h2 class="p-heading1">パスワードの変更</h2>
                        <form action="">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="p-heading2">現在のパスワード<span class="badge bg-danger ms-2">必須</span></h3>
                                    <input type="password" class="form-control p-form__pass">
                                    <h3 class="p-heading2">新しいパスワード<span class="badge bg-danger ms-2">必須</span></h3>
                                    <input type="password" class="form-control p-form__pass">
                                    <p class="my-2">もう一度、ご入力ください。</p>
                                    <input type="password" class="form-control p-form__pass">
                                </div>
                            </div><!--/.row -->
                            <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                        </form>
                    </div>
                    <div id="privacy" class="tab-pane" role="tabpanel" aria-labelledby="privacy-tab">
                        <h2 class="p-heading1">個人情報の変更</h2>
                        <div class="p-form">
                            <div class="row">
                                <h3 class="p-heading2">個人情報確認画像（表面）<span class="badge bg-danger ms-2">必須</span></h3>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="form-file__img">
                                        <img id="privacy1-preview" src="{{ asset('img/sample-form-privacy@2x.png') }}" class="js-active">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-privacy1" accept="image/*">
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="form-file__img">
                                        <img id="privacy2-preview" src="{{ asset('img/sample-form-privacy@2x.png') }}" class="js-active">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-privacy2" accept="image/*">
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="form-file__img">
                                        <img id="privacy3-preview">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-privacy3" accept="image/*">
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="form-file__img">
                                        <img id="privacy4-preview">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-privacy4" accept="image/*">
                                </div>
                                <h3 class="p-heading2">個人情報確認画像（裏面）<span class="badge bg-danger ms-2">必須</span></h3>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="form-file__img">
                                        <img id="privacy5-preview" src="{{ asset('img/sample-form-privacy@2x.png') }}" class="js-active">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-privacy5" accept="image/*">
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="form-file__img">
                                        <img id="privacy6-preview" src="{{ asset('img/sample-form-privacy@2x.png') }}" class="js-active">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-privacy6" accept="image/*">
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="form-file__img">
                                        <img id="privacy7-preview">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-privacy7" accept="image/*">
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="form-file__img">
                                        <img id="privacy8-preview">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-privacy8" accept="image/*">
                                </div>

                                <h3 class="p-heading2">支払い方法<span class="badge bg-danger ms-2">必須</span></h3>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="form-radio__payment" id="form-radio__payment2">
                                        <label class="form-check-label" for="form-radio__payment2">
                                            Paypal送金
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="form-radio__payment" id="form-radio__payment1">
                                        <label class="form-check-label" for="form-radio__payment1">
                                            口座振替
                                        </label>
                                    </div>
                                </div>
                                <p class="mt-2">※日本国内の口座でない場合は、PayPal送金のみのお支払い方法となります。</p>

                                <h3 class="p-heading2">Paypalメールアドレス<span class="badge bg-danger ms-2">必須</span></h3>
                                <input type="email" class="form-control">

                                <h3 class="p-heading2">口座画像</h3>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <h4 class="mb-2"><strong>表紙<span class="badge bg-danger ms-2">必須</span></strong></h4>
                                    <div class="form-file__img">
                                        <img id="account1-preview">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-account1" accept="image/*">
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <h4 class="mb-2"><strong>見開きページ<span class="badge bg-danger ms-2">必須</span></strong></h4>
                                    <div class="form-file__img">
                                        <img id="account2-preview">
                                    </div>
                                    <input class="form-control form-file" type="file" id="form-account2" accept="image/*">
                                </div>
                            </div><!--/.row -->
                            <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
