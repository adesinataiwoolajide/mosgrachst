<?php
	session_start();
	include '../../connection/connection.php';
	$regNumber = $_GET['registration_number'];
	$school_name = $_GET['school_name'];
    $school_id= $_GET['school_identification'];
    if($school_id ==2){
		$title =  "AFRIFORD UNIVERSITY";
	}else{
		$title = "MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY";
	}
	include("../../inc/admission-nav.php"); 
	include("../../inc/dev/admission/admission_class.php");
	include("../../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
    $student = new studentAdmission($db);
	$details = $student->getAdmissionStepOne($regNumber);
	$surname =$details['surname'];
	$other_names = $details['other_names'];
	$student_email = $details['student_email'];
?>
	
<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    	<li><a href="registration-form-section-two.php?school_name=<?php echo $school_name ?>&&registration_number=<?php echo $regNumber?>&&student_email=<?php echo $student_email ?>&&school_identification=<?php echo $school_id ?>"><i class="fa fa-list white-text"></i> APPLICATION FORM STEP 2</a></li>
                    	
                    	<li><a href="select-the-school.php"><i class="fa fa-circle white-text"></i> SELECT ANOTHER COURSE</a></li>
                    	
                    	<li><a href="admission-guildlines.php"><i class="fa fa-list white-text"></i> ADMISSION GUILDLINES</a></li>
                    	
                        <li><a href="./"><i class="fa fa-dashboard white-text"></i> HOME PAGE<a></li>
						
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<main id="tg-main" class="tg-main tg-haslayout">
	<div class="container">
		<div class="row">
			
			<div id="tg-twocolumns" class="tg-twocolumns" style="margin-top: -1px;">
				<aside class="col-md-3" style="margin-top: -15px">
					<div class="wm-student-dashboard-nav">
						<img src="<?php echo "../application-form/studentadmissionimages/".$details['passport_url']; ?>" style="width: 100px; height: 100px;" alt="<?php echo "$surname $other_names"; ?>">
						<div class="wm-student-nav">
							
							
							<ul><p> <strong> Quick Links</strong></p>
								<li>
									<a href="select-the-school.php"><i class="fa fa-plus white-text"></i>
										Fresh Application
									</a>
								</li>
								<li>
									<a href="admission-guildlines.php"><i class="fa fa-list white-text"></i>
										 Guildlines
									</a>
								</li>
								
								
								<li>
									<a href=""><i class="fa fa-cloud white-text"> </i>
										FAQ
									</a>
								</li>
								<li>
									<a href="select-the-school.php"><i class="fa fa-circle white-text"></i> Select Course</a></li>
									</a>
								</li>
								
							</ul>
						</div>
					</div>	
					<div class="tg-widget tg-widgetadmissionform" style="margin-top: 50px">
							<div class="tg-widgetcontent">
								<h3>Admission Form For <?php echo date("Y") ?></h3>
								<div class="tg-description">
									<p style="color: white">Interested candidates can apply online or download the application form.</p>
								</div>
								<a class="tg-btn tg-btnicon" href="online-application-form/mgchst-application-form.pdf" target="_blank">
									<i class="fa fa-file-pdf-o"></i>
									<span>Download The Form</span>
								</a>
							</div>
						</div>			
				</aside>

				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" style="margin-left: -50px">
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

						<section class="tg-sectionspace tg-haslayout">
							<h4><p style="color: green"><strong><?php echo strtoupper("$surname $other_names Please Fill the below Form to Complete Your Application Into $school_name ") ?></strong></p></h4>
										
								<h5><p style="color: green" align="center"><strong>SECTION B (APPLICANT EDUCATIONAL QUALIFIDACTION FORM)</strong></p></h5>
								<hr>
							<!-- <div class="col-md-12" align="center" style="margin-top: -1px;">
								<?php
								if($school_id ==1){ ?>
						            <img src="../../images/form-logo.png" alt="Moses And Grace " style="width: 950px; height: ; "> <?php
						        }else{ ?>
						            <img src="../../images/afriweblogo.jpg" alt="Afriford University" style="width: 950px; height: ; "><?php
						        }  ?>   
							</div> -->
							
							<div class="tg-events">
								<div class="row">
									
									<div class="col-md-12">
										
										<form action="process-registration-form-section-two.php" method="post" enctype="multipart/form-data" class="tg-formtheme tg-formcontactus">
											
											<fieldset>
												
												<div class="col-md-9" align="">
													<div class="form-group col-md-9">
														<label><strong>SCHOOL ATTENDED WITH DATES</strong></label>
														<table class="table table-responsive table-bordered" style="">
		                                                    <thead class="thead-dark">
		                                                        <tr>
		                                                            <th>S/N</th>
		                                                            <th>Name of School</th>
		                                                            
		                                                            <th> From</th>
		                                                            <th>To</th>
		                                                            
		                                                            <th>Degree Earned</th>  
		                                                        </tr>
		                                                    </thead>
		                                                    <tbody>
		                                                        <tr>
		                                                            <td class="center">1</td>

		                                                            <td class="center"><input type="text" required name="school1" required></td>
		                                                            
		                                                            <td class="center"><input type="number" required name="from_date1" ></td>

		                                                            <td class="center"><input type="number" required name="to_date1"></td>

		                                                            <td class="center"><input type="text" required name="degree1"></td>
		                                                        </tr>
		                                                        <tr >
		                                                            <td class="center">2</td>
		                                                            <td class="center">
		                                                            	<input type="text" name="school2" required></td>
		                                                            <td class="center">
		                                                            	<input type="number" name="from_date2" required></td>
		                                                            <td class="center">
		                                                            	<input type="number" required name="to_date2"></td>
		                                                            <td class="center"><input type="text" required name="degree2"></td>
		                                                        </tr>
		                                                        <tr >
		                                                            <td class="center">3</td>
		                                                            <td class="center">
		                                                            	<input type="text" name="school3"></td>
		                                                            <td class="center">
		                                                            	<input type="number" name="from_date3"></td>
		                                                            <td class="center">
		                                                            	<input type="number" name="to_date3"></td>
		                                                            <td class="center">
		                                                            	<input type="text" name="degree3"></td>
		                                                        </tr>
		                                                        <tr >
		                                                            <td class="center">4</td>
		                                                            <td class="center"><input type="text" name="school4"></td>
		                                                            <td class="center"><input type="number" name="from_date4"></td>
		                                                            <td class="center"><input type="number" name="to_date4"></td>
		                                                            <td class="center"><input type="text" name="degree4"></td>
		                                                        </tr>
		                                                        <tr >
		                                                            <td class="center">5</td>
		                                                            <td class="center"><input type="text" name="school5"></td>
		                                                            <td class="center"><input type="number" name="fromdate5"></td>
		                                                            <td class="center"><input type="number" name="todate5"></td>
		                                                            
		                                                            <td class="center"><input type="text" name="degree5"></td>
		                                                        </tr>
		                                                    </tbody>
		                                                </table>
													</div>
												</div>
												
												<div class="col-md-9" style="">
													<div class="form-group col-md-9" style="">
														<p style="color: green"><strong>ACADEMIC QUALIFICATIONS (YOU MUST SUBMIT AT LEAST 5 SUBJECTS)</strong></p>
														<table class="table table-responsive table-bordered" style="width:860px;">
		                                                    <thead>
		                                                        <tr>
		                                                            <th>S/N</th>
		                                                            <th>SUBJECT</th>
		                                                            <th> GRADE</th>
		                                                        </tr>
		                                                    </thead>
		                                                    <tbody>
		                                                        <tr>
		                                                            <td class="center">1</td>

		                                                            <td class="center"><input type="text" required name="sub1"></td>
		                                                            <td class="center"><input type="text" required name="grade1"></td>  
		                                                        </tr>
		                                                        <tr >
		                                                            <td class="center">2</td>

		                                                            <td class="center"><input type="text" name="sub2"></td>
		                                                            <td class="center"><input type="text" name="grade2"></td>
		                                                        </tr>
		                                                        <tr >
		                                                            <td class="center">3</td>
		                                                           <td class="center"><input type="text" required name="sub3"></td>
		                                                            <td class="center"><input type="text" required name="grade3"></td>  
		                                                        </tr>
		                                                        <tr >
		                                                            <td class="center">4</td>
		                                                           	<td class="center"><input type="text" required name="sub4"></td>
		                                                            <td class="center"><input type="text" required name="grade_4"></td>  
		                                                        </tr>
		                                                        <tr >
		                                                            <td class="center">5</td>
		                                                           	<td class="center"><input type="text" required name="sub5"></td>
		                                                            <td class="center"><input type="text" required name="grade5"></td>  
		                                                        </tr>
		                                                    
															    <tr>
															        <td class="center">6</td>

															        <td class="center"><input type="text"  name="sub6"></td>
															        <td class="center"><input type="text"  name="grade6"></td>  
															    </tr>
															    <tr >
															        <td class="center">7</td>

															        <td class="center"><input type="text" name="sub7"></td>
															        <td class="center"><input type="text" name="grade7"></td>
															    </tr>
															    <tr >
															        <td class="center">8</td>
															       <td class="center"><input type="text"  name="sub8"></td>
															        <td class="center"><input type="text"  name="grade8"></td>  
															    </tr>
															    <tr >
															        <td class="center">9</td>
															       <td class="center"><input type="text"  name="sub9"></td>
															        <td class="center"><input type="text"  name="grade9"></td>  
															    </tr>
															    
															</tbody>
		                                                </table>
													</div>
												</div>

												<div class="col-md-12">
													
													<label>OTHER QUALIFICATIONS</label>
													<textarea class="form-control" name="other_qua" placeholder="Please Enter Your Qualification" ></textarea>
													<span style="color: red">
														This Field is Required **
													</span>
													
												</div>

												<br><br>
												<div class="col-md-12" align="" style="margin-top: -20px;"> 
			                                        
			                                        <h6 style="color: red; margin-left: ;" align="">
			                                        	The completion of this application form does not imply admission. After all necessary information is in, you will be notified of the decisions of the Admission Commitee. The following data. In addition to this form, Enclose photocopies of your Certificates / Statement of Result and any other professional Certificate / Diploma you may have.
			                                        </h6>
			                                    </div>
			                                    <input type="hidden" name="regNumber" value="<?php echo $regNumber; ?>">
			                                    <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
			                                    <input type="hidden" name="school_name" value="<?php echo $school_name ?>">
												<input type="hidden" name="school_id" value="<?php echo $school_id ?>">
												<div class="col-md-12" align="center" style="margin-left: 120px;">
													<button class="btn btn-success" type="submit" name="continue_adding_details">Complete Your Registration</button>
												</div>
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</main>

<?php
	include('../../inc/footer.php');

?>
