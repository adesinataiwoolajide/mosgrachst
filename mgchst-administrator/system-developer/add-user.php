<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
 
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-user.php">Add User</a></li>  
    <li><a href="view-all-users.php">View All Users</p></a></li>  
    <li class="active"></li>   
</ul>
<!-- END BREADCRUMB -->                       
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row">
        <div class="col-md-12"> 
            <form action="process-add-user.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>Add A </strong> New User</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p align="center" style="color: green">Please fill the below form to add a new user</p>
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

	                	<div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-6 control-label">Passport</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span>
	                                <input type="file" class="form-control email" name="image" placeholder="Please Enter the Username" required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                         <label class="col-md-1 col-xs-6 control-label">Full Name</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-smile-o"></span></span>
	                                <input type="text" class="form-control" name="full_name" placeholder="Please enter the Staff Surname, Middle Name, then Lastname" required minlength="10" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                    </div>
	                    <div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-6 control-label">User Type</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control " name="access" required>
                                        <option value="">-- Select The User Type From The List --
                                        </option>
                                        <option value=""></option>
                                        <option value="1">Super Admin</option>
                                        <option value="2">Burser</option>
                                        <option value="3">Head of Dept</option>
                                        <option value="4">Lecturer</option>
                                        <option value="5">Admission Officer</option>
	                                    <option value="6">Exam Officer</option>
                                    </select>
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                    	<label class="col-md-1 col-xs-6 control-label">Username</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
	                                <input type="email" class="form-control email" name="staff_email" placeholder="Please Enter the Username" required />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                        <label class="col-md-1 col-xs-6 control-label">Password</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-key"></span></span>
	                                <input type="password" class="form-control" name="password" placeholder="Please enter the User Password" required minlength="4" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        <label class="col-md-1 col-xs-6 control-label">Repeat Password</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-key"></span></span>
	                                <input type="password" class="form-control" name="repeat" placeholder="Please Repeat the User Password" required minlength="4" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                    </div>

	                <div class="panel-footer">                                 
	                    <button class="btn btn-success pull-right" name="adding-user">ADD A NEW USER</button>
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