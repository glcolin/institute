<?php
class ModelCommonOnlinecourse extends Model {	
	
	public function getCategories() {
	
		$query = $this->db->query("SELECT * from ee_videos_category order by id");
		
		$rows=$query->rows;
		
		return $rows;
	}
	
	public function getOnlinecourses($id) {
	
		$query = $this->db->query(
			"SELECT * from ee_videos 
			WHERE video_cat_id = ".$id." order by sort,id"
		);
		
		$rows=$query->rows;
		
		return $rows;
	}

}
?>