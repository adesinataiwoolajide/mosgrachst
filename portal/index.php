<?php 
	session_start();
	include("../connection/connection.php");
	include("../inc/portal-header.php"); 
	// include("../inc/dev/admission/admission_class.php");
	// include("../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
 //    $department = new schoolDepartment($db);
 //   	$admin = new studentAdmission($db);

?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
	<div class="container pt-120 pb-60">
	    <div class="section-content">
	        <div class="row"> 
	            <div class="col-md-12">
	                <ul class="breadcrumb">
	                	<li><a href="./"><i class="fa fa-book white-text"></i> SCHOOL PORTAL</a></li>
	                    <li><a href=".././"><i class="fa fa-dashboard white-text"></i> HOME PAGE<a></li>
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
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 pull-right">
					<div id="tg-content" class="tg-content">
						<h5><strong>WELCOME TO MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY SCHOOL PORTAL</strong></h5><hr>
						<div class="tg-addmission tg-addmissiondetail">
							
							<div class="col-xs-12 col-sm-8 col-md-12 col-lg-12" style="margin-top: -20px;">
								<div id="tg-content" class="tg-content">
									<section class="tg-sectionspace tg-haslayout">
										<div class="tg-borderheading">
											<p style="color: black ;"> 
												We are committed to providing high quality education leading to award of Certificate and Diploma in Health Profession. The College strives to produce broadly and thoroughly educated graduates who realize that the health profession is not simply a trade to be learned but that it denotes a sense of social responsibility. 
											</p>
											<p style="color: black">
				                                The College seeks applicants with demonstrated strong drive and desire to succeed and who are able to focus on the compassionate and the humanitarian aspects of the medical profession. Our College encourages its students to actively engage themselves in the community service and to respond to the needs of those they serve.
				                            </p>
				                            <div class="tg-container">
												<h3><b>Our Vision </b></h3>
												<p style="color: black">To produce a sound, well-skilled, and entrepreneurial middle level health practitioners who will positively impact on society a  healthy, sustainable and socio-economic development at the Local, State and National levels. </p>
											</div>
											<div class="tg-container">
												<h3><b>Our Mission </b></h3>
												<p style="color: black">
													To produce highly committed, devoted and morally sound health professionals with practical skills for a health care system. 

												</p>
											</div>
											
										</div>
									
									</section>
								</div>
							</div>
								
								</div>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
							<aside id="tg-sidebar" class="tg-sidebar">
										
								<div class="tg-widget tg-widgetsearchcourse">
									<div class="tg-widgettitle">
										<h3 align="center">Student Portal</h3>
									</div>
									<?php
				                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
				                        <div class="alert alert-info" align="center">
				                            <button class="close" data-dismiss="alert">
				                                <i class="ace-icon fa fa-times"></i>
				                            </button>
				                         <?php include("../mgchst-administrator/includes/feed-back.php"); ?>
				                        </div><?php 
				                    } ?>
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
												<button type="submit" class="tg-btn" name="login"><i class="fa fa-unlock white-text"></i> LOGIN </button>
												
											</fieldset>
										</form>
									</div>
									<div class="tg-widget tg-widgetadmissionform" style="margin-top: 20px">
										<div class="tg-widgetcontent" style="margin-top: -10px">
											<h3>Admission Form 2017</h3>
											<div class="tg-description">
												<p style="color: white">Interested candidates can apply online or download the application form.</p>
												</div>
												<a class="tg-btn tg-btnicon" href="application-form/online-application-form/mgchst-application-form.pdf" target="_blank">
													<i class="fa fa-file-pdf-o"></i>
													<span>Download PDF</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</aside>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include("../inc/footer.php"); ?>