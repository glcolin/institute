<?php
class ModelContentContent extends Model {
	
	//home page news
	public function getContent($keyword) {
		$query = $this->db->query("SELECT * FROM ee_content WHERE op_key='".$keyword."'");			
		return $query->row;
	}

}