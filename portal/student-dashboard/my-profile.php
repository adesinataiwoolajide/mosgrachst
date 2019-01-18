<?php 
	session_start();
    include("stallite-header.php"); 
    $regNumber = $_GET['student_identification'];
    $surname =$details['surname'];
	$other_names = $details['other_names'];
	$student_email = $details['student_email'];
	$student_matric_num = $_SESSION['user_name'];
?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb"> 
                    	<li><a href="my-profile.php?student_identification=<?php echo $regNumber; ?>""><i class="fa fa-user white-text"></i> MY PROFILE</a></li>
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
							
							<div class="tg-borderheading" class="col-md-12">
								
								<div align="center" class="col-md-12">
									<h4 align=""><p style="color: green;"><?php echo $stepone['surname']." ". $stepone['other_names']; ?> PLEASE PREVIEW YOUR DETAILS BELOW.</p>
									</h4>
								</div>
							</div>
							<div align="left" class="col-md-3">
									<img src="<?php echo "../application-form/studentadmissionimages/".$details['passport_url']; ?>" style="width: 100px; height: 100px;" alt="<?php echo "$surname $other_names"; ?>">
								</div>
							<div class="tg-borderheading">
								<?php
			                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
			                        <div class="alert alert-info" align="center">
			                            <button class="close" data-dismiss="alert">
			                                <i class="ace-icon fa fa-times"></i>
			                            </button>
			                         <?php include("../../mgchst-administrator/includes/feed-back.php"); ?>
			                        </div><?php 
			                    }  ?>

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
											$stu = $students->getingIdentification($procourse_id);
											$loyal = $students->getProgrammeCourseIdentification($procourse_id);
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
										<p style="color: black"><strong>Course Duration: <?php echo $loyal['duration']; ?>					
									</div>
									
								</div>
								<br>
								<br>
								<div class="col-md-12" align="">
									<div class="col-md-6" align="left">
										<p align=""><strong><big>Other Details</big></big></p>
										
										
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
												<p style="color: black" align="center">Residential Address</p>
												<td><p style="color: black"><?php
													 echo $details['address'] ?></p>
												</td>
											</tr>
										</tbody>
									</table>
								
								</div>
								<div class="col-md-12" align="center" style="margin-left: 120px;">
									<a href="edit-my-profile.php?student_identification=<?php echo $regNumber; ?>&&student_matric_number=<?php echo $student_matric_num ?>" class="btn btn-success" name="update-details"> <?php echo strtoupper($details['surname']. " ". $details['other_names']). " " ?>EDIT YOUR DETAILS</a>
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
?>