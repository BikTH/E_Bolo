<div class="content mt-2">
    <div class="row justify-content-center">
        <h4 class="page-title"><?php language_content("Modifier votre Modèle", "Edit your template") ?></h4>
    </div>
    <?php include 'views/others/errors.php' ?>
    <div class="row">
        <div class="col-sm-5 col-md-5 col-lg-5 col-xl-4">
            <form class="form user" enctype="multipart/form-data" method="post" action="worker.php?page=controllers/worker/right_of_access/edit_access_controller&access_id=<?= $access_id ?>">
                <fieldset>
                    <legend> </legend>
                    <div class="form-group">
                        <label for="name"><?php language_content("Nom du modèle", "Template's name") ?><span class="text-danger">&nbsp;*</span></label>
                        <input id="name" type="text" name="name" value="<?= $data1["name"] ?? '' ?>" class="form-control form-control-user bg-dark text-light mb-3" placeholder="<?php language_content("Nom...", "Name...") ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description"><?php if (what_langauge() == 0) : ?>Description<?php else : ?>Description<?php endif; ?><span class="text-danger"><?php if (what_langauge() == 0) : ?>(254 caractères maximum)<?php else : ?>(254 characters maximum)<?php endif; ?></span></label>
                        <textarea value="<?= $data1["description"] ?> ?? '' ?>" type="text" id="description" name="description" rows="2" class="form-control form-control-user bg-dark text-light md-textarea"></textarea>
                    </div>

                    <div class="float-none">
                        <button name="submit_name" type="submit" class="btn  btn-info rounded">
                            <?php if (what_langauge() == 0) : ?>Modifier<?php else : ?>Edit<?php endif; ?>
                        </button>
                    </div>

                </fieldset>
            </form>

        </div>
        <div class="col-sm-7 col-md-7 col-lg-7 col-xl-8">

            <form class="mb-5" enctype="multipart/form-data" method="post" action="worker.php?page=controllers/worker/right_of_access/edit_access_controller&access_id=<?= $access_id ?>">

                <div class="m-b-30 mb-3">
                    <fieldset>
                        <legend>
                            <h6 class="card-title m-b-20 row justify-content-left"><?php language_content("Accorder l'accès aux module(s) :", "Granting access to the module(s): ") ?></h6>
                        </legend>
                        <ul class="list-group bg-gradient-dark">
                            <li class="list-group-item">
                                <?php language_content("Activer les utilisateurs", "Activate users") ?>
                                <div class="material-switch float-right">
                                    <input type="hidden" name="non1" value="0">
                                    <input id="staff_module" type="checkbox" name="oui1" value="1" <?php if (isset($data2) && $data2["non1"] == 1) : ?>checked="" <?php endif; ?>>
                                    <label for="staff_module" class="badge-info"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <?php language_content("Gestion des Directions", "Directions management") ?>
                                <div class="material-switch float-right">
                                    <input type="hidden" name="non2" value="0">
                                    <input id="holidays_module" type="checkbox" name="oui2" value="1" <?php if (isset($data2) && $data2["non2"] == 1) : ?>checked="" <?php endif; ?>>
                                    <label for="holidays_module" class="badge-info"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <?php language_content("Gestions des employés", "Employee management") ?>
                                <div class="material-switch float-right">
                                    <input type="hidden" name="non3" value="0">
                                    <input id="leave_module" type="checkbox" name="oui3" value="1" <?php if (isset($data2) && $data2["non3"] == 1) : ?>checked="" <?php endif; ?>>
                                    <label for="leave_module" class="badge-info"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <?php language_content("Gestion fichiers d'entreprise", "Company's files management") ?>
                                <div class="material-switch float-right">
                                    <input type="hidden" name="non4" value="0">
                                    <input id="events_module" type="checkbox" name="oui4" value="1" <?php if (isset($data2) && $data2["non4"] == 1) : ?>checked="" <?php endif; ?>>
                                    <label for="events_module" class="badge-info"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <?php language_content("Gestion des droits d'accès", "Module Access") ?>
                                <div class="material-switch float-right">
                                    <input type="hidden" name="non5" value="0">
                                    <input id="chat_module" type="checkbox" name="oui5" value="1" <?php if (isset($data2) && $data2["non5"] == 1) : ?>checked="" <?php endif; ?>>
                                    <label for="chat_module" class="badge-info"></label>
                                </div>
                            </li>
                        </ul>

                        <div class="row justify-content-center mt-3">
                            <button name="submit_module" type="submit" class="btn  btn-info rounded">
                                <?php if (what_langauge() == 0) : ?>Modifier<?php else : ?>Edit<?php endif; ?>
                            </button>
                        </div>

                    </fieldset>
                </div>
            </form>



            <div class="table-responsive mt-3">
                <table class="table table-striped" width="100%" cellspacing="0">
                    <?php if ($data2["non1"] == 1 || $data2["non2"] == 1 || $data2["non3"] == 1 || $data2["non4"] == 1 || $data2["non5"] == 1) : ?>
                        <?php $test = 1; ?>
                        <thead>
                            <tr>
                                <th><?php language_content("Permissions", "Permissions") ?></th>
                                <th class="text-center"><?php language_content("consulter", "Read") ?></th>
                                <th class="text-center"><?php language_content("Modifier", "Write") ?></th>
                                <th class="text-center"><?php language_content("Ajouter", "Create") ?></th>
                                <th class="text-center"><?php language_content("Supprimer", "Delete") ?></th>
                            </tr>
                        </thead>
                    <?php endif; ?>
                    <form class="mb-5" enctype="multipart/form-data" method="post" action="worker.php?page=controllers/worker/right_of_access/edit_access_controller&access_id=<?= $access_id ?>">
                        <tbody>
                            <?php if ($data2["non1"] == 1) : ?>
                                <tr>
                                    <td><?php language_content("Activer les utilisateurs", "Activate users") ?></td>
                                    <td class="text-center">
                                        <input type="hidden" name="u1" value="0">
                                        <input type="checkbox" name="ur" value="1" <?php if (isset($data3) && $data3["u1"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="u2" value="0">
                                        <input type="checkbox" name="uw" value="1" <?php if (isset($data3) && $data3["u2"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="u3" value="0">
                                        <input type="checkbox" name="uc" value="1" <?php if (isset($data3) && $data3["u3"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="u4" value="0">
                                        <input type="checkbox" name="ud" value="1" <?php if (isset($data3) && $data3["u4"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($data2["non2"] == 1) : ?>
                                <tr>
                                    <td><?php language_content("Gestion des Directions", "Directions management") ?></td>
                                    <td class="text-center">
                                        <input type="hidden" name="d1" value="0">
                                        <input type="checkbox" name="dr" value="1" <?php if (isset($data3) && $data3["d1"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="d2" value="0">
                                        <input type="checkbox" name="dw" value="1" <?php if (isset($data3) && $data3["d2"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="d3" value="0">
                                        <input type="checkbox" name="dc" value="1" <?php if (isset($data3) && $data3["d3"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="d4" value="0">
                                        <input type="checkbox" name="dd" value="1" <?php if (isset($data3) && $data3["d4"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($data2["non3"] == 1) : ?>
                                <tr>
                                    <td><?php language_content("Gestions des employés", "Employee management") ?></td>
                                    <td class="text-center">
                                        <input type="hidden" name="e1" value="0">
                                        <input type="checkbox" name="er" value="1" <?php if (isset($data3) && $data3["e1"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="e2" value="0">
                                        <input type="checkbox" name="ew" value="1" <?php if (isset($data3) && $data3["e2"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="e3" value="0">
                                        <input type="checkbox" name="ec" value="1" <?php if (isset($data3) && $data3["e3"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="e4" value="0">
                                        <input type="checkbox" name="ed" value="1" <?php if (isset($data3) && $data3["e4"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($data2["non4"] == 1) : ?>
                                <tr>
                                    <td><?php language_content("Gestion fichiers d'entreprise", "Company's files management") ?></td>
                                    <td class="text-center">
                                        <input type="hidden" name="f1" value="0">
                                        <input type="checkbox" name="fr" value="1" <?php if (isset($data3) && $data3["f1"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="f2" value="0">
                                        <input type="checkbox" name="fw" value="1" <?php if (isset($data3) && $data3["f2"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="f3" value="0">
                                        <input type="checkbox" name="fc" value="1" <?php if (isset($data3) && $data3["f3"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="f4" value="0">
                                        <input type="checkbox" name="fd" value="1" <?php if (isset($data3) && $data3["f4"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($data2["non5"] == 1) : ?>
                                <tr>
                                    <td><?php language_content("Gestion des droits d'accès", "Module Access") ?></td>
                                    <td class="text-center">
                                        <input type="hidden" name="a1" value="0">
                                        <input type="checkbox" name="ar" value="1" <?php if (isset($data3) && $data3["a1"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="a2" value="0">
                                        <input type="checkbox" name="aw" value="1" <?php if (isset($data3) && $data3["a2"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="a3" value="0">
                                        <input type="checkbox" name="ac" value="1" <?php if (isset($data3) && $data3["a3"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="a4" value="0">
                                        <input type="checkbox" name="ad" value="1" <?php if (isset($data3) && $data3["a4"] == 1) : ?>checked="" <?php endif; ?>>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <?php if (isset($test)) : ?>
                                    <td colspan="2">
                                        <div class="row justify-content-center">
                                            <button type="reset" class="btn  btn-danger rounded">
                                                <?php if (what_langauge() == 0) : ?>Réinitialiser<?php else : ?>Reset<?php endif; ?>
                                            </button>
                                        </div>
                                    </td>
                                <?php endif; ?>
                                <td <?php if (isset($test)) : ?> colspan="3" <?php else : ?>colspan="5" <?php endif; ?>>
                                    <div class="row justify-content-center">
                                        <button name="submit_permission" type="submit" class="btn  btn-info rounded">
                                            <?php if (what_langauge() == 0) : ?>Modifier<?php else : ?>Edit<?php endif; ?>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </form>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-12 text-center">
            <p>
                <i class="fa fa-info-circle text-info"></i>
                <?= language_content("Lorsque vous aurez effectué vos modifications", "After edition of informations") ?>
            </p>
        </div>
        <div class="col-12 mt-0 text-center">
            <a class="btn bt btn-rounded btn-success" href="worker.php?page=views/worker/right_of_access/list_of_access&error_success=<?= language_content("Modèle édité avec succès !","Template Edited with success !") ?>">
                <?= language_content("Enregistrer les Modifications", "Save updates") ?>
            </a>
        </div>
    </div>
</div>