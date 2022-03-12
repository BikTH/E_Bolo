<?php

if(isset( $_REQUEST['direction_id'])){
    $direction_id = $_REQUEST['direction_id'];
    $list = direction_detail($direction_id, $db);
    require 'views/worker/directions/details_of_direction.php';
}