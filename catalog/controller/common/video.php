<?php

Class ControllerCommonVideo extends controller{

	function index(){
		
		//load model
		$this->load->model('common/video');
		$this->load->model('common/onlinecourse');
		
		//security check
		if(!isset($this->request->get['pin'])){
			die('ACCESS DENIED - ERR 1!');
		}
		if(!isset($this->request->get['cat'])){
			die('ACCESS DENIED - ERR 2!');
		}
		if(!isset($this->request->get['id'])){
			die('ACCESS DENIED - ERR 3!');
		}
		
		$pin = $this->request->get['pin'];
		$cat = $this->request->get['cat'];
		$this->data['id'] = $id = $this->request->get['id'];
		
		$catList = array(1,2,3);
		if (!in_array($cat, $catList)) {
			die('ACCESS DENIED - ERR 4!');
		}
		
		if(!$this->model_common_video->isPinAndCategoryExisted($pin,$cat)){
			die('ACCESS DENIED - ERR 5!');
		}
		
		//data
		$categories = $this->model_common_onlinecourse->getCategories();

		$this->data['category'] = $categories[$cat-1];
		
		$this->data['courses'] = $this->model_common_video->getCourses($cat);
		$users = $this->model_common_video->getPinData($pin);
		$this->data['user'] = $users[0];		
		
		//analyze records:
		$records = $this->model_common_video->getPinHistory($pin);
		$this->data['record'] = array();
		foreach($records as $record){
			$this->data['record'][$record['course']] = array(
				'start_time' => $record['start_time'],
				'end_time' => date( "Y-m-d H:i:s", strtotime($record['start_time']) + 3 * 3600 ),
				'current_time' =>  date('Y-m-d H:i:s'),
				'isValid' => (strtotime(date('Y-m-d H:i:s')) < (strtotime($record['start_time']) + 3 * 3600))?true:false
			);
		}

		//analyze courses:
		foreach($this->data['courses'] as $course){
			if($course['id'] == $id){
				$this->data['video'] = $course;
			}
		}
		
		//render
		$this->template = 'common/video.tpl';
				
		$this->children = array(	
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
	
	function checkPin(){
	
		//load model
		$this->load->model('common/video');
		
		if($this->model_common_video->isPinAndCategoryExisted($this->request->post['pin'],$this->request->post['cat'])){
			echo 'true';
		}else{
			echo 'false';
		}
		
	}
	
	function playVideo(){
	
		//load model
		$this->load->model('common/video');
	
		//security check
		if(!isset($this->request->get['pin'])){
			die('ACCESS DENIED - ERR 1!');
		}
		if(!isset($this->request->get['cat'])){
			die('ACCESS DENIED - ERR 2!');
		}
		if(!isset($this->request->get['id'])){
			die('ACCESS DENIED - ERR 3!');
		}
		
		$pin = $this->request->get['pin'];
		$cat = $this->request->get['cat'];
		$id = $this->request->get['id'];
	
		$catList = array(1,2,3);
		if (!in_array($cat, $catList)) {
			die('ACCESS DENIED - ERR 4!');
		}
		
		if(!$this->model_common_video->isPinAndCategoryExisted($pin,$cat)){
			die('ACCESS DENIED - ERR 5!');
		}

		if(!$this->model_common_video->isPlayed($id,$pin)){
			$this->model_common_video->insertRecord($pin,$id,date('Y-m-d H:i:s'));
			header('location:index.php?route=common/video&cat='.$cat.'&id='.$id.'&pin='.$pin);
			exit();
		}
		
		$video_url = $this->model_common_video->getCourseURL($id);
	
		//generate mp4:	
		$path = 'uploads/videos/'.$video_url; 
		$size=filesize($path);
		$fm=@fopen($path,'rb');
		if(!$fm) {
		  // You can also redirect here
		  header ("HTTP/1.0 404 Not Found");
		  die();
		}
		$begin=0;
		$end=$size;
		if(isset($_SERVER['HTTP_RANGE'])) {
		  if(preg_match('/bytes=\h*(\d+)-(\d*)[\D.*]?/i', $_SERVER['HTTP_RANGE'], $matches)) {
			$begin=intval($matches[0]);
			if(!empty($matches[1])) {
			  $end=intval($matches[1]);
			}
		  }
		}
		if($begin>0||$end<$size)
		  header('HTTP/1.0 206 Partial Content');
		else
		  header('HTTP/1.0 200 OK');
		header("Content-Type: video/mp4");
		header('Accept-Ranges: bytes');
		header('Content-Length:'.($end-$begin));
		header("Content-Disposition: inline;");
		header("Content-Range: bytes $begin-$end/$size");
		header("Content-Transfer-Encoding: binary\n");
		header('Connection: close');
		$cur=$begin;
		fseek($fm,$begin,0);
		while(!feof($fm)&&$cur<$end&&(connection_status()==0))
		{ print fread($fm,min(1024*16,$end-$cur));
		  $cur+=1024*16;
		  usleep(1000);
		}
		die();
		
	}
	
}