<?php
session_start();
require_once 'baza_pdo.php';
if(isset($_POST['login']))
{
    $znaki_zakazane="/[`'\"~!@# $*()<>,:;{}\|]/";
    if(!empty($_POST['login']))
    {
        $login=filter_var($_POST['login'], FILTER_SANITIZE_STRING);
        if(strlen($login)>5)
        {
            if(strlen($login)<12)
            {
                if(!preg_match($znaki_zakazane, $login))
                {
                    $login_odebrany=pobierz_login($login);
                    if($login_odebrany==NULL)
                    {
                        $ok_login=1;
                    }
                    else
                    {
                      $_SESSION['login_juzjest_error'] = "<small class='form-text ' style='color:red;'>Ten login jest już wykorzystany!</small>";  
                    }
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
    if(!empty($_POST['haslo1']))                            //Można dodać by hasło zawierało znaki specjalne i minimalną długość
    {
        if($_POST['haslo1']==$_POST['haslo2'])
        {   
            $haslo1=filter_var($_POST['haslo1'], FILTER_SANITIZE_STRING);
            if(strlen($haslo1)<32)
            {
                $ok_haslo1=1; 
            }
            else
            {
                $_SESSION['password_zaduzo_error'] = "<small class='form-text ' style='color:red;'>Hasło jest zbyt długie!</small>"; 
            }
        }
        else
        {
         $_SESSION['password_rozne_error'] = "<small class='form-text ' style='color:red;'>Hasła nie są identyczne!</small>";    
        }
    }
    else 
    {
     $_SESSION['password_empty_error'] = "<small class='form-text ' style='color:red;'>Hasło jest puste!</small>"; 
    }
    if(!empty($_POST['haslo2']))
    {
       $ok_haslo2=1; 
    }
    else 
    {
     $_SESSION['password_empty_error2'] = "<small class='form-text ' style='color:red;'>Hasło jest puste!</small>"; 
    }    
    if(!empty($_POST['email']))
    {
        $email=$_POST['email'];
        if(strlen($email)<32)
        {
          if (filter_var($email, FILTER_VALIDATE_EMAIL))
          {
              $email_odebrany=pobierz_email($email);
              if($email_odebrany==NULL)
              {
                $ok_email=1;  
              }
              else
              {
              $_SESSION['email_juzistnieje_error']="<small class='form-text ' style='color:red;'>Ten email jest już wykorzystany!</small>";
              }
              
          }
          else
          {
             $_SESSION['email_poprawny_error'] = "<small class='form-text ' style='color:red;'>Email musi być poprawny!</small>"; 
          }
        }
        else
        {
           $_SESSION['email_zadlugi_error'] = "<small class='form-text ' style='color:red;'>Email jest zbyt długi!</small>"; 
        }
    }
    else 
    {
     $_SESSION['email_empty_error'] = "<small class='form-text ' style='color:red;'>Email jest pusty!</small>"; 
    }    
    
    if(isset($_POST['regulamin']))
    {
        $ok_regulamin=1;
    }
    else
    {
      $_SESSION['regulamin_empty_error'] = "<small class='form-text ' style='color:red;'>Regulamin musi być zatwierdzony!</small>";   
    }
    
    
    
    if(($ok_login AND $ok_haslo1 AND $ok_email AND $ok_regulamin AND $ok_haslo2)==1)
    {
        $salt="cmsByOzgaB";
        $haslo_do_bazy = hash("sha512", $salt.$haslo1);
        $login_do_bazy = $login;
        $email_do_bazy = $email;
        if(wprowadz_rejestracja($login_do_bazy,$haslo_do_bazy,$email_do_bazy)==1)
        {
                 
            require_once 'mail_aktywacyjny.php';
            wyslij_aktywacje();
            wprowadz_rejestracja_bio($login);
                 $_SESSION['pomyslna_rejestracja']="<h2 class='form-text ' style='color:#4F86C6;'>Konto zostało założone, wysłaliśmy mail z linkiem aktywującym!</h2>";
                 header("Location: index.php?page=pomyslna_rejestracja");
        }
        else
        {
          $_SESSION['polaczenie_z_baza_error']="<small class='form-text ' style='color:red;'>POŁĄCZENIE Z BAZĄ NIE POWIODŁO SIE SPRÓBÓJ PONOWNIE!</small>";
          header("Location: index.php?page=zarejestruj"); 
        }
        //zahaszowanie hasła
     //wprowadz_rejestracja($login,$haslo,$email);

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