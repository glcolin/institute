<?php
class ModelCommonVideo extends Model {	
	
	public function getPinData($pin) {	
		$query = $this->db->query("SELECT * from ee_pin WHERE pin = ".$this->db->escape($pin));	
		$rows=$query->rows;		
		return $rows;
	}
	
	public function getPinHistory($pin) {	
		$query = $this->db->query("SELECT * from ee_pin_record WHERE pin = ".$this->db->escape($pin));	
		$rows=$query->rows;		
		return $rows;
	}
	
	public function getCourses($cat_id) {
		$query = $this->db->query(
			"SELECT * from ee_videos 
			WHERE video_cat_id = ".$this->db->escape($cat_id)." order by sort,id"
		);		
		$rows=$query->rows;		
		return $rows;
	}
	
	public function isPinExisted($pin) {
		$query = $this->db->query("SELECT * from ee_pin WHERE pin = ".$this->db->escape($pin));	
		$rows=$query->rows;	
		if(count($rows) > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function isPinAndCategoryExisted($pin,$cat) {
		$query = $this->db->query("SELECT * from ee_pin WHERE pin = ".$this->db->escape($pin)." AND course = ".$this->db->escape($cat) );	
		$rows=$query->rows;	
		if(count($rows) > 0){
			return true;
		}else{
			return false;
		}
	}

	//VIDEO:
	
	public function isPlayed($id,$pin){
		$query = $this->db->query("SELECT * from ee_pin_record WHERE pin = ".$this->db->escape($pin)." AND course = ".$this->db->escape($id) );	
		$rows=$query->rows;	
		if(count($rows) > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function getCourseURL($id) {
		$query = $this->db->query(
			"SELECT * from ee_videos 
			WHERE id = ".$this->db->escape($id)
		);		
		$rows=$query->rows;		
		return $rows[0]['url'];
	}
	
	public function insertRecord($pin,$id,$start_time) {
		$this->db->query("INSERT INTO ee_pin_record (id, course, pin, start_time) VALUES (NULL, '".$id."', '".$pin."', '".$start_time."')");
	}
	
}
?>