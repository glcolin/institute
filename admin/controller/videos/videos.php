<?php 
class ControllerVideosVideos extends Controller {
     
  	public function index() {
		$this->document->setTitle("Videos");

		$this->load->model('videos/videos');
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
		
		//categories
		
		$this->data['totalCategories'] = $this->model_videos_category->getTotalCategory();
		
		//data
		$data = array();
		
		$videos_total=$this->model_videos_videos->getTotalVideos($data);
		
		$this->data['videos'] = array();
		
		foreach ($videos_total as $video) {
			$sort_default[]=$video['id'];
			
			$action = array();
			
			$action[] = array(
				'text' => 'Edit',
				'href' => $this->url->link('videos/videos/edit', '&video_id=' . $video['id'])
			);
			
			$this->data['videos'][$video['id']]=array(
				"info" => $video,
				"action" => $action
			);
		}
		
		//button url:	
		$this->data['insert'] = $this->url->link('videos/videos/addnew');	
		$this->data['delete'] = $this->url->link('videos/videos/delete');	
		
		//render:
		$this->template = 'videos/videos_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
		
		$this->response->setOutput($this->render());
	}
	
	public function delete(){
    	$this->document->setTitle("Videos"); 
		
		$this->load->model('videos/videos');
		
		$this->model_videos_videos->deleteVideo($this->request->post);
	  		
		$this->session->data['success'] = "Delete video success!";

		$url = '';
			
		$this->redirect($this->url->link('videos/videos', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		
	}
	
	public function saveSort(){
		$this->load->model('videos/videos');
		$this->model_videos_videos->saveSort($this->request->post);
	}	
	
	public function insert(){
    	$this->document->setTitle("Videos"); 
		
		$this->load->model('videos/videos');
		
		$this->model_videos_videos->addVideo($this->request->post);
	  		
		$this->session->data['success'] = "Add video success!";

		$url = '';
			
		$this->redirect($this->url->link('videos/videos', 'token=' . $this->session->data['token'] . $url, 'SSL'));	
	}
	
	public function addnew(){
		$this->document->setTitle("Videos"); 
		
		$this->load->model('videos/videos');
		$this->load->model('videos/category');
		
		$this->getForm();
	}	
	
	
	public function edit() {
	
    	$this->document->setTitle("Video edit");
		
		$this->load->model('videos/videos');
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
		if (!isset($this->request->get['video_id'])) {
			$this->data['action'] = $this->url->link('videos/videos/insert');
		} else {
			$this->data['action'] = $this->url->link('videos/videos/update');
		}	
		$this->data['cancel'] = $this->url->link('videos/videos');
		
		//video data
		$video_info=array();
		$this->data['totalCategories'] = $this->model_videos_category->getTotalCategory();
		
		if (isset($this->request->get['video_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
      		$video_info = $this->model_videos_videos->getVideo($this->request->get['video_id']);
    	}

		$this->data['video_info']	=	$video_info;
		
		$this->data['token'] = rand(1, 100000000);
		
		$this->session->data['token'] = $this->data['token'];
		
		
		
		//render:
		$this->template = 'videos/videos_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
  	} 
	
	public function update() {

		$this->load->model('videos/videos');
	
		$url="";
	
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
				
			$this->model_videos_videos->update_product($this->request->post);
				
			$this->session->data['success'] = "Changes have been saved!";
			
			$this->redirect($this->url->link('videos/videos', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

	}
  
}
?>
