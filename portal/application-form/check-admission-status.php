<?php 
	session_start();
	include("../../connection/connection.php");
	include("../../inc/admission-nav.php"); 
?>
<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    	<li><a href="check-admission-status.php"><i class="fa fa-list white-text"></i> ADMISSION STATUS</a></li>
                        <li><a href="./"><i class="fa fa-dashboard white-text"></i> HOME PAGES<a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<main id="tg-main" class="tg-main tg-haslayout">
	<div class="container">
		<div class="row">
			<div id="tg-twocolumns" class="tg-twocolumns">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 pull-left">
					<div class="wm-student-nav" style="margin-top: 20px">
						<ul>
							<li class="active">
								<a href="check-admission-status.php">
									<i class="fa fa-clone white-text"></i>
									 Admission Status
								</a>
							</li>
							<li>
								<a href="./">
									<i class="fa fa-dashboard white-text"></i>
									 Home Page
								</a>
							</li>
							<li>
								<a href="admission-guildlines.php">
									<i class="fa fa-cogs white-text"></i>
									 Guildines
								</a>
							</li>

							<li>
								<a href="online-application-form/mgchst-application-form.pdf" target="_blank">
									<i class="fa fa-file-pdf-o"></i>
									Download Form
								</a>
							</li>
							<li>
								<a href="">
									<i class="fa fa-dashboard white-text"></i>
									FAQ
								</a>
							</li>
						</ul>
					</div>

				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9" style="margin-top: -40px;">
					<div id="tg-content" class="tg-content">
						
						<section class="tg-sectionspace tg-haslayout" style="margin-top: 40px;">
							<?php
		                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
		                        <div class="alert alert-info" align="center">
		                            <button class="close" data-dismiss="alert">
		                                <i class="ace-icon fa fa-times"></i>
		                            </button>
		                         <?php include("../../mgchst-administrator/includes/feed-back.php"); ?>
		                        </div><?php 
		                    }  ?>
							<div class="tg-borderheading">
								<h3><p align="center"><strong>Please Fill The  Below Form To Check Your Admission Status </strong></p></h3>
							</div>
							<div class="tg-borderheading">
								
			                    <form action="process-admission-status.php" method="post" class="form-horizontal" enctype="multipart/form-data">
			                    	<div class="col-md-12">
					                    <div class="col-md-12">
					                    	<label>Enter Your Registration Number</slabel>
					                    	<input type="text" name="registration" class="form-control" required placeholder="Please enter Your Registration Number to Check Your Admission Status" minlength="11">
					                    	<span style="color: red">** This Field is Required **</span>
										</div><br><br><br><br>

										<div class="col-md-12" align="center">
											<button class="btn btn-success" type="submit" name="admission-status"> CHECK ADMISSION STATUS</button>
										</div>
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
	include("../../inc/footer.php"); 
?>