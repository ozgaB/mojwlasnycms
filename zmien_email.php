<div class="row">

    <div class="col-2"></div>
    <div class="col-2">
<div id='zmiana hasla'>
    <form method="POST" action='walidacja_zmiana_email.php'>
    <div class='form-group'>
    <span class='input-group-addon'><i class="fas fa-mail-bulk"></i></span>
    <label>Wprowadź stary email:</label>
    <label>
        <?php 
                    if(!empty($_SESSION['nowe_zle_error']))
                    {
                        echo $_SESSION['nowe_zle_error'];
                        unset($_SESSION['nowe_zle_error']);
                    }
        ?>
    </label>
    <input type='text' name='stary_email' placeholder="Stary email" class='form-control'></input>
    </div>
    <div class='form-group'>
    <span class='input-group-addon'><i class="fas fa-mail-bulk"></i></span>
    <label>Wprowadź nowy mail:</label>
    <label>
        <?php 
                    if(!empty($_SESSION['email_empty_error']))
                    {
                        echo $_SESSION['email_empty_error'];
                        unset($_SESSION['email_empty_error']);
                    } 
                    if(!empty($_SESSION['email_zaduzo_error']))
                    {
                        echo $_SESSION['email_zaduzo_error'];
                        unset($_SESSION['email_zaduzo_error']);
                    }
        ?>
    </label>
    <input type='text' name='nowy_email' placeholder="Nowe email" class='form-control'></input>
    </div>
    <div class='form-group'>
    <span class='input-group-addon'><i class="fas fa-mail-bulk"></i></span>
    <label>Powtórz nowy mail:</label>
    <label>
        <?php 
                    if(!empty($_SESSION['email_empty_error2']))
                    {
                        echo $_SESSION['email_empty_error2'];
                        unset($_SESSION['email_empty_error2']);
                    } 
                     if(!empty($_SESSION['email_rozne_error']))
                    {
                        echo $_SESSION['email_rozne_error'];
                        unset($_SESSION['email_rozne_error']);
                    } 
        ?>
    </label>
    <input type='text' name='nowy_email2' placeholder="Nowy email" class='form-control'></input>
    </div>
        <?php
        if(!empty($_SESSION['email_niepoprawny_error']))
                    {
                        echo $_SESSION['email_niepoprawny_error'];
                        unset($_SESSION['email_niepoprawny_error']);
                    } 
        ?>
    <div class='form-group'>
    <button class='btn button_custom_2 btn-block' type='submit' >Zmień!</button>
      
    </div>
        <a class='btn  btn-block' href='?pagelog=konto' role='button'>Powrót</a>  
    </form>
    
    
    
    
    
</div>
    </div>
    <div class="col-4">
                        <?php 
                    if(!empty($_SESSION['email_zmieniony']))
                    {
                        echo $_SESSION['email_zmieniony'];
                        unset($_SESSION['email_zmieniony']);
                    } 

        ?>
        
        
        
    </div>
    <div class="col-2"></div>
    <div class="col-2"></div>
    
    
</div>