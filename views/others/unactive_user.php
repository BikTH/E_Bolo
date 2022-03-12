<style>
    #content {
        background-color: #fefcff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg %3E%3Cpath fill='%23dad5dd' d='M486 705.8c-109.3-21.8-223.4-32.2-335.3-19.4C99.5 692.1 49 703 0 719.8V800h843.8c-115.9-33.2-230.8-68.1-347.6-92.2C492.8 707.1 489.4 706.5 486 705.8z'/%3E%3Cpath fill='%23b6b0bc' d='M1600 0H0v719.8c49-16.8 99.5-27.8 150.7-33.5c111.9-12.7 226-2.4 335.3 19.4c3.4 0.7 6.8 1.4 10.2 2c116.8 24 231.7 59 347.6 92.2H1600V0z'/%3E%3Cpath fill='%23948c9c' d='M478.4 581c3.2 0.8 6.4 1.7 9.5 2.5c196.2 52.5 388.7 133.5 593.5 176.6c174.2 36.6 349.5 29.2 518.6-10.2V0H0v574.9c52.3-17.6 106.5-27.7 161.1-30.9C268.4 537.4 375.7 554.2 478.4 581z'/%3E%3Cpath fill='%23736a7d' d='M0 0v429.4c55.6-18.4 113.5-27.3 171.4-27.7c102.8-0.8 203.2 22.7 299.3 54.5c3 1 5.9 2 8.9 3c183.6 62 365.7 146.1 562.4 192.1c186.7 43.7 376.3 34.4 557.9-12.6V0H0z'/%3E%3Cpath fill='%2354495f' d='M181.8 259.4c98.2 6 191.9 35.2 281.3 72.1c2.8 1.1 5.5 2.3 8.3 3.4c171 71.6 342.7 158.5 531.3 207.7c198.8 51.8 403.4 40.8 597.3-14.8V0H0v283.2C59 263.6 120.6 255.7 181.8 259.4z'/%3E%3Cpath fill='%234e4557' d='M1600 0H0v136.3c62.3-20.9 127.7-27.5 192.2-19.2c93.6 12.1 180.5 47.7 263.3 89.6c2.6 1.3 5.1 2.6 7.7 3.9c158.4 81.1 319.7 170.9 500.3 223.2c210.5 61 430.8 49 636.6-16.6V0z'/%3E%3Cpath fill='%2348414e' d='M454.9 86.3C600.7 177 751.6 269.3 924.1 325c208.6 67.4 431.3 60.8 637.9-5.3c12.8-4.1 25.4-8.4 38.1-12.9V0H288.1c56 21.3 108.7 50.6 159.7 82C450.2 83.4 452.5 84.9 454.9 86.3z'/%3E%3Cpath fill='%23423e46' d='M1600 0H498c118.1 85.8 243.5 164.5 386.8 216.2c191.8 69.2 400 74.7 595 21.1c40.8-11.2 81.1-25.2 120.3-41.7V0z'/%3E%3Cpath fill='%233c3a3e' d='M1397.5 154.8c47.2-10.6 93.6-25.3 138.6-43.8c21.7-8.9 43-18.8 63.9-29.5V0H643.4c62.9 41.7 129.7 78.2 202.1 107.4C1020.4 178.1 1214.2 196.1 1397.5 154.8z'/%3E%3Cpath fill='%23363636' d='M1315.3 72.4c75.3-12.6 148.9-37.1 216.8-72.4h-723C966.8 71 1144.7 101 1315.3 72.4z'/%3E%3C/g%3E%3C/svg%3E");
        background-attachment: fixed;
        background-size: cover;
    }
</style>

