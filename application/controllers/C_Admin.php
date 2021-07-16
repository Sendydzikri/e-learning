<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Admin');
		$this->load->library('session');

	}

	public function is_logged_in()
    {
        $user = $this->session->userdata('logged');
        return isset($user);
    }
	public function randString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }	

    public function login(){
		if ($this->is_logged_in())
		{

			redirect("C_Admin");

		}else{
			$this->load->view('admin/login');			
		}


    }


	public function aksi_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data = $this->M_Admin->checkUser($email,$password);

		if($data > 0){
			$dataLogin = array(
				'email' => $email,
				'logged' => true,

			);

			$this->session->set_userdata('logged',$dataLogin);
			redirect("C_Admin");
		}else{
			$this->session->set_flashdata('error',"Login Gagal !");
			redirect("C_Admin/login");
		}		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('C_Admin/login','refresh');
	}

	public function index()
	{
 		if ($this->is_logged_in())
        {
			$data['jumlah_guru'] = $this->M_Admin->getDataCount("guru");
			$data['jumlah_siswa'] = $this->M_Admin->getDataCount("siswa");
			$data['jumlah_mapel'] = $this->M_Admin->getDataCount("mapel");
			$data['jumlah_kelas'] = $this->M_Admin->getDataCount("kelas");
			$this->load->view('admin/header');
			$this->load->view('admin/index',$data);
			$this->load->view('admin/footer');
        }else{
        	redirect('C_Admin/login');
        }

	}

	public function kelas(){
		if ($this->is_logged_in())
        {
			$data['kelas'] = $this->M_Admin->getDataKelas();
			$this->load->view('admin/header');
			$this->load->view('admin/kelas/kelas',$data);
			$this->load->view('admin/footer');
		}else{
			redirect('C_Admin/login');
		}
	}


	public function guru(){

		if ($this->is_logged_in())
        {
			$data['guru'] = $this->M_Admin->getDataGuru();
			$this->load->view('admin/header');
			$this->load->view('admin/guru/guru',$data);
			$this->load->view('admin/footer');
		}else{
			redirect('C_Admin/login');
		}

	}

	public function updateGuru($id){
		if ($this->is_logged_in())
        {
			$data['guru'] = $this->M_Admin->getDataGuruById($id);
			$this->load->view('admin/header');
			$this->load->view('admin/guru/updateGuru',$data);
			$this->load->view('admin/footer');
		}else{
			redirect('C_Admin/login');
		}		
		
	}
	public function hapusGuru($id){
		$this->M_Admin->hapusDataGuru($id);
	}

	public function tambahGuru(){
		if ($this->is_logged_in())
        {
			$this->load->view('admin/header');
			$this->load->view('admin/guru/tambahGuru');
			$this->load->view('admin/footer');		
		}else{
			redirect('C_Admin/login');
		}			

	}

	public function aksiTambahGuru(){
		$role_id = $this->M_Admin->ambilRole("Teacher");
		$user_id = $this->randString();
		$teacher_id = $this->randString();
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$data1 = array(
			'role_id' => $role_id,
			'user_id' => $user_id,
			'email' => $this->input->post('email'),
			'password' => $password,
			'status' => 1,
			'remember_token' => 'abc',


		);
		$data2 = array(
			'teacher_id' => $teacher_id,
			'user_id' => $user_id,
			'teacher_name' => $this->input->post('nama'),
		);	

		if($this->M_Admin->tambahDataGuru($data1,$data2)){
			redirect("C_Admin/guru");
		}
	}




	public function tambahKelas(){
		if ($this->is_logged_in())
        {
			$this->load->view('admin/header');
			$this->load->view('admin/kelas/tambahkelas');
			$this->load->view('admin/footer');
		}else{
			redirect('C_Admin/login');
		}			
		
	}

	public function aksiTambahKelas(){
		$id_kelas = $this->randString();
		$data = array(

			'student_class_id' => $id_kelas,
			'student_class_name' => $this->input->post('nama'),
			'student_class_description' => $this->input->post('deskripsi'),

		);
		if(!$this->M_Admin->tambahDataKelas($data)){
			redirect('C_Admin/kelas');
		}
	}

	public function updateKelas($id){

		if ($this->is_logged_in())
        {
			$data['kelas'] = $this->M_Admin->getDataKelasById($id);
			$this->load->view('admin/header');
			$this->load->view('admin/kelas/updateKelas',$data);
			$this->load->view('admin/footer');
		}else{
			redirect('C_Admin/login');
		}			

	}

	public function aksiUpdateKelas($id){
		$data = array(
			'student_class_name' => $this->input->post('nama'), 
			'student_class_description' => $this->input->post('deskripsi'),

		);
		if($this->M_Admin->updateDataKelas($id,$data)){
			redirect("C_Admin/kelas");
		}
	}	

	public function hapusKelas($id){
		if($this->M_Admin->hapusDataKelas($id)){
			redirect('C_Admin/kelas');
		}
	}

	public function siswa(){
		if ($this->is_logged_in())
        {
			$data['siswa'] = $this->M_Admin->getDataSiswa();
			$this->load->view('admin/header');
			$this->load->view('admin/siswa/siswa',$data);
			$this->load->view('admin/footer');		
		}else{
			redirect('C_Admin/login');
		}			

	}
	public function tambahSiswa(){
		if ($this->is_logged_in())
        {
			$data['kelas'] = $this->M_Admin->getDataKelas();
			$this->load->view('admin/header');
			$this->load->view('admin/siswa/tambahSiswa',$data);
			$this->load->view('admin/footer');	
		}else{
			redirect('C_Admin/login');
		}			
		
	}

	public function aksiTambahSiswa(){
		$role_id = $this->M_Admin->ambilRole("Student");
		$id_siswa = $this->randString();
		$user_id = $this->randString();
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$data = array(
			'user_id' => $user_id,
			'password' => $password,
			'email' => $this->input->post('email'),
			'role_id' => $role_id,
		);
		$data2 = array(

			'student_id' => $id_siswa,
			'user_id' => $user_id,
			'student_class_id' => $this->input->post('kelas'),
			'student_name' => $this->input->post('nama'),
			'student_gender' => $this->input->post('gender')

		);

		if($this->M_Admin->tambahDataSiswa($data,$data2)){
			redirect("C_Admin/siswa");
		}
	}

	public function hapusSiswa($id){
		if($this->M_Admin->hapusDataSiswa($id)){
			redirect('C_Admin/siswa');
		}
	}

	public function updateSiswa($id){
		if ($this->is_logged_in())
        {
			$data['siswa'] = $this->M_Admin->getDataSiswaById($id);
			$data['kelas'] = $this->M_Admin->getDataKelas();
			$this->load->view('admin/header');
			$this->load->view('admin/siswa/updateSiswa',$data);
			$this->load->view('admin/footer');
		}else{
			redirect('C_Admin/login');
		}			

	}

	public function aksiUpdateSiswa($id){
		$data = array(
			'student_gender' => $this->input->post('gender'), 
			'student_class_id' => $this->input->post('kelas'),
			'student_name' => $this->input->post('nama'),

		);

		if($this->input->post('password') !== NULL){
			$data = array(
				'student_gender' => $this->input->post('gender'), 
				'student_class_id' => $this->input->post('kelas'),
				'student_name' => $this->input->post('nama'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

			);			
		}


		if($this->M_Admin->updateDataSiswa($id,$data)){
			redirect("C_Admin/siswa");
		}
	}	

	public function aksiUpdateGuru($id){
		$data = array(
			'teacher_name' => $this->input->post('nama'),
		);

		if($this->input->post('password') !== NULL){
			$data = array(
				'teacher_name' => $this->input->post('nama'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

			);			
		}

		if($this->M_Admin->updateDataGuru($id,$data)){
			redirect("C_Admin/guru");
		}
	}

	public function mapel(){

		if ($this->is_logged_in())
        {
			$data['mapel'] = $this->M_Admin->getDataMapel();
			$this->load->view('admin/header');
			$this->load->view('admin/mapel/mapel',$data);
			$this->load->view('admin/footer');
		}else{
			redirect('C_Admin/login');
		}			
	}


	public function updateMapel($id){
		if ($this->is_logged_in())
        {
			$data['mapel'] = $this->M_Admin->getDataMapelById($id);
			$this->load->view('admin/header');
			$this->load->view('admin/mapel/updateMapel',$data);
			$this->load->view('admin/footer');
		}else{
			redirect('C_Admin/login');
		}			
		
	}

	public function tambahMapel(){

		if ($this->is_logged_in())
        {
			$this->load->view('admin/header');
			$this->load->view('admin/mapel/tambahMapel');
			$this->load->view('admin/footer');	
		}else{
			redirect('C_Admin/login');
		}				
	}

	public function hapusMapel($id){
		if($this->M_Admin->hapusDataMapel($id)){
			redirect('C_Admin/mapel');
		}
	}	

	public function aksiTambahMapel(){
		$id_mapel = $this->randString();
		$data = array(
			'quiz_subject_id' => $id_mapel,
			'quiz_subject_name' => $this->input->post('nama'),
			'quiz_subject_description' => $this->input->post('deskripsi'),
		);
		if($this->M_Admin->tambahDataMapel($data)){
			redirect("C_Admin/mapel");
		}
	}	

	public function aksiUpdateMapel($id){
		$data = array(
			'quiz_subject_name' => $this->input->post('nama'), 
			'quiz_subject_description' => $this->input->post('deskripsi'),

		);
		if($this->M_Admin->updateDataMapel($id,$data)){
			redirect("C_Admin/mapel");
		}
	}

}
