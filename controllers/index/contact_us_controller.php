<?php
$error = false;

if (isset($_POST['submit_contact_us'])) {
    foreach (array_values($_POST) as $keys => $values) :
        $data = array_combine(array_keys($_POST), array_values($_POST));
    endforeach;

    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error_content = "<strong>Email</strong> incorrect !.";
            $error == true;
            require 'views/index/contact_us.php';
        }
        if (empty($data['email'])) {
            $error_content = "entrez Votre <strong>Email</strong> !.";
            $error == true;
            require 'views/index/contact_us.php';
        }
    }

    if (empty($data['subject'])) {
        $error_content = "entrez un <strong>Sujet</strong> !.";
        $error == true;
        require 'views/index/contact_us.php';
    }

    if (empty($data['message'])) {
        $error_content = "entrez un <strong>Message</strong> !.";
        $error == true;
        require 'views/index/contact_us.php';
    }

    if (empty($data['name'])) {
        $error_content = "entrez votre <strong>Nom</strong> !.";
        $error == true;
        require 'views/index/contact_us.php';
    }

    if ($error === false) {
        $error_success = "Message envoyé avec succès !.";
        require 'views/users/register.php';
    }
}




/*if(isset( $_POST['name']))
$name = $_POST['name'];
if(isset( $_POST['email']))
$email = $_POST['email'];
if(isset( $_POST['message']))
$message = $_POST['message'];
if(isset( $_POST['subject']))
$subject = $_POST['subject'];
if ($name === ''){
echo "Name cannot be empty.";
die();
}
if ($email === ''){
echo "Email cannot be empty.";
die();
} else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "Email format invalid.";
die();
}
}
if ($subject === ''){
echo "Subject cannot be empty.";
die();
}
if ($message === ''){
echo "Message cannot be empty.";
die();
}
$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "youremail@here.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
echo "Email sent!";*/