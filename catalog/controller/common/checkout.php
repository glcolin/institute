<?php

Class ControllerCommonCheckout extends controller{

	function index(){
		
		//check $_GET
		if(!isset($this->request->get['name'])){
			die('ERR - 01');
		}
		if(!isset($this->request->get['phone'])){
			die('ERR - 02');
		}
		if(!isset($this->request->get['email'])){
			die('ERR - 03');
		}
		if(!isset($this->request->get['courseid']) || !in_array($this->request->get['courseid'],array('1', '2', '3'))){
			die('ERR - 04');
		}
		
		//set data
		$this->data['name'] = $this->request->get['name'];
		$this->data['phone'] = $this->request->get['phone'];
		$this->data['email'] = $this->request->get['email'];
		$this->data['courseid'] = $courseid = $this->request->get['courseid'];
		
		//load model
		$this->load->model('common/onlinecourse');
		
		$categories = $this->model_common_onlinecourse->getCategories();
		
		$this->data['course'] = $categories[$courseid - 1];
		
		$this->template = 'common/checkout.tpl';
		
		//load model
		$this->load->model('common/pin');
		
		//generate a random pin
		$pin = rand(100000000, 999999999);
		
		while(!$this->model_common_pin->isPinUnique($pin)){
			$pin = rand(100000000, 999999999);
		}
		
		$this->data['pin'] = $pin;
		
		//render
		$this->children = array(	
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
	
	
		
}