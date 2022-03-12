<?php

if (isset($_REQUEST["userid"])) {
    $user_id = (int) htmlentities($_REQUEST['userid']);
    $user_detail = user_info($user_id, $db);
    update_msg_stat($user_detail['userId'],$db);

    require "views/admin3/chat/chat_view1.php";
} else{

    $new_conversation = 0;

    require "views/admin3/chat/chat_view1.php";
}

