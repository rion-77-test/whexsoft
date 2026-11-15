@if ($paginator->hasPages())
    <nav role="navigation" aria-label="পেজিনেশন" class="mt-space-2xl flex flex-wrap items-center justify-center gap-2">
        @if ($paginator->onFirstPage())
            <span class="w-10 h-10 rounded-lg bg-surface-card text-text-muted flex items-center justify-center opacity-50 cursor-not-allowed">
                <span class="material-symbols-outlined text-[20px]">chevron_left</span>
            </span>
        @else
            <a class="w-10 h-10 rounded-lg bg-surface-card text-text-secondary flex items-center justify-center hover:bg-surface-card-elevated hover:text-text-primary transition-all" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="আগের পেজ">
                <span class="material-symbols-outlined text-[20px]">chevron_left</span>
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="w-10 h-10 rounded-lg bg-surface-card text-text-muted flex items-center justify-center">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page" class="w-10 h-10 rounded-lg bg-primary-container text-text-inverse font-label-lg text-label-lg font-bold flex items-center justify-center">{{ $page }}</span>
                    @else
                        <a class="w-10 h-10 rounded-lg bg-surface-card text-text-secondary flex items-center justify-center hover:bg-surface-card-elevated hover:text-text-primary transition-all" href="{{ $url }}" aria-label="পেজ {{ $page }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a class="w-10 h-10 rounded-lg bg-surface-card text-text-secondary flex items-center justify-center hover:bg-surface-card-elevated hover:text-text-primary transition-all" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="পরের পেজ">
                <span class="material-symbols-outlined text-[20px]">chevron_right</span>
            </a>
        @else
            <span class="w-10 h-10 rounded-lg bg-surface-card text-text-muted flex items-center justify-center opacity-50 cursor-not-allowed">
                <span class="material-symbols-outlined text-[20px]">chevron_right</span>
            </span>
        @endif
    </nav>
@endif
