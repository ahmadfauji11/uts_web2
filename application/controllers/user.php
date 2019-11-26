<?php 
defined('BASEPATH') or exit('Np direct script access allowed');

class user extends CI_Controller
{

    public function index()
    {
        $data['title']='halaman login User';
        $this->load->view('templates/header', $data);
        $this->load->view('user/index');
        $this->load->view('templates/footer');

    }
}