@if ($paginator->hasPages())
<div class="w-100 d-flex justify-content-center">
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->currentPage() == 1)
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">《</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->toArray()['first_page_url'] }}" rel="prev" aria-label="@lang('pagination.previous')">《</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    {{-- @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif --}}


                    @switch($page)
                        @case($paginator->currentPage())
                            <li class="page-item" aria-current="page"><span class="page-link page-active">{{ $page }}</span></li>
                            @break
                        @case($paginator->currentPage() - 2)
                        @case($paginator->currentPage() - 1)
                        @case($paginator->currentPage() + 1)
                        @case($paginator->currentPage() + 2)
                        @case($paginator->lastPage())
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @break
                        @case($paginator->lastPage() - 1)
                            <li class="page-item"><span class="page-link-3dots page-link">...</span></li>
                            @break
                    @endswitch


                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->currentPage() != $paginator->lastPage())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->toArray()['last_page_url'] }}" rel="next" aria-label="@lang('pagination.next')">》</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">》</span>
            </li>
        @endif
    </ul>
</div>
@endif
