@if ($paginator->hasPages())
    <nav class="p-pagination mt-5">
        <ul>
        <!-- 前へ移動ボタン -->
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <a>
                    <img src="{{ asset('img/arrow-previous.svg') }}" class="p-pagination__previous" alt="前へ">
                </a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}">
                    <img src="{{ asset('img/arrow-previous.svg') }}" class="p-pagination__previous" alt="前へ">
                </a>
            </li>
        @endif

        <!-- ページ番号　-->
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled">
                    <a>{{ $element }}</a>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            <a>{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- 次へ移動ボタン -->
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}">
                    <img src="{{ asset('img/arrow-next.svg') }}" class="p-pagination__next" alt="次へ">
                </a>
            </li>
        @else
            <li class="disabled">
                <a>
                    <img src="{{ asset('img/arrow-next.svg') }}" class="p-pagination__next" alt="次へ">
                </a>
            </li>
        @endif
        </ul>
    </nav>
@endif 