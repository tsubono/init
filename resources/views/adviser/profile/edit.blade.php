@extends('layouts.app')

@section('title', 'プロフィール設定')

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <!-- タブ部分 -->
            @include('adviser.profile._tab_menu')
            <!-- パネル部分 -->
            <form class="p-form" action="{{ route('adviser.profile.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ auth()->guard('adviser')->user()->id }}">

                <div class="tab-content p-setting__content">
                    <div id="basic">
                        <h2 class="p-heading1">基本情報の変更</h2>

                        <div class="p-form">
                            <div class="row">
                                <div class="col-12"><h3 class="p-heading2">お名前</h3></div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">姓<span class="badge bg-danger ms-2">必須</span></div>
                                    </label>
                                    <input type="text" class="form-control" name="family_name" value="{{ old('family_name', $user->family_name) }}">
                                    @error('family_name')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">ミドルネーム</div>
                                    </label>
                                    <input type="text" class="form-control" name="middle_name" value="{{ old('middle_name', $user->middle_name) }}">
                                    @error('middle_name')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">名<span class="badge bg-danger ms-2">必須</span></div>
                                    </label>
                                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                                    @error('first_name')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">ふりがな</h3>
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">せい<span class="badge bg-danger ms-2">必須</span></div>
                                    </label>
                                    <input type="text" class="form-control" name="family_name_kana" value="{{ old('family_name_kana', $user->family_name_kana) }}">
                                    @error('family_name_kana')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">みどるねーむ</div>
                                    </label>
                                    <input type="text" class="form-control" name="middle_name_kana" value="{{ old('middle_name_kana', $user->middle_name_kana) }}">
                                    @error('middle_name_kana')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">
                                        <div class="p-form__label">めい<span class="badge bg-danger ms-2">必須</span></div>
                                    </label>
                                    <input type="text" class="form-control" name="first_name_kana" value="{{ old('first_name_kana', $user->first_name_kana) }}">
                                    @error('first_name_kana')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">性別</h3>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               name="gender"
                                               id="form-radio__gender2"
                                               value="男性"
                                                {{ old('gender', $user->gender) === '男性' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="form-radio__gender2">
                                            男性
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="radio"
                                               class="form-check-input"
                                               name="gender"
                                               id="form-radio__gender1"
                                               value="女性"
                                                {{ old('gender', $user->gender) === '女性' ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="form-radio__gender1">
                                            女性
                                        </label>
                                    </div>
                                </div>

                                @error('gender')
                                <div class="p-error-text" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror

                                <div class="col-12">
                                    <h3 class="p-heading2">生年月日<span class="badge bg-danger ms-2">必須</span></h3>
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <div class="p-form__label">西暦</div>
                                    </label>
                                    <select class="form-select" name="birthday_y">
                                        <option value="">----</option>
                                        @for ($i=1900; $i<=now()->year; $i++)
                                            <option value="{{ $i }}"
                                                    {{ old('birthday_y', $user->birthday_year) == $i  ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('birthday_y')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <div class="p-form__label">月</div>
                                    </label>
                                    <select class="form-select" name="birthday_m">
                                        <option value="">----</option>
                                        @for ($i=1; $i<=12; $i++)
                                            <option value="{{ $i }}"
                                                    {{ old('birthday_m', $user->birthday_month) == $i  ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('birthday_m')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">
                                        <div class="p-form__label">日</div>
                                    </label>
                                    <select class="form-select" name="birthday_d">
                                        <option value="">----</option>
                                        @for ($i=1; $i<=31; $i++)
                                            <option value="{{ $i }}"
                                                    {{ old('birthday_d', $user->birthday_day) == $i  ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('birthday_d')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">TEL<span class="badge bg-danger ms-2">必須</span></h3>
                                    <input type="tel" class="form-control" name="tel" value="{{ old('tel', $user->tel) }}">
                                    @error('tel')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">メールアドレス<span class="badge bg-danger ms-2">必須</span></h3>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <h3 class="p-heading2">Skype名<span class="badge bg-danger ms-2">必須</span></h3>
                                    <input type="text" class="form-control" name="skype_name" value="{{ old('skype_name', $user->skype_name) }}">
                                    @error('skype_name')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <h3 class="p-heading2">SkypeID<span class="badge bg-danger ms-2">必須</span></h3>
                                    <input type="text" class="form-control" name="skype_id" value="{{ old('skype_id', $user->skype_id) }}">
                                    @error('skype_id')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <h3 class="p-heading2">プロフィール画像</h3>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <file-upload
                                                name="images[0]"
                                                image-path="{{ old('images.0', isset($user->adviserUserImages[0]) ? $user->adviserUserImages[0]['image_path'] : null) }}"
                                                upload-dir="uploaded/advisers/{{ $user->id }}"
                                        ></file-upload>
                                    </div>
                                    <div class="col">
                                        <file-upload
                                                name="images[1]"
                                                image-path="{{ old('images.1', isset($user->adviserUserImages[1]) ? $user->adviserUserImages[1]['image_path'] : null) }}"
                                                upload-dir="uploaded/advisers/{{ $user->id }}"
                                        ></file-upload>
                                    </div>
                                    <div class="col">
                                        <file-upload
                                                name="images[2]"
                                                image-path="{{ old('images.2', isset($user->adviserUserImages[2]) ? $user->adviserUserImages[2]['image_path'] : null) }}"
                                                upload-dir="uploaded/advisers/{{ $user->id }}"
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

                                <div class="col-md-6">
                                    <h3 class="p-heading2">出身国<span class="badge bg-danger ms-2">必須</span></h3>
                                    <select class="form-select" name="from_country_id">
                                        <option value="">選択してください</option>
                                        @foreach ($mst_countries as $mst_country)
                                            <option value="{{ $mst_country->id }}"
                                                    {{ old('from_country_id', $user->from_country_id) == $mst_country->id ? 'selected' : '' }}>
                                                {{ $mst_country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('from_country_id')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <h3 class="p-heading2">居住国<span class="badge bg-danger ms-2">必須</span></h3>
                                    <select class="form-select" name="residence_country_id">
                                        <option value="">選択してください</option>
                                        @foreach ($mst_countries as $mst_country)
                                            <option value="{{ $mst_country->id }}"
                                                {{ old('residence_country_id', $user->residence_country_id) == $mst_country->id ? 'selected' : '' }}>
                                                {{ $mst_country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('residence_country_id')
                                    <div class="p-error-text" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div><!-- /.row -->
                            <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                        </div>
                    </div><!-- /.tab-pane -->
                </div>
            </form>
        </div>
    </section>
@endsection
