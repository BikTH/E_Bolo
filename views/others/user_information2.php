


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
                
                <div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item"> <a href="" data-target="#profile" data-toggle="tab" class="nav-link active"> <i class="fas fa-user"></i> <?php language_content("Informations", "Informations") ?></a> </li>
                <li class="nav-item"> <a href="" data-target="#messages" data-toggle="tab" class="nav-link"> <i class="fas fa-user-edit"></i> <?php language_content("Modifier informations", "Edit informations") ?></a> </li>
                <li class="nav-item"> <a href="" data-target="#edit" data-toggle="tab" class="nav-link"> <i class="fas fa-user-cog"></i> <?php language_content("Paramètres", "Settings") ?></a> </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <form class="user" method="post">
                        <fieldset disabled>
                            <div class="text-right">
                                <h1 class="h6 text-Secondary-900 text-capitalize mb-1 mt-4">
                                    <?php if (what_langauge() == 0) : ?>
                                        Informations Personelles
                                    <?php else : ?>
                                        Personal informations
                                    <?php endif; ?>
                                </h1>
                            </div>
                            <div class=" form-group row ">
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-sm-0">
                                        <label for="name"><?php language_content("Nom", "First Name") ?></label>
                                        <input id="name" type="text" value="<?= $_SESSION['user_name'] ?>" class="form-control form-control-user bg-dark text-light">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-sm-0">
                                        <label for="prename"><?php language_content("Prénom", "Last Name") ?></label>
                                        <input id="prename" type="text" value="<?= $_SESSION['user_prename'] ?>" class="form-control form-control-user bg-dark text-light">
                                    </div>
                                </div>

                            </div>

                            <div class=" form-group row ">
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-sm-0">
                                        <label for=" contact "><?php language_content("Téléphone", "Phone-Number") ?></label>
                                        <input id=" contact " value="<?= $_SESSION['user_phone'] ?>" type="text" class="form-control form-control-user bg-dark text-light">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-sm-0">
                                        <label for=" gender "><?php if (what_langauge() == 0) : ?>Genre<?php else : ?>Gender<?php endif; ?></label>
                                        <input id=" contact " value="<?= $_SESSION['user_gender'] ?>" type="text" class="form-control form-control-user bg-dark text-light">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=" birthday "><?php language_content("Date de Naissance", "Birthday") ?></label>
                                <input id=" birthday " value="<?= date_formatter($_SESSION['user_birthday'], ' j M Y')   ?>" type="text" class="form-control form-control-user bg-dark text-light">
                            </div>

                            <div class="row mt-0 mb-0">
                                <div class=" col offset-xl-2">
                                    <hr class="border border-info">
                                </div>
                                <div class="col-xl-2"></div>
                            </div>

                            <div class="form-group">
                                <label for=" email "><?php if (what_langauge() == 0) : ?>Adresse Email<?php else : ?>Email Adress<?php endif; ?></label>
                                <input id=" email " value="<?= $_SESSION['user_email'] ?>" type="text" class="form-control form-control-user bg-dark text-light">
                            </div>
                        </fieldset>

                    </form>

                    <!--/row-->
                </div>
                <div class="tab-pane" id="messages">
                    <div class="row justify-content-end">
                        <p><?php language_content("Modifiez les champs que vous souhaitez changer !", " ") ?> </p>
                    </div>
                    <form class="user" enctype="multipart/form-data" method="post" action="admin2.php?page=controllers/admin2/user_information_controller">
                        <div class="text-right">
                            <h1 class="h6 text-Secondary-900 text-capitalize mb-1 mt-4">
                                <?php if (what_langauge() == 0) : ?>
                                    Informations Personelles
                                <?php else : ?>
                                    Personal informations
                                <?php endif; ?>
                            </h1>
                        </div>
                        <div class=" form-group row ">
                            <div class="col-sm-6">
                                <div class="mb-3 mb-sm-0">
                                    <label for="name"><?php language_content("Nom", "First Name") ?></label>
                                    <input id="name" type="text" name="name" value="<?= $data['name'] ?? $_SESSION["user_name"] ?>" class="form-control form-control-user bg-dark text-light" placeholder="<?= $_SESSION["user_name"] ?>" required>
                                    <div class="invalid-feedback">
                                        <?php language_content("Entrez un nom valide!", "Valide First Name!") ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 mb-sm-0">
                                    <label for="prename"><?php language_content("Prénom", "Last Name") ?></label>
                                    <input id="prename" type="text" name="prename" value="<?= $data['prename'] ?? $_SESSION["user_prename"] ?>" class="form-control form-control-user bg-dark text-light" placeholder="<?= $_SESSION["user_prename"] ?>" required>
                                    <div class="invalid-feedback">
                                        <?php language_content("Entrez un prénom valide!", "Valide last name!") ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class=" form-group row ">
                            <div class="col-sm-6">
                                <div class="mb-3 mb-sm-0">
                                    <label for=" contact "><?php language_content("Téléphone", "Phone-Number") ?></label>
                                    <input id=" contact " pattern="+237[0-9]{9}" name="phone" value="<?= $data['phone'] ?? $_SESSION["user_phone"] ?>" type="text" class="form-control form-control-user bg-dark text-light" placeholder="<?= $_SESSION["user_phone"] ?>" required>
                                    <div class="invalid-feedback">
                                        <?php language_content("Entrez un Numéro valide !", "Incorrect Phone Number!") ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 mb-sm-0">
                                    <label for=" gender "><?php if (what_langauge() == 0) : ?>Sex<?php else : ?>Sex<?php endif; ?></label>
                                    <select required name="gender" class="custom-select user bg-dark text-light " id="gender">
                                        <?php if ($_SESSION["user_gender"] === "Masculin") : ?>
                                            <option <?= (isset($data['gender'])) && $data['gender'] === "Masculin" ? 'selected' : '' ?> value="Masculin"><?php if (what_langauge() == 0) : ?>Masculin<?php else : ?>Male<?php endif; ?></option>
                                            <option <?= (isset($data['gender'])) && $data['gender'] === "Feminin" ? 'selected' : '' ?> value="Feminin"><?php if (what_langauge() == 0) : ?>Feminin<?php else : ?>Female<?php endif; ?></option>
                                        <?php else : ?>
                                            <option <?= (isset($data['gender'])) && $data['gender'] === "Feminin" ? 'selected' : '' ?> value="Feminin"><?php if (what_langauge() == 0) : ?>Feminin<?php else : ?>Female<?php endif; ?></option>
                                            <option <?= (isset($data['gender'])) && $data['gender'] === "Masculin" ? 'selected' : '' ?> value="Masculin"><?php if (what_langauge() == 0) : ?>Masculin<?php else : ?>Male<?php endif; ?></option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=" birthday "><?php language_content("Date de Naissance", "Birthday") ?></label>
                            <input min="1920-01-01" id=" birthday " name="birthday" value="<?= $data['birthday'] ?? $_SESSION["user_birthday"] ?>" type="date" class="form-control form-control-user bg-dark text-light" required>
                            <div class="invalid-feedback">
                                <?php language_content("Entrez une Date valide !", "Incorrect Birthday!") ?>
                            </div>
                        </div>

                        <div class="row mt-0 mb-0">
                            <div class=" col offset-xl-2">
                                <hr class="border border-info"> 
                            </div>
                            <div class="col-xl-2"></div>
                        </div>

                        <div class="text-right">
                            <h1 class="h6 text-Secondary-900 text-capitalize mb-1 mt-4"><?php if (what_langauge() == 0) : ?>Informations de Connexion<?php else : ?> Login Informations<?php endif; ?></h1>
                        </div>
                        <div class="form-group">
                            <label for=" email "><?php if (what_langauge() == 0) : ?>Adresse Email<?php else : ?>Email Adress<?php endif; ?></label>
                            <input id=" email " name="email" value="<?= $data['email'] ?? $_SESSION["user_email"] ?>" type="text" class="form-control form-control-user bg-dark text-light" placeholder="<?= $_SESSION["user_email"] ?>" required>
                            <div class="invalid-feedback">
                                <?php language_content("Entrez un Email Valide !", "Incorrect Email!") ?>
                            </div>
                        </div>
                        <div class=" form-group row ">
                            <div class="col-sm-6">
                                <div class="mb-3 mb-sm-0">
                                    <button type="reset" class="btn btn-secondary btn-user btn-block mt-2">
                                        <i class="fas fa-edit"></i> <?php if (what_langauge() == 0) : ?>Annuler<?php else : ?>Cancel<?php endif; ?>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 mb-sm-0">
                                    <button name="submit_update_informations_user" type="submit" class="btn btn-success btn-user btn-block mt-2">
                                        <i class="fas fa-edit"></i> <?php if (what_langauge() == 0) : ?>Enregistrer les Modifications<?php else : ?>Save changes<?php endif; ?>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="edit">
                    <div class="container-fluid">
                        <ul class="nav nav-tabs row justify-content-end">
                            <li class="nav-item"> <a href="" data-target="#mdp" data-toggle="tab" class="nav-link active"> <i class="fas fa-lock"></i> <?php language_content("Mot de passe", "Password") ?></a> </li>
                            <li class="nav-item"> <a href="" data-target="#lang" data-toggle="tab" class="nav-link"> <i class="fa fa-language"></i> <?php language_content("Langue par défaut", "Default Language") ?></a> </li>
                        </ul>
                        <div class="tab-content py-2">
                            <div class="tab-pane show active" id="mdp">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <h4 class="page-title"><?= language_content("Changer le mot de passe","Change password")?></h4>
                                        <form class="user" method="post" action="admin2.php?page=controllers/admin2/user_information_controller">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label><?= language_content("Ancien mot de passe","old password")?></label>
                                                        <input type="password" name="old_pw" value="<?= $data['old_pw'] ?? '' ?>" class="form-control form-control-user bg-dark text-light">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label><?= language_content("Nouveau mot de passe","New password")?></label>
                                                        <input type="password" name="new_pw" value="<?= $data['new_pw'] ?? '' ?>" class="form-control form-control-user bg-dark text-light">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label><?= language_content("Confirmer mot de passe","Confirm password")?></label>
                                                        <input type="password" name="confirm_new_pw" value="<?= $data['confirm_new_pw'] ?? '' ?>" class="form-control form-control-user bg-dark text-light">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 text-center m-t-20">
                                                    <button type="button" name="submit_update_pw" class="btn btn-primary submit-btn"><?= language_content("Modifier Mot de pass","Update password")?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="lang">
                                <?= language_content("Disponible bientot","Not avaible right now")?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="<?= user_avatar($db) ?>" id="preview_image" style="max-width: 100%; height: 300px; width: 300px;" class="mx-auto img-fluid img-circle rounded-circle d-block" alt="avatar">
            <h6 class="mt-2">
                <?php language_content("Vous pouvez modifier votre photo de profil", "You can change your avatar") ?>
            </h6>
            <form class="user" enctype="multipart/form-data" method="post" action="admin2.php?page=controllers/admin2/user_information_controller">
                <label class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="image" onchange="document.getElementById('preview_image').src = window.URL.createObjectURL(this.files[0])">
                    <div class="bg-gradient-dark box-shadow rounded">
                        <span class="custom-file-control "><?php language_content("Choisisez une photo", "Choose a file") ?></span>
                    </div>
                </label>
                <button name="submit_update_avatar" type="submit" class=" mt-2 btn btn-outline-dark btn-user">
                    <i class="fas fa-edit"></i> <?php if (what_langauge() == 0) : ?>Modifier<?php else : ?>Edit<?php endif; ?>
                </button>
            </form>
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