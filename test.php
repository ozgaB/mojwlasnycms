<?php
        function zmien_haslo($login,$nowe_haslo)
        {
            try{
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        $dbh = new PDO("mysql:host=localhost;dbname=ozgacms", "root", "", $options);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="UPDATE users SET password = :nowe_haslo WHERE login = :login";
        $stmt=$dbh->prepare($sql);
        $stmt->execute(array(':login' => $login, ':nowe_haslo' => $nowe_haslo));
        echo "udalo sie";
            }
 catch (Exception $ex)
 {
     echo 'Połączenie z bazą nie powiodło sie: ' . $e->getMessage();
 }
        }
        $haslo1='aaaaaaaaaaaaaa';
                $salt="cmsByOzgaB";
        $nowe_haslo = hash("sha512", $salt.$haslo1);
        $login='Bartek988';
        zmien_haslo($login, $nowe_haslo);
?>


