<?php
include 'views/others/errors.php'; 
//$list_languages = list_languages($db);
$list_user = list_employee_without_admin($_SESSION["user_company"], $db);
$list_access = list_of_access($_SESSION["user_company"], $db);
?>
<div class="row justify-content-center py-4 mx-0">

    <div class=" offset-1 col-10">
        <div class="card card-body bg-transparent border-0  shadow-sm">
            <form enctype="multipart/form-data" method="post" action="admin3.php?page=controllers/admin3/directions/add_direction_controller" class="needs-validation" novalidate>
                <div class="text-center my-4">
                    <span class="h3 font-weight-bold text-light"><?php language_content("Ajouter une direction", "Add a direction") ?></span>
                </div>
                <div class="row my-4">
                    <div class="form-group col">
                        <label for="exampleInputEmail1"><?php language_content("Nom", "Name") ?><span class="text-danger">&nbsp;*</span></label>
                        <input type="text" name="name" class="form-control bg-dark text-light " id="exampleInputEmail1" value="<?= $data['name'] ?? '' ?>" aria-describedby="" required>
                    </div>
                </div>
                <div class="row ">
                    <div class="input-group col ">
                        <label for="exampleInputEmail1"><?php language_content("Directeur", "Director") ?><span class="text-danger">&nbsp;*</span></label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="input-group col ">
                        <select required name="director" class="custom-select mt-2 select2-search--inline  bg-dark text-light" id="gender">
                            <option class="select2-selection__placeholder" value="0"><?php language_content("Choisir le directeur...", "Select director...") ?></option>
                            <?php foreach ($list_user as $employee) : ?>
                                <option <?= (isset($data['director'])) && $data['director'] === $employee['userId'] ? 'selected' : '' ?> value="<?= $employee['userId'] ?>"><?= $employee['userName'] . " " . $employee['userPrename'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="input-group col ">
                        <label for="exampleInputEmail1"><?php language_content("Droits d'accès", "Right of access") ?><span class="text-danger">&nbsp;*</span></label>
                    </div>
                </div>

                <div class="row mb-4">

                    <div class="input-group col ">
                        <select required name="access" class="custom-select mt-2 select2-search--dropdown bg-dark text-light" id="gender">
                            <option class="select2-selection__placeholder" value="0"><?php language_content("Choisir son droit accès...", "Select her right of access...") ?></option>
                            <?php foreach ($list_access as $access) : ?>
                                <option <?= (isset($data['access'])) && $data['access'] === $access['access_id'] ? 'selected' : '' ?> value="<?= $access['access_id'] ?>"><?= $access['name'] ?> </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="input-group col-3 text-center ">
                        <a class=" btn-secondary btn-block rounded text-decoration-none" href="admin3.php?page=views/admin3/directions/add_direction_11"> <?php language_content("Créer un nouveau Modèle", "Create a new template") ?> </a>
                    </div>

                </div>
                <div class="row justify-content-center">
                    <button type="submit" name="submit_add_direction" class="btn btn-info col-md-4"><?php language_content("Créer", "Create") ?></button>
                </div> 
            </form>
        </div>
    </div>

    <!-- <div class="col-sm-6 pr-0 mr-0">
        <div class="card rounded-circle card-body p-0 text-center">
            <img class="img-thumbnail w-100" id="preview_image" alt="Apercue image" />
        </div>
    </div> -->

</div>