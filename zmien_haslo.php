<?php

?>
<div class='row'>
    <div class='col-2'></div>
    <div class='col-2'>
<div>
    <form method="POST" action='walidacja_zmiana_hasla.php'>
    <div class='form-group'>
    <span class='input-group-addon'><i class='fas fa-user-lock fa-fw'></i></span>
    <label>Wprowadź stare hasło:</label>
    <label>
        <?php 
                    if(!empty($_SESSION['nowe_zle_error']))
                    {
                        echo $_SESSION['nowe_zle_error'];
                        unset($_SESSION['nowe_zle_error']);
                    }
        ?>
    </label>
    <input type='password' name='stare_haslo' placeholder="Stare hasło" class='form-control'></input>
    </div>
    <div class='form-group'>
    <span class='input-group-addon'><i class='fas fa-user-lock fa-fw'></i></span>
    <label>Wprowadź nowe hasło:</label>
    <label>
        <?php 
                    if(!empty($_SESSION['password_empty_error']))
                    {
                        echo $_SESSION['password_empty_error'];
                        unset($_SESSION['password_empty_error']);
                    } 
                    if(!empty($_SESSION['password_zaduzo_error']))
                    {
                        echo $_SESSION['password_zaduzo_error'];
                        unset($_SESSION['password_zaduzo_error']);
                    }
        ?>
    </label>
    <input type='password' name='nowe_haslo' placeholder="Nowe hasło" class='form-control'></input>
    </div>
    <div class='form-group'>
    <span class='input-group-addon'><i class='fas fa-user-lock fa-fw'></i></span>
    <label>Powtórz nowe hasło:</label>
    <label>
        <?php 
                    if(!empty($_SESSION['password_empty_error2']))
                    {
                        echo $_SESSION['password_empty_error2'];
                        unset($_SESSION['password_empty_error2']);
                    } 
                     if(!empty($_SESSION['password_rozne_error']))
                    {
                        echo $_SESSION['password_rozne_error'];
                        unset($_SESSION['password_rozne_error']);
                    } 
        ?>
    </label>
    <input type='password' name='nowe_haslo2' placeholder="Nowe hasło" class='form-control'></input>
    </div>
    <div class='form-group'>
    <button class='btn button_custom_2 btn-block' type='submit' >Zmień!</button>
    
    </div>
        <a class='btn  btn-block' href='?pagelog=konto' role='button'>Powrót</a> 
    </form>
    
</div>
     </div>
    <div class='col-4'>
                <?php 
                    if(!empty($_SESSION['haslo_zostalo_zmienione']))
                    {
                        echo $_SESSION['haslo_zostalo_zmienione'];
                        unset($_SESSION['haslo_zostalo_zmienione']);
                    } 

        ?>
    </div>
    <div class='col-4'></div>
</div>

