<?php include('views/navbar/navbar_index.php') ?>

<?php
include 'views/others/errors.php';

//is_login2($db);

?>

<div class="container">

    <div class="card bg-transparent o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-Secondary-900 text-uppercase mb-4">
                                <?php if (what_langauge() == 0) : ?>
                                    Ajouter Votre Entreprise
                                <?php else : ?>
                                    Add Your Company
                                <?php endif; ?>

                            </h1>
                        </div>
                        <div class="text-left">
                            <h1 class="h5 text-Secondary-900 text-capitalize mb-4">
                                <?php if (what_langauge() == 0) : ?>
                                    Administrateur
                                <?php else : ?>
                                    Director
                                <?php endif; ?>
                            </h1>
                        </div>
                        <form class="user" enctype="multipart/form-data" method="post" action="index.php?page=controllers/users/register_inc_controller">
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
                                            <?php language_content("Entrez un nom valide!", "Valide First Name!") ?>
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
                                <h1 class="h6 text-Secondary-900 text-capitalize mb-1 mt-4"><?php if (what_langauge() == 0) : ?>informations Entreprise<?php else : ?>Company informations <?php endif; ?></h1>
                            </div>
                            <div class="form-group">
                                <label for=" name_inc "><?php if (what_langauge() == 0) : ?>Nom Entreprise<?php else : ?>Company's Name<?php endif; ?><span class="text-danger">&nbsp;*</span></label>
                                <input id=" name_inc " name="name_inc" value="<?= $data['name_inc'] ?? '' ?>" type="text" class="form-control form-control-user bg-dark text-light" placeholder="Nom Entreprise..." required>
                                <div class="invalid-feedback">
                                    <?php language_content("Renseignez ce champ !", "Choose a name for your company !") ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="image"><?php if (what_langauge() == 0) : ?>Ajouter Un Logo Ou Une Image Pour Votre Entreprise<?php else : ?>Add a logo or image for your company<?php endif; ?></label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input user bg-dark text-light" id="image" onchange="document.getElementById('preview_image').src = window.URL.createObjectURL(this.files[0])">
                                        <label class="custom-file-label" for="image"><?php if (what_langauge() == 0) : ?>Choisir une Image<?php else : ?>Choose a image<?php endif; ?></label>
                                    </div>
                                </div>
                                <div class="col-sm-6 my-3 my-sm-0">
                                    <div class=" row-justify-content-end">
                                        <img class="img-thumbnail w-50 rounded-circle" id="preview_image" />
                                    </div>
                                </div> 
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="description"><?php if (what_langauge() == 0) : ?>Ajouter une Description pour votre Entreprise<?php else : ?>Add a description for your company<?php endif; ?><span class="text-danger"><?php if (what_langauge() == 0) : ?>(254 caractères maximum)<?php else : ?>(254 characters maximum)<?php endif; ?></span></label>
                                    <textarea value="<?= $data['description'] ?? '' ?>" type="text" id="description" name="description" rows="2" class="form-control form-control-user bg-dark text-light md-textarea"></textarea>
                                </div>
                                <div class="col-sm-6 my-3 my-sm-0">
                                    <label for=" slogan "><?php if (what_langauge() == 0) : ?>Ajouter votre Slogan<?php else : ?>Add your slogan<?php endif; ?></label>
                                    <input id=" slogan " name="slogan" value="<?= $data['slogan'] ?? '' ?>" type="text" class="form-control form-control-user bg-dark text-light" placeholder="<?php if (what_langauge() == 0) : ?>Slogan...<?php else : ?>Slogan...<?php endif; ?>">
                                </div>
                            </div>


                            <button name="submit_register_inc" type="submit" class="btn btn-info btn-user btn-block">
                                <i class="fab fa-sign-in "></i> <?php if (what_langauge() == 0) : ?>INSCRIRE<?php else : ?>REGISTER<?php endif; ?>
                            </button>
                            <!-- <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> -->
                        </form>
                        <hr>
                        <div class="text-center">
                            <!-- <a class="small text-light" href="index.php?page=views/users/forgot_password"><?php if (what_langauge() == 0) : ?>Mot de passe oublié ?<?php else : ?>Password forgotten?<?php endif; ?></a> -->
                        </div>
                        <div class="text-center text-lg">
                            <a class="small text-light" href="index.php?page=views/users/login"><?php if (what_langauge() == 0) : ?>Votre entreprise existe dejà? Connectez vous!<?php else : ?>Your Company already exist ? login now !<?php endif; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>