<?php 
	session_start(); 
	include('../../connection/connection.php');
	include("../../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
    $proc = new programmeCourse($db);
	$department_name = $_GET['department_name'];
	$procourse_id = $_GET['identification'];
	
	$loyal = $proc->getProgrammeCourseIdentification($procourse_id);
	$course=$loyal;
	$dept_id = $loyal['dept_id'];
	
	$course_name = $loyal['prog_course'];
	$duration = $course['duration'];
	if($duration < 4){ 
		$school_name = "MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY";
		$title = "MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY";
		$school_id =1;
	}else{
		$school_name = "AFRIFORD UNIVERSITY OF SCIENCE MANAGEMENT ART AND TECHNOLOGY";
		$title = "AFRIFORD UNIVERSITY OF SCIENCE MANAGEMENT ART AND TECHNOLOGY";
		$school_id =2;
	}
	include("../../inc/admission-nav.php");
?>
<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    	<li><a href="admission-requirements.php?department_name=<?php echo $department_name;?>&&identification=<?php echo $procourse_id; ?>"><i class="fa fa-certificate white-text"></i> ADMISSION REQUIREMENT</a></li>
                    	<li><a href="admission-guildlines.php"><i class="fa fa-dashboard white-text"></i> ADMISSION GUILDLINES</a></li>
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
			<!-- <div class="col-md-12" align="center" style="margin-top: -10px;">
				<img src="../../images/form-logo.png" alt="../../images/form-logo.png" style="width: 950px; height: ; ">
			</div> -->
			<div id="tg-twocolumns" class="tg-twocolumns">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<aside id="tg-sidebar" class="tg-sidebar">
								
						<div class="tg-widget tg-widgetadmissionform">
							<div class="tg-widgetcontent">
								<h3>Admission Form For <?php echo date("Y") ?></h3>
								<div class="tg-description">
									<p style="color: white">Interested candidates can apply online or download the application form.</p>
								</div>
								<a class="tg-btn tg-btnicon" href="online-application-form/mgchst-application-form.pdf">
									<i class="fa fa-file-pdf-o"></i>
									<span>Download The Form</span>
								</a>
							</div>
						</div>
			
					</aside>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
					<?php
                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
                        <div class="alert alert-info" align="center">
                            <button class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>
                         <?php include("../mgchst-administrator/includes/feed-back.php"); ?>
                        </div><?php 
                    }  ?>
					<div id="tg-content" class="tg-content">
						<section class="tg-sectionspace tg-haslayout">
							<div class="tg-borderheading">
								<h2 align="center"><?php echo "$department_name ONLINE ADMISSION REQUIREMENTS" ?></h2>
							</div>
							<div class="tg-events">
								<div class="row">
									<div class="col-md-12">
										<table class="table table-responsive table-bordered">
											
											<tbody>
												<td><p style="text-align: justify; text-justify: inter-word; color: black">Course Name</p></td>
												<td><p style=" text-align: justify; text-justify: inter-word; color: black "><?php echo $programme_course = $course['prog_course']; ?></p></td>
											</tbody>
											<tbody>
												<td><p style="text-align: justify; text-justify: inter-word; color: black">Department</p></td>
												<td><p style="text-align: justify; text-justify: inter-word; color: black"><?php $dept_id= $course['dept_id']; 
					                                	$boss = $proc->DepartmentDetailsNow($dept_id);
					                                	echo $dept_name = $boss['dept_name']; ?><p style="color: black"></td></p></td>
											</tbody>
											<tbody>
												<td><p style="text-align: justify; text-justify: inter-word; color: black"> Requirements</p></td>
												<td style="text-align: justify; text-justify: inter-word;"><p style="color: black"><?php echo $course['requirement'] ?><p style="color: black"></td>
											</tbody>
											<tbody>
												<td><p style="text-align: justify; text-justify: inter-word; color: black"> Certification</p></td>
												<td style="text-align: justify; text-justify: inter-word;"><p style="color: black"><?php echo $course['certification'] ?></p></td>
											</tbody>
											<tbody>
												<td><p style="text-align: justify; text-justify: inter-word; color: black"> Duration</p></td>
												<td style="text-align: justify; text-justify: inter-word;"><p style="color: black"><?php echo $duration = $course['duration'] ?></p></td>
											</tbody>
											<tbody>
												<td><p style="text-align: justify; text-justify: inter-word; color: black"> Programme</p></td>
												<td style="text-align: justify; text-justify: inter-word;"><?php 
				                                	if($duration < 4){ ?>
					                                	<p style="color: black"> DIPLOMA</p><?php
					                                	$school_name = "MOSES AND GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY";
					                                	$school_id =1;
					                                }else{ ?>
					                                	<p style="color: black"> DEGREE</p><?php
					                                	
					                                	$school_name = "AFRIFORD UNIVERSITY OF SCIENCE MANAGEMENT ART AND TECHNOLOGY";
					                                	$school_id =2;
					                                }?>
					                            </td>
											</tbody>
											
										</table><?php
										$procourse_id = $course['procourse_id']; ?>
										<div class="col-md-12" align="center">
											
											<a href="registration-form-section-one.php?school_name=<?php echo $school_name?>&&programme_course=<?php echo $programme_course?>&&department_name=<?php echo $dept_name?>&&programme_identification=<?php echo $procourse_id?>&&school_identification=<?php echo $school_id ?>" class="btn btn-success">
											Apply For The Admission</a>
										</div>
										
									</div>
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