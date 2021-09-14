@extends('layouts.app')

@section('title', 'レッスンを探す')

@section('content')
    <search-lessons
        :categories="{{ $categories }}"
        :languages="{{ $languages }}"
        :countries="{{ $countries }}"
        :lessons="{{ $lessons }}"
    ></search-lessons>
@endsection
