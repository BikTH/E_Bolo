<?php 

if (isset($_REQUEST['User_Id']) && $_REQUEST['User_Id'] > 0) {
    $User_Id = (int) htmlentities($_REQUEST['User_Id']);
    activate_user_from_company($User_Id, $db);
    $message = "Compte activé succès";
    //header("location:worker.php?page=views/worker/activate_user");
    //die('<meta http-equiv="refresh" content="0 ; URL=worker.php?page=views/worker/activate_user">');
    //die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/worker/activate_user&error_success=Compte activé avec succès">');
    die('<meta http-equiv="refresh" content="1 ; URL=worker.php?page=views/worker/activate_user&error_success=' . $message . '">');
}

?>