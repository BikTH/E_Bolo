<?php

function list_contact($connect)
{
    $list_contact = $connect->query("SELECT * FROM contacts") or die(mysqli_error($connect));
    return $list_contact;
}

function nbr_contact($db)
{
    $nbr = $db->query("SELECT COUNT(*) as nbr FROM contacts") or die(mysqli_error($db));
    $nbr_contact = mysqli_fetch_assoc($nbr);

    return $nbr_contact['nbr'];
}

/*messagerie*/

function nbr_msg($db, $receive)
{
    $nbr = $db->query("SELECT COUNT(*) as nbr FROM concern WHERE userId='{$_SESSION['user_id']}' AND receiver='{$receive}' OR receiver='{$_SESSION['user_id']}' AND userId='{$receive}' ") or die(mysqli_error($db));
    return mysqli_fetch_assoc($nbr)['nbr'];
}

function nbr_msg_unread_conversation($db, $receive)
{
    $nbr = $db->query("SELECT COUNT(*) as nbr FROM concern WHERE receiver='{$_SESSION['user_id']}' AND userId='{$receive}' AND concernStatus = 0 ") or die(mysqli_error($db));
    return mysqli_fetch_assoc($nbr)['nbr'];
}

function nbr_msg_unread_total_msg($db)
{
    $nbr = $db->query("SELECT COUNT(*) as nbr FROM concern WHERE receiver='{$_SESSION['user_id']}' AND userId!= null AND groupId=null AND concernStatus = 0 ") or die(mysqli_error($db));
    return mysqli_fetch_assoc($nbr)['nbr'];
}

function nbr_group_unread_total_msg($db)
{
    $nbr = $db->query("SELECT COUNT(*) as nbr FROM concern WHERE receiver='{$_SESSION['user_id']}' AND  groupId!= null AND userId=null AND concernStatus = 0 ") or die(mysqli_error($db));
    return mysqli_fetch_assoc($nbr)['nbr'];
}

function unread_total_msg($db)
{
    $nbr = $db->query("SELECT COUNT(*) as nbr FROM concern WHERE receiver='{$_SESSION['user_id']}' AND concernStatus = 0 ") or die(mysqli_error($db));
    return mysqli_fetch_assoc($nbr)['nbr'];
}

function nbr_msg_unread($db)
{
    $request = $db->query("SELECT COUNT(*) as nbr FROM concern WHERE (userId='{$_SESSION['user_id']}' OR receiver='{$_SESSION['user_id']}') AND concernStatus = 0 ") or die(mysqli_error($db));
}



