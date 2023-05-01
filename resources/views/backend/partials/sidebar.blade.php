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
            <a class="nav-link collapsed" data-bs-target="#Courses-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-grid-3x3-gap"></i><span>Courses</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Courses-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @if (Auth::user()->role_id < 3 || Auth::user()->role_id == 4)
                <li>
                    <a href="{{ route('course.offered') }}">
                    <i class="bi bi-circle"></i><span>Offered Courses</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('course.courses') }}">
                    <i class="bi bi-circle"></i><span>All Courses</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('course.create') }}">
                    <i class="bi bi-circle"></i><span>Create Course</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('registration.registrations') }}">
                <i class="bi bi-grid-3x3-gap"></i><span>Registrations</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Disciplines-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-grid-3x3-gap"></i><span>Disciplines</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Disciplines-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('discipline.disciplines') }}">
                <i class="bi bi-circle"></i><span>All Disciplines</span>
                </a>
            </li>
            <li>
                <a href="{{ route('discipline.create') }}">
                <i class="bi bi-circle"></i><span>Create Discipline</span>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Schools-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-grid-3x3-gap"></i><span>Schools</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Schools-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('school.schools') }}">
                <i class="bi bi-circle"></i><span>All Schools</span>
                </a>
            </li>
            <li>
                <a href="{{ route('school.create') }}">
                <i class="bi bi-circle"></i><span>Create School</span>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Universitys-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-grid-3x3-gap"></i><span>Universitys</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Universitys-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('university.universitys') }}">
                <i class="bi bi-circle"></i><span>All Universitys</span>
                </a>
            </li>
            <li>
                <a href="{{ route('university.create') }}">
                <i class="bi bi-circle"></i><span>Create University</span>
                </a>
            </li>
            </ul>
        </li>
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
            <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-grid-3x3-gap"></i><span>System Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="settings-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
              <li>
                  <a href="{{ route('settings.index') }}">
                  <i class="bi bi-circle"></i><span>Settings</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('role.roles') }}">
                  <i class="bi bi-circle"></i><span>Roles</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('permission.permissions') }}">
                  <i class="bi bi-circle"></i><span>Permissions</span>
                  </a>
              </li>
            </ul>
        </li>
      @endif

    </ul>

  </aside><!-- End Sidebar-->
