
<!-- DataTales Example -->
<div class="card bg-transparent mt-3 border-0 shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-dark"></i><?= language_content("Télécharger fichiers", "Download Files") ?></h6>
            </div>
        </div>
    </div>
    <div class="card-body">
    <?php include('views\others\errors.php'); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><?php language_content("Nom du fichier", "Name of file ") ?></th>
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
                    ?>
                        <tr class="text-light">
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
                                    <a href="worker.php?page=controllers\worker\files_worker\preview_file_controller&file_id=<?= $list['fileId'] ?>" class="btn btn-outline-light btn-sm float-right"> <i class="fas fa-fw fa-eye"></i></a>
                                <?php endif; ?>

                            </td>
                            <td class="align-middle">
                                <?= date_formatter($list['fileCreatedAt'], 'd M Y') . " à " . date_formatter($list['fileCreatedAt'], 'h:i:s')  ?>
                            </td>
                            <td class="align-middle">
                                <?php if (empty($list["fileUpdatedAt"])) : ?>
                                    ////
                                <?php else : ?>
                                    <?= date_formatter($list['fileUpdatedAt'], 'd M Y') . " à " . date_formatter($list['fileUpdatedAt'], 'h:i:s')  ?>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="">
                                    <a href="<?= $list["filePosition"] ?>" download class="btn btn-outline-success text-success"><?php language_content("Télécharger","Download")?> <i class="fas fa fa-fw fa-download"> </i> </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>