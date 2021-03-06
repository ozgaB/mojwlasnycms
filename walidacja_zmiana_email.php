<?php
require_once 'baza_pdo.php';
session_start();
var_dump($_SESSION['user_login']);
$login=$_SESSION['user_login'];
$login_do_bazy=filter_var($login, FILTER_SANITIZE_STRING);
        if(isset($_POST['stary_email']))
        {
            if(!empty($_POST['stary_email']))
            {
                $stary_email=filter_var($_POST['stary_email'], FILTER_SANITIZE_STRING);
                $email_z_bazy= pobierz_email_za_login($login_do_bazy);
                if($stary_email==$email_z_bazy)
                {
                    $stary_email=1;
                }
                else
                {
                    $_SESSION['nowe_zle_error']="<small class='form-text ' style='color:red;'>Email jest niepoprawny!</small>";
                }
            }
            if(!empty($_POST['nowy_email']))                            //Można dodać by hasło zawierało znaki specjalne i minimalną długość
            {
                if($_POST['nowy_email']==$_POST['nowy_email2'])
                {   
                    $email=$_POST['nowy_email'];
                    if (filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        if(strlen($email)<32)
                            {
                                $ok_email=1; 
                            }
                            else
                            {
                                $_SESSION['email_zaduzo_error'] = "<small class='form-text ' style='color:red;'>Email jest zbyt długi!</small>"; 
                            }  
                    }
                    else
                    {
                      $_SESSION['email_niepoprawny_error'] = "<small class='form-text ' style='color:red;'>Składnia email jest niepoprawna, example@gmail.com!</small>";  
                    }
                }
                else
                {
                 $_SESSION['email_rozne_error'] = "<small class='form-text ' style='color:red;'>Emaile nie są identyczne!</small>";    
                }
    }
    else 
    {
     $_SESSION['email_empty_error'] = "<small class='form-text ' style='color:red;'>Email jest pusty!</small>"; 
    }
    if(!empty($_POST['nowy_email2']))
    {
       $ok_email2=1; 
    }
    else 
    {
     $_SESSION['email_empty_error2'] = "<small class='form-text ' style='color:red;'>Email jest pusty!</small>"; 
    } 
    if(($stary_email AND $ok_email AND $ok_email2)==1)
    {
        header("Location: index.php?pagelog=zmien_email"); 
        
        $_SESSION['email_zmieniony'] = "<h2 class='form-text ' style='color:#4F86C6;'>Link weryfikujący email został wysłany! (Dorób skrypt wysyłający)</h2>"; 
        // SKRYPT WYSYŁAJĄCY MAIL !!!!
        $email=$email_do_skryptu_poczty;
    }
    else
    {
         header("Location: index.php?pagelog=zmien_emaileee");
    }
    
    
    
    
    
    
        }




?>