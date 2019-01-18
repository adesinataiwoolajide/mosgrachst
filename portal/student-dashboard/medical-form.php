<?php 
	session_start();
	include("stallite-header.php"); 
   	$admin = new studentAdmission($db);
?>
<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb"> 
                    	<li><a href="medical-form.php"><i class="fa fa-clone white-text"></i> MEDICAL FORM</a></li>
                        <li><a href="./"><i class="fa fa-dashboard white-text"></i> MY DASHBOARD</a></li>
						<li class="tg-active"><i class="fa fa-circle white-text"></i><?php echo $student_matric_num ?> MEDICAL FORM</li>
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
					<div class="tg-widgetcontent">
						<?php include("stallite-side-bar.php"); ?>		
					</div>	
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9" style="margin-top: ;">
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
								<h3><p align="center" style="color: green;">STUDENT MEDICAL BIODATA FORM </p></h3>
								<h5><p align="center" style="color: green;"><?php echo $surname. " ". $other_names; ?> PLEASE FILL THE BELOW FORM TO REGISTER YOUR MEDICAL DETAILS</p></h5>
							</div>
							<div class="tg-addmission tg-addmissiondetail">
			                    <form action="process-medical-registration.php" method="post" class="form-horizontal" enctype="multipart/form-data">
									
									<fieldset>

										<div class="col-md-12">

											<div class="form-group col-md-6 col-sm-6">
												<label>STUDENT NAME</label>
												<input type="text" name="matric" class="form-control" readonly value="<?php echo $surname. " $other_names"; ?>">
												<span style="color: green">
													This Field is Readonly **
												</span>
											</div>
											<div class="form-group col-md-6 col-sm-6">
												<label>MATRIC NUMBER</label>
												<input type="text" name="matric" class="form-control" readonly value="<?php echo $student_matric_num ?>">

												<span style="color: green">
													This Field is Readonly **
												</span>
											</div>
											<input type="hidden" name="student_matric_num" value="<?php echo $student_matric_num ?>">
											<input type="hidden" name="student_name" value="<?php echo $surname. " $other_names"; ?>">
											
										</div>
										
										<div class="col-md-12">
											<div class="form-group col-md-6">
												<label>SEX</label>
												<input type="text" name="matric" class="form-control" readonly value="<?php echo $stepone['sex'] ?>">
												<span style="color: green">
													This Field is Readonly **
												</span>
											</div>

											<div class="form-group col-md-6">
												<label>DATE OF BIRTH</label>
												<input type="text" name="matric" class="form-control" readonly value="<?php echo $stepone['date_birth'] ?>">
												<span style="color: green">
													This Field is Readonly **
												</span>
												
											</div>

										</div>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												<label>GENOTYPE</label>
												<input type="text" name="genotype" class="form-control" placeholder="Enter Your Genotype" required>
												<span style="color: red">
													This Field is Required **
												</span>
												
											</div>

											<div class="form-group col-md-6">
												<label>BLOOD GROUP</label>
												<input type="text" name="blood_group" class="form-control" placeholder="Enter Your Blood Group" required>
												<span style="color: red">
													This Field is Required **
												</span>
												
											</div>
										</div>

										<h4><p style="color: red" align="center">In Case on Any Emergency, Please Fill Your Parent/Guadian's Details Below</p></h4>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												<label>GUADIAN NAME</label>
												<input type="text" name="guid_name" class="form-control" placeholder="Please Enter Your Guadian Full Name" required>
												<span style="color: red">
													This Field is Required **
												</span>
											</div>

											<div class="form-group col-md-6">
												<label>GUADIAN RELSTIONSHIP</label>
												<select class="form-control" name="guid_relationship" required>
													<option value="">-- Select The Relationship --</option>
													<option value=""></option>
													<option value="Father">Father</option>
													<option value="Mother">Mother</option>
													<option value="Brother">Brother</option>
													<option value="Sister">Sister</option>
													<option value="Wife">Wife</option>
													<option value="Husband">Husband</option>
												</select>
												<span style="color: red">
													This Field is Required **
												</span>
												
											</div>
											
										</div>
										<div class="col-md-12">
											<div class="form-group col-md-6">
												<label>GUADIAN PHONE NUMBER</label>
												<input type="number" name="guid_phone" class="form-control" placeholder="Enter The Guadian Phone Number" required>
												<span style="color: red">
													This Field is Required **
												</span>
												
											</div>

											<div class="form-group col-md-6">
												<label>GUADIAN ADDRESS</label>
												<textarea class="form-control" name="guid_address" required></textarea>
												<span style="color: red">
													This Field is Required **
												</span>
												
											</div>
										</div>
										<br><br>
										<div class="col-md-12" align="center">
											<button class="tg-btn" type="submit" name="medical_reg">Submit Your Medical Details</button>
										</div>
									</fieldset>
										
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