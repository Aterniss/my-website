<?php
ini_set('session.save_path', 'tmp');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sent</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <meta name="author" content="Dominik Lichota">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>
<body>
    <h1 style="text-align: center; color: white;margin: auto auto; font-weight: bold;">Message was sent. You will be redirected to the website in 5 seconds.</h1>
    <p>You can also find me on linkedin, write me an e-mail or check my profile on github. All links are below of the page.</p>
    <?php

  $name = $_SESSION["name"];
  $email = $_SESSION["email"];
  $tel = $_SESSION["tel"];
  $title = $_SESSION["title"];
  $msg = $_SESSION["msg"];
  $info = $name .'<br>'. $email .'<br>'. $tel .'<br>'. $msg;
  $to = "contact@aternis.eu";
  $subject = $title;
  $message = $msg;
  $from = $email;
  mail($to,$subject,$info);
  
  header( "refresh:5;url=contact_form.php" );
  

?>


</body>
</html>