<?php
	session_start();
	require("../../connection/connection.php");
    include("../dev/general/all_purpose_class.php");
    include("../../inc/dev/admission-payments/admission-payments-class.php");
    $admin = new admissionPayments($db);
    $all_purpose = new all_purpose($db);

    try{
    	if($_POST){
			$y = $_POST["show"];
			$email = $_SESSION['user_name'];
			for($i = 1; $i <= $y; $i++){
				$transaction_number = $_POST["transaction_number$i"];
				$student_email = $_POST["student_email$i"];
				$grant = $_POST["topping$i"];
				$status = 1;
				if($grant ==1){
					if(!empty($admin->updateAdmissionPayment($transaction_number, $status))){
						$action ="Confirmed Admission Payments for $student_email and Transaction Number $transaction_number";
						$his = $all_purpose->getUserDetailsandAddActivity($email, $action);

					}else{
						$_SESSION['error'] = "Unable to Confirm the Selected Payments at the Moment, Please try again later";
						$all_purpose->redirect("confirm-admission-payments.php");
					}
				}
			}
			$_SESSION['success'] = "You Have Confirmed The Selected Payment Successfully";
			$all_purpose->redirect("admission-payments-lists.php");
	    }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("confirm-admission-payments.php");
    }

?>