@extends('layouts.app')

@section('title', __('message.Find a lesson'))

@section('content')
    <search-lessons
        :categories="{{ $categories }}"
        :languages="{{ $languages }}"
        :countries="{{ $countries }}"
        :lessons="{{ $lessons }}"
        :total="{{ $total }}"
        locale="{{ str_replace('_', '-', app()->getLocale()) }}"
    ></search-lessons>
@endsection
