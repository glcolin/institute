<?php

Class ControllerCommonAbout5 extends controller{

	function index(){
		
		$this->load->model('content/content');
		
		$this->template = 'common/about5.tpl';
		
		//data
		$data = $this->model_content_content->getContent('newborn');
		$this->data['newborn_title']	= htmlspecialchars_decode($data['title']);
		$this->data['newborn_content'] = htmlspecialchars_decode($data['content']);
		
		//render
		$this->children = array(	
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
	
}