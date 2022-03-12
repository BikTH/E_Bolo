<?php

$data1 ;
$data2 ;
$data3 ;

if (isset($_POST['submit_name'])){
    $error = false;

    foreach (array_values($_POST) as $keys => $values) :
        $data1 = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (check_access_name($data1['name'], $db) === 0) {

            if (empty($data1['name']) || !is_string($data1['name']) || strlen($data1['name']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Nom incorect ou absent !" : "Incorrect or absent last name !";
                require 'views/admin3/right_of_access/create_template.php';
            } else {
                $data1['name'] = htmlentities(addslashes($data1['name']));
            }

            if (strlen($data1['description']) > 254) {
                $error = true;
                $error_content = what_langauge() == 0 ? "Description trop longue!" : "Description too long";
                require 'views/admin3/right_of_access/create_template.php';
            } else {
                $data1['description'] = htmlentities(addslashes($data1['description']));
            }


            if ($error === true) {
            } else {
                $case1 = 1;
                $access_id = save_access1($data1, $db);
                require 'views/admin3/right_of_access/create_template.php';
            }

    } else {
        $error_content = what_langauge() == 0 ? "Nom deja attribué, choisissez en un autre!" : " Name already taken, choose another one !";
        require 'views/admin3/right_of_access/create_template.php';
    }

   // require 'views/admin3/right_of_access/create_template';
    //die('<meta http-equiv="refresh" content="0 ; URL=admin3.php?page=views/admin3/right_of_access/create_template&case1=1&data1='.$data1['name'].'">');
}

if (isset($_POST['submit_module'])){
    $error = false;

    foreach (array_values($_POST) as $keys => $values) :
        $data2 = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if(isset($_REQUEST['access_id'])){
       $access_id = $_REQUEST['access_id'];
    }

    $data1=info_data1($access_id,$db);
    $access_id = $_REQUEST['access_id'];

    if(isset($data2["oui1"])){
        $data2["non1"] = 1;
    }else{
        $data2["non1"] = 0;
    }

    if(isset($data2["oui2"])){
        $data2["non2"] = 1;
    }else{
        $data2["non2"] = 0;
    }

    if(isset($data2["oui3"])){
        $data2["non3"] = 1;
    }else{
        $data2["non3"] = 0;
    }

    if(isset($data2["oui4"])){
        $data2["non4"] = 1;
    }else{
        $data2["non4"] = 0;
    }

    if(isset($data2["oui5"])){
        $data2["non5"] = 1;
    }else{
        $data2["non5"] = 0;
    }

    if ($error === true) {
        //die(print_r($data2));
    } else {
        $case1 = 1;
        $case2 = 1;
        save_access2($access_id,$data2, $db);
        require 'views/admin3/right_of_access/create_template.php';
    }

   // require 'views/admin3/right_of_access/create_template';
    //die('<meta http-equiv="refresh" content="0 ; URL=admin3.php?page=views/admin3/right_of_access/create_template&case1=1&data1='.$data1['name'].'">');
}

if(isset($_POST['submit_module_back']))
{
    

    $access_id = $_REQUEST['access_id'];
    $data1=info_data1($access_id,$db);
    unset($_POST);
    delete_save_access1($access_id,$db);
    require 'views/admin3/right_of_access/create_template.php';

}

if(isset($_POST['submit_permission_back']))
{
    

    $access_id = $_REQUEST['access_id'];
    $data1= info_data1($access_id,$db);
    $data2= info_data2($access_id,$db);
    unset($_POST);
    delete_save_access2($access_id,$db);
    $case1 = 1;
    require 'views/admin3/right_of_access/create_template.php';

}

if(isset($_POST['submit_permission']))
{
    $error = false;

    foreach (array_values($_POST) as $keys => $values) :
        $data3 = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;
    $access_id = $_REQUEST['access_id'];

    $data2= info_data2($access_id,$db);
    $access_id = $_REQUEST['access_id'];

    if($data2["non1"]==1){
        //u
        if (isset($data3["ur"])):
            $data3["u1"]=1;
        else:
            $data3["u1"]=0;
        endif;

        if (isset($data3["uw"])):
            $data3["u2"]=1;
        else:
            $data3["u2"]=0;
        endif;

        if (isset($data3["uc"])):
            $data3["u3"]=1;
        else:
            $data3["u3"]=0;
        endif;

        if (isset($data3["ud"])):
            $data3["u4"]=1;
        else:
            $data3["u4"]=0;
        endif;
        save_user_access($access_id,$data3,$db);
    }

    if($data2["non2"]==1){
        //d
        if (isset($data3["dr"])):
            $data3["d1"]=1;
        else:
            $data3["d1"]=0;
        endif;

        if (isset($data3["dw"])):
            $data3["d2"]=1;
        else:
            $data3["d2"]=0;
        endif;

        if (isset($data3["dc"])):
            $data3["d3"]=1;
        else:
            $data3["d3"]=0;
        endif;

        if (isset($data3["dd"])):
            $data3["d4"]=1;
        else:
            $data3["d4"]=0;
        endif;
        save_directions_access($access_id,$data3,$db);
    }

    if($data2["non3"]==1){
        //e
        if (isset($data3["er"])):
            $data3["e1"]=1;
        else:
            $data3["e1"]=0;
        endif;

        if (isset($data3["ew"])):
            $data3["e2"]=1;
        else:
            $data3["e2"]=0;
        endif;

        if (isset($data3["ec"])):
            $data3["e3"]=1;
        else:
            $data3["e3"]=0;
        endif;

        if (isset($data3["ed"])):
            $data3["e4"]=1;
        else:
            $data3["e4"]=0;
        endif;
        save_employees_access($access_id,$data3,$db);
    }

    if($data2["non4"]==1){
        //f
        if (isset($data3["fr"])):
            $data3["f1"]=1;
        else:
            $data3["f1"]=0;
        endif;

        if (isset($data3["fw"])):
            $data3["f2"]=1;
        else:
            $data3["f2"]=0;
        endif;

        if (isset($data3["fc"])):
            $data3["f3"]=1;
        else:
            $data3["f3"]=0;
        endif;

        if (isset($data3["fd"])):
            $data3["f4"]=1;
        else:
            $data3["f4"]=0;
        endif;
        save_files_access($access_id,$data3,$db);
    }

    if($data2["non5"]==1){
        //a
        if (isset($data3["ar"])):
            $data3["a1"]=1;
        else:
            $data3["a1"]=0;
        endif;

        if (isset($data3["aw"])):
            $data3["a2"]=1;
        else:
            $data3["a2"]=0;
        endif;

        if (isset($data3["ac"])):
            $data3["a3"]=1;
        else:
            $data3["a3"]=0;
        endif;

        if (isset($data3["ad"])):
            $data3["a4"]=1;
        else:
            $data3["a4"]=0;
        endif;
        save_access_access($access_id,$data3,$db);
    }

    if ($error === true) {
        //die(print_r($data3));
    } else {
    die('<meta http-equiv="refresh" content="0 ; URL=admin3.php?page=views/admin3/right_of_access/list_of_access">');  
    }

   // require 'views/admin3/right_of_access/create_template';
    //die('<meta http-equiv="refresh" content="0 ; URL=admin3.php?page=views/admin3/right_of_access/create_template&case1=1&data1='.$data1['name'].'">');
  
}

?>