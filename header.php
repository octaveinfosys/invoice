<header class="header header-nav-menu header-nav-links">
    <div class="logo-container">
        <a href="https://www.octaveinfosys.com" class="logo">
            <h3 class="m-0">Admin</h3>
        </a>
        <button class="btn header-btn-collapse-nav d-lg-none" data-bs-toggle="collapse" data-bs-target=".header-nav">
            <i class="fas fa-bars"></i>
        </button>

        <!-- start: header nav menu -->
        <div class="header-nav collapse">
            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 header-nav-main-square">
                <nav>
                    <ul class="nav nav-pills" id="mainNav">
                        <li class="">
                            <a class="nav-link" href="dashboard">
                                Dashboard
                            </a>    
                        </li>
                </nav>
            </div>
        </div>
        <!-- end: header nav menu -->
    </div>

    <!-- start: search & user box -->
    <div class="header-right">

        <a class="btn search-toggle d-none d-md-inline-block d-xl-none" data-toggle-class="active" data-target=".search"><i class="bx bx-search"></i></a>
        <form action="https://www.okler.net/previews/porto-admin/4.2.0/pages-search-results.html" class="search search-style-1 nav-form d-none d-xl-inline-block">
            <div class="input-group">
                <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
            </div>
        </form>

        <span class="separator"></span>
        <a class="dropdown-language nav-link" href="#" role="button" id="dropdownLanguage" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="img/blank.gif" class="flag flag-us" alt="English" /> EN
            <i class="fas fa-chevron-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLanguage">
            <a class="dropdown-item" href="#"><img src="img/blank.gif" class="flag flag-us" alt="English" /> English</a>
            <a class="dropdown-item" href="#"><img src="img/blank.gif" class="flag flag-es" alt="English" /> Español</a>
            <a class="dropdown-item" href="#"><img src="img/blank.gif" class="flag flag-fr" alt="English" /> Française</a>
        </div>

        <span class="separator"></span>


        <div id="userbox" class="userbox">
            <a href="logout">
                <i class="bx bx-log-out"></i> Logoout
            </a>

        </div>
    </div>
    <!-- end: search & user box -->
</header>