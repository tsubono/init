@extends('layouts.app')

@section('title', __('message.Find a lesson'))

@section('content')
    <search-lessons
        :categories="{{ $categories }}"
        :languages="{{ $languages }}"
        :countries="{{ $countries }}"
        :lessons="{{ $lessons }}"
        :total="{{ $total }}"
    ></search-lessons>
@endsection
