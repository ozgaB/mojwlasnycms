<?php
require_once 'baza_pdo.php';
$login=$_SESSION['user_login'];
$id_user=pobierz_id_user($login);
$img_status=pobierz_img_status($login);
?>

<div class="row">
    <div class="col-2"></div>
    <div class="col-2">
        <?php
        require_once 'baza_pdo.php';

        if($img_status==0)
        {
          echo "<h2>Dodaj swoje zdjęcie profilowe</h2>";
          echo   "<form action='index.php?pagelog=avatar' method='post' enctype='multipart/form-data'>
            <div>
                <input type='hidden' name='Max_FILE_SIZE' value='30000000' />
              <input class='btn button_custom_5 btn-block' type='file' name='avatar_dodaj' />
              <input class='btn button_custom_5 btn-block' type='submit' value='Dodaj zdjęcie'/>
                </div>";
                wyswietl_error_avatar();
        }
        else
        {
          echo "<h2>Zmień swoje zdjęcie profilowe</h2>";
          echo   "<form action='index.php?pagelog=avatar' method='post' enctype='multipart/form-data'>
            <div>
                <input type='hidden' name='Max_FILE_SIZE' value='512000' />
              <input class='btn button_custom_5 btn-block' type='file' name='avatar_zmien' />
              <input class='btn button_custom_5 btn-block' type='submit' value='Dodaj Plik'/>
                </div>"; 
                wyswietl_error_avatar();
          }

        ?> 
        
        
        
        
    </div>
    <div class="col-2"></div>
    <div class="col-2"></div>
    <div class="col-2">
        <h2>Twoje zdjęcie profilowe:</h2>
        <?php    
        if($img_status==1)
        {
            echo "<img src='img/users_img/".$id_user."avatar.png' class='avatar_img_Duzy' alt=''></img>";
        }
        else
        {
          echo "<img src='img/av_test.png'></img>";  
        }
        
        
        ?>
        
    </div>
    <div class="col-2"></div>    
</div>
        
        <?php
        if(isset($_FILES['avatar_dodaj']))
        {
        $avatar='avatar_dodaj';
        walidacja_avatar($avatar,$login,$id_user);
        }
        if(isset($_FILES['avatar_zmien']))
        {
            if(unlink("img/users_img/".$id_user."avatar.png")==true)
            {
                           $avatar='avatar_zmien';
                           walidacja_avatar($avatar,$login,$id_user);
                                                                                    //DO BAZY ZAPISUJE ROZSZERZENIE I POTEM JAKO ZMIENNA ODCZYTUJE//   DO ZROBIENIA
            }
            else
            {
            $_SESSION['avatar_zmien_usun'] = "<small class='form-text ' style='color:red;'>Nie udało się zastąpić poprzedniego zdjęcia!</small>";
 
            }
        }
        
        
        
        function wyswietl_error_avatar()
        {
                    if(!empty($_SESSION['avatar_format_error']))
                    {
                        echo $_SESSION['avatar_format_error'];
                        unset($_SESSION['avatar_format_error']);
                    }
                                        if(!empty($_SESSION['avatar_zaduzo_error']))
                    {
                        echo $_SESSION['avatar_zaduzo_error'];
                        unset($_SESSION['avatar_zaduzo_error']);
                    }
        }
        
        
        
        
        function walidacja_avatar($avatar,$login,$id_user)
        {
                        if($_FILES[$avatar]['size']<512000)
            {
              
           if($_FILES[$avatar]['type'] != 'image/png')
           {
                                            

            $_SESSION['avatar_format_error'] = "<small class='form-text ' style='color:red;'>Zdjęcie musi być w formacie png!</small>";
           }
           else{
                              

            move_uploaded_file($_FILES[$avatar]['tmp_name'], "img/users_img/".$id_user."avatar.png");
            $img_status=1;
            zmien_img_status($login, $img_status);
            header("Location: index.php?pagelog=avatar");

            switch($_FILES[$avatar]['error'])
            {
                case 0;
                    break;
                case 1;
                    echo "za duży plik  php.ini";
                   
                break;
                case 4;
                    echo "nie wybrano pliku";
                    break;
                default:
                    echo "blad";
            }
           }
        }
        else
        {
            $_SESSION['avatar_zaduzo_error'] = "<small class='form-text ' style='color:red;'>Zdjęcie nie może przekraczać 0,5MB!</small>";
        }
        }
        ?>