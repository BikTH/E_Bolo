<h1 class="h3 mb-2 mt-3 text-light"><i class="fas fa-fw fa-user-secret"></i><?= language_content("Droits d'accès", "Right of access") ?></h1>



<!-- DataTales Example -->
<div class="card bg-transparent shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0  text-dark"></i><?= language_content(" Modèles de Droits d'accès", "Rights of Access's template") ?></h6>
            </div>
            <div class="col-6 row justify-content-end">

                <!-- <a href="admin3.php?out=I" class="btn btn-info btn-sm float-right"> <i class="fas fa-plus-circle"></i><?= language_content(" Créer un nouveau Modèle", " Create a new template") ?></a> -->

                <a href="admin3.php?page=views/admin3/right_of_access/create_template" class="btn btn-info btn-sm float-right"> <i class="fas fa-plus-circle"></i><?= language_content(" Créer un nouveau Modèle", " Create a new template") ?></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center"> <?php language_content("Nom du modèle", "Template's name") ?></th>
                        <th class="text-center"> <?php language_content("Description", "Description") ?></th>
                        <th class="text-center"> <?php language_content("Attribué à", "attribuated at") ?></th>
                        <th class="text-center"> <?php language_content("Ajouté par", "Add By") ?></th>
                        <th class="text-center"> <?php language_content("Ajouté le", "Add At") ?></th>
                        <th class="text-center"> <?php language_content("Détails", "Details") ?></th>
                        <th class="text-center"> <?php language_content("Options", "Options") ?></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>

                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $compt = 1;
                    $com = 1;
                    $lists = list_of_access($_SESSION["user_company"], $db);
                    while ($list = mysqli_fetch_assoc($lists)) :
                    ?>
                        <tr class="text-light">
                            <td class="text-center">
                                <?= $list["name"] ?>
                            </td>
                            <td class="text-center">
                                <?= $list["description"] ?>
                            </td>
                            <td class="text-center">
                                <?= mysqli_num_rows(attribuated_at($list["access_id"], $db)) == 0 ? "0" : mysqli_num_rows(attribuated_at($list["access_id"], $db)) ?><?= " " . language_content(" employé(s)", " employee(s)") ?>
                                <?php if ($list["a1"] == 1) : ?>
                                    <a class="btn btn-outline-info btn-sm" href="#" data-toggle="modal" data-target="#template<?= $com ?>"> <i class="fas fa-eye"></i> </a>
                                <?php endif; ?>
                                <div id="template<?= $com ?>" class="modal fade delete-modal" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-gradient-dark">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?= language_content("modèle: ", "Template: ") . $list["name"] ?></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="dataTable2" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center"> <?php language_content("Nom", "Name") ?></th>
                                                                <th class="text-center"> <?php language_content("Email", "Email") ?></th>
                                                                <th class="text-center"> <?php language_content("Poste", "Poste") ?></th>
                                                                <th class="text-center"> <?php language_content("Direction", "Direction") ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>

                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            <?php
                                                            $lix = attribuated_at($list["access_id"], $db);
                                                            while ($user = mysqli_fetch_assoc($lix)) :
                                                            ?>
                                                                <tr class="text-light">
                                                                    <td class="text-center">
                                                                        <?= $user["userName"] . " " . $user["userPrename"] ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?= $user["userEmail"] ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?= user_poste($user["userId"], $db) ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?= user_direction($user["userId"], $db) ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            endwhile; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer m-auto">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Fermer", "Close") ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <?= user_name_poste($list["userId"], $db) ?>
                            </td>
                            <td class="text-center">
                                <?= date_formatter($list['accessCreatedAt'], 'd M Y') . " à " . date_formatter($list['accessCreatedAt'], 'h:i:s')  ?>
                            </td>
                            <td class="text-center">
                                <?php if ($test["a1"] == 1) : ?>
                                    <a href="admin3.php?page=controllers/admin3/right_of_access/details_of_access_controller&access_id=<?= $list["access_id"] ?>" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i></a>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="row">
                                    <div class="col-6">
                                        <?php if ($test["a2"] == 1) : ?>
                                            <a class=" btn rounded-circle" href="admin3.php?page=controllers/admin3/right_of_access/edit_access_controller&access_id1=<?= $list["access_id"] ?>"> <i class="fas fa-pen text-light"></i> </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6">
                                        <?php if ($test["a4"] == 1) : ?>
                                            <a class="btn rounded-circle" href="#" data-toggle="modal" data-target="#delete_template<?= $compt ?>"> <i class="fas fa-trash text-danger"></i> </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div id="delete_template<?= $compt ?>" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-gradient-dark">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Supprimer un Modèle", "Delete a template") ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="public/images/sent.png" alt="" width="50" height="46">
                                        <h3><?= language_content("Etes-vous sûr de vouloir Supprimer le modèle: ", "Do you really want to delete template name: ") ?> "<?= $list["name"] ?>" </h3>
                                    </div>
                                    <div class="modal-footer m-auto">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                                        <a class="btn btn-danger" href="admin3.php?page=controllers/admin3/right_of_access/delete_access_controller&access_id=<?= $list["access_id"] ?>"><?php language_content("Supprimer", "Delete") ?></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php
                        $com += 1;
                        $compt += 1;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>