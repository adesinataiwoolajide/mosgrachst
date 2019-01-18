<?php 
	session_start();
    include("stallite-header.php"); 
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
                    	<li><a href="my-course-registration.php"><i class="fa fa-briefcase white-text"></i> COURSE REGISTRATION</a></li>
                    	<li><a href="see-course-form.php"><i class="fa fa-list white-text"></i> MY COURSE FORM</a></li>
						<li><a href="check-my-result.php"><i class="fa fa-certificate white-text"></i> MY SESSION RESULT</a></li>
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
							
							<form action="process-my-course-registration.php" method="post" enctype="multipart/form-data">
								<div class="tg-borderheading">
									
				                    <div class="tg-addmission tg-addmissiondetail">
				                    	
										<h3><p align="center" style="color: green;">STUDENT COURSE REGISTRATION</p></h3>
										<h4><p align="center" style="color: green;"><?php echo $surname. " ". $other_names; ?> PLEASE CLICK ON ADD COURSE TO REGISTER THE COURSE </p></h4>
										
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
		                                        
		                                    </div><br> <?php
	                                    	$course = $db->prepare("SELECT * FROM school_course WHERE dept_id=:dept_id ORDER BY course_title ASC ");
	                                    	$arrCo = array(':dept_id'=>$dept_id);
											$course->execute($arrCo);
											if($course->rowCount()==0){ ?>
												<p style="color: red">Your Departmental Course List is Empty, The Management Team Are Working on it, Please Check Back Again Later</p><?php
											}else{ ?>
			                                    <div class="col-md-6" >
			                                        <img src="<?php echo "../application-form/studentadmissionimages/".$details['passport_url']; ?>" style="width: 100px; height: 100px;" alt="<?php echo "$student_matric_num"; ?>" align="right">
			                                        <select class="form-control" required name="session_id">
	                                                    <option value="">-- Please Select The School Session --</option>
	                                                    <option value=""></option>
	                                                    <?php
					                                    $swes = $db->prepare("SELECT * FROM session ORDER BY session_name ASC");
					                                    $swes->execute();
					                                    while($see_ha = $swes->fetch()){ ?>
					                                    	<option value="<?php echo $see_ha['session_name'] ?>"><?php echo $see_ha['session_name'] ?></option><?php
					                                    }?>
	                                               </select>
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
													
													$count = 1;
													while($now = $course->fetch()){ ?>
														
														<tbody>
															<td><?php echo $count; ?></td>
															<td><?php echo $course_code = $now['course_code']; 
																$vode = $register->getCourseDetails($course_code); ?>	
															</td>
															<td><?php echo $vode['course_title']; ?></td>
															<td><?php echo $now['course_status']; ?></td>
															<td><?php echo $vode['course_unit']; ?></td>
															<td>
									                            <input type="radio" name="add_course<?php echo $count; ?>" value="1">Add Course
									                        </td>
															<input type="hidden" name="course_code<?php echo $count ?>" value="<?php echo $course_code ?>">

															<input type="hidden" name="student_matric_num" value="<?php echo $student_matric_num ?>">
															<input type="hidden" name="level_id" value="<?php echo $level_name; ?>">
															<input type="hidden" name="prog_id" value="<?php echo $prog_id; ?>">

															<input type="hidden" name="dept_name" value="<?php echo $dept_name; ?>">
														</tbody><?php
														$count++;
													}  ?>
												</table>
										</div>
									</div>
								</div>
							
							
								<div class="col-sm-12" align="center">
	                                <div class="md-form-group">
	                                    <input type="hidden" name="show" value="<?php echo $count; ?>">
	                                    <button type="submit" class="btn btn-success">COMPLETE MY COURSE REGISTRATION</button>
	                                </div>
	                            </div><?php
											} ?>
                            </div>
                        </form>
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