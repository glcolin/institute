<?php
	class ControllerGalleryAlbums extends Controller {
		public function index() {
			
			$this->template = 'gallery/albums.tpl';
			
			$this->document->setTitle('相册'); 
			
			//load model
			$this->load->model('gallery/albums');
			
			//data
			$this->data['albums'] = $this->model_gallery_albums->getData();
			
			//render
			$this->children = array(	
				'common/header',
				'common/footer',
			);
			
			$this->response->setOutput($this->render());
		}
	}