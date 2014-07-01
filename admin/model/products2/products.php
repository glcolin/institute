<?php
class ModelProducts2Products extends Model {
	
	public function getTotalProducts($data = array()){
		$query = $this->db->query("SELECT * from ee_products2 order by sort asc,title asc");
		$rows=$query->rows;

		return $rows;
	}
	
	public function getProduct($id) {
		$query = $this->db->query("SELECT * from ee_products2 where id=".$id);
		$row=$query->row;
				
		return $row;
	}
	
	public function addProduct($data=array()){
	// print_r($data);
		
		$query = $this->db->query("insert into ee_products2 (title,content) values ('".$this->db->escape($data['item_title'])."','".$this->db->escape($data['item_content'])."')");
	}
	
	public function deleteProduct($data=array()){
		foreach($data['selected'] as $id){
			$this->db->query("delete from ee_products2 where id=".$id);
		}
	}
	
	public function update_product($data=array()){
			$this->db->query("update ee_products2 set 
			title='".$this->db->escape($data['item_title'])."',
			content='".$this->db->escape($data['item_content'])."'
			where id=".$data['item_id']);
	}
	
	public function saveSort($data=array()){
		$sort_arr=json_decode(htmlspecialchars_decode($data['sort_string']));

		foreach($sort_arr as $key=>$id){
			$query=$this->db->query("update ee_products2 set sort='".$key."' where id='".$id."'");
		
		}
	}
}
?>
