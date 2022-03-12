<style type="text/css">
    .defaut {
        width: 100%;
        height: 100vh;
        background: linear-gradient(-35deg, red, #e73c7e, #813374);
        background-size: 400% 400%;
        -webkit-animation: gradientBG 15s ease infinite;
        animation: gradientBG 15s ease infinite;
        text-align: center;
        color: white;
        flex-flow: column;
        justify-content: center;
    }

    .chat {
        margin-top: auto;
        margin-bottom: auto;
    }

    .card {
        height: 580px;
        border-radius: 15px !important;
        background-color: rgba(0, 0, 0, 0.4) !important;
    }

    .contacts_body {
        padding: 0.75rem 0 !important;
        overflow-y: auto;
        white-space: nowrap;
    }

    .msg_card_body {
        overflow-y: auto;
    }

    .card-header {
        border-radius: 15px 15px 0 0 !important;
        border-bottom: 0 !important;
    }

    .card-footer {
        border-radius: 0 0 15px 15px !important;
        border-top: 0 !important;
    }

    .container {
        align-content: center;
    }

    .search {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
    }

    .search:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .type_msg {
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        height: 60px !important;
        overflow-y: auto;
    }

    .type_msg:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .attach_btn {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .send_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .search_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .contacts {
        list-style: none;
        padding: 0;
    }

    .contacts li {
        width: 100% !important;
        padding: 5px 10px;
        margin-bottom: 15px !important;
    }

    .user_img {
        height: 70px;
        width: 70px;
        border: 1.5px solid #f5f6fa;

    }

    .user_img_msg {
        height: 40px;
        width: 40px;
        border: 1.5px solid #f5f6fa;

    }

    .img_cont {
        position: relative;
        height: 70px;
        width: 70px;
    }

    .img_cont_msg {
        height: 40px;
        width: 40px;
    }

    .online_icon {
        position: absolute;
        height: 15px;
        width: 15px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 0.2em;
        right: 0.4em;
        border: 1.5px solid white;
    }

    .offline {
        background-color: #c23616 !important;
    }

    .user_info {
        margin-top: auto;
        margin-bottom: auto;
    }

    .user_info span {
        font-size: 20px;
        color: white;
    }

    .user_info p {
        font-size: 10px;
        color: rgba(255, 255, 255, 0.6);
    }

    .msg_cotainer {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 10px;
        border-radius: 25px;
        background-color: #82ccdd;
        padding: 10px;
        position: relative;
    }

    .msg_cotainer_send {
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        border-radius: 25px;
        background-color: #78e08f;
        padding: 10px;
        position: relative;
    }

    .msg_time {
        position: absolute;
        left: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_time_send {
        position: absolute;
        right: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_head {
        position: relative;
    }

    #action_menu_btn {
        position: absolute;
        right: 10px;
        top: 10px;
        color: white;
        cursor: pointer;
        font-size: 20px;
    }

    .action_menu {
        z-index: 1;
        position: absolute;
        padding: 15px 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 15px;
        top: 30px;
        right: 15px;
        display: none;
    }

    .action_menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .action_menu ul li {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 5px;
    }

    .action_menu ul li i {
        padding-right: 10px;

    }

    .action_menu ul li:hover {
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.2);
    }

    @media(max-width: 576px) {
        .contacts_card {
            margin-bottom: 15px !important;
        }
    }
</style>


<br><br>



<div class="container-fluid h-100 mt-5" style="size: cover;">
    <div class="row justify-content-center h-100">
        <div class="col-md-4 col-xl-3 chat">
            <div class="card mb-sm-3 mb-md-0 contacts_card bg-transparent">
                <div class="card-header bg-gradient-dark text-center">
                    <div>
                        <a href="worker.php?page=controllers/worker/chat/create_chat_controller" class="btn-outline-dark text-light btn-block rounded "> <i class="fa fa-plus-circle"></i> <?= language_content(" Nouvelle discution", " New discusion") ?> </a>
                    </div>
                    <!-- <div class="input-group">
                        <input type="text" id="search-box" placeholder="Search..." name="" class="form-control search">

                        <div class="input-group-prepend">
                            <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                        </div>
                    </div> -->
                    <div style="position: absolute; background-color: #813374" id="suggestion-box"></div>
                </div>
                <div class="card-body contacts_body">
                    <ui class="contacts">
                        <?php

                        // liste des conversations
                        $list_teachers_actif = list_msg_user($db);
                        $test = 0;
                        while ($user = mysqli_fetch_assoc($list_teachers_actif)) :
                            if ($test != $user["userId"]) :
                                $test = $user["userId"]
                        ?>
                                <li class="">
                                    <a href="worker.php?page=controllers/worker/chat/message-detail-controller&user_id=<?= $user['userId'] ?>" class="text-light ">

                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="<?= user_avatar_by_id2($user, $db) ?>" class="rounded-circle user_img">
                                                <?php if ($user["isConnect"] == 1) : ?>
                                                    <span class="online_icon"></span>
                                                <?php else : ?>
                                                    <span class="online_icon offline"></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="user_info float-left">
                                                <span><?= $user['userName'] . " " . $user['userPrename'] ?></span>
                                                <p><?= user_poste($user["userId"], $db) ?>
                                                    <!-- <?php //language_content("Sélectionnez pour ouvrir", "Select to open") 
                                                            ?> -->
                                                </p>
                                            </div>
                                        </div>
                                        <?php $nbr_msg_unread = nbr_msg_unread_conversation($db, $user['userId']);
                                        if ($nbr_msg_unread != 0) : ?>
                                            <span class="badge badge-pill badge-info float-right text-dark"><?= $nbr_msg_unread ?>+</span>
                                        <?php endif; ?>
                                    </a>

                                </li>
                            <?php else : ?>

                        <?php endif;
                        endwhile; ?>
                    </ui>
                </div>
                <div class="card-footer bg-gradient-dark"></div>
            </div>
        </div>


        <?php if (isset($user_detail['userId'])) : ?>

            <!-- Contenu d'une conversation -->

            <div class="col-md-8 col-xl-6 chat">
                <div class="card bg-transparent shadow ">
                    <div class="card-header msg_head bg-gradient-dark">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="<?= user_avatar_by_id2($user_detail, $db) ?>" class="rounded-circle user_img">
                                <?php if ($user["isConnect"] == 1) : ?>
                                    <span class="online_icon"></span>
                                <?php else : ?>
                                    <span class="online_icon offline"></span>
                                <?php endif; ?>
                            </div>

                            <!-- nbr de message de la conversation -->
                            <?php $nbr_msg = nbr_msg($db, $user_detail['userId']); ?>
                            <div class="user_info">
                                <span> <?= $user_detail['userName'] . " " . $user_detail['userPrename'] ?></span>
                                <p><?= $nbr_msg; ?> <?= language_content("Messages", "Messages") ?></p>
                            </div>
                        </div>
                        <!-- <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="action_menu">
                            <ul>
                                <li><i class="fas fa-user-circle"></i> View profile</li>
                                <li><i class="fas fa-users"></i> Add to close friends</li>
                                <li><i class="fas fa-plus"></i> Add to group</li>
                                <li><i class="fas fa-ban"></i> Block</li>
                            </ul>
                        </div> -->
                    </div>
                    <div class="card-body msg_card_body bg-transparent">
                        <!-- Liste des messages -->
                        <?php $list_msg = list_msg($db, $user_detail['userId']);
                        while ($msg = mysqli_fetch_assoc($list_msg)) :
                            update_msg_stat($msg["messageId"], $db);
                        ?>
                            <?php if ($msg['receiver'] == $_SESSION['user_id']) : ?>
                                <?php if ($msg["messageFile"] != NULL && $msg["messageContent"] == NULL) :  ?>
                                    <div class="d-flex justify-content-start mb-4 mr-5">
                                        <div class="img_cont_msg">
                                            <img src="<?= user_avatar_by_id2($user_detail, $db) ?>" class="rounded-circle user_img_msg">
                                        </div>
                                        <div class="msg_cotainer text-light">
                                            <?php $info2 = info_file($msg["messageFile"], $db) ?>
                                            <div class="row">
                                                <div class="col-4">
                                                    <?php $info = new SplFileInfo($info2["filePosition"]); ?>
                                                    <img class="float-left rounded-circle" src="<?= type_of_file($info->getExtension()) ?>" alt="000" width="60" height="60">
                                                    <p class="text-center">
                                                        <?= name_of_type($info->getExtension()) ?>
                                                    </p>
                                                </div>
                                                <div class="col-8">
                                                    <div class="row">
                                                        <?php $info = new SplFileInfo($info2["fileName"]); ?>
                                                        <?= $info->getFilename() ?>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <a class="btn btn-outline-success" href="worker.php?page=controllers/worker/chat/save_msg_file_controller&user_id=<?= $user_detail["userId"] ?>&file_id=<?= $info2["fileId"] ?>">
                                                                <i class="fa fa-save"></i> Enregistrer
                                                            </a>
                                                        </div>
                                                        <div class="col-4">
                                                            <a class="btn btn-outline-info" href="worker.php?page=controllers/worker/files_worker/preview_file_controller&file_id=<?= $info2["fileId"] ?>">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <span class="msg_time">
                                                <?= date_formatter($msg['messageCreatedAt'], 'h:i') ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="d-flex justify-content-start mb-4 mr-5">
                                        <div class="img_cont_msg">
                                            <img src="<?= user_avatar_by_id2($user_detail, $db) ?>" class="rounded-circle user_img_msg">
                                        </div>
                                        <div class="msg_cotainer text-light">
                                            <?= $msg['messageContent'] ?>
                                            <span class="msg_time">
                                                <?= date_formatter($msg['messageCreatedAt'], 'h:i') ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php else : ?>
                                <?php if ($msg["messageFile"] != NULL && $msg["messageContent"] == NULL) :  ?>
                                    <div class="d-flex justify-content-end mb-4 ml-5">
                                        <div class="msg_cotainer_send text-light">
                                            <?php $info2 = info_file($msg["messageFile"], $db) ?>
                                            <div class="row m-1">
                                                <div class="col-8">
                                                    <div class="row">
                                                        <?php $info = new SplFileInfo($info2["fileName"]); ?>
                                                        <?= $info->getFilename() ?>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-auto">

                                                        </div>
                                                        <div class="col-auto">
                                                            <a class="btn btn-outline-light" href="worker.php?page=controllers/worker/files_worker/preview_file_controller&file_id=<?= $info2["fileId"] ?>">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <?php $info = new SplFileInfo($info2["filePosition"]); ?>
                                                    <img class="float-right rounded-circle" src="<?= type_of_file($info->getExtension()) ?>" alt="000" width="60" height="60">
                                                    <p class="text-center">
                                                        <?= name_of_type($info->getExtension()) ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <span class="msg_time_send">
                                                <?= date_formatter($msg['messageCreatedAt'], 'h:i') ?>
                                            </span>
                                        </div>
                                        <div class="img_cont_msg">
                                            <img src="<?= user_avatar($db) ?>" class="rounded-circle user_img_msg">
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="d-flex justify-content-end mb-4 ml-5">
                                        <div class="msg_cotainer_send text-light">
                                            <?= $msg['messageContent'] ?>
                                            <span class="msg_time_send">
                                                <?= date_formatter($msg['messageCreatedAt'], 'h:i') ?>
                                            </span>
                                        </div>
                                        <div class="img_cont_msg">
                                            <img src="<?= user_avatar($db) ?>" class="rounded-circle user_img_msg">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>

                    </div>
                    <div class="card-footer bg-gradient-dark">

                        <!-- formulaire d'envoie des messages -->

                        <form method="post" action="worker.php?page=controllers/worker/chat/add-message-controller">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <!-- <a href="#" class="text-light input-group-text attach_btn"><i class="fas fa-paperclip"></i></span> -->
                                    <span class="input-group-text attach_btn"><a href="#" data-toggle="modal" data-target="#template" class="btn btn-outline-dark text-light"><i class="fas fa-paperclip"></i></a></span>
                                    <div id="template" class="modal fade delete-modal" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-gradient-dark">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?= language_content("Choisir fichier à envoyer", "Choose file to send") ?></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped" id="dataTable2" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center"> <?php language_content("Nom", "Name") ?></th>
                                                                    <th class="text-center"> <?php language_content("type fichier", "type of file") ?></th>
                                                                    <th class="text-center"> <?php language_content("Envoyer", "Send") ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot>
                                                                <tr>

                                                                </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                <?php
                                                                $lix = My_file($db);
                                                                while ($file = mysqli_fetch_assoc($lix)) :
                                                                ?>
                                                                    <tr class="text-light">
                                                                        <td class="text-center">
                                                                            <?php $info = new SplFileInfo($file["fileName"]); ?>
                                                                            <?= $info->getFilename() ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <?php $info = new SplFileInfo($file["filePosition"]); ?>

                                                                            <img class="float-left" src="<?= type_of_file($info->getExtension()) ?>" alt="ERROR" width="50" height="50" class="text-center">
                                                                            <p class="text-center">
                                                                                <?= name_of_type($info->getExtension()) ?>
                                                                            </p>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <a href="worker.php?page=controllers/worker/chat/send_file_controller&fileid=<?= $file["fileId"] ?>&userid=<?= $user_detail['userId'] ?>" class="btn btn-primary btn-sm">
                                                                                <i class="fas fa-location-arrow"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                endwhile; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer m-auto">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php language_content("Fermer", "Close") ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="hidded_id" value="<?= $user_detail['userId'] ?>">
                                <textarea name="message" class="form-control type_msg" required placeholder="<?= language_content("Ecrivez votre message", "Write your message") ?>"></textarea>
                                <div class="input-group-append">
                                    <span class="input-group-text send_btn">
                                        <button name="submit_add_message_student" type="submit" class="btn btn-primary"><i class='fas fa-location-arrow'></i> </button>
                                    </span>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        <?php else : ?>
            <?php if (isset($new_conversation)) : ?>
                <div class="col-md-8 col-xl-6 chat">
                    <div class="card rounded bg-transparent border-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center"> <?php language_content("Nom", "Name") ?></th>
                                        <th class="text-center"> <?php language_content("Poste & Direction", "Role & Direction") ?></th>
                                        <th class="text-center"> <?php language_content("Option", "Option") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $compt = 0;
                                    $lix = list_employee_msg($db);
                                    while ($user2 = mysqli_fetch_assoc($lix)) :
                                    ?>
                                        <tr class="text-light">
                                            <td class="text-center">
                                                <img class="img-profile rounded" width="40" height="40" src="<?= user_avatar_by_id2($user2, $db) ?>">
                                                <?= $user2['userName'] . " " . $user2['userPrename'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= employee_role($user2, $db) . " " ?> & <?= " " . user_direction_name($user2["directionId"], $db) ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-outiline-info btn-sm" href="worker.php?page=controllers/worker/chat/create_chat_controller&userid=<?= $user2["userId"] ?>">
                                                    <i class="fas fw fa-comment-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $compt += 1;
                                    endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <!-- page par défaut -->
                <div class="col-md-8 col-xl-6 chat">
                    <div class="card rounded bg-transparent border-0">
                        <div class="bg-transparent border-0 text-center text-light " style="padding-top: 180px">
                            <h1><?= language_content("Mes chats", "My conversation") ?></h1>
                            <h3><?= language_content("Veuillez choisir une conversation ou créez en une nouvelle", "Choose a conversation to begin or create new one") ?></h2>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#action_menu_btn').click(function() {
            $('.action_menu').toggle();
        });
    });
</script>