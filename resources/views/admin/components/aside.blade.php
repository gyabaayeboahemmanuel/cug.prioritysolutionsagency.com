<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{route('admin-dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-heading">Admissions</li>

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('applicants.index') ? 'active' : '' }}" href="{{route('applicant.index')}}">
        <i class="bi bi-person-lines-fill"></i>
        <span>Applicants</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('applications.index') ? 'active' : '' }}" href="{{route('admin.applicants.index')}}">
        <i class="bi bi-file-earmark-text"></i>
        <span>Applications</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admissions.index') ? 'active' : '' }}" href="#">
        <i class="bi bi-check2-circle"></i>
        <span>Admissions</span>
      </a>
    </li>

      <!-- New Analytics Tab -->
      <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.analytics') ? 'active' : '' }}" href="{{ route('admin.analytics') }}">
        <i class="bi bi-bar-chart-fill"></i>
        <span>Analytics</span>
      </a>
    </li>
    <li class="nav-item">
  <a class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">
    <i class="bi bi-newspaper"></i>
    <span>News & Articles</span>
  </a>
</li>

    <li class="nav-item">
  <a class="nav-link {{ request()->routeIs('flyers.*') ? 'active' : '' }}" href="{{ route('admin.flyers.index') }}">
    <i class="bi bi-image"></i>
    <span>Flyer Gallery</span>
  </a>


</li>
<li class="nav-item">
  <a class="nav-link {{ request()->routeIs('vouchers.*') ? 'active' : '' }}" href="{{ route('admin.vouchers.index') }}">
    <i class="bi bi-cash-stack"></i>
    <span>Vouchers</span>
  </a>
</li>


    <!-- @hasrole('admin') -->
    <li class="nav-heading">User Management</li>

    <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
        <i class="bi bi-people"></i>
        <span>Manage Users</span>
    </a>
</li>


    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}" href="#">
        <i class="bi bi-person-badge"></i>
        <span>Roles</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('roles.permissions') ? 'active' : '' }}" href="#">
        <i class="bi bi-shield-lock"></i>
        <span>Permissions</span>
      </a>
    </li>
    <!-- @endhasrole -->

    <li class="nav-heading">Account</li>

    <li class="nav-item">
      <a class="nav-link collapsed {{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>

  </ul>
</aside><!-- End Sidebar -->
