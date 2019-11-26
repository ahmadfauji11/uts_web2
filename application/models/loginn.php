<?php 
defined('BASEPATH') or exit('Np direct script access allowed');

class loginn extends CI_Model{	
	function ceklogin($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	// public function __construct() {
	// 	$this->load->database();
		
	// 	}	
		
	// }
	// public function cek_login(){
	// 	$where    = array(
	// 					'username' => $this->input->post('username'),
	// 					'password' => $this->input->post('password'),
	// 					'status' => TRUE
	// 				);
	// 	return $this->db->get_where('user',$where);
	// }
}