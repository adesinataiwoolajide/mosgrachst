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

    // $session_id = $_GET['academic_session'];
    // $session_name = $session_id;
    // $matric_num = $_GET['student_matric_num'];

    $detail = $db->prepare("SELECT * FROM student_result WHERE student_matric_num=:student_matric_num AND hod_approval=1 AND bursary_approval=1 AND senate_approval ORDER BY course_code ASC");
	$ars = array(':student_matric_num'=>$student_matric_num); 
    $detail->execute($ars); 
    if($detail->rowCount()==0){
    	$_SESSION['error'] = "No Result Found For You"; ?>
    	<script>
			window.location=("check-my-result.php") 
		</script>  <?php
    }else{ ?>

		<section class="inner-header divider layer-overlay overlay-theme-colored-7">
		    <div class="container pt-120 pb-60">
		        <div class="section-content">
		            <div class="row"> 
		                <div class="col-md-12">
		                    <ul class="breadcrumb"> 
		                    	<li><a href="my-transcript.php"><i class="fa fa-balance-scale white-text"></i> MY TRANSCRIPT</a></li>
		                    	<li><a href="my-session-result.php?student_matric_num=<?php echo $student_matric_num ?>&&academic_session=<?php echo $session_name; ?>"><i class="fa fa-cog white-text"></i> MY <?php echo $session_id ?> RESULT</a></li>
								<li><a href="check-my-result.php"><i class="fa fa-certificate white-text"></i> MY SESSION RESULT</a></li>
								
								<li><a href="./"><i class="fa fa-dashboard white-text"></i>MY DASHBOAD</a></li>
								<li class="tg-active"><i class="fa fa-book white-text"></i><?php echo $student_matric_num ?> RESULT</li>
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
										<h3><p align="center" style="color: green;">STUDENT TRANSCRIPT </p></h3>
										<h4 align="center"><b><?php echo strtoupper("$surname $other_names This is Your Academic Transcript"); ?> </h2></b></h4>
									</div>
									<div class="tg-borderheading">
										
					                    <div class="tg-addmission tg-addmissiondetail">
											
											<div class="col-md-6" align="left">
												
												<p style="color: black"><strong>Full: <?php echo $surname. " ". $other_names; ?></strong></p>
												
												<strong><p style="color: black">Matric Number: <?php echo $student_matric_num; ?></p>
												<p style="color: black">Course: <?php		
													$procourse_id= $details['procourse_id']; 
													$stu = $students->getingIdentification($procourse_id);
													$loyal = $proc->getProgrammeCourseIdentification($procourse_id);
													echo $stu['prog_course']; ?>
															
												</p>
												</strong>
											</div>

											<div class="col-md-6" align="right">
												
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
												</p></strong>
											</div>
											
										</div>
										<div class="col-sm-12" align="center">
		                                	<table class="table table-responsive table-bordered">
												<thead align="center">
				                                    <tr>
				                                        <th>S/N</th>
				                                        <th>Course Code</th>
				                                        
				                                        <th>Test (30%)</th> 
				                                        <th>Exam (70%)</th>
				                                        <th>Total (100%)</th> 
				                                        <th>Remark</th>
				                                        
				                                    </tr>
				                                </thead>
				                                <tfoot align="center">
				                                    <tr>
				                              			<th>S/N</th>
				                                        <th>Course Code</th>
				                                        
				                                        <th>Test (30%)</th> 
				                                        <th>Exam (70%)</th>
				                                        <th>Total (100%)</th> 
				                                        <th>Remark</th>
				                                        
				                                    </tr>
				                                </tfoot>
				                                <tbody><?php
				                                	$y =1;
				                                	
	                                   				while($see_result = $detail->fetch()){ 
	                                   					$result_id = $see_result['result_id'];?>
				                                    	<tr>
						                                    <td><?php echo $y; ?></td>
						                                    <td><?php echo $see_result['course_code']; ?></td>
						                                    
						                                    <td><?php echo $test = $see_result['test_score']; ?></td>
						                                    <td><?php echo $exam =$see_result['exam_score']; ?></td>
						                                    <td><?php echo $score= $test + $exam; ?></td>
						                                    
						                                    <td><?php $grade-> generateRemarking($score); ?></td>
						                                    
				                                            
				                                    	</tr><?php 
				                                    	$y++;
				                                	} ?>
				                                </tbody>
					                                
											</table>
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
} 
?>