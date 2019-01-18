<?php 
	session_start();
	include("stallite-header.php"); 
   	$admin = new studentAdmission($db);
   	$student_matric_num = $_GET['student_matric_number'];
   	$det = $students->getStudentMatricNumber($student_matric_num);
   	$regNumber = $det['regNumber'];
   	$student_matric_number = $student_matric_num;
   	$full = $medical_registration->gettingStudentNumberMedical($student_matric_number);

   	if($medical_registration->checkExistenceStudentMedical($student_matric_number)){
		$_SESSION['error'] =strtoupper("$surname $other_names Please Fill Your Medical Form Below");?>
		<script>window.location=("medical-form.php");</script><?php

	}else{
?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb"> 
                    	<li><a href="my-medical-details.php?student_matric_number=<?php echo $student_matric_number ?>"><i class="fa fa-user white-text"></i> MY MEDICAL DETAILS</a>
						</li>
						<li><a href="edit-my-medical-details.php?student_matric_number=<?php echo $student_matric_number ?>"><i class="fa fa-pencil white-text"></i> EDIT MY MEDICAL DETAILS</a>
						</li>
	                    <li><a href="./"><i class="fa fa-dashboard white-text"></i> MY DASHBOARD</a></li>
						<li class="tg-active"><i class="fa fa-circle white-text"></i><?php echo $student_matric_num ?> MEDICAL DETAILS</li>
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
								<h3><p align="center" style="color: green;">STUDENT MEDICAL BIODATA </p></h3>
								<h4><p align="center" style="color: green;"><?php echo $surname. " ". $other_names; ?> PLEASE KINDLY PREVIEW YOUR DETAILS BELOW</p></h4>
							</div>
							<div class="tg-addmission tg-addmissiondetail">
			                    <div align="left" class="col-md-4">
									<img src="<?php echo "../application-form/studentadmissionimages/".$details['passport_url']; ?>" style="width: 100px; height: 100px;" alt="<?php echo "$surname $other_names"; ?>">
								</div>
			                    <div class="col-md-12">

			                    	<div class="col-md-6" align="left">
				                    	<p align="left"><strong><big>Biodata Details</strong></big></p>
										<p style="color: black"><strong>Full Name: <?php echo $surname. " ". $other_names; ?></strong></p>
										
										<p style="color: black"><strong>Date of Birth: 
										<?php echo $details['date_birth']; ?></strong></p>
										<p style="color: black"><strong>Sex: 
											<?php echo $details['sex']; ?></strong></p>
										<p style="color: black"><strong>Genotype: <?php echo $full['genotype'] ?></strong></p>
										<p style="color: black"><strong>Blood Group: <?php echo $full['blood_group'] ?></strong></p>
									</div>
									<div class="col-md-6" align="right">
				                    	<p align="right"><strong><big>Guadian Details</strong></big></p>
				                    	<p style="color: black"><strong>Hospital Number: <?php echo $full['hospital_number']; ?></strong></p>
										<p style="color: black"><strong>Guadian Name: <?php echo $full['guid_name']; ?></strong></p>
										<p style="color: black"><strong>Guadian Phone: <?php echo $full['guid_phone'] ?></strong></p>
										<p style="color: black"><strong>Relationship: 
										<?php echo $full['guid_relationship']; ?></strong></p>
										<p style="color: black"><strong>Address: 
											<?php echo $full['guid_address']; ?></strong></p>
									</div>
								</div>
								<div class="col-md-12" align="center">
									<a href="edit-my-medical-details.php?student_matric_number=<?php echo $student_matric_number ?>" class="tg-btn" ><i class="fa fa-pencil white-text"></i> Edit Your Medical Details</a>
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
	include("../../inc/footer.php"); 
}
?>