function list_msg($connect, $receive)
{
    $list_msg = $connect->query("SELECT * FROM messages m INNER JOIN concern c on c.messageId = m.messageId WHERE 
     userId='{$_SESSION['user_id']}' AND receiver='{$receive}' OR receiver='{$_SESSION['user_id']}' AND userId='{$receive}' ORDER BY messageCreatedAt DESC") or die(mysqli_error($connect));
    return $list_msg;
}

function list_recent_unread_msg($connect)
{
    $list_msg = $connect->query("SELECT * FROM messages m INNER JOIN concern c on c.messageId = m.messageId WHERE 
    receiver='{$_SESSION['user_id']}' AND ConcernStatus=0 ORDER BY messageCreatedAt") or die(mysqli_error($connect));
    return $list_msg;
}

function list_msg_nonlu_user($connect)
{
    $list_msg = $connect->query("SELECT * FROM messages m INNER JOIN users u ON m.userId=u.userId WHERE userReceive='{$_SESSION['user_id']}' AND messageStatus=0 ORDER BY messageCreatedAt DESC LIMIT 0, 6") or die(mysqli_error($connect));
    return $list_msg;
}

function check_msg_stat($connect)
{
    $nbr = $connect->query("SELECT COUNT(*) as nbr FROM messages WHERE userReceive='{$_SESSION['user_id']}' AND messageStatus=0 ") or die(mysqli_error($connect));
    $nbr_msg = mysqli_fetch_assoc($nbr);

    return $nbr_msg['nbr'];
}


/* change le statut du msg pour vu */

function list_msg_user($db)
{
    $request = $db->query("SELECT * FROM concern c INNER JOIN users u ON u.userId=c.userId OR u.userId=c.receiver 
    WHERE (c.userId = '{$_SESSION["user_id"]}' OR c.receiver = '{$_SESSION["user_id"]}') AND u.userId !='{$_SESSION["user_id"]}' 
    GROUP BY u.userId 
    ORDER BY sendAt DESC ") or die(mysqli_error($db));

    // $request = $db->query(" SELECT * FROM concern c  INNER JOIN users u ON u.userId = c.userId  WHERE c.userId != '{$_SESSION["user_id"]}' OR c.receiver = '{$_SESSION["user_id"]}'  ") or die(mysqli_error($db));
    return $request;
}

function list_msg_user_navbar($db)
{
    $request = $db->query("SELECT * FROM concern c INNER JOIN users u ON u.userId=c.userId INNER JOIN messages m ON m.messageId=c.messageId inner JOIN groupes g ON g.groupId=c.groupId INNER JOIN files f ON f.fileId=m.messageFile 
    WHERE ( c.receiver = '{$_SESSION["user_id"]}') AND u.userId !='{$_SESSION["user_id"]}' AND c.concernStatus=0 
    GROUP BY u.userId 
    ORDER BY sendAt LIMIT 0, 6 ") or die(mysqli_error($db));

    // $request = $db->query(" SELECT * FROM concern c  INNER JOIN users u ON u.userId = c.userId  WHERE c.userId != '{$_SESSION["user_id"]}' OR c.receiver = '{$_SESSION["user_id"]}'  ") or die(mysqli_error($db));
    return $request;
}

function plus_d_inspi1($concerid, $db)
{
    $request = $db->query("SELECT * FROM concern WHERE concernId = $concerid") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request);
}



function update_msg_stat($message, $db)
{

    $db->query("UPDATE concern SET concernStatus=1 WHERE messageId=$message AND receiver='{$_SESSION["user_id"]}' AND concernStatus=0")
        or die(mysqli_error($db));
}



function add_message_student($data, $connect, $user_id)
{

    $connect->query("INSERT INTO `messages`(`messageContent`, `messageCreatedAt`, `messageFile`) 
    VALUES ('{$data['message']}',now(),null)") or die(mysqli_error($connect));

    $msg_id = get_last_inserted_id($connect);

    $connect->query("INSERT INTO `concern`(`messageId`, `groupId`, `userId`, `receiver`, `sendAt`, `concernStatus`) 
    VALUES ('{$msg_id}',null,'{$_SESSION["user_id"]}','{$data['hidded_id']}',now() ,0) ") or die(mysqli_error($connect));
}

function add_file_message($file_id, $receiver_id, $connect)
{
    $connect->query("INSERT INTO `messages`(`messageContent`, `messageCreatedAt`, `messageFile`) 
    VALUES (null,now(),$file_id)") or die(mysqli_error($connect));

    $msg_id = get_last_inserted_id($connect);

    $connect->query("INSERT INTO `concern`(`messageId`, `groupId`, `userId`, `receiver`, `sendAt`, `concernStatus`) 
    VALUES ('{$msg_id}',null,'{$_SESSION["user_id"]}',$receiver_id,now() ,0) ") or die(mysqli_error($connect));
}

function user_info($user_id, $db)
{
    $request = $db->query("SELECT * FROM users WHERE userId=$user_id") or die(mysqli_error("$db"));
    return mysqli_fetch_assoc($request);
}

function list_employee_msg($db)
{
    $request = $db->query(" SELECT * FROM users u INNER jOIN companies c ON c.companyId=u.companyId WHERE u.companyId='{$_SESSION["user_company"]}' AND userStatus='1' AND userCompanyStatus='1' AND userId != '{$_SESSION["user_id"]}' ") or die(mysqli_error($db));
    return $request;
}

function info_file($id_file, $db)
{
    $request = $db->query("SELECT * FROM files WHERE fileId=$id_file") or die(mysqli_error($db));
    return mysqli_fetch_assoc($request);
}

function save_file_msg($location, $name, $db)
{

    $db->query(" INSERT INTO `files`(`userId`, `fIleName`, `filePosition`, `fileCreatedAt`,fileuser)" .
        "VALUES ('{$_SESSION["user_id"]}','{$name}','{$location}',now(),1) ") or die(mysqli_fetch_assoc($db));
}


function create_group($name, $db)
{
    $db->query(" INSERT INTO `groupes`(`groupName`, `createdAt`, `groupCreatedBy`) 
    VALUES ('{$name}',now(),'{$_SESSION["user_id"]}') ") or die(mysqli_error($db));
    return get_last_inserted_id($db);
}
