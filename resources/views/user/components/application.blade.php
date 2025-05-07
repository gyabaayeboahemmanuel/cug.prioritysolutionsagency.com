<nav class="navbar navbar-expand-lg navbar-dark text-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <!-- Personal Details -->
            <li class="nav-item">
                <a class="nav-link {{ $pd ? '' : 'disabled' }}"
                   href="{{ $pd ? route('personaldetails.edit', $pd->app_id) : '#' }}">
                   Personal Details
                </a>
            </li>

            <!-- Contact Details -->
            <li class="nav-item">
                <a class="nav-link {{ $cd ? '' : 'disabled' }}"
                   href="{{ $cd ? route('contactdetails.edit', $cd->app_id) : '#' }}">
                   Contact Details
                </a>
            </li>

            <!-- Family Details -->
            <li class="nav-item">
                <a class="nav-link {{ $fd ? '' : 'disabled' }}"
                   href="{{ $fd ? route('familydetails.edit', $fd->app_id) : '#' }}">
                   Family Details
                </a>
            </li>

            <!-- Programme Details -->
            <li class="nav-item">
                <a class="nav-link {{ $pgd ? '' : 'disabled' }}"
                   href="{{ $pgd ? route('programdetails.edit', $pgd->app_id) : '#' }}">
                   Programme Details
                </a>
            </li>

            <!-- Academic Details -->
            <li class="nav-item">
                <a class="nav-link {{ $ad ? '' : 'disabled' }}"
                   href="{{ $ad ? route('academicdetails.edit', $ad->app_id) : '#' }}">
                   Academic Details
                </a>
            </li>

            <!-- Tertiary Details -->
            <li class="nav-item">
                <a class="nav-link {{ $td ? '' : 'disabled' }}"
                   href="{{ $td ? route('tertiarydetails.edit', $td->app_id) : '#' }}">
                   Tertiary Details
                </a>
            </li>

            <!-- Attached Documents -->
            <li class="nav-item">
                <a class="nav-link {{ $at ? '' : 'disabled' }}"
                   href="{{ $at ? route('attacheddocuments.edit', $at->app_id) : '#' }}">
                   Attached Documents
                </a>
            </li>
        </ul>
    </div>
    <a class="navbar-brand" href="#">Application Summary</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
