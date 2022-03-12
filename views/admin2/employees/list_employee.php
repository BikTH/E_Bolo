<?php
$list_direction = list_directions($_SESSION["user_company"], $db);
$list_access = list_of_access($_SESSION["user_company"], $db);
?>

<h1 class="h3 mb-2 mt-3 text-light"><i class="fas fa-fw fa-user-friends"></i><?= language_content("Employés", "Employees") ?></h1>
<?php include('views/others/errors.php'); ?>
<!-- DataTales Example -->
<div class="card bg-transparent border-0 shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-Dark"></i><?= language_content("Liste des Employés", "List of Employees") ?></h6>
            </div>
            <div class="col-6 row justify-content-end">
                <a href="admin2.php?page=views/admin2/employees/add_employee" class="btn btn-info btn-sm float-right"><i class="fas fa-fw fa-plus-circle"></i><?php language_content("Ajouter un employé", "Add Employee") ?></a>
            </div>
        </div>
    </div> 
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="align-middle col-auto"> <?php language_content("ID Employés", "Employee ID") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Nom", "Name") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Contact", "Contact") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Ajouté le", "Add at") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Direction", "Direction") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Poste", "Role") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Droit d'accès", "Right of access") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Options", "Actions") ?></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="align-middle col-auto"> <?php language_content("ID Employés", "Employee ID") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Nom", "Name") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Contact", "Contact") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Ajouté le", "Add at") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Direction", "Direction") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Poste", "Role") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Droit d'accès", "Right of access") ?></th>
                        <th class="align-middle col-auto"> <?php language_content("Options", "Actions") ?></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $compt = 1;
                    $lists = list_employee($_SESSION["user_company"], $db);
                    while ($list = mysqli_fetch_assoc($lists)) :
                    ?>
                        <tr class="text-light">
                            <td class="align-middle">
                                <?= $list['userRegistrationNumber'] . " " ?>
                            </td>
                            <td class="align-middle">
                                <img class="img-profile rounded" width="40" height="40" src="<?= user_avatar_by_id2($list, $db) ?>">
                                <?= $list['userName'] . " " . $list['userPrename'] ?>
                                <a href="#" class=" float-right btn btn-light btn-sm " data-toggle="modal" data-target="#info_director<?= $compt ?>"> <i class="fas fa-fw fa-eye"></i> </a>
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
                                                                    <input id="name" type="text" value="<?= $list['userName'] . " " . $list['userPrename'] ?>" class="form-control form-control-user bg-dark text-light">
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
                                                                    <input id=" contact " value="<?= $list['userPhone'] ?>" type="text" class="form-control form-control-user bg-dark text-light">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="mb-3 mb-sm-0">
                                                                    <label for=" gender "><?php if (what_langauge() == 0) : ?>Genre<?php else : ?>Gender<?php endif; ?></label>
                                                                    <input id=" contact " value="<?= $list['userGender'] ?>" type="text" class="form-control form-control-user bg-dark text-light">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for=" email "><?php if (what_langauge() == 0) : ?>Adresse Email<?php else : ?>Email Adress<?php endif; ?></label>
                                                            <input id=" email " value="<?= $list['userEmail'] ?>" type="text" class="form-control form-control-user bg-dark text-light">
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
                            </td>
                            <td class="align-middle">
                                <ul>
                                    <li> <i class="fa fa-phone text-light"> : </i> <?= " " . $list['userPhone'] ?></li>
                                    <li> <i class="fa fa-at text-light"> : </i> <?= " " . $list['userEmail'] ?></li>
                                </ul>
                            </td>
                            <td class="align-middle">
                                <?= date_formatter($list['userAddedAt'], 'd M Y') . " à " . date_formatter($list['userAddedAt'], 'h:i:s')  ?>
                            </td>
                            <td class="align-middle">
                                <?= user_direction_name($list["directionId"], $db) ?>
                                <?php if (empty(user_direction_information($list["directionId"], $db))) : ?>
                                    <?php if ($list["isAdmin"] != 1) : ?>
                                        <a href="#" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#add_direction<?= $compt ?>"><i class="fas fa-fw fa-plus-square"></i></a>

                                        <div id="add_direction<?= $compt ?>" class="modal fade delete-modal" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content bg-gradient-dark">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Ajouter <u>" . $list["userName"] . " " . $list["userPrename"] . "</u>  à une direction", "Add <u>" . $list["userName"] . " " . $list["userPrename"] . "</u> at a direction") ?></h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="admin2.php?page=controllers/admin2/employees/assign_employee_to_direction_controller">
                                                        <div class="row m-4">
                                                            <div class="modal-body text-center">
                                                                <div class="row mb-5 ">
                                                                    <div class="col-sm-12">
                                                                        <div class="mb-3 mb-sm-0">
                                                                            <input type="hidden" name="user" value="<?= $list["userId"] ?>">
                                                                            <label for="companylist"><?php if (what_langauge() == 0) : ?>Direction<?php else : ?>Direction<?php endif; ?></label>
                                                                            <select required name="direction" class="custom-select mt-2 bg-dark text-light" id="companylist">
                                                                                <option value="0"><?php if (what_langauge() == 0) : ?>Choisir une direction<?php else : ?>Choisir une direction<?php endif; ?></option>
                                                                                <?php foreach ($list_direction as $direction) : ?>
                                                                                    <option <?= (isset($data['direction'])) && $data['direction'] === $direction['directionId'] ? 'selected' : '' ?> value="<?= $direction['directionId'] ?>"><?= $direction['directionName'] ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer m-auto">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                                                                <button name="submit_direction" type="submit" class="btn btn-info"> <?php if (what_langauge() == 0) : ?>Ajouter<?php else : ?>Add<?php endif; ?></button>
                                                            </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if ($list["isAdminSection"] != 1) : ?>
                                        <a href="#" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#del_direction<?= $compt ?>"><i class="fas fa-fw fa-backspace"></i></a>

                                        <div id="del_direction<?= $compt ?>" class="modal fade delete-modal" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content bg-gradient-dark">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Voulez vous retirer cet employé de cet direction ?", "Do you want to retrieve this user to this direction ?") ?></h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="row m-4">
                                                        <div class="modal-body text-center">
                                                            <img src="public/images/sent.png" alt="" width="50" height="46">
                                                            <h3><?= language_content("Etes-vous sûr de vouloir Retirer <u>" . $list["userName"] . " " . $list["userPrename"] . "</u>  de la direction: " . user_direction_name($list["directionId"], $db)  . " ?", "Do you really want to retrieve " . $list["userName"] . " " . $list["userPrename"] . "  of the direction: " . user_direction_name($list["directionId"], $db) . " ?") ?></h3>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer m-auto">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                                                        <a class="btn btn-danger" href="admin2.php?page=controllers\admin2\employees\remove_employee_direction_controller&user_id=<?= $list['userId'] ?>"><?php language_content("Retirer", "Retrieve") ?></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td class="align-middle">
                                <?= employee_role($list, $db) ?>
                            </td>
                            <td class="align-middle">
                                <?= employee_is_access($list["accessId"], $db)["accessName"] ?>

                                <div class="float-right">
                                    <?php $list["isAdmin"] == 1 ? ($_SESSION["user_id"] == $list["companyAdmin"] ? ($list["userId"] == $list["companyAdmin"] ? '' : print("<a data-toggle=\"modal\" data-target=\"#change_accesss" . $compt . "\"href=\"#\" class=\"btn btn-info btn-sm\"> <i class=\"fas fa-fw fa-pen\"></i> </a>")) : '') : print("<a data-toggle=\"modal\" data-target=\"#change_accesss" . $compt . "\"href=\"#\" class=\"btn btn-info btn-sm\"> <i class=\"fas fa-fw fa-pen\"></i> </a>")  ?>
                                    <div id="change_accesss<?= $compt ?>" class="modal fade delete-modal" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-gradient-dark">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Ajouter <u>" . $list["userName"] . " " . $list["userPrename"] . "</u>  à une direction", "Add <u>" . $list["userName"] . " " . $list["userPrename"] . "</u> at a direction") ?></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="admin2.php?page=controllers/admin2/employees/change_employee_access_controller">
                                                    <div class="row m-4">
                                                        <div class="modal-body text-center">
                                                            <div class="row mb-5 ">
                                                                <div class="col-sm-12">
                                                                    <div class="mb-3 mb-sm-0">
                                                                        <input type="hidden" name="user2" value="<?= $list["userId"] ?>">
                                                                        <label for="companylist"><?php if (what_langauge() == 0) : ?>Direction<?php else : ?>Direction<?php endif; ?></label>
                                                                        <select required name="access" class="custom-select mt-2 bg-dark text-light" id="companylist">
                                                                            <option value="0"><?php if (what_langauge() == 0) : ?>Choisir droits d'accès<?php else : ?>Choose a right of access<?php endif; ?></option>
                                                                            <?php foreach ($list_access as $access) : ?>
                                                                                <option <?= (isset($data['access'])) && $data['access'] === $access['access_id'] ? 'selected' : '' ?> value="<?= $access['access_id'] ?>"><?= $access['name'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer m-auto">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                                                            <button name="submit_access" type="submit" class="btn btn-info"> <?php if (what_langauge() == 0) : ?>Modifier<?php else : ?>Edit<?php endif; ?></button>
                                                        </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <?php if ($_SESSION["user_id"] != $list["userId"]) : ?>
                                        <a href="admin3.php?page=controllers/admin3/chat/message-detail-controller&user_id=<?=$list["userId"] ?>" class="btn btn-info btn-sm"><i class="fas fa-fw fa-comments"></i></a>
                                    <?php endif; ?>
                                    <?php if ($list["userId"] != admin($db)) : ?>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#block_user<?= $compt ?>"><i class="fas fa-fw fa-trash"></i></a>
                                    <?php endif; ?>
                                    <div id="block_user<?= $compt ?>" class="modal fade delete-modal" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-gradient-dark">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Bloquer un Employé", "Disable account") ?></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="public/images/sent.png" alt="" width="50" height="46">
                                                    <h3><?= language_content("Etes-vous sûr de vouloir bloquer l'employé: ", "Do you really want to disable the account of:  ") ?> "<?= $list['userName'] . " " . $list['userPrename'] ?>" </h3>
                                                </div>
                                                <div class="modal-footer m-auto">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                                                    <a class="btn btn-danger" href="admin2.php?page=controllers/admin2/employees/block_employee_controller&user_id=<?= $list["userId"] ?>"><?php language_content("Bloquer", "Block") ?></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>

                    <?php
                        $compt += 1;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php language_content("Liste", "List") ?></a>
        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php language_content("Tableaux", "Tables") ?></a>
    </div>
