<?php 
defined('BASEPATH') or exit('Np direct script access allowed');

class umum extends CI_Controller
{

    // public function login()
    // {
    //     $data['title']='halaman Login Admin';
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('admin/index');
    //     $this->load->view('templates/footer');

    // }
    public function index(){
        $data['title']='SMK Al-Hikmah Anjatan';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/awal');
        $this->load->view('admin/about');
        $this->load->view('admin/produk');
        $this->load->view('admin/guru');
        $this->load->view('admin/info');
        $this->load->view('templates/footer');

}
}