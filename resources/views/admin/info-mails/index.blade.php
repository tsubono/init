@extends('layouts.app')

@section('title', __('message.Notice Delivery List'))

@section('content')
    <section class="p-admin-list l-content-block">
        <div class="container">
            <div class="text-end">
                <a href="{{ route('admin.info-mails.create') }}" class="p-btn p-btn__defalut d-inline-block px-80px">
                    {{ __('message.Notification distribution creation') }} 
                </a>
            </div>
            <div class="p-admin-list__infos tab-content pt-25px">
                <div>
                    @forelse ($infoMails as $index => $infoMail)
                        <div class="p-card3">
                            <div class="p-card3__date">
                                <p class="small">{{ __('message.date') }} </p>
                                {{ $infoMail->date->format('Y/m/d') }}
                            </div>
                            <div class="p-card3__title">
                                {{ $infoMail->title }}
                            </div>
                            <div class="p-label">{{ $infoMail->type_txt }}</div>
                            <div class="p-card3__controls">
                                <a href="{{ route('admin.info-mails.edit', ['info_mail' => $infoMail]) }}" class="p-btn p-btn--rect btn-success px-3 py-1 m-1">
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
                                        <p class="text-center">「{{ $infoMail->title }}」{{ __('message.Remove.') }} <br>{{ __('message.Is it OK?') }} </p>
                                        <form action="{{ route('admin.info-mails.destroy', ['info_mail' => $infoMail]) }}" method="post">
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
                        <div class="text-center">{{ __('message.Notification delivery is not registered.') }} </div>
                    @endforelse
                </div><!--/.tab-pane -->
            </div><!-- /.p-search__content -->

            <div class="text-center">
                {{ $infoMails->links('vendor.pagination.custom') }}
            </div>
        </div><!-- /.container -->
    </section>
@endsection
