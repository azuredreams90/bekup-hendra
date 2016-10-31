<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model{

	public function insert($table,$data){
		$this->db->insert($table,$data);
	}

	public function update($data,$table,$id){
		/*
		$this->db->set($data);
		$this->db->where($where);
		$this->db->update($table);
		*/
		$this->db->where('id',$id);
			$this->db->update($table,array('task'=>$data));
	}

	public function delete($table,$id){
		$this->db->where('id',$id);
		$this->db->delete($table);
	}

	public function view($table){
		$query = $this->db->query("SELECT * FROM $table ORDER BY id DESC");
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$data[] = $row;
			}
			$query->free_result();
		}else{
			$data = NULL;
		}

		return $data;
	}
}

 ?>