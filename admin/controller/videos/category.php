<?php 
class ControllerVideosCategory extends Controller {
     
  	public function index() {
		$this->document->setTitle("Category");

		$this->load->model('videos/category');

		$this->getList();
		
  	}
	
	protected function getList() {	
		
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
		
		$data = array();
		
		$category_total=$this->model_videos_category->getTotalCategory($data);
		
		$this->data['categorys'] = array();
		
		foreach ($category_total as $category) {
			$sort_default[]=$category['id'];
			
			$action = array();
			
			$action[] = array(
				'text' => 'Edit',
				'href' => $this->url->link('videos/category/edit', '&category_id=' . $category['id'])
			);
			
			$this->data['categorys'][$category['id']]=array(
				"info" => $category,
				"action" => $action
			);
		}
		
		//button url:	
		$this->data['insert'] = $this->url->link('videos/category/addnew');	
		$this->data['delete'] = $this->url->link('videos/category/delete');	
		
		//render:
		$this->template = 'videos/category_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
		
		$this->response->setOutput($this->render());
	}
	
	public function delete(){
    	$this->document->setTitle("category"); 
		
		$this->load->model('videos/category');
		
		$this->model_videos_category->deleteCategory($this->request->post);
	  		
		$this->session->data['success'] = "Successfully deleted!";

		$url = '';
			
		$this->redirect($this->url->link('videos/category', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		
	}
	
	public function saveSort(){
		$this->load->model('videos/category');
		$this->model_videos_category->saveSort($this->request->post);
	}	
	
	public function insert(){
    	$this->document->setTitle("category"); 
		
		$this->load->model('videos/category');
		
		$this->model_videos_category->addCategory($this->request->post);
	  		
		$this->session->data['success'] = "Successfully added!";

		$url = '';
			
		$this->redirect($this->url->link('videos/category', 'token=' . $this->session->data['token'] . $url, 'SSL'));	
	}
	
	public function addnew(){
		$this->document->setTitle("category"); 
		
		$this->load->model('videos/category');
		
		$this->getForm();
	}	
	
	
	public function edit() {
	
    	$this->document->setTitle("category edit");
		
		$this->load->model('videos/category');
		
		$this->session->data['success']="";

    	$this->getForm();
	}	
	
	protected function getForm() {
    	
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
		if (!isset($this->request->get['category_id'])) {
			$this->data['action'] = $this->url->link('videos/category/insert');
		} else {
			$this->data['action'] = $this->url->link('videos/category/update');
		}	
		$this->data['cancel'] = $this->url->link('videos/category');
		
		//video data
		$category_info=array();	
		
		if (isset($this->request->get['category_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
      		$category_info = $this->model_videos_category->getCategory($this->request->get['category_id']);
    	}

		$this->data['category_info']	=	$category_info;
		
		$this->data['token'] = rand(1, 100000000);
		
		$this->session->data['token'] = $this->data['token'];
		
		//render:
		$this->template = 'videos/category_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
  	} 
	
	public function update() {

		$this->load->model('videos/category');
	
		$url="";
	
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
				
			$this->model_videos_category->update_product($this->request->post);
				
			$this->session->data['success'] = "Changes have been saved!";
			
			$this->redirect($this->url->link('videos/category', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

	}
  
}
?>
