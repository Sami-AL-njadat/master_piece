    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="{{ route('admin.dashboard') }}" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                            class="fas fa-bars"></i></a></li>
            </ul>
        </form>
        <ul class="navbar-nav navbar-right">

{{-- @dd(Session('loginname')) --}}
            <li class="dropdown"><a href="#" data-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                    <div class="d-sm-none d-lg-inline-block" style="font-size: larger; margin-right:10px">
                        {{ session('loginname') }}
                    </div>
                    <img alt="image" src="{{ asset(session('loginimage')) }}"
                        style="width: 50px; height: 50px; border-radius: 50%;">

                      

                </a>
                <div class="dropdown-menu dropdown-menu-right ">
                    <a href="{{ route('adminProfile') }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>


                    <div class="dropdown-divider"></div>

                    <a href="{{ route('logoutprocess') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
