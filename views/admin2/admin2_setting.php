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
                <?php language_content("Vous pouvez modifier le logo de l'entreprise", "You can change company Brand") ?>
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