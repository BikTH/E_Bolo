<h1 class="h3 mb-2 mt-3 text-light"><i class="fas fa-fw fa-file-alt"></i><?= language_content("Mes Fichiers", " My Files") ?></h1>

<?php include('views\others\errors.php'); ?>
<!-- DataTales Example -->
<div class="card bg-transparent shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-dark"></i><?= language_content("fichiers de: ", "Files of: "). $_SESSION["user_name"]." ".$_SESSION["user_prename"] ?></h6>
            </div>
            <div class="col-6 row justify-content-end">
                <a href="admin3.php?page=views/admin3/files_worker/upload_files" class="btn btn-info btn-sm float-right"><i class="fas fa-fw fa-upload"></i><?php language_content("Mettre en ligne un fichier", "Upload a file") ?></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><?php language_content("Nom du fichier", "Name of file fichier") ?></th>
                        <th><?php language_content("Type de Fichier", "Type of file") ?></th>
                        <th><?php language_content("Créer le", "Created At") ?></th>
                        <th><?php language_content("Dernière modification", "Last modification") ?></th>
                        <th><?php language_content("Option", "option") ?></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
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
                    $lists = My_file($db);
                    while ($list = mysqli_fetch_assoc($lists)) :
                        //die(var_dump($list));
                    ?>

                    
                        <tr class="text-light ">
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
                                    <a href="admin3.php?page=controllers\admin3\files_worker\preview_file_controller&file_id=<?= $list['fileId'] ?>" class="btn btn-light btn-sm float-right"> <i class="fas fa-fw fa-eye"></i></a>
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
                                <div class=" btn-lg btn-group">
                                    <a href="admin3.php?page=controllers/admin3/files_worker/edit_files_controller&file_id=<?= $list['fileId'] ?>" class="btn btn-outline-info "> <i class="fas fa-fw fa-pen"></i></a> 
                                    <a href="<?= $list["filePosition"] ?>" download class="btn btn-outline-warning "> <i class="fas fa-fw fa-download"></i> </a>
                                    <a href="admin3.php?page=controllers/admin3/files_worker/share_files_controller&file_id=<?= $list['fileId'] ?>" class="btn btn-outline-success text-success"> <i class="fas fa-fw fa-share-alt"></i> </a>
                                    <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_file<?= $compt ?>"><i class="fas fa-fw fa-trash"></i> </a>
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
                                        <a class="btn btn-danger" href="admin3.php?page=controllers/admin3/files_worker/delete_files_controller&file_id=<?= $list["fileId"] ?>"><?php language_content("Supprimer", "Delete") ?></a>
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