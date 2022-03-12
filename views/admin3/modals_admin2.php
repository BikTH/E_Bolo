<!-- Déconnexion -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-gradient-dark">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5> -->
                <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Voulez vous vous déconnecter ?", "Do you want to logout ?") ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div> -->
            <div class="modal-body"><?php language_content("sélectionnez \"Déconnexion\" si vous souhaitez vraiment vous déconnecter.", " Select \"Logout\" if you really wish to Logout") ?></div>
            <div class="modal-footer">
                <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                <a class="btn btn-primary" href="admin3.php?page=controllers/users/logout_controller&close_session=1"><?php language_content("Déconnexion", "Logout") ?></a>
            </div>
        </div>
    </div>
</div>

<div id="delete" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-gradient-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Bloquer un Employé?", "Block an employee?") ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="public/images/sent.png" alt="" width="50" height="46">
                <h3><?php language_content("Etes-vous sûr de vouloir bloquer cet employé?", "Do you really want to block this employee?") ?></h3>
            </div>
            <div class="modal-footer m-auto">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                <a class="btn btn-danger" href="admin3.php?page=controllers/admin3/employees/bann_employee_controller&user_id=<?= $list["userId"] ?>"><?php language_content("Supprimer", "Delete") ?></a>
            </div>
        </div>

    </div>
</div>

<div id="delete_template" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-gradient-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Supprimer un Modèle", "Delete a template") ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="public/images/sent.png" alt="" width="50" height="46">
                <h3><?= language_content("Etes-vous sûr de vouloir Supprimer le modèle: ", "Do you really want to delete template name: ") ?> " <?php if(isset($list["name"])): ?> <?= $list["name"] ?> <?php endif; ?>" </h3>
            </div>
            <div class="modal-footer m-auto">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                <a class="btn btn-danger" href="admin3.php?page=controllers/admin3/right_of_access/delete_access_controller&access_id=<?php if(isset($list["access_id"])): ?><?= $list["access_id"] ?><?php endif; ?>"><?php language_content("Supprimer", "Delete") ?></a>
            </div>
        </div>

    </div>