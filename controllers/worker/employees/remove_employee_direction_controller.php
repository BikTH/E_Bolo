<?php

if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
    remove_employee_direction($user_id, $db);
    $error_success = what_langauge() == 0 ? "Employé retiré de la direction avec succès !" : "Employee retrieve to direction with success !";
    die('<meta http-equiv="refresh" content="0 ; URL=worker.php?page=views/worker/employees/list_employee&error_success=' . $error_success . '">');
}
