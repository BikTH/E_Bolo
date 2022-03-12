<?php
$list_access = list_of_access($_SESSION["user_company"], $db);
?>

<div class="m-5">

    <nav>
        <div class="nav nav-tabs row" id="nav-tab" role="tablist">
            <a class="col-6 btn-block btn-outline-info text-center nav-link <?php if (isset($data["ppp"])) : ?>  <?php else : ?> active <?php endif; ?> " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="<?php if (isset($data["ppp"])) : ?> false <?php else : ?> true <?php endif; ?>"> <i class="fa fa-user-plus"></i> <?php language_content("Ajouter un employé", "Add employee") ?></a>
            <a class="col-6 btn-block btn-outline-info text-center nav-link <?php if (isset($data["ppp"])) : ?> active <?php else : ?> <?php endif; ?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="<?php if (isset($data["ppp"])) : ?> true <?php else : ?> false <?php endif; ?>"> <i class="fa fa-user-cog"></i> <?php language_content("Ajouter un administrateur", "add administrator") ?></a>
        </div>
    </nav>

    <div class="tab-content my-3" id="nav-tabContent">
        <!-- page 1: ajouter un employé -->
        <div class="tab-pane fade <?php if (isset($data["ppp"])) : ?>  <?php else : ?> show active <?php endif; ?> " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
                <div class="col-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-Secondary-900 text-uppercase mb-4">
                                <?php if (what_langauge() == 0) : ?>
                                    AJOUTER UN EMPLOYE
                                <?php else : ?>
                                    ADD EMPLOYEE
                                <?php endif; ?>
                            </h1>
                            <?php include('views/others/errors.php'); ?>
                        </div>
                        <div class="text-left">
                            <h1 class="h5 text-Secondary-900 text-capitalize mb-4">
                                <?php if (what_langauge() == 0) : ?>
                                    Utilisateur
                                <?php else : ?>
                                    User
                                <?php endif; ?>
                            </h1>
                        </div>
                        <form class="user" enctype="multipart/form-data" method="post" action="admin3.php?page=controllers/admin3/employees/add_employee_controller">
                            <input type="hidden" value="<?= $_SESSION["user_company"] ?>" name="company">
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
                                        <label for="name"><?php language_content("Nom", "First Name") ?><span class="text-danger">&nbsp;*</span></label>
                                        <input id="name" type="text" name="name" value="<?= $data['name'] ?? '' ?>" class="form-control form-control-user bg-dark text-light" placeholder="<?php language_content("Nom...", "First Name...") ?>" required>
                                        <div class="invalid-feedback">
                                            <?php language_content("Entrez un nom valide !", "invalide First Name !") ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-sm-0">
                                        <label for="prename"><?php language_content("Prénom", "Last Name") ?><span class="text-danger">&nbsp;*</span></label>
                                        <input id="prename" type="text" name="prename" value="<?= $data['prename'] ?? '' ?>" class="form-control form-control-user bg-dark text-light" placeholder="<?php language_content("Prénom...", "Last Name...") ?>" required>
                                        <div class="invalid-feedback">
                                            <?php language_content("Entrez un prénom valide!", "Valide last name!") ?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class=" form-group row ">
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-sm-0">
                                        <label for=" contact "><?php language_content("Téléphone", "Phone-Number") ?><span class="text-danger">&nbsp;*</span></label>
                                        <input id=" contact " pattern="+237[0-9]{9}" name="phone" value="<?= $data['phone'] ?? '' ?>" type="text" class="form-control form-control-user bg-dark text-light" placeholder="<?php language_content("+237...", "+237...") ?>" required>
                                        <div class="invalid-feedback">
                                            <?php language_content("Entrez un Numéro valide !", "Incorrect Phone Number!") ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-sm-0">
                                        <label for=" gender "><?php if (what_langauge() == 0) : ?>Sex<?php else : ?>Sex<?php endif; ?></label>
                                        <select required name="gender" class="custom-select user bg-dark text-light " id="gender">
                                            <option value="0"><?= language_content("Choisir un genre", "Choose a gender") ?></option>
                                            <option <?= (isset($data['gender'])) && $data['gender'] === "Masculin" ? 'selected' : '' ?> value="Masculin"><?php if (what_langauge() == 0) : ?>Masculin<?php else : ?>Male<?php endif; ?></option>
                                            <option <?= (isset($data['gender'])) && $data['gender'] === "Feminin" ? 'selected' : '' ?> value="Feminin"><?php if (what_langauge() == 0) : ?>Feminin<?php else : ?>Female<?php endif; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=" birthday "><?php language_content("Date de Naissance", "Birthday") ?><span class="text-danger">&nbsp;*</span></label>
                                <input max="2015-12-31" min="1920-01-01" id=" birthday " name="birthday" value="<?= $data['birthday'] ?? '' ?>" type="date" class="form-control form-control-user bg-dark text-light" required>
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
                                <h1 class="h6 text-Secondary-900 text-capitalize mb-1 mt-4"><?php if (what_langauge() == 0) : ?>Informations de Connexion<?php else : ?> Login Informations<?php endif; ?><span class="text-danger">&nbsp;*</span></h1>
                            </div>
                            <div class="form-group">
                                <label for=" email "><?php if (what_langauge() == 0) : ?>Adresse Email<?php else : ?>Email Adress<?php endif; ?><span class="text-danger">&nbsp;* </span></label>
                                <input id=" email " name="email" value="<?= $data['email'] ?? '' ?>" type="text" class="form-control form-control-user bg-dark text-light" placeholder="contact@exemple.com" required>
                                <div class="invalid-feedback">
                                    <?php language_content("Entrez un Email Valide !", "Incorrect Email!") ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for=" password "><?php if (what_langauge() == 0) : ?>Mot De Passe<span class="text-danger">&nbsp;* 5 caractères minimum</span><?php else : ?>Password<span class="text-danger">&nbsp;* 5 characters minimum</span><?php endif; ?></label>
                                    <input id=" password " value="<?= $data['password'] ?? '' ?>" name="password" type="password" minlength="5" class="form-control form-control-user bg-dark text-light" placeholder="<?php if (what_langauge() == 0) : ?>Mot de passe...<?php else : ?>Password...<?php endif; ?>" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for=" confirm_password "><?php if (what_langauge() == 0) : ?>Confirmez Mot de passe<?php else : ?>Confirm password<?php endif; ?><span class="text-danger">&nbsp;*</span></label>
                                    <input id=" confirm_password " value="<?= $data['confirm_password'] ?? '' ?>" name="confirm_password" minlength="5" type="password" class="form-control form-control-user bg-dark text-light" placeholder="<?php if (what_langauge() == 0) : ?>Confirmez Mot de passe...<?php else : ?>Confirm password...<?php endif; ?>" required>
                                </div>
                                <div class="invalid-feedback">
                                    <?php language_content("Entrez un Mot de passse valide !", "Incorrect Password!") ?>
                                </div>
                            </div>

                            <hr class="border border-info mt-2 mb-2">

                            <div class="text-right">
                                <h1 class="h6 text-Secondary-900 text-capitalize mb-1 mt-4"><?php if (what_langauge() == 0) : ?>Droit d'accès<?php else : ?>Right of access<?php endif; ?></h1>
                            </div>
                            <div class="row mb-5 ">
                                <div class="col-sm-9">
                                    <div class="mb-3 mb-sm-0">
                                        <label for="companylist"><?php if (what_langauge() == 0) : ?>Droit d'accès de l'utilisateur<?php else : ?>User's right of access<?php endif; ?></label>
                                        <select required name="access" class="custom-select mt-2 bg-dark text-light" id="companylist">
                                            <option value="<?= employee_access($_SESSION["user_company"], $db) ?>"><?php if (what_langauge() == 0) : ?>Employee<?php else : ?>Employee<?php endif; ?></option>
                                            <?php foreach ($list_access as $access) : ?>
                                                <option <?= (isset($data['company'])) && $data['company'] === $access['access_id'] ? 'selected' : '' ?> value="<?= $access['access_id'] ?>"><?= $access['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-3 mt-4">
                                    <div class="mb-3 mb-sm-0 mt-3">
                                        <a href="" class="btn btn-block btn-outline-info btn-rounded mt-3"><?= language_content("Créer un modèle", "Create a template") ?></a>
                                    </div>
                                </div> -->
                            </div>


                            <button name="submit_add_employee" type="submit" class="btn btn-info btn-user btn-block">
                                <i class="fab fa-sign-in "></i> <?php if (what_langauge() == 0) : ?>INSCRIRE Employé<?php else : ?>REGISTER Employee<?php endif; ?>
                            </button>
                            <!-- <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- page 2: ajouter un administrateur -->
        <div class="tab-pane fade <?php if (isset($data["ppp"])) : ?> show active <?php else : ?> <?php endif; ?> " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row">
                <div class="col-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-Secondary-900 text-uppercase mb-4">
                                <?php if (what_langauge() == 0) : ?>
                                    AJOUTER UN ADMINISTRATEUR
                                <?php else : ?>
                                    ADD administrator
                                <?php endif; ?>
                            </h1>
                            <?php include('views/others/errors.php'); ?>
                        </div>
                        <div class="text-left">
                            <h1 class="h5 text-Secondary-900 text-capitalize mb-4">
                                <?php if (what_langauge() == 0) : ?>
                                    Utilisateur
                                <?php else : ?>
                                    User
                                <?php endif; ?>
                            </h1>
                        </div>
                        <form class="user" enctype="multipart/form-data" method="post" action="admin3.php?page=controllers/admin3/employees/add_employee_controller">
                            <input type="hidden" value="<?= $_SESSION["user_company"] ?>" name="company">
                            <input type="hidden" value="1" name="ppp">
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
                                        <label for="name"><?php language_content("Nom", "First Name") ?><span class="text-danger">&nbsp;*</span></label>
                                        <input id="name" type="text" name="name2" value="<?= $data['name2'] ?? '' ?>" class="form-control form-control-user bg-dark text-light" placeholder="<?php language_content("Nom...", "First Name...") ?>" required>
                                        <div class="invalid-feedback">
                                            <?php language_content("Entrez un nom valide!", "Valide First Name!") ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-sm-0">
                                        <label for="prename"><?php language_content("Prénom", "Last Name") ?><span class="text-danger">&nbsp;*</span></label>
                                        <input id="prename" type="text" name="prename2" value="<?= $data['prename2'] ?? '' ?>" class="form-control form-control-user bg-dark text-light" placeholder="<?php language_content("Prénom...", "Last Name...") ?>" required>
                                        <div class="invalid-feedback">
                                            <?php language_content("Entrez un prénom valide!", "Valide last name!") ?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class=" form-group row ">
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-sm-0">
                                        <label for=" contact "><?php language_content("Téléphone", "Phone-Number") ?><span class="text-danger">&nbsp;*</span></label>
                                        <input id=" contact " pattern="+237[0-9]{9}" name="phone2" value="<?= $data['phone2'] ?? '' ?>" type="text" class="form-control form-control-user bg-dark text-light" placeholder="<?php language_content("+237...", "+237...") ?>" required>
                                        <div class="invalid-feedback">
                                            <?php language_content("Entrez un Numéro valide !", "Incorrect Phone Number!") ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-sm-0">
                                        <label for=" gender "><?php if (what_langauge() == 0) : ?>Sex<?php else : ?>Sex<?php endif; ?></label>
                                        <select required name="gender2" class="custom-select user bg-dark text-light " id="gender">
                                            <option value="0"><?= language_content("Choisir un genre", "Choose a gender") ?></option>
                                            <option <?= (isset($data['gender2'])) && $data['gender2'] === "Masculin" ? 'selected' : '' ?> value="Masculin"><?php if (what_langauge() == 0) : ?>Masculin<?php else : ?>Male<?php endif; ?></option>
                                            <option <?= (isset($data['gender2'])) && $data['gender2'] === "Feminin" ? 'selected' : '' ?> value="Feminin"><?php if (what_langauge() == 0) : ?>Feminin<?php else : ?>Female<?php endif; ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=" birthday "><?php language_content("Date de Naissance", "Birthday") ?><span class="text-danger">&nbsp;*</span></label>
                                <input max="2015-12-31" min="1920-01-01" id=" birthday " name="birthday2" value="<?= $data['birthday2'] ?? '' ?>" type="date" class="form-control form-control-user bg-dark text-light" required>
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
                                <h1 class="h6 text-Secondary-900 text-capitalize mb-1 mt-4"><?php if (what_langauge() == 0) : ?>Informations de Connexion<?php else : ?> Login Informations<?php endif; ?><span class="text-danger">&nbsp;*</span></h1>
                            </div>
                            <div class="form-group">
                                <label for=" email "><?php if (what_langauge() == 0) : ?>Adresse Email<?php else : ?>Email Adress<?php endif; ?><span class="text-danger">&nbsp;* </span></label>
                                <input id=" email " name="email2" value="<?= $data['email2'] ?? '' ?>" type="text" class="form-control form-control-user bg-dark text-light" placeholder="contact@exemple.com" required>
                                <div class="invalid-feedback">
                                    <?php language_content("Entrez un Email Valide !", "Incorrect Email!") ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for=" password "><?php if (what_langauge() == 0) : ?>Mot De Passe<span class="text-danger">&nbsp;* 5 caractères minimum</span><?php else : ?>Password<span class="text-danger">&nbsp;* 5 characters minimum</span><?php endif; ?></label>
                                    <input id=" password " value="<?= $data['password2'] ?? '' ?>" name="password2" type="password" minlength="5" class="form-control form-control-user bg-dark text-light" placeholder="<?php if (what_langauge() == 0) : ?>Mot de passe...<?php else : ?>Password...<?php endif; ?>" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for=" confirm_password "><?php if (what_langauge() == 0) : ?>Confirmez Mot de passe<?php else : ?>Confirm password<?php endif; ?><span class="text-danger">&nbsp;*</span></label>
                                    <input id=" confirm_password " value="<?= $data['confirm_password2'] ?? '' ?>" name="confirm_password2" minlength="5" type="password" class="form-control form-control-user bg-dark text-light" placeholder="<?php if (what_langauge() == 0) : ?>Confirmez Mot de passe...<?php else : ?>Confirm password...<?php endif; ?>" required>
                                </div>
                                <div class="invalid-feedback">
                                    <?php language_content("Entrez un Mot de passse valide !", "Incorrect Password!") ?>
                                </div>
                            </div>

                            <hr class="border border-info mt-2 mb-2">

                            <div class="text-right">
                                <h1 class="h6 text-Secondary-900 text-capitalize mb-1 mt-4"><?php if (what_langauge() == 0) : ?>Droit d'accès<?php else : ?>Right of access<?php endif; ?></h1>
                            </div>
                            <div class="row mb-5 ">
                                <div class="col-sm-9">
                                    <div class="mb-3 mb-sm-0">
                                        <label for="companylist"><?php if (what_langauge() == 0) : ?>Droit d'accès de l'utilisateur<?php else : ?>User's right of access<?php endif; ?></label>
                                        <select required name="access2" class="custom-select mt-2 bg-dark text-light" id="companylist">
                                            <option value="<?= administrator_access($_SESSION["user_company"], $db) ?>"><?php if (what_langauge() == 0) : ?>Administrator<?php else : ?>Administrator<?php endif; ?></option>
                                            <?php foreach ($list_access as $access) : ?>
                                                <option <?= (isset($data['access2'])) && $data['access2'] === $access['access_id'] ? 'selected' : '' ?> value="<?= $access['access_id'] ?>"><?= $access['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-3 mt-4">
                                    <div class="mb-3 mb-sm-0 mt-3">
                                        <a href="" class="btn btn-block btn-outline-info btn-rounded mt-3"><?= language_content("Créer un modèle", "Create a template") ?></a>
                                    </div>
                                </div> -->
                            </div>


                            <button name="submit_add_admin" type="submit" class="btn btn-info btn-user btn-block">
                                <i class="fab fa-sign-in "></i> <?php if (what_langauge() == 0) : ?>INSCRIRE administrateur<?php else : ?>REGISTER Administrator<?php endif; ?>
                            </button>
                            <!-- <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>