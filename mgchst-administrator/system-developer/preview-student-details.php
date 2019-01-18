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
    $all_purpose = new all_purpose($db);
    $regNumber = $_GET['reg_number'];
    $details = $student->getAdmissionStepOne($regNumber);
    $detaila3 = $student->gettingAdmission($regNumber);
    $student_matric_num = $detaila3['student_matric_num'];
	$surname =$details['surname'];
	$other_names = $details['other_names'];
	$student_email = $details['student_email'];
	$details2 = $student->getAdmissionStepTwo($regNumber);

	$school_name = $_GET['school_name'];
    $school_id = $_GET['school_identification'];
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    
    <li><a href="preview-student-details.php?reg_number=<?php echo $regNumber ?>&&school_name<?php echo $school_name ?>&&school_identification=<?php echo $school_id ?>">
    	Preview Student Details</a>
    </li>
    <li><a href="add-students.php">Add New Student</a></li>  
    <li><a href="all-school-student-details.php">Afriford and Moses And Grace Students</a></li>   
    <li><a href="view-students.php">View By School</a></li>     
    <li class="active">Preview Student Details</li>   
</ul>
<div class="page-content-wrap">
	<div class="row">
        <div class="col-md-12">
        	<div class="col-md-12">
				<?php
                    if($school_id ==1){ ?>
                        <div class="col-md-12" align="center">
                            <img src="../../images/form-logo.png" alt="Moses And Grace College of Health Sciences and Technology" style="width: 900px; height: ; ">
                        </div> 
                        <div class="panel-body">
                            
                            <h4 style="color: green; text-align: center">Please Preview <?php echo $surname." ".$other_names; ?> Detail's Before The Final Submission</h5>
                            
                        </div><?php
                    }else{ ?>
                        <div class="col-md-12" align="center">
                            <img src="../../images/afriweblogo.jpg" alt="Afriford University" style="width: 900px; height: ; ">
                        </div>
                        <div class="panel-body">
                            
                            <h4 style="color: green; text-align: center">STUDENT BIODATA UPDATE FORM.</h4>
                            
                        </div><?php
                    }  
                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                        <div class="alert alert-info" align="center">
                            <button class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>
                         <?php include("../includes/feed-back.php"); ?>
                        </div><?php 
                    }  ?>
				</div>
			</div>
		</div>
    </div>
        
    <div class="row">
        <div class="col-md-12"> 
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title" style="color: green;" align="center">
                    	<h4 style="color: green; text-align: center">Please Preview <?php echo $surname." ".$other_names; ?> Detail's Before The Final Submission </h4>
                    	</h3>
                </div>
                <form action="update-student-biodata.php" method="post" enctype="multipart/form-data">
	                <div class="panel-body">
	                    
	                   <div class="col-md-12">
	                   		
							<div class="col-md-6" align="">
								<table id="customers2" class="table datatable" style="width: 450px;">
									<tbody>
										<td>Passport</td>
										<td>
											<div align="left">
												<img src="<?php echo "../../portal/application-form/studentadmissionimages/".$details['passport_url']; ?>" style="width: 50px; height: 50px;" alt="<?php echo "$surname $other_names"; ?>">
											</div>
										</td>
										<td>Change Passport? <input type="file" name="image" class="form-control"></td>
									</tbody>
									<tbody>
										<tr>
											<td>1</td>
											<td><p style="color: black;">Matric Number</p></td>
											<td>
												<input type="text" class="form-control" name="matric_number" value="<?php echo $detaila3['student_matric_num']; ?>" readonly>
												<input type="hidden" class="form-control" name="matric_number" value="<?php echo $detaila3['student_matric_num']; ?>">
												<input type="hidden" class="" name="admission_id"  value="<?php echo $detaila3['admission_id']; ?>">
											</td>
										</tr>
									</tbody>

									<tbody>
										<tr>
											<td>2</td>
											<td><p style="color: black">E-Mail</p></td>
											<td><p style="color: black"> 
												<input type="email" name="student_email" class="form-control" required value="<?php echo $student_email; ?>"></p>
											</td>
										</tr>
									</tbody>

									<tbody>
										<tr>
											<td>3</td>
											<td><p style="color: black">Surname Name</p></td>
											<td><input type="text" class="form-control" name="surname" class="form-control" value="<?php echo $surname; ?>" placeholder="Please enter your Surname" required>
											</td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td>4</td>
											<td><p style="color: black">Other Names</p></td>
											<td><input type="text" class="form-control" name="other_names" class="form-control" value="<?php echo $details['other_names']; ?>" required></p>
											</td>
										</tr>
									</tbody>

									<tbody>
										<tr>
											<td>5</td>
											<td><p style="color: black">Date of Birth</p></td>
											<td><input type="text" class="form-control datepicker" name="birth_date" class="form-control" value="<?php echo $details['date_birth']; ?>" required></p>
											</td>
										</tr>
									</tbody>

									<tbody>
										<tr>
											<td>6</td>
											<td><p style="color: black">Phone Number</p></td>
											<td><input type="number" name="phone_number" class="form-control" value="<?php echo $details['phone_number']; ?>" required>
											</td>
										</tr>
									</tbody>

									<tbody>
										<tr>
											<td>7</td>
											<td><p style="color: black">Sex</p></td>
											<td>
												<select class="form-control" name="sex" required>
													<option value="<?php echo $details['sex']; ?>"><?php echo $details['sex']; ?></option>
													<option value=""></option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</td>
										</tr>
									</tbody>

									<tbody>
										<tr>
											<td>8</td>
											<td><p style="color: black">Course</p></td>
											<td><p style="color: black"><?php
												$procourse_id= $details['procourse_id']; 
												$stu = $student->getingIdentification($procourse_id);?>
												<select name="procourse_id" class="form-control">
													<option value="<?php echo $procourse_id ?>"><?php echo $stu['prog_course']; ?></option>
													<option value=""></option><?php
			                                        $course = $db->prepare("SELECT * FROM programme_course ORDER BY prog_course ASC");
			                                        $course->execute();
			                                        while($see_course = $course->fetch()){ ?>
			                                        <option value="<?php echo $see_course['procourse_id']; ?>"><?php echo $see_course['prog_course']; ?></option><?php
			                                        } ?>
												</select></p>
												
											</td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td>9</td>
											<td><p style="color: black">Programme</p></td>
											<td><p style="color: black"><?php
												$prog_id = $details['prog_id'];
												$bos =$department->getProgramme($prog_id);
												$bos['prog_name']; ?>
												<select name="prog_id" class="form-control" required>
													<option value="<?php echo $prog_id; ?>"><?php echo $bos['prog_name']; ?></option>
													<option value=""></option><?php
			                                        $prog = $db->prepare("SELECT * FROM programme ORDER BY prog_name ASC");
			                                        $prog->execute(); 
			                                        while($see_prog = $prog->fetch()){ ?>
			                                        	<option value="<?php echo $see_prog['prog_id']; ?>"><?php echo $see_prog['prog_name']; ?></option><?php
			                                        } ?>
												</select>
												
												</p>
												
											</td>
										</tr>
									</tbody>
									
								</table>
							</div>
							<div class="col-md-6" align="right">
								<table id="customers2" class="table datatable" style="width: 450px; margin-left: 15px;">
									<tbody>
										<tr>
											<td>10</td>
											<td><p style="color: black">Level</p></td>
											<td><p style="color: black">
												<select name="level_id" class="form-control">
													
													<option value="<?php echo $details['level_id']; ?>"><?php echo $details['level_id']; ?></option><option value=""></option><?php
													$lev = $db->prepare("SELECT * FROM level ORDER BY level_name ASC");
			                                        $lev->execute(); 
			                                        while($see_lev = $lev->fetch()){ ?>
			                                        	<option value="<?php echo $see_lev['level_name']; ?>"><?php echo $see_lev['level_name']; ?></option><?php
			                                        } ?> 
												</select></p>
											</td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td>11</td>
											<td><p style="color: black">Department</p></td>
											<td><p style="color: black"><?php
												
												$dept_id = $stu['dept_id'];
												$boss =$department->getDepartmentDetails($dept_id); 
												
												?>
												<select name="dept_id" class="form-control">
													<option value="<?php echo $dept_name =$boss['dept_name'];  ?>"><?php echo $dept_name =$boss['dept_name'];  ?></option>
													<option value=""></option><?php
			                                        $dept = $db->prepare("SELECT * FROM department ORDER BY dept_name ASC");
			                                        $dept->execute(); 
			                                        while($see_dept = $dept->fetch()){ ?>
			                                        	<option value="<?php echo $see_dept['dept_name']; ?>"><?php echo $see_dept['dept_name']; ?></option><?php
			                                        } ?>
												</select>
												</p>
												
											</td>
										</tr>
									</tbody>

									<tbody>
										<tr>
											<td>12</td>
											<td><p style="color: black">Nationality</p></td>
											<td>
												<select class="form-control" name="nationality" required>
													<option value="<?php echo $details['nationality']; ?>"><?php echo $details['nationality']; ?></option>
													<option value=""></option>
													<option value="Nigerian">Nigerian</option>
													<option value="Others">Others</option>
												</select>
											</td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td>13</td>
											<td><p style="color: black">State of Origin</p></td>
											<td>
												<select class="form-control" name="state" required>
													<option value="<?php echo $details['state_origin']; ?>"><?php echo $details['state_origin']; ?></option>
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
											</td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td>14</td>
											<td><p style="color: black">Residential Address</p></td>
											<td><p style="color: black"><textarea name="address" id="address" class="form-control" col="1" required><?php $add = $details['address']; echo $add; ?> </textarea></p>
											</td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td>15</td>
											<td><p style="color: black">Marital Status</p></td>
											<td><p style="color: black">
												<select name="marital_status" class="form-control" required>
													<option <?php echo $details['marital_status']; ?>><?php echo $details['marital_status']; ?></option>
													<option value=""></option>
			                                        <option value="Single">Single</option>
			                                        <option value="Married">Married</option>
			                                        <option value="Divorced">Divorced</option>
			                                        <option value="Widowed">Widowed</option>
												</select>
												</p>
											</td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td>16</td>
											<td><p style="color: black">Religion</p></td>
											<td><p style="color: black">
												<select name="religion" class="form-control" required>
													<option <?php echo $details['religion']; ?>><?php echo $details['religion']; ?></option>
													<option value=""></option>
			                                        <option value="Christanity">Christanity</option>
			                                        <option value="Islam">Islam</option>
			                                        <option value="Others">Others</option>
												</select>
												</p>
											</td>
										</tr>
									</tbody>

									<tbody>
										<tr>
											<td>16</td>
											<td><p style="color: black">Next of Kin Name</p></td>
											<td><p style="color: black">
												<input type="text" name="kin_name" value="<?php echo $details['kin_name']; ?>" class="form-control" required>
												</p>
											</td>
										</tr>
									</tbody>

									<tbody>
										<tr>
											<td>17</td>
											<td><p style="color: black">Next of Kin Phone</p></td>
											<td><p style="color: black">
												<input type="number" name="kin_phone" value="<?php echo $details['kin_phone']; ?>" class="form-control" required>
												</p>
											</td>
										</tr>
									</tbody>

									<tbody>
										<tr>
											<td>18</td>
											<td><p style="color: black">Kin Address</p></td>
											<td><p style="color: black"><textarea name="kid_address" id="kid_address" class="form-control" required col="1"><?php $add1 = $details['kid_address']; echo $add1; ?></textarea></p>
											</td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td>18</td>
											<td>	
												<p>Year of Admission</p>
				                                <select class ="form-control" name ="admission_year" required>
				                                    <option value="<?php echo $detaila3['admission_year']; ?>"><?php echo $detaila3['admission_year']; ?></option>
				                                    <option value=""></option>
				                                    <option value="2020/2021">2020/2021</option>
				                                    <option value="2019/2020">2019/2020</option>
				                                    <option value="2018/2019">2018/2019</option>
				                                    <option value="2017/2018">2017/2018</option>
				                                    <option value="2016/2017">2016/2017</option>
				                                    <option value="2015/2016">2015/2016</option>
				                               </select>
				                            </td>
				                        </tr>
				                    </tbody>

								</table>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group col-md-12">
								<label>SCHOOL ATTENDED WITH DATES</label>
								<table class="table table-responsive table-bordered" style="width: 920px">
		                            <thead>
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

		                                    <td class="center"><input type="text" class="form-control" required name="school1" required value="<?php echo $details2['school1'] ?>"></td>
		                                    
		                                    <td class="center"><input type="text" class="form-control" required name="from_date1" value="<?php echo $details2['from_date1'] ?>"></td>

		                                    <td class="center"><input type="text" class="form-control" required name="to_date1" value="<?php echo $details2['to_date1'] ?>"></td>

		                                    <td class="center"><input type="text" class="form-control" required name="degree1" value="<?php echo $details2['degree1'] ?>"></td>
		                                </tr>
		                                <tr >
		                                    <td class="center">2</td>
		                                    <td class="center">
		                                    	<input type="text" class="form-control" name="school2" value="<?php echo $details2['school2'] ?>" required></td>
		                                    <td class="center" >
		                                    	<input type="text" class="form-control" name="from_date2" value="<?php echo $details2['from_date2'] ?>" required></td>
		                                    <td class="center">
		                                    	<input type="text" class="form-control" value="<?php echo $details2['to_date2'] ?>" required name="to_date2"></td>
		                                    <td class="center"><input type="text" class="form-control" value="<?php echo $details2['degree2'] ?>" required name="degree2"></td>
		                                </tr>
		                                <tr >
		                                    <td class="center">3</td>
		                                    <td class="center">
		                                    	<input type="text" class="form-control" name="school3" value="<?php echo $details2['school3'] ?>"></td>
		                                    <td class="center">
		                                    	<input type="text" class="form-control" name="from_date3" value="<?php echo $details2['from_date3'] ?>"></td>
		                                    <td class="center">
		                                    	<input type="text" class="form-control" name="to_date3" value="<?php echo $details2['to_date3'] ?>"></td>
		                                    <td class="center">
		                                    	<input type="text" class="form-control" name="degree3" value="<?php echo $details2['degree3'] ?>"></td>
		                                </tr>
		                                <tr >
		                                    <td class="center">4</td>
		                                    <td class="center"><input type="text" class="form-control" name="school4" value="<?php echo $details2['school4'] ?>"></td>
		                                    <td class="center"><input type="text" class="form-control" name="from_date4" value="<?php echo $details2['from_date4'] ?>"></td>
		                                    <td class="center"><input type="text" class="form-control" name="to_date4" value="<?php echo $details2['to_date4'] ?>"></td>
		                                    <td class="center"><input type="text" class="form-control" name="degree4" value="<?php echo $details2['degree_4'] ?>"></td>
		                                </tr>
		                                <tr >
		                                    <td class="center">5</td>
		                                    <td class="center"><input type="text" class="form-control" name="school5" value="<?php echo $details2['school5']; ?>"></td>
		                                    <td class="center"><input type="text" class="form-control" name="fromdate5" value="<?php echo $details2['from_date5']; ?>"></td>
		                                    <td class="center"><input type="text" class="form-control" name="todate5" value="<?php echo $details2['to_date5'] ?>"></td>
		                                    
		                                    <td class="center"><input type="text" class="form-control" name="degree5" value="<?php echo $details2['degree5'] ?>"></td>
		                                </tr>
		                            </tbody>
		                        </table>
							</div>
						</div>

						<div class="col-md-12" style="width: 450px">
							
								<p>ACADEMIC QUALIFICATIONS GCE / SSCE / WASC RESULTS</p>
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

		                                    <td class="center"><input type="text" class="form-control" required name="sub1" value="<?php echo $details2['sub1'] ?>"></td>
		                                    <td class="center"><input type="text" class="form-control" required name="grade1" value="<?php echo $details2['grade1'] ?>"></td>  
		                                </tr>
		                                <tr >
		                                    <td class="center">2</td>

		                                    <td class="center"><input type="text" class="form-control" name="sub2" value="<?php echo $details2['sub2'] ?>"></td>
		                                    <td class="center"><input type="text" class="form-control" name="grade2" value="<?php echo $details2['grade2'] ?>"></td>
		                                </tr>
		                                <tr >
		                                    <td class="center">3</td>
		                                   <td class="center"><input type="text" class="form-control" required name="sub3" value="<?php echo $details2['sub3'] ?>"></td>
		                                    <td class="center"><input type="text" class="form-control" required name="grade3" value="<?php echo $details2['grade3'] ?>"></td>  
		                                </tr>
		                                <tr >
		                                    <td class="center">4</td>
		                                   	<td class="center"><input type="text" class="form-control" required name="sub4" value="<?php echo $details2['sub4'] ?>"></td>
		                                    <td class="center"><input type="text" class="form-control" required name="grade_4" value="<?php echo $details2['grade4'] ?>"></td>  
		                                </tr>
		                                <tr >
		                                    <td class="center">5</td>
		                                   	<td class="center"><input type="text" class="form-control" required name="sub5" value="<?php echo $details2['sub5'] ?>"></td>
		                                    <td class="center"><input type="text" class="form-control" required name="grade5" value="<?php echo $details2['grade5'] ?>"></td>  
		                                </tr>
		                            </tbody>
		                            
		                        </table>
							</div>

							<div class=" col-md-10" style="margin-top: -305px; margin-left: 470px; width: 450px; " >
								
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

									        <td class="center"><input type="text" class="form-control"  name="sub6" value="<?php echo $details2['sub6'] ?>"></td>
									        <td class="center"><input type="text" class="form-control"  name="grade6" value="<?php echo $details2['grade6'] ?>"></td>  
									    </tr>
									    <tr >
									        <td class="center">7</td>

									        <td class="center"><input type="text" class="form-control" name="sub7" value="<?php echo $details2['sub7'] ?>"></td>
									        <td class="center"><input type="text" class="form-control" name="grade7" value="<?php echo $details2['grade7'] ?>"></td>
									    </tr>
									    <tr >
									        <td class="center">8</td>
									       <td class="center"><input type="text" class="form-control"  name="sub8" value="<?php echo $details2['sub8'] ?>"></td>
									        <td class="center"><input type="text" class="form-control"  name="grade8" value="<?php echo $details2['grade8'] ?>"></td>  
									    </tr>
									    <tr >
									        <td class="center">9</td>
									       <td class="center"><input type="text" class="form-control"  name="sub9" value="<?php echo $details2['sub9'] ?>"></td>
									        <td class="center"><input type="text" class="form-control"  name="grade9" value="<?php echo $details2['grade9'] ?>"></td>  
									    </tr>

									    
									</tbody>
		                        </table>
							</div>
							<div class="col-md-12">
								
                            </div>
							<div class="col-md-12">
													
								<label>OTHER QUALIFICATIONS</label>
								<textarea class="form-control" name="qua" placeholder="Please Enter Your Qualification"><?php echo $details2['qua']; ?></textarea>
								<span style="color: green">
									This Field is Optional **
								</span>
								
							</div>
							
						</div>

		                <input type="hidden" name="regNumber" value="<?php echo $regNumber; ?>">
		                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
		                <input type="hidden" name="school_id" value="<?php echo $school_id; ?>">
		                <input type="hidden" name="school_name" value="<?php echo $school_name; ?>">
						<div class="col-md-12" align="center" >
							<button class="btn btn-success" type="submit" name="update_details">UPDATE <?php echo strtoupper($surname." ". $other_names); ?> DETAILS</button>
						</div>
	                </div>
	            </form>
            </div>
        </div>
    </div>        
</div>        
        
<?php
    include("../log-out-modal.php");
	include("../footer.php");
?>