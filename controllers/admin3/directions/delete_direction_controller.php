<?php

if (isset($_REQUEST['direction_id'])) {
    $direction_id = $_REQUEST['direction_id'];
    $admin = $_REQUEST['direction_user'];
    delete_director($admin,$direction_id,$db);
    delete_direction($direction_id,$db);
    die('<meta http-equiv="refresh" content="0 ; URL=admin3.php?page=views/admin3/directions/list_directions">');
}