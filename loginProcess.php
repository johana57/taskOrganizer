<?php
 session_start();
 
 if(isset($_POST['btn-login'])){
    $user = trim($_POST['user']);
    $password = trim($_POST['password']);
    
    try{ 
        if($password == 'abcd5678' and $user == 'admin'){
            echo "ok"; // log in
            $_SESSION['user_session'] = $user;
        }
        else{
            echo "Usuario o contraseña incorrectos"; // wrong details 
        }
    
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
 }