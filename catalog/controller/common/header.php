<?php

Class ControllerCommonHeader extends controller{

	function index(){
		
		$this->data['title'] = $this->document->getTitle();
		$this->data['styles'] = $this->document->getStyles();
		$this->data['scripts'] = $this->document->getScripts();
		
		//retrive banner and home page side pictures
		$this->load->model('pictures/pictures');
		
		$image_infos=array();	
		$image_infos = $this->model_pictures_pictures->getPictures();
		
		$this->data['img0'] = $image_infos[0];
		
		//render
		$this->template = 'common/header.tpl';
		
		$this->response->setOutput($this->render());
		
	}
	
}