<?php 
	session_start();
	include '../../connection/connection.php';
    include("../../inc/print-head.php");
    include("../../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
    include("libs_dev/course-registration/course-registration-class.php");
	include("../../inc/dev/admission/admission_class.php");
	require("../../mgchst-administrator/super-admin/libs_dev/students-registration/students-registration.php");


	$students = new oldStudentRegistration($db);
	$department = new schoolDepartment($db);
	$proc = new programmeCourse($db);
	$regid = new studentCourseRegistration($db);
	$register = new courseRegistration($db);

    $student_matric_num = $_GET['student-matric-number'];
    $session_id = $_GET['session_identification'];
    $depo = $regid->getMyCourseList($student_matric_num, $session_id);
    $det = $students->getStudentMatricNumber($student_matric_num);
    $level_name = $det['level'];
    $prog_id = $det['prog_id'];
    $dept_name = $det['dept_name'];
    $nnn = $department->getDepartmentDetailsName($dept_name);
    $dept_id = $nnn['dept_id'];
    $lel = $students->getLevelName($level_name);
    $level_id = $lel['level_id'];


    $details = $students->getStudentMatricNumber($student_matric_num);
    $regNumber = $details['regNumber'];
    $stepone = $students->getAdmissionStepOne($regNumber);
    $steptwo = $students->getAdmissionStepTwo($regNumber);
    $details = $stepone;
    $surname = $details['surname'];
    $other_names =$details['other_names'];
    $school_id = $det['school_id'];
?>

<main id="tg-main" class="tg-main tg-haslayout">
	<div class="container">
		<div class="row">
			<div id="tg-twocolumns" class="tg-twocolumns">
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div id="tg-content" class="tg-content">
						<div class="col-md-12" align="center">
							<?php
							if($school_id ==1){ ?>
			                    <img src="../../images/form-logo.png" alt="Moses And Grace " style="width: 950px; height: 300px; " align="center"> <?php
			                }else{ ?>
			                    <img src="../../images/afriweblogo.jpg" alt="Afriford University" style="width: 950px; height: ; " align="center"><?php
			                }  ?>
			            </div> 
						<section class="tg-sectionspace tg-haslayout">
							
							<div class="tg-borderheading">

			                    <div class="tg-addmission tg-addmissiondetail">
									<div class="tg-container">
										
										<div class="col-md-6">
	                                        <h6><B><p>Matric Number: <?php echo $student_matric_num; ?></p>
	                                         <p>Full Name: <?php echo $stepone['surname']." ". $stepone['other_names']; ?></p>
	                                        <p>Department: <?php echo $dept_name; ?></p>
	                                        <p>Programme:<?php 
	                                        	if($prog_id ==1){ 
	                                        		echo "Degree FT";
	                                        	}elseif($prog_id ==2){
	                                        		echo "Diploma";
	                                        	}else{
	                                        		echo "Degree PT";
	                                        	} ?></p>
	                                        
	                                    	<p>Session:<?php echo $depo['session_id']; ?></p></B></h6>
	                                    </div> 
	                                    
	                                    <div class="col-md-6" >
	                                        <img src="<?php echo "../application-form/studentadmissionimages/".$details['passport_url']; ?>" style="width: 100px; height: 100px;" alt="<?php echo "$student_matric_num"; ?>" align="right">
	                                        <br><br>
                                        </div>
                                       	<div class="tg-borderheading">
											<h4><p align="center" style="color: black"><b>STUDENT COURSE FROM</b></p></h4>
										</div>
										<table class="table table-responsive table-bordered">
											<thead>
												<th>S/N</th>
												<th>COURSE CODE</th>
												<th>COURSE TITLE</th>
												<th>COURSE UNIT</th>
												<th>COURSE STATUS</th>
												
											</thead>
											<tfoot>
												<th>S/N</th>
												<th>COURSE CODE</th>
												<th>COURSE TITLE</th>
												<th>COURSE UNIT</th>
												<th>COURSE STATUS</th>
												
											</tfoot><b><?php
											$myList = $db->prepare("SELECT * FROM course_registration WHERE student_matric_num=:student_matric_num AND session_id=:session_id");
											$arrList = array(':student_matric_num'=>$student_matric_num, ':session_id'=>$session_id);
											$myList->execute($arrList);
											$count = 1;
											while($now = $myList->fetch()){ ?>
												
												<tbody>
													<td><?php echo $count; ?></td>
													<td><?php echo $course_code = $now['course_code']; 
														$vode = $register->getCourseDetails($course_code); ?>

													</td>
													<td><?php echo $vode['course_title']; ?></td>
													<?php 
													$see = $db->prepare("SELECT * FROM school_course WHERE course_code=:course_code");
													$seeArr = array(':course_code'=>$course_code);
													$see->execute($seeArr);
													$sis = $see->fetch() ?>
													
													<td><?php echo $course_unit = $vode['course_unit']; ?></td>
													<td><?php echo $sis['course_status']; ?></td>
													
													
												</tbody><?php
												
												$count++;
											}  ?>
										</b>
										</table>
										<big><p>Total Course Unit: </p></big>
									</div>
								</div>
							</div>
								
								<div class="col-sm-12" align="center">
                                <div class="md-form-group">
                                    
                                    <p><strong>Page 1/1<a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> </a></strong></p>
                                    
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
    function confirmToDelete(){
        return confirm("Click Okay to Delete Course and Cancel to Stop");
    }
</script>


