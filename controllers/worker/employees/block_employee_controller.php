<?php

if (isset($_REQUEST['user_id'])) {
    $user_id = $_REQUEST['user_id'];
    block_employee($user_id, $db);

    $error_content = what_langauge() == 0 ? "Employé Bloqué avec succès !" : "Employee block with success !";
    die('<meta http-equiv="refresh" content="0 ; URL=worker.php?page=views/worker/employees/list_employee&error_success=' . $error_content . '">');
}
