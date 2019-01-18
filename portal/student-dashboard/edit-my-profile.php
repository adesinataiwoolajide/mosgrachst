<?php 
	session_start();
    include("stallite-header.php"); 
    $regNumber = $_GET['student_identification'];
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
                    	
                    	<li><a href="edit-my-profile.php?student_identification=<?php echo $regNumber; ?>""><i class="fa fa-pencil white-text"></i>EDIT MY PROFILE</a></li>
                    	<li><a href="my-profile.php?student_identification=<?php echo $regNumber; ?>&&student_matric_number=<?php echo $student_matric_num ?>""><i class="fa fa-user white-text"></i> MY PROFILE</a></li>
						
						<li><a href="./"><i class="fa fa-dashboard white-text"></i>MY DASHBOAD</a></li>
						<li class="tg-active"><i class="fa fa-book white-text"></i><?php echo $student_matric_num ?> PROFILE</li>
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
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<?php include("stallite-side-bar.php"); ?>			
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
					<div id="tg-content" class="tg-content"><?php				
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
								<h3 align=""><p style="color: green;"><?php echo $stepone['surname']." ". $stepone['other_names']; ; ?> PLEASE PREVIEW YOUR DETAILS BELOW.</p></h3>
							</div>
							
							<div class="tg-borderheading">
								
			                    <form action="update-my-profile.php" method="post" enctype="multipart/form-data" class="tg-formtheme tg-formcontactus">
			                    	<div align="left" class="col-md-3">
									<img src="<?php echo "../application-form/studentadmissionimages/".$details['passport_url']; ?>" style="width: 100px; height: 100px;" alt="<?php echo "$surname $other_names"; ?>">
								</div>
									<div class="col-md-7" align="right">
										<label>Change Your Passport</label>
										<input type="file" name="image" class="form-control">
									</div><br><br>
									<div class="col-md-12" align="">
										
									</div><br><br><br>
									<div class="col-md-9">
										
										<table class="table table-responsive table-hover" style="width: 800px; margin-left: -30px;">
											<tbody>
												<tr>
													<td>1</td>
													<td><p style="color: black;">Martic Number</p></td>
													<td><p style="color: black"><?php echo $student_matric_num; ?></p>
													</td>
												</tr>
											</tbody>

											<tbody>
												<tr>
													<td>2</td>
													<td><p style="color: black">E-Mail</p></td>
													<td><input type="email" name="student_email" value="<?php echo $details['student_email']; ?>" class="form-control" required>
														
													</td>
												</tr>
											</tbody>

											<tbody>
												<tr>
													<td>3</td>
													<td><p style="color: black">Surname Name</p></td>
													<td><input type="text" name="surname" class="form-control" value="<?php echo $details['surname']; ?>" placeholder="Please enter your Surname" required>
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

											<tbody>
												<tr>
													<td>8</td>
													<td><p style="color: black">Course</p></td>
													<td><p style="color: black"><?php
														$procourse_id= $details['procourse_id']; 
														$stu = $students->getingIdentification($procourse_id);
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
											
												<tr>
													<td>13</td>
													<td><p style="color: black">Residential Address</p></td>
													<td><p style="color: black"><textarea name="address" id="address" class="form-control" col=""><?php $add = $details['address']; echo $add; ?></textarea></p>
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
					                                        <option value="Christianity">Christianity</option>
					                                        <option value="Islam">Islam</option>
					                                        <option value="Others">Others</option>
														</select>
														</p>
													</td>
												</tr>
											</tbody>

											</tbody>
												<tr>
													<td>16</td>
													<td><p style="color: black">Next of Kin Name</p></td>
													<td><p style="color: black"><input type="text" name="kin_name"  class="form-control" value="<?php echo $details['kin_name']; ?>"></p>
													</td>
												</tr>
											</tbody>
											</tbody>
												<tr>
													<td>17</td>
													<td><p style="color: black">Next of Kin Phone</p></td>
													<td><p style="color: black"><input type="number" name="kin_phone"  class="form-control" value="<?php echo $details['kin_phone']; ?>"</p>
													</td>
												</tr>
											</tbody>
											</tbody>
												<tr>
													<td>18</td>
													<td><p style="color: black">Next of Kin Address</p></td>
													<td><p style="color: black"><textarea type="text" name="kid_address"  class="form-control" col=""><?php $ro = $details['kid_address']; echo $ro; ?></textarea></p>
													</td>
												</tr>
											</tbody>
											
										</table>

										<input type="hidden" name="regNumber" value="<?php echo $details['regNumber']; ?>">
		                                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
										<div class="col-md-12" align="center" style="margin-left: 120px;">
											<button class="btn btn-success" type="submit" name="update-details"> <?php echo strtoupper($details['surname']. " ". $details['other_names']). " " ?>UPDATE YOUR DETAILS</button>
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