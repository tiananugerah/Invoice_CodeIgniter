<?php
date_default_timezone_set('Asia/Jakarta');

if(!function_exists('GetGlobalConnectionOptions')){
    include "phpgen_settings.php";
}


class SendSMS extends mysqli{
	protected $message = "Nsbh Adira Yth, per @dd/@mm/@yy kami blm menerima pembayaran ang ke @angsuran Anda PK @kontrak. Mhn segera lakukan pembayaran. Abaikan SMS ini jk sudah bayar. Tks";
	protected $url = "https://sms.smartme.co.id:43452/smsjson/?username=adminsmsolusi&password=S3lamatP4gi&sender=LONGNUMBER&msisdn=%s&message=%s";
	function __construct(){
        $conn = GetGlobalConnectionOptions();
        $pass = '';
        if(isset($conn['password'])){
            $pass = $conn['password'];
        }
        parent::__construct($conn['server'], $conn['username'], $pass, $conn['database']);
    }

   	public function exec($msisdn, $contract_number, $rowData){
   	    // if($rowData['result_handling'] != '04' || $rowData['result_handling'] != '05') return false;
   	    
   		$instance = $this->getInstance();
   		$query = "SELECT * FROM account where contract_no='{$contract_number}'";
   		$result = $instance->query($query);
   		$row = $result->fetch_assoc();
   		
   		if(($rowData['result_handling'] == '04' || $rowData['result_handling'] == '05') && $row['touch'] == 0){
   			$message = str_replace("@dd", date('d'), $this->message);
			$message = str_replace("@mm", date('m'), $message);
			$message = str_replace("@yy", date('y'), $message);
			$message = str_replace("@angsuran", $row['inst'], $message);
			$message = str_replace("@kontrak", $contract_number, $message);
			$message = urlencode($message);

			$url = sprintf($this->url, $msisdn, $message);

			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_USERAGENT=>"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36",
				CURLOPT_URL=>$url,
				CURLOPT_HEADER=>0,
				CURLOPT_RETURNTRANSFER=>1,
				CURLOPT_DNS_USE_GLOBAL_CACHE=>0,
				CURLOPT_DNS_CACHE_TIMEOUT=>2
			));

			$body = curl_exec($ch);
			if($body === false){
				echo curl_error($ch)."<br>";
			}
			curl_close($ch);

			return $body;
   		}

   		return false;
   	}

   	function getInstance(){
        return new self();
    }
}