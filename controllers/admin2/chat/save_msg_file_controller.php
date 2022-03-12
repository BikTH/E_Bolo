<?php

if(isset($_GET["file_id"])){
    $file = get_file_info($_GET["file_id"],$db);
    $name = new SplFileInfo($file["filePosition"]);

    save_file_msg($file["filePosition"], $name->getFilename(), $db);

    $user_id = (int) htmlentities($_REQUEST['user_id']);
    
    $user_detail = user_info($user_id, $db);

    $error_success = "Fichier: ".$name->getFilename()." Enregistré avec succès !";

    require "views/admin2/chat/chat_view1.php";

}