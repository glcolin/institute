<?php
class ModelGalleryAlbums extends Model {
	
	public function getBanner() {
		$query = $this->db->query("SELECT * FROM ee_image WHERE op_key='gallery'");		
		if (!empty($query->rows)){
			$value = $query->row['value'];
		}else{
			$value = NULL;
		}
		return $value;
	}
	
	public function updateBanner($data=array()){	
		$query = $this->db->query("SELECT * FROM ee_image WHERE op_key='gallery'");		
		if (!empty($query->rows)){
			$this->db->query("UPDATE ee_image 
				SET value='" . $data['banner_string'] . "' 
				WHERE op_key = 'gallery'");	
		}else{
			$this->db->query("insert into ee_image 
				(op_key,value) values ('gallery','" . $data['banner_string'] . "')");	
		}
	}
}
?>
