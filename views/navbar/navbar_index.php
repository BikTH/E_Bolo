<nav class="navbar fixed-top navbar-expand-sm navbar-black navbar-info bg-info text-dark rounded-bottom p-0 shadow ">
    <div class="container">
        <button class="navbar-toggler" style="background-color: dark;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">
            <img class="d-block " src="public/images/nomdark.png" width="200" height="60" alt="First slide">
        </a>

        <div class="collapse navbar-collapse"></div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-dark" href="index.php">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <?php if (what_langauge() == 0) : ?>
                                    Acceuil
                                <?php else : ?>
                                    Home
                                <?php endif; ?>
                                <span class="sr-only">
                                    (current) 
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php?page=views/index/contact_us">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <?php if (what_langauge() == 0) : ?>
                                    Contact
                                <?php else : ?>
                                    Contact
                                <?php endif; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <?php if (is_login1() == false) : ?>
                    <!-- OPTIONS AVANT CONNEXION -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item text-dark">
                            <a class="nav-link text-dark" href="index.php?page=views/users/register_inc">
                                <i class="fa fw fa-building" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php?page=views/users/register">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>

                <?php else : ?>
                    <!-- NOUVELLLE OPTIONS APRES CONNEXION -->

                <?php endif; ?>

            </li>
            <li class="text-dark nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if (what_langauge() == 0) : ?>
                        <i class="fa fa-language" aria-hidden="true"></i> FR
                    <?php else : ?>
                        <i class="fa fa-language" aria-hidden="true"></i> EN
                    <?php endif; ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right bg-gradient-info text-dark shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="index.php?page=controllers/controller&lang=0">
                        Français (FR)
                    </a>
                    <a class="dropdown-item" href="index.php?page=controllers/controller&lang=1">
                        English (EN)
                    </a>
                </div>
            </li>
        </ul>
    </div>

</nav>

<div class="pb-5"></div>