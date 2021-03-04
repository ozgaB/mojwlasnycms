<?php
require_once 'baza_pdo.php';
session_start();
var_dump($_SESSION['user_login']);
$login=$_SESSION['user_login'];
$login_do_bazy=filter_var($login, FILTER_SANITIZE_STRING);
        if(isset($_POST['stare_haslo']))
        {
            if(!empty($_POST['stare_haslo']))
            {
                $stare_haslo=filter_var($_POST['stare_haslo'], FILTER_SANITIZE_STRING);
                $salt="cmsByOzgaB";
                $stare_haslo_hash = hash("sha512", $salt.$stare_haslo);
                $haslo_z_bazy=pobierz_haslo_za_login($login_do_bazy);
                if($stare_haslo_hash==$haslo_z_bazy)
                {
                    $stare_haslo=1;
                }
                else
                {
                    $_SESSION['nowe_zle_error']="<small class='form-text ' style='color:red;'>Hasło jest niepoprawne!</small>";
                }
            }
            if(!empty($_POST['nowe_haslo']))                            //Można dodać by hasło zawierało znaki specjalne i minimalną długość
            {
                if($_POST['nowe_haslo']==$_POST['nowe_haslo2'])
                {   
                    $haslo1=filter_var($_POST['nowe_haslo'], FILTER_SANITIZE_STRING);
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
    if(!empty($_POST['nowe_haslo2']))
    {
       $ok_haslo2=1; 
    }
    else 
    {
     $_SESSION['password_empty_error2'] = "<small class='form-text ' style='color:red;'>Hasło jest puste!</small>"; 
    } 
    if(($stare_haslo AND $ok_haslo1 AND $ok_haslo2)==1)
    {
        
        $salt="cmsByOzgaB";
        $nowe_haslo = hash("sha512", $salt.$haslo1);
        $wynik=zmien_haslo($login_do_bazy,$nowe_haslo);
        
        header("Location: index.php?pagelog=zmien_haslo"); 
        
        $_SESSION['haslo_zostalo_zmienione'] = "<h2 class='form-text ' style='color:#4F86C6;'>Hasło zostało zmienione $wynik</h2>"; 
    }
    else
    {
         header("Location: index.php?pagelog=zmien_haslo");
    }
    
    
    
    
    
    
        }




?>