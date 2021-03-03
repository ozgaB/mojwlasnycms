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
                    <?php var_dump($_SESSION['prawda']);
                          var_dump($_SESSION['login_zamalo_error']);
                          var_dump($_SESSION['login_zaduzo_error']);
                          var_dump($_SESSION['login_znaki_error']);
                          $logintest='Jebać####';
                          $znaki_zakazane="/[`'\"~!@# $*()<>,:;{}\|]/";
                          if(!preg_match($znaki_zakazane, $logintest))
                {
                    echo "nie zawiera";
                }
                else
                    echo "zawiera";
                    ?>
                </div>
            </form>
        </div> 
        <div class="col-2">
            <label></label>
            
        </div>   
        <div class="col-4"></div>   
        </div>
    
    
    
    
    
</div>