<nav class="navbar navbar-expand-lg navbar-info bg-info rounded-bottom">
    <a class="navbar-brand" href="admin1.php">
        <img src="public/images/nomdark.png" width="80" height="50" alt="brand">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-dark" href="admin.php"> <i class="fa fa-home"></i> <?= language_content("Acceuil", "Home") ?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="admin.php?page=views/admin1/gest_comp"> <i class="fa fa-building"></i> <?= language_content("Gestion Entreprises", "Company,s management") ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="admin1.php?page=views/admin1/gest_admin"> <i class="fa fa-users"></i> <?= language_content("Gestion Administrateurs", "Admin's management") ?></a>
            </li>

            <li class="text-dark nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="serDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <i class="fa fa-language" aria-hidden="true"></i><?= language_content("FR", "EN") ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right bg-gradient-info text-dark shadow animated--grow-in" aria-labelledby="serDropdown">
                    <a class="dropdown-item" href="admin1.php?page=controllers/controller&lang=0">
                        Français (FR)
                    </a>
                    <a class="dropdown-item" href="admin1.php?page=controllers/controller&lang=1">
                        English (EN)
                    </a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav ml-auto">
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
                        <a class="dropdown-item" href="admin2.php?page=views/users/user_information">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?= language_content("Mes informations", "My information") ?>
                        </a>
                        <a class="dropdown-item" href="admin2.php?page=views/admin2/admin2_setting">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?= language_content("Paramètres", "Settings") ?>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?= language_content("Déconnexion", "Logout") ?>
                        </a>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</nav>