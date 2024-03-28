<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt text-primary me-2"></i>17 Gavin Ave, Pine Park, Randburg, 2194, South Africa</small>
            <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>08:00 - 15:00</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small><i class="fa fa-envelope text-primary me-2"></i>support@arbyvest.com</small>
            <small class="ms-4"><i class="fa fa-phone-alt text-primary me-2"></i>+27 87 5503181, +234 911 6364009</small>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{route('front.index')}}" class="navbar-brand ms-4 ms-lg-0">
            <img src="https://arbyvest.com/asset/front/img/uploads/arbyvest-logomin.png" width="231" height="49" />
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{route('front.index')}}" class="nav-item nav-link @if(Route::is('front.index')) active @endif">Home</a>
                <a href="{{route('front.market_rates')}}" class="nav-item nav-link @if(Route::is('front.market_rates')) active @endif">Market Rates</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle @if(Route::is(['front.about','front.how_it_works'])) active @endif" data-bs-toggle="dropdown">About Us</a>
                    <div class="dropdown-menu border-light m-0">
                        <a href="{{route('front.about')}}" class="dropdown-item @if(Route::is('front.about')) active @endif">About</a>
                        <a href="{{route('front.how_it_works')}}" class="dropdown-item @if(Route::is('front.how_it_works')) active @endif">How It Works</a>
                        <a href="https://arbyvest.com/asset/whitepaper/how-it-works/document/Trading%20Foreign%20Currencies%20with%20ARBYVEST%20TECHNOLOGY.pdf" class="dropdown-item @if(Route::is('front.exclusive_offers')) active @endif">Download GUIDE</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle @if(Route::is(['front.foreign_currency_resellers','front.features'])) active @endif" data-bs-toggle="dropdown">Currency Agents</a>
                    <div class="dropdown-menu border-light m-0">
                        <a href="{{route('front.foreign_currency_resellers')}}" class="dropdown-item @if(Route::is('front.foreign_currency_resellers')) active @endif">Foreign Currency Agents</a>
                        <a href="{{route('front.verify_trader')}}" class="dropdown-item @if(Route::is('front.verify_trader')) active @endif">Verify Currency Agents</a>
                    </div>
                </div>
                <a href="{{route('front.payment_proofs')}}" class="nav-item nav-link @if(Route::is('front.payment_proofs')) active @endif">Payment Proofs</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle @if(Route::is(['front.projects','front.features','front.team','front.testimonial'])) active @endif" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu border-light m-0">
                        <a href="{{route('front.blogs')}}" class="dropdown-item @if(Route::is('front.blogs')) active @endif">Blogs</a>
                        <hr>
                        <a href="{{route('front.contact')}}" class="dropdown-item @if(Route::is('front.contact')) active @endif">Contact Us</a>
                        <a href="{{route('front.faq')}}" class="dropdown-item @if(Route::is('front.faq')) active @endif">FAQs</a>
                        <a href="{{route('front.privacy_policy')}}" class="dropdown-item @if(Route::is('front.privacy_policy')) active @endif">Privacy Policy</a>
                        <a href="{{route('front.terms_of_service')}}" class="dropdown-item @if(Route::is('front.terms_of_service')) active @endif">Terms of Service</a>
                        <a href="{{route('front.disclaimer')}}" class="dropdown-item @if(Route::is('front.disclaimer')) active @endif">Disclaimer</a>
                        <a href="{{route('front.top_traders')}}" class="dropdown-item @if(Route::is('front.top_traders')) active @endif">Top 50 Traders</a>
                        <a href="{{route('front.exclusive_offers')}}" class="dropdown-item @if(Route::is('front.exclusive_offers')) active @endif">Exclusive Offers</a>
                    </div>
                </div>
                @guest
                    <a href="{{route('user.register')}}" class="nav-item nav-link">REGISTER</a>
                    <a href="{{route('user.login')}}" class="nav-item nav-link">LOGIN</a>
                    @endguest
                @auth
                    <a href="{{route('user.dashboard')}}" class="nav-item nav-link">Account Dashboard</a>    
                @endauth
            </div>
            {{-- <div class="d-none d-lg-flex ms-2">
                <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                    <small class="fab fa-facebook-f text-primary"></small>
                </a>
                <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                    <small class="fab fa-twitter text-primary"></small>
                </a>
                <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                    <small class="fab fa-linkedin-in text-primary"></small>
                </a>
            </div> --}}
        </div>
    </nav>
</div>
<!-- Navbar End -->
