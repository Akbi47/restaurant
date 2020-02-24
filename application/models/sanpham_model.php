<?php
class Sanpham_model extends CI_Model{
	
	function insert($ten, $anh, $mota){
		$data = array(
			'ten' => $ten,
			'anh' => $anh,
			'mota' => $mota
		);
		if($this->db->insert('sanpham', $data)){
			return $this->db->insert_id();
		}
		return false;
	}

	function update($id, $ten, $anh, $mota){
		$data = array(
			'ten' => $ten,
			'anh' => $anh,
			'mota' => $mota
		);
		$this->db->where('id', $id);
		return $this->db->update('sanpham', $data);
	}

	function get_by_id($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('sanpham');
		$result = $query->result_array();
		return $result[0];
	}

	function get_all(){
		$this->db->select('*');
		$query = $this->db->get('sanpham');
		$result = $query->result_array();
		return $result;
	}

	function delete_by_id($id){
		$this->db->where('id', $id);
		return $this->db->delete('sanpham');
	}

}