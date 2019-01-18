<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
 //    require("../dev/registration/class_registration.php");
	// $register = new registration($db);
	$users = $_GET['user_name'];
	$details = $register->gettingUserDetails($users);
	$ima = $register->gettingPassportDetails($users);
	$name = $details['full_name'];
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
            <form action="update-user-details.php" method="post" class="form-horizontal" enctype="multipart/form-data">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><strong>User Biodata </strong> Update Form</h3>
	                    
	                </div>
	                <div class="panel-body">
	                    <p align="center" style="color: green">Please fill the below form to add update <?php echo $name; ?>Details</p>
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
			        <div class="col-md-2" align="right">
                		<div class="panel-body profile" style="background: url('<?php echo "../staffimages/". $ima['passport_url']; ?>') center center no-repeat;">
		                    <div class="profile-image">
		                        <img src="<?php echo "../staffimages/". $ima['passport_url']; ?>" alt="<?php echo $users; ?>" style="width: 100px; height: 100px;"/>
		                    </div>
		                                           
		                </div>   
                	</div>
	                <div class="panel-body form-group-separated"> 

	                	<div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-6 control-label">Change Passport</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-calendar-o"></span></span>
	                                <input type="file" class="form-control email" name="image" placeholder="Please Enter the Username" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                         <label class="col-md-1 col-xs-6 control-label">Full Name</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-smile-o"></span></span>
	                                <input type="text" class="form-control" name="full_name" placeholder="Please enter the Staff Surname, Middle Name, then Lastname" required minlength="10" value="<?php echo $name; ?>" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                    </div>
	                    <div class="form-group col-md-12">
	                    	<label class="col-md-1 col-xs-6 control-label">User Type</label>
	                        <div class="col-md-5 col-xs-6">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-bars"></span></span>
	                                <select class="form-control " name="access" required><?php
	                                	$access = $details['access_level'];  ?>
                                        <option value="<?php echo $access; ?>">
                                        	<?php if(($access == 1) OR ($access ==11)){ 
											echo "Super Administrator";
											}elseif($access == 2){echo "Bursery";
											}elseif($access == 3){echo "Head of Dept";
											}elseif($access == 4){echo "Lecturer";
											}elseif($access == 5){echo "Admission Officer";
											}elseif($access ==6){echo "Exam Officer";
											}else{echo "Invalid User";
											} ?>
                                        </option>
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
	                                <input type="email" class="form-control email" name="staff_email" placeholder="Please Enter the Username" required value="<?php echo $users ?>" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>
	                        <label class="col-md-1 col-xs-12 control-label">Password</label>
	                        <div class="col-md-11 col-xs-12">                                            
	                            <div class="input-group">
	                                <span class="input-group-addon"><span class="fa fa-key"></span></span>
	                                <input type="password" class="form-control" name="password" placeholder="Please enter the User Password" required minlength="4" />
	                            </div>                                            
	                            <span class="help-block" style="color: red;">This is field is Required.</span>
	                        </div>  
	                        
	                    </div>
	                    <input type="hidden" name="user_id" value="<?php echo $details['user_id']; ?>">
	                    <input type="hidden" name="pass_id" value="<?php echo $ima['pass_id']; ?>">
	                    <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

	                <div class="panel-footer">                                 
	                    <button class="btn btn-success pull-right" name="update_details">UPDATE USER DETAILS</button>
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