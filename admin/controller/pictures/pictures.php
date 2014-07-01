<?php 
class ControllerPicturesPictures extends Controller {
     
  	public function index() {
		$this->document->setTitle("Pictures");

		$this->load->model('pictures/pictures');

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
			
		//buttons
		
		$this->data['action'] = $this->url->link('pictures/pictures/update');	
		$this->data['cancel'] = $this->url->link('pictures/pictures');
		
		//picture data
		$image_infos=array();	
		$image_infos = $this->model_pictures_pictures->getPictures();
		
		$i = 0;
		foreach($image_infos as $image_info){
			$this->data['img'.$i] = $image_info;
			$i++; 
		}
		
		


		
		$this->data['token'] = rand(1, 100000000);
		
		$this->session->data['token'] = $this->data['token'];
		
		//render:
		$this->template = 'pictures/pictures.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
  	} 
	
	public function update() {

		$this->load->model('pictures/pictures');
	
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
				
			$this->model_pictures_pictures->update_pictures($this->request->post);
				
			$this->session->data['success'] = "Changes have been saved!";
			
			$this->redirect($this->url->link('pictures/pictures'));
		}

	}
  
}
?>
