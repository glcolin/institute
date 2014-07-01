<?php
class ModelVideosCategory extends Model {
	
	public function getTotalCategory($data = array()){
		$query = $this->db->query("SELECT * from ee_videos_category order by sort asc,title asc");
		$rows=$query->rows;

		return $rows;
	}
	
	public function getCategory($id) {
		$query = $this->db->query("SELECT * from ee_videos_category where id=".$id);
		$row=$query->row;
				
		return $row;
	}
	
	/*
	public function addCategory($data=array()){
	// print_r($data);
		
		$query = $this->db->query("insert into ee_videos_category (title,price,content) values ('".$this->db->escape($data['item_title'])."','".$this->db->escape($data['item_price'])."','".$this->db->escape($data['item_content'])."')");
	}
	
	public function deleteCategory($data=array()){
		foreach($data['selected'] as $id){
			$this->db->query("delete from ee_videos_category where id=".$id);
		}
	}
	*/
	
	public function update_product($data=array()){
			$this->db->query("update ee_videos_category set 
			title='".$this->db->escape($data['item_title'])."',
			price='".$this->db->escape($data['item_price'])."',
			content='".$this->db->escape($data['item_content'])."'
			where id=".$data['item_id']);
	}
	
	/*
	public function saveSort($data=array()){
		$sort_arr=json_decode(htmlspecialchars_decode($data['sort_string']));

		foreach($sort_arr as $key=>$id){
			$query=$this->db->query("update ee_videos_category set sort='".$key."' where id='".$id."'");
		
		}
	}
	*/
	
}
?>
