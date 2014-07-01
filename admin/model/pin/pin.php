<?php
class ModelPinPin extends Model {
	
	public function getTotalPins(){
		$query = $this->db->query("SELECT * from ee_pin");
		$rows=$query->rows;

		return $rows;
	}
	
	public function getTotalRecords($pin) {
		$query = $this->db->query("SELECT * from ee_pin_record where pin=".$this->db->escape($pin));
		$rows=$query->rows;
				
		return $rows;
	}

	
	public function deleteRecord($id){
		$this->db->query("delete from ee_pin_record where id=".$this->db->escape($id));
	}
	

}
?>
