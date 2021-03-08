<?php    






?>
<head><link rel="stylesheet" href="style.css"></head>
<div id="kontoo">
<div id="konto">
    <div class="row">
        <div class="col-2">
            <div id='zmien_haslo'>
                <a class='btn button_custom_3 btn-block' href='?pagelog=zmien_haslo' role='button'>Zmień hasło</a>
            </div>
            <div id='zmien_email'>
                <a class='btn button_custom_3 btn-block' href='?pagelog=zmien_email' role='button'>Zmień email</a>
            </div>
            <div id='dodaj_opis'>
                <a class='btn button_custom_3 btn-block' href='?pagelog=zmien_opis' role='button'>Zmień opis</a>
                
            </div>
            <div id='obrazek'>
                <a class='btn button_custom_3 btn-block' href='?pagelog=avatar' role='button'>Zmień avatar</a>
                
            </div>
            
            
        </div>
        <div class='col-2'></div>
        <div class="col-4">
            <div id='twoje_dane' class='ramka_cien'>
                <?php  
                    $img_status=pobierz_img_status($login);
                    if($img_status==1)
                    {
                     echo "<img src='img/users_img/".$id_user."avatar.png' class='avatar_img_Duzy' alt=''></img>";
                    }
                     else
                    {
                     echo "<img src='img/av_test.png'></img>";  
                    }  
                    echo '<h2>'.$_SESSION['user_login'].'</h2></br>';
                    echo '<h3>'.$_SESSION['user_email'].'</h3></br>';
                    $opis=pobierz_opis_za_login($login);
                    echo "<small class='form-text ' style='color:#4F86C6;'>$opis</small>"
                       ?>
                
                
            </div>
            
            
            
        </div>
        <div class="col-4">

            
            
            
        </div>
        
        
        
        
        
    </div>
    
    
    
    
    
</div>
</div>





<?php
?>