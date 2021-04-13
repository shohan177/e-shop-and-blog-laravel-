@if ($paginator->hasPages() == 1)

<ul class="pagination">

    {{-- previous button --}}
    @if ($paginator->onFirstPage())

    @else
    <li><a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>
    </li>
    @endif
    {{-- active --}}
    @foreach ($elements as $item)
        @foreach ($item as $number => $url)
            @php
                $status = ($paginator->currentPage() == $number )? 'active' : '';
            @endphp

            <li class=" {{ $status }}"><a href="{{ $url }}">{{ $number }}</a>
            </li>
        @endforeach
    @endforeach


    {{-- next button --}}
    @if ($paginator->hasMorePages())

    <li><a href="{{ $paginator->nextPageUrl() }}" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>
    </li>
    @else
    @endif

  </ul>
  @else
  @endif
