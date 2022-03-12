<div class="content mt-2">
    <div class="row justify-content-center">
        <h4 class="page-title"><?php language_content("Créer un modèle", "Create a template") ?></h4>
    </div>
    <?php include 'views/others/errors.php' ?>
    <div class="row">
        <div class="col-sm-5 col-md-5 col-lg-5 col-xl-4">
            <form class="form user" enctype="multipart/form-data" method="post" action="worker.php?page=controllers/worker/directions/add_direction_controller">
                <fieldset <?php
                            if (isset($case1)) {
                                echo "disabled";
                            } ?>>
                    <legend> </legend>
                    <div class="form-group">
                        <label for="name"><?php language_content("Nom du modèle", "Template's name") ?><span class="text-danger">&nbsp;*</span></label>
                        <input id="name" type="text" name="name" value="<?= $data1['name'] ?? '' ?>" class="form-control form-control-user bg-dark text-light mb-3" placeholder="<?php language_content("Nom...", "Name...") ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description"><?php if (what_langauge() == 0) : ?>Description<?php else : ?>Description<?php endif; ?><span class="text-danger"><?php if (what_langauge() == 0) : ?>(254 caractères maximum)<?php else : ?>(254 characters maximum)<?php endif; ?></span></label>
                        <textarea value="<?= $data1["description"] ?? '' ?>" type="text" id="description" name="description" rows="2" class="form-control form-control-user bg-dark text-light md-textarea"></textarea>
                    </div>

                </fieldset>
                <?php if (!isset($case1)) : ?>
                    <div class="float-none">
                        <button name="submit_name" type="submit" class="btn  btn-info rounded">
                            <?php if (what_langauge() == 0) : ?>Suivant<?php else : ?>Next<?php endif; ?>
                        </button>
                    </div>
                <?php else : ?>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link bg-transparent <?php if (isset($case1)) : ?>active<?php endif; ?>" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="<?php if (isset($case1)) : ?>true<?php else : ?>false<?php endif; ?>"></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link bg-transparent <?php if (!isset($case1)) : ?>active<?php endif; ?>" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="<?php if (!isset($case1)) : ?>true<?php else : ?>false<?php endif; ?>"></a>
                        </li>
                    </ul>
                <?php endif; ?>
            </form>

        </div>
        <div class="col-sm-7 col-md-7 col-lg-7 col-xl-8">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade mx-5 my-2<?php if (!isset($case1)) : ?>show active<?php endif; ?>" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                </div>
                <div class="tab-pane fade mx-5 my-2 show<?php if (isset($case1)) : ?> active<?php endif; ?>" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form class="mb-5" enctype="multipart/form-data" method="post" action="worker.php?page=controllers/worker/directions/add_direction_controller&access_id=<?= $access_id ?>">

                        <div class="m-b-30 mb-3">
                            <fieldset <?php
                                        if (isset($case2)) {
                                            echo "disabled";
                                        } ?>>
                                <legend>
                                    <h6 class="card-title m-b-20 row justify-content-left"><?php language_content("Accorder l'accès aux module(s) :", "Granting access to the module(s): ") ?></h6>
                                </legend>
                                <ul class="list-group bg-gradient-dark text-info">
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

                            </fieldset>

                            <?php if (!isset($case2)) : ?>
                                <div class="row justify-content-center mt-3">
                                    <div class="col-6 row justify-content-center">
                                        <button name="submit_module_back" type="submit" class="btn  btn-secondary rounded">
                                            <?php if (what_langauge() == 0) : ?>Précédent<?php else : ?>Back<?php endif; ?>
                                        </button>
                                    </div>
                                    <div class="col-6 row justify-content-center">
                                        <button name="submit_module" type="submit" class="btn  btn-info rounded">
                                            <?php if (what_langauge() == 0) : ?>Suivant<?php else : ?>Next<?php endif; ?>
                                        </button>
                                    </div>
                                </div>
                            <?php else : ?>
                                <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link bg-transparent <?php if (isset($case2)) : ?>active<?php endif; ?>" id="pills-profile-tab2" data-toggle="pill" href="#pills-profile2" role="tab" aria-controls="pills-profile2" aria-selected="<?php if (isset($case2)) : ?>true<?php else : ?>false<?php endif; ?>"></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link bg-transparent <?php if (!isset($case2)) : ?>active<?php endif; ?>" id="pills-home-tab2" data-toggle="pill" href="#pills-home2" role="tab" aria-controls="pills-home2" aria-selected="<?php if (!isset($case2)) : ?>true<?php else : ?>false<?php endif; ?>"></a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </form>

                    <div class="tab-content" id="pills-tabContent2">

                        <div class="tab-pane fade mx-5 my-2<?php if (!isset($case2)) : ?>show active<?php endif; ?>" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2">

                        </div>

                        <div class="tab-pane fade show<?php if (isset($case2)) : ?> active<?php endif; ?>" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab2">
                            <div class="table-responsive mt-3">
                                <table class="table table-striped text-light" width="100%" cellspacing="0">
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
                                    <form class="mb-5" enctype="multipart/form-data" method="post" action="worker.php?page=controllers/worker/directions/add_direction_controller&access_id=<?= $access_id ?>">
                                        <tbody>
                                            <?php if ($data2["non1"] == 1) : ?>
                                                <tr>
                                                    <td><?php language_content("Activer les utilisateurs", "Activate users") ?></td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="u1" value="0">
                                                        <input type="checkbox" name="ur" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="u2" value="0">
                                                        <input type="checkbox" name="uw" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="u3" value="0">
                                                        <input type="checkbox" name="uc" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="u4" value="0">
                                                        <input type="checkbox" name="ud" value="1">
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if ($data2["non2"] == 1) : ?> 
                                                <tr>
                                                    <td><?php language_content("Gestion des Directions", "Directions management") ?></td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="d1" value="0">
                                                        <input type="checkbox" name="dr" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="d2" value="0">
                                                        <input type="checkbox" name="dw" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="d3" value="0">
                                                        <input type="checkbox" name="dc" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="d4" value="0">
                                                        <input type="checkbox" name="dd" value="1">
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if ($data2["non3"] == 1) : ?>
                                                <tr>
                                                    <td><?php language_content("Gestions des employés", "Employee management") ?></td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="e1" value="0">
                                                        <input type="checkbox" name="er" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="e2" value="0">
                                                        <input type="checkbox" name="ew" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="e3" value="0">
                                                        <input type="checkbox" name="ec" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="e4" value="0">
                                                        <input type="checkbox" name="ed" value="1">
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if ($data2["non4"] == 1) : ?>
                                                <tr>
                                                    <td><?php language_content("Gestion fichiers d'entreprise", "Company's files management") ?></td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="f1" value="0">
                                                        <input type="checkbox" name="fr" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="f2" value="0">
                                                        <input type="checkbox" name="fw" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="f3" value="0">
                                                        <input type="checkbox" name="fc" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="f4" value="0">
                                                        <input type="checkbox" name="fd" value="1">
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if ($data2["non5"] == 1) : ?>
                                                <tr>
                                                    <td><?php language_content("Gestion des droits d'accès", "Module Access") ?></td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="a1" value="0">
                                                        <input type="checkbox" name="ar" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="a2" value="0">
                                                        <input type="checkbox" name="aw" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="a3" value="0">
                                                        <input type="checkbox" name="ac" value="1">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="a4" value="0">
                                                        <input type="checkbox" name="ad" value="1">
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td <?php if (isset($test)) : ?> colspan="1" <?php else : ?>colspan="2" <?php endif; ?>>
                                                    <div class="row justify-content-center">
                                                        <button name="submit_permission_back" type="submit" class="btn  btn-secondary rounded">
                                                            <?php if (what_langauge() == 0) : ?>Précédent<?php else : ?>Back<?php endif; ?>
                                                        </button>
                                                    </div>
                                                </td>
                                                <?php if (isset($test)) : ?>
                                                    <td colspan="2">
                                                        <div class="row justify-content-center">
                                                            <button type="reset" class="btn  btn-danger rounded">
                                                                <?php if (what_langauge() == 0) : ?>Réinitialiser<?php else : ?>Reset<?php endif; ?>
                                                            </button>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                                <td <?php if (isset($test)) : ?> colspan="2" <?php else : ?>colspan="3" <?php endif; ?>>
                                                    <div class="row justify-content-center">
                                                        <button name="submit_permission" type="submit" class="btn  btn-success rounded">
                                                            <?php if (what_langauge() == 0) : ?>Enregistrer<?php else : ?>Save<?php endif; ?>
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
                </div>
            </div>
        </div>
    </div>
</div>