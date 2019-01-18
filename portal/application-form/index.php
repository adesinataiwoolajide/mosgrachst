<?php 
	session_start();
	include("../../connection/connection.php");
	include("../../inc/admission-nav.php"); 
	include("../../mgchst-administrator/super-admin/libs_dev/department/department-class.php");
	include("../../inc/dev/admission-payments/admission-payments-class.php");
	include("../../mgchst-administrator/dev/general/all_purpose_class.php");
    
?>

<section class="inner-header divider layer-overlay overlay-theme-colored-7">
    <div class="container pt-120 pb-60">
        <div class="section-content">
            <div class="row"> 
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    	<li><a href="admission-guildlines.php"><i class="fa fa-dashboard white-text"></i> ADMISSION GUILDLINES</a></li>
                        <li><a href="./"><i class="fa fa-dashboard white-text"></i> HOME PAGE<a></li>
						
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
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
							
							<div class="tg-container" style="margin-top: 30px">
								<div class="col-md-12">
									<div class="tg-borderheading">
										<h2><p style="color: green;" align="center">PLEASE READ THE BELOW INFORMATION CAREFULLY</p></h1></h2>
										<hr>

								<div class="col-md-4" align="left">

									<img src="../../mgchst-administrator/icons/course=reg (9).png" style="width: 200px;">
									
								</div><br>
								<h4 align=""><b>Please Kindly make your Payment into the below Account Details. and Upload Your Teller number Below And wait for 1 Hour for the confirmation of your Payment and Proceed to Fill The Online Application Form.The Money Paid is Non Refundable.
								</b></h4><br>
								<h5><b><p style="color: ">Payment can also be done online via ATM/POS.</p></b></h5>
								<h5><b><p style="color: ;" align="">
									Bank Name: Diamond Bank plc.<br>
									Account Name: Moses & Grace College of Health Sciences and Technology.
									<br>
									Account Number:  0083824813 <br>
									Amount: #5000. <br></p></b>
								</h5>
								<h6 align="center">
									
								For Manual Payment Please Fill the bank teller in the payment format. </h6><br>
								<p style="color: red" align="center">Write Your Full Names at the top of the bank teller.</p>
								<div class="form-group col-md-12">
									Account Name:<input type="text" name="" class="form-control" readonly value="Moses & Grace College of Health Sciences and Technology.">
								</div>
								<div class="form-group col-md-12">
									Name: <input type="text" name="" class="form-control" readonly="" value="Your Application Number Or E-Mail Address">
								</div>
								<div class="form-group col-md-12">
									Amount Paid: <input type="text" name="" class="form-control" readonly="" value="Enter The Amount Paid i.e. #5000">
								</div>

								
								<br>	
							</div>
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