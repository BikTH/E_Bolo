<?php
include 'views/others/errors.php';
//$list_languages = list_languages($db);
$list_user = list_employee_without_admin($_SESSION["user_company"], $db);
$list_access = list_of_access($_SESSION["user_company"], $db);
$list = direction_by_id($direction_id, $db);
?>
<div class="row justify-content-center py-4 mx-0">

    <div class=" offset-1 col-10">
        <div class="card card-body bg-transparent shadow-sm border-0">
            <form enctype="multipart/form-data" method="post" action="worker.php?page=controllers/worker/directions/direction_edit_controller&direction_id=<?=$direction_id?>" class="needs-validation" novalidate>
                <div class="text-center my-4">
                    <span class="h3 font-weight-bold text-light"><?php language_content("Editer", "Edit") ?> "<?= $list["directionName"] ?>" </span>
                </div>
                <div class="row my-4">
                    <div class="form-group col">
                        <label for="exampleInputEmail1"><?php language_content("Nom", "Name") ?></label>
                        <input type="text" name="name" class="form-control bg-dark text-light " id="exampleInputEmail1" value="<?= $list["directionName"]  ?? $data['name'] ?>" aria-describedby="" required>
                    </div>
                </div>
                <div class="row ">
                    <div class="input-group col ">
                        <label for="exampleInputEmail1"><?php language_content("Directeur", "Director") ?></label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="input-group col ">
                        <select required name="director" class="custom-select mt-2 select2-search--inline  bg-dark text-light" id="gender">
                            <option class="select2-selection__placeholder" value="<?= isset($current_info) ? $current_info["directionAdmin"] : 0 ?>" <?= isset($current_info)? 'selected': '' ?>><?= isset($current_info) ? $current_info["userName"]." ".$current_info["userPrename"] : language_content("Choisir le directeur...", "Select director...") ?></option>
                            <?php foreach ($list_user as $employee) : ?>
                                <option <?= (isset($data['director'])) && $data['director'] === $employee['userId'] ? 'selected' :'' ?> value="<?= $employee['userId'] ?>"><?= $employee['userName'] . " " . $employee['userPrename'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="input-group col ">
                        <label for="exampleInputEmail1"><?php language_content("Droits d'accès", "Right of access") ?></label>
                    </div>
                </div>

                <div class="row mb-4">

                    <div class="input-group col "> 
                        <select required name="access" class="custom-select mt-2 select2-search--dropdown bg-dark text-light" id="gender">
                            <option class="select2-selection__placeholder" value="<?= isset($current_info) ? $current_info["accessId"] : 0 ?>" <?= isset($current_info) ? 'selected': '' ?>><?= isset($current_info) ? $current_info["accessName"] : language_content("Choisir son droit accès...", "Select her right of access...") ?></option>
                            <?php foreach ($list_access as $access) : ?>
                                <option <?= isset($data['access']) && $data['access'] === $access['access_id'] ? 'selected' : '' ?> value="<?= $access['access_id'] ?>"><?= $access['name'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

                <div class="row justify-content-center">
                    <button type="submit" name="submit_edit_direction" class="btn btn-info col-md-4"><?php language_content("Modifier", "Edit") ?></button>
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