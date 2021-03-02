<?php
$user_id = $_SESSION['user_id'];

//function pobierzAvatar()
function pobierzAvatar($user_id)
{
    $path = "img/users_img/";
    $filefullname = $path.$user_id."avatar.png";
    return $filefullname;
            
}



?>