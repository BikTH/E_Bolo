<?php
$test = detail_of_access($_SESSION["user_access"], $db);

?>

<h1 class="h3 mb-2 mt-3 text-light"><i class="fas fa-fw fa-file-alt"></i><?= language_content("Fichiers de l'entreprise", "Company's Files") ?></h1>

<?php include('views\others\errors.php'); ?>
<!-- DataTales Example -->
<div class="card bg-transparent shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-dark"></i><?= language_content("Liste de fichiers", "Files's list") ?></h6>
            </div>
            <div class="col-6 row justify-content-end">
                <?php if ($test["f3"] == 1) : ?>
                    <a href="admin3.php?page=views/admin3/company_files/upload_files" class="btn btn-info btn-sm float-right"><i class="fas fa-fw fa-upload"></i><?php language_content("Mettre en ligne un fichier", "Upload a file") ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><?php language_content("Mis en ligne par", "Updload By") ?>
                        <th><?php language_content("Nom du fichier", "Name of file fichier") ?></th>
                        <th><?php language_content("Type de Fichier", "Type of file") ?></th>
                        <th><?php language_content("Créer le", "Created At") ?></th>
                        <th><?php language_content("Dernière modification", "Last modification") ?></th>
                        <th><?php language_content("Option", "option") ?></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th><?php language_content("Mis en ligne par", "Updload By") ?>
                        <th><?php language_content("Nom du fichier", "Name of file fichier") ?></th>
                        <th><?php language_content("Type de Fichier", "Type of file") ?></th>
                        <th><?php language_content("Créer le", "Created At") ?></th>
                        <th><?php language_content("Dernière modification", "Last modification") ?></th>
                        <th><?php language_content("Option", "option") ?></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $compt = 1;
                    $lists = Company_files($db);
                    while ($list = mysqli_fetch_assoc($lists)) :
                        //die(var_dump($list));
                    ?>


                        <tr class="text-light ">
                            <td class="align-middle">
                                <img class="img-profile rounded" width="40" height="40" src="<?= user_avatar_by_id2($list, $db) ?>">
                                <?= $list['userName'] . " " . $list['userPrename'] ?>
                                <?php if ($test["e1"] == 1) : ?>
                                    <a href="#" class=" float-right btn btn-light btn-sm " data-toggle="modal" data-target="#info_director<?= $compt ?>"> <i class="fas fa-fw fa-eye"></i> </a>
                                <?php endif; ?>
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
                                <?php $info = new SplFileInfo($list["fileName"]); ?>
                                <?= $info->getFilename() ?>
                            </td>
                            <td class="" scope="row">
                                <?php $info = new SplFileInfo($list["filePosition"]); ?>

                                <img class="float-left" src="<?= type_of_file($info->getExtension()) ?>" alt="000" width="100" height="100" class="text-center">
                                <p class="text-center">
                                    <?= name_of_type($info->getExtension()) ?>
                                </p>
                                <?php if (name_of_type($info->getExtension()) == "PDF" || name_of_type($info->getExtension()) == "IMAGE") : ?>
                                    <?php if ($test["f1"] == 1) : ?>
                                        <a href="admin3.php?page=controllers\admin3\company_files\preview_file_controller&file_id=<?= $list['fileId'] ?>" class="btn btn-light btn-sm float-right"> <i class="fas fa-fw fa-eye"></i></a>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </td>
                            <td class="align-middle">
                                <?= date_formatter($list['fileCreatedAt'], 'd M Y') . " à " . date_formatter($list['fileCreatedAt'], 'h:i:s')  ?>
                            </td>
                            <td class="align-middle">
                                <?php if ($list["fileUpdatedAt"] == NULL) : ?>
                                    ////
                                <?php else : ?>
                                    <?= date_formatter($list['fileUpdatedAt'], 'd M Y') . " à " . date_formatter($list['fileUpdatedAt'], 'h:i:s')  ?>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class=" btn-lg ">
                                    <!-- <a href="admin3.php?page=controllers/admin3/company_files/edit_files_controller&file_id=<?= $list['fileId'] ?>" class="btn btn-info "> <i class="fas fa-fw fa-pen"></i></a> -->
                                    <?php if ($test["f1"] == 1) : ?>
                                        <a href="<?= $list["filePosition"] ?>" download class="btn btn-warning "> <i class="fas fa-fw fa-download"></i> </a>
                                        <a href="admin3.php?page=controllers/admin3/company_files/share_files_controller&file_id=<?= $list['fileId'] ?>" class="btn btn-outline-success text-success"> <i class="fas fa-fw fa-share-alt"></i> </a>
                                    <?php endif; ?>
                                    <?php if ($test["f4"] == 1) : ?>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete_file<?= $compt ?>"><i class="fas fa-fw fa-trash"></i> </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <div id="delete_file<?= $compt ?>" class="modal fade delete-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-gradient-dark">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Supprimer ce fichier", "Delete this file") ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="public/images/sent.png" alt="" width="50" height="46">
                                        <h3><?= language_content("Etes-vous sûr de vouloir Supprimer Ce fichier: ", "Do you really want to delete this File: ") ?> "<?= $list["fileName"] ?>" </h3>
                                    </div>
                                    <div class="modal-footer m-auto">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                                        <a class="btn btn-danger" href="admin3.php?page=controllers/admin3/company_files/delete_files_controller&file_id=<?= $list["fileId"] ?>"><?php language_content("Supprimer", "Delete") ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $compt += 1;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>