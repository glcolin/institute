<?php 
class ControllerProducts2Products extends Controller {
     
  	public function index() {
		$this->document->setTitle("Products2");

		$this->load->model('products2/products');

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
		
		$products_total=$this->model_products2_products->getTotalProducts($data);
		
		$this->data['products'] = array();
		
		foreach ($products_total as $product) {
			$sort_default[]=$product['id'];
			
			$action = array();
			
			$action[] = array(
				'text' => 'Edit',
				'href' => $this->url->link('products2/products/edit', '&product_id=' . $product['id'])
			);
			
			$this->data['products'][$product['id']]=array(
				"info" => $product,
				"action" => $action
			);
		}
		
		//button url:	
		$this->data['insert'] = $this->url->link('products2/products/addnew');	
		$this->data['delete'] = $this->url->link('products2/products/delete');	
		
		//render:
		$this->template = 'products2/products_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
		
		$this->response->setOutput($this->render());
	}
	
	public function delete(){
    	$this->document->setTitle("Products"); 
		
		$this->load->model('products2/products');
		
		$this->model_products2_products->deleteProduct($this->request->post);
	  		
		$this->session->data['success'] = "Delete product success!";

		$url = '';
			
		$this->redirect($this->url->link('products2/products', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		
	}
	
	public function saveSort(){
		$this->load->model('products2/products');
		$this->model_products2_products->saveSort($this->request->post);
	}	
	
	public function insert(){
    	$this->document->setTitle("Products"); 
		
		$this->load->model('products2/products');
		
		$this->model_products2_products->addProduct($this->request->post);
	  		
		$this->session->data['success'] = "Add product success!";

		$url = '';
			
		$this->redirect($this->url->link('products2/products', 'token=' . $this->session->data['token'] . $url, 'SSL'));	
	}
	
	public function addnew(){
		$this->document->setTitle("Products"); 
		
		$this->load->model('products2/products');
		
		$this->getForm();
	}	
	
	
	public function edit() {
	
    	$this->document->setTitle("Product edit");
		
		$this->load->model('products2/products');
		
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
		if (!isset($this->request->get['product_id'])) {
			$this->data['action'] = $this->url->link('products2/products/insert');
		} else {
			$this->data['action'] = $this->url->link('products2/products/update');
		}	
		$this->data['cancel'] = $this->url->link('products2/products');
		
		//product data
		$product_info=array();	
		
		if (isset($this->request->get['product_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
      		$product_info = $this->model_products2_products->getProduct($this->request->get['product_id']);
    	}

		$this->data['product_info']	=	$product_info;
		
		$this->data['token'] = rand(1, 100000000);
		
		$this->session->data['token'] = $this->data['token'];
		
		//render:
		$this->template = 'products2/products_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
  	} 
	
	public function update() {

		$this->load->model('products2/products');
	
		$url="";
	
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
				
			$this->model_products2_products->update_product($this->request->post);
				
			$this->session->data['success'] = "Changes have been saved!";
			
			$this->redirect($this->url->link('products2/products', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

	}
  
}
?>
