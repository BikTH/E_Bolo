<!-- Sidebar -->
<!-- page de navigation à gauchee de la page -->
<ul class="navbar-nav  bg-dark sidebar sidebar-dark accordion text-light" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon mx-3"><img class="d-block mt-5 " src="public/images/nomprimary.png" width="150" height="90" alt="First slide"> </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <div class="row justify-content-center">
        <?php include('views/others/hour.php') ?>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - WORKSPACE -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-fw fa-briefcase"></i>
            <span class="text-light"><strong><?php language_content("ESPACE DE TRAVAIL", "WORKSPACE") ?></strong></span>
        </a>
    </li>

    <div class="collapse " id="collapseExample">

        <!-- My Files -->
        <div class="sidebar-heading">
            <?php language_content("Mes Fichiers", "My Files") ?>
        </div>

        <!-- Nav Item - View Files -->
        <li class="nav-item">
            <a class="nav-link" href="admin2.php?page=views/admin2/files_worker/list_files">
                <i class="fas fa-fw fa-file"></i>
                <span><?php language_content("Consulter Fichiers", "View Files") ?></span>
            </a>
        </li>

        <!-- Nav Item - Load Files Collapse Menu -->
        <li class="nav-item text-light">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cloud"></i>
                <span><?php language_content("Charger des fichiers", "Load Files") ?></span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-gradient-dark py-2 collapse-inner rounded">
                    <h6 class="collapse-header text-light"><?php language_content("Charger des fichiers :", "Load Files :") ?></h6>
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/files_worker/upload_files">
                        <i class="fas fa-fw fa-upload"></i>
                        <?php language_content("Mettre en ligne", "Upload") ?>
                    </a>
                    <a class="collapse-item text-light" href="admin2.php?page=views\admin2\files_worker\download_files">
                        <i class="fas fa-fw fa-download"></i>
                        <?php language_content("Télécharger", "Download") ?>
                    </a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Process My Files Collapse Menu -->
        <!-- <li class="nav-item text-light">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTw" aria-expanded="true" aria-controls="collapseTw">
                <i class="fas fa-fw fa-cog"></i>
                <span><?php language_content("Traiter Mes Fichiers", "Process My Files") ?></span>
            </a>
            <div id="collapseTw" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-gradient-dark py-2 collapse-inner rounded">
                    <h6 class="collapse-header text-light"><?php language_content("Traiter Mes Fichiers :", "Process My Files :") ?></h6>
                    <a class="collapse-item text-light" href="#">
                        <i class="fas fa-fw fa-trash-alt"></i>
                        <?php language_content("Supprimer", "Delete") ?>
                    </a>
                    <a class="collapse-item text-light" href="#">
                        <i class="fas fa-fw fa-edit"></i>
                        <?php language_content("Modifier", "Edit") ?>
                    </a>
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/chat/chat_views3">
                        <i class="fas fa-fw fa-share-alt"></i>
                        <?php language_content("Partager", "Share") ?>
                    </a>
                </div>
            </div>
        </li> -->

        <!-- Internal Messaging -->
        <div class="sidebar-heading">
            <?php language_content("Messagerie interne", "Internal Messaging") ?>
        </div>

        <!-- Messages -->
        <li class="nav-item text-light">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwos" aria-expanded="true" aria-controls="collapseTwos">
                <i class="fas fa-fw fa-comments"></i>
                <span><?php language_content("Messagerie", "Messages Center") ?></span>
                <?php $nbr_msg = unread_total_msg($db);
                        if ($nbr_msg != 0) : ?>
                            <span class="badge badge-pill badge-info float-right text-dark"><?php $nbr_msg ?>+</span>
                        <?php endif; ?>
            </a>
            <div id="collapseTwos" class="collapse" aria-labelledby="headingTwos" data-parent="#accordionSidebar">
                <div class="bg-gradient-dark py-2 collapse-inner rounded">
                    <h6 class="collapse-header text-light"><?php language_content("Charger des fichiers :", "Load Files :") ?></h6>
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/chat/chat_view1">
                        <i class="fas fa-fw fa-comment-alt"></i>
                        <?php language_content("Conversations", "Conversations") ?>
                        <?php $nbr_msg_unrea = nbr_msg_unread_total_msg($db);
                        if ($nbr_msg_unrea != 0) : ?>
                            <span class="badge badge-pill badge-info float-right text-dark"><?php $nbr_msg_unrea ?>+</span>
                        <?php endif; ?>
                    </a>
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/chat/chat_view2">
                        <i class="fas fa-fw fa-comments"></i>
                        <?php language_content("Groupes", "Groups") ?>
                        <?php $nbr_msg_unread = nbr_group_unread_total_msg($db);
                        if ($nbr_msg_unread != 0) : ?>
                            <span class="badge badge-pill badge-info float-right text-dark"><?php $nbr_msg_unread ?>+</span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </li>

        <li class="nav-item text-light">

            <!-- Messages -->
            <!-- <a class="nav-link" href="admin2.php?page=views/admin2/chat/chat_view1">
                <i class="fas fa-fw fa-comments"></i>
                <span><?php language_content("Messages", "Messages") ?></span>
            </a> -->

            <!-- Videoconference -->
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-video"></i>
                <span><?php language_content("Visio-conférence", "Videoconference") ?></span>
            </a>

        </li>

        <!-- Geolocation -->
        <div class="sidebar-heading">
            <?php language_content("Géolocalisation", "Geolocation") ?>
        </div>

        <li class="nav-item text-light">
            <!-- Consult my position -->
            <a class="nav-link" href="admin2.php?page=views/admin2/geolocalisation">
                <i class="fas fa-fw fa-map-marked"></i>
                <span><?php language_content("Carte", "Map") ?></span>
            </a>
        </li>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - DIRECTOR AREA -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#collapseExampl" role="button" aria-expanded="false" aria-controls="collapseExampl">
            <i class="fas fa-fw fa-users-cog"></i>
            <span class="text-light"><strong><?php language_content("ESPACE ADMIN", "DIRECTOR AREA") ?></strong></span>
        </a>
    </li>


    <div class="collapse " id="collapseExampl">

        <!-- Directions -->
        <div class="sidebar-heading">
            <?php language_content("Utilisateurs", "Users") ?>
        </div>

        <!-- Nav Item - Stat Admin -->
        <li class="nav-item">
            <a class="nav-link" href="admin2.php?views/admin2/home_admin2">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span><?php language_content("Statistique", "Dashboard") ?></span>
            </a>
        </li>

        <!-- Nav Item - Activate Users -->
        <li class="nav-item">
            <a class="nav-link" href="admin2.php?page=views/admin2/activate_user">
                <i class="fas fa-fw fa-user-lock"></i>
                <span><?php language_content("Activer les utilisateurs", "Activate Users") ?></span>
            </a>
        </li>


        <!-- Nav Item - Directions Collapse Menu -->
        <li class="nav-item text-light">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT7" aria-expanded="true" aria-controls="collapseT7">
                <i class="fas fa-fw fa-users"></i>
                <span><?php language_content("Directions", "Directions") ?></span>
            </a>
            <div id="collapseT7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-gradient-dark py-2 collapse-inner rounded">
                    <h6 class="collapse-header text-light"><?php language_content("Directions", "Directions") ?></h6>
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/directions/list_directions">
                        <i class="fas fa-fw fa-list"></i>
                        <?php language_content("Liste des Directions", "List of directions") ?>
                    </a>
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/directions/add_direction">
                        <i class="fas fa-fw fa-plus-circle"></i>
                        <?php language_content("Ajouter une Directions", "Add directions") ?>
                    </a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Assistant Administrator Collapse Menu -->
        <li class="nav-item text-light">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT777" aria-expanded="true" aria-controls="collapseT777">
                <i class="fas fa-fw fa-user-tag"></i>
                <span><?php language_content("Mes employés", "My employees") ?></span>
            </a>
            <div id="collapseT777" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-gradient-dark py-2 collapse-inner rounded">
                    <h6 class="collapse-header text-light"><?php language_content("Mes employés", "My employees") ?></h6>
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/employees/list_employee">
                        <i class="fas fa-fw fa-list"></i>
                        <?php language_content("Liste employés", "List of employees") ?>
                    </a>
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/employees/add_employee">
                        <i class="fas fa-fw fa-plus-circle"></i>
                        <?php language_content("Ajouter un employé", "Add an employee") ?>
                    </a>
                </div>
            </div>
        </li>

        <!-- Other Options -->
        <div class="sidebar-heading">
            <?php language_content("Autre Options", "Other Options") ?>
        </div>

        <!-- Nav Item - Company's file Collapse Menu -->
        <li class="nav-item text-light">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT77" aria-expanded="true" aria-controls="collapseT77">
                <i class="fas fa-fw fa-users"></i>
                <span><?php language_content("Fichiers d'entreprise", "Company's file") ?></span>
            </a>
            <div id="collapseT77" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-gradient-dark py-2 collapse-inner rounded">
                    <h6 class="collapse-header text-light"><?php language_content("Fichiers d'entreprise :", "Company's file :") ?></h6>
                    <!-- <a class="collapse-item text-light" href="admin2.php?page=views/admin2/company_files/folder">
                        <i class="fas fa-fw fa-folder"></i>
                        <?php language_content("Dossier", "Folder") ?>
                    </a> -->
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/company_files/list_files">
                        <i class="fas fa-fw fa-file-archive"> </i>
                        <?php language_content("Liste de fichiers", "List of Files") ?>
                    </a>
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/company_files/add_file">
                        <i class="fas fa-fw fa-plus-circle"> </i>
                        <?php language_content("Ajouter un fichier", "Add a file") ?>
                    </a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Right of access Collapse Menu -->
        <li class="nav-item text-light">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT778" aria-expanded="true" aria-controls="collapseT778">
                <i class="fas fa-fw fa-balance-scale"></i>
                <span><?php language_content("Droit d'accès", "Right of access") ?></span>
            </a>
            <div id="collapseT778" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-gradient-dark py-2 collapse-inner rounded">
                    <h6 class="collapse-header text-light"><?php language_content("Droit d'accès :", "Right of access :") ?></h6>
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/right_of_access/create_template">
                        <i class="fas fa-fw fa-pen"></i>
                        <?php language_content("Créer un modèle", "Create a template") ?>
                    </a>
                    <a class="collapse-item text-light" href="admin2.php?page=views/admin2/right_of_access/list_of_access">
                        <i class="fas fa-fw fa-user-secret"></i>
                        <?php language_content("Droits des utilisateurs", "User Rights") ?>
                    </a>
                </div>
            </div>
        </li>

    </div>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        <?php language_content("En plus", "Add-on") ?>
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="Guide d'utilisation.pdf">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span><?php language_content("Mode d'emploi", "Instructions for use") ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="admin2.php?page=views/admin2/suggestion">
            <i class="fas fa-fw fa-table"></i>
            <span><?php language_content("Suggestions", "Suggestions") ?></span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->