<?php 
	include("../../inc/admission-nav.php");
	include("mgchst-administrator/super-admin/libs_dev/department/department-class.php");
    $department = new schoolDepartment($db);
?>

<div class="tg-innerbanner">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ol class="tg-breadcrumb">
					<li><a href="./">Home</a></li>
					<li><a href="upload-admission-payment.php">Admission Payment</a></li>
					<li class="tg-active"></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<main id="tg-main" class="tg-main tg-haslayout">
	<div class="container">
		<div class="row">
			<div id="tg-twocolumns" class="tg-twocolumns">
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
					<div id="tg-content" class="tg-content">
						<section class="tg-sectionspace tg-haslayout">
							<div class="tg-borderheading">
								<h1><p style="color: green;" align="center">HOW TO APPLY</p></h1>
								<div class="col-md-12" align="left">
									<img src="images/pay-logos.png" style="width: 250px;">
									<h5><strong><p style="color: green">Payment can also be done online via ATM/POS. and the following cards can be use </p></strong></h5>
								</div><br>
								<h4 align=""><strong>Please Kindly make your Payment into the below Account Details. <br>And Upload Your Teller number Below And wait for 1 Hour for the confirmation of your Payment and Proceed to Fill The Online Application Form. <br><p style="color: red">The Money Paid is Non Refundable.
								</p></strong></h4><br>
								<h5><strong><p style="color: green;" align="">
									Bank Name: Diamond Bank plc.<br>
									Account Name: Moses & Grace College of Health Sciences and Technology.
									<br>
									Account Number:  0083824813 <br>
									Amount: #5000. <br></p></strong>
								</h5>
								<h6>
									
								Please Fill the bank teller in the payment format. </h6><br>
								<p style="color: red" align="center">Write Your Full Names at the top of the bank teller.</p>
								<div class="form-group col-md-12">
									Account Name:<input type="text" name="" class="form-control" readonly value="Moses & Grace College of Health Sciences and Technology.">
								</div>
								<div class="form-group col-md-12">
									Name: <input type="text" name="" class="form-control" readonly="" value="Your E-Mail Address">
								</div>

								<div class="col-md-12" align="center">
									<a href="portal/admission-payments.php" class="tg-btn">CONTINUE REGISTRATION</a>
								</div>
								<br>	
							</div>
							
						</section>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<aside id="tg-sidebar" class="tg-sidebar">
								
						<div class="tg-widget tg-widgetadmissionform">
							<div class="tg-widgetcontent">
								<h3>Admission Form 2017</h3>
								<div class="tg-description">
									<p>Interested candidates can apply online or download the application form.</p>
								</div>
								<a class="tg-btn tg-btnicon" href="Application-form/mgchst-application-form.pdf">
									<i class="fa fa-file-pdf-o"></i>
									<span>Download PDF</span>
								</a>
							</div>
						</div>
						
						<div class="tg-widget tg-widgetsearchcourse">
							<div class="tg-widgettitle">
								<h3>Student Portal</h3>
							</div>
							<div class="tg-widgetcontent">
								<form class="tg-formtheme tg-formsearchcourse">
									<fieldset>
										<div class="tg-inputwithicon">
											<i class="icon-book"></i>
											<input type="text" name="txtusername" class="form-control" placeholder="Username">
										</div>
										<div class="tg-inputwithicon">
											<i class="icon-layers"></i>
											
											<input type="password" name="txtpassword" class="form-control" placeholder="Password">	
											
										</div>
										<button type="submit" class="tg-btn">Login</button>
										
									</fieldset>
								</form>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
</main>

<?php 
	include("inc/footer.php"); 
?>