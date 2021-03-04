<?php
try
{   
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
    $dbh = new PDO("mysql:host=localhost;dbname=ozgacms", "root", "", $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    function pobierz_login($login){
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        $dbh = new PDO("mysql:host=localhost;dbname=ozgacms", "root", "", $options);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT login FROM users WHERE login=?";
        $stmt=$dbh->prepare($sql);
        $stmt->execute(array($login));
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            return $row['login'];
        }
        $stmt->closeCursor(); 
        }
    function pobierz_haslo($haslo){
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        $dbh = new PDO("mysql:host=localhost;dbname=ozgacms", "root", "", $options);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT password FROM users WHERE password=?";
        $stmt=$dbh->prepare($sql);
        $stmt->execute(array($haslo));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            return $row['password'];
        }
        $stmt->closeCursor(); 
        }
    function pobierz_id_user($login){
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        $dbh = new PDO("mysql:host=localhost;dbname=ozgacms", "root", "", $options);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT id_user FROM users WHERE login=?";
        $stmt=$dbh->prepare($sql);
        $stmt->execute(array($login));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            return $row['id_user'];
        }
        $stmt->closeCursor(); 
        }
        
        function wprowadz_rejestracja($login,$haslo,$email)
        {
    
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        $dbh = new PDO("mysql:host=localhost;dbname=ozgacms", "root", "", $options);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO users (login,password,email) VALUES(?,?,?)";
        $stmt=$dbh->prepare($sql);
        try{
        $stmt->execute(array($login,$haslo,$email));
        return 1;
        }
        catch (Exception $ex)
        {
            return 0;
        } 
        
        }
        function pobierz_email($email){
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        $dbh = new PDO("mysql:host=localhost;dbname=ozgacms", "root", "", $options);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT email FROM users WHERE email=?";
        $stmt=$dbh->prepare($sql);
        $stmt->execute(array($email));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            return $row['email'];
        }
        $stmt->closeCursor(); 
        }
    
    
} catch (Exception $ex) {
    echo 'Połączenie z bazą nie powiodło sie: ' . $e->getMessage();
}







?>