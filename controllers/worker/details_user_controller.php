<?php 
if (isset($_REQUEST['user_Id']) && $_REQUEST['user_Id'] > 0) {
    
    $User_Id = (int) htmlentities($_REQUEST['user_Id']);
    $list = user_information($User_Id,$db);
    require 'views/worker/details_user.php';
}

?> 