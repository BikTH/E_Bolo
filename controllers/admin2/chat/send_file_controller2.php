<br><br><br><br><br><br>
<?php

/*message student*/

if (isset($_REQUEST["userid"])) {

    $user_id = (int) htmlentities($_REQUEST["userid"]);
    $file_id = (int) htmlentities($_REQUEST["fileid"]);

    $user_detail = user_info($user_id, $db);

    add_file_message($file_id, $user_id, $db);

    $page = 'controllers/admin2/chat/message-detail-controller2';
    die('<meta http-equiv="refresh" content="0 ; URL=admin2.php?page=' . $page . '&user_id=' . $user_id . '">');
}
