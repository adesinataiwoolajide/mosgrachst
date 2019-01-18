<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-department.php">Add Department</a></li>  
    
    <li><a href="view-all-departments.php">View All Departments</p></a></li>  
    <li class="active"></li>   
</ul>
<!-- END BREADCRUMB -->                       
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row">
        <div class="col-md-12"> 
            <form action="process-add-department.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Add A </strong> New Department</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p align="center" style="color: green">Please fill the below form to add a new department</p>
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
	                	<!--  -->  
	                    <div class="form-group">
	                        <label class="col-md-2 col-xs-12 control-label">Department Name</label>
	                        <div class="col-md-9 col-xs-10">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-building"></span></span>
	                                <input type="text" class="form-control" name="name" placeholder="Please Enter The Department Name" required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label class="col-md-2 col-xs-12 control-label">Department Abbr</label>
	                        <div class="col-md-9 col-xs-10">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-building"></span></span>
	                                <input type="text" class="form-control" maxlength="3" name="abv_name" placeholder="Please Enter The Department Abbrevation Name" required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                    </div>

	                </div>
	                <div class="panel-footer">                                 
	                    <button class="btn btn-success pull-right" name="adding-dept">ADD A NEW DEPARTMENT</button>
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