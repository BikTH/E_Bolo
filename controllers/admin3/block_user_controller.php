<?php 
if (isset($_REQUEST['User_Id']) && $_REQUEST['User_Id'] > 0) {
    if(isset($_REQUEST['test'])){
        $User_Id = (int) htmlentities($_REQUEST['User_Id']);
        disban_user_from_company($User_Id, $db);
        $message = "Le compte utilisateur est désormais activé !" ;
        die('<meta http-equiv="refresh" content="0 ; URL=admin3.php?page=views/admin3/activate_user&error_success=' . $message . '">');
    }else{
        $User_Id = (int) htmlentities($_REQUEST['User_Id']);
         bann_user_from_company($User_Id, $db);
         $message = "Utilisateur bloqué";
         //header("location:admin3.php?page=views/admin3/activate_user");
         //die('<meta http-equiv="refresh" content="0 ; URL=admin3.php?page=views/admin3/activate_user">');
         //die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/admin3/activate_user&error_success=Compte activé avec succès">');
         die('<meta http-equiv="refresh" content="0 ; URL=admin3.php?page=views/admin3/activate_user&error_success=' . $message . '">');
    }
    
}

?>