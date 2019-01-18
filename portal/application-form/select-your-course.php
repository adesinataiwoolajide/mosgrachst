<?php
	session_start(); 
	include('../../connection/connection.php'); 
	$school_name = $_GET['school_name'];
    $school_id= $_GET['school_identification'];
    if($school_id ==2){
		$title =  "AFRIFORD UNIVERSITY";
	}else{
		$title = "MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY";
	}
	include("../../inc/admission-nav.php");
	include("../../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
	include("../../inc/dev/admission-payments/admission-payments-class.php");
	include("../../mgchst-administrator/dev/general/all_purpose_class.php");
    $payment = new admissionPayments($db);
    $department = new schoolDepartment($db);
    
    
?>

<div class="tg-innerbanner">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ol class="tg-breadcrumb">
					<li><a href="./">Home</a></li>
					<li class="tg-active"><a href="">Select Course</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<main id="tg-main" class="tg-main tg-haslayout">
	<div class="container">
		<div class="row">
			<div id="tg-twocolumns" class="tg-twocolumns">
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 pull-right">
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
							
							<div class="tg-container" style="margin-top: -90px;">
								<div class="col-md-12">
									<?php 
									$courseo = $db->prepare("SELECT * FROM programme_course ORDER BY prog_course ASC");
			                        
                                	$courseo->execute();
									while($flow = $courseo->fetch()){ ?>
										<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
											<article class="tg-themepost tg-eventpost">
												<div align="center">
													<img src="../images/Ebooks.jpg" alt="Department Logo" style="width: 100px; height: 100px; ">
										    	</div>
												<div class="tg-themepostcontent">
													
													<div class="tg-themeposttitle">
														<p style="color: green" align="center"><strong>
															
															<?php
															 $lope =$flow['prog_course'];
															echo $new_name = substr($lope, 0,20) ?>..</strong>		
														</p>
														<?php $dept_id = $flow['dept_id']; $boss = $department->getDepartmentDetails($dept_id); 
															$dept_name =$boss['dept_name'];  ?>
														
														<a href="registration-form-section-one.php?school_name=<?php echo $school_name?>&&programme_course=<?php echo $lope?>&&department_name=<?php echo $dept_name?>&&programme_identification=<?php echo $flow['procourse_id']?>&&school_identification=<?php echo $school_id ?>" class="btn btn-success">More Details and Apply Here</a></p>
														
													</div>
													
												</div>
											</article>
										</div><?php
									} ?>
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<aside id="tg-sidebar" class="tg-sidebar">
								
						<div class="tg-widget tg-widgetadmissionform">
							<div class="tg-widgetcontent">
								<h3>Admission Form 2017</h3>
								<div class="tg-description">
									<p>Interested candidates can apply online or download the application form.</p>
								</div>
								<a class="tg-btn tg-btnicon" href="application-form/online-application-form/mgchst-application-form.pdf">
									<i class="fa fa-file-pdf-o"></i>
									<span>Download PDF</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
		
<?php include("../../inc/footer.php"); ?>