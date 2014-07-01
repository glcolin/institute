<?php 
class ControllerGalleryAlbums extends Controller {
	private $error = array(); 
     
  	public function index() {
	
		$this->document->setTitle("Gallery");

		//load model
		$this->load->model('gallery/albums');
		
		//check if login
		if (!$this->user->isLogged()){
			$this->redirect($this->url->link('common/login'));
		}
		
		//Alert and Warning
		if (isset($this->session->data['warning'])) {
			$this->data['warning'] = $this->session->data['warning'];
			unset($this->session->data['warning']);
		} else {
			$this->data['warning'] = '';
		}

		if (isset($this->session->data['success'])) {
    		$this->data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		
		//data
		$this->data['banner_string'] = html_entity_decode($this->model_gallery_albums->getBanner(), ENT_QUOTES, 'UTF-8');
		
		//render
		$this->template = 'gallery/albums.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
				
		$this->response->setOutput($this->render());
	}
	

	public function update() {

		$this->load->model('gallery/albums');
	
		$url = NULL;
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
				
			$this->model_gallery_albums->updateBanner($this->request->post);
				
			$this->session->data['success'] = "Changes have been saved!";
			
			$this->redirect($this->url->link('gallery/albums', $url));
		}

	}
  
}
?>
