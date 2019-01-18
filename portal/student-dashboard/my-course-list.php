<?php 
	session_start();
    include("stallite-header.php"); 
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

?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb"> 
                    	<li><a href="my-course-list.php?student-matric-number=<?php echo $student_matric_num?>&&session_identification=<?php echo $session_id; ?>"><i class="fa fa-list white-text"></i> MY COURSE LIST</a></li>
                    	<li><a href="my-course-registration.php"><i class="fa fa-briefcase white-text"></i> COURSE REGISTRATION</a></li>
                    	<li><a href="see-course-form.php"><i class="fa fa-book white-text"></i> MY COURSE FORM</a></li>
						<li><a href="check-my-result.php"><i class="fa fa-cog white-text"></i> MY SESSION RESULT</a></li>
						<li><a href="my-transcript.php"><i class="fa fa-balance-scale white-text"></i> MY ACADEMIC TRANSCRIPT</a></li>
						<li><a href="./"><i class="fa fa-dashboard white-text"></i> MY DASHBOARD</a></li>
						
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
							<div class="tg-borderheading">
								<h3><p align="center" style="color: green;">STUDENT COURSE REGISTRATION</p></h3>
									<h5><p align="center" style="color: green;"><?php echo $surname. " ". $other_names; ?> PLEASE PREVIEW YOUR COURSE RESGISTRATION FORM<?php echo $session_id ?> BELOW</p>
									</h5>
							</div>
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
                                        <div class="col-md-6">
                                            <form action="search-course.php" method="post">
                                               	<div class="form-group col-md-6">
													<input type="text" class="form-control" name="course-code" placeholder="Please Enter The Course Code" minlength="5" required>
												</div>
												<input type="hidden" name="session_id" value="<?php  echo $depo['session_id']; ?>">
												<div class="form-group col-md-6" align="right">
					                                <button type="submit" name="search-course" class="btn btn-success">SEARCH FOR THE COURSE</button>
					                            </div><br><br>
	
		                                    </form>
		                                </div>
	                                    
										<table class="table table-responsive table-bordered">
											<thead>
												<th>S/N</th>
												<th>COURSE CODE</th>
												<th>COURSE TITLE</th>
												<th>COURSE UNIT</th>
												<th>COURSE STATUS</th>
												<th>OPERATION</th>
											</thead>
											<tfoot>
												<th>S/N</th>
												<th>COURSE CODE</th>
												<th>COURSE TITLE</th>
												<th>COURSE UNIT</th>
												<th>COURSE STATUS</th>
												<th>OPERATION</th>
												
											</tfoot><?php
											$myList = $db->prepare("SELECT * FROM course_registration WHERE student_matric_num=:student_matric_num AND session_id=:session_id");
											$arrList = array(':student_matric_num'=>$student_matric_num, ':session_id'=>$session_id);
											$myList->execute($arrList);
											$count = 1;
											if($myList->rowCount()==0){
												$_SESSION['error'] = "Please Select Your Course Below";?>
												<script>window.location=("my-course-registration.php")</script><?php

											}else{
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
														<td><?php echo $vode['course_unit']; ?></td>
														<td><?php echo $sis['course_status']; ?></td>
														
														<td>
								                            <a href="remove-my-course.php?student_matric_num=<?php echo $student_matric_num; ?>&& registration-identification=<?php echo $now['registration_id']; ?>&&session_identification=<?php echo $depo['session_id']; ?>" class="btn btn-danger" onclick="confirmToDelete()"><i class="glyphicon glyphicon-trash"></i>
								                            Remove Course</a>
								                        </td>
														<input type="hidden" name="course_code<?php echo $count ?>" value="<?php echo $course_code ?>">

														<input type="hidden" name="student_matric_num" value="<?php echo $student_matric_num ?>">
														<input type="hidden" name="level_id" value="<?php echo $level_name; ?>">
														<input type="hidden" name="prog_id" value="<?php echo $prog_id; ?>">

														<input type="hidden" name="dept_name" value="<?php echo $dept_name; ?>">
													</tbody><?php
													$count++;
												}  
											}?>
										</table>
									</div>
								</div>
							</div>
								
								<div class="col-sm-12" align="center">
                                <div class="md-form-group">
                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
                                    <a href="my-course-form.php?student-matric-number=<?php echo $student_matric_num?>&&session_identification=<?php echo $depo['session_id']; ?>" class="btn btn-success"> MY COURSE FORM
                                    </a>

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


<?php 
	include("../../inc/footer.php"); 
?>