<?php

Class ControllerCommonAbout4 extends controller{

	function index(){
		
		$this->load->model('content/content');
		
		$this->template = 'common/about4.tpl';
		
		//data
		$data = $this->model_content_content->getContent('unnamed');
		$this->data['unnamed_title']	= htmlspecialchars_decode($data['title']);
		$this->data['unnamed_content'] = htmlspecialchars_decode($data['content']);
		
		//render
		$this->children = array(	
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
	
}