		<!-- partial:../../partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Per<span>DIN</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Menu</li>
          <li class="nav-item">
            @if (Auth::User()->hasRole('sdm'))
            <a href="{{ route('submission.all' ) }}" class="nav-link">
              <i class="link-icon" data-feather="message-square"></i>
              <span class="link-title">History Submission</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('submission.history') }}" class="nav-link">
              <i class="link-icon" data-feather="message-square"></i>
              <span class="link-title">New Submission</span>
            </a>

          </li>
          <li class="nav-item">
            <a href="{{ route('city.index') }}" class="nav-link">
              <i class="link-icon" data-feather="sun"></i>
              <span class="link-title">city</span>
            </a>
          </li>
          @elseif(Auth::User()->hasRole('pegawai'))
          <li class="nav-item">
            <a href="{{ route('submission.index') }}" class="nav-link">
              <i class="link-icon" data-feather="align-right"></i>
              <span class="link-title">My Submission</span>
            </a>
          </li>
          @elseif(Auth::User()->hasRole('admin'))
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">User</span>
            </a>
          </li>
          @endif

        </ul>
      </div>
    </nav>
