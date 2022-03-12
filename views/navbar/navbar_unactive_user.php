
<nav class="navbar  navbar-expand navbar-info bg-info text-dark topbar  static-top rounded-bottom shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <img class="img-profile rounded" width="40" height="40" src="<?= company_brand_image($db) ?>" alt="Company_Brand">

        <div class="navbar-brand sidebar-brand-text text-dark mx-3"><?= find_company_name($_SESSION["user_company"], $db) ?> </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <img class="img-profile rounded" width="40" height="40" src=<?= company_brand_image($db) ?>>

                <div class="navbar-brand sidebar-brand-text text-dark mx-3"><?= find_company_name($_SESSION["user_company"], $db) ?> </div>
            </form>
            <!-- Dropdown - Messages -->
        </li>

        <li class="text-dark nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="serDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <i class="fa fa-language" aria-hidden="true"></i><?= language_content("FR", "EN") ?>

            </a>
            <div class="dropdown-menu dropdown-menu-right bg-gradient-info text-dark shadow animated--grow-in" aria-labelledby="serDropdown">
                <a class="dropdown-item" href="index.php?page=controllers/controller&lang=0">
                    Français (FR)
                </a>
                <a class="dropdown-item" href="index.php?page=controllers/controller&lang=1">
                    English (EN)
                </a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <!-- <li class="nav-item dropdown no-arrow mx-1">
            <a class="text-dark nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i> -->
                <!-- Counter - Messages -->
                <!-- <span class="badge badge-danger badge-counter"></span> -->
            <!-- </a> -->
            <!-- Dropdown - Messages -->
            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right bg-gradient-info text-dark shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header text-info bg-dark">
                    <?= language_content("Messagerie", "Message Center") ?>
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#"><?= language_content("Lire Plus De Messages", "Read More Messages") ?></a>
            </div>
        </li> -->

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="text-dark nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-info-600 small"><?= $_SESSION["user_name"] . " " . $_SESSION["user_prename"] ?></span>
                <div class="dropdown-list-image mr-3">
                    <img class="img-profile rounded-circle" width="30" height="30" src="<?= user_avatar($db) ?>">
                    <div class="status-indicator bg-success"></div>
                </div>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right bg-gradient-info text-dark shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="index.php?page=views/others/user_information2">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <?= language_content("Mes informations", "My information") ?>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <?= language_content("Déconnexion", "Logout") ?>
                </a>
            </div>
        </li>

    </ul>

</nav>