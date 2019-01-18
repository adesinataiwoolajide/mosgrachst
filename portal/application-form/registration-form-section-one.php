<?php
	session_start();
	include '../../connection/connection.php';
	$department_name = $_GET['department_name'];
	$prog_course = $_GET['programme_course'];
	$school_name = $_GET['school_name'];
    $school_id= $_GET['school_identification'];
    $procourse_id = $_GET['programme_identification'];
  	$depart = $_GET['department_name'];
    if($school_id ==2){
		$title =  "AFRIFORD UNIVERSITY OF SCIENCE MANAGEMENT ART AND TECHNOLOGY";
	}else{
		$title = "MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY";
	}
	include("../../inc/admission-nav.php"); 
	include("../../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
	
    $department = new schoolDepartment($db);
    $proc = new programmeCourse($db);
	
	$loyal = $proc->getProgrammeCourseIdentification($procourse_id);
	$dept_id = $loyal['dept_id'];
	$course_name = $loyal['prog_course'];
	//$programme_course = $_GET['programme_course'];
	//$roll = $department->getingIdentification($procourse_id);
	//$details = $department->getProgrammeName($prog_name);
	// $dept_name = $department_name;
	// $raw = $department->getDepartmentDetailsName($dept_name);
?>
<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    	<li><a href="registration-form-section-one.php?school_name=<?php echo $school_name?>&&programme_course=<?php echo $prog_course?>&&department_name=<?php echo $department_name?>&&programme_identification=<?php echo $procourse_id?>&&school_identification=<?php echo $school_id ?>""><i class="fa fa-circle-o white-text"></i> FILL THE APPLICATION FROM</a></li>
                    	<li><a href="select-the-school.php"><i class="fa fa-circle white-text"></i> SELECT ANOTHER COURSE</a></li>
                    	<li><a href="admission-requirements.php?department_name=<?php echo $department_name;?>&&identification=<?php echo $procourse_id; ?>"><i class="fa fa-book white-text"></i> ADMISSION REQUIREMENT</a></li>
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
			
			
			<div id="tg-twocolumns" class="tg-twocolumns" style="margin-top: -5px;">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3" style="margin-top: 40px;">
					<aside id="tg-sidebar" class="tg-sidebar" style="margin-top: -50px">

						<div class="wm-student-nav" style="margin-top: 15px">
							<ul><p> <strong> Quick Links</strong></p>
								<li>
									<a href="registration-form-section-one.php?school_name=<?php echo $school_name?>&&programme_course=<?php echo $prog_course?>&&department_name=<?php echo $department_name?>&&programme_identification=<?php echo $procourse_id?>&&school_identification=<?php echo $school_id ?>""><i class="fa fa-circle-o white-text"></i>Online Application</a></li>
									</a>
								</li>
								<li>
									<a href="select-the-school.php"><i class="fa fa-circle white-text"></i> Select Course</a></li>
									</a>
								</li>
								<li>
									<a href="admission-requirements.php?department_name=<?php echo $department_name;?>&&identification=<?php echo $procourse_id; ?>"><i class="fa fa-certificate white-text"></i>  Requirements</a></li>
								</li>
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
									<a href="check-admission-status.php"><i class="fa fa-cloud white-text"> </i>
										Admission Status
									</a>
								</li>
								<li>
									<a href=""><i class="fa fa-cloud white-text"> </i>
										FAQ
									</a>
								</li>
								
							</ul>
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
						<?php //include("../../inc/sidebar.php"); ?>
					</aside>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
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
							<h4><p style="color: green"><strong><?php echo strtoupper(" Please Fill the below Form to Apply For  Admision Into $school_name ") ?></strong></p></h4>
										
								<h5><p style="color: green" align="center"><strong>SECTION A (APPLICANT BIODATA FORM)</strong></p></h5>
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
										
										
										<form action="process-registration-form-section-one.php" method="post" enctype="multipart/form-data" class="tg-formtheme tg-formcontactus">
											
											<fieldset>

												<div class="col-md-12">

													<div class="form-group col-md-6 col-sm-6">
														<label>DEPARTMENT</label>
														<input type="text" class="form-control" name="dep" placeholder="" required value="<?php echo $department_name;  ?>" readonly>
														<input type="hidden" class="form-control" name="dept_name" placeholder=""  value="<?php echo $depart;  ?>" >
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label>ADMISSION TYPE</label>
														<select name="prog_id" class="form-control" required>
															<?php
															if($school_id ==1){ 
						                                        $prog = $db->prepare("SELECT * FROM programme WHERE prog_id=2");
						                                        $prog->execute(); 
						                                        while($see_prog = $prog->fetch()){ ?>
						                                        	<option value="<?php echo $see_prog['prog_id']; ?>"><?php echo $see_prog['prog_name']; ?></option><?php
						                                        } 
						                                    }else{ ?>
						                                    	<option value="1">Degree Full Time</option>
						                                    	<option value="3">Degree Part Time</option><?php
						                                	}?>
														</select>
													</div>
													<input type="hidden" name="procourse_id" value="<?php echo $procourse_id; ?>">
													<input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
												</div>
												<div class="form-group col-md-6 col-sm-6">
													<label>PREFER COURSE</label>
													<input type="text" class="form-control" name="department_name" placeholder="" required value="<?php echo $course_name;  ?>" readonly>
													
												</div>
												<div class="form-group col-md-6 col-sm-6">
														<label>SCHOOL NAME</label>
														<input type="text" class="form-control" name="schoname" readonly value="<?php echo $school_name ?>">
													</div>

												<div class="col-md-12">
													<div class="form-group col-md-6">
														<label>PASSPORT</label>
														<input type="file" class="form-control" name="image" placeholder="" required>
														<span style="color: red">
															This Field is Required **
														</span>
													</div>

													<div class="form-group col-md-6 col-sm-6">
														<label>SURNAME</label>
														<input type="text" class="form-control" name="surname" placeholder="Please Enter Your Surname " required>
														<span style="color: red">
															This Field is Required **
														</span>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group col-md-5">
														<label>OTHER NAMES</label>
														<input type="text" class="form-control" name="other_names" placeholder="Enter Your First Name, Then Last Name" required>
														<span style="color: red">
															This Field is Required **
														</span>
													</div>

													<div class="form-group col-md-4 col-sm-4">
														<label>DATE OF BIRTH</label>
														<input type="date" class="form-control" name="birth_date" placeholder="Enter You Date of Birth" required>
														<span style="color: red">
															This Field is Required **
														</span>
													</div>

													<div class="form-group col-md-3 col-sm-3">
														<label>SEX</label>
														<select class="form-control" name="sex" required>
															<option value="">-- Select your Sex --</option>
															<option value=""></option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
														<span style="color: red">
															This Field is Required **
														</span>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group col-md-6">
														<label>Nationality</label>
														<select class="form-control" name="nationality" required>
															<option value="">-- Select your Nationality --</option>
															<option value=""></option>
															<option value="Nigerian">Nigerian</option>
															<option value="Others">Others</option>
														</select>
														<span style="color: red">
															This Field is Required **
														</span>
													</div>

													<div class="form-group col-md-6 col-sm-6">
														<label>State of Origin</label>
														<select class="form-control" name="state" required>
															<option value="">-- Select your State of Origin --</option>
															<option value=""></option>
															<option value="Abuja FCT">Abuja FCT</option>
												            <option value="Abia">Abia</option>
												            <option value="Adamawa">Adamawa</option>
												            <option value="Akwa Ibom">Akwa Ibom</option>
												            <option value="Anambra">Anambra</option>
												            <option value="Bauchi">Bauchi</option>
												            <option value="Bayelsa">Bayelsa</option>
												            <option value="Benue">Benue</option>
												            <option value="Borno">Borno</option>
												            <option value="Cross River">Cross River</option>
												            <option value="Delta">Delta</option>
												            <option value="Ebonyi">Ebonyi</option>
												            <option value="Edo">Edo</option>
												            <option value="Ekiti">Ekiti</option>
												            <option value="Enugu">Enugu</option>
												            <option value="Gombe">Gombe</option>
												            <option value="Imo">Imo</option>
												            <option value="Jigawa">Jigawa</option>
												            <option value="Kaduna">Kaduna</option>
												            <option value="Kano">Kano</option>
												            <option value="Katsina">Katsina</option>
												            <option value="Kebbi">Kebbi</option>
												            <option value="Kogi">Kogi</option>
												            <option value="Kwara">Kwara</option>
												            <option value="Lagos">Lagos</option>
												            <option value="Nassarawa">Nassarawa</option>
												            <option value="Niger">Niger</option>
												            <option value="Ogun">Ogun</option>
												            <option value="Ondo">Ondo</option>
												            <option value="Osun">Osun</option>
												            <option value="Oyo">Oyo</option>
												            <option value="Plateau">Plateau</option>
												            <option value="Rivers">Rivers</option>
												            <option value="Sokoto">Sokoto</option>
												            <option value="Taraba">Taraba</option>
												            <option value="Yobe">Yobe</option>
												            <option value="Zamfara">Zamfara</option>
							     							<option value="Outside Nigeria">Outside Nigeria</option>
														</select>
														<span style="color: red">
															This Field is Required **
														</span>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group col-md-6">
														<label>Phone Number</label>
														<input type="number" class="form-control" name="phone_number" placeholder="Enter your Phone Number" required>
														<span style="color: red">
															This Field is Required **
														</span>
													</div>

													<div class="form-group col-md-6 col-sm-6">
														<label>E-Mail</label>
														<input type="email" class="form-control" name="student_email"  placeholder="Please enter your E-Mail" required>
														<span style="color: red">
															This Field is Required **
														</span>
													</div>
												</div>

												<div class="col-md-12">
													
													<label>PERMANENT HOME ADDRESS</label>
													<textarea class="form-control" name="address" placeholder="Please Enter Your Permanent Adress" required></textarea>
													<span style="color: red">
														This Field is Required **
													</span>
													
												</div>
												<input type="hidden" name="school_name" value="<?php echo $school_name ?>">
												<input type="hidden" name="school_id" value="<?php echo $school_id ?>">
												<br><br>
												<div class="col-md-12" align="center">
													<button class="tg-btn" type="submit" name="adding_details">Complete Step One Registration</button>
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
