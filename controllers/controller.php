<?php
if (isset($_GET['lang']) ) {
    change_language($_GET['lang'],$_SERVER['HTTP_REFERER'] ); 
}




