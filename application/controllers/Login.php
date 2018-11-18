<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller{
	public function index(){
		
	}
	function masuk()
	{
		$username = $this->input->post('uname');
		$password = $this->input->post('passwd');
		$cek = $this->model_login->cek($username, $password);
		if($cek->num_rows() == 1)
		{
			foreach($cek->result() as $data){
				$sess_data['id_user'] = $data->id_user;
				$sess_data['username'] = $data->username;
				$sess_data['level'] = $data->level;
				$this->session->set_userdata($sess_data);
			}
			if($this->session->userdata('level') == '1')
			{
				redirect('admin');
			}
			elseif($this->session->userdata('level') == '2')
			{
				redirect('contributor');
			}
			elseif($this->session->userdata('level') == '3')
			{
				redirect('home');
			}
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Maaf, kombinasi username dengan password salah.');
			redirect('login');
		}
	}
	function keluar()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
