<head>
    <link rel="stylesheet" href="style.css">
    
</head>
<div id="rejestracja">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <h2><i class="fas fa-address-card"> Rejestracja:</i></h2>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-2">
            <form method="POST" action="walidacja.php" >
                
                <div class="form-group">
                    <label for="login"> Login </label>
                    <span class="input-group-addon"><i <i class="fas fa-user-tag fa-fw"></i></span>
                    <input class="form-control" type="text" name="login" placeholder="Podaj login">
                    <small id="warunkiHasla" class="form-text text-muted">Twój login nie powinien zawierać znaków specjalnych oraz powinien zawierać maksymalnie 12 znaków</small>                           
                </div>
                <div class="form-group">
                    <label for="email"> Email </label>
                    <span class="input-group-addon"><i <i class="fas fa-envelope fa-fw"></i></span>
                    <input class="form-control" type="text" name="email" placeholder="Podaj email">
                    <small id="warunkiHasla" class="form-text text-muted">Przykładowy email: cms@gmail.com</small>
                </div>
                 <div class="form-group">
                    <label for="email"> Hasło </label>
                    <span class="input-group-addon"><i class="fas fa-user-lock fa-fw"></i></span>
                    <input class="form-control" type="password" name="haslo1" placeholder="Podaj hasło">
                    <small id="warunkiHasla" class="form-text text-muted">Twoje hasło powinno miec przynajmniej 8 znaków</small>
                </div>               
                  <div class="form-group">
                    <label for="email"> Hasło </label>
                    <span class="input-group-addon"><i <i class="fas fa-user-lock fa-fw"></i></span>
                    <input class="form-control" type="password" name="haslo2" placeholder="Powtórz hasło">
                    <small id="warunkiHasla" class="form-text text-muted">Wpisane hasła muszą być identyczne</small>
                </div>                
                <div class="form-group">
                    <label for="regulamin"> Regulamin </label>
                    <span class="input-group-addon"><i class="fas fa-clipboard-check"></i></span>
                    <label for='regulamin_open'><a href="regulamin.html" target='_blank' class="akceptuj-regulamin"><i class="fas fa-envelope-open-text"></i>Otwórz regulamin</a></label>
                    <input type="checkbox" name="regulamin" value="Potwierdzam regulamin">
                    <small id="warunkiHasla" class="form-text text-muted">Proszę zapoznaj się z zasadami naszego serwisu</small>
                    <p>TU BĘDZIE KAPCZA</p>
                </div>
                <div class="form-group">
                    <button class='btn button_custom_2 btn-block' type="submit" >Wyślij!</button>
                    <?php /*var_dump($_SESSION['prawda']);
                          var_dump($_SESSION['login_zamalo_error']);
                          var_dump($_SESSION['login_zaduzo_error']);
                          var_dump($_SESSION['login_znaki_error']);
                          var_dump($_SESSION['login_empty_error']);
                          var_dump($_SESSION['password_zaduzo_error']);
                          var_dump($_SESSION['password_rozne_error']);
                          var_dump($_SESSION['password_empty_error']);
                          var_dump($_SESSION['password_empty_error2']);
                          var_dump($_SESSION['email_poprawny_error']);
                          var_dump($_SESSION['email_zadlugi_error']);
                          var_dump($_SESSION['email_empty_error']);
                          var_dump($_SESSION['regulamin_empty_error']); */

                    ?>
                </div>
                        <a class='btn  btn-block' href='?pagelog=konto' role='button'>Powrót</a> 

            </form>
        </div> 
        <div class="col-2">
            <div class="form-group">
                <label>
                    <?php
                    if(!empty($_SESSION['polaczenie_z_baza_error']))
                    {
                        echo $_SESSION['polaczenie_z_baza_error'];
                        unset($_SESSION['polaczenie_z_baza_error']);
                    }
                    if(!empty($_SESSION['login_zamalo_error']))
                    {
                        echo $_SESSION['login_zamalo_error'];
                        unset($_SESSION['login_zamalo_error']);
                    }
                    if(!empty($_SESSION['login_zaduzo_error']))
                    {
                        echo $_SESSION['login_zaduzo_error'];
                        unset($_SESSION['login_zaduzo_error']);
                    }
                    if(!empty($_SESSION['login_juzjest_error']))
                    {
                        echo $_SESSION['login_juzjest_error'];
                        unset($_SESSION['login_juzjest_error']);
                    }
                    ?>
                </label>
            </div>
            <div class="form-group">
            <label>
                    <?php
                    if(!empty($_SESSION['login_znaki_error']))
                    {
                        echo $_SESSION['login_znaki_error'];
                        unset($_SESSION['login_znaki_error']);
                    }
                    if(!empty($_SESSION['login_empty_error']))
                    {
                        echo $_SESSION['login_empty_error'];
                        unset($_SESSION['login_empty_error']);
                    }
                    ?>
            </label>
            </div>
            <div class="form-group">
                <label>
                    <?php
                    if(!empty($_SESSION['email_zadlugi_error']))
                    {
                        echo $_SESSION['email_zadlugi_error'];
                        unset($_SESSION['email_zadlugi_error']);
                    }
                    if(!empty($_SESSION['email_empty_error']))
                    {
                        echo $_SESSION['email_empty_error'];
                        unset($_SESSION['email_empty_error']);
                    } 
                    ?>
                </label>
            </div>
            <div class="form-group">
                <label>
            <?php
                    if(!empty($_SESSION['email_poprawny_error']))
                    {
                        echo $_SESSION['email_poprawny_error'];
                        unset($_SESSION['email_poprawny_error']);
                    } 
                   if(!empty($_SESSION['email_juzistnieje_error']))
                    {
                        echo $_SESSION['email_juzistnieje_error'];
                        unset($_SESSION['email_juzistnieje_error']);
                    } 
            ?>
                </label>
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
                <label>
            <?php
                    if(!empty($_SESSION['regulamin_empty_error']))
                    {
                        echo $_SESSION['regulamin_empty_error'];
                        unset($_SESSION['regulamin_empty_error']);
                    } 
            ?>
                </label>
            </div>
        </div>   
        <div class="col-4"></div>   
        </div>
    
    
    
    
    
</div>