<?php
	session_start();
	include '../../connection/connection.php';
	$school_name = $_GET['school_name'];
	$regNumber = $_GET['registration_number'];
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
	
	$details = $student->getAdmissionStepOne($regNumber);
	$surname =$details['surname'];
	$other_names = $details['other_names'];
	$student_email = $details['student_email'];
	$details2 = $student->getAdmissionStepTwo($regNumber);
?>
<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    	<li><a href="preview-your-details.php?school_name=<?php echo $school_name ?>&&registration_number=<?php echo $regNumber ?>&&registration_email=<?php echo $student_email ?>&&school_identification=<?php echo $school_id ?>"><i class="fa fa-user white-text"></i> <?php echo "$surname $other_names" ?> PREVIEW YOUR DETAILS</a></li>
                        <li class="active"><i class="fa fa-dashboard white-text"></i> PREVIEW YOUR DETAILS</li>
						
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<main id="tg-main" class="tg-main tg-haslayout">
	<div class="container">
		<div class="row">
			<!-- <div class="col-md-12" align="center" style="margin-top: -1px;">
				<?php
				if($school_id ==1){ ?>
                    <img src="../../images/form-logo.png" alt="Moses And Grace " style="width: 950px; height: ; "> <?php
                }else{ ?>
                    <img src="../../images/afriweblogo.jpg" alt="Afriford University" style="width: 950px; height: ; "><?php
                }  ?>   
			</div> -->
			<div id="tg-twocolumns" class="tg-twocolumns" style="margin-top: -40px;">
			</div>
			<div id="tg-twocolumns" class="tg-twocolumns">
				<!-- <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9"> -->
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
							
							
							<div class="tg-events">
								<div class="row">
									<div class="tg-borderheading" align="center" class="col-md-12" style="margin-top: -15px;">
										<div align="left" class="col-md-2">
											<img src="<?php echo "studentadmissionimages/".$details['passport_url']; ?>" style="width: 100px; height: 100px;" alt="<?php echo "$surname $other_names"; ?>">
										</div>
										<div align="" class="col-md-10" style="margin-top: 25px;">
											<h5 style="color: red"><?php echo "$surname $other_names Please Preview Your Details"; ?> Please Preview Your Details Before the Final Submission. The form can not be edited/Corrected once it is Submitted</h5>
										</div>
										
									</div><hr>
									<form action="update-registration-details.php" method="post" enctype="multipart/form-data" class="tg-formtheme tg-formcontactus">
									
										<div class="col-md-12">
											<div class="col-md-6" align="">
												<table class="table table-responsive table-bordered" style="width: 450px;">
												
													<tbody>
														<tr>
															<td>1</td>
															<td><p style="color: black;">Registration Number</p></td>
															<td><p style="color: black"><?php echo $regNumber; ?></p>
															</td>
														</tr>
													</tbody>

													<tbody>
														<tr>
															<td>2</td>
															<td><p style="color: black">E-Mail</p></td>
															<td><p style="color: black"> <?php echo $student_email; ?></p>
																<input type="hidden" name="student_email" class="form-control" required value="<?php echo $student_email; ?>">
															</td>
														</tr>
													</tbody>

													<tbody>
														<tr>
															<td>3</td>
															<td><p style="color: black">Surname Name</p></td>
															<td><input type="text" name="surname" class="form-control" value="<?php echo $surname; ?>" placeholder="Please enter your Surname" required>
															</td>
														</tr>
													</tbody>
													<tbody>
														<tr>
															<td>4</td>
															<td><p style="color: black">Other Names</p></td>
															<td><input type="text" name="other_names" class="form-control" value="<?php echo $details['other_names']; ?>" required></p>
															</td>
														</tr>
													</tbody>

													<tbody>
														<tr>
															<td>5</td>
															<td><p style="color: black">Date of Birth</p></td>
															<td><input type="date" name="birth_date" class="form-control" value="<?php echo $details['date_birth']; ?>" required></p>
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
													
												</table>
											</div>
											<div class="col-md-6" align="right">
												<table class="table table-responsive table-bordered" style="width: 450px; margin-left: 15px;">
													<tbody>
														<tr>
															<td>8</td>
															<td><p style="color: black">Course</p></td>
															<td><p style="color: black"><?php
																$procourse_id= $details['procourse_id']; 
																$stu = $student->getingIdentification($procourse_id);
																echo $stu['prog_course']
																?></p>
																<input type="hidden" name="dept_id" value="<?php echo $procourse_id ?>">
																
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
																echo $bos['prog_name'];
																?></p>
																<input type="hidden" name="dept_id" value="<?php echo $prog_id ?>">
																
															</td>
														</tr>
													</tbody>

													<tbody>
														<tr>
															<td>10</td>
															<td><p style="color: black">Department</p></td>
															<td><p style="color: black"><?php
																
																$dept_id = $stu['dept_id'];
																$boss =$department->getDepartmentDetails($dept_id); 
																echo $dept_name =$boss['dept_name']; 
																?></p>
																<input type="hidden" name="dept_id" value="<?php echo $dept_id ?>">
																
															</td>
														</tr>
													</tbody>

													<tbody>
														<tr>
															<td>11</td>
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
															<td>12</td>
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
														<td>13</td>
														<td><p style="color: black">Residential Address</p></td>
														<td><p style="color: black"><textarea name="address" id="address" class="form-control" col="1"><?php $add = $details['address']; echo $add; ?></textarea></p>
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

		                                                    <td class="center"><input type="text" required name="school1" required value="<?php echo $details2['school1'] ?>"></td>
		                                                    
		                                                    <td class="center"><input type="number" required name="from_date1" value="<?php echo $details2['from_date1'] ?>"></td>

		                                                    <td class="center"><input type="number" required name="to_date1" value="<?php echo $details2['to_date1'] ?>"></td>

		                                                    <td class="center"><input type="text" required name="degree1" value="<?php echo $details2['degree1'] ?>"></td>
		                                                </tr>
		                                                <tr >
		                                                    <td class="center">2</td>
		                                                    <td class="center">
		                                                    	<input type="text" name="school2" value="<?php echo $details2['school2'] ?>" required></td>
		                                                    <td class="center" >
		                                                    	<input type="number" name="from_date2" value="<?php echo $details2['from_date2'] ?>" required></td>
		                                                    <td class="center">
		                                                    	<input type="number" value="<?php echo $details2['to_date2'] ?>" required name="to_date2"></td>
		                                                    <td class="center"><input type="text" value="<?php echo $details2['degree2'] ?>" required name="degree2"></td>
		                                                </tr>
		                                                <tr >
		                                                    <td class="center">3</td>
		                                                    <td class="center">
		                                                    	<input type="text" name="school3" value="<?php echo $details2['school3'] ?>"></td>
		                                                    <td class="center">
		                                                    	<input type="number" name="from_date3" value="<?php echo $details2['from_date3'] ?>"></td>
		                                                    <td class="center">
		                                                    	<input type="number" name="to_date3" value="<?php echo $details2['to_date3'] ?>"></td>
		                                                    <td class="center">
		                                                    	<input type="text" name="degree3" value="<?php echo $details2['degree3'] ?>"></td>
		                                                </tr>
		                                                <tr >
		                                                    <td class="center">4</td>
		                                                    <td class="center"><input type="text" name="school4" value="<?php echo $details2['school4'] ?>"></td>
		                                                    <td class="center"><input type="number" name="from_date4" value="<?php echo $details2['from_date4'] ?>"></td>
		                                                    <td class="center"><input type="number" name="to_date4" value="<?php echo $details2['to_date4'] ?>"></td>
		                                                    <td class="center"><input type="text" name="degree4" value="<?php echo $details2['degree_4'] ?>"></td>
		                                                </tr>
		                                                <tr >
		                                                    <td class="center">5</td>
		                                                    <td class="center"><input type="text" name="school5" value="<?php echo $details2['school5']; ?>"></td>
		                                                    <td class="center"><input type="number" name="fromdate5" value="<?php echo $details2['from_date5']; ?>"></td>
		                                                    <td class="center"><input type="number" name="todate5" value="<?php echo $details2['to_date5'] ?>"></td>
		                                                    
		                                                    <td class="center"><input type="text" name="degree5" value="<?php echo $details2['degree5'] ?>"></td>
		                                                </tr>
		                                            </tbody>
		                                        </table>
											</div>
										</div>
										
										<div class="col-md-12" style="width: 450px">
											<div class="form-group col-md-4">
												<label>ACADEMIC QUALIFICATIONS GCE / SSCE / WASC RESULTS</label>
												<table class="table table-responsive table-bordered">
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

		                                                    <td class="center"><input type="text" required name="sub1" value="<?php echo $details2['sub1'] ?>"></td>
		                                                    <td class="center"><input type="text" required name="grade1" value="<?php echo $details2['grade1'] ?>"></td>  
		                                                </tr>
		                                                <tr >
		                                                    <td class="center">2</td>

		                                                    <td class="center"><input type="text" name="sub2" value="<?php echo $details2['sub2'] ?>"></td>
		                                                    <td class="center"><input type="text" name="grade2" value="<?php echo $details2['grade2'] ?>"></td>
		                                                </tr>
		                                                <tr >
		                                                    <td class="center">3</td>
		                                                   <td class="center"><input type="text" required name="sub3" value="<?php echo $details2['sub3'] ?>"></td>
		                                                    <td class="center"><input type="text" required name="grade3" value="<?php echo $details2['grade3'] ?>"></td>  
		                                                </tr>
		                                                <tr >
		                                                    <td class="center">4</td>
		                                                   	<td class="center"><input type="text" required name="sub4" value="<?php echo $details2['sub4'] ?>"></td>
		                                                    <td class="center"><input type="text" required name="grade_4" value="<?php echo $details2['grade4'] ?>"></td>  
		                                                </tr>
		                                                <tr >
		                                                    <td class="center">5</td>
		                                                   	<td class="center"><input type="text" required name="sub5" value="<?php echo $details2['sub5'] ?>"></td>
		                                                    <td class="center"><input type="text" required name="grade5" value="<?php echo $details2['grade5'] ?>"></td>  
		                                                </tr>
		                                            </tbody>
		                                            
		                                        </table>
											</div>

											<div class=" col-md-10" style="margin-top: -337px; margin-left: 470px; width: 450px; " >
												
												<table class="table table-responsive table-bordered">
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

													        <td class="center"><input type="text"  name="sub6" value="<?php echo $details2['sub6'] ?>"></td>
													        <td class="center"><input type="text"  name="grade6" value="<?php echo $details2['grade6'] ?>"></td>  
													    </tr>
													    <tr >
													        <td class="center">7</td>

													        <td class="center"><input type="text" name="sub7" value="<?php echo $details2['sub7'] ?>"></td>
													        <td class="center"><input type="text" name="grade7" value="<?php echo $details2['grade7'] ?>"></td>
													    </tr>
													    <tr >
													        <td class="center">8</td>
													       <td class="center"><input type="text"  name="sub8" value="<?php echo $details2['sub8'] ?>"></td>
													        <td class="center"><input type="text"  name="grade8" value="<?php echo $details2['grade8'] ?>"></td>  
													    </tr>
													    <tr >
													        <td class="center">9</td>
													       <td class="center"><input type="text"  name="sub9" value="<?php echo $details2['sub9'] ?>"></td>
													        <td class="center"><input type="text"  name="grade9" value="<?php echo $details2['grade9'] ?>"></td>  
													    </tr>
													    
													</tbody>
		                                        </table>
											</div>
										</div>
										<div class="col-md-12">
													
											<label>OTHER QUALIFICATIONS</label>
											<textarea class="form-control" name="qua" placeholder="Please Enter Your Qualification"><?php echo $details2['qua']; ?></textarea>
											<span style="color: red">
												This Field is Required **
											</span>
											
										</div>
										<input type="hidden" name="school_name" value="<?php echo $school_name ?>">
										<input type="hidden" name="school_id" value="<?php echo $school_id ?>">
		                                <input type="hidden" name="regNumber" value="<?php echo $regNumber; ?>">
		                                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
										<div class="col-md-12" align="center" style="margin-left: 120px;">
											<button class="btn btn-success" type="submit" name="update_details">UPDATE THE DETAILS</button>
										</div>
									</form>	
								</div>
							</div>
						</section>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</main>
<script>
    var x = document.getElementById('address'). value = <?php $add; ?>
</script>   

<?php
	include('../../inc/footer.php');

?>
