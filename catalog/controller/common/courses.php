<?php

Class ControllerCommonCourses extends controller{

	function index(){
	
		$this->load->model('common/course');
		
		$this->data['courses']	= $this->model_common_course->getCourses();
	
		
		$this->template = 'common/courses.tpl';
		
		
		
		//render
		$this->children = array(	
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
	
}