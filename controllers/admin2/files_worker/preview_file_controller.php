<?php

if(isset($_GET["file_id"])){
    $file = get_file_info($_GET["file_id"],$db);
    require 'views\admin2\files_worker\preview.php';
}