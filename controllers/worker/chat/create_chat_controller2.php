<?php

if (isset($_REQUEST["userid"]) && isset($_REQUEST["group_id"]) ) {
    $user_id = (int) htmlentities($_REQUEST['userid']);
    $group_id =(int) htmlentities($_REQUEST['group_id']);
    $user_detail = user_info($user_id, $db);
    update_msg_stat($user_detail['userId'], $db);

    require "views/worker/chat/chat_view2.php";
} elseif (isset($_POST["submit"])) {

    $error = false;

    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (!empty($data["name"]) && is_string($data["name"])) {
        $data["name"] = htmlentities(addslashes($data["name"]));
    } else {
        $error_content = what_langauge() == 0 ? "Nom de groupe incorect" : "Group's name is incorrect";
        require "views/worker/chat/chat_view2.php";
    }

    if ($error == false) {
        $groupId = create_group($data["name"],$db);
        $new_conversation2 = 0;
        require "views/worker/chat/chat_view2.php";
    }
} else {
    $new_conversation1 = 0;

    require "views/worker/chat/chat_view2.php";
}
