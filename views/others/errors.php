<?php if (isset($error_content) || isset($_GET['error_content'])) : ?>
    <!-- <div class="row mx-0 pt-4 justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $error_content ?? $_GET['error_content']  ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->

    <script>
        Swal.fire('<?= $error_content ?? $_GET['error_content']  ?>', ' ', 'error');
    </script>

<?php endif; ?>

<?php if (isset($error_success) || isset($_GET['error_success'])) : ?>
    <!-- <div class="row mx-0 pt-4 justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?= $error_success ?? $_GET['error_success'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->

    <script>
        Swal.fire('<?= $error_success ?? $_GET['error_success'] ?>', ' ', 'success');
    </script>

<?php endif; ?>

<?php if (isset($_REQUEST['success']) && $_GET['success'] = 1) : ?>
    <!-- <div class="row mx-0 pt-4 justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?= language_content("Compte créer avec succès", "Account create with success") ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->

    <script>
        Swal.fire('<?= language_content("Compte créer avec succès", "Account create with success") ?>', ' ', 'success');
    </script>;

<?php endif; ?>