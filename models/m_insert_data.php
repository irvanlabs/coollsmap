<?php
/**
 * 
 */
class M_insert_data extends CI_Model
{
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function count_data($table){
		return $this->db->get($table)->num_rows();
	}
	function show_data($table,$number,$offset){
		return $this->db->get($table,$number,$offset)->result();
	}
	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->get_where($table);
	}
	function single_data($where,$table){
		return $this->db->get_where($table,$where)
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
?>