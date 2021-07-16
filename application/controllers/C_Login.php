<?php
class C_login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('encryption');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('M_login');
		date_default_timezone_set("Asia/Bangkok");
	}


	public function index() {

		$this->load->view("admin/login");
		// $this->load->view("V_Footer");
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->M_Admin->checkUser($username,$password);

		foreach($data as $datas){
			$id_admin = $datas['id_admin'];
		}

		if(count($data) > 0){
			$dataLogin = array(
				'id_admin' => $id_admin,
				'username' => $username,
				'status' => "logged",

			);

			$this->session->set_userdata($dataLogin);
			$this->session->set_flashdata('logged',$username);
			redirect("C_menu_admin");
		}else{
			echo "Login Gagal !";
		}		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('C_Login','refresh');
	}



}



