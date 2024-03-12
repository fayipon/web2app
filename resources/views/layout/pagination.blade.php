@if ($paginator->hasPages())
    <nav class="text-center float-md-end mt-3 mt-md-0 d-none d-md-flex" aria-label="Pagination">
        <ul class="nav nav-sm nav-invert">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                        <li class="nav-item">
                          <a class="nav-link px-3 px-3 disabled" tabindex="-1" aria-label="@lang('pagination.previous')">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
            @else
                        <li class="nav-item">
                          <a class="nav-link px-3 px-3" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" aria-label="@lang('pagination.previous')">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
            @endif
            
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                  <li class="nav-item" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="nav-item" aria-current="page">
                              <a class="nav-link px-3 px-3 active">{{ $page }}</a>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link px-3" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                        <li class="nav-item">
                          <a class="nav-link px-3 px-3" href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
            @else
                        <li class="nav-item">
                          <a class="nav-link px-3 px-3 disabled" href="#" tabindex="-1" aria-label="@lang('pagination.next')">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
            @endif
        </ul>
    </nav>
@endif

                    <!-- pagination : desktop 
                    <nav class="text-center float-md-end mt-3 mt-md-0 d-none d-md-flex" aria-label="Pagination">
                      <ul class="nav nav-sm nav-invert">
                        <li class="nav-item">
                          <a class="nav-link px-3 px-3 disabled" href="#" tabindex="-1">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="nav-item"><a class="nav-link px-3" href="#">1</a></li>
                        <li class="nav-item" aria-current="page">
                          <a class="nav-link px-3 px-3 active" href="#">2</a>
                        </li>
                        <li class="nav-item"><a class="nav-link px-3" href="#">3</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#">4</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#">5</a></li>
                        <li class="nav-item">
                          <a class="nav-link px-3 px-3" href="#">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                    </nav>-->