<?php 
class ControllerPinPin extends Controller {
     
  	public function index() {
		$this->document->setTitle("Pin");

		$this->load->model('pin/pin');

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
		
		$pin_total=$this->model_pin_pin->getTotalPins();
		
		$this->data['pins'] = array();
		
		foreach ($pin_total as $pin) {		
			$this->data['pins'][$pin['id']]=array(
				"name" => $pin['name'],
				"phone" => $pin['phone'],
				"email" => $pin['email'],
				"pin" => $pin['pin'],
				"edit" => $this->url->link('pin/pin/edit', '&pin_id=' . $pin['pin']),
				'delete' => $this->url->link('pin/pin/delete', '&pin_id=' . $pin['pin'])
			);
		}
		
		//render:
		$this->template = 'pin/pin_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
		
		$this->response->setOutput($this->render());
	}
	
	public function delete(){
    	$this->document->setTitle("Products"); 
		
		$this->load->model('products/products');
		
		$this->model_products_products->deleteProduct($this->request->post);
	  		
		$this->session->data['success'] = "Delete product success!";

		$url = '';
			
		$this->redirect($this->url->link('products/products', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		
	}
	
	public function edit() {
	
    	$this->document->setTitle("Pin edit");
		
		$this->load->model('pin/pin');
		$this->load->model('videos/videos');

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
		if (!isset($this->request->get['pin_id'])) {
			die('ERROR! - 1');
		}
		
		$this->data['pin'] = $this->request->get['pin_id'];
		
		$this->data['cancel'] = $this->url->link('pin/pin');
		
		//data
		$record_total=$this->model_pin_pin->getTotalRecords($this->request->get['pin_id']);
		
		$this->data['records'] = array();
		
		foreach ($record_total as $record) {		
			$this->data['records'][]=array(
				"courseid" => $record['course'],
				"start_time" => $record['start_time'],
				"course" => $this->model_videos_videos->getVideo($record['course']),
				"status" => (strtotime(date('Y-m-d H:i:s')) > (strtotime($record['start_time']) + 3 * 3600))?'<font style="color:#D00">已过期</font>':'没过期',
				'delete' => $this->url->link('pin/pin/deleterecord', '&record_id=' . $record['id'] . '&pin_id='.$this->request->get['pin_id'])
			);
		}

		
		//render:
		$this->template = 'pin/record_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
  	} 
	
	function deleterecord(){
		
		$this->load->model('pin/pin');
		
		if (!isset($this->request->get['record_id'])) {
			die('ERROR! - 2');
		}
		
		if (!isset($this->request->get['pin_id'])) {
			die('ERROR! - 3');
		}
		
		$this->model_pin_pin->deleteRecord($this->request->get['record_id']);
		
		$this->session->data['success'] = '成功删除记录!';
		
		$this->redirect($this->url->link('pin/pin/edit', 'pin_id='.$this->request->get['pin_id']));
		
	}
	
  
}
?>
