<?php
/**
 * 
 */
class Pages extends CI_Model
{
	
	public function register($data_insert){
		$this->db->insert('member', $data_insert);
	}
}
?>