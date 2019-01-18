<?php
    if(!isset($_SESSION['id'])){
        $_SESSION['error']="Please Login with your Details to Access the System";
        header("Location: .././");
    }
    require("../../connection/connection.php");
    include("../dev/registration/class_registration.php");
    $register = new registration($db);
    $users = $_SESSION['user_name'];
    $image = $register->gettingUserImages($users);
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>