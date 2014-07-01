<?php

Class ControllerCommonFooter extends controller{

	function index(){
		
		$this->template = 'common/footer.tpl';
		
		$this->response->setOutput($this->render());
		
	}
	
}