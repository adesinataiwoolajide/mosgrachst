<?php 
	session_start();
	include("../../connection/connection.php");
	include("../../inc/admission-nav.php");
	include("../../inc/dev/admission-payments/admission-payments-class.php");
    $payment = new admissionPayments($db);
    include("../../mgchst-administrator/dev/general/all_purpose_class.php");
    $all_purpose = new all_purpose($db);
?>
<div class="tg-innerbanner">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ol class="tg-breadcrumb">
					<li><a href="./">Home</a></li>
					<li><a href="check-admission-payment.php">Payment Status</a></li>
					<li class="tg-active">Admission Payment Status</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<main id="tg-main" class="tg-main tg-haslayout">
	<div class="container">
		<div class="row">
			<div id="tg-twocolumns" class="tg-twocolumns">
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 pull-right">
					<div id="tg-content" class="tg-content">
						<?php
	                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
	                        <div class="alert alert-info" align="center">
	                            <button class="close" data-dismiss="alert">
	                                <i class="ace-icon fa fa-times"></i>
	                            </button>
	                         <?php include("../mgchst-administrator/includes/feed-back.php"); ?>
	                        </div><?php 
	                    }  ?>
						<div class="tg-addmission tg-addmissiondetail">
							<div class="col-md-12" align="center" style="margin-top: -50px;">
								<img src="../../images/form-logo.png" alt="../images/form-logo.png" style="width: 950px; height: ; ">
							</div>
							<div class="tg-pagetitle" style="margin-top: 15px;">
								<h2 align="center"><strong>
									<p style="color: green;">ADMISSION PAYMENT STATUS</p></strong>
								</h2>
							</div>
							<br><br>
							<div class="tg-container">
								<div class="col-md-12"><?php
									
				                    if(isset($_POST['check-payment'])){ 
				                    	$student_email = $_POST['student_email']; 
				                    	$transaction_number = $_POST['transaction_number'];
				                    	if($payment->checkStudentPaymentStatus($transaction_number, $student_email)){ 
				                    		$details =$payment->checkPaymentEmail($student_email);
				                    		
				                    		?>

				                    		<table class="table table-responsive table-bordered" style="">
												<tbody>
													<tr>
														<td><strong>Transaction Number</strong></td>
														<td><strong><?php echo $trans = $details['transaction_number']; ?></strong></td>
													</tr>
												</tbody>
												<tbody>
													<tr>
														<td><strong>Student E-Mail</strong></td>
														<td><strong><?php echo $stu = $details['student_email']; ?></strong></td>
													</tr>
												</tbody>
												<tbody>
													<tr>
														<td><strong>Bank Name</strong></td>
														<td><strong><?php echo $details['bank_name']; ?></strong></td>
													</tr>
												</tbody>
												<tbody>
													<tr>
														<td><strong>Payment Status</strong></td>
														<td><strong><?php $sta = $details['payment_status'];
															if($sta == 1){?>
																<p style="color: green;">Payment Confirmed
																<a href="select-your-course.php?transaction_number=<?php echo $trans; ?>&&student_email=<?php echo $stu;?>" class="btn btn-success">Fill Online Form</a></p><?php
															}else{ ?>
																<p style="color: red">Pending Payment</p><?php
															}?></strong>
														</td>
													</tr>
												</tbody>
														
											</table><?php
				                    	}else{
				                    		?>
											<h4><p align="center" style="color: red">No Payment Found for <?php echo $student_email; ?> <a href="./"> Return</a></p></h4>
											<?php
				                    	} ?>
									
										<?php
									}else{ ?>
										<script>
											window.location="./";
										</script><?php
									} ?>

								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 pull-left">
					<?php include("../../inc/sidebar.php"); ?>
				</div>
			</div>
		</div>
	</div>
</main>
		
<?php include("../../inc/footer.php"); ?>