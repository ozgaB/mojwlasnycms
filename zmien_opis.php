<?php
            $_SESSION['user_login']=$login;
            require_once 'baza_pdo.php';
?>

<div class="row">
    <div class="col-2"></div>
    <div class="col-2">
        <form method="POST" action='index.php?pagelog=zmien_opis'>
            <label><i class="far fa-comment-alt"></i>Zmień opis:</label>
            <textarea id="description" name="description" rows="5" cols="33" >
            <?php

            echo pobierz_opis_za_login($login);
        
            ?>
            </textarea>
            <div class='form-group'>
                <?php
                     if(!empty($_SESSION['description_zaduzo_error']))
                    {
                        echo $_SESSION['description_zaduzo_error'];
                        unset($_SESSION['description_zaduzo_error']);
                    }
                     if(!empty($_SESSION['description_empty_error']))
                    {
                        echo $_SESSION['description_empty_error'];
                        unset($_SESSION['description_empty_error']);
                    }
                    if(!empty($_SESSION['description_polaczenie_error']))
                    {
                        echo $_SESSION['description_polaczenie_error'];
                        unset($_SESSION['description_polaczenie_error']);
                    }
                ?>
            </div>
                <div class='form-group'>
                <button class='btn button_custom_2 btn-block' type='submit' >Zmień!</button>
    
                </div>
                    <a class='btn  btn-block' href='?pagelog=konto' role='button'>Powrót</a>
        </form>
        
        
        
        
    </div>
    <div class="col-2"></div>
    <div class="col-2">
        <div id="opis">
        <h2>Twój opis:</h2>
        <h3 style="color:#4F86C6;"><?php
                    if(!empty($_SESSION['description_udalosie_error']))
                    {
                        echo $_SESSION['description_udalosie_error'];
                        unset($_SESSION['description_udalosie_error']);
                    }
            echo pobierz_opis_za_login($login);
            
        ?></h3>
        </div>  
    </div>
    <div class="col-2"></div>
    <div class="col-2"></div>
    
    
    
    
</div>


<?php
if(isset($_POST['description']))
{
    if(!empty($_POST['description']))
    {
        $description=filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        if(strlen($description)<127)
        {
            if(zmien_opis($login,$description)==1)
            {
                header("Location: index.php?pagelog=zmien_opis");
              $_SESSION['description_udalosie_error'] = "<small class='form-text ' style='color:#4F86C6;'>Opis został zmieniony!</small>";  
            }
            else
            {
             $_SESSION['description_polaczenie_error'] = "<small class='form-text ' style='color:red;'>Połączenie z bazą nie powiodło się, spróbuj ponownie!</small>";   
            }    
        }
        else
        {
            $_SESSION['description_zaduzo_error'] = "<small class='form-text ' style='color:red;'>Opis może zawierać maksymalnie 128 znaków!</small>"; 
        }
    }
    else
    {
        $_SESSION['description_empty_error'] = "<small class='form-text ' style='color:red;'>Opis nie może być pusty!</small>"; 
    }
}
else
{
    
}

?>