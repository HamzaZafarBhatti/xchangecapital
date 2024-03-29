<!-- ===============>> Header section start here <<================= -->
<header class="header-section header-section--style5">
    <div class="header-bottom">
        <div class="container">
            <div class="header-wrapper header-wrapper--style2">
                <div class="logo">
                    <a href="index.html">
                        <img src="{{ asset('asset/new_front/images/logo/logo-2.png') }}" alt="logo" class="dark">
                    </a>
                </div>
                <div class="header-content d-flex align-items-center gap-4">
                    <div class="menu-area">
                        <ul class="menu menu--style1">
                            <li>
                                <a href="{{ route('front.index') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('front.index') }}">Payment Proofs</a>
                            </li>
                            <li>
                                <a href="#">Traders</a>
                                <ul class="submenu">
                                    <li><a href="service-details.html">Top Traders</a></li>
                                    <li><a href="service-details.html">Verify Trader</a></li>
                                    <li><a href="service-details.html">Verified Traders Page</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact.html">Market Rate</a>
                            </li>
                            <li class="d-lg-none">
                                <div class="d-flex gap-3 p-3">
                                    <a href="{{ route('user.register') }}" class="trk-btn trk-btn--tertiary">
                                        <span>Register</span>
                                    </a>
                                    <a href="{{ route('user.login') }}" class="trk-btn trk-btn--tertiary">
                                        <span>Login</span>
                                    </a>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <div class="header-action">
                        <div class="menu-area">
                            <div class="d-flex gap-3">
                                <div class="header-btn">
                                    <a href="{{ route('user.register') }}" class="trk-btn trk-btn--tertiary">
                                        <span>Register</span>
                                    </a>
                                </div>
                                <div class="header-btn">
                                    <a href="{{ route('user.login') }}" class="trk-btn trk-btn--tertiary">
                                        <span>Login</span>
                                    </a>
                                </div>
                            </div>

                            <!-- toggle icons -->
                            <div class="header-bar d-lg-none header-bar--style1">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ===============>> Header section end here <<================= -->
