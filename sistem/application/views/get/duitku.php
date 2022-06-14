<?php
require_once("system/database.php");
		$apiKey = '03123db62b6f0ef72c604087d8d88b28'; // Your api key
		$merchantCode = isset($_POST['merchantCode']) ? $_POST['merchantCode'] : null; 
		$amount = isset($_POST['amount']) ? $_POST['amount'] : null; 
		$merchantOrderId = isset($_POST['merchantOrderId']) ? $_POST['merchantOrderId'] : null; 
		$productDetail = isset($_POST['productDetail']) ? $_POST['productDetail'] : null; 
		$additionalParam = isset($_POST['additionalParam']) ? $_POST['additionalParam'] : null; 
		$paymentMethod = isset($_POST['paymentCode']) ? $_POST['paymentCode'] : null; 
		$resultCode = isset($_POST['resultCode']) ? $_POST['resultCode'] : null; 
		$merchantUserId = isset($_POST['merchantUserId']) ? $_POST['merchantUserId'] : null; 
		$reference = isset($_POST['reference']) ? $_POST['reference'] : null; 
		$signature = isset($_POST['signature']) ? $_POST['signature'] : null; 

		if(!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature))
		{
			$params = $merchantCode . $amount . $merchantOrderId . $apiKey;
			$calcSignature = md5($params);

			if($signature == $calcSignature)
			{
			$check_depo    = $this->db->query("SELECT * FROM sr_invoice WHERE noreff='$reference' AND status ='Pending'");
            $rowdepo 	   = $check_depo->row_array();
            if($rowdepo == TRUE)
				{
							if ( $resultCode == 00) { 
							//Success
								$status = 'Success';
								$update         	= $this->db->query("UPDATE sr_invoice SET status = '$status' WHERE noreff = '$reference'");
								} elseif($resultCode == 01) {
							//Error
								$status = 'Error';
								$update = $this->db->query("UPDATE sr_invoice SET status = '$status' WHERE noreff = '$reference'");
							} 
					
					} else {
					exit("GADA YANG DEPO SEGITU CUI");
					//exit("ada nih");
				}
				echo "SUCCESS"; // Please response with success
			}
			else
			{
				//throw new Exception('Bad Signature');
				exit("Bad Signature");
			}
		}
		else
		{
		    //throw new Exception('Bad Parameter');
		    exit("Bad Parameter");
		}
		