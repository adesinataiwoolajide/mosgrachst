<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    $session_id = $_GET['academic-session'];
    $session_name = $_GET['session_name'];
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li> 
    <li><a href="academic-sessions-exam-clearance.php?session_name=<?php echo $session_name ?>&&academic-session=<?php echo$session_id ?>">Academic Session Clearance</a></li>                   
    <li><a href="examination-clearance.php">Examination Clearance</a></li> 
      
    <li class="active">Confirm Exam Clearance</li>   
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
            $admit = $db->prepare("SELECT DISTINCT student_matric_num FROM student_result WHERE session_id=:session_id OR session_id=:session_name AND bursary_approval=0 ORDER BY prog_id ASC");
            $arrAdmit = array(':session_name'=>$session_name, ':session_id'=>$session_id);
            $admit->execute($arrAdmit);
            if($admit->rowCount()==0){ 
                $_SESSION['error'] = "No Result Found For Clearance in $session_name Academic Session";?>
                <script>window.location=("examination-clearance.php");</script>
                <?php
            }else{ ?>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Admission Payment List</h3>
                        <?php include("../table-modal.php"); ?>
                    </div>
                    <div class="panel-body">
                        <form action="process-academic-sessions-exam-clearance.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <table id="customers2" class="table datatable">
                            	<thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>MATRIC NUMBER</th>
                                        <th>PROGRAMME</th>
                                        <th>ACADEMIC SESSION</th>
                                        <th>OPERATION</th>
                                     </tr>  
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>MATRIC NUMBER</th>
                                        <th>PROGRAMME</th>
                                        <th>ACADEMIC SESSION</th>
                                        <th>OPERATION</th>
                                     </tr>  
                                </tfoot>
                                <tbody> <?php
                                    
                                    $y =1;
                                    while($see = $admit->fetch()){?>
                                        <tr>
                                            <td><?php echo $y; ?></td>
                                            <td><?php echo $student_matric_number = $see['student_matric_num']; ?></td>
                                            
                                            <td><?php  
                                                $prog_id = $see['prog_id']; 
                                                if($prog_id ==1){
                                                    echo "Degree FT";
                                                }elseif($prog_id ==2){
                                                    echo "Diploma";
                                                } else{
                                                    echo "Degree PT";
                                                }  ?>
                                            </td>
                                            <td><?php echo $session_name; ?></td>
                                            <td>
                                                <input type="checkbox" name="approve_result<?php echo $y; ?>"  value="1">
                                                Clear Student
                                            </td>
                                            <input type="hidden" name="result_id<?php echo $y; ?>" value="<?php echo $result_id; ?>">
                                            <input type="hidden" name="return" value="<?php echo $_SERVER['RETURN_URI']; ?>">
                                            <input type="hidden" name="student_matric_number<?php echo $y; ?>" value="<?php echo $student_matric_number; ?>">
                                            <input type="hidden" name="session_id" value="<?php echo $session_name ?>">
                                        </tr><?php 
                                        $y++;
                                    } ?>  
                                   
                                </tbody>
                            </table>
                            <div class="col-sm-12" align="center">
                                <div class="md-form-group">
                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
                                    <button type="submit" class="btn btn-success">CONFIRM THE STUDENTS CLEARANCE</button>
                                </div>
                            </div>
                        <form>
                    </div>
                </div><?php
            } ?>
        </div>
    </div>             
</div>  

<?php
    include("../log-out-modal.php");
	include("../table-footer.php");
?>
