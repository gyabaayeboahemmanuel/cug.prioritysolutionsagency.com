<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl bg-dark text-white" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-white" href="{{ route('dashboard') }}">
                        <i class="fas fa-home me-1"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">
                    Application
                </li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-white">Application Summary</h6>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('personaldetails*') ? 'active text-white' : '' }}"
                        href="{{ route('personaldetails.edit', $pd->app_id) }}">
                        <i class="fas fa-user me-1"></i> Personal Details
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contactdetails*') ? 'active text-white' : '' }}"
                        href="{{ route('contactdetails.edit', $cd->app_id) }}">
                        <i class="fas fa-phone me-1"></i> Contact Details
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('familydetails*') ? 'active text-white' : '' }}"
                        href="{{ route('familydetails.edit', $fd->app_id) }}">
                        <i class="fas fa-users me-1"></i> Family Details
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('programdetails*') ? 'active text-white' : '' }}"
                        href="{{ route('programdetails.edit', $pgd->app_id) }}">
                        <i class="fas fa-graduation-cap me-1"></i> Program Details
                    </a>
                </li>

                @if(strtolower($pd->form_type) == 'undergraduate')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('academicdetails*') ? 'active text-white' : '' }}"
                        href="{{ $ad ? route('academicdetails.edit', $ad->app_id) : route('academicdetails.create') }}">
                        <i class="fas fa-book-open me-1"></i> Academic Details
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tertiarydetails*') ? 'active text-white' : '' }}"
                        href="{{ $td ? route('tertiarydetails.edit', $td->app_id) : route('tertiarydetails.create') }}">
                        <i class="fas fa-building me-1"></i> Tertiary Details
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('attacheddocuments*') ? 'active text-white' : '' }}"
                        href="{{ $at ? route('attacheddocuments.edit', $at->app_id) : route('attacheddocuments.create') }}">
                        <i class="fas fa-paperclip me-1"></i> Attached Documents
                    </a>
                </li>

                @elseif(strtolower($pd->form_type) == 'postgraduate')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('references*') ? 'active text-white' : '' }}"
                        href="{{ $ref ? route('references.edit', $ref->app_id) : route('references.create') }}">
                        <i class="fas fa-users me-1"></i> References
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tertiarydetails*') ? 'active text-white' : '' }}"
                        href="{{ $td ? route('tertiarydetails.edit', $td->app_id) : route('tertiarydetails.create') }}">
                        <i class="fas fa-building me-1"></i> Academic Details
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('postgraduatedocuments*') ? 'active text-white' : '' }}"
                        href="{{ $pgdoc ? route('postgraduatedocuments.index') : route('postgraduatedocuments.index') }}">
                        <i class="fas fa-paperclip me-1"></i> Postgraduate Documents
                    </a>
                </li>
                @endif

            </ul>

            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    @if(auth()->user()->personaldetails && auth()->user()->personaldetails->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->personaldetails->avatar) }}" width='50px' class="rounded-circle me-2" alt="User Photo">
                    @else
                    <img src="{{ asset('assets/img/default-avatar.png') }}" width='50px' class="rounded-circle me-2" alt="Default Photo">
                    @endif
                    <span class="text-white">{{ auth()->user()->app_id }}'s Profile</span>
                </li>

                <li class="nav-item d-flex align-items-center ms-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>