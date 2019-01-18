<?php 
	session_start();
	include("../../connection/connection.php");
	$school_name = $_GET['school_name'];
    $school_id= $_GET['school_identification'];
    if($school_id ==2){
		$title =  "AFRIFORD UNIVERSITY";
	}else{
		$title = "MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY";
	}
	include("../../inc/admission-nav.php");
	include("../../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
	include("../../inc/dev/admission/admission_class.php");
    $department = new schoolDepartment($db);
   	$student = new studentAdmission($db);
   	$proc = new programmeCourse($db);
	$regNumber = $_GET['registration_number'];
	$student_email = $_GET['student_email'];
	$details = $student->getAdmissionStepOne($regNumber);
	$surname =$details['surname'];
	$other_names = $details['other_names'];
	
?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    	<li><a href="admission-payments.php?school_name=<?php echo $school_name?>&&student_email=<?php echo $student_email ?>&&registration_number=<?php echo $regNumber?>&&school_identification=<?php echo $school_id?>">MAKE PAYMENT</a></li>
                    	<li><a href="print-registration-form.php?school_name=<?php echo $school_name ?>&&registration_number=<?php echo $regNumber ?>&&registration_email=<?php echo $student_email ?>&&school_identification=<?php echo $school_id ?>">PRINT YOUR DETAILS</a></li>
						<li><a href="preview-your-details.php?school_name=<?php echo $school_name ?>&&registration_number=<?php echo $regNumber ?>&&registration_email=<?php echo $student_email ?>&&school_identification=<?php echo $school_id ?>">PREVIEW YOUR DETAILS</a></li>
	                        <li class="active"><i class="fa fa-dashboard white-text"></i> PRINT YOUR DETAILS</li>
						
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
		
		<main id="tg-main" class="tg-main tg-haslayout">
			<!-- <div class="container">
				<div class="row">
					<div class="col-md-12" align="center" style="margin-top: -10px; ">
				<?php
				if($school_id ==1){ ?>
                    <img src="../../images/form-logo.png" alt="Moses And Grace " style="width: 950px; height: ; "> <?php
                }else{ ?>
                    <img src="../../images/afriweblogo.jpg" alt="Afriford University" style="width: 950px; height: ; "><?php
                }  ?>   
			</div> -->
			<div id="tg-twocolumns" class="tg-twocolumns" style="margin-top: -1px;">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<aside id="tg-sidebar" class="tg-sidebar">
									
						<div class="tg-widget tg-widgetadmissionform">
							<div class="tg-widgetcontent">
								<h3>Admission Form For <?php echo date("Y") ?></h3>
								<div class="tg-description">
									<p style="color: white">Interested candidates can apply online or download the application form.</p>
								</div>
								<a class="tg-btn tg-btnicon" href="online-application-form/mgchst-application-form.pdf">
									<i class="fa fa-file-pdf-o"></i>
									<span>Download The Form</span>
								</a>
							</div>
						</div>
						<?php include("../../inc/sidebar.php"); ?>
					</aside>
				</div>
			
						
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 pull-right">
					<div class="tg-pagetitle">
								<h2 style="color: black;" align="center"><strong>APPLICATION PAYMENT FORM</strong></h2>
							</div><hr>
					<div id="tg-content" class="tg-content">
						<?php
	                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
	                        <div class="alert alert-info" align="center">
	                            <button class="close" data-dismiss="alert">
	                                <i class="ace-icon fa fa-times"></i>
	                            </button>
	                         <?php include("../../mgchst-administrator/includes/feed-back.php"); ?>
	                        </div><?php 
	                    }  ?>
						<div class="tg-addmission tg-addmissiondetail">
							
							
							
							<div class="tg-container">
								<div class="col-md-12">
									
									<form action="process-admission-payment.php" method="post" enctype="multipart/form-data" class="tg-formtheme tg-formcontactus">
										<h4><p align="center"><strong>Please Fill the below Form to fill to upload your payment details.</strong></p></h4>
										<fieldset>
											<div class="form-group col-md-12">
												<div class="form-group col-md-12">
													<label>BANK NAME</label>
													<select class="form-control" required name="bank_name">
														<option>-- Select the Bank Name --</option>
														<option value=""></option>
														<option value="Access Bank">Access Bank</option>
                                                        <option value="Citi Bank">Citi Bank</option>
                                                        <option value="Diamond Bank">Diamond Bank</option>
                                                        <option value="Eco Bank">Eco Bank</option>
                                                        <option value="Fidelity Bank">Fidelity Bank</option>
								                   		<option value="First Bank">First Bank</option>
                                                        <option value="First City Monument Bank">First City Monument Bank</option>
                                                        <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                                                        <option value="Heritage Bank">Heritage Bank</option>
                                                        <option value="Keystone Bank">Keystone Bank</option>
                                                        <option value="Skye Bank">Skye Bank</option>
                                                        <option value="Stanbic IBTC Bank">Stanbic IBTC Bank</option>
                                                        <option value="Standard Chartered Bank">Standard Chartered Bank</option>
								                   		<option value="Sterling Bank">Sterling Bank</option>
                                                        <option value="Union Bank">Union Bank</option>
                                                        <option value="UBA Bank">UBA Bank</option>
                                                        <option value="Unity Bank">Unity Bank</option>
								                   		<option value="Wema Bank">Wema Bank</option>
								                   		<option value="Zenith Bank">Zenith Bank</option>
													</select>
													
												</div>
												<div class="form-group col-md-12">
													<label>SCHOOL NAME</label>
													<input type="text" class="form-control" name="sc" value="<?php echo $school_name ?>" readonly>
													<span style="color: pink">
														This Field is Readonly **
													</span>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group col-md-12">
													<label>TELLER NUMBER</label>
													<input type="number" class="form-control" name="teller_number" placeholder="Please Enter The Teller Number" required>
													<span style="color: red">
														This Field is Required **
													</span>
												</div>

												<div class="form-group col-md-12 col-sm-12">
													<label>E-Mail</label>
													<input type="email" class="form-control" name="student_email" placeholder="Please Enter Your E-Mail" required value="<?php echo $student_email ?>" readonly>
													<span style="color: pink">
														This Field is Readonly **
													</span>
												</div>
											</div>
											<input type="hidden" name="school_name" value="<?php echo $school_name ?>">
											<input type="hidden" name="school_id" value="<?php echo $school_id ?>">
											<input type="hidden" name="regNumber" value="<?php echo $regNumber ?>">
											<div class="col-md-12" align="center">
												<button class="tg-btn" type="submit" name="add-payment">UPLOAD PAYMENT</button>
											</div><br><br>

										<fieldset><br><br>
											<div class="col-md-12" align="left">
								
												<h5><strong><p style="color: green">Payment can be done online via ATM/POS. and the below cards can be use 
												<img src="../../images/pay-logos.png" style="width: 250px;"></p></strong></h5>
											</div><br><br><br>
											<div class="col-md-12" align="center">
												<a href="">ONLINE PAYMENT</a>
											</div>
										</fieldset>
									</form>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</main>

<?php include("../../inc/footer.php"); ?>