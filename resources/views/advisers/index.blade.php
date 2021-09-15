@extends('layouts.app')

@section('title', 'アドバイザーを探す')

@section('content')
    <SearchAdvisers
        :categories="{{ $categories }}"
        :languages="{{ $languages }}"
        :countries="{{ $countries }}"
        :advisers="{{ $advisers }}"
        :total="{{ $total }}"
    ></SearchAdvisers>
@endsection
