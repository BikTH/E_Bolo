<?php

if(isset( $_REQUEST['access_id'])){
    $access_id = $_REQUEST['access_id'];
    $list = detail_of_access($access_id,$db);
    require 'views/admin3/right_of_access/details_of_access.php';
}