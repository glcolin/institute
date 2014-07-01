<?php
class ModelCommonCourse extends Model {	
	
	public function getCourses() {
	
		$query = $this->db->query("SELECT * from ee_products order by sort,title");
		
		$rows=$query->rows;
		
		return $rows;
	}
	
	public function getCourses2() {
	
		$query = $this->db->query("SELECT * from ee_products2 order by sort,title");
		
		$rows=$query->rows;
		
		return $rows;
	}
	

}
?>