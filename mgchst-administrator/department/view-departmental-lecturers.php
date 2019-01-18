<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    include("../super-admin/libs_dev/staffs/staff_class.php");
    include("../super-admin/libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
    $staff_details = new schoolStaffs($db);
    $staff_email = $_SESSION['user_name'];
    $staff = $staff_details->gettingStafftEmail($staff_email);
    $dept_id = $staff['dept_id'];
    $details = $department->getDepartmentDetails($dept_id);
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="view-departmental-lecturers.php">Departmental Lecturers</p></a></li>  
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
    <div class="panel panel-default"><?php
        $stu = $db->prepare("SELECT * FROM staff WHERE dept_id=:dept_id ORDER BY staff_name ASC");
        $arrStu = array(':dept_id'=>$dept_id);
        $stu->execute($arrStu);
        if($stu->rowCount()==0){ ?>
            <p style="color: red;" align="center">There are No Staff On <?php echo $details['dept_name']; ?> Staff List.
            </p><?php
        }else{ ?>
            </div>
            <div class="row">
                <div class="col-md-12"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $details['dept_name']; ?>Staff List</h3>
                            <?php include("../table-modal.php"); ?>
                        </div>
                        <div class="panel-body">
                            <table id="customers2" class="table datatable">
                                <thead>
                                    <th>S/N</th>
                                    <th>Passport</th>
                                    <th>Staff Name</th>
                                    <th>Staff Number</th>
                                    <th>Staff E-Mail</th>
                                    <th>Operation</th>
                                </thead>
                                <tfoot>
                                    <th>S/N</th>
                                    <th>Passport</th>
                                    <th>Staff Name</th>
                                    <th>Staff Number</th>
                                    <th>Staff E-Mail</th>
                                    <th>Operation</th>
                                </tfoot>
                                <tbody><?php
                                    $y =1;
                                    while($new = $stu->fetch()){ 
                                        $staff_number = $new['staff_number'];
                                        $staff_email = $new['staff_email'];
                                        $ima = $staff_details->gettingStaffPassports($staff_email);?><div class="col-md-3">
                                        <tr>
                                            <td><?php echo $y; ?></td>
                                            <td>  
                                                <div class="profile-image">
                                                    <img src="<?php echo "../staffimages/". $ima['passport_url']; ?>" style="width: 50px; height: 50px;" alt="<?php echo $new['staff_name']; ?>"/>
                                                </div>      
                                            </td>
                                            <td><?php echo $new['staff_name']; ?></td>
                                            <td><?php 
                                                 echo $staff_number ?>
                                            </td>
                                            <td><?php echo $new['staff_email']; ?>
                                            </td>
                                            <td>
                                                <a href="departmental_staff_details.php?staff_number=<?php echo $staff_number;?>&&staff_email=<?php echo $new['staff_email'];?>" class="btn btn-success pull-left"onclick=""><i class="glyphicon glyphicon-user"></i>More Details
                                                </a>
                                                
                                            </td>

                                        </tr><?php
                                        $y++;
                                    }?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <?php 
        } ?>          
</div>  

<?php
    include("../log-out-modal.php");
	include("../table-footer.php");
?>
