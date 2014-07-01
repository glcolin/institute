<?php
class ModelPicturesPictures extends Model {
	
	public function getPictures(){
		$query = $this->db->query("SELECT * from ee_pictures");			
		return $query->rows;
	}
	
}
?>
