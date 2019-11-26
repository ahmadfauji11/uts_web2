<?php 
defined('BASEPATH') or exit('Np direct script access allowed');

class auth extends CI_Controller
{

    public function index()
    {
        $data['title']='halaman login';
        $this->load->view('auth/header',$data);
        $this->load->view('auth/index');
        $this->load->view('auth/footer');

    }
}