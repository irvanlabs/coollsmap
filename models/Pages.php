<?php
/**
 * 
 */
class Pages extends CI_Model
{
	
	public function register($data_insert){
		$this->db->insert('users', $data_insert);
	}
}
?>