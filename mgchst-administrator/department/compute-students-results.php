<?php
	
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../dev/general/all_purpose_class.php");
    $all_purpose = new all_purpose($db);
	$course_code = $_GET['course_code'];
	$session_id = $_GET['session_identification'];
		

		$detail = $db->prepare("SELECT * FROM course_registration WHERE course_code=:course_code AND session_id=:session_id ORDER BY student_matric_num ASC");
		$ars = array(':course_code'=>$course_code, ':session_id'=>$session_id); 
        $detail->execute($ars); 
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
		        
		        <li><a href="compute-students-results.php?course_code=<?php echo $course_code ?>&&session_identification=<?php echo $session_id; ?>">Compute Result</a></li> 
		        <li><a href="student-results.php?course_code=<?php echo $course_code ?>&&session_identification=<?php echo $session_id; ?>">View Results</a></li> 
		        <li><a href="our-departmental-courses.php">View <?php echo $dept_name ?> Courses</a></li> 
		        <li class="active">Compute Result</li>    
		    </ul> 
		</ul><?php
		if($detail->rowCount()==0){ ?>
        	<div class="panel panel-default">
	        	<div class="panel-heading"><?php
	        	$tit = $delo['course_title'];
				$_SESSION['error'] = "No Students Registered for $tit  For $session_id  Academic Session " ?>  
				   <script>
						window.location=("our-departmental-courses.php") 
					</script> 
					                    
				</div>
			</h3>
           <?php
        }else{ ?>
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
			                        <h3 class="panel-title"><?php echo $delo['course_title']; ?> Result Panel</h3>
			                        <?php include("../table-modal.php"); ?>
			                    </div>
			                    <div class="panel-body">
			                        <form action="process-student-resuts.php" method="post" class="form-horizontal" enctype="multipart/form-data">
			                            <table id="customers2" class="table datatable">
			                                
			                                <thead align="center">
			                                    <tr>
			                                        <th>S/N</th>
			                                        <th>Matric Number</th>
			                                        <th>Course Code</th>
			                                        <th>Test</th> 
			                                        <th>Exam</th> 
			                                        <th>Operation</th>
			                                    </tr>
			                                </thead>
			                                <tfoot align="center">
			                                    <tr>
			                              			<th>S/N</th>
			                                        <th>Matric Number</th>
			                                        <th>Course Code</th>
			                                        <th>Test</th> 
			                                        <th>Exam</th> 
			                                        <th>Operation</th>
			                                    </tr>
			                                </tfoot>

			                                <tbody>
			                                	<?php
			                                    $y =1;

			                                    while($row = $detail->fetch()){ ?>
			                                        <tr>
			                                            
			                                            <td><?php echo $y; ?></td>
			                                            <td><?php echo $student_matric_num=$row['student_matric_num']; ?></td>
			                                            <td><?php echo $course_code = $row['course_code']; ?></td>
			                                            <td><input type="number" name="test_score<?php echo $y; ?>" class="form-control" placeholder="Please Enter The Test Score">
			                                            </td>
			                                            <td><input type="number" name="exam_score<?php echo $y; ?>" class="form-control" placeholder="Please Enter The Exam Score">
			                                            </td>
			                                            <td><input type="checkbox" name="confirm<?php echo $y; ?>" value="1">Confirm
			                                            </td>
			                                            <input type="hidden" name="student_matric_num<?php echo $y; ?>" value="<?php echo $row['student_matric_num']; ?>">

				                                        <input type="hidden" name="level_id<?php echo $y; ?>" value="<?php echo $row['level_id']; ?>">

				                                        <input type="hidden" name="prog_id<?php echo $y; ?>" value="<?php echo $row['prog_id']; ?>">

				                                        <input type="hidden" name="dept_id<?php echo $y; ?>" value="<?php echo $row['dept_id']; ?>">

				                                        <input type="hidden" name="session_id" value="<?php echo $row['session_id']; ?>">

				                                        <input type="hidden" name="course_code" value="<?php echo $course_code ?>">
			                                        </tr><?php
			                                        $y++;
			                                    } ?> 
			                                </tbody>
			                                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
			                            </table>
			                           	<div class="col-sm-12" align="center">
			                                <div class="md-form-group">
			                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
			                                    <button type="submit"  class="btn btn-success">COMPUTE STUDENTS RESULTS</button>
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
		}
	?>
