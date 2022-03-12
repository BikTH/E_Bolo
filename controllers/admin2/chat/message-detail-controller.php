<?php

if (isset($_REQUEST['user_id'])) {
    $user_id = (int) htmlentities($_REQUEST['user_id']);
    
    $user_detail = user_info($user_id, $db);

    require "views/admin2/chat/chat_view1.php";
}
