<?php
	
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../lecturer/classes/results/result-class.php");
    include("../dev/general/all_purpose_class.php");
	$course_code = $_GET['course_code'];
	$session_id = $_GET['session_identification'];
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
	$delo = $course->getCourseDetails($course_code);
    $details = $department->getDepartmentDetails($dept_id);
    $dept_name = $details['dept_name']; 
    $grade = new studentResult($db);

    $detail = $db->prepare("SELECT * FROM student_result WHERE course_code=:course_code AND session_id=:session_id ORDER BY student_matric_num ASC");
	$ars = array(':course_code'=>$course_code, ':session_id'=>$session_id); 
    $detail->execute($ars); ?>
        
	<ul class="breadcrumb">
	   <ul class="breadcrumb">
	        <li><a href="./">Home</a></li>                    
	        <li><a href="student-results.php?course_code=<?php echo $course_code ?>&&session_identification=<?php echo $session_id; ?>">View Results</a>
	        </li> 
		    <li><a href="select-result.php">Course Result Panel</a></li> 
		        <li><a href="result-panel.php">Students Results Panel</a></li>  
		    <li><a href="view-all-students-results.php">View All Results</a></li>    
	        <li class="active"><?php echo $course_code ?> Result</li>    
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
	           			<p style="color: red" align="center">No Result Found for <?php echo $delo['course_title']; ?> For <?php echo $session_id ?> Academic Session </p>
	           		</div>
	           	</div><?php
	            }else{ ?>
	                <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h3 class="panel-title"><?php echo $delo['course_title']; ?> Student Results For <?php echo $session_id ?> Academic Session</h3>
	                        <?php include("../table-modal.php"); ?>
	                    </div>
	                    <div class="panel-body">
	                        
                            <table id="customers2" class="table datatable">
                                
                                <thead align="center">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Matric Number</th>
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
		                                    <td><?php echo $test = $see_result['test_score']; ?></td>
		                                    <td><?php echo $exam =$see_result['exam_score']; ?></td>
		                                    <td><?php echo $score= $test + $exam; ?></td>
		                                    <td><?php $grade-> generateRemarking($score); ?></td>
		                                    <!-- <td><?php 
		                                    	$semester_id = $delo['semester_id'];
		                                        if($semester_id ==1){
		                                            echo "First Semester";
		                                        }elseif($semester_id ==2){
		                                            echo "Second Semester";
		                                        }else{
		                                        	echo "No Semester";
		                                        } ?>
		                                    </td> -->
                                            
                                    		</td>
		                                    <td><?php echo $see_result['session_id']; ?></td>
		                                    <td><a href="edit-student-result.php?course_code=<?php echo $course_code ?>&&session_identification=<?php echo $session_id ?>&&student_matric_num=<?php echo $student_matric_num; ?>&&result_identification=<?php echo $result_id; ?>" class="btn btn-warning" onclick="return(confirmToEdit());"><i class="glyphicon glyphicon-pencil"></i>Edit</a>
		                                    <a href="delete-student-result.php?course_code=<?php echo $course_code ?>&&student_matric_num=<?php echo $student_matric_num?>&&result_identification=<?php echo $result_id?>&&session_identification=<?php echo $session_id ?>" class="btn btn-danger" onclick="return(confirmToEdit());"><i class="glyphicon glyphicon-trash"></i>Delete</a></td>
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
	<script>
    function confirmToEdit(){
        return confirm("Click okay to Edit Student Result and Cancel to Stop");
    }
</script>  <?php       
    include("../log-out-modal.php");
    include("../table-footer.php");	
?>
