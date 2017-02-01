<?php
session_start();
if ( !isset($_SESSION['username']) && !isset($_SESSION['userid']) ){  
    $_SESSION['username']   = $_POST['login_username'];
    $_SESSION['userid'] = $_POST['login_userpass'];
    echo 1;
    
}
else{
    echo 0;
    }