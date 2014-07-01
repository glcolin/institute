<?php

Class ControllerCommonContact extends controller{

	function index(){
		
		$this->template = 'common/contact.tpl';
		
		//render
		$this->children = array(	
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
	
}