<?php
	class admissionPayments{
		private $db;
		function __construct($db){
			$this->db = $db;
		}

		public function generateTransactionNumber($length = 7) {
			$lel = "0319960";
		    $characters = $lel;
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		public function checkDuplicateReciept($teller_number, $student_email){
			try{
				$check = $this->db->prepare("SELECT * FROM admission_payment WHERE teller_number=:teller_number AND student_email=:student_email");
				$arrCheck = array(':teller_number'=>$teller_number, ':student_email'=>$student_email);
				$check->execute($arrCheck);
				if($check->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function insertAdmissionPayment($amount, $bank_name, $teller_number, $student_email, $transaction_number, $payment_status){
			try{
				$insert = $this->db->prepare("INSERT INTO admission_payment(amount, bank_name, teller_number, student_email, transaction_number, payment_status)VALUES(:amount, :bank_name, :teller_number, :student_email, :transaction_number, :payment_status)");
				$insertArr = array(':amount'=>$amount, ':bank_name'=>$bank_name, ':teller_number'=>$teller_number, ':student_email'=>$student_email, ':transaction_number'=>$transaction_number, ':payment_status'=>$payment_status);
				if(!empty($insert->execute($insertArr))){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkStudentPaymentStatus($transaction_number, $student_email){
			try{
				$stat = $this->db->prepare("SELECT * FROM admission_payment WHERE student_email=:student_email AND transaction_number=:transaction_number");
				$arrStat = array(':student_email'=>$student_email, ':transaction_number'=>$transaction_number);
				$stat->execute($arrStat);
				if($stat->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkPaymentStatus($transaction_number, $student_email){
			try{
				$status = $this->db->prepare("SELECT * FROM admission_payment WHERE student_email=:student_email AND transaction_number=:transaction_number");
				$arrStatus = array(':student_email'=>$student_email, ':transaction_number'=>$transaction_number);
				$status->execute($arrStatus);
				$see = $status->fetch();
				return $see;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkPaymentEmail($student_email){
			try{
				$status = $this->db->prepare("SELECT * FROM admission_payment WHERE student_email=:student_email");
				$arrStatus = array(':student_email'=>$student_email);
				$status->execute($arrStatus);
				$see = $status->fetch();
				return $see;
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function checkPaymentEmailStatus($student_email){
			try{
				$status = $this->db->prepare("SELECT * FROM admission_payment WHERE student_email=:student_email");
				$arrStatus = array(':student_email'=>$student_email);
				$status->execute($arrStatus);
				if($status->rowCount()>0){
					return true;
				}else{
					return false;
				}
			}catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function updateAdmissionPayment($transaction_number, $status){
			try {
				$update = $this->db->prepare("UPDATE admission_payment SET payment_status=:status WHERE transaction_number=:transaction_number");
				$arrUpdate = array(':transaction_number'=>$transaction_number, ':status'=>$status);
				if(!empty($update->execute($arrUpdate))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}

		public function disUpdateAdmissionPayment($transaction_number, $status){
			try {
				$disupdate = $this->db->prepare("UPDATE admission_payment SET payment_status=:status WHERE transaction_number=:transaction_number");
				$arrDisUpdate = array(':transaction_number'=>$transaction_number, ':status'=>$status);
				if(!empty($disupdate->execute($arrDisUpdate))){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				return false;
			}
		}
	}
?>