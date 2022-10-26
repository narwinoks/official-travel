<div class="page-wrapper">

    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar">
        <a href="#" class="sidebar-toggler">
            <i data-feather="menu"></i>
        </a>
        <div class="navbar-content">
            <form class="search-form">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i data-feather="search"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown nav-profile">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://via.placeholder.com/30x30" alt="profile">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <div class="dropdown-header d-flex flex-column align-items-center">
                            <div class="figure mb-3">
                                <img src="https://via.placeholder.com/80x80" alt="">
                            </div>
                            <div class="info text-center">
                                <p class="name font-weight-bold mb-0">{{ Auth::User()->username }}</p>
                            </div>
                        </div>
                        <div class="dropdown-body">
                            <ul class="profile-nav p-0 pt-3">
                                <form action="{{ route('logout') }}" method="post" id="logout-form">
                                    @method('post')
                                    @csrf
                                    <button type="submit" class="text center btn bnt-primary btn-sm"> <i
                                            data-feather="log-out"></i> Logout</button>
                                </form>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
