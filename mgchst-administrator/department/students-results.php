<?php
	
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../lecturer/classes/results/result-class.php");
    include("../dev/general/all_purpose_class.php");
	
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];
    $staff = $staff_details->gettingStafftEmail($staff_email);
    $dept_id = $staff['dept_id'];
    $staff_number =$staff['staff_number'];
    $staff_name = $staff['staff_name'];
    $all_purpose = new all_purpose($db);
    $course = new addNewSchoolCourse($db);
    $department = new schoolDepartment($db);
    $deptCourse = new departmentalCourses($db);

    $details = $department->getDepartmentDetails($dept_id);
    $dept_name = $details['dept_name']; 
    $grade = new studentResult($db);

    $detail = $db->prepare("SELECT * FROM student_result WHERE dept_id=:dept_name ORDER BY course_code ASC");
	$ars = array(':dept_name'=>$dept_name); 
    $detail->execute($ars); ?>
        
	<ul class="breadcrumb">
	   <ul class="breadcrumb">
	        <li><a href="./">Home</a></li>                    
	        <li><a href="students-results.php">View Results</a></li> 
	        <li class="active">View Result</li>    
	    </ul> 
	</ul>
	<!-- END BREADCRUMB -->                       
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
	        <div class="col-md-12"> <?php
	           if($detail->rowCount()==0){ ?>
	           <div class="panel panel-default">
	                <div class="panel-heading">
	           			<p style="color: red" align="center">No Result Found for Your Department <?php echo $dept_name ?> </a></p>
	           		</div>
	           	</div><?php
	            }else{ ?>
	                <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h3 class="panel-title" style="color: green"> Student Results For Department of <?php echo $dept_name ?> </h3>
	                        <?php include("../table-modal.php"); ?>
	                    </div>
	                    <div class="panel-body">
	                        
                            <table id="customers2" class="table datatable">
                                
                                <thead align="center">
                                    <tr>
                                        <th>S/N</th>

                                        <th>Course Title</th>
                                        <th>Course Code</th>
                                        <th>Matric Number</th>
                                        <th>Test (30%)</th> 
                                        <th>Exam (70%)</th>
                                        <th>Total (100%)</th> 
                                        <th>Remark</th>
                                        <th>Session</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot align="center">
                                    <tr>
                              			<th>S/N</th>
                              			<th>Course Title</th>
                              			<th>Course Code</th>
                                        <th>Matric Number</th>
                                        <th>Test (30%)</th> 
                                        <th>Exam (70%)</th> 
                                        <th>Total (100%)</th>
                                        <th>Remark</th>
                                        <th>Session</th>
                                        
                                    </tr>
                                </tfoot>

                                <tbody><?php
                                    $y =1;
                                    while($see_result = $detail->fetch()){ 
                                    	$result_id = $see_result['result_id'];
                                    	$course_code = $see_result['course_code'];
                                    	$delo = $course->getCourseDetails($course_code);
                                    	?>
                                    	<tr>
		                                    <td><?php echo $y; ?></td>
		                                    <td><?php echo $delo['course_title']; ?></td>
		                                    <td><?php echo $course_code; ?></td>
		                                    <td><?php echo $student_matric_num = $see_result['student_matric_num']; ?></td>
		                                    <td><?php echo $test = $see_result['test_score']; ?></td>
		                                    <td><?php echo $exam =$see_result['exam_score']; ?></td>
		                                    <td><?php echo $score= $test + $exam; ?></td>
		                                    <td><?php $grade-> generateRemarking($score); ?></td>
		                                    <td><?php echo $see_result['session_id']; ?></td>
		                                    
		                                </tr><?php
	                                    $y++;
	                                } ?>
                                </tbody>
                                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                            </table>
	                    </div>
	                </div><?php
	            } ?>
	        </div>    
	</div>
 <?php       
    include("../log-out-modal.php");
    include("../table-footer.php");	
?>
