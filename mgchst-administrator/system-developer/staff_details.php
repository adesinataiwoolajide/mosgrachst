<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
    $staff_details = new schoolStaffs($db);

    $staff_number = $_GET['staff_number'];
    $staff_email = $_GET['staff_email'];
    $details = $staff_details->gettingStafftDetails($staff_number);
    $ima = $staff_details->gettingStaffPassports($staff_email);

?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="add-staff-biodata.php">Add Staff</a></li>  
    <li><a href="view-all-school-staff.php">View All Staffs</p></a></li>  
    <li><a href="staff_details.php?staff_number=<?php echo $staff_number?>&&staff_email=<?php echo $staff_email ?>">View Details</p></a></li>  
    <li><a href="edit-staff-details.php?staff_number=<?php echo $staff_number?>&&staff_email=<?php echo $staff_email ?>">Edit Details</p></a></li>  
    <li class="active"></li>   
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
        <div class="col-md-3">
            
            <div class="panel panel-default">
                <div class="panel-body profile" style="background: url('<?php echo "../staffimages/". $ima['passport_url']; ?>') center center no-repeat;">
                    <div class="profile-image">
                        <img src="<?php echo "../staffimages/". $ima['passport_url']; ?>" alt="<?php echo $staff_number; ?>" style="width: 100px; height: 100px;"/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name" style="color: black">
                        	<?php echo $details['staff_name']; ?>
                        </div>
                        <div class="profile-data-title" style="color: black;">
                        	<?php echo $staff_number; ?>	
                        </div>
                    </div>                                 
                </div>                                
                <div class="panel-body">                                    
                    <div class="row" align="center">
                        STAFF PANEL
                    </div>
                </div>
                <div class="panel-body list-group border-bottom">
                    <a href="" class="list-group-item active"><span class="fa fa-bar-chart-o"></span> </a>
                    <a href="" class="list-group-item"><span class="fa fa-cogs"></span> Projects <span class="badge badge-default">18</span></a>                                
                    <a href="" class="list-group-item"><span class="fa fa-book"></span> Book <span class="badge badge-danger">+7</span></a>
                    <a href="" class="list-group-item"><span class="fa fa-cloud"></span> Activities</a>
                    <a href="" class="list-group-item"><span class="fa fa-envelope"></span> Message</a>
                </div>
                
            </div>                            
            
        </div>
        
        <div class="row">
        	<div class="col-md-9"> 
	            <div class="panel panel-default">
	                <table id="customers2" class="table datatable">
	                    <div class="panel-body">
	                    	<table id="customers2" class="table datatable">
	                    		
	                    		<tbody>
	                    			<tr>
	                    				<td>Staff Name</td>
	                    				<td><?php echo $details['staff_name']; ?></td>
	                    			</tr>
	                    		</tbody>
	                    		
	                    		<tbody>
	                    			<tr>
	                    				<td>Staff Number</td>
	                    				<td><?php echo $details['staff_number'] ?></td>
	                    			</tr>
	                    		</tbody>
	                    		<tbody>
	                    			<tr>
	                    				<td>Staff Sex</td>
	                    				<td><?php echo $details['sex']; ?></td>
	                    			</tr>
	                    		</tbody>
	                    		<tbody>
	                    			<tr>
	                    				<td>Staff Phone</td>
	                    				<td><?php echo $details['staff_phone']; ?></td>
	                    			</tr>
	                    		</tbody>
	                    		<tbody>
	                    			<tr>
	                    				<td>Staff E-Mail</td>
	                    				<td><?php
	                    					echo $staff_email = $details['staff_email']; ?>
                                           
			                            </td>
	                    			</tr>
	                    		</tbody>
	                    		
	                    		<tbody>
	                    			<tr>
	                    				<td>Date of Birth</td>
	                    				<td><?php echo $details['birth_date']; ?></td>
	                    			</tr>
	                    		</tbody>
	                    		<tbody>
	                    			<tr>
	                    				<td>Religion</td>
	                    				<td><?php echo $details['religion']; ?></td>
	                    			</tr>
	                    		</tbody>
	                    		<tbody>
	                    			<tr>
	                    				<td>Staff Type</td>
	                    				<td><?php 
	                    					$type_id = $details['staff_type']; 
                                            if($type_id == 1){
                                                echo "Super Admin";
                                            }elseif($type_id ==2){
                                                echo "Burser";
                                            }elseif($type_id == 3){
                                                echo "Head of Dept";
                                            }elseif($type_id == 4){
                                                echo "Lecturer";
                                            }elseif ($type_id == 5) {
                                                echo "Admission Officer";
                                            }elseif ($type_id == 6){
                                                echo "Exam Officer";
                                            }else{
                                                echo "Invalid User";
                                            }?>
	                    				</td>
	                    			</tr>
	                    		</tbody>
	                    		<tbody>
	                    			<tr>
	                    				<td>Staff Address</td>
	                    				<td><?php echo $details['address']; ?></td>	
	                    			</tr>
	                    		</tbody>
	                    		<tbody>
	                    			<tr>
	                    				<td>Department</td>
	                    				<td><?php  
                                            echo $dept = $details['dept_id'];
                                            $dept_id=explode(",", $dept);
                                            // $oya =$department->getDepartmentDetails($dept_id); 
                                            // foreach ($oya as $key) {
                                            //     echo $key;
                                            // }  ?>    
                                        </td>	
	                    			</tr>
	                    		</tbody>
	                    		<tbody>
	                    			<tr>
	                    				<td>Marital Status</td>
	                    				<td><?php echo $details['marital_status']; ?></td>	
	                    			</tr>
	                    		</tbody>
	                    		<tbody>
	                    			<tr>
	                    				<td>Staff Qualification</td>
	                    				<td><?php 
	                    					$ema = $details['qualification_id'];
											$split = explode(",", $ema);
											foreach($split as $new){
												$qualif = $db->prepare("SELECT * FROM staff_qualification WHERE qualification_id=:new");
												$arr = array(':new'=>$new);
												$qualif->execute($arr);
												while($bring = $qualif->fetch()){
													echo $bring['qualification_name']. ", ";
												}
											} ?>	
										</td>
	                    			</tr>
	                    		</tbody>
	                    	</table>                       
	                        <div class="panel-footer col-md-12">                                 
			                    <a href="edit-staff-details.php?staff_number=<?php echo $details['staff_number']; ?>&&staff_email=<?php echo $details['staff_email'];?>" class="btn btn-success pull-right">EDIT STAFF DETAILS</a>
			                </div>
	                    </div>
	                </table>                                    
	            </div>
	        </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12"> 
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $details['staff_name']; ?></h3>
                        <?php include("../table-modal.php"); ?>
                    </div>
                    <div class="panel-body">
                        <table id="customers2" class="table datatable"><?php
                        $de=$db->prepare("SELECT * FROM activity WHERE user_details=:staff_email ORDER BY act_id DESC"); 
                        $dev = array(':staff_email'=>$staff_email);
                        $de->execute($dev); 
                        if($de->rowCount()==0){ ?>
                            <p style="color: red;" align="center"><h3 align="center">No Recent Activities Found for <?php echo $details['staff_name']; ?>. </h3></p><?php
                        }else{ ?>
                            <table id="customers2" class="table datatable">
                                <thead align="center">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Action</th>
                                        <th>Staff Details</th> 
                                        <th>Action Time</th> 
                                    </tr>
                                </thead>
                                <tfoot align="center">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Action</th>
                                        <th>Staff Details</th> 
                                        <th>Action Time</th> 
                                    </tr>
                                </tfoot>
                                <tbody><?php
                                    $y =1;
                                    while($row = $de->fetch()){ ?>
                                        <tr>
                                            <td><?php echo $y; ?></td>
                                            <td><?php echo $row['action']; ?></td>
                                            <td><?php echo $row['user_details']; ?></td>
                                            <td><?php echo $row['time_added']; ?></td>
                                        </tr><?php
                                        $y++;
                                    } ?> 
                                </tbody>
                            </table><?php
                        } ?>    
                    </div>                                  
	            </div>
	        </div>
	    </div> -->
	    <div class="col-md-12"> 
            <div class="panel panel-default"><?php
                
                $de=$db->prepare("SELECT * FROM activity WHERE user_details=:staff_email ORDER BY act_id DESC"); 
                $dev = array(':staff_email'=>$staff_email);
                $de->execute($dev); 
                if($de->rowCount()==0){ ?>
                    <h3 align=""><p style="color: red;" align="center">No Recent Activities Found for <?php echo $details['staff_name']; ?>. </p></h3><?php
                }else{ ?>
                	<div class="panel-heading">
	                <h3 class="panel-title"><?php echo $details['staff_name']; ?></h3>
	                    <?php include("../table-modal.php"); ?>
	                </div>
	                <div class="panel-body">
                        <table id="customers2" class="table datatable">
                            <thead align="center">
                                <tr>
                                    <th>S/N</th>
                                    <th>Action</th>
                                    <th>Staff Details</th> 
                                    <th>Action Time</th> 
                                </tr>
                            </thead>
                            <tfoot align="center">
                                <tr>
                                    <th>S/N</th>
                                    <th>Action</th>
                                    <th>Staff Details</th> 
                                    <th>Action Time</th> 
                                </tr>
                            </tfoot>
                            <tbody><?php
                                $y =1;
                                while($row = $de->fetch()){ ?>
                                    <tr>
                                        <td><?php echo $y; ?></td>
                                        <td><?php echo $row['action']; ?></td>
                                        <td><?php echo $row['user_details']; ?></td>
                                        <td><?php echo $row['time_added']; ?></td>
                                    </tr><?php
                                    $y++;
                                } ?> 
                            </tbody>
                        </table>
                    </div>                                  
	        		<?php
	            } ?> 
	        </div>         
	    </div>
	</div>
<?php
    include("../log-out-modal.php");
	include("../table-footer.php");
?>
