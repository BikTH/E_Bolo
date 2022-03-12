<br><br><br><br><br><br>
<?php

$error = false;

/*message student*/

if (isset($_POST['submit_add_message_student'])) {

    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;


    $user_id = (int) htmlentities($_REQUEST['hidded_id']);
    $user_detail = user_info($user_id, $db);

    if (empty($data['message']) || !is_string($data['message'])) {
        $error = true;
    } else {
        $data['message'] = htmlentities(addslashes($data['message']));
    }

    if ($error === true) {
        require "views/worker/chat/chat_view1.php";
        // if(isset($_GET["t1"])){

        // }
        // if(isset($_GET["t2"])){

        // }
    } else {

        add_message_student($data, $db, $_SESSION['user_id']);

        $page = 'controllers/worker/chat/message-detail-controller';
        die('<meta http-equiv="refresh" content="0 ; URL=worker.php?page=' . $page . '&user_id=' . $data['hidded_id'] . '">');
    }
}
