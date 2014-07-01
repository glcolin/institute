<?php
class ModelContentContent extends Model {
	
	//home page news
	public function getNewsContent() {
		$query = $this->db->query("SELECT * FROM ee_content WHERE op_key='news'");			
		return $query->row;
	}
	
	public function updateNewsContent($data=array()){		
		$this->db->query("UPDATE ee_content 
			SET title='" . $data['title'] . "' , content='" . $data['contents'] . "' 
			WHERE op_key = 'news'");	
	}
	
	//home page intro
	public function getIntroContent() {
		$query = $this->db->query("SELECT * FROM ee_content WHERE op_key='intro'");			
		return $query->row;
	}
	
	public function updateIntroContent($data=array()){		
		$this->db->query("UPDATE ee_content 
			SET title='" . $data['title'] . "' , content='" . $data['contents'] . "' 
			WHERE op_key = 'intro'");	
	}
	
	//about us
	public function getAboutContent() {
		$query = $this->db->query("SELECT * FROM ee_content WHERE op_key='about'");			
		return $query->row;
	}
	
	public function updateAboutContent($data=array()){		
		$this->db->query("UPDATE ee_content 
			SET title='" . $data['title'] . "' , content='" . $data['contents'] . "' 
			WHERE op_key = 'about'");	
	}
	
	//international nurse
	public function getInterContent() {
		$query = $this->db->query("SELECT * FROM ee_content WHERE op_key='inter'");			
		return $query->row;
	}
	
	public function updateInterContent($data=array()){		
		$this->db->query("UPDATE ee_content 
			SET title='" . $data['title'] . "' , content='" . $data['contents'] . "' 
			WHERE op_key = 'inter'");	
	}
	
	//unnamed
	public function getUnnamedContent() {
		$query = $this->db->query("SELECT * FROM ee_content WHERE op_key='unnamed'");			
		return $query->row;
	}
	
	public function updateUnnamedContent($data=array()){		
		$this->db->query("UPDATE ee_content 
			SET title='" . $data['title'] . "' , content='" . $data['contents'] . "' 
			WHERE op_key = 'unnamed'");	
	}
	
	//newborn
	public function getNewbornContent() {
		$query = $this->db->query("SELECT * FROM ee_content WHERE op_key='newborn'");			
		return $query->row;
	}
	
	public function updateNewbornContent($data=array()){		
		$this->db->query("UPDATE ee_content 
			SET title='" . $data['title'] . "' , content='" . $data['contents'] . "' 
			WHERE op_key = 'newborn'");	
	}
	
	
	
	
	
}
?>
