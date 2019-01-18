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
    $course = new addNewSchoolCourse($db);
	$student = new oldStudentRegistration($db);
    $department = new schoolDepartment($db);
    $deptCourse = new departmentalCourses($db);
    $grade = new studentResult($db);
    $staff_details = new schoolStaffs($db);

	$session_id = $_GET['academic_session'];

	// $class_id = $_GET['class_id'];
	// $subject_id = $_GET['subject_id'];
	// $term_name = $_GET['term_name'];
	// $class_id = $_GET['class_id'];
    
    $staff_email = $_SESSION['user_name'];
    $staff = $staff_details->gettingStafftEmail($staff_email);
    $staff_number =$staff['staff_number'];
    $staff_name = $staff['staff_name'];
    	    
	$detail = $db->prepare("SELECT * FROM student_result WHERE session_id=:session_id AND senate_approval=1 ORDER BY subject_id ASC");
	$ars = array(':session_id'=>$session_id);	
	$detail->execute($ars); 
    if($detail->rowCount()==0){ ?>
    	<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">You Have Not Approved Any Students Results For <?php echo "$session_id Academic Session" ?> </h3>
                </div>
            </div>
        </div><?php
    }else{ ?>
		<ul class="breadcrumb">
		   <ul class="breadcrumb">
		        <li><a href="./">Home</a></li>                    
			    <li><a href="approved-students-results.php?academic_session=<?php echo $session_id ?>"><?php echo "$session_id Approved Results" ?></a></li> 
			    <li><a href="view-all-students-approved-results.php">View All Approved Results</a></li>    
		        <li class="active"><?php echo "$session_id Approved Results" ?></li>    
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
	                        <h3 class="panel-title"> Student Results For <?php echo $session_id ?> Academic Session</h3>
	                        <?php include("../table-modal.php"); ?>
	                    </div>
	                    <div class="panel-body">
	                        <form action="process-approving-students-results.php" method="post">
	                            <table id="customers2" class="table datatable">
	                                
	                                <thead align="center">
	                                    <tr>
	                                        <th>S/N</th>
	                                        <th>Matric Number</th>
	                                        <th>Course Code</th>
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
	                                    while($see_result = $detail->fetch()){
	                                    	 
	                                    	$result_id = $see_result['result_id'];?>
	                                    	<tr>
			                                    <td><?php echo $y; ?></td>
			                                    <td><?php echo $student_matric_num = $see_result['student_matric_num']; ?></td>
			                                    <td><?php echo $course_code = $see_result['course_code']; ?></td>
			                                    <td><?php echo $test = $see_result['test_score']; ?></td>
			                                    <td><?php echo $exam =$see_result['exam_score']; ?></td>
			                                    <td><?php echo $score= $test + $exam; ?></td>
			                                    <td><?php $grade-> generateRemarking($score); ?></td>
			                                    <td><?php echo $session_id = $see_result['session_id']; ?></td>
			                                    <td><p style="color: green">Result Approved</p></td>
			                                    <input type="hidden" name="course_code<?php echo $y;?>" value="<?php echo $course_code ?>">
			                                    <input type="hidden" name="result_id<?php echo $y;?>" value="<?php echo $result_id ?>">
			                                    <input type="hidden" name="student_matric_num<?php echo $y ?>" value="<?php echo $student_matric_num ?>">
			                                    <input type="hidden" name="session_id<?php echo $y ?>" value="<?php echo $session_id ?>">
			                                </tr><?php
		                                    $y++;
		                                } ?>
	                                </tbody>
	                                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
	                            </table>
	                            <div class="col-sm-12" align="center">
	                                <div class="md-form-group">
	                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
	                                    <button type="submit" class="btn btn-success">APPROVE THE STUDENT RESULTS</button>
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
?>
