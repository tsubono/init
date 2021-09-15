@extends('layouts.app')

@section('title', 'お知らせ作成')

@section('content')
    <section class="l-content-block p-setting">
        <div class="container">
            <form class="p-form" action="{{ route('admin.infos.store') }}" method="post">
                @csrf

                @include('admin.infos._form')

                <div class="my-80px">
                    <button type="submit" class="p-btn p-btn__defalut">保存する</button>
                </div>
            </form>
        </div>
    </section>
@endsection
