<?php 
	session_start();
	include("../../connection/connection.php");
	$school_name = $_GET['school_name'];
    $school_id= $_GET['school_identification'];
    if($school_id ==2){
		$title =  "AFRIFORD UNIVERSITY";
	}else{
		$title = "MOSES & GRACE COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY";
	}
	include("../../inc/admission-nav.php");
	include("../../inc/dev/admission-payments/admission-payments-class.php");
    $payment = new admissionPayments($db);
	$transaction_number = $_GET['transaction_number'];
	$student_email = $_GET['student_email']; 
	$regNumber = $_GET['registration_number'];
	$details = $payment->checkPaymentStatus($transaction_number, $student_email);
	 ?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    	<li><a href="admission-payment-slip.php?school_name=<?php echo $school_name?>&&transaction_number=<?php echo $transaction_number?>&&student_email=<?php echo $student_email?>&&registration_number=<?php echo $regNumber?>&&school_identification=<?php echo $school_id?>">PAYMENT SLIP</a></li>
                    	<li><a href="admission-payments.php?school_name=<?php echo $school_name?>&&student_email=<?php echo $student_email ?>&&registration_number=<?php echo $regNumber?>&&school_identification=<?php echo $school_id?>">MAKE PAYMENT</a></li>
                    	<li><a href="print-registration-form.php?school_name=<?php echo $school_name ?>&&registration_number=<?php echo $regNumber ?>&&registration_email=<?php echo $student_email ?>&&school_identification=<?php echo $school_id ?>">PRINT YOUR DETAILS</a></li>
						<li><a href="preview-your-details.php?school_name=<?php echo $school_name ?>&&registration_number=<?php echo $regNumber ?>&&registration_email=<?php echo $student_email ?>&&school_identification=<?php echo $school_id ?>">PREVIEW YOUR DETAILS</a></li>
	                        <li class="active"><i class="fa fa-dashboard white-text"></i> ADMISSION PAYMENT SLIP</li>
						
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<main id="tg-main" class="tg-main tg-haslayout">
	<div class="container">
		<div class="row">
			<!-- <div class="col-md-12" align="center" style="margin-top: -1px; ">
				<?php
				if($school_id ==1){ ?>
                    <img src="../../images/form-logo.png" alt="Moses And Grace " style="width: 950px; height: ; "> <?php
                }else{ ?>
                    <img src="../../images/afriweblogo.jpg" alt="Afriford University" style="width: 950px; height: ; "><?php
                }  ?>   
			</div> -->
			<div id="tg-twocolumns" class="tg-twocolumns">
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 pull-right">
					<div id="tg-content" class="tg-content">
						<?php
	                    if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
	                        <div class="alert alert-info" align="center">
	                            <button class="close" data-dismiss="alert">
	                                <i class="ace-icon fa fa-times"></i>
	                            </button>
	                         <?php include("../../mgchst-administrator/includes/feed-back.php"); ?>
	                        </div><?php 
	                    }  ?>
						<div class="tg-addmission tg-addmissiondetail">
							
							<div class="tg-pagetitle" style="margin-top: 15px;">
								<h2 align="center"><strong>
									<p style="color: green;">ADMISSION PAYMENT SLIP</p></strong>
								</h2>
							</div>
							<br><br>
							<div class="tg-container">
								<div class="col-md-12">
									
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
												<td><strong>Amount</strong></td>
												<td><strong><?php echo "#". $details['amount']; ?></strong></td>
											</tr>
										</tbody>
										<tbody>
											<tr>
												<td><strong>Payment Status</strong></td>
												<td><strong><?php $sta = $details['payment_status'];
													if($sta == 1){?>
														<p style="color: green;">Payment Confirmed, You Admission is Under Processing.............
														</p>
														<p style="color: red;">BUT THIS DOES NOT GUARANTEE YOUR ADMISSION</p><?php
													}else{ ?>
														<p style="color: red">Pending Payment</p><?php
													}?></strong>
												</td>
											</tr>
										</tbody>
												
									</table>

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