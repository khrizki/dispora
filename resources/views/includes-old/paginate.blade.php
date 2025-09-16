<p class="m-0 text-muted">Showing <span>{{ ($currentPage - 1) * $perPage + 1 }}</span> to <span>{{ min($currentPage * $perPage, $totalItems) }}</span> of <span>{{ $totalItems }}</span> entries</p>
    <ul class="pagination m-0 ms-auto">
        <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
            <a class="page-link" href="{{ url()->current() }}?page={{ $currentPage - 1 }}" tabindex="-1" aria-disabled="true">
                <!-- Your prev icon here -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>
            </a>
        </li>
        @for ($i = 1; $i <= $lastPage; $i++)
            <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ url()->current() }}?page={{ $i }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
            <a class="page-link" href="{{ url()->current() }}?page={{ $currentPage + 1 }}">
                <!-- Your next icon here -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
            </a>
        </li>
    </ul>