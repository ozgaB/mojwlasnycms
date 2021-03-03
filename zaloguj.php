<div class='row'>
    <div class='col-4'></div>
    <div class='col-4'><h2><i class='fas fa-sign-in-alt'></i> Zaloguj:</h2></div>
    <div class='col-4'></div>
    
    
</div>
<div class='row'>
<div class='col-4'></div>
<div class='col-2'>
                <?php
                if($_SESSION['zalogowany']>0)
                {
                echo  "<form method='POST' action='logowanie.php' class='d-none' >";
                }
                else
                {
                    echo "<form method='POST' action='logowanie.php' >";
                }
                ?>
                <div class='form-group'>
                    <label for='login'> Login </label>
                    <span class='input-group-addon'><i <i class='fas fa-user-tag fa-fw'></i></span>
                    <input class='form-control' type='text' name='login' placeholder='Podaj swój login'>  
                    <?php
                    if(!empty($_SESSION['login_error_1']))
                    {
                        echo $_SESSION['login_error_1'];
                        unset($_SESSION['login_error_1']);
                    }
                    ?>
                    
                </div>
                <div class='form-group'>
                    <label for='login'> Hasło </label>
                    <span class='input-group-addon'><i class='fas fa-user-lock fa-fw'></i></span>
                    <input class='form-control' type='password' name='password' placeholder='Podaj hasło'>
                    <?php
                    if(!empty($_SESSION['password_error_1']))
                    {
                        echo $_SESSION['password_error_1'];
                        unset($_SESSION['password_error_1']);
                    }
                    ?>
                </div>
                    <p>TU BĘDZIE KAPCZA</p>
                    <div class='form-group'>
                        <button class='btn button_custom_2 btn-block' type='submit' >Zaloguj!</button>
                    </div>
                    
                </form>     
    
    
         <?php         ?>
    
</div>
        
        
        
        
        
        
        <div class='col-2'></div>



<div class='col-4'></div>
</div>