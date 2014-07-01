<?php

Class ModelGalleryAlbums extends Model{

	public function getData(){
		$query = $this->db->query("SELECT * FROM ee_image WHERE op_key='gallery'");		
		if (!empty($query->rows)){
			$value = $query->row['value'];
			preg_match_all('/\[(.*?)\]/i', $value, $string);
			$value = explode(',', str_replace('&quot;', '', $string[1][0]));
		}else{
			$value = NULL;
		}
		return $value;
	}

}