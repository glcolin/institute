<?php
class ModelCommonPin extends Model {	
	
	public function isPinUnique($pin) {
	
		$query = $this->db->query("SELECT * from ee_pin WHERE pin = ".$pin);
		
		$rows=$query->rows;
		
		return (count($rows) > 0)?false:true;
	}
	
	public function insertPinData($data) {
	
		$this->db->query("INSERT INTO ee_pin (id, pin, course, name, phone, email) VALUES (NULL, '".$this->db->escape($data[4])."', '".$this->db->escape($data[3])."', '".$this->db->escape($data[0])."', '".$this->db->escape($data[1])."', '".$this->db->escape($data[2])."')");
		
	}

}
?>