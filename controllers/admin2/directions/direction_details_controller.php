<?php

if(isset( $_REQUEST['direction_id'])){
    $direction_id = $_REQUEST['direction_id'];
    $list = direction_detail($direction_id, $db);
    require 'views/admin2/directions/details_of_direction.php';
}