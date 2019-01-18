<?php 
	session_start();
	include("../connection/connection.php");
	include("../inc/portal-header.php"); 
	include("../inc/dev/admission/admission_class.php");
	
   	$admin = new studentAdmission($db);

?>

<div class="tg-innerbanner">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ol class="tg-breadcrumb">
					<li><a href=".././">Home</a></li>
					<li><a href="./">Portal</a></li>
					<li class="tg-active">Forget Password</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<main id="tg-main" class="tg-main tg-haslayout">
	<div class="container">
		<div class="row">
			<div id="tg-twocolumns" class="tg-twocolumns">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<div class="tg-widgetcontent">
						<form action="process-student-login.php" method="post" class="tg-formtheme tg-formsearchcourse">
							<fieldset>
								<div class="tg-inputwithicon">
									<i class="icon-user"></i>
									<input type="text" name="matric" class="form-control" placeholder="Username" required>
								</div>
								
								<div class="tg-inputwithicon">
									<i class="icon-lock"></i>
									
									<input type="password" name="password" class="form-control" placeholder="Password" required>	
									
								</div>
								<a href="forget-password.php" >Forget Password?</a><br><br>
								<button type="submit" class="tg-btn" name="login">LOGIN</button>
								
							</fieldset>
						</form>
					</div>	
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9" style="margin-top: -40px;">
					<div id="tg-content" class="tg-content">
						<?php
	                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
	                        <div class="alert alert-info" align="center">
	                            <button class="close" data-dismiss="alert">
	                                <i class="ace-icon fa fa-times"></i>
	                            </button>
	                         <?php include("../mgchst-administrator/includes/feed-back.php"); ?>
	                        </div><?php 
	                    }  ?>
						<section class="tg-sectionspace tg-haslayout">
							
							<div class="tg-borderheading">
								
			                    <form action="get-details.php" method="post" class="form-horizontal" enctype="multipart/form-data">
				                    <div class="col-md-12">
				                    	<h3><p align="center"><strong>Matric number</strong></p></h3>
				                    	<input type="text" name="matric" class="form-control" required placeholder="Please enter Your Matric Number to Retrive Your Password">
									</div>	
									<br><br><br><br>
									<div class="col-md-12" align="center">
										<button class="btn btn-success" type="submit" name="get-details"> GET YOUR DETAILS</button>
									</div>	
								</form>
							</div>
						</section>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</main>

<?php 
	include("../inc/footer.php"); 
?>