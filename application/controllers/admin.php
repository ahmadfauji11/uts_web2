<?php 
defined('BASEPATH') or exit('Np direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('adm');
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }
    

    public function creat()
    {
        // $this->adm->creatdat();
        // redirect("admin");

        
    $data = array(

        'username' => $this->input->post('username'),
        'password' => password_hash($this->input->post('password'),
                        PASSWORD_DEFAULT
                        ),
        'status' => $this->input->post('status'),
        'nama' => $this->input->post('nama'),
        'email' => $this->input->post('email'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'alamat' => $this->input->post('alamat')
        
        
        );
        // var_dump($data);
        // die;
        $this->db->insert('user', $data);
        redirect('admin/tabel');
    }
    public function creatsiswa()
    {
        // $this->adm->creatdat();
        // redirect("admin");

        
    $data = array(

        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'agama' => $this->input->post('agama'),
        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        'alamat' => $this->input->post('alamat')
        
        
        );
        // var_dump($data);
        // die;
        $this->db->insert('siswa', $data);
        redirect('admin/tabel');
    }


    // public function update($id){
    //     $data['row']=$this->adm->getdata($id);
    //     redirect("admin");
    // }

    // public function updatesisawa($nim){
    //     $data['row']=$this->adm->getsiswa($nim);
    //     redirect("admin");
    // }
    function edituser($id){
		$where = array('id' => $id);
		$data['user'] = $this->adm->edit_data($where,'user')->result();
		$this->load->view('edituser',$data);
    }
    // function update(){
    //     'username' => $this->input->post('username'),
    //     'status' => $this->input->post('status'),
    //     'nama' => $this->input->post('nama'),
    //     'email' => $this->input->post('email'),
    //     'tgl_lahir' => $this->input->post('tgl_lahir'),
    //     'alamat' => $this->input->post('alamat')
     
    //     $data = array(
  
    //         'username' => $username,
    //         'status' => $status,
    //         'nama' => $nama,
    //         'email' => $email,
    //         'tgl_lahir' => $tgl_lahir,
    //         'alamat' => $alamat
    //     );
     
    //     $where = array(
    //         'id' => $id
    //     );
     
    //     $this->m_data->update_data($where,$data,'user');
    //     redirect('admin/tabel');
    // }
    public function index(){
        $data['title']='SMK Al-Hikmah Anjatan';
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/awal');
        $this->load->view('admin/about');
        $this->load->view('admin/produk');
        $this->load->view('admin/guru');
        $this->load->view('admin/info');
        $this->load->view('templates/footer');

    }
    public function awal(){
        $data['title']='SMK Al-Hikmah Anjatan';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/awal');
        $this->load->view('admin/about');
        $this->load->view('admin/produk');
        $this->load->view('templates/footer');
        
    }
    public function tabel(){
        $data['title']='SMK Al-Hikmah Anjatan';
        $data['Member'] = $this->db->get('user')->result_array();
        $data['Siswa'] = $this->db->get('siswa')->result_array();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/total');
        $this->load->view('admin/tabel');
        // $this->load->view('admin/kelas');
        $this->load->view('admin/siswa');
        // $this->load->view('admin/pelajaran');
        $this->load->view('templates/footer');
        
    }
    public function sekolah(){
        $data['title']='SMK Al-Hikmah Anjatan';
        $data['Member'] = $this->db->get('siswa')->result_array();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/sekolah');
        $this->load->view('templates/footer');
        
    }
    public function insertuser(){
        $data['title']='SMK Al-Hikmah Anjatan';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/insertuser');
        $this->load->view('templates/footer');
        
    }

    public function insertsiswa(){
        $data['title']='SMK Al-Hikmah Anjatan';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/insertsiswa');
        $this->load->view('templates/footer');
        
    }
    public function inputinfo(){
        $data['title']='SMK Al-Hikmah Anjatan';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/inputinfo');
        $this->load->view('templates/footer');
        
    }
    public function delete($id){
        $data['title']='SMK Al-Hikmah Anjatan';
        $this->adm->deleteuser($id);
        $this->load->view('admin/tabel', $data);
    }
    public function deletesiswa($nim){
        $data['title']='SMK Al-Hikmah Anjatan';
        $this->adm->deleteSiswa($nim);
        $this->load->view('admin/tabel', $data);
    }
}