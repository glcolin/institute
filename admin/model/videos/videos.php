<?php
class ModelVideosVideos extends Model {
	
	public function getTotalVideos($data = array()){
		$query = $this->db->query("SELECT * from ee_videos order by sort asc,title asc");
		$rows=$query->rows;

		return $rows;
	}
	
	public function getVideo($id) {
		$query = $this->db->query("SELECT * from ee_videos where id=".$id);
		$row=$query->row;
				
		return $row;
	}
	
	public function addVideo($data=array()){
	// print_r($data);
		
		$query = $this->db->query("insert into ee_videos (video_cat_id,title,content,url) values ('".$this->db->escape($data['item_category'])."','".$this->db->escape($data['item_title'])."','".$this->db->escape($data['item_content'])."','".$this->db->escape($data['video'])."')");
	}
	
	public function deleteVideo($data=array()){
		foreach($data['selected'] as $id){
			$this->db->query("delete from ee_videos where id=".$id);
		}
	}
	
	public function update_product($data=array()){
			$this->db->query("update ee_videos set 
			title='".$this->db->escape($data['item_title'])."',
			content='".$this->db->escape($data['item_content'])."',
			url='".$this->db->escape($data['video'])."',
			video_cat_id='".$this->db->escape($data['item_category'])."'
			where id=".$data['item_id']);
	}
	
	public function saveSort($data=array()){
		$sort_arr=json_decode(htmlspecialchars_decode($data['sort_string']));

		foreach($sort_arr as $key=>$id){
			$query=$this->db->query("update ee_videos set sort='".$key."' where id='".$id."'");
		
		}
	}
}
?>
