<?php

Class ControllerCommonHome extends controller{

	function index(){
		
		$this->load->model('common/course');
		$this->load->model('content/content');
		
		$this->data['courses']	= $this->model_common_course->getCourses();
		
		//data
		$data = $this->model_content_content->getContent('news');
		$this->data['news_title']	= html_entity_decode ($data['title']);
		$this->data['news_content']	= html_entity_decode ($data['content']);
		
		$data = $this->model_content_content->getContent('intro');
		$this->data['intro_title']	= html_entity_decode ($data['title']);
		$this->data['intro_content']	= html_entity_decode ($data['content']);
		
		//retrive banner and home page side pictures
		$this->load->model('pictures/pictures');
		
		$image_infos=array();	
		$image_infos = $this->model_pictures_pictures->getPictures();
		
		$this->data['image_info'] = $image_infos;
		
		$this->template = 'common/home.tpl';
		
		//render
		$this->children = array(	
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
	
}