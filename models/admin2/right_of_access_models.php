<?php
function check_access_name($name, $db)
{
    $name1= addslashes($name);
    $max = $db->query("SELECT * FROM access a inner join users u on a.userid=u.userid WHERE accessName='$name1' AND u.companyId='{$_SESSION["user_company"]}'") or die(mysqli_error($db));
    return mysqli_num_rows($max);
}

function save_access1($data1,$db)
{
    $db->query("INSERT INTO `access`( `userId`, `accessName`, `accessDescription`, `activateUser`, `readActivateUser`, `writeActivateUser`, `createActivateUser`, `deleteActivateUser`, `directions`, `readDirections`, `writeDirections`, `createDirections`, `deleteDirections`, `myEmployee`, `readMyEmployee`, `writeMyEmployee`, `createMyEmployee`, `deleteMyEmployee`, `companyFile`, `readCompanyFile`, `writeCompanyFile`, `createCompanyFile`, `deleteCompanyFile`, `rightAccess`, `readRightAccess`, `writeRightAccess`, `createRightAccess`, `deleteRightAccess`, `accessCreatedAt`)"
    ."VALUES ('{$_SESSION["user_id"]}','{$data1["name"]}','{$data1["description"]}',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,now())") or die(mysqli_error($db));    

    return get_last_inserted_id($db);
}

function save_access2($access_id,$data2,$db)
{
    $db->query("UPDATE `access` SET `activateUser`='{$data2["non1"]}',`directions`='{$data2["non2"]}',`myEmployee`='{$data2["non3"]}',`companyFile`='{$data2["non4"]}',`rightAccess`='{$data2["non5"]}' WHERE accessId='$access_id'")or die(mysqli_error($db));
}

function delete_save_access1($access_id,$db)
{
    $db->query("DELETE FROM `access` WHERE accessId='$access_id'") or die(mysqli_error($db));
}

function info_data1($access_id,$db)
{
    $result = $db->query("SELECT `accessName` as name , `accessDescription` as description FROM `access` WHERE accessId='$access_id'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($result);
}

function info_data2($access_id,$db)
{
    $result = $db->query("SELECT `activateUser` as non1 , `directions` as non2 , `myEmployee` as non3 , `companyFile` as non4  , `rightAccess` as non5 FROM `access` WHERE accessId='$access_id'") or die(mysqli_error($db));
    return mysqli_fetch_assoc($result);
}

function delete_save_access2($access_id,$db)
{
    $db->query("UPDATE `access` SET `activateUser`=0,`directions`=0,`myEmployee`=0,`companyFile`=0,`rightAccess`=0 WHERE accessId='$access_id'")or die(mysqli_error($db));
}

function save_user_access($access_id,$data3,$db)
{
    $db->query("UPDATE `access` SET `readActivateUser`='{$data3["u1"]}',`writeActivateUser`='{$data3["u2"]}',`createActivateUser`='{$data3["u3"]}',`deleteActivateUser`='{$data3["u4"]}', `accessCreatedAt`=now() WHERE accessId='$access_id'")or die(mysqli_error($db));
}

function save_directions_access($access_id,$data3,$db)
{
    $db->query("UPDATE `access` SET `readDirections`='{$data3["d1"]}',`writeDirections`='{$data3["d2"]}',`createDirections`='{$data3["d3"]}',`deleteDirections`='{$data3["d4"]}', `accessCreatedAt`=now() WHERE accessId='$access_id'")or die(mysqli_error($db));
}

function save_employees_access($access_id,$data3,$db)
{
    $db->query("UPDATE `access` SET `readMyEmployee`='{$data3["e1"]}',`writeMyEmployee`='{$data3["e2"]}',`createMyEmployee`='{$data3["e3"]}',`deleteMyEmployee`='{$data3["e4"]}', `accessCreatedAt`=now() WHERE accessId='$access_id'")or die(mysqli_error($db));
}

function save_files_access($access_id,$data3,$db)
{
    $db->query("UPDATE `access` SET `readCompanyFile`='{$data3["f1"]}',`writeCompanyFile`='{$data3["f2"]}',`createCompanyFile`='{$data3["f3"]}',`deleteCompanyFile`='{$data3["f4"]}', `accessCreatedAt`=now() WHERE accessId='$access_id'")or die(mysqli_error($db));
}

function save_access_access($access_id,$data3,$db)
{
    $db->query("UPDATE `access` SET `readRightAccess`='{$data3["a1"]}',`writeRightAccess`='{$data3["a2"]}',`createRightAccess`='{$data3["a3"]}',`deleteRightAccess`='{$data3["a4"]}', `accessCreatedAt`=now() WHERE accessId='$access_id'")or die(mysqli_error($db));
}

function list_of_access($company_id,$db)
{
    $result=$db->query("SELECT a.accessId As access_id, a.userId, a.accessName As name, a.accessDescription As description, a.activateUser As non1, a.readActivateUser AS u1, a.writeActivateUser AS u2, a.createActivateUser AS u3, a.deleteActivateUser AS u4, a.directions AS non2, a.readDirections AS d1, a.writeDirections AS d2, a.createDirections AS d3, a.deleteDirections AS d4, a.myEmployee AS non3, a.readMyEmployee AS e1, a.writeMyEmployee AS e2, a.createMyEmployee AS e3, a.deleteMyEmployee AS e4, a.companyFile AS non4, a.readCompanyFile AS f1, a.writeCompanyFile AS f2, a.createCompanyFile AS f3, a.deleteCompanyFile AS f4, a.rightAccess AS non5, a.readRightAccess AS a1, a.writeRightAccess AS a2, a.createRightAccess AS a3, a.deleteRightAccess AS a4, a.accessCreatedAt FROM access a INNER JOIN users u ON a.userId = u.userId WHERE u.companyId ='$company_id'")or die(mysqli_error($db));
    return $result;
}

function detail_of_access($access_id,$db)
{
    $result=$db->query("SELECT a.accessId As access_id, a.userId, a.accessName As name, a.accessDescription As description, a.activateUser As non1, a.readActivateUser AS u1, a.writeActivateUser AS u2, a.createActivateUser AS u3, a.deleteActivateUser AS u4, a.directions AS non2, a.readDirections AS d1, a.writeDirections AS d2, a.createDirections AS d3, a.deleteDirections AS d4, a.myEmployee AS non3, a.readMyEmployee AS e1, a.writeMyEmployee AS e2, a.createMyEmployee AS e3, a.deleteMyEmployee AS e4, a.companyFile AS non4, a.readCompanyFile AS f1, a.writeCompanyFile AS f2, a.createCompanyFile AS f3, a.deleteCompanyFile AS f4, a.rightAccess AS non5, a.readRightAccess AS a1, a.writeRightAccess AS a2, a.createRightAccess AS a3, a.deleteRightAccess AS a4, a.accessCreatedAt FROM access a INNER JOIN users u ON a.userId = u.userId WHERE a.accessId ='$access_id'")or die(mysqli_error($db));
    return mysqli_fetch_assoc($result);
}

function user_name_poste($user_id,$db)
{
$result=$db->query("SELECT `userName`, `userPrename`, `isAdmin`, `isAdminSection`, `isWorker` FROM `users` WHERE userId='{$user_id}'")or die(mysqli_error($db));
    $final = mysqli_fetch_assoc($result);
    if($final["isAdmin"] == 1){
        return language_content("Administrateur :","Administrator :")." ". $final["userName"]." ".$final["userPrename"];
    }
    if($final["isAdminSection"] == 1){
        return language_content("Directeur :","Director :")." ". $final["userName"]." ".$final["userPrename"];
    }
    if($final["isWorker"] == 1){
        return language_content("Employé : ","Employee : ")." " .$final["userName"]." ".$final["userPrename"];
    }
}

function user_poste($user_id,$db)
{
$result=$db->query("SELECT * FROM `users` WHERE userId = '{$user_id}' ")or die(mysqli_error($db));
    $final = mysqli_fetch_assoc($result);
    if($final["isAdmin"] == 1){
        return language_content("Administrateur","Administrator");
    }
    if($final["isAdminSection"] == 1){
        return language_content("Directeur","Director");
    }
    if($final["isWorker"] == 1){
        return language_content("Employé","Employee");
    }
}

function update_access1($id,$data1,$db)
{
    $db->query("UPDATE `access` SET `accessName`='{$data1["name"]}',`accessDescription`='{$data1["description"]}' WHERE accessId='$id'")or die(mysqli_error($db));
    
}

function unupdate_save_access1($save,$id, $db)
{
    $db->query("UPDATE `access` SET `accessName`='{$save["name"]}',`accessDescription`='{$save["description"]}' WHERE accessId='$id'")or die(mysqli_error($db));
}

function delete_access($id,$db)
{
    $db->query("DELETE FROM `access` WHERE accessId = '$id'")or die(mysqli_error($db));
}

function attribuated_at($id_access,$db)
{
    $request = $db->query("SELECT * FROM `users` u  INNER JOIN access a on u.accessId=a.accessId WHERE a.accessId= '{$id_access}'  AND u.userStatus = 1")or die(mysqli_error($db));
    return $request;
}

function user_direction($id_user,$db)
{
    $request=$db->query("SELECT directionName FROM `users` u INNER JOIN directions d ON u.directionId=d.directionId WHERE userId='{$id_user}'")or die(mysqli_error($db));
    if(mysqli_num_rows($request)==0){
        return " --- ";
    }else{
        return mysqli_fetch_assoc($request)["directionName"];
    }
}



// $db->query("")or die(mysqli_error($db));



