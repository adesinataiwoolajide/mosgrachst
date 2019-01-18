<?php 
	session_start();
	include("../../connection/connection.php");
	$school_name = $_GET['school_name'];
	$regNumber = $_GET['registration_number'];
	$student_name = $_GET['student_name'];
    $school_id= $_GET['school_identification'];
    $programme = $_GET['programme'];
    if($school_id ==2){
		$title =  "AFRIFORD UNIVERSITY";
	}else{
		$title = "MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY";
	}
	include("../../inc/admission-nav.php");
	include("../../mgchst-administrator/super-admin/libs_dev/students-registration/students-registration.php");
	include("../../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
	include("../../inc/dev/admission/admission_class.php");
	$registration = new oldStudentRegistration($db);
    $department = new schoolDepartment($db);
   	$student = new studentAdmission($db);
   	$folp = $registration->getMatricNumber($regNumber);
	$details = $student->getAdmissionStepOne($regNumber); 
	$admission = $student->getMatricNumber($regNumber);
	$ses = $folp['admission_year']; ?>
<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    	<li><a href="print-admission-letter.php?registration_number=<?php echo  $regNumber ?>&&student_name=<?php echo $student_name ?>&&school_name=<?php echo $school_name ?>&&school_identification=<?php echo $school_id ?>&&programme=<?php echo$programme?>"><i class="fa fa-book white-text"></i> ADMISSION LETTER</a></li>
                    	<li><a href="check-admission-status.php"><i class="fa fa-list white-text"></i> ADMISSION STATUS</a></li>
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
			<?php
            if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                <div class="alert alert-info" align="center">
                    <button class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                 <?php include("../../mgchst-administrator/includes/feed-back.php"); ?>
                </div><?php 
            }  ?>
			<input type="hidden" name="school_name" value="<?php echo $school_name ?>">
			<input type="hidden" name="school_id" value="<?php echo $school_id ?>"><?php
			if(($programme ==1) OR ($programme ==3)){ ?>
				<div id="tg-twocolumns" class="tg-twocolumns">
					
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 pull-right">
				       	<div class="col-md-12" align="center" style="margin-top: -1px;">
							<?php
							if($school_id ==1){ ?>
			                    <img src="../../images/form-logo.png" alt="MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY" style="width: 950px; height: ; "> <?php
			                }else{ ?>
			                    <img src="../../images/afriweblogo.jpg" alt="AFRIFORD UNIVERSITY" style="width: 950px; height: ; "><?php
			                }  ?>   
						</div><br><br>
						<div id="tg-content" class="tg-content">
							<div class="tg-addmission tg-addmissiondetail">
								
								<span class="tg-lastmodified"><strong>Prof. Abdullah M Mujtaba, Ph.D, D.Sc., FIMA, DMA, MIMC, FCIEME, FIASR, KOGC VICE-CHANCELLOR</strong></span>
								<div class="tg-pagetitle" class="col-md-12">
									<div class="col-md-6" align="left">
										<h4><strong>Our Reference: ADM/SHS/BADM/0516</strong></h4>
									</div>
									<div class="col-md-6" align="left">
										<h4><strong>Session: <?php //$ss= date("Y");
										 $ses;
										// 	$start_time = strtotime("+365 days", time());
          									//                                   $start= date("Y", $start_time); echo $ss."/".$start; ?>
                                            </strong>	
                                            </h4>
									</div>

									<div class="col-md-6" align="left">
										<h4><strong>Full Name: <?php echo $student_name; ?></strong></h4>
									</div>

									<div class="col-md-6" align="left">
										<h4><strong>Registration Number: <?php echo $regNumber; ?></strong></h4>
									</div><br>
                                <div align="right">
									<img src="<?php echo "studentadmissionimages/".$details['passport_url']; ?>" style="width: 100px; height: 100px;" alt="<?php echo "$student_name"; ?>">
								</div>
									<h2 align="center"><strong><u>PROVISIONAL OFFER OF ADMISSION<u></strong></h2>
								</div>
								
								<div class="tg-container" style="text-align: justify; text-justify: inter-word;">
									<p><h5>I am pleased to inform you that you have been offered a provisional admission into <strong> Afriford Univeristy </strong> to study <?php 
									$procourse_id= $details['procourse_id']; 
									$cose = $student->getingIdentification($procourse_id); ?><strong><?php echo $cose['prog_course'] ?></strong> in the department of 
									<strong><?php echo $admission['dept_name']; ?>
									</strong> towards the award of a <strong><?php 
									$prog_id = $admission['prog_id']; 
									$oya=$department->getProgramme($prog_id); 
									echo $oya['prog_name']; ?>. Your Matric Number is <b><?php echo $folp['student_matric_num'] ?></b></strong></h5>
									</p>

									<p><h5>The School shall coordinate your study activities. Your admission is subject to the following conditions:</h4>
									<ol><h5>
										<li>You must produce at the time of registration the following documents: <br></h5><h6>
										a.	Originals of all your academic certificates specified in your application form<br>
										b.	Original and photocopy of your Birth Certificate or Sworn declaration of age<br>
										c.	Evidence from bank of payment of all fees or the corresponding receipt(s) from the University Bursary<br>
										d.	Three (3) recent passport size photographs<br>
										</li></h6>
										<h5><li>
											The management reserves the right to withdraw your admission whenever it is discovered that you have given false information to the University or falsified any results or records.
										</li>
										<li>
											Please write and return an Acceptance letter to reach the Academic Registrar on or before the registration date
										</li>
										<li>
											Read properly the rules and regulations of the school to be sure you know what they entail as the violation of any might result to your withdrawal
										</li></h5>
									</ol>
									<h4><strong>Accept my Congratulations.</strong></h4>
										</p>
								</div>
								<div class="tg-container" class="col-md-12" style="margin-top: -80px;">
									<div class="col-md-12" align="right">
										<p>ACADEMIC OFFICER</p>
										<p>(FOR THE REGISTRAR)</p>

									</div>
									<div class="col-md-12" align="right">
										<img src="registra-stamp.png" style="margin-top: -5px; width: 250px; height: 150px; margin-right: -60px;">
									</div>
									<a href="href="javascript:window.print();" target="_blank" align="center"> <i class="fa fa-print"></i> Print Admission Letter</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 pull-left">
						<div class="wm-student-nav" style="margin-top: 20px">
							<ul>
								
								<li>
									<a href="../../portal/./">
										<i class="fa fa-dashboard white-text"></i>
										School Portal
									</a>
								</li>
							</ul>
						</div>

						<?php include("../../inc/sidebar.php"); ?>
					</div>
				</div><?php
			}else{ ?>
				<div id="tg-twocolumns" class="tg-twocolumns">
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 pull-right">
						<div class="col-md-12" align="center" style="margin-top: -1px;">
							<img src="../../images/form-logo.png" alt="../../images/form-logo.png" style="width: 950px; height: ; ">
						</div>
						<div id="tg-content" class="tg-content">
							<div class="tg-addmission tg-addmissiondetail">
								<span class="tg-lastmodified"><strong>Linus.O. Igah  (B.ED, (Hons), M.ED ( Hons.) Acting provost <br>
									P.E. Idahosa Esq. (BA, (Hons.), LL.B (Hons.)  & BL. Acting Registrar & Secretary. <br>
									<h3>JEREMIAH AKPOR OKPONYIKE</h3>
									</strong></span>
								<div class="tg-pagetitle" class="col-md-12">
									<div class="col-md-6" align="left">
										<h5><strong>Our Reference: MGCHSTB/ADM/CHE/014/2017</strong></h5>
									</div>
									<div class="col-md-6" align="left">
										 <h5><strong>Session: <?php echo $ses //$ss= date("Y"); 
										// 	$start_time = strtotime("+365 days", time());
          //                                   $start= date("Y", $start_time); echo $ss."/".$start; ?>
                                            </strong>	
                                            </h5>
									</div>

									<div class="col-md-6" align="left">
										<h4><strong>Full Name: <?php echo $student_name; ?></strong></h4>
									</div>

									<div class="col-md-6" align="left">
										<h4><strong>Registration Number: <?php echo $regNumber; ?></strong></h4>
									</div><br>

									<h2 align="center"><strong><u>PROVISIONAL OFFER OF ADMISSION<u></strong></h2>
								</div>
								<div class="tg-container" style="text-align: justify; text-justify: inter-word;">
									<p><h5>I am pleased to inform you that you have been offered a provisional admission into <strong> MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY </strong> to study <?php 
									$procourse_id= $details['procourse_id']; 
									$cose = $student->getingIdentification($procourse_id); ?><strong><?php echo $cose['prog_course'] ?></strong> in the department of 
									<strong><?php echo $admission['dept_name']; ?>
									</strong> towards the award of a <strong><?php 
									$prog_id = $admission['prog_id']; 
									$oya=$department->getProgramme($prog_id); 
									echo $oya['prog_name']; ?>.</strong> The course is for a duration of 3 years. Your Matric Number is <b><?php echo $folp['student_matric_num'] ?></b></h5>
									</p>

									<p><h5>Your admission is subject to the following conditions:</h4>
										<ol><h5>
											<li>You are to submit at the time of registration the following documents:<br></h5><h6>
											a.	Three (3) photocopies  each of your credentials.(your academic certificates specified in your application form)<br>
											b.	Four (4) recent passport size photographs.<br>
											c.	Three (3) photocopies of birth day certificate or affidavit of age declaration<br>
											d.	A guarantor letter from parents/guardian.<br>
											e.	Evidence from bank of payment of all fees or the corresponding receipt(s) from the college bursary.<br>
											</li></h6>
											<h5><li>
												Moses and Grace College of Health Science and Technology reserve the right to withdraw your admission whenever it is discovered that you have given false information to the college or falsified any results or records.
											</li>
											<li>
												Approved payment/fees for your training programme is as attached.
											</li>
											
										</ol>
										<h4><strong>Accept my Congratulations.</strong></h4>
										</p>
								</div>
								<div class="tg-container" class="col-md-12" style="margin-top: -80px;">
									<div class="col-md-12" align="right">
										<p>ACADEMIC OFFICER</p>
										<p>(FOR THE REGISTRAR)</p>

									</div>
									<div class="col-md-12" align="right">
										<img src="registra-stamp.png" style="margin-top: -5px; width: 250px; height: 150px; margin-right: -60px;">
									</div>
									<a href="href="javascript:window.print();" target="_blank" align="center"> <i class="fa fa-print"></i> Print Admission Letter</a>
								</div>
								
							</div>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 pull-left">
						<div class="wm-student-nav" style="margin-top: 20px">
							<ul>
								
								<li>
									<a href="../../portal/./">
										<i class="fa fa-dashboard white-text"></i>
										School Portal
									</a>
								</li>
							</ul>
						</div>

						<?php include("../../inc/sidebar.php"); ?>
					</div>
				</div><?php
			} ?>
		</div>
	</div>
</main>

<?php include("../../inc/footer.php"); ?>