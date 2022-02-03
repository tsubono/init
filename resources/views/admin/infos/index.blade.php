@extends('layouts.app')

@section('title', __('message.Notice List'))

@section('content')
    <section class="p-searchblock bg-light l-content-block">
        <div class="container">
            <form action="" class="p-form">
                <a class="p-btn p-btn__outline d-md-none" data-bs-toggle="collapse" href="#collapseDetail" role="button" aria-expanded="false" aria-controls="collapseDetail">
                    {{ __('message.search') }} 
                </a>
                <div class="collapse" id="collapseDetail">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">{{ __('message.title') }} </h3>
                            <input type="text" class="form-control" placeholder="{{ __('message.Please fill in') }} "
                                   name="condition[title]"
                                   value="{{ isset($condition['title']) ? $condition['title'] : '' }}"
                            />
                        </div>
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">{{ __('message.Content') }} </h3>
                            <input type="text" class="form-control" placeholder="{{ __('message.Please fill in') }} "
                                   name="condition[content]"
                                   value="{{ isset($condition['content']) ? $condition['content'] : '' }}"
                            />
                        </div>
                        <div class="col-md-6">
                            <h3 class="p-heading3">{{ __('message.Day of the day') }} </h3>
                            <div class="d-flex align-items-center">
                                <input type="date" class="form-control" placeholder="{{ __('message.Please fill in') }} "
                                       name="condition[date_start]"
                                       value="{{ isset($condition['date_start']) ? $condition['date_start'] : '' }}"
                                />
                                <span class="mx-2">〜</span>
                                <input type="date" class="form-control" placeholder="{{ __('message.Please fill in') }} "
                                       name="condition[date_end]"
                                       value="{{ isset($condition['date_end']) ? $condition['date_end'] : '' }}"
                                />
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <div class="d-flex justify-content-end align-items-center p-searchblock__controls">
                        <a class="primary-link mx-5" href="{{ route('admin.infos.index') }}">{{ __('message.reset') }} </a>
                        <button class="p-btn p-btn__black d-inline-block mt-2 py-2 px-5">{{ __('message.search') }} </button>
                    </div>
                </div><!-- /.collapse -->
            </form>
        </div>
    </section>
    <section class="p-admin-list l-content-block">
        <div class="container">
            <div class="text-end">
                <a href="{{ route('admin.infos.create') }}" class="p-btn p-btn__defalut d-inline-block px-80px">
                    {{ __('message.News') }} 
                </a>
            </div>
            <div class="p-admin-list__infos tab-content pt-25px">
                <div>
                    @forelse ($infos as $index => $info)
                        <div class="p-card3">
                            <div class="p-card3__date">
                                <p class="small">{{ __('message.date') }} </p>
                                {{ $info->date->format('Y/m/d') }}
                            </div>
                            <div class="p-card3__title">
                                {{ $info->title }}
                            </div>
                            <div class="p-card3__controls">
                                <a href="{{ route('admin.infos.edit', compact('info')) }}" class="p-btn p-btn--rect btn-success px-3 py-1 m-1">
                                    {{ __('message.edit') }} 
                                </a>
                                <button type="button" class="p-btn p-btn--rect btn-danger px-3 py-1 m-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $index }}">
                                    {{ __('message.Delete') }} 
                                </button>
                            </div>
                        </div><!-- /.p-card3 -->
                        <!-- 削除確認モーダル -->
                        <div class="modal p-modal p-setting fade" id="deleteModal{{ $index }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $index }}">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('message.close up') }} "></button>
                                    <div class="modal-body">
                                        <h2 class="p-heading2 mt-0 text-center">{{ __('message.Deletion confirmation') }} </h2>
                                        <p class="text-center">「{{ $info->title }}」{{ __('message.Remove.') }} <br>{{ __('message.Is it OK?') }} </p>
                                        <form action="{{ route('admin.infos.destroy', compact('info')) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="p-btn p-btn__defalut">{{ __('message.delete') }} </button>
                                        </form>
                                    </div><!-- /.modal-body -->
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- /削除確認モーダル -->
                    @empty
                        <div class="text-center">{{ __('message.Notifications are not registered.') }} </div>
                    @endforelse
                </div><!--/.tab-pane -->
            </div><!-- /.p-search__content -->

            <div class="text-center">
                {!! $infos->appends([
                        'condition[title]' => $condition['title'] ?? '',
                        'condition[content]' => $condition['content'] ?? '',
                        'condition[date_start]' => $condition['date_start'] ?? '',
                        'condition[date_end]' => $condition['date_end'] ?? '',
                    ])->render('vendor.pagination.custom')!!}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
