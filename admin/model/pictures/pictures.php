<?php
class ModelPicturesPictures extends Model {
	
	public function getPictures(){
		$query = $this->db->query("SELECT * from ee_pictures");			
		return $query->rows;
	}
	
	public function update_pictures($data=array()){
			$this->db->query("update ee_pictures set 
			url='".$data['image0']."'
			where name= 'banner'");
			$this->db->query("update ee_pictures set 
			url='".$data['image1']."'
			where name= 'image1'");
			$this->db->query("update ee_pictures set 
			url='".$data['image2']."'
			where name= 'image2'");
			$this->db->query("update ee_pictures set 
			url='".$data['image3']."'
			where name= 'image3'");
			$this->db->query("update ee_pictures set 
			url='".$data['image4']."'
			where name= 'image4'");
	}
	
}
?>