<div id="wrapper">

    <!-- Sidebar -->
    <!-- page de navigation à gauchee de la page -->
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

        <div class="collapse show" id="collapseExample">

            <!-- My Files -->
            <div class="sidebar-heading">
                <?php language_content("Mes Fichiers", "My Files") ?>
            </div>

            <!-- Nav Item - View Files -->
            <li class="nav-item">
                <a class="nav-link" href="#">
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
                        <a class="collapse-item text-light" href="#">
                            <i class="fas fa-fw fa-upload"></i>
                            <?php language_content("Mettre en ligne", "Upload") ?>
                        </a>
                        <a class="collapse-item text-light" href="#">
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

            <li class="nav-item text-light">

                <!-- Messages -->
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-comments"></i>
                    <span><?php language_content("Messages", "Messages") ?></span>
                </a>

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
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-map-marked"></i>
                    <span><?php language_content("Carte", "Map") ?></span>
                </a>
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
            <a class="nav-link" href="index.php?page=views/others/suggestion2">
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
    <!-- End of Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" class="body2 text-light">

            <!-- Topbar -->
            <!-- navbar de la page  -->
            <?php include('views/navbar/navbar_unactive_user.php') ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <!-- contenus de la page  -->
            <div class="container-fluid ">

                <?php
                include 'views/others/errors.php';
                ?>

                <div class="text-center">
                    <div class="row justify-content-center mb-5">
                        <div class="error my-auto  text-uppercase text-" data-text="<?php language_content("BLOQUER", "BLOCK") ?>"><?php language_content("BLOQUER", "BLOCK") ?></div>
                    </div>
                    <div class="row justify-content-center">
                        <p class="lead text-light-800 mb-2"><?php language_content("Votre compte est actuellement inactif", "Your account is currently inactive") ?></p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="text-light-500 mb-3"><?php language_content("Pour régler ce problème veuillez contacter votre administrateur pour qu'il active votre compte", "To solve this problem please contact your director to activate your account") ?></p>
                    </div>

                    <div class="row justify-content-center">

                        <div class="col-xl-10 col-lg-12 col-md-9">

                            <div class="card bg-transparent text-sendary o-hidden border-0 shadow-lg ">

                                <div class="card-body bg-transparent justify-content-center p-0">

                                    <div class="row mb-3">

                                        <!--Grid column-->
                                        <div class="col-md-12 mb-md-0 mb-5 ">
                                            <form class="user m-3" id="contact-form" name="contact-form" action="index.php?page=controllers/other/contact_controller" method="POST">
                                                <!--Grid row-->
                                                <container>
                                                    <fieldset disabled>
                                                        <div class="row">

                                                            <!--Grid column-->
                                                            <div class="col-md-6 mb-2">
                                                                <label for="name" class="">
                                                                    <?php if (what_langauge() == 0) : ?>
                                                                        Votre Nom
                                                                    <?php else : ?>
                                                                        Your Name
                                                                    <?php endif; ?>
                                                                </label>
                                                                <input type="text" id="name" name="name" class="form-control form-control-user bg-transparent text-light" value="<?= $_SESSION["user_name"] . " " . $_SESSION["user_prename"] ?>" required>
                                                            </div>
                                                            <!--Grid column-->

                                                            <!--Grid column-->
                                                            <div class="col-md-6 mb-md-2">
                                                                <label for="email" class=""><?php if (what_langauge() == 0) : ?>
                                                                        Votre Adresse Email
                                                                    <?php else : ?>
                                                                        Your Email Address
                                                                    <?php endif; ?></label>
                                                                <input type="text" id="email" name="email" class="form-control form-control-user bg-transparent text-light" value="<?= $_SESSION["user_email"] ?>" required>
                                                            </div>
                                                            <!--Grid column-->

                                                        </div>

                                                        <!--Grid row-->

                                                        <!--Grid row-->
                                                        <div class="row my-2">
                                                            <div class="col-md-12">
                                                                <div class="md-form mb-0">
                                                                    <label for="subject" class="">
                                                                        <?php if (what_langauge() == 0) : ?>
                                                                            Sujet
                                                                        <?php else : ?>
                                                                            Subject
                                                                        <?php endif; ?>
                                                                    </label>
                                                                    <input value="Demande d'activation de compte" type="text" id="subject" name="subject" class="form-control form-control-user bg-transparent text-light" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Grid row-->
                                                    </fieldset>

                                                    <!--Grid row-->
                                                    <div class="row">

                                                        <!--Grid column-->
                                                        <div class="col-md-12">

                                                            <div class="md-form mb-sm-2">
                                                                <label for="message">
                                                                    <?php if (what_langauge() == 0) : ?>
                                                                        Votre Message
                                                                    <?php else : ?>
                                                                        Your Message
                                                                    <?php endif; ?>
                                                                </label>
                                                                <input type="hidden" name="name" value="<?= $_SESSION["user_name"] . " " . $_SESSION["user_prename"] ?>">
                                                                <input type="hidden" name="email" value="<?= $_SESSION["user_email"] ?>">
                                                                <input type="hidden" name="subject" value="Demande d'activation de compte">
                                                                <textarea value="<? $data['message'] ?? '' ?>" type="text" id="message" name="message" rows="2" class="form-control form-control-user bg-transparent text-light md-textarea" required></textarea>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--Grid row-->
                                                </container>
                                                <div class="row mt-2">
                                                    <div class="col offset-sm-3">
                                                        <button name="submit_contact" type="submit" class="btn btn-info btn-user btn-block">
                                                            <i class="fab fa-sign-in "></i>
                                                            <?php if (what_langauge() == 0) : ?>
                                                                ENVOYER
                                                            <?php else : ?>
                                                                SEND
                                                            <?php endif; ?>
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-3"></div>
                                                </div>

                                            </form>
                                        </div>
                                        <!--Grid column-->

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- End of Main Content -->
        <!-- fin du contenus de la page  -->
    </div>

</div>
<!-- End of Content Wrapper -->

</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-gradient-dark">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5> -->
                <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Voulez vous vous déconnecter ?", "Do you want to logout ?") ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div> -->
            <div class="modal-body"><?php language_content("sélectionnez \"Déconnexion\" si vous souhaitez vraiment vous déconnecter.", " Select \"Logout\" if you really wish to Logout") ?></div>
            <div class="modal-footer">
                <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                <a class="btn btn-primary" href="index.php?page=controllers/users/logout_controller&close_session=1"><?php language_content("Déconnexion", "Logout") ?></a>
            </div>
        </div>
    </div>
</div>

</div>