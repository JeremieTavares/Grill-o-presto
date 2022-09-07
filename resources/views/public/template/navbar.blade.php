<nav class="navbar bg-primary navbar-expand-lg px-5 py-3">
    <div class="container-fluid navbar_div">
        <a class="navbar-brand" href="{{ route('home') }}"><img width="80" src="./image/logo_white_no_bg.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-5 align-items-center ul_nav">
                    <li class="nav-item">
                        <a class="nav-link text-white text-sm-secondary text-lg-white header_nav_item text-align-center"
                            aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white header_nav_item" href="#">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white header_nav_item" href="#">Support</a>
                    </li>
                </ul>
                <div class="d-flex gap-3 align-items-center flex-sm-column flex-lg-row">
                    <a href="" class="text-secondary"><i
                            class="fa-solid fa-cart-shopping fs-5 me-3 color-primary nav_cart"></i></a>
                            <?php if(Auth::user()){ ?>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-secondary">Deconnexion</button>
                                </form>
                                <?php } else {
                                    ?>
                                    <a class="btn pink" href="{{ route('login') }}">Connexion</a>
                                    <a class="btn btn-secondary" href="{{ route('register') }}">Inscription <i class="fa fa-arrow-right"></i></a>
                                    <?php
                                }?>
                    
                    
                </div>

            </div>
        </div>
    </div>
</nav>
