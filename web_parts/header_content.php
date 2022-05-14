<?php
 switch ($page) {
    case "about_me":
        echo "About me";
        $mycontent = fopen("content/about_me.txt", "r") or die("Unable to open file!");
        $x = fread($mycontent,filesize("content/about_me.txt"));
        fclose($mycontent);
        break;
    case "contact":
        echo "Contact:";
        $mycontent = fopen("content/contact.txt", "r") or die("Unable to open file!");
        $x = fread($mycontent,filesize("content/contact.txt"));
        fclose($mycontent);
        break;
    case "my_lang":
        echo "My languages";
        $mycontent = fopen("content/my_lang.txt", "r") or die("Unable to open file!");
        $x = fread($mycontent,filesize("content/my_lang.txt"));
        fclose($mycontent);
        break;
    case "my_skills":
        echo "My skills";
        $mycontent = fopen("content/my_skills.txt", "r") or die("Unable to open file!");
        $x = fread($mycontent,filesize("content/my_skills.txt"));
        fclose($mycontent);
        break;
    case "mailer":
            echo "Mailer";
            $x = 'Message was sent. You will be redirected to the website in 5 seconds.';
            break;
    default:
        echo "My website";
        $mycontent = fopen("content/default_content.txt", "r") or die("Unable to open file!");
        $x = fread($mycontent,filesize("content/default_content.txt"));
        fclose($mycontent);
 }
?>