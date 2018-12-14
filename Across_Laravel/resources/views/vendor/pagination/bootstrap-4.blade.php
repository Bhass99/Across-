
@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li ><a class="page-link">{{ $element }}</a></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li  ><a class="active">{{ $page }}</a></li>
                    @else
                        <li ><a  href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
@endif
