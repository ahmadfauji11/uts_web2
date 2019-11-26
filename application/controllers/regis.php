<?php 
defined('BASEPATH') or exit('Np direct script access allowed');

class regis extends CI_Controller
{

    public function index()
    {

    $data['title']='halaman regis';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/regis');
        $this->load->view('templates/footer');

}
}