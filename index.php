<?php
session_start();
if(isset($_SESSION['zalogowany']))
{

}
else
{
    $_SESSION['zalogowany']=0;
}
//$_SESSION['img_status']=1;

    require_once 'baza_pdo.php';
    if(isset($_SESSION['user_login'])){
    $login=$_SESSION['user_login'];
    $_SESSION['img_status']=pobierz_img_status($login);
    }
    if ($_SESSION['zalogowany'] >0 && $_SESSION['komp_info'] != $_SERVER['HTTP_USER_AGENT']) // Zmiana przeglądarki zabezpieczenie
{
    echo "zostajesz wylogowany z powodu zmiany";
    $_SESSION['zalogowany'] == 0;
    session_destroy();
}  
   /*  if(!isset($_SESSION['initiate']))     //regeneracja id sesji
 {
     session_regenerate_id();
     $new_session_id = session_id();
     session_write_close();
     session_id($new_session_id);
     session_start();
     $_SESSION['initiate'] = 1;
 }  */
?>
<html lang="pl">
    <head>
        <meta name="description" content="Mój własny system CMS">
        <meta name="keywords" content="CMS, OZGA">
        <meta name="author" content="Bartosz Ozga">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/645a3c2455.js" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/e0bf2f35d3.js"></script>
        <title>tu bedzie skrypt losujacy tytul</title>
    </head>
    <body>
        <div id="nawigacja">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php"><i class="fas fa-poo"></i>  CMS</a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbars" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
             </button>
     <div class="collapse navbar-collapse navbars" id="navbar1">
        <ul class="navbar-nav mr-auto">

            <?php
            if($_SESSION['zalogowany']==0)
            {
                echo "</ul></div>";
            }
            else
            {
            echo "
            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='?pagelog=moje_konto' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Moje Konto
                </a>
                       <!--Elementy Rozwijane-->
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='?pagelog=konto'>Zarządzaj Kontem</a>
                    </div>
        </ul>";
            }
                            ?>
     <div class="collapse navbar-collapse navbars justify-content-end" id="navbarSupportedContent2">
        <ul class="navbar-nav ml-auto"  id="account_information">
            <?php
                        if(isset($_SESSION['user_login']))
            {
                if(!empty($_SESSION['user_login'])){
                echo "<li class='nav-item '><div class='tekst'>Witaj  ".$_SESSION['user_login']."!</div></li>";}
            }
                        if(isset($_SESSION['img_status']))
                        {
                            if($_SESSION['img_status']==0)
                            {
                                echo "<li class='nav-item'><div class='av-test'><img src='img/av_test.png' alt='avatar_domyślny'></div></li>    ";
                            }
                            else
                            {
                                $login=$_SESSION['user_login'];
                                $id_user= pobierz_id_user($login);
                                echo "<li class='nav-item'><div class='av-test'><img src='img/users_img/".$id_user."avatar.png' class='avatar_img_bar' alt='avatar_uzytkownika'></div></li>    ";
                                
                            }
                        }
            if($_SESSION['zalogowany']==0)
                {
            echo "<li class='nav-item'>
                <a class='btn button_custom_1 ' href='?page=zarejestruj' role='button'>Zarejestruj</a>
            </li>
            <li class='nav-item'>
                <a class='btn button_custom_1 ' href='?page=zaloguj' role='button'>Zaloguj</a>
            </li>";
                }
                else
                {
            echo "<li class='nav-item'>
                <a class='btn btn-primary d-none' href='?page=zarejestruj' role='button'>Zarejestruj</a>
            </li>
            <li class='nav-item'>
                <a class='btn btn-primary d-none' href='?page=zaloguj' role='button'>Zaloguj</a>
            </li>
            <li class='nav-item'>
                <a class='btn button_custom_1' href='?pagelog=wyloguj' role='button'>Wyloguj</a>
            </li>
";

                }    ?>
        </ul>
     </div>
     </div>
    </nav>
               
        </div> 
        <div id="zawartossc">
            <?php
            if($_SESSION['zalogowany']==0)
            {
                echo "<div class='alert alert_text alert-success alert-dismissable '>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  Drogi użytkowniku, jeśli jeszcze nie masz konta zachęcamy do rejestracji!
</div>";
            }
            if(isset($_GET['page']))
            {
                $allowed_pages = array("zarejestruj", "zaloguj","pomyslna_rejestracja");       
                $page = filter_var($_GET['page'], FILTER_SANITIZE_STRING);
                    if (!in_array($page, $allowed_pages))
                        echo "taka strona nie istnieje";
                 if (!empty($page))
                     {
                        if (is_file($page.".php"))
                             {
                                 include($page.".php");
                             }
                        else
                            {
                                echo "taka strona nie iestnieje";
                             }
                     }
            }
            if(isset($_GET['pagelog']))
            {
                if($_SESSION['zalogowany']>0)
                {
                $allowed_pages_logged = array("moje_konto","wyloguj","konto","zmien_haslo","zmien_email","avatar","zmien_opis");       
                $pagelog = filter_var($_GET['pagelog'], FILTER_SANITIZE_STRING);
                if (!in_array($pagelog, $allowed_pages_logged))
                 echo "taka strona nie istnieje";
                else
                {
                 if (!empty($pagelog))
                     {
                        if (is_file($pagelog.".php"))
                             {
                                 include($pagelog.".php");
                             }
                        else
                            {
                                echo "taka strona nie iestnieje";
                             }
                     }
                }
                }
                else
                {
                    echo "Musisz być zalogowany by wyświetlić zawartość";
                }
            }
            ?>
             
        </div>
        <div id="stopka">
            
            
        </div>
        
        
        
        
        
        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
