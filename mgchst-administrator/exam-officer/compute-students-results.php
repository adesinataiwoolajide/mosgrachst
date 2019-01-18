<?php
	
session_start();
include("../header.php");
include("../side-bar.php");
require("../super-admin/libs_dev/course/course_class.php");
include("../super-admin/libs_dev/department/department-class.php");
include("../super-admin/libs_dev/staffs/staff_class.php");
include("../dev/general/all_purpose_class.php");

try{
	$department = new schoolDepartment($db);
	$all_purpose = new all_purpose($db);
    $course = new addNewSchoolCourse($db);
    $department = new schoolDepartment($db);
    $deptCourse = new departmentalCourses($db);
	if(isset($_POST['compute-result'])){ 
		$course_code = $all_purpose->sanitizeInput($_POST['course_code']);
		$dept_id = $all_purpose->sanitizeInput($_POST['dept_name']);
		$session_id = $all_purpose->sanitizeInput($_POST['session_id']);
		$level_id = $all_purpose->sanitizeInput($_POST['level_id']);
		$prog_id = $all_purpose->sanitizeInput($_POST['prog_id']);
		$coding = $course->getCourseDetails($course_code);
		$detail = $db->prepare("SELECT * FROM course_registration WHERE course_code=:course_code AND session_id=:session_id AND dept_id=:dept_id AND level_id=:level_id AND prog_id=:prog_id  ORDER BY student_matric_num ASC");
		$ars = array(':course_code'=>$course_code, ':session_id'=>$session_id, ':dept_id'=>$dept_id, ':level_id'=>$level_id, ':prog_id'=>$prog_id); 
        $detail->execute($ars); 
		if($detail->rowCount()==0){ ?>
        	<div class="panel panel-default">
	        	<div class="panel-heading">
				   	<h3 align="center">
				   		<p style="color: red;" align="center">
				   			<?php $_SESSION['error'] = "No Students Registered This Course $course_code In The Selected Session and In The Selected Departmen, Level and Program"; ?>
				   			
				   		</p>   
				   </h3>
				   <script>
						window.location=("compute-course-result.php") ;
					</script>                      
					</div>
				</h3>
			</div>
           <?php
        }else{ ?>
        	
			<ul class="breadcrumb">
			   <ul class="breadcrumb">
			        <li><a href="./">Home</a></li> 

			        <li><a href="compute-course-result.php">Compute Restlt</a></li>      
			        <li><a href="result-decision.php">Result Panel</a></li> 

			        <li class="active">Compute <?php echo $coding['course_title'] ?>  Result</li>
			            
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
		                        <h3 class="panel-title"><?php echo $coding['course_title']; ?> Result Panel</h3>
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

			                                        <input type="hidden" name="dept_id<?php echo $y; ?>" value="<?php echo $dept_id; ?>">

			                                        <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">

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
	}else{
		$_SESSION['error'] = "Please Fill The Form Below To Compute Student Result";
	}
}catch(PDOException $e){
	$_SESSION['error'] = $e->getMessage(); ?>
	<script>
		window.location=("compute-course-result.php") 
	</script> <?php   
}
?>
