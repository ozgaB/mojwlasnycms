<?php
session_start();
require_once 'baza_pdo.php';
if(isset($_POST['login']))
{
    if(isset($_POST['password']))
    {
       if(!empty($_POST['login']))
       {
           $login=filter_var($_POST['login'], FILTER_SANITIZE_STRING);
           $login_otrzymany=pobierz_login($login);
           if($login_otrzymany==$_POST['login'])
           {
               $haslo_otrzymane=filter_var($_POST['password'], FILTER_SANITIZE_STRING);
               $salt="cmsByOzgaB";
               $haslo = hash("sha512", $salt.$haslo_otrzymane);
               $haslo_odebrane=pobierz_haslo($haslo);
               if($haslo==$haslo_odebrane)
               {
                   $_SESSION['zalogowany']=pobierz_id_user($login_otrzymany);
                   $_SESSION['user_login']=$login_otrzymany;
                   $_SESSION['user_email']=pobierz_email_za_login($login);
                   header("Location: index.php");  
               }
               else
               {
               $_SESSION['password_error_1'] = "<small class='form-text ' style='color:red;'>Hasło jet nieprawidłowe</small>";
               header("Location: index.php?page=zaloguj");   
               }
           }
           else
           {
               $_SESSION['login_error_1'] = "<small class='form-text ' style='color:red;'>Błędny login spróbuj ponownie</small>";
               header("Location: index.php?page=zaloguj");
           }
       }
       else
       {
           $_SESSION['login_pusty_error'] = "<small class='form-text ' style='color:red;'>Pole loginu jest puste!</small>";
           header("Location: index.php?page=zaloguj");
       }
    }
    else
    {
     echo "<a href='index.php'>Blad logowania spróbuj ponownie!</a>";   
        
    }
}
else
{
    echo "<a href='index.php'>Blad logowania spróbuj ponownie!</a>";
}





?>