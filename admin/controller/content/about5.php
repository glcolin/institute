<?php 
class ControllerContentAbout5 extends Controller {
	private $error = array(); 
     
  	public function index() {
	
		$this->document->setTitle("月子中心");

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
		$data = $this->model_content_content->getNewbornContent();
		$this->data['ctitle'] = html_entity_decode($data['title'], ENT_QUOTES, 'UTF-8');
		$this->data['content'] = html_entity_decode($data['content'], ENT_QUOTES, 'UTF-8');
		
		//actions
		$this->data['save'] = 'index.php?route=content/about5/update';
		
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
				
			$this->model_content_content->updateNewbornContent($this->request->post);
				
			$this->session->data['success'] = "Changes have been saved!";
			
			$this->index();
		}

	}
  
}
?>
