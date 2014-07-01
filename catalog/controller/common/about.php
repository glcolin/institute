<?php

Class ControllerCommonAbout extends controller{

	function index(){
		
		$this->load->model('content/content');
		
		$this->template = 'common/about.tpl';
		
		//data
		$data = $this->model_content_content->getContent('about');
		$this->data['about_title']	= html_entity_decode ($data['title']);
		$this->data['about_content']	= html_entity_decode ($data['content']);
		
		//render
		$this->children = array(	
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
	
}