<?php
session_start();
$_SESSION['zalogowany']=1;

?>
<html lang="pl">
    <head>
        <meta name="description" content="Mój własny system CMS">
        <meta name="keywords" content="CMS, OZGA">
        <meta name="author" content="Bartosz Ozga">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        
        <title></title>
    </head>
    <body>
        <div id="nawigacja">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.ph">CMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbars12" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse navbrs12" id="menurozwijane">
                   <ul class="navbar-nav mr-auto">

            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='?page=moje_konto' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Moje Konto
                </a>
                       <!--Elementy Rozwijane-->
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='#'>Zarządzaj Kontem</a>
                    </div>
        </ul>
                      </div>
</nav>   
             <nav class="navbar navbar-expand-lg navbar-light bg-light">
                      <div class="collapse navbar-collapse navbars12" id="menurozwijane2">
                      <ul class="ml-auto navbar-nav">
                     
                          <li class='nav-link'>
                              <a href='?page=zarejestruj.php' role='button'class='btn button_custom_1 btn-sm'>ZAREJESTRUJ</a>
                          </li>
                          <li class='nav-link'>
                              <a href='?page=zarejestruj.php' role='button'class='btn button_custom_1 btn-sm'>ZALOGUJ</a>
                          </li> 
                      </ul>
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
                $allowed_pages = array("zarejestruj", "zaloguj", "moje_konto","pomyslna_rejestracja","odbierz_rejestracje","wyloguj");       
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
            ?>
             
        </div>
        <div id="stopka">
            
            
        </div>
        
        
        
        
        
        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
