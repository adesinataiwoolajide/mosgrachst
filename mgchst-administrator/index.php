<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="favicon.ico" type="image/x-icon" />   
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">

                <a href="./">
                    <div align="center">
                        <img src="../images/logo.png" alt="University of Education and knowledge">
                    </div>
                </a>
                <h1 align="center" style="color: white">
                <div class="login-body">
                    
                    <div class="login-title"><strong>Log In</strong> with your Details</div>
                    <?php
                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                        <div class="alert alert-info" align="center">
                            <button class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>
                         <?php include("includes/feed-back.php"); ?>
                        </div><?php 
                    }  ?>
                    <form action="process-login.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <h6>E-Mail: </h6><input type="email" class="form-control" name="email" placeholder="Please Enter Your E-mail" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <h6>Password: </h6><input type="password" class="form-control" name="password" placeholder="Enter Your Password" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <div class="col-md-6">
                            <a href="" class="btn btn-link btn-block">Forgot your password?</a>
                        </div> -->
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" name="login">Log In</button>
                        </div>
                    </div>
                    
                    </form>
                </div><br>
                <div class="login-footer">
                    <p style="color: white"><h5>&copy; <?php echo date("Y"); ?> Powered by Trenchcore Int Ltd for Moses & Grace College of Health Sciences and Technology.</h5></p>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






