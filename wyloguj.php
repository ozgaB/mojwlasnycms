<?php

$_SESSION['zalogowany']=0;
session_unset();
session_destroy();
header('location: index.php');

?>