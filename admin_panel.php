<?php
session_start();
if(isset($_POST['submit'])){
    $login = 'admin';
    $pass = 'haselko123';
    
    if($login == $_POST['login'] && $pass == $_POST['pass']){
        $_SESSION['x'] = true;
        header('Location: panel_admin.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link type="text/css" rel="stylesheet" href="panel.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <meta name="author" content="Dominik Lichota">
</head>
<body>
   
<div id="wrapper">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <label>Login:<div><input type="password" name="login" id="login"></div></label><br>
      <label>Password:<div><input type="password" name="pass" id="pass"></div></label><br>
      <input type="submit" value="submit" name="submit" id="submit">
      
  
    </form>
 <div>
</body>
</html>