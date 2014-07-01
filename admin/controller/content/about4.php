<?php 
class ControllerContentAbout4 extends Controller {
	private $error = array(); 
     
  	public function index() {
	
		$this->document->setTitle("国际医护班");

		//load model
		$this->load->model('content/content');
		
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
		$data = $this->model_content_content->getUnnamedContent();
		$this->data['ctitle'] = html_entity_decode($data['title'], ENT_QUOTES, 'UTF-8');
		$this->data['content'] = html_entity_decode($data['content'], ENT_QUOTES, 'UTF-8');
		
		//actions
		$this->data['save'] = 'index.php?route=content/about4/update';
		
		//render
		$this->template = 'content/content.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
				
		$this->response->setOutput($this->render());
	}
	

	public function update() {

		$this->load->model('content/content');
	
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
				
			$this->model_content_content->updateUnnamedContent($this->request->post);
				
			$this->session->data['success'] = "Changes have been saved!";
			
			$this->index();
		}

	}
  
}
?>
