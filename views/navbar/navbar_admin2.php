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
                <a class="dropdown-item" href="admin2.php?page=controllers/controller&lang=0">
                    Français (FR)
                </a>
                <a class="dropdown-item" href="admin2.php?page=controllers/controller&lang=1">
                    English (EN)
                </a>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter badge-pill float-right"> 5+ </span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right bg-gradient-info text-dark shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header text-info bg-dark">
                    <?= language_content("Centre d'alertes", "Alerts Center") ?>
                </h6>
                <a class=" text-dark dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-dark">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#"><?= language_content("Voir toute les alertes", "Show All Alerts") ?></a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="text-dark nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->

                <?php $nbr_msg_unread = unread_total_msg($db);
                if ($nbr_msg_unread != 0) : ?>
                    <span class="badge badge-pill badge-danger badge-counter"><?= $nbr_msg_unread ?>+</span>
                <?php endif; ?>

            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right bg-gradient-info text-dark shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header text-info bg-dark">
                    <?= language_content("Messagerie", "Message Center") ?>
                </h6>

                <?php if ($nbr_msg_unread == 0) : ?>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <p class="text-center h6">
                            <-- Pas de Nouveaux messages -->
                        </p>
                    </a>
                <?php else : ?>
                    <?php
                    // liste des msg récents
                    $list_teachers_actif = list_msg_user_navbar($db);
                    while ($user = mysqli_fetch_assoc($list_teachers_actif)) :
                    ?>
                        <?php if ($user["groupId"] == null) : ?>
                            <?php if ($user["messageFile"] == null) : ?>
                                <a class="dropdown-item d-flex align-items-center" href="admin2.php?page=controllers/admin2/chat/message-detail-controller&user_id=<?= plus_d_inspi1($user["concernId"], $db)["userId"] ?>">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?= user_avatar_by_id2($user, $db) ?>" alt="">
                                        <?php if ($user["isConnect"] == 1) : ?>
                                            <div class="status-indicator bg-success"></div>
                                        <?php else : ?>
                                            <div class="status-indicator bg-danger"></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?= $user["messageContent"] ?></div>
                                        <div class="small text-gray-500"><?= date_formatter($user["sendAt"], 'h:m')  ?></div>
                                    </div>
                                </a>
                            <?php else : ?>
                                <a class="dropdown-item d-flex align-items-center" href="admin2.php?page=controllers/admin2/chat/message-detail-controller&user_id=<?= plus_d_inspi1($user["concernId"], $db)["userId"] ?>">
                                    <div class=" dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?= user_avatar_by_id2($user, $db) ?>" alt="">
                                        <?php if ($user["isConnect"] == 1) : ?>
                                            <div class="status-indicator bg-success"></div>
                                        <?php else : ?>
                                            <div class="status-indicator bg-danger"></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="font-weight-bold">
                                        <?php $info = new SplFileInfo($user["filePosition"]); ?>
                                        <img class="float-left rounded-circle" src="<?= type_of_file($info->getExtension()) ?>" alt="000" width="50" height="50" class="text-center">
                                        <p class="text-center">
                                            <?= name_of_type($info->getExtension()) ?>
                                        </p>
                                        <div class="small text-gray-500"><?= date_formatter($user["sendAt"], 'h:m')  ?></div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php else : ?>
                            <?php if ($user["messageFile"] == null) : ?>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="public/images/group.png" width="60" height="60" alt="">
                                        <?php if ($user["isConnect"] == 1) : ?>
                                            <div class="status-indicator bg-success"></div>
                                        <?php else : ?>
                                            <div class="status-indicator bg-danger"></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?= $user["messageContent"] ?></div>
                                        <div class="small text-gray-500"><?= date_formatter($user["sendAt"], 'h:m')  ?></div>
                                    </div>
                                </a>
                            <?php else : ?>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class=" dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="public/images/group.png" width="60" height="60" alt="">
                                        <?php if ($user["isConnect"] == 1) : ?>
                                            <div class="status-indicator bg-success"></div>
                                        <?php else : ?>
                                            <div class="status-indicator bg-danger"></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="font-weight-bold">
                                        <?php $info = new SplFileInfo($user["filePosition"]); ?>
                                        <img class="float-left rounded-circle" src="<?= type_of_file($info->getExtension()) ?>" alt="000" width="50" height="50" class="text-center">
                                        <p class="text-center">
                                            <?= name_of_type($info->getExtension()) ?>
                                        </p>
                                        <div class="small text-gray-500"><?= date_formatter($user["sendAt"], 'h:m')  ?></div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>

                <?php endif; ?>
                <a class="dropdown-item text-center small text-gray-500" href="admin2.php?page=views/admin2/chat/chat_view1"><?= language_content("Lire Plus De Messages", "Read More Messages") ?></a>
            </div>
        </li>

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

</nav>