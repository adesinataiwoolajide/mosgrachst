<?php
	session_start();
	include '../../connection/connection.php';
	$school_name = $_GET['school_name'];
	//$regNumber = $_GET['registration_number'];
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
	$details = $student->getAdmissionStepOne($regNumber);
	$surname =$details['surname'];
	$other_names = $details['other_names'];
	$student_email = $details['student_email'];
	// $details1 = $student->$getAdmissionStepOne($regNumber);
	$details2 = $student->getAdmissionStepTwo($regNumber);

?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb">
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
	<div class="container">
		<div class="row">
			<div class="col-md-12" align="center" style="margin-top: -1px;">
				<?php
				if($school_id ==1){ ?>
                    <img src="../../images/form-logo.png" alt="Moses And Grace " style="width: 950px; height: 300px; "> <?php
                }else{ ?>
                    <img src="../../images/afriweblogo.jpg" alt="Afriford University" style="width: 950px; height: ; "><?php
                }  ?>   
			</div>
			<div id="tg-twocolumns" class="tg-twocolumns" style="margin-top: -40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
							<div class="tg-borderheading">
								<div class="col-md-12">
									<?php
				                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
				                        <div class="alert alert-info" align="center">
				                            <button class="close" data-dismiss="alert">
				                                <i class="ace-icon fa fa-times"></i>
				                            </button>
				                        <?php include("../../mgchst-administrator/includes/feed-back.php"); ?>
				                        </div><?php 
				                    }  ?>
									
								</div>
							</div>
							<div class="tg-events"><br><br>
								<div class="row">
									<div class="tg-borderheading" align="center">
										<div class="col-md-12" align="">
											<h2 align="center"><strong><p style="color: green;">STUDENT REGISTRATION PRINT OUT SLIP </p></strong></h2><br>
											<div class="col-md-4" align="left">
												<p align="left"><strong><big>Biodata Details</strong></big></p>
												<p style="color: black"><strong>Surname: <?php echo $surname; ?></strong></p>
												<p style="color: black"><strong>Other Names: <?php echo $other_names; ?></strong></p>
												<p style="color: black"><strong>E-Mail: <?php echo $student_email; ?></p></strong>
												<p style="color: black"><strong>Date of Birth: 
												<?php echo $details['date_birth']; ?></strong></p>
												

											</div>
											<div class="col-md-4" align="">
												<p align=""><strong><big>Registration Details</big></big></p>
												<p style="color: black">Registration Number: <?php echo $regNumber; ?></p>
												<p style="color: black">Course: <?php
														
													 $procourse_id= $details['procourse_id']; 
													$stu = $student->getingIdentification($procourse_id);
													$loyal = $proc->getProgrammeCourseIdentification($procourse_id);
													echo $stu['prog_course']; ?>
														
												</p>
												<p style="color: black" align=""><strong>Programme: <?php
													$prog_id = $details['prog_id'];
													$bos =$department->getProgramme($prog_id);
													echo $bos['prog_name']; ?>
													
												</p>
												<p style="color: black">Department:
													<?php			
													$dept_id = $stu['dept_id'];
													$boss =$department->getDepartmentDetails($dept_id); 
													echo $dept_name =$boss['dept_name']; 
													?>
												</p>
													<input type="hidden" name="dept_id" value="<?php echo $prog_id; ?>">					
											</div>
											<div class="col-md-4" align="right">
												<img src="<?php echo "studentadmissionimages/".$details['passport_url']; ?>" style="width: 100px; height: 100px;" alt="<?php echo "$surname $other_names"; ?>">
											</div>
										</div>
										<br>
										<br>
										<div class="col-md-12" align="">
											<div class="col-md-4" align="left">
												<p align=""><strong><big>Other Details</big></big></p>
												<p style="color: black"><strong>Course Duration: <?php echo $loyal['duration']; ?>
												<p style="color: black"><strong>Sex: 
												<?php echo $details['sex']; ?></strong></p>
												<p style="color: black"><strong>State of Origin: 
												<?php echo $details['state_origin']; ?></strong></p>
												<p style="color: black"><strong>Nationality: 
												<?php echo $details['nationality']; ?></strong></p>
												<p style="color: black"><strong>Phone Number: 
												<?php echo $details['phone_number']; ?></strong></p>
											</div>
											<div class="col-md-8" align="center">
												<p align="center"><strong><big>Educational Qualifications</big></big></p>
												<table class="table table-responsive table-bordered" style="width: 750px; margin-left: -105px;">
													<thead>
														<th>S/N</th>
														<th>SCHOOL NAME</th>
														<th>FROM</th>
														<th>TO</th>
														<th>DEGREE</th>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td><?php echo $details2['school1']; ?></td>
															<td><?php echo $details2['from_date1']; ?></td>
															<td><?php echo $details2['to_date1']; ?></td>
															<td><?php echo $details2['degree1']; ?></td>
														</tr>
													</tbody>
													<tbody>
														<tr>
															<td>2</td>
															<td><?php echo $details2['school2']; ?></td>
															<td><?php echo $details2['from_date2']; ?></td>
															<td><?php echo $details2['to_date2']; ?></td>
															<td><?php echo $details2['degree2']; ?></td>
														</tr>
													</tbody>
													<tbody>
														<tr>
															<td>3</td>
															<td><?php echo $details2['school3']; ?></td>
															<td><?php echo $details2['from_date3']; ?></td>
															<td><?php echo $details2['to_date3']; ?></td>
															<td><?php echo $details2['degree3']; ?></td>
														</tr>
													</tbody>
													<tbody>
														<tr>
															<td>4</td>
															<td><?php echo $details2['school4']; ?></td>
															<td><?php echo $details2['from_date4']; ?></td>
															<td><?php echo $details2['to_date4']; ?></td>
															<td><?php echo $details2['degree_4']; ?></td>
														</tr>
													</tbody>
													<tbody>
														<tr>
															<td>5</td>
															<td><?php echo $details2['school5']; ?></td>
															<td><?php echo $details2['from_date5']; ?></td>
															<td><?php echo $details2['to_date5']; ?></td>
															<td><?php echo $details2['degree5']; ?></td>
														</tr>
													</tbody>
												</table>				
											</div>	
										</div>
										<div class="col-md-12" align="">
											<div class="col-md-6" align="">
												<table class="table table-responsive table-bordered" style="width: 1000; margin-left:15px ;">
													<tbody>
														<tr>
															<p style="color: black">Other Qualifications</p>
															<td><p style="color: black"><?php
																 $qua = $details2['qua']; if($qua ==""){
																 	echo "No Other Qualifications";
																 }else{
																 	echo $qua;
																 } ?></p>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-md-6" align="">
												<table class="table table-responsive table-bordered" style="width: 1000; margin-left:15px ;">
													<tbody>
														<tr>
															<p style="color: black">Residential Address</p>
														<td><p style="color: black"><?php
															 echo $details['address'] ?></p>
														</td>
														</tr>
													</tbody>
												</table>
											</div>
										
										</div>
										
										<div class="col-md-12" align="">
											<div class="col-md-6" align="left">
												
											</div>
											<div class="col-md-6" align="right">
												<p>Date Printed: <br><?php echo date("d-M-Y"); ?></p>
											</div>
										</div>

										<div class="col-md-12" align="center">
											<p><strong>Page 1/1</strong></p>
										</div>
										<input type="hidden" name="school_name" value="<?php echo $school_name ?>">
										<input type="hidden" name="school_id" value="<?php echo $school_id ?>">
									</div>		
								</div>
							</div>
							<div class="col-md-12" align="center" style="margin-left: 120px;">
								<a href="admission-payments.php?school_name=<?php echo $school_name?>&&student_email=<?php echo $student_email ?>&&registration_number=<?php echo $regNumber?>&&school_identification=<?php echo $school_id?>" class="btn btn-success" >PROCEED TO PAYMENT PAGE</a>
								<a href="printing-my-details.php?school_name=<?php echo $school_name?>&&student_email=<?php echo $student_email ?>&&registration_number=<?php echo $regNumber?>&&school_identification=<?php echo $school_id?>" class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> PRINT DETAILS</a>
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
