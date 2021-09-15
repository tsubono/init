@extends('layouts.app')

@section('title', 'お知らせ一覧')

@section('content')
    <section class="p-info-list l-content-block">
        <div class="container">
            <ul class="p-info-list__information-list">
                @foreach ($informations as $information)
                    <li>
                        <a href="{{ route('infos.show', compact('information')) }}">
                            <time class="p-info-list__date">{{ $information->date->format('Y/m/d') }}</time>
                            <span class="p-info-list__title">{{ $information->title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="text-center">
                {{ $informations->links('vendor.pagination.custom') }}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
