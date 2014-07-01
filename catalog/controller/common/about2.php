<?php

Class ControllerCommonAbout2 extends controller{

	function index(){
		
		$this->load->model('content/content');
		
		$this->template = 'common/about2.tpl';
		
		//data
		$data = $this->model_content_content->getContent('inter');
		$this->data['inter_title']	= htmlspecialchars_decode($data['title']);
		$this->data['inter_content'] = htmlspecialchars_decode($data['content']);
		
		//render
		$this->children = array(	
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
	
}