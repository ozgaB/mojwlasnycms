<?php
session_start();
if($_POST['login']=='Bartek')
{
    $_SESSION['prawda']="prawda";
    header("Location: index.php?page=zarejestruj");
}

if(isset($_POST['login']))
{
    $znaki_zakazane="#$%^&*()+=-[]';,./{}|:<>?~";
    if(!empty($_POST['login']))
    {
        $login=filter_var($_POST['login'], FILTER_SANITIZE_STRING);
        if(strlen($login)>5)
        {
            if(strlen($login)<12)
            {
                if(!preg_match($znaki_zakazane, $login))
                {
                    $ok_login=1;
                }
                else
                {
                    $_SESSION['login_znaki_error'] = "<small class='form-text ' style='color:red;'>Login nie może zawierać znaków specjalnych!</small>";
                }
            }
            else
            {
                $_SESSION['login_zaduzo_error'] = "<small class='form-text ' style='color:red;'>Login nie może być dłuższy niż 12 znaków!</small>"; 
            }
        }
        else
        {
           $_SESSION['login_zamalo_error'] = "<small class='form-text ' style='color:red;'>Login musi mieć conajmniej 5 znaków!</small>";  
        }
    }
    else 
    {
     $_SESSION['login_empty_error'] = "<small class='form-text ' style='color:red;'>Login jest pusty</small>"; 
    }    
    if(!empty($_POST['haslo1']))
    {
        $ok_haslo=1;
    }
    else 
    {
     $_SESSION['password_empty_error'] = "<small class='form-text ' style='color:red;'>Hasło jest puste!</small>"; 
    }    
    if(!empty($_POST['email']))
    {
        $ok_email=1;
    }
    else 
    {
     $_SESSION['email_empty_error'] = "<small class='form-text ' style='color:red;'>Email jest pusty!</small>"; 
    }    
    
    $ok_regulamin=1;
    
    
    
    
    if(($ok_login AND $ok_haslo AND $ok_email AND $ok_regulamin)==1)
    {
     //wprowadz_rejestracja($login,$haslo,$email);
     header("Location: index.php?page=pomyslna_rejestracja");  
    }
    else
    {
      header("Location: index.php?page=zarejestruj");    
    }
}
else
{
    echo "<a href='index.php'>Blad rejestracji spróbuj ponownie!</a>";
}




?>