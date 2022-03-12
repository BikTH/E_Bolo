<div class="content m-5">
    <div class="row justify-content-center my-3">
        <h4 class="page-title"><?= language_content("Employé: \"", "Employee: \"") ?><?= $list["userName"] . "\"" ?> </h4>
    </div>
    <hr class="text-light">
    <hr class="text-light">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <a href="admin2.php?page=controllers/admin2/directions/direction_edit_controller&direction_id=<?= $list['directionId'] ?>" class="btn btn-outline-success btn-sm text-success"> <?php language_content("Modifier ", "Edit ") ?> <i class="fas fa-fw fa-pen"></i> </a>
        </div>
        <div class="col-6 text-center">
            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete_direction"><i class="fas fa-fw fa-trash"></i> <?php language_content("Supprimer", "Delete") ?></a>
            <div id="delete_direction" class="modal fade delete-modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-gradient-dark">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Supprimer une Direcction", "Delete a Direction") ?></h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="public/images/sent.png" alt="" width="50" height="46">
                            <h3><?= language_content("Etes-vous sûr de vouloir Supprimer Cette Direction: ", "Do you really want to delete this Direction: ") ?> "<?= $list["directionName"] ?>" </h3>
                        </div>
                        <div class="modal-footer m-auto">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                            <a class="btn btn-danger" href="admin2.php?page=controllers/admin2/directions/delete_direction_controller&direction_id=<?= $list["directionId"] ?>&direction_user=<?= $list["directionAdmin"] ?>"><?php language_content("Supprimer", "Delete") ?></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include 'views/others/errors.php' ?>

    <div class="row">

        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-0">

        </div>

        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-12">
            <div class="table-responsive mt-3">
                <table class="table table-striped" width="100%" cellspacing="0">
                    <thead>
                        <!-- <a href="admin2.php?page=views/admin2/directions/add_employee_to_direction&direction_id=<?= $list['directionId'] ?>" class=" rounded-left btn btn-outline-danger btn-sm"><i class="fas fa-fw fa-backspace"></i> <?php language_content("  Retirer ", "  Retrieve ") ?> </a>
                        <a href="admin2.php?page=views/admin2/directions/add_employee_to_direction&add_employee&direction_id=<?= $list['directionId'] ?>" class=" rounded-right btn btn-outline-info btn-sm"><?php language_content(" Ajouter  ", " Add  ") ?><i class="fas fa-fw fa-plus-circle"></i> </a> -->

                        <tr>
                            <th class="text-center"><?php language_content("Nom", "Name") ?></th>
                            <th class="text-center"><?php language_content("Directeur", "Director") ?></th>
                            <th class="text-center"><?php language_content("Créer le", "Create At") ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <?= $list["directionName"] ?>
                            </td>
                            <td class="text-center">
                                <?= user_name_poste($list["userId"], $db) ?>
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
                        <tr>
                            <th><i class="fas fa-fw fa-user"></i><?php language_content("Nom", "Name") ?></th>
                            <th><i class="fas fa-fw fa-picture-o"></i><?php language_content("Photo", "Picture") ?></th>
                            <th><i class="fas fa-fw fa-key"></i><?php language_content("Droits d'accès", "Right of access") ?></th>
                            <th><i class="fas fa-fw fa-check-square"></i><?php language_content("Options", "options") ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="4">
                                <a href="admin2.php?page=views/admin2/directions/add_employee_to_direction&add_employee&direction_id=<?= $list['directionId'] ?>" class=" btn btn-secondary text-light col-md-4"><?php language_content(" Ajouter  ", " Add  ") ?><i class="fas fa-fw fa-plus-circle"></i> </a>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $list_user = list_of_direction_employee($direction_id, $_SESSION["user_company"], $db);
                        while ($list = mysqli_fetch_assoc($list_user)) :
                        ?>
                            <tr class="text-info">
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
                                    <a href="admin2.php?page=controllers/admin2/directions/add_employee_to_direction_controller&direction=<?= $direction_id ?>&employee=<?= $list["userId"] ?>" class="btn btn-danger col-md-4"><i class="fas fa-fw fa-backspace"></i><?php language_content(" Retirer", " Retrieve") ?></button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive mt-5">
                <h3 class="mb-2"><?= language_content("Fichiers de la direction", "Direction's files") ?></h3>
                <table class="table table-bordered table-striped" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><i class="fas fa-fw fa-user"></i><?php language_content("Nom", "Name") ?></th>
                            <th><i class="fas fa-fw fa-picture-o"></i><?php language_content("Créer par:", "Created By") ?></th>
                            <th><i class="fas fa-fw fa-key"></i><?php language_content("Dernière Mise à jour", "Last Update") ?></th>
                            <th><i class="fas fa-fw fa-check-square"></i><?php language_content("Consulter", "Consult") ?></th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr class="text-center">
                            <td colspan="4">
                                <a class="btn btn-secondary text-light col-md-4" href="admin2.php?page=views/admin2/directions/list_directions"><?php language_content("Passer ", "Skip ") ?><i class="fas fa-fw fa-arrow-circle-right"></i></a>
                            </td>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        <?php
                        $list_user = details_of_files($direction_id, $db);
                        while ($list = mysqli_fetch_assoc($list_user)) :
                        ?>
                            <tr class="text-info">
                                <td class="text-center">
                                    <?= $list['fileName'] ?>
                                </td>
                                <td class="text-center">
                                    <?= user_name_poste($list["userId"], $db) ?>
                                </td>
                                <td class="text-center">
                                    <?= date_formatter($list['fileUpdatedAt'], 'd M Y') . " à " . date_formatter($list['fileUpdatedAt'], 'h:i:s')  ?>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success col-md-4"><i class="fas fa-fw fa-plus-circle"></i><?php language_content(" Ajouter", " Add") ?></button>
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