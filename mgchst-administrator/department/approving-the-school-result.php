<?php
	
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../lecturer/classes/results/result-class.php");
    include("../dev/general/all_purpose_class.php");
    require("../super-admin/libs_dev/students-registration/students-registration.php");
    $all_purpose = new all_purpose($db);
	try{
		if(isset($_POST['approve-result'])){
			$dept_id = ($_POST['dept_id']);
			$prog_id = $all_purpose->sanitizeInput($_POST['prog_id']);
			$level_id = $all_purpose->sanitizeInput($_POST['level_id']);
			$session_id = $all_purpose->sanitizeInput($_POST['session_id']);
			

			if($level_id ==1){
				$level_name = "100";
			}elseif($level_id ==2){
				$level_name = "200";
			}elseif($level_id ==3){
				$level_name = "300";
			}elseif($level_id ==4){
				$level_name = "400";
			}elseif($level_id ==5){
				$level_name = "500";
			}else{
				$level_name ="600";
			}

		    $staff_details = new schoolStaffs($db);
		    $staff_email = $_SESSION['user_name'];
		    $staff = $staff_details->gettingStafftEmail($staff_email);
		    $dept_id = $staff['dept_id'];
		    $staff_number =$staff['staff_number'];
		    $staff_name = $staff['staff_name'];
		    $all_purpose = new all_purpose($db);
		    $course = new addNewSchoolCourse($db);
    		$student = new oldStudentRegistration($db);
		    $department = new schoolDepartment($db);
		    $deptCourse = new departmentalCourses($db);
		    $grade = new studentResult($db);

		    $prog = $department->getProgramme($prog_id);
		    $prog_name = $prog['prog_name'];

		    $details = $department->getDepartmentDetails($dept_id);
		  	$dept_name = $details['dept_name']; 
		    $detail = $db->prepare("SELECT * FROM student_result WHERE dept_id=:dept_name AND session_id=:session_id AND prog_id=:prog_id AND level_id=:level_name AND hod_approval=0 ORDER BY course_code ASC");
			$ars = array(':dept_name'=>$dept_name, ':session_id'=>$session_id, ':prog_id'=>$prog_id, ':level_name'=>$level_name); 
		    $detail->execute($ars); 
		    if($detail->rowCount()==0){
		    	$_SESSION['error'] = "No Results Was Found For Approval in The Department of $dept_name For $prog_name Programme in $session_id Academic Session For $level_name Level";?>
		    	<script>
		    		window.location=("approve-result.php");
		    	</script><?php
		    }else{?>
				<ul class="breadcrumb">
				   <ul class="breadcrumb">
				        <li><a href="./">Home</a></li>                    
				        <li><a href="approve-result.php">Approve Students Results</a></li> 
					    <li><a href="view-all-students-results.php">View All Results</a></li>    
				        <li class="active">Approving The Students Results For <?php echo  $dept_name; ?></li>    
				    </ul> 
				</ul>                     
				<?php
				if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
				    <div class="alert alert-info" align="center">
				        <button class="close" data-dismiss="alert">
				            <i class="ace-icon fa fa-times"></i>
				        </button>
				     <?php include("../includes/feed-back.php"); ?>
				    </div><?php 
				}  ?> 
				<!-- PAGE CONTENT WRAPPER -->
				<div class="page-content-wrap">
					<div class="row">
				        <div class="col-md-12">
			                <div class="panel panel-default">
			                    <div class="panel-heading">
			                        <h3 class="panel-title"><p style="color: green"> Student Results In <?php echo $dept_name ?> For <?php echo $prog_name ?> In <?php echo $session_id ?> Academic Session</p></h3>
			                        <?php include("../table-modal.php"); ?>
			                    </div>
			                    <div class="panel-body">
			                        <form action="process-approving-students-results.php" method="post" enctype="multipart/form-data">
			                            <table id="customers2" class="table datatable">
			                                
			                                <thead align="center">
			                                    <tr>
			                                        <th>S/N</th>
			                                        
			                                        <th>Matric Number</th>
			                                        <th>Course Code</th>
			                                        <th>Course Title</th>
			                                        <th>Test (30%)</th> 
			                                        <th>Exam (70%)</th>
			                                        <th>Total (100%)</th> 
			                                        <th>Remark</th>
			                                        
			                                        <th>Session</th>
			                                        <th>Operation</th>
			                                    </tr>
			                                </thead>
			                                <tfoot align="center">
			                                    <tr>
			                              			<th>S/N</th>
			                              			
			                                        <th>Matric Number</th>
			                                        <th>Course Code</th>
			                                        <th>Course Title</th>
			                                        <th>Test (30%)</th> 
			                                        <th>Exam (70%)</th> 
			                                        <th>Total (100%)</th>
			                                        <th>Remark</th>
			                                        <th>Session</th>  
			                                        <th>Operation</th>
			                                    </tr>
			                                </tfoot>

			                                <tbody><?php
			                                    $y =1;
			                                    while($see_result = $detail->fetch())
			                                    	{ 
			                                    		$result_id = $see_result['result_id'];?>
			                                    	<tr>
					                                    <td><?php echo $y; ?></td>
					                                   	
					                                    <td><?php echo $student_matric_num = $see_result['student_matric_num']; ?></td>
					                                    <td><?php echo $course_code = $see_result['course_code']; ?></td><?php $delo = $course->getCourseDetails($course_code); ?>
					                                    <td><?php echo $delo['course_title']; ?></td>
					                                    <td><?php echo $test = $see_result['test_score']; ?></td>
					                                    <td><?php echo $exam =$see_result['exam_score']; ?></td>
					                                    <td><?php echo $score= $test + $exam; ?></td>
					                                    <td><?php $grade-> generateRemarking($score); ?></td>
					                                    <td><?php echo $session_id= $see_result['session_id']; ?></td>
					                                    <td><input type="checkbox" name="approve_result<?php echo $y ?>" value="1">Approve Result</td>
					                                    <input type="hidden" name="course_code<?php echo $y;?>" value="<?php echo $course_code ?>">
					                                    <input type="hidden" name="result_id<?php echo $y;?>" value="<?php echo $result_id ?>">
					                                     <input type="hidden" name="session_id" value="<?php echo $session_id ?>">
					                                    <input type="hidden" name="student_matric_num<?php echo $y ?>" value="<?php echo $student_matric_num ?>">
					                                </tr><?php
				                                    $y++;
				                                } ?>
			                                </tbody>
			                                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
			                            </table>
			                            <div class="col-sm-12" align="center">
			                                <div class="md-form-group">
			                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
			                                    <button type="submit" class="btn btn-success">APPROVE THE STUDENT RESULTS FOR <?php echo strtoupper($dept_name); ?> DEPARTMENT</button>
			                                </div>
			                            </div>
			                        </form>
			                    </div>
			                </div>
				        </div>    
				</div><?php    
		    	include("../log-out-modal.php");
		    	include("../table-footer.php");
		    }
	    }else{
	    	$_SESSION['error'] = "Please Fill The Form Below To Approve The Students Results For $dept_name";?>
	    	<script>
	    		window.location=("approve-result.php");
	    	</script><?php
	    }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();?>
    	<script>
    		window.location=("approve-result.php");
    	</script><?php
    }
?>
