<?php
	include("../../connection/connection.php");
	if(!isset($_SESSION['id'])){
        $_SESSION['error']="Please Login with your Details to Access the System";
        header("Location: .././");
    }
    
	include("../../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
	include("../../mgchst-administrator/super-admin/libs_dev/course/course_class.php");
	include("../../inc/dev/admission/admission_class.php");
	include("../../mgchst-administrator/lecturer/classes/results/result-class.php");
	require("../../mgchst-administrator/super-admin/libs_dev/students-registration/students-registration.php");
	require 'libs_dev/course-registration/course-registration-class.php';
	require 'libs_dev/medical/medical-registration.php';

	$students = new oldStudentRegistration($db);
	//$department = new schoolDepartment($db);
   // $student = new oldStudentRegistration($db);
	$medical_registration = new studentMedicalRegistration($db);
	$regid = new studentCourseRegistration($db);
	$register = new courseRegistration($db);
	$department = new schoolDepartment($db);
	$proc = new programmeCourse($db);
	$grade = new studentResult($db);
	
	$coursing = new addNewSchoolCourse($db);
	
    $student_matric_num = $_SESSION['user_name'];
    $student_matric_number = $student_matric_num;
    $details = $students->getStudentMatricNumber($student_matric_num);
    $regNumber = $details['regNumber'];
    
    $stepone = $students->getAdmissionStepOne($regNumber);
    $steptwo = $students->getAdmissionStepTwo($regNumber);
    
    $details = $stepone;
    $surname =$details['surname'];
    $student_email = $details['student_email'];
	$other_names = $details['other_names'];
    $course_registration = new courseRegistration($db);
    $prog_id = $stepone['prog_id'];
    if(($prog_id ==1) OR ($prog_id ==3)){
    	$title = "AFRIFORD UNIVERSITY OF SCIENCE MANAGEMENT ART AND TECHNOLOGY";
	}else{
		$title= "MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY";
	}
?>

<!doctype html>
<html class="no-js" lang="zxx"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<meta name="description" content="College of Health Sciences and Technology, Nigeria">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="css/normalize.css">
	<link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.default.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body class="tg-home tg-homefour">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper">
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-headervtwo tg-headervthree tg-haslayout">
			<div class="tg-topbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-addressinfo"><?php
							if(($prog_id ==1) OR ($prog_id ==3)){ ?>
								<li>
									<i class="icon-map-marker"></i>
									<address>Afriford Address</address>
								</li>
								<li>
									<i class="icon-clock"></i>
									<time datetime="2016-10-10">Mon - Fri 9:00 - 18:00</time>
								</li>
								<li>
									<i class="icon-phone-handset"></i>
									<span>Phone Numbers</span>
								</li><?php
							}else{ ?>
								<li>
									<i class="icon-map-marker"></i>
									<address>No. 3, Richard Street, off Benin-Sapele Road, Obe, Benin-City.</address>
								</li>
								<li>
									<i class="icon-clock"></i>
									<time datetime="2016-10-10">Mon - Fri 9:00 - 18:00</time>
								</li>
								<li>
									<i class="icon-phone-handset"></i>
									<span>+234 814 642 8512 | 802 946 3566</span>
								</li><?php
							} ?>
								
							</ul>
							<div class="tg-themedropdown tg-languagesdropdown">
								<a href="#" id="tg-languages" aria-haspopup="true" aria-expanded="false">
									<span><img src="images/flags/img-01.png" alt="facebook"></span>
									
								</a>
                                <a href="#" id="tg-languages" aria-haspopup="true" aria-expanded="false">
									<span><img src="images/flags/img-02.png" alt="twitter"></span>
									
								</a>
                                <a href="#" id="tg-languages" aria-haspopup="true" aria-expanded="false">
									<span><img src="images/flags/img-03.png" alt="linkedin"></span>
									
								</a>
								<a href="#" id="tg-languages" aria-haspopup="true" aria-expanded="false">
									<span><img src="images/flags/img-04.png" alt="instagram"></span>
									
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-navigationarea">
							<strong class="tg-logo"><?php
							if(($prog_id ==1) OR ($prog_id ==3)){ ?>
								<a href=".././"><img src="images/afriweblogo.jpg" alt="AFRIFORD UNIVERSITY OF SCIENCE MANAGEMENT ART AND TECHNOLOGY" style="width: 400px; height: 70px;"></a></strong><?php
							}else{ ?>
								<a href=".././"><img src="images/logo.png" alt="Moses and Grace College of Health"></a></strong><?php
							} ?>
							<div class="tg-navigationandsearch">
								<nav id="tg-nav" class="tg-nav">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>
									<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
										<ul><?php  
											if(isset($_SESSION['id'])){ ?>
												<li>
													<a href="./">Home</a>
												</li>
												
												
												<li class="menu-item-has-children">
													<a href="javascript:void(0);"> Registration</a>
													<ul class="sub-menu">
														<li><a href="my-course-registration.php">Course Registration</a></li>
														<li><a href="see-course-form.php">Course Form</a></li>
		                                                <li><a href="">Check Registration Status</a></li>
													</ul>
												</li>
												<li class="menu-item-has-children">
													<a href="javascript:void(0);">Result</a>
													<ul class="sub-menu">
														<li><a href="check-my-result.php">Check Result</a></li>
														<li><a href="my-transcript.php">Transcript</a></li>	
													</ul>
												</li>
												<li class="menu-item-has-children">
													<a href="javascript:void(0);">Payment</a>
													<ul class="sub-menu">
														<li><a href="">School Fees</a></li>
														<li><a href="">Hostel</a></li>	
													</ul>
												</li>
												
												<li class="menu-item-has-children">
													<a href="javascript:void(0);">E-Learning</a>
													<ul class="sub-menu">
														<li><a href="">Download Materials</a></li>
														<li><a href="">Turotials</a></li>	
													</ul>
												</li>
												<li>
													<a href="medical-form.php">Medical</a>
												</li>
												<li>
													<a href="">Library</a>
												</li>
												
												<li>
													<a href="../log-out.php">Log Out</a>
												</li>
												<?php
											}else{ ?>
												<li>
													<a href="../.././">Home</a>
												</li>
												
												
		                                        <li class="menu-item-has-children">
                                                	<a href="javascript:void(0);">Collaborations</a>
													<ul class="sub-menu">
	                                        			<li><a href="http://www.afriford.com/" target="_blank">Afriford University</a></li>
                                                    </ul>
												<li>

												
												
												<?php
											} ?>
										</ul>
									</div>
								</nav>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
