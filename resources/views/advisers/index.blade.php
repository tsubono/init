@extends('layouts.app')

@section('title', __('message.Search for advisers'))

@section('content')
    <search-advisers
        :categories="{{ $categories }}"
        :languages="{{ $languages }}"
        :countries="{{ $countries }}"
        :advisers="{{ $advisers }}"
        :ages="{{ $ages }}"
        :total="{{ $total }}"
    ></search-advisers>
@endsection
