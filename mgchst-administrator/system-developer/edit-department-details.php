<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("../super-admin/libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
    $department_name = $_GET['department_name'];
    $identification = $_GET['identification'];
    $dept_id = $identification;
    $details = $department->getDepartmentDetails($dept_id);
    
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-department.php">Add Department</a></li>  
    <li><a href="view-all-departments.php">View All Departments</p></a></li>  
    <li><a href="edit-department-details.php?department_name=<?php echo $department_name; ?>&&department_programme=<?php echo $department_programme?>&&identification=<?php echo $identification ?>">Edit Department</p></a></li>  
    <li class="active"></li>   
</ul>
<!-- END BREADCRUMB -->                       
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row">
        <div class="col-md-12"> 
            <form action="update-department-details.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Department </strong> Update Form</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p align="center" style="color: green">Please fill the below form to update <?php echo $department_name ?> Department Details</p>
	                </div>
	                <?php
			        if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
			            <div class="alert alert-info" align="center">
			                <button class="close" data-dismiss="alert">
			                    <i class="ace-icon fa fa-times"></i>
			                </button>
			             <?php include("../includes/feed-back.php"); ?>
			            </div><?php 
			        }  ?> 
	                <div class="panel-body form-group-separated">    
	                    <div class="form-group">
	                        <label class="col-md-2 col-xs-12 control-label">DEPARTMENT NAME</label>
	                        <div class="col-md-9 col-xs-12">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-building"></span></span>
	                                <input type="text" class="form-control" name="name" placeholder="Please Enter The Department Name" required value="<?php echo $details['dept_name'] ?>" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label class="col-md-2 col-xs-12 control-label">Department Abbr</label>
	                        <div class="col-md-9 col-xs-10">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-building"></span></span>
	                                <input type="text" class="form-control" maxlength="3" name="abv_name" placeholder="Please Enter The Department Abbrevation Name" value="<?php echo $details['dept_abv'];?> " required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>

	                    
	                   
	                </div>
	                <input type="hidden" name="dept_id" value="<?php echo $identification; ?>"><input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
	                <div class="panel-footer">                                 
	                    <button class="btn btn-success pull-right" name="adding-dept">UPDATE DEPARTMENT DETALS</button>
	                </div>
	            </div>
            </form>
        </div>
    </div>             
</div>        
        
<?php
    include("../log-out-modal.php");
	include("../footer.php");
?>