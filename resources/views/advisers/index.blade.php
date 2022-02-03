@extends('layouts.app')

@section('title', __('message.Search for lecturers'))

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
