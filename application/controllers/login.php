<?php 
defined('BASEPATH') or exit('Np direct script access allowed');

class login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('loginn');
    }
    function index(){
            $data['title']='halaman Login Admin';
            $this->load->view('templates/headerl', $data);
            $this->load->view('admin/index');
            $this->load->view('templates/footer');
	}
 

    function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->loginn->ceklogin("user",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
 
    // function loginin() {
	// 	$where    = array(
	// 					'username' => $this->input->post('username'),
	// 					'password' => $this->input->post('password')
	// 				);
	// 	$cek      = $this->loginn->cek_login('user',$where);

	// 	if($cek->num_rows() > 0) {
 
	// 		foreach($cek->result() as $row) {
	// 			$id    = $row->id;
	// 			$user  = $row->user;
	// 		}

	// 		$sesi = array(
	// 					'id'    => $id,
	// 					'username'  => $user,
	// 					'sesi'  => TRUE
	// 				);
			
	// 		$this->session->set_userdata($sesi);

	// 		redirect(base_url('admin'));
 
	// 	} else {
	// 		$this->session->set_flashdata('gagal', '<div class="alert alert-danger alert-dismissable">
	// 													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	// 													<i class="fa fa-exclamation-circle">&nbsp;</i> <strong>Username/Password Salah!</strong>
	// 												</div>');
	// 		redirect(base_url());
	// 	}
	// }
 
	// function logout(){
	// 	$this->session->sess_destroy();
    //     redirect("login");
	// }
}