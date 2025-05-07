<nav class="navbar navbar-expand-lg navbar-dark  text-light "> 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item @yield('personal_active')">
          @if (empty($pd->app_id))
          <a class="nav-link @yield('ptext')" href="{{ route('personaldetails.create') }}">Personal Details</a>
          @else
          <a class="nav-link @yield('ptext')" href="{{ route('personaldetails.edit', $pd->app_id) }}">Personal Details</a>
          @endif
        </li>
        <li class="nav-item @yield('contact_active')">
          @if (empty($cd->app_id))
          <a class="nav-link @yield('ctext')" href="{{ route('contactdetails.create') }}">Contact Details</a>
          @else
          <a class="nav-link @yield('ctext')" href="{{ route('contactdetails.edit', $pd->app_id) }}">Contact Details</a>
          @endif
        </li>
        <li class="nav-item @yield('family_active')">
          @if (empty($fd->app_id))
          <a class="nav-link @yield('ftext')" href="{{ route('contactdetails.create') }}">Create Famaily Details</a>
          @else
          <a class="nav-link @yield('ftext')" href="{{ route('contactdetails.edit', $pd->app_id) }}">Edit Famaily Details</a>
          @endif
          {{-- <a class="nav-link @yield('ftext')" href="#">Famaily Details</a> --}}
        </li>
        <li class="nav-item @yield('programme_active')">
          @if (empty($pgd->app_id))
          <a class="nav-link @yield('pgtext')" href="{{ route('programdetails.create') }}">Create Programme Details</a>
          @else
          <a class="nav-link @yield('pgtext')" href="{{ route('programdetails.edit', $pd->app_id) }}">Edit Programme Details</a>
          @endif
          {{-- <a class="nav-link @yield('pgtext')" href="#">Programme Details</a> --}}
        </li>
        <li class="nav-item @yield('academic_active')">
          @if (empty($ad->app_id))
          <a class="nav-link @yield('atext')" href="{{ route('academicdetails.create') }}">Create Academic Details</a>
          @else
          <a class="nav-link @yield('atext')" href="{{ route('academicdetails.edit', $pd->app_id) }}">Edit Academic Details</a>
          @endif
          {{-- <a class="nav-link @yield('atext')" href="#">Academic Details</a> --}}
        </li>
        <li class="nav-item @yield('tertiary_active')">
          @if (empty($td->app_id))
          <a class="nav-link @yield('ttext')" href="{{ route('tertiarydetails.create') }}">Create Academic Details</a>
          @else
          <a class="nav-link @yield('ttext')" href="{{ route('tertiarydetails.edit', $pd->app_id) }}">Edit Academic Details</a>
          @endif
          {{-- <a class="nav-link @yield('ttext')" href="#">Tertiary Details</a> --}}
        </li>
      
        <li class="nav-item @yield('attached_active')">
          @if (empty($atd->app_id))
          <a class="nav-link @yield('attext')" href="{{ route('academicdetails.create') }}">Create Academic Details</a>
          @else
          <a class="nav-link @yield('attext')" href="{{ route('academicdetails.edit', $pd->app_id) }}">Edit Academic Details</a>
          @endif
          {{-- <a class="nav-link @yield('attext')" href="#">Attached Documents</a> --}}
        </li>
      </ul>
    </div>
    <a class="navbar-brand" href="#">Application Summary</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