</nav> -->
<div class="tab-content my-3" id="nav-tabContent">

    <!-- <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        <div class="row">
            <?php $lists = list_employee($_SESSION["user_company"], $db);
            while ($list = mysqli_fetch_assoc($lists)) :
            ?>
                <?php include('views/admin2/modals_admin2.php'); ?>
                <div class="col-md-4 col-sm-4 col-lg-3">

                    <div class="profile-widget bg-gradient-dark">
                        <div class="doctor-img">
                            <a class="avatar" href="admin2.php?page=controllers/admin2/employees/details_employee_controller&user_id=<?= $list["userId"] ?>"> <img alt="" src="<?= user_avatar_by_id2($list, $db) ?>"> </a>
                        </div>
                        <div class="dropdown profile-action no-arrow">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right bg-gradient-info">
                                <a class="dropdown-item text-decoration-none" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <div class="doc-prof">ID: <?= $list["userRegistrationNumber"] ?></div>
                        <div class="doc-prof"><?= employee_role($list, $db) ?></div>
                        <a class="text-light text-decoration-none" href="admin2.php?page=controllers/admin2/employees/details_employee_controller&user_id=<?= $list["userId"] ?>">
                            <h5 class="doctor-name text-ellipsis"><?= $list["userName"] . " " . $list["userPrename"] ?></h5>
                        </a>
                        <div class="user-country">
                            <i class="fa fa-envelope"></i> <?= $list["userEmail"] ?>
                        </div>
                    </div>

                </div>
                <?php include('views/admin2/modals_admin2.php'); ?>
            <?php endwhile; ?>
        </div>

    </div> -->

    <!-- <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

        
        <div class="card bg-dark shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-6">
                        <h6 class="m-0 font-weight-bold text-Dark"></i><?= language_content("Liste des Employés", "List of Employees") ?></h6>
                    </div>
                    <div class="col-6 row justify-content-end">
                        <a href="admin2.php?page=views/admin2/employees/add_employee" class="btn btn-info btn-sm float-right"> <i class="fas fa-plus-circle"></i><?php language_content("Ajouter un employé", "Add an Employee") ?></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="align-middle col-auto"> <?php language_content("ID Employés", "Employee ID") ?></th>
                                <th class="align-middle col-auto"> <?php language_content("Nom", "Name") ?></th>
                                <th class="align-middle col-auto"> <?php language_content("Contact", "Contact") ?></th>
                                <th class="align-middle col-auto"> <?php language_content("Ajouté le", "Add at") ?></th>
                                <th class="align-middle col-auto"> <?php language_content("Poste", "Role") ?></th>
                                <th class="align-middle col-auto"> <?php language_content("Droit d'accès", "Right of access") ?></th>
                                <th class="align-middle col-auto"> <?php language_content("Options", "Actions") ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $lists = list_employee($_SESSION["user_company"], $db);
                            while ($list = mysqli_fetch_assoc($lists)) :
                            ?>
                                <tr class="text-light">
                                    <td class="align-middle">
                                        <div class="row justify-content-center">
                                            <img class="img-profile rounded-circle box-shadow" width="40" height="40" src="<?= user_avatar_by_id2($list, $db) ?>">
                                            <?= $list["userName"] . " " . $list["userPrename"] ?>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <?= $list["userRegistrationNumber"] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $list["userEmail"] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= $list["userPhone"] ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= date_formatter($list['userAddedAt'], 'd M Y') . " à " . date_formatter($list['userAddedAt'], 'h:i:s')  ?>
                                    </td>
                                    <td class="align-middle">
                                        <?= employee_role($list, $db) ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="admin2.php?page=controllers/admin2/employees/details_employee_controller&user_id=<?= $list['userId'] ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> <?php language_content("Détails", "Détails") ?></a>
                                             <a href="#" class="btn btn-danger btn-sm text-dark" data-toggle="modal" data-target="#delete">></i> <?php //language_content("Bloquer", "Bloquer") 
                                                                                                                                                            ?></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php include('views/admin2/modals_admin2.php'); ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div> -->

</div>



<!-- <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php language_content("Liste", "List") ?></a>
        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php language_content("Tableaux", "Tables") ?></a>
    </div>
</nav>

<div class="tab-content my-3" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

    </div>

</div> -->