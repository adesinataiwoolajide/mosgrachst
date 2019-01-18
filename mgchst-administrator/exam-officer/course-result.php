<?php
	
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require("../super-admin/libs_dev/course/course_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../lecturer/classes/results/result-class.php");
    include("../dev/general/all_purpose_class.php");
	
    $staff_email = $_SESSION['user_name'];
    $staff_details = new schoolStaffs($db);
    $staff = $staff_details->gettingStafftEmail($staff_email);
    $dept_id = $staff['dept_id'];
    $staff_number =$staff['staff_number'];
    $staff_name = $staff['staff_name'];
    $all_purpose = new all_purpose($db);
    
    $detail = $db->prepare("SELECT * FROM school_course ORDER BY course_title ASC");
	//$ars = array(':course_code'=>$course_code, ':session_id'=>$session_id); 
    $detail->execute(); 
	?>    
	<ul class="breadcrumb">
	   <ul class="breadcrumb">
	        <li><a href="./">Home</a></li>                    
	        <li><a href="course-result.php">Course Result Panel</a>
	        </li> 
		    <li><a href="view-all-students-results.php">View All Results</a></li> 
		        
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
		           			<p style="color: red" align="center">The School Course List is Empty</p>
		           		</div>
		           	</div><?php
		           	die();
	            }else{ ?>
	                <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h3 class="panel-title"></h3>
	                        <?php include("../table-modal.php"); ?>
	                    </div>
	                    <div class="panel-body">
	                        <form>
	                            <table id="customers2" class="table datatable">
	                                
	                                <thead align="center">
	                                    <tr>
	                                        <th>S/N</th>
	                                        <th>Course Code</th>
	                                        <th>Course Title</th> 
	                                        <th>Course Unit</th>
	                                        <th>Course Status</th>
	                                        <th>Academic Session</th>
	                                        <th>Operation</th>
	                                    </tr>
	                                </thead>
	                                <tfoot align="center">
	                                    <tr>
	                              			<th>S/N</th>
	                                        <th>Course Code</th>
	                                        <th>Course Title</th> 
	                                        <th>Course Unit</th>
	                                        <th>Course Status</th>
	                                        <th>Academic Session</th>
	                                        <th>Operation</th>
	                                    </tr>
	                                </tfoot>

	                                <tbody><?php
	                                    $y =1;
	                                    while($see_result = $detail->fetch()){ 
	                                    	$course_id = $see_result['course_id'];?>
	                                    	<tr>
			                                    <td><?php echo $y; ?></td>
			                                   	<td><?php echo $course_code = $see_result['course_code']; ?></td>
			                                   	<td><?php echo $title= $see_result['course_title']; ?></td>
			                                   	<td><?php echo $see_result['course_unit']; ?></td>
			                                   	<td><?php echo $see_result['course_status']; ?></td>
			                                   	<td>
			                                   		<select class="form-control" name="session_id">
			                                   			<option value=""> -- Select The Academic Session --</option>
			                                   			<option value=""></option><?php
			                                   			$ses = $db->prepare("SELECT * FROM session ORDER BY session_name ASC");
			                                   			$ses->execute();
			                                   			while($see_ses = $ses->fetch()){ ?>
			                                   				<option value="<?php echo $see_ses['session_name']; ?>">
			                                   					<?php echo $see_ses['session_name']; ?>		
			                                   				</option><?php
				                                   		} ?>
			                                   		</select>
			                                   	</td>
			                                    <td><a href="compute-multiple-result.php?course_title=<?php echo $title?>&&course_code=<?php echo $course_code ?>" name="" class="btn btn-warning" onclick="return(confirmToEdit());"><i class="glyphicon glyphicon-pencil"></i>COMPUTE RESULT</a></td>
			                                </tr><?php
		                                    $y++;
		                                } ?>
	                                </tbody>
	                                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
	                                
	                            </table>
	                        </form>
	                    </div>
	                </div><?php
	            } ?>
	        </div>    
	</div>
	<script>
    function confirmToEdit(){
        return confirm("Click okay to Compute Student Result and Cancel to Stop");
    }
</script>  <?php       
    include("../log-out-modal.php");
    include("../table-footer.php");	
?>
