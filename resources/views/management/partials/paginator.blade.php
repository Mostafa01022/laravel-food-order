<div class="pagination justify-content-center">
    <ul class="pagination">
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a>
        </li>
        @foreach ($paginator->getUrlRange($paginator->currentPage() - 0, $paginator->currentPage() + 2) as $page => $url)
            @if ($page > $paginator->lastPage())
                @break
            @endif
            <li class="page-item {{ $paginator->currentPage() === $page ? 'active' : '' }} ">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
        @endforeach
        <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a>
        </li>
    </ul>
</div>