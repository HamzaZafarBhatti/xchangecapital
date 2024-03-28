<!--Nav Start-->
<nav class="nav navbar navbar-expand-lg navbar-light iq-navbar border-bottom">
    <div class="container-fluid navbar-inner">
        <a href="{{ route('user.dashboard') }}" class="navbar-brand">
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20px" height="20px" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                </svg>
            </i>
        </div>
        <h4 class="title">
            Account Dashboard
        </h4>
        
                <li class="nav-item dropdown">
                    <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset(auth()->user()->image ? auth()->user()->get_user_image : 'asset/user/images/avatars/01.png')}}" alt="User-Profile"
                            class="img-fluid avatar avatar-50 avatar-rounded" style="object-fit: cover">
                        <div class="caption ms-3 ">
                            <h6 class="mb-0 caption-title">ACCOUNT ID</h6>
                            <p class="mb-0 caption-sub-title text-uppercase">{{ auth()->user()->account_id }}</p>
                            @if (auth()->user()->is_verified)
                                <p class="mb-0 caption-sub-title text-success text-uppercase">ACCOUNT VERIFIED</p>
                            @else
                                <p class="mb-0 caption-sub-title text-danger text-uppercase">ACCOUNT UNVERIFIED</p>
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li class="border-0"><a class="dropdown-item"
                                href="{{ route('user.profile.edit') }}">Profile</a></li>
                        <li class="border-0">
                            <hr class="m-0 dropdown-divider">
                        </li>
                        <li class="border-0"><a class="dropdown-item"
                                href="{{ route('user.logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--Nav End-->
