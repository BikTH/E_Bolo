<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active text-decoration-none text-secondary" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
      <?php language_content("Comptes Inactifs", "Inactives Accounts") ?>
    </a>
    <a class="nav-link text-decoration-none text-secondary" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
      <?php language_content("Comptes Bannis", "Banned Accounts") ?>
    </a>
    <!-- <a class="nav-link text-decoration-none text-secondary" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile2" aria-selected="false">
      <?php language_content("Message de comptes Bloqués", "Message from banned accounts") ?>
    </a> -->
  </div>
</nav>
<div class="tab-content my-3" id="nav-tabContent">

  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

    <h1 class="h3 mt-2 mb-2 text-Light"><i class="fas fa fw fa-user-lock"></i><?php language_content(" Liste des comptes Employés Inactifs", " list of inactives employees") ?></h1>

    <!-- DataTales Example -->
    <div class="card bg-transparent shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark"><?php language_content("Compte Inactif", "Inactive Account") ?></h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th><?php language_content("Nom", "Name") ?></th>
                <th><?php language_content("Image", "Image") ?></th>
                <th><?php language_content("Genre", "Gender") ?></th>
                <th><?php language_content("Date Naissance", "Birthday") ?></th>
                <th><?php language_content("Age", "Age") ?></th>
                <th><?php language_content("Inscrit le", "Registered on") ?></th>
                <th><?php language_content("Options", "Options") ?></th>
              </tr>
            </thead>
            <tfoot>
              <tr>

              </tr>
            </tfoot>
            <tbody>
              <?php
              $compt = 1;
              $lists = list_unactive_user($_SESSION["user_company"], $db);
              while ($list = mysqli_fetch_assoc($lists)) :
              ?>
                <tr class="text-light ">
                  <td><?= $list['userName'] . " " . $list['userPrename'] ?></td>
                  <td class="align-middle">
                    <?php if (check_user_avatar($list['userId'], $db) == 0) : ?>
                      <img class="img-profile rounded" width="40" height="40" src="public/images/user/avatar1.png">
                    <?php else : ?>
                      <img class="img-profile rounded" width="40" height="40" src="public/images/companies/users/<?= $list['userName'] . $list['userPrename'] ?>/avatar/<?= select_user_avatar($_SESSION["user_id"], $db) ?> ">
                    <?php endif; ?>
                  </td>
                  <td><?= $list['userGender'] ?></td>
                  <td><?= date_formatter($list['userBirthday'], 'd M Y')  ?></td>
                  <td><?= user_age($list['userBirthday'])  ?></td>
                  <td><?= date_formatter($list['userAddedAt'], 'd M Y') . " à " . date_formatter($list['userAddedAt'], 'h:i:s')  ?></td>
                  <td class="text-center">
                    <div class="btn-group">
                      <a href="#" class="btn btn-user rounded-left btn-outline-danger" data-toggle="modal" data-target="#delete_director<?= $compt ?>"><?php language_content("Bannir", "Bann") ?><i class="fas fa-trash-alt"></i></a>
                      <a href="#" class="btn btn-outline-success btn-sm text-success rounded-right" data-toggle="modal" data-target="#info_director<?= $compt ?>"> <i class="fas fa-fw fa-check-square"></i><?php language_content("Activer", "Activate") ?></a>
                    </div>
                  </td>
                </tr>
                <div id="info_director<?= $compt ?>" class="modal fade delete-modal" role="dialog">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-gradient-dark">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Vous allez activer cet utilisateur", "Do you want to activate this user") ?></h5>
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
                                  <input id="name" type="text" value="<?= $list['userName'] . " " . $list['userPrename'] ?>" class="form-control form-control-user bg-transparent text-light">
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
                                  <input id=" contact " value="<?= $list['userPhone'] ?>" type="text" class="form-control form-control-user bg-transparent text-light">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="mb-3 mb-sm-0">
                                  <label for=" gender "><?php if (what_langauge() == 0) : ?>Genre<?php else : ?>Gender<?php endif; ?></label>
                                  <input id=" contact " value="<?= $list['userGender'] ?>" type="text" class="form-control form-control-user bg-transparent text-light">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for=" email "><?php if (what_langauge() == 0) : ?>Adresse Email<?php else : ?>Email Adress<?php endif; ?></label>
                              <input id=" email " value="<?= $list['userEmail'] ?>" type="text" class="form-control form-control-user bg-transparent text-light">
                            </div>
                          </fieldset>

                        </form>
                      </div>
                      <div class="modal-footer m-auto">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Fermer", "Close") ?></button>
                        <a class="btn btn-info" href="admin2.php?page=controllers/admin2/activate_user_controller&User_Id=<?= $list['userId'] ?>"><?php language_content("Activer", "Activate") ?></a>
                      </div>
                    </div>

                  </div>
                </div>

                <div id="delete_director<?= $compt ?>" class="modal fade delete-modal" role="dialog">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-gradient-dark">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Bannir Compte utilisateur !", "Bann User account !") ?> </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <img src="public/images/sent.png" alt="" width="50" height="46">
                        <h3><?= language_content("Voulez vous vraiment Bannir le compte de:", "Do you really want to bann the account of:") ?> <?= " " .  $list['userName'] . " " . $list['userPrename'] ?> </h3>
                      </div>
                      <div class="modal-footer m-auto">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Annuler", "Cancel") ?></button>
                        <a class="btn btn-danger" href="admin2.php?page=controllers/admin2/block_user_controller&User_Id=<?= $list['userId'] ?>"><?php language_content("Supprimer", "Delete") ?></a>
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

  </div>

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

    <h1 class="m-0 font-weight-bold text-light"><i class="fas fw fa-user-injured"></i><?php language_content(" Liste des comptes Bannis", " List of banned accounts") ?></h1>
    <p class=" p-2">
      <i class="fas fw fa-info-circle"></i>
      <?php language_content("Les utilisateurs activés ici seront inscrits dans la liste des comptes Inactifs !", "Users activated here will be registered in the list of inactive accounts !") ?>
    </p>

    <!-- DataTales Example -->
    <div class="card bg-transparent shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark"><?php language_content("Utilisateurs Bannis", "Banned users") ?></h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="dataTable1" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th><?php language_content("Nom", "Name") ?></th>
                <th><?php language_content("Image", "Image") ?></th>
                <th><?php language_content("Genre", "Gender") ?></th>
                <th><?php language_content("Date Naissance", "Birthday") ?></th>
                <th><?php language_content("Age", "Age") ?></th>
                <th><?php language_content("Inscrit le", "Registered on") ?></th>
                <th><?php language_content("Options", "Options") ?></th>
              </tr>
            </thead>
            <tfoot>
              <tr>

              </tr>
            </tfoot>
            <tbody>
              <?php
              $lists = list_of_bann_user($_SESSION["user_company"], $db);
              while ($list = mysqli_fetch_assoc($lists)) :
              ?>
                <tr class="text-light ">
                  <td><?= $list['userName'] . " " . $list['userPrename'] ?></td>
                  <td class="align-middle">
                    <?php if (check_user_avatar($list['userId'], $db) == 0) : ?>
                      <img class="img-profile rounded" width="40" height="40" src="public/images/user/avatar1.png">
                    <?php else : ?>
                      <img class="img-profile rounded" width="40" height="40" src="public/images/companies/users/<?= $list['userName'] . $list['userPrename'] ?>/avatar/<?= select_user_avatar($_SESSION["user_id"], $db) ?> ">
                    <?php endif; ?>
                  </td>
                  <td><?= $list['userGender'] ?></td>
                  <td><?= date_formatter($list['userBirthday'], 'd M Y')  ?></td>
                  <td><?= user_age($list['userBirthday'])  ?></td>
                  <td><?= date_formatter($list['userAddedAt'], 'd M Y') . " à " . date_formatter($list['userAddedAt'], 'h:i:s')  ?></td>
                  <td class="text-center">
                    <div class="btn-group">
                      <a href="#" class="btn btn-outline-success btn-sm text-success" data-toggle="modal" data-target="#inf_director<?= $compt ?>"> <i class="fas fa-fw fa-check-square"></i><?php language_content("Activer", "Activate") ?></a>
                    </div>
                  </td>
                </tr>

                <div id="inf_director<?= $compt ?>" class="modal fade delete-modal" role="dialog">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-gradient-dark">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php language_content("Vous allez activer cet utilisateur", "Do you want to activate this user") ?></h5>
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
                                  <input id="name" type="text" value="<?= $list['userName'] . " " . $list['userPrename'] ?>" class="form-control form-control-user bg-transparent text-light">
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
                                  <input id=" contact " value="<?= $list['userPhone'] ?>" type="text" class="form-control form-control-user bg-transparent text-light">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="mb-3 mb-sm-0">
                                  <label for=" gender "><?php if (what_langauge() == 0) : ?>Genre<?php else : ?>Gender<?php endif; ?></label>
                                  <input id=" contact " value="<?= $list['userGender'] ?>" type="text" class="form-control form-control-user bg-transparent text-light">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for=" email "><?php if (what_langauge() == 0) : ?>Adresse Email<?php else : ?>Email Adress<?php endif; ?></label>
                              <input id=" email " value="<?= $list['userEmail'] ?>" type="text" class="form-control form-control-user bg-transparent text-light">
                            </div>
                          </fieldset>

                        </form>
                      </div>
                      <div class="modal-footer m-auto">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Fermer", "Close") ?></button>
                        <a class="btn btn-info" href="admin2.php?page=controllers/admin2/block_user_controller&User_Id=<?= $list['userId'] ?>&test=1"><?php language_content("Activer", "Activate") ?></a>
                      </div>
                    </div>

                  </div>
                </div>

              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab2">
    test echo
  </div>

</div>