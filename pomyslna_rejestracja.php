<div id="pomyslna_rejestracja">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"><h1>REJESTRACJA PRZEBIEGŁA POMYŚLNIE:</h1></br>
                        <div class="form-group">
                <label>
            <?php
            
                    if(!empty($_SESSION['pomyslna_rejestracja']))
                    {
                        echo $_SESSION['pomyslna_rejestracja'];
                        unset($_SESSION['pomyslna_rejestracja']);
                    } 
            ?>
                </label>
            </div>
                           <a class='btn button_custom_2' href='index.php' role='button'>Powrót</a>
        </div>
        <div class="col-4"></div>
    </div>
</div>