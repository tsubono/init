@extends('layouts.app')

@section('title', '講師を探す')

@section('content')
    <search-advisers
        :categories="{{ $categories }}"
        :languages="{{ $languages }}"
        :countries="{{ $countries }}"
        :advisers="{{ $advisers }}"
        :total="{{ $total }}"
    ></search-advisers>
@endsection
