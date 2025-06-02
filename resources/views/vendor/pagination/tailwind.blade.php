@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 rounded-lg bg-gray-300 text-gray-500">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600">Previous</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-3 py-2 rounded-lg bg-gray-300">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-2 rounded-lg bg-blue-500 text-white">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600">Next</a>
        @else
            <span class="px-3 py-2 rounded-lg bg-gray-300 text-gray-500">Next</span>
        @endif
    </nav>
@endif
