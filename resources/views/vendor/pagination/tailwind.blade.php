@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center space-x-1 mt-4">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <span class="px-3 py-2 bg-gray-300 text-gray-500 rounded-l cursor-not-allowed">
        &lsaquo;
    </span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-2 bg-gray-800 text-white rounded-l hover:bg-gray-700">
        &lsaquo;
    </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <span class="px-3 py-2 bg-gray-300 text-gray-500">{{ $element }}</span>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <span class="px-3 py-2 bg-gray-800 text-white">{{ $page }}</span>
    @else
    <a href="{{ $url }}" class="px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300">
        {{ $page }}
    </a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-2 bg-gray-800 text-white rounded-r hover:bg-gray-700">
        &rsaquo;
    </a>
    @else
    <span class="px-3 py-2 bg-gray-300 text-gray-500 rounded-r cursor-not-allowed">
        &rsaquo;
    </span>
    @endif
</nav>
@endif