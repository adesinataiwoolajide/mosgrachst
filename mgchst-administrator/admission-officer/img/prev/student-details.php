<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    include("../dev/general/all_purpose_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
	include("../../inc/dev/admission/admission_class.php");
	
	$department = new schoolDepartment($db);
    $student = new oldStudentRegistration($db);
    $proc = new programmeCourse($db);
    $all_purpose = new all_purpose($db);
    $student_matric_num = $_GET['student_matric_num'];
    $regNumber = $_GET['register_number'];
    $details = $student->getAdmissionStepOne($regNumber);
	$surname =$details['surname'];
	$other_names = $details['other_names'];
	$student_email = $details['student_email'];
	$details2 = $student->getAdmissionStepTwo($regNumber);
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-student-biodata.php">Add Student Bio Data</a></li>  
    <li><a href="student-details.php?student_matric_num=<?php echo $student_matric_num;?>&&register_number=<?php echo $regNumber; ?>">
    	Student Details</a>
    </li>   
    <li><a href="view-all-students.php">
    	View All Student</a>
    </li>   
    <li class="active"> Student Details</li>   
</ul>
<div class="page-content-wrap">
	<div class="row">
        <div class="col-md-12">
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
    </div>
        
    <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title" style="color: green;" align="center"><?php echo "$surname $other_names"; ?> Details </h3>
                </div>

	                <div class="panel-body">
	                    
	                   <div class="col-md-12">
	                   		<table id="customers2" class="table datatable" style="width: 450px;">
							
								<h2 align="center"><strong><p style="color: green;"><?php echo strtoupper("$surname $other_names details"); ?></p></strong></h2><br>
								<div class="col-md-12" align="right">
										<img src="<?php echo "../../portal/application-form/studentadmissionimages/".$details['passport_url']; ?>" style="width: 100px; height: 100px;" alt="<?php echo "$surname $other_names"; ?>">
									</div>
								<div class="col-md-6" align="left">
									<p align="left"><strong><big>Biodata Details</strong></big></p>
									<p style="color: black"><strong>Surname: <?php echo $surname; ?></strong></p>
									<p style="color: black"><strong>Other Names: <?php echo $other_names; ?></strong></p>
									<p style="color: black"><strong>E-Mail: <?php echo $student_email; ?></p></strong>
									<p style="color: black"><strong>Date of Birth: 
									<?php echo $details['date_birth']; ?></strong></p>
									<p style="color: black"><strong>Sex: 
										<?php echo $details['sex']; ?></strong></p>
									

								</div>
									<div class="col-md-6" align="right">
										<p align=""><strong><big>Registration Details</big></big></p>
										<p style="color: black">Matric Number: <?php echo $student_matric_num; ?></p>
										<p style="color: black">Course: <?php
												
											$procourse_id= $details['procourse_id']; 
											$stu = $student->getingIdentification($procourse_id);
											$loyal = $proc->getProgrammeCourseIdentification($procourse_id);
											echo $stu['prog_course']; ?>
												
										</p>
										<p style="color: black" align=""><strong>Programme: <?php
											$prog_id = $stu['prog_id'];
											$bos =$department->getProgramme($prog_id);
											echo $bos['prog_name']; ?>
											
										</p>
										<p style="color: black">Level:
											<?php			
											
											echo $details['level_id']; 
											?>
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
									
								</div>
								<br>
								<br>
								<div class="col-md-12" align="">
									<div class="col-md-6" align="left">
										<p align=""><strong><big>Other Details</big></big></p>
										<p style="color: black"><strong>Course Duration: <?php echo $loyal['duration']; ?>
										
										<p style="color: black"><strong>State of Origin: 
										<?php echo $details['state_origin']; ?></strong></p>
										<p style="color: black"><strong>Nationality: 
										<?php echo $details['nationality']; ?></strong></p>
										<p style="color: black"><strong>Phone Number: 
										<?php echo $details['phone_number']; ?></strong></p>
										<p style="color: black"><strong>Religion: 
										<?php echo $details['religion']; ?></strong></p>
										
									</div>
									
									<div class="col-md-6" align="right">
										<p align=""><h2<strong><big>Next of Kin Details</big></h2></p>
										<p style="color: black"><strong>Kin Name: <?php echo $details['kin_name']; ?>
										<p style="color: black"><strong>Kin Phone: 
										<?php echo $details['kin_phone']; ?></strong></p>
										<p style="color: black"><strong>Kin Address: 
										<?php echo $details['kid_address']; ?></strong></p>
										
									</div>
									<div class="col-md-12" align="">
										
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
									<div class="col-md-12" align="">
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
									<div class="col-md-12" align="center">
										<p align="center"><strong><big>Educational Qualifications</big></big></p>
										<table id="customers2" class="table datatable" style="width: 950px; margin-left: 0px; margin-top: -10px;">
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

								<div class="col-md-12" style="width: 450px">
								
									<p align="center">ACADEMIC QUALIFICATIONS GCE / SSCE / WASC RESULTS</p>
								<table id="customers2" class="table datatable" style="width: 450px;">
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

		                                    <td class="center"><?php echo $details2['sub1'] ?></td>
		                                    <td class="center"><?php echo $details2['grade1'] ?></td>  
		                                </tr>
		                                <tr >
		                                    <td class="center">2</td>

		                                    <td class="center"><?php echo $details2['sub2'] ?></td>
		                                    <td class="center"><?php echo $details2['grade2'] ?></td>
		                                </tr>
		                                <tr >
		                                    <td class="center">3</td>
		                                   <td class="center"><?php echo $details2['sub3'] ?></td>
		                                    <td class="center"><?php echo $details2['grade3'] ?></td>  
		                                </tr>
		                                <tr >
		                                    <td class="center">4</td>
		                                   	<td class="center"><?php echo $details2['sub4'] ?></td>
		                                    <td class="center"><?php echo $details2['grade4'] ?></td>  
		                                </tr>
		                                <tr >
		                                    <td class="center">5</td>
		                                   	<td class="center"><?php echo $details2['sub5'] ?></td>
		                                    <td class="center"><?php echo $details2['grade5'] ?></td>  
		                                </tr>
		                            </tbody>
		                            
		                        </table>
							</div>

							<div class=" col-md-10" style="margin-top: -240px; margin-left: 470px; width: 450px; " >
								
								<table id="customers2" class="table datatable" style="width: 450px;">
		                            <thead>
		                                <tr>
		                                    <th>S/N</th>
		                                    <th>SUBJECT</th>
		                                    
		                                    <th> GRADE</th>
		                                </tr>
		                            </thead>
		                            <tbody>
									    <tr>
									        <td class="center">6</td>

									        <td class="center"><?php echo $details2['sub6'] ?></td>
									        <td class="center"><?php echo $details2['grade6'] ?></td>  
									    </tr>
									    <tr >
									        <td class="center">7</td>

									        <td class="center"><?php echo $details2['sub7'] ?></td>
									        <td class="center"><?php echo $details2['grade7'] ?></td>
									    </tr>
									    <tr >
									        <td class="center">8</td>
									       <td class="center"><?php echo $details2['sub8'] ?></td>
									        <td class="center"><?php echo $details2['grade8'] ?></td>  
									    </tr>
									    <tr >
									        <td class="center">9</td>
									       <td class="center"><?php echo $details2['sub9'] ?></td>
									        <td class="center"><?php echo $details2['grade9'] ?></td>  
									    </tr>
									    
									</tbody>
		                        </table>
							</div>
						</div>
								
								<div class="col-md-12" align="">
									<div class="col-md-6" align="left">
										<p>Signature:  <br>
											Date: <?php echo date("d-m-Y"); ?></p>
									</div>
									<div class="col-md-6" align="right">
										<p>Date Regsitered: <br><?php echo $details['time_registered']; ?></p>
									</div>
								</div>

								<div class="col-md-12" align="center">
									<p><strong>Page 1/1</strong></p>
								</div>
								<div class="col-md-12" align="center" style="margin-left: ;">
									<a href="preview-student-details.php?reg_number=<?php echo $regNumber; ?>" class="btn btn-success" >EDIT <?php echo strtoupper("$surname $other_names"); ?> DETAILS</a>
								</div>
							</div>		
						</div>
					</div>
					
				</div>
            </div>
        </div>
    </div>        
</div>        
        
<?php
    include("../log-out-modal.php");
	include("../footer.php");
?>