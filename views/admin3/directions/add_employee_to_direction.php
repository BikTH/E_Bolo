<?php
include 'views/others/errors.php';
//$list_languages = list_languages($db);
if (isset($_GET["direction_id"])) {
    $direction_id = $_GET["direction_id"];
}
?>
<?php if (isset($_GET["add_employee"]) || isset($add_employee)) : ?>

    <div class="row justify-content-center py-4 mx-0">

        <div class=" offset-1 col-10">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-12">
                        <h6 class="m-0 font-weight-bold text-dark"></i><?= language_content("Voulez vous ajouter des employés à cette directions ? ", "Do you want to add employees to this direction ?") ?></h6>
                    </div>
                </div>
            </div>
            <div class="card-body bg-transparent">
                <div class="table-responsive">
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
                                    <a class="btn btn-secondary text-light col-md-4" href="admin3.php?page=views/admin3/directions/list_directions"><?php language_content("Terminer ", "Close ") ?><i class="fas fa-fw fa-arrow-circle-right"></i></a>
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $list_user = list_employee_without_admin($_SESSION["user_company"], $db);
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
                                        <a href="admin3.php?page=controllers/admin3/directions/add_employee_to_direction_controller&add_employee&direction=<?= $direction_id ?>&employee=<?= $list["userId"] ?>" class="btn btn-success col-md-4"><i class="fas fa-fw fa-plus-circle"></i><?php language_content(" Ajouter", " Add") ?></button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- <div class="col-sm-6 pr-0 mr-0">
            <div class="card rounded-circle card-body p-0 text-center">
                <img class="img-thumbnail w-100" id="preview_image" alt="Apercue image" />
            </div>
        </div> -->

    </div>

<?php else : ?>

    <div class="row justify-content-center py-4 mx-0">

        <div class=" offset-1 col-10">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-12">
                        <h6 class="m-0 font-weight-bold text-dark"></i><?= language_content("Voulez vous retirer des employés à cette directions ? ", "Do you want to retrieve employees to this direction ?") ?></h6>
                    </div>
                </div>
            </div>
            <div class="card-body bg-transparent">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable2" width="100%" cellspacing="0">
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
                                    <a class="btn btn-secondary text-light col-md-4" href="admin3.php?page=views/admin3/directions/list_directions"><?php language_content("Terminer ", "Close ") ?><i class="fas fa-fw fa-arrow-circle-right"></i></a>
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $list_user = list_of_direction_employee($direction_id, $_SESSION["user_company"], $db);
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
                                        <a href="admin3.php?page=controllers/admin3/directions/add_employee_to_direction_controller&direction=<?= $direction_id ?>&employee=<?= $list["userId"] ?>" class="btn btn-danger col-md-4"><i class="fas fa-fw fa-backspace"></i><?php language_content(" Retirer", " Retrieve") ?></button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- <div class="col-sm-6 pr-0 mr-0">
            <div class="card rounded-circle card-body p-0 text-center">
                <img class="img-thumbnail w-100" id="preview_image" alt="Apercue image" />
            </div>
        </div> -->

    </div>

<?php endif; ?>