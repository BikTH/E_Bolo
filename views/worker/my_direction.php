<?php
$list = info_direction($db);
?>
<div class="content m-5">
    <div class="row justify-content-center my-3">
        <h4 class="page-title"><?= "\"" . $list["directionName"] . "\"" ?> </h4>
    </div>
    <hr class="text-light">
    <hr class="text-light">
    <?php include 'views/others/errors.php' ?>

    <div class="row">

        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-0">

        </div>

        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-12">
            <div class="table-responsive mt-3">
                <table class="table table-striped" width="100%" cellspacing="0">
                    <thead>
                        <!-- <a href="worker.php?page=views/worker/directions/add_employee_to_direction&direction_id=<?= $list['directionId'] ?>" class=" rounded-left btn btn-danger btn-sm"><i class="fas fa-fw fa-backspace"></i> <?php language_content("  Retirer ", "  Retrieve ") ?> </a>
                        <a href="worker.php?page=views/worker/directions/add_employee_to_direction&add_employee&direction_id=<?= $list['directionId'] ?>" class=" rounded-right btn btn-info btn-sm"><?php language_content(" Ajouter  ", " Add  ") ?><i class="fas fa-fw fa-plus-circle"></i> </a> -->

                        <tr class="text-secondary">
                            <th class="text-center"><?php language_content("Nom", "Name") ?></th>
                            <th class="text-center"><?php language_content("Directeur", "Director") ?></th>
                            <th class="text-center"><?php language_content("Créer le", "Create At") ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-light">
                            <td class="text-center">
                                <?= $list["directionName"] ?>
                            </td>
                            <td class="text-center">
                                <?= user_name_poste($list["directionAdmin"], $db) ?>
                            </td>
                            <td class="text-center">
                                <?= date_formatter($list['directionCreatedAt'], 'd M Y') . " à " . date_formatter($list['directionCreatedAt'], 'h:i:s')  ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive mt-5">
                <h3 class="mb-2"><?= language_content("Liste des Membres", "List of members") ?></h3>
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-light">
                            <th><i class="fas fa-fw fa-user"></i><?php language_content("Nom", "Name") ?></th>
                            <th><i class="fa fa-picture-o" aria-hidden="true"></i><?php language_content("Photo", "Picture") ?></th>
                            <th><i class="fas fa-fw fa-key"></i><?php language_content("Droits d'accès", "Right of access") ?></th>
                            <th><i class="fas fa-fw fa-check-square"></i><?php language_content("Options", "options") ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-light">
                            <th><i class="fas fa-fw fa-user"></i><?php language_content("Nom", "Name") ?></th>
                            <th><i class="fas fa-fw fa-picture-o"></i><?php language_content("Photo", "Picture") ?></th>
                            <th><i class="fas fa-fw fa-key"></i><?php language_content("Droits d'accès", "Right of access") ?></th>
                            <th><i class="fas fa-fw fa-check-square"></i><?php language_content("Options", "options") ?></th>
                        </tr>
                    </tfoot>
                    <!-- <tfoot>
                        <tr class="text-center">
                            <td colspan="4">
                                <a href="worker.php?page=views/worker/directions/add_employee_to_direction&add_employee&direction_id=<?= $list['directionId'] ?>" class=" btn btn-secondary text-light col-md-4"><?php language_content(" Ajouter  ", " Add  ") ?><i class="fas fa-fw fa-plus-circle"></i> </a>
                            </td>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        <?php
                        $list_user = list_of_direction_employee($_SESSION["user_direction"], $_SESSION["user_company"], $db);
                        while ($list = mysqli_fetch_assoc($list_user)) :
                        ?>
                            <tr class="text-light">
                                <td class="text-center">
                                    <?= $list['userName'] . " " . $list['userPrename']  ?>
                                </td>
                                <td class="text-center">
                                    <img class="img-profile rounded-circle box-shadow" width="40" height="40" src="<?= user_avatar_by_id2($list, $db) ?>">
                                </td>
                                <td class="text-center">
                                    <?= user_access($list["userId"], $db)  ?>
                                </td>
                                <td class="text-center">
                                    <a href="worker.php?page=controllers/worker/directions/add_employee_to_direction_controller&direction=<?= $_SESSION["user_direction"] ?>&employee=<?= $list["userId"] ?>" class="btn btn-danger"><i class="fas fa-fw fa-backspace"></i><?php language_content(" Retirer", " Retrieve") ?></button>
                                        <?php if ($_SESSION["user_id"] != $list["userId"]) : ?>
                                            <a href="worker.php?page=controllers/worker/chat/message-detail-controller&user_id=<?=$list["userId"] ?>" class="btn btn-info"><?= language_content("Ecrire ","Write ")?><i class="fas fa-fw fa-comments"></i></a>
                                        <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive mt-5">
                <h3 class="mb-2"><?= language_content("Fichiers de la direction", "Direction's files") ?></h3>
                <table class="table table-bordered table-striped" id="dataTable1" width="100%" cellspacing="0">
                    <thead class="text-light">
                        <tr>
                            <th><?php language_content("Nom", "Name") ?></th>
                            <th><?php language_content("Type de Fichier", "Type of file") ?></th>
                            <th></i><?php language_content("Créer par:", "Created By") ?></th>
                            <th><?php language_content("Dernière Mise à jour", "Last Update") ?></th>
                            <th><?php language_content("Options", "Options") ?></th>
                        </tr>
                    </thead>
                    <tfoot class="text-light">
                        <tr>
                            <th><i class="fas fa-fw fa-user"></i><?php language_content("Nom", "Name") ?></th>
                            <th><i class="fas fa-fw fa-user"></i><?php language_content("Type de Fichier", "Type of file") ?></th>
                            <th><i class="fas fa-fw fa-picture-o"></i><?php language_content("Créer par:", "Created By") ?></th>
                            <th><i class="fas fa-fw fa-key"></i><?php language_content("Dernière Mise à jour", "Last Update") ?></th>
                            <th><i class="fas fa-fw fa-check-square"></i><?php language_content("Options", "Options") ?></th>
                        </tr>
                    </tfoot>
                    <!-- <tfoot>
                        <tr class="text-center">
                            <td colspan="4">
                                <a class="btn btn-secondary text-light col-md-4" href="worker.php?page=views/worker/directions/list_directions"><?php language_content("Passer ", "Skip ") ?><i class="fas fa-fw fa-arrow-circle-right"></i></a>
                            </td>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        <?php
                        $list_user = details_of_files($_SESSION["user_direction"], $db);
                        while ($list = mysqli_fetch_assoc($list_user)) :
                        ?>
                            <tr class="text-light">
                                <td class="text-center">
                                    <?php $info = new SplFileInfo($list["fileName"]); ?>
                                    <?= $info->getFilename() ?>
                                </td>
                                <td class="text-center">
                                    <?php $info = new SplFileInfo($list["filePosition"]); ?>

                                    <img class="float-left" src="<?= type_of_file($info->getExtension()) ?>" alt="000" width="100" height="100" class="text-center">
                                    <p class="text-center">
                                        <?= name_of_type($info->getExtension()) ?>
                                    </p>
                                    <?php if (name_of_type($info->getExtension()) == "PDF" || name_of_type($info->getExtension()) == "IMAGE") : ?>
                                        <a href="worker.php?page=controllers\worker\files_worker\preview_file_controller&file_id=<?= $list['fileId'] ?>" class="btn btn-light btn-sm float-right"> <i class="fas fa-fw fa-eye"></i></a>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?= user_name_poste($list["userId"], $db) ?>
                                </td>
                                <td class="text-center">
                                    <?= date_formatter($list['fileUpdatedAt'], 'd M Y') . " à " . date_formatter($list['fileUpdatedAt'], 'h:i:s')  ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= $list["filePosition"] ?>" download class="btn btn-outline-warning "> <i class="fas fa-fw fa-download"></i> </a>
                                    <a href="worker.php?page=controllers/worker/files_worker/share_files_controller&file_id=<?= $list['fileId'] ?>" class="btn btn-outline-success text-success"> <i class="fas fa-fw fa-share-alt"></i> </a>

                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-0">

        </div>

    </div>
</div>