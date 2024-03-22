@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&lsaquo;</span>
        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        </li>
        @else
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&rsaquo;</span>
        </li>
        @endif
    </ul>
</nav>
@endif

@if ($paginator->hasPages())
<div class="dataTables_paginate paging_simple_numbers mr-3">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
        <li class="paginate_button page-item previous disabled">
            <a href="#" class="page-link">
                <i class="fi fi-arrow-start fs--13"></i>
            </a>
        </li>
        @else
        <li class="paginate_button page-item previous">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link">
                <i class="fi fi-arrow-start fs--13"></i>
            </a>
        </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        
        <li class="paginate_button page-item active">
            <a href="#" class="page-link">{{ $page }}</a>
        </li>
        @else
        <li class="paginate_button page-item ">
            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="paginate_button page-item next">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link">
                <i class="fi fi-arrow-end fs--13"></i>
            </a>
        </li>
        @else
        <li class="paginate_button page-item previous disabled">
            <a href="#" class="page-link">
                <i class="fi fi-arrow-end fs--13"></i>
            </a>
        </li>
        @endif
    </ul>
</div>
@endif