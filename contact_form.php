<?php
ini_set('session.save_path', 'tmp');
session_start();
$e_required = 'This field is required!';
function valid_email($str) {
  return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

if(isset($_POST['submit'])){
  $flag_ok=1;
    //check name
    if(empty($_POST['pool_name'])){
      $e_name = $e_required;
      $flag_ok=0;
    }
    //check tel
    if(empty($_POST['pool_tel'])){
      $tel = 'Not introduced.';
    }else{
      $tel = $_POST['pool_tel'];
    }

     // check email
     if(empty($_POST['pool_email'])){
     $e_email = $e_required;
     $flag_ok=0;
     }
     if(!valid_email($_POST['pool_email'])){
     $e_email = 'Email format is invalid!';
     $flag_ok=0;
     }
 
    // check reapeted email
    if($_POST['pool_email2'] !== $_POST['pool_email']){
      $e_email2 = 'Both emails are not the same!';
      $flag_ok=0;
    }
    // check title
    if(empty($_POST['pool_title'])){
    $e_title = $e_required;
    $flag_ok=0;
    }
    // check msgbox
    if(empty($_POST['pool_msg'])){
    $e_msg = $e_required;
    $flag_ok=0;
    }

    //hurra lets do next step:
    if($flag_ok == 1){
      $_SESSION["name"] = $_POST['pool_name'];
      $_SESSION["email"] = $_POST['pool_email'];
      $_SESSION["tel"] = $tel;
      $_SESSION["title"] = $_POST['pool_title'];
      $_SESSION["msg"] = $_POST['pool_msg'];
      header('Location: send.php');
    }

    
    
 }


?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_W_D</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <meta name="author" content="Dominik Lichota">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>
<body>
    <div id="wrapper">
     <!-- header --config-->
          <header>
            <div id="wrapper-header">
              <div id="home-icon"><h3><span>Web</span> developer</h3>
              </div>
            <div id="home-title">
              <h1>
                Contact me
              </h1>
            </div>
            <div id="language-page">
              <!--
              <div id="lang-title">Language</div>
              <div id="lang-flags">
              <a href="#"><img class="img-prop" src="img/EN-flag.png" alt="EN-flag"></a>
              <a href="#"><img class="img-prop" src="img/NL-flag.png" alt="NL-flag"></a>
              <a href="#"><img class="img-prop" src="img/PL-flag.png" alt="NL-flag"></a>
              </div>
            </div>
           -->
          </div>
      </header>
      <main>
       <!------------ Form -------------------->

          <h3>Form</h3>
          <div id="form-size">
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="comment_form">
            <div id="wrapper-form">
              <div class="pool_name"><input type="text" name="pool_name" id="pool_name" placeholder="Your full name">
              <p style="color: red; font-size:small;">
              <?php 
                if(isset($e_name)){
                  echo $e_name;
                  unset($e_name);
                }
               ?>
               </p>
            </div>
              <div class="pool_email"><input type="email" name="pool_email" id="pool_email" placeholder="Your email">
              <p style="color: red; font-size:small;">
              <?php 
                if(isset($e_email)){
                echo $e_email;
                unset($e_email);
                }
               ?></p>
            </div>
              <div class="pool_tel"><input type="tel" name="pool_tel" id="pool_tel" placeholder="Your tel. (optional)"></div>
              <div class="pool_email2"><input type="email" name="pool_email2" id="pool_email2" placeholder="repeat email">
              <p style="color: red; font-size:small;">
              <?php 
                        if(isset($e_email2)){
                          echo $e_email2;
                          unset($e_email2);
                          }
               ?><p>
               </div>
              <div class="pool_title"><input type="text" name="pool_title" id="pool_title" placeholder="Title message">
              <p style="color: red; font-size:small;">
              <?php 
                if(isset($e_title)){
                  echo $e_title;
                  unset($e_title);
                }
               ?></p>
               </div>
              <div class="pool_msg"><textarea name="pool_msg" id="pool_msg" placeholder="Your message ..."></textarea>
              <p style="color: red; font-size:small;">
              <?php 
                if(isset($e_msg)){
                  echo $e_msg;
                  unset($e_msg);
                }
               ?></p></div>
              <div class="pool_submit"><input type="submit" value="SUBMIT" name="submit" id="submit"></div>
              <div id="feed"><br></div>
           </div>
           </div>
          </form>
        

          <!-- REST CONTENT-->
    </main>
    <aside id="aside1">
        <div id="bg-aside1">
          <div class="icon-iside1"><a href="about_me.php" action="about_me"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          </svg></a></div>
        <div class="icon-iside1"><a href="my_skills.php"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
          <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
          </svg></a></div>
        <div class="icon-iside1"><a href="my_languages.php"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
          <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z"/>
          <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z"/>
          </svg></a></div>
        <div class="icon-iside1"><a href="contact.php"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
          <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
          </svg></a></div>
        </div>
    </aside>
    <aside id="aside2">
        <div class="hidden">
        <div id="bg-aside2">
          <h3>Navi:</h3></div> 
        </div>
      </aside>   
      <footer><p>2022 &copy; for more info click below </p>
        <!--<div id="fb"><a href="#" title="facebook" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg></a>
          </div>>
        -->
         <div id="linked"><a href="https://www.linkedin.com/in/dominik-lichota-174b94238" title="linkedin" target="_blank">
           <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
               <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
             </svg>
           </a></div>
          <div id="mail">
           <a href="mailto:dlichota93@gmail.com" title="mail" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
              <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
            </svg>
           </a></div>
           <div id="git">
           <a href="https://github.com/Aterniss" title="github" target="_blank">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                   <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                 </svg>
           </a>
           </div>
    </footer> 
            

  
      </div>
  </body>
  </html>
