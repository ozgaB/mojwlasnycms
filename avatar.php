<?php
require_once 'baza_pdo.php';
$id_user=pobierz_id_user($_SESSION['user_login']);
$img_status=pobierz_img_status($_SESSION['user_login']);
?>

<div class="row">
    <div class="col-2"></div>
    <div class="col-2">
        <?php
        require_once 'baza_pdo.php';

        if($img_status==0)
        {
          echo "<h2>Dodaj swoje zdjęcie profilowe</h2>";
          echo   "<form action='avatar.php' method='post' enctype='multipart/form-data'>
            <div>
                <input type='hidden' name='Max_FILE_SIZE' value='30000000' />
              <input class='btn button_custom_4 btn-block' type='file' name='plik' value='Wybierz plik .png' />
              <input class='btn button_custom_4 btn-block' type='submit' value='Dodaj zdjęcie'/>
                </div>";
        }
        else
        {
          echo "<h2>Zmień swoje zdjęcie profilowe</h2>";
          echo   "<form action='avatar.php' method='post' enctype='multipart/form-data'>
            <div>
                <input type='hidden' name='Max_FILE_SIZE' value='30000000' />
              <input type='file' name='plik' />
              <input type='submit' value='Dodaj Plik'/>
                </div>"; 
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
            echo "<img src='img/users_img/$id_user.avatar.png'></img>";
        }
        else
        {
          echo "<img src='img/av_test.png'></img>";  
        }
        
        
        ?>
        <img src="img/users_img/"></img>
    </div>
    <div class="col-2"></div>    
</div>
        
        <?php
        /*if(isset($_FILES['plik']))
        {
           if($_FILES['plik']['type'] != 'image/png')
           {
               echo "plik musi mieć format png";
           }
           else{
            move_uploaded_file($_FILES['plik']['tmp_name'], "images/".$_FILES['plik']['name']);
    
            switch($_FILES['plik']['error'])
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
        }*/
        
        ?>