<?php

Class ControllerCommonOnlinecourse extends controller{

	function index(){
		
		//load model
		$this->load->model('common/onlinecourse');
		
		$this->data['categories'] = $this->model_common_onlinecourse->getCategories();
		
		$this->data['courses'] = array();
		$this->data['courses'][1] = $this->model_common_onlinecourse->getOnlinecourses(1);
		$this->data['courses'][2] = $this->model_common_onlinecourse->getOnlinecourses(2);
		$this->data['courses'][3] = $this->model_common_onlinecourse->getOnlinecourses(3);
		
		//render
		$this->template = 'common/onlinecourse.tpl';
				
		$this->children = array(	
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
	
}