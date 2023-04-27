  <!-- ======= Sidebar ======= -->
  <aside
    style="background-color:#093D4A;"
    id="sidebar"
    class="sidebar"
  >

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @if (Auth::user()->role_id < 3)
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#persons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-grid-3x3-gap"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="persons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('user.allUser') }}">
                <i class="bi bi-circle"></i><span>All Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.create') }}">
                <i class="bi bi-circle"></i><span>Create User</span>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('settings.index') }}">
            <i class="bi bi-gear"></i>
            <span>Settings</span>
            </a>
        </li><!-- End Register Page Nav -->
      @endif

    </ul>

  </aside><!-- End Sidebar-->
