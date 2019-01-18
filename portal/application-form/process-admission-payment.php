<?php 
	session_start();
	require("../../connection/connection.php");
    include("../../inc/dev/admission-payments/admission-payments-class.php");
    include("../../mgchst-administrator/dev/general/all_purpose_class.php");
    
    try{
    	$payment = new admissionPayments($db);
    	$all_purpose = new all_purpose($db);
    	if(isset($_POST['add-payment'])){
    		$transaction_number = $payment->generateTransactionNumber();
    		$bank_name = $all_purpose->sanitizeInput($_POST['bank_name']);
			$teller_number = $all_purpose->sanitizeInput($_POST['teller_number']);
			$student_email = $_POST['student_email'];
			$amount = $all_purpose->sanitizeInput($_POST['amount']);
			$payment_status = 0;
            $amount = 5000;
            $regNumber= $_POST['regNumber'];
            $school_name = $_POST['school_name'];
            $school_id = $_POST['school_id'];

            if($payment->checkDuplicateReciept($teller_number, $student_email)){
    			$conc = $payment->checkPaymentEmail($student_email);
    			$number = $conc['transaction_number'];
    			$_SESSION['error'] = "You Have Submitted Your Payment Details Before.And Your Transaction Number is $number.<br> Please Kindly Wait For Sometime While We Confirm Your Payment From The Bank. <br>We Are Very Sorry ForThe Delay. Please Write Out Your Transaction Number for Refrence Purposes or Print Out This Page";
    			$all_purpose->redirect("admission-payment-slip.php?school_name=$school_name&&transaction_number=$number&&student_email=$student_email&&registration_number=$regNumber&&school_identification=$school_id");
    		}else{
    			if(!empty($payment->insertAdmissionPayment($amount, $bank_name, $teller_number, $student_email, $transaction_number, $payment_status))){
    				$_SESSION['success'] = "You Payment Details Was Recieved Successfully And Your Transaction Number is $transaction_number, Please Kindly Wait For Sometime While We Confirm Your Payment From The Bank, Please Write Out Your Transaction Number for Refrence Purposes or Print Out This Page";
    				$all_purpose->redirect("admission-payment-slip.php?school_name=$school_name&&transaction_number=$transaction_number&&student_email=$student_email&&registration_number=$regNumber&&school_identification=$school_id");
    			}else{
    				$_SESSION['error'] = "Unable to Process Your Payment Details at the Moment, Please Try Again Later";
    				$all_purpose->redirect("admission-payments.php?school_name=$school_name&&student_email=$student_email&&registration_number=$regNumber&&school_identification=$school_id");
    			}
    		}
    	}else{
    		$_SESSION['error'] = "Please Fill in Your Payment Details";
    		$all_purpose->redirect("admission-payments.php?school_name=$school_name&&student_email=$student_email&&registration_number=$regNumber&&school_identification=$school_id");
    	}
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("admission-payments.php?school_name=$school_name&&student_email=$student_email&&registration_number=$regNumber&&school_identification=$school_id");
    }

?>