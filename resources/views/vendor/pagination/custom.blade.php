@if ($paginator->hasPages())
    <ul class="pagination product-pagination mr-auto float-left">

        @if ($paginator->onFirstPage())
            <li class="page-item page-prev disabled"><a class="page-link">← Previous</a></li>
        @else
            <li class="page-item page-prev"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="page-item  disabled"><a class="page-link">{{ $element }}</a></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active page-item"><a class="page-link">{{ $page }}</a></li>
                    @else
                        <li class=" page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li class="page-item page-next"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled page-item page-next"><span class="page-link">Next →</span></li>
        @endif
    </ul>
@endif
