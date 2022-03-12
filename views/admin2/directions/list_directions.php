<h1 class="h3 mb-2 mt-3 text-light"><i class="fas fa-fw fa-users"></i><?= language_content("Directions", "Directions") ?></h1>

<!-- DataTales Example -->
<div class="card bg-transparent shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-dark"></i><?= language_content("Liste des Directions", "List of directions") ?></h6>
            </div>
            <div class="col-6 row justify-content-end">
                <a href="admin2.php?page=views/admin2/directions/add_direction" class="btn btn-info btn-sm float-right"><i class="fas fa-fw fa-plus-circle"></i><?php language_content("Ajouter une direction", "Add Direction") ?></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><?php language_content("Nom", "Name") ?></th>
                        <th><i class="fas fa-fw fa-user"></i><?php language_content("Directeur", "Director") ?></th>
                        <th><i class="fas fa-fw fa-users"></i><?php language_content("Nombre d'employés", "Number of employees") ?></th>
                        <th><i class="fas fa-fw fa-file"></i><?php language_content("Nombre de fichiers", "Number of files") ?></th>
                        <th><i class="fas fa-fw fa-plus-circle"></i><?php language_content("Date de création", "Creation's Date") ?></th>
                        <th><i class="fas fa-fw fa-plus"></i><?php language_content("Plus", "Plus") ?></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th><?php language_content("Nom", "Name") ?></th>
                        <th><i class="fas fa-fw fa-user"></i><?php language_content("Directeur", "Director") ?></th>
                        <th><i class="fas fa-fw fa-users"></i><?php language_content("Nombre d'employés", "Number of employees") ?></th>
                        <th><i class="fas fa-fw fa-file"></i><?php language_content("Nombre de fichiers", "Number of files") ?></th>
                        <th><i class="fas fa-fw fa-plus-circle"></i><?php language_content("Date de création", "Creation's Date") ?></th>
                        <th><i class="fas fa-fw fa-plus"></i><?php language_content("Plus", "Plus") ?></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $compt = 1;
                    $lists = list_directions($_SESSION["user_company"], $db);
                    while ($list = mysqli_fetch_assoc($lists)) :
                    ?>
                        <tr class="text-light">
                            <td class="align-middle">
                                <?= $list['directionName'] . " " ?>
                            </td>
                            <td class="align-middle">
                                <?= $list['userName'] . " " . $list['userPrename'] ?>
                                <a href="#" class=" float-right btn btn-secondary btn-sm" data-toggle="modal" data-target="#info_director<?= $compt ?>"> <i class="fas fa-fw fa-eye"></i> </a>
                            </td>
                            <td class="align-middle">
                                <?= number_of_employees($list["directionId"], $db)  ?>
                                <div class="float-right">
                                    <a href="admin2.php?page=views/admin2/directions/add_employee_to_direction&direction_id=<?= $list['directionId'] ?>" class=" rounded-left btn btn-danger btn-sm"><i class="fas fa-fw fa-backspace"></i> <?php language_content("  Retirer ", "  Retrieve ") ?> </a>
                                    <a href="admin2.php?page=views/admin2/directions/add_employee_to_direction&add_employee&direction_id=<?= $list['directionId'] ?>" class=" rounded-right btn btn-info btn-sm"><?php language_content(" Ajouter  ", " Add  ") ?><i class="fas fa-fw fa-plus-circle"></i> </a>
                                </div>
                            </td>
                            <td class="align-middle">
                                <?= number_of_files($list["directionId"], $db)  ?>
                            </td>
                            <td class="align-middle">
                                <?= date_formatter($list['directionCreatedAt'], 'd M Y') . " à " . date_formatter($list['userAddedAt'], 'h:i:s')  ?>
                            </td>
                            <td class="text-center">
                                <div class="">
                                    <a href="admin2.php?page=controllers/admin2/directions/direction_details_controller&direction_id=<?= $list['directionId'] ?>" class="btn btn-info btn-sm"> <i class="fas fa-fw fa-eye"></i></a>
                                    <a href="admin2.php?page=controllers/admin2/directions/direction_edit_controller&direction_id=<?= $list['directionId'] ?>" class="btn btn-success btn-sm "> <i class="fas fa-fw fa-pen"></i> </a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_direction<?= $compt ?>"><i class="fas fa-fw fa-trash"></i> </a>
                                </div>
                            </td>
                        </tr>
                        <div id="delete_direction<?= $compt ?>" class="modal fade delete-modal" role="dialog">
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
                        <div id="info_director<?= $compt ?>" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-gradient-dark">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Informations Directeur", "Director's Informations") ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="row m-4">
                                        <form class="user" method="post">
                                            <fieldset disabled>
                                                <div class=" form-group row ">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3 mb-sm-0">
                                                            <label for="name"><?php language_content("Nom", "First Name") ?></label>
                                                            <input id="name" type="text" value="<?= $list['userName'] . " " . $list['userPrename'] ?>" class="form-control form-control-user bg-transparent text-light">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 text-center">
                                                        <img class="img-profile rounded-circle" width="80" height="80" src="<?= user_avatar_by_id2($list, $db) ?>">
                                                    </div>
                                                </div>
                                                <div class=" form-group row ">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3 mb-sm-0">
                                                            <label for=" contact "><?php language_content("Téléphone", "Phone-Number") ?></label>
                                                            <input id=" contact " value="<?= $list['userPhone'] ?>" type="text" class="form-control form-control-user bg-transparent text-light">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3 mb-sm-0">
                                                            <label for=" gender "><?php if (what_langauge() == 0) : ?>Genre<?php else : ?>Gender<?php endif; ?></label>
                                                            <input id=" contact " value="<?= $list['userGender'] ?>" type="text" class="form-control form-control-user bg-transparent text-light">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for=" email "><?php if (what_langauge() == 0) : ?>Adresse Email<?php else : ?>Email Adress<?php endif; ?></label>
                                                    <input id=" email " value="<?= $list['userEmail'] ?>" type="text" class="form-control form-control-user bg-transparent text-light">
                                                </div>
                                            </fieldset>

                                        </form>
                                    </div>
                                    <div class="modal-footer m-auto">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Fermer", "Close") ?></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php
                        $compt += 1;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>