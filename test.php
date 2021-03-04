<?php
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
        
        $email='jepis@onet.pl';
        $pobrane=pobierz_email($email);
        var_dump($pobrane);
        if($pobrane!=NULL)
        {
            echo "jest różne";
        }
        else
        {
            echo "jesttakiesame";
        }
?>


