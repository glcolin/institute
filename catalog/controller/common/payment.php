<?php

Class ControllerCommonPayment extends controller{

	function index(){
		
		//load model
		$this->load->model('common/onlinecourse');
		
		$this->data['categories'] = $this->model_common_onlinecourse->getCategories();
		
		if(isset($this->request->get['courseid']) and in_array($this->request->get['courseid'],array('1', '2', '3'))){
			$this->data['courseid'] = $this->request->get['courseid'];
		}else{
			$this->data['courseid'] = 0;
		}
		
		$this->template = 'common/payment.tpl';
		
		//render
		$this->children = array(	
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
	
	function paypal_ipn(){
	
		//reading raw POST data from input stream. reading pot data from $_POST may cause serialization issues since POST data may contain arrays
		$raw_post_data = file_get_contents('php://input');
		$raw_post_array = explode('&', $raw_post_data);
		$myPost = array();
		foreach ($raw_post_array as $keyval)
		{
		  $keyval = explode ('=', $keyval);
		  if (count($keyval) == 2)
			 $myPost[$keyval[0]] = urldecode($keyval[1]);
		}
		// read the post from PayPal system and add 'cmd'
		$req = 'cmd=_notify-validate';
		if(function_exists('get_magic_quotes_gpc'))
		{
		   $get_magic_quotes_exits = true;
		} 
		foreach ($myPost as $key => $value)
		{        
		   if($get_magic_quotes_exits == true && get_magic_quotes_gpc() == 1)
		   { 
				$value = urlencode(stripslashes($value)); 
		   }
		   else
		   {
				$value = urlencode($value);
		   }
		   $req .= "&$key=$value";
		}
		 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://www.paypal.com/cgi-bin/webscr');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: www.paypal.com'));
		// In wamp like environment where the root authority certificate doesn't comes in the bundle, you need
		// to download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path 
		// of the certificate as shown below.
		// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
		$res = curl_exec($ch);
		curl_close($ch);

		/*
		echo '<pre>';
		print_r($_POST);
		die();
		*/

		//Variables:
		$receiver_email = 'glcolin@hotmail.com';

		//check receiver and currency code
		if($_POST['receiver_email'] != $receiver_email){
			die('Err - 001');
		}
		if($_POST['mc_currency'] != 'USD'){
			die('Err - 002');
		}

		//retrieve data	
		$custom_array = explode(",", $_POST['custom']);
		$name = $custom_array[0];
		$phone = $custom_array[1];
		$email = $custom_array[2];
		$courseid = $custom_array[3];
		$pin = $custom_array[4];
		
		//load model
		$this->load->model('common/pin');
		
		//check if pin is duplicated
		if(!$this->model_common_pin->isPinUnique($pin)){
			die('Err - 003');
		}
			
		//load model
		$this->load->model('common/onlinecourse');	
		$categories = $this->model_common_onlinecourse->getCategories();
		$price = array();
		$price[1] = $categories[0]['price'];
		$price[2] = $categories[1]['price'];
		$price[3] = $categories[2]['price'];
		
		//check if price is the collect amount
		if($_POST['mc_gross'] != $price[$courseid]){
			die('Err - 004');
		}
		
		//insert record
		$this->model_common_pin->insertPinData($custom_array);
		
		//send email
		//$message = '你的课堂编号号码是'.$pin.'.';
		//mail($email, '你的课堂编号号码(华侨医护学院)', $message);
		
		$mailheader  = "MIME-Version: 1.0\r\n";
		$mailheader .= "Content-type: text/html; charset=UTF-8\r\n";
		$mailheader .= "From: hyinstitute@p3nlh205.shr.prod.phx3.secureserver.net\r\n";
		$mailheader .= "Reply-To: hyinstitute@hotmail.com\r\n";
		$message='<p>你好,'.$name.'!</p><p>你的课堂编号号码是<b style="color:#D00;">'.$pin.'</b>.</p>';
		$subject="华侨医护课程编号号码";
		mail($email, '=?UTF-8?B?'.base64_encode($subject).'?=' , $message, $mailheader);
		
		//send text message
	
	}//end paypal_ipn
		
}