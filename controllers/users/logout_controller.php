<?php

if (isset($_GET['close_session'])) {
    set_offline($db);
    session_unset();
    session_destroy();
    //header('location:index.php');
    die('<meta http-equiv="refresh" content="1 ; URL=index.php?page=views/index/home_index">');
    exit();
}