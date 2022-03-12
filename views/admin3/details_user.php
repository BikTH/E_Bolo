<div class="container">
    <div class="row my-2">
        <div class="col-lg-4 order-lg-1 text-center">
            <img src=<?= user_avatar_by_id($list, $db) ?> style="max-width: 100%; height: 300px; width: 300px;" class="mx-auto img-fluid img-circle d-block" alt="avatar">

        </div>
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item"> <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Informations</a> </li>
                <!-- <li class="nav-item"> <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Messages</a> </li>
                <li class="nav-item"> <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a> </li> -->
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <form class="user" method="post">
                        <fieldset disabled>
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
                                        <label for="name"><?php language_content("Nom", "First Name") ?></label>
                                        <input id="name" type="text" value="<?= $list['userName'] ?>" class="form-control form-control-user bg-dark text-light">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 mb-sm-0">
                                        <label for="prename"><?php language_content("Prénom", "Last Name") ?></label>
                                        <input id="prename" type="text" value="<?= $list['userPrename'] ?>" class="form-control form-control-user bg-dark text-light">
                                    </div>
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
                                <label for=" birthday "><?php language_content("Date de Naissance", "Birthday") ?></label>
                                <input id=" birthday " value="<?= date_formatter($list['userBirthday'], ' j M Y')   ?>" type="text" class="form-control form-control-user bg-dark text-light">
                            </div>

                            <div class="row mt-0 mb-0">
                                <div class=" col offset-xl-2">
                                    <hr class="border border-info">
                                </div>
                                <div class="col-xl-2"></div>
                            </div>

                            <div class="form-group">
                                <label for=" email "><?php if (what_langauge() == 0) : ?>Adresse Email<?php else : ?>Email Adress<?php endif; ?></label>
                                <input id=" email " value="<?= $list['userEmail'] ?>" type="text" class="form-control form-control-user bg-dark text-light">
                            </div>
                        </fieldset>
                        <div class=" form-group row ">
                            <div class="col-sm-6">
                                <div class="mb-3 mb-sm-0">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 mb-sm-0">
                                    <a href="admin3.php?page=controllers/admin3/activate_user_controller&User_Id=<?= $list['userId'] ?>" class="btn btn-user btn-block btn-outline-success text-success"> <i class="fas fa-fw fa-check-square"></i><?php language_content(" Activer", " Activate") ?></a>
                                </div>
                            </div>
                        </div>
                        <?php include('views/admin3/modals_admin3.php'); ?>

                    </form>

                    <!--/row-->
                </div>
                <!-- <div class="tab-pane" id="messages">
                    <div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user. </div>
                    <table class="table table-hover table-striped">
                        <tbody>
                            <tr>
                                <td> <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the.. </td>
                            </tr>
                            <tr>
                                <td> <span class="float-right font-weight-bold">Yesterday</span> There has been a request on your account since that was.. </td>
                            </tr>
                            <tr>
                                <td> <span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus. </td>
                            </tr>
                            <tr>
                                <td> <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros eget luctus. </td>
                            </tr>
                            <tr>
                                <td> <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the fix for tibulum tincidunt ullamcorper eros. </td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <!-- <div class="tab-pane" id="edit">
                    <form role="form">
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9"> <input class="form-control" type="text" value="Jane"> </div>
                        </div>
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9"> <input class="form-control" type="text" value="Bishop"> </div>
                        </div>
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9"> <input class="form-control" type="email" value="email@gmail.com"> </div>
                        </div>
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label">Company</label>
                            <div class="col-lg-9"> <input class="form-control" type="text" value=""> </div>
                        </div>
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label">Website</label>
                            <div class="col-lg-9"> <input class="form-control" type="url" value=""> </div>
                        </div>
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label">Address</label>
                            <div class="col-lg-9"> <input class="form-control" type="text" value="" placeholder="Street"> </div>
                        </div>
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-6"> <input class="form-control" type="text" value="" placeholder="City"> </div>
                            <div class="col-lg-3"> <input class="form-control" type="text" value="" placeholder="State"> </div>
                        </div>
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                            <div class="col-lg-9"> <select id="user_time_zone" class="form-control" size="0">
                                    <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                    <option value="Alaska">(GMT-09:00) Alaska</option>
                                    <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                    <option value="Arizona">(GMT-07:00) Arizona</option>
                                    <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                    <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                    <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                    <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                </select> </div>
                        </div>
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9"> <input class="form-control" type="text" value="janeuser"> </div>
                        </div>
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9"> <input class="form-control" type="password" value="11111122333"> </div>
                        </div>
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                            <div class="col-lg-9"> <input class="form-control" type="password" value="11111122333"> </div>
                        </div>
                        <div class="form-group row"> <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9"> <input type="reset" class="btn btn-secondary" value="Cancel"> <input type="button" class="btn btn-primary" value="Save Changes"> </div>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row my-2">
        <div class="col-lg-4 order-lg-1 text-center">
            <img src=<?= user_avatar_by_id($list, $db) ?> style="max-width: 100%; height: 300px; width: 300px;" class="mx-auto img-fluid img-circle rounded-circle d-block" alt="avatar">
        </div>
        <div class="col-lg-8 order-lg-2">
            <form class="user" method="post">
                <fieldset disabled>
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
                                <label for="name"><?php language_content("Nom", "First Name") ?></label>
                                <input id="name" type="text" value="<?= $list['userName'] ?>" class="form-control form-control-user bg-dark text-light">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 mb-sm-0">
                                <label for="prename"><?php language_content("Prénom", "Last Name") ?></label>
                                <input id="prename" type="text" value="<?= $list['userPrename'] ?>" class="form-control form-control-user bg-dark text-light">
                            </div>
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
                        <label for=" birthday "><?php language_content("Date de Naissance", "Birthday") ?></label>
                        <input id=" birthday " value="<?= date_formatter($list['userBirthday'], ' j M Y')   ?>" type="text" class="form-control form-control-user bg-dark text-light">
                    </div>

                    <div class="row mt-0 mb-0">
                        <div class=" col offset-xl-2">
                            <hr class="border border-info">
                        </div>
                        <div class="col-xl-2"></div>
                    </div>

                    <div class="form-group">
                        <label for=" email "><?php if (what_langauge() == 0) : ?>Adresse Email<?php else : ?>Email Adress<?php endif; ?></label>
                        <input id=" email " value="<?= $list['userEmail'] ?>" type="text" class="form-control form-control-user bg-dark text-light">
                    </div>
                </fieldset>
                <div class=" form-group row ">
                    <div class="col-sm-6">
                        <div class="mb-3 mb-sm-0">
                            <a href="admin3.php?page=controllers/admin3/block_user_controller&User_Id=<?= $list['userId'] ?>" class="btn btn-user btn-block btn-outline-danger text-light"> <i class="fas fa-trash-alt text-danger"></i><?php language_content(" Bloquer", " Activer") ?></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3 mb-sm-0">
                            <a href="admin3.php?page=controllers/admin3/activate_user_controller&User_Id=<?= $list['userId'] ?>" class="btn btn-user btn-block btn-outline-success text-success"> <i class="fas fa-fw fa-check-square"></i><?php language_content(" Activer", " Activate") ?></a>
                        </div>
                    </div>
                </div>
                <?php include('views/admin3/modals_admin3.php'); ?>

            </form>
        </div>
    </div>
</div>