<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Task_model');
	}

	public function index(){
		$this->load->view('tampil_task');
	}

	public function simpan(){
		$post = $this->input->post('task');
		$data = array(
				'task' => $post,
				'date' => date('Y-m-d'),
				'time' => date('H:i:s')
			);
		$this->Task_model->insert('tbl_hendra',$data);
	}

	public function load_temp(){
		$data = array('result' => $this->Task_model->view('tbl_hendra'));
		$this->load->view('loadajax',$data);
		
	}

	public function hapus()
	{
		$id  = $this->input->get('id');
		$this->Task_model->delete('tbl_hendra',$id);
	}

	public function update(){
		/*
		$id = $this->input->post('id');
		$task = $this->input->post('edit');
		$data = array('task' => $task);
		*/
		$id = $this->input->post('id');
		$data = $this->input->post('edit');
		$this->Task_model->update($data,'tbl_hendra',$id);
	}
}

 ?>