<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
?>
<ul class="breadcrumb">
    <li><a href="./">Home</a></li>                    
    <li><a href="confirm-admission-payments.php">Confirm Admission Payments</a></li> 
    <li><a href="pend-admission-payments.php">Pend Admission Payments</a></li>  
    <li><a href="admission-payments-lists.php">Verified Admission Payments</p></a></li>   
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
        <div class="col-md-12"> <?php 
            $admit = $db->prepare("SELECT * FROM admission_payment WHERE payment_status=1 ORDER BY pay_id ASC");
            $admit->execute();
            if($admit->rowCount()<1){ ?>
                <p align="center" style="color: red">No Payments Have Been Confirmed, Please Click on Confirm Payments to Confirm The New Payment.</p><?php
            }else{ ?>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Admission Payment List</h3>
                        <?php include("../table-modal.php"); ?>
                    </div>
                    <div class="panel-body">
                        <form action="process-admitted-student.php" method="post">
                            <table id="customers2" class="table datatable">
                            	<thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>TRANSACTION NUMBER</th>
                                        <th>BANK NAME</th>
                                        <th>TELLER NUMBER</th>
                                        <th>E-MAIL</th>
                                        <th>AMOUNT</th>
                                        <th>STATUS</th>
                                     </tr>  
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>TRANSACTION NUMBER</th>
                                        <th>BANK NAME</th>
                                        <th>TELLER NUMBER</th>
                                        <th>E-MAIL</th>
                                        <th>AMOUNT</th>
                                        <th>STATUS</th>
                                     </tr>  
                                </tfoot>
                                <tbody> <?php
                                    
                                    $y =1;
                                    while($see = $admit->fetch()){

                                        $transaction_number = $see['transaction_number'];
                                        $pay_id= $see['pay_id'];
                                       
                                        ?>
                                        <tr>
                                            <td><?php echo $y; ?></td>
                                            <td><?php echo $transaction_number; ?></td>
                                            <td><?php echo $see['bank_name']; ?></td>
                                            <td><?php echo $see['teller_number']; ?></td>
                                            
                                            <td><?php echo $ema= $see['student_email']; ?></td>
                                            <td><?php echo $see['amount']; ?></td>
                                            
                                            <td>
                                                <?php $sta = $see['payment_status'];
                                                    if($sta == 1){?>
                                                        <p style="color: green;">Payment Confirmed
                                                        </p><?php
                                                    }else{ ?>
                                                        <p style="color: red">Pending Payment</p><?php
                                                    }?>
                                            </td>
                                            
                                            
                                        </tr><?php $y++;
                                    } ?>  
                                   
                                </tbody>
                            </table>
                            
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
