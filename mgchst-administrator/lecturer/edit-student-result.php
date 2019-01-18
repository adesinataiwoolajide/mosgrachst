<?php
	
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../dev/general/all_purpose_class.php");

    include("classes/results/result-class.php");
    $grade = new studentResult($db);
    $all_purpose = new all_purpose($db);
	$student_matric_num = $_GET['student_matric_num'];
	$result_id = $_GET['result_identification'];
	$course_code = $_GET['course_code'];
	$editing = $grade->getResultId($student_matric_num, $result_id);

		
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
         ?>
		<ul class="breadcrumb">
		   <ul class="breadcrumb">
		        <li><a href="./">Home</a></li>                    
		        
		        <li><a href="edit-student-result.php?course_code=<?php echo $course_code ?>&&student_matric_num=<?php echo $student_matric_num; ?>&&result_identification=<?php echo $result_id; ?>">Edit Result</a></li> 
		        
		        <li><a href="my-courses.php">View My Courses</a></li> 
		        <li class="active">Edit Result</li>    
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
			            <div class="col-md-12"> 
			                <div class="panel panel-default">
			                    <div class="panel-heading">
			                        <h3 class="panel-title">Edit <?php echo $delo['course_title']; ?> Result Panel</h3>
			                        <?php include("../table-modal.php"); ?>
			                    </div>
			                    <div class="panel-body">
			                        <form action="process-update-student-result.php" method="post" class="form-horizontal" enctype="multipart/form-data">
			                            <table id="customers2" class="table datatable">
			                                
			                                <thead align="center">
			                                    <tr>
			                                        <th>S/N</th>
			                                        <th>Matric Number</th>
			                                        <th>Course Code</th>
			                                        <th>Test</th> 
			                                        <th>Exam</th> 
			                                        
			                                    </tr>
			                                </thead>
			                                <tfoot align="center">
			                                    <tr>
			                              			<th>S/N</th>
			                                        <th>Matric Number</th>
			                                        <th>Course Code</th>
			                                        <th>Test</th> 
			                                        <th>Exam</th> 
			                                      
			                                    </tr>
			                                </tfoot>

			                                <tbody>
			                                	<tr>
			                                		<td>1</td>
			                                		<td><?php echo $editing['student_matric_num']; ?></td>
			                                		<td><?php echo $editing['course_code']; ?></td>
			                                		<td><input type="number" name="test_score" required value="<?php echo $editing['test_score']; ?>" class="form-control"></td>
			                                		<td><input type="number" name="exam_score" required value="<?php echo $editing['exam_score']; ?>" class="form-control"></td>
			                                	</tr>
			                                </tbody>
			                                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
			                                <input type="hidden" name="result_id" value="<?php echo $result_id; ?>">
			                                <input type="hidden" name="prev_test" value="<?php echo $editing['test_score']; ?>">
			                                <input type="hidden" name="prev_exam" value="<?php echo $editing['exam_score']; ?>">
			                                <input type="hidden" name="student_matric_num" value="<?php echo $editing['student_matric_num']; ?>">
			                                <input type="hidden" name="session_id" value="<?php echo $editing['session_id']; ?>">
			                                <input type="hidden" name="course_code" value="<?php echo $editing['course_code']; ?>">
			                            </table>
			                           	<div class="col-sm-12" align="center">
			                                <div class="md-form-group">
			                                    
			                                    <button type="submit" name="update" class="btn btn-success">UPDATE STUDENT RESULTS</button>
			                                </div>
			                            </div>
			                        <form>
			                    </div>
			                </div>
			            </div>
			        </div>    
			</div><?php       
		    include("../log-out-modal.php");
		    include("../table-footer.php");	
	?>
