<?php 
	session_start();
    include("stallite-header.php"); 
    include("../../mgchst-administrator/dev/general/all_purpose_class.php");
    $all_purpose = new all_purpose($db);
    $student_matric_num = $_SESSION['user_name'];
    // $session_id = $_GET['session_identification'];
    // $depo = $regid->getMyCourseList($student_matric_num, $session_id);
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
								<h5><p align="center" style="color: green;"><?php echo $surname. " ". $other_names; ?> PLEASE CLICK ON REGISTER TO ADD THE COURSE TO YOUR COURSE LIST</p>
								</h5>
							</div>	
							<div class="tg-borderheading">
			                    <div class="tg-addmission tg-addmissiondetail">
									
									<div class="tg-container">
										<h3><p align="center" style="color: green"><br></p></h3><br>
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
	                                        </B></h6>
	                                    </div> 
	                                    
		                                    <div class="col-md-6" >
		                                        <img src="<?php echo "../application-form/studentadmissionimages/".$details['passport_url']; ?>" style="width: 100px; height: 100px;" alt="<?php echo "$student_matric_num"; ?>" align="right">
		                                        
                                            </div><br><br><?php 
                                            if(isset($_POST['search-course'])){
		                                        $course = $_POST['course-code'];
		                                        $session_id = $_POST['session_id'];
		                                        $tansform = strtolower($course);
		                                        $uppers = strtoupper($course);

		                                        if($regid->searchCourse($uppers, $tansform)){
		                                        	$_SESSION['error'] = "$course Does Not Exist"; ?>
		                                        	<script>
		                                        		window.location=("my-course-list.php?student-matric-number=<?php echo $student_matric_num ?>&&session_identification=<?php echo $session_id ?>");
		                                        	</script><?php
		                                        	
		                                        }else{ ?>
		                                        	
				                                    <table class="table table-bordered">
		                                                <form action="process-my-course-registration.php" method="post" class="form-control" enctype="multipart/form-data"><?php
		                                                	$sele = $db->prepare("SELECT * FROM school_course WHERE course_code=:tansform OR course_code=:uppers OR course_title=:uppers OR course_title=:tansform");
						                                    $shd = array(':tansform'=>$tansform, ':uppers'=>$uppers);
						                                    $sele->execute($shd); ?>
		                                                    <thead>
		                                                        <tr>
		                                                            <th>S/N</th>
		                                                            <th>COURSE CODE</th>
		                                                            <th>COURSE TITLE</th>
		                                                            <th>COURSE UNIT</th>
		                                                            <th>COURSE STATUS</th>
		                                                            <th>OPERATION</th>
		                                                         </tr>  
		                                                    </thead><?php
		                                                    $y =1;

		                                                    while($wow = $sele->fetch()){
		                                                         ?>
		                                                        <tbody>
		                                                            <tr>
		                                                                <td><?php echo $y; ?></td>
		                                                                <td><?php echo $code = $wow['course_code'];?>
		                                                                </td>
		                                                                <td><?php echo $wow['course_title']; ?></td>
		                                                                <td><?php echo $wow['course_unit']; ?></td>
		                                                                <td><?php echo $wow['course_status']; ?>
		                                                                </td>
		                                                                <td><input type="radio" name="add_course<?php echo $y; ?>" value="1">Add Course
		                                                                </td>
		                                                               <input type="hidden" name="course_code<?php echo $y ?>" value="<?php echo $code ?>">

																		<input type="hidden" name="student_matric_num" value="<?php echo $student_matric_num ?>">
																		<input type="hidden" name="level_id" value="<?php echo $level_name; ?>">
																		<input type="hidden" name="prog_id" value="<?php echo $prog_id; ?>">

																		<input type="hidden" name="dept_name" value="<?php echo $dept_name; ?>">
																		<input type="hidden" name="session_id" value="<?php echo $session_id ?>">
		                                                            </tr>
		                                                                
		                                                        </tbody>

		                                                        <!-- <input type="hidden" name="course_code" value="<?php echo $course_code ?>">
		                                                        <input type="hidden" name="prog_id" value="<?php echo $prog_id; ?>">

						                                        <input type="hidden" name="dept_name" value="<?php echo $dept_name; ?>">

						                                        <input type="hidden" name="level_name" value="<?php echo $level_name; ?>">

						                                        <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">

						                                        <input type="hidden" name="student_matric_num" value="<?php echo $student_matric_num; ?>"> -->
						                                        <?php $y++;      
		                                                    } 
		                                                ?>
		                                            </table>
		                                            <div class="col-sm-12" align="center">
						                                <div class="md-form-group">
						                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
						                                    <button type="submit" class="btn btn-success">COMPLETE MY COURSE REGISTRATION</button>
						                                     <a href="my-course-list.php?student-matric-number=<?php echo $student_matric_num ?>&&session_identification=<?php echo $session_id; ?>" class="btn btn-primary">MY COURSE LIST</a>
						                                </div>

						                            </div>
		                                            <?php
		                                        }

		                                    }else{
		                                    	$_SESSION['error'] = "Please Enter The Course Code Or The Course Title";?>
		                                    	<script>
	                                        		window.location=("my-course-list.php?student-matric-number=<?php echo $student_matric_number ?>&&session_identification=<?php echo $session_id ?>");
	                                        	</script><?php
		                                    } ?>

										</div>
									</div>
								</div>
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