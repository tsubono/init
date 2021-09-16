@extends('layouts.app')

@section('title', 'アドバイザーを探す')

@section('content')
    <search-advisers
        :categories="{{ $categories }}"
        :languages="{{ $languages }}"
        :countries="{{ $countries }}"
        :advisers="{{ $advisers }}"
        :total="{{ $total }}"
    ></search-advisers>
@endsection
