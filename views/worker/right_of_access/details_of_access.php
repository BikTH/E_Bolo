<div class="content m-5">
    <div class="row justify-content-center my-3">
        <h4 class="page-title"><?= language_content("Nom du modèle: \"", "Template's name: \"") ?><?= $list["name"] . "\"" ?> </h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <a class=" btn btn-block btn-outline-inverse rounded" href="worker.php?page=controllers/worker/right_of_access/edit_access_controller&access_id1=<?= $list["access_id"] ?>"> <i class="fas fa-pen text-info"> <?= language_content(" Modifier modèle", " Edit template") ?> </i> </a>
        </div>
        <div class="col-6 text-center">
            <a class=" btn btn-block btn-outline-inverse rounded" href="#" data-toggle="modal" data-target="#delete_template"> <i class="fas fa-trash text-danger"><?= language_content(" Supprimer modèle", " Delete template") ?></i> </a>
        </div>
    </div>
    <?php include 'views/others/errors.php'?>

    <div class="row">

        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-0">

        </div>

        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-12">
            <div class="table-responsive mt-3">
                <table class="table table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center"><?php language_content("Description", "Description") ?></th>
                            <th class="text-center"><?php language_content("Créer par", "Create By") ?></th>
                            <th class="text-center"><?php language_content("Créer le", "Create At") ?></th>
                        </tr>
                    </thead>
                    <form class="mb-5">
                        <fieldset disabled>
                            <tbody class=" text-light ">
                                <tr>
                                    <td class="text-center">
                                        <?= $list["description"] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= user_name_poste($list["userId"], $db) ?>
                                    </td>
                                    <td class="text-center">
                                        <?= date_formatter($list['accessCreatedAt'], 'd M Y') . " à " . date_formatter($list['accessCreatedAt'], 'h:i:s')  ?>
                                    </td>
                                </tr>
                            </tbody>
                        </fieldset>
                    </form>
                </table>
            </div>

            <form class="mb-5" method="" action="">
                <div class="m-b-30 mb-3">
                    <fieldset disabled>
                        <legend>
                            <h6 class="card-title m-b-20 row justify-content-left"><?php language_content("Accorder l'accès aux module(s) :", "Granting access to the module(s): ") ?></h6>
                        </legend>
                        <ul class="list-group bg-gradient-dark text-info">
                            <li class="list-group-item">
                                <?php language_content("Activer les utilisateurs", "Activate users") ?>
                                <div class="material-switch float-right">
                                    <input id="staff_module" type="checkbox" <?php if ($list["non1"] == 1) : ?>checked="" <?php endif; ?>>
                                    <label for="staff_module" class="badge-info"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <?php language_content("Gestion des Directions", "Directions management") ?>
                                <div class="material-switch float-right">
                                    <input id="holidays_module" type="checkbox" <?php if ($list["non2"] == 1) : ?>checked="" <?php endif; ?>>
                                    <label for="holidays_module" class="badge-info"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <?php language_content("Gestions des employés", "Employee management") ?>
                                <div class="material-switch float-right">
                                    <input id="leave_module" type="checkbox" <?php if ($list["non3"] == 1) : ?>checked="" <?php endif; ?>>
                                    <label for="leave_module" class="badge-info"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <?php language_content("Gestion fichiers d'entreprise", "Company's files management") ?>
                                <div class="material-switch float-right">
                                    <input id="events_module" type="checkbox" <?php if ($list["non4"] == 1) : ?>checked="" <?php endif; ?>>
                                    <label for="events_module" class="badge-info"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <?php language_content("Gestion des droits d'accès", "Module Access") ?>
                                <div class="material-switch float-right">
                                    <input id="chat_module" type="checkbox" <?php if ($list["non5"] == 1) : ?>checked="" <?php endif; ?>>
                                    <label for="chat_module" class="badge-info"></label>
                                </div>
                            </li>
                        </ul>

                    </fieldset>
                </div>
            </form>

            <div class="table-responsive mt-3">
                <table class="table table-striped text-light" width="100%" cellspacing="0">
                    <?php if ($list["non1"] == 1 || $list["non2"] == 1 || $list["non3"] == 1 || $list["non4"] == 1 || $list["non5"] == 1) : ?>
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
                    <form class="mb-5">
                        <fieldset disabled >
                            <tbody>
                                <?php if ($list["non1"] == 1) : ?>
                                    <tr>
                                        <td><?php language_content("Activer les utilisateurs", "Activate users") ?></td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["u1"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["u2"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["u3"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["u4"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php if ($list["non2"] == 1) : ?>
                                    <tr>
                                        <td><?php language_content("Gestion des Directions", "Directions management") ?></td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["d1"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["d2"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["d3"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["d4"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php if ($list["non3"] == 1) : ?>
                                    <tr>
                                        <td><?php language_content("Gestions des employés", "Employee management") ?></td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["e1"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["e2"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["e3"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["e4"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php if ($list["non4"] == 1) : ?>
                                    <tr>
                                        <td><?php language_content("Gestion fichiers d'entreprise", "Company's files management") ?></td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["f1"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["f2"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["f3"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["f4"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php if ($list["non5"] == 1) : ?>
                                    <tr>
                                        <td><?php language_content("Gestion des droits d'accès", "Module Access") ?></td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["a1"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["a2"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["a3"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" <?php if ($list["a4"] == 1) : ?>checked="" <?php endif; ?>>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </fieldset>
                    </form>
                </table>
            </div>
        </div>

        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-0">

        </div>

    </div>
</div>

