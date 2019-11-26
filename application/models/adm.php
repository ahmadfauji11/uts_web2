<?php 
defined('BASEPATH') or exit('Np direct script access allowed');

class adm extends CI_Model
{


public function deleteuser($id){
$this->db->delete('user',['id'=>$id]);
}
public function deletesiswa($nim){
    $this->db->delete('siswa',['nim'=>$nim]);
    }
    
public function creatdat(){

    $data = array(

    'username' => $this->input->post('username'),
    'password' => $this->input->post('password'),
    'status' => $this->input->post('status'),
    'nama' => $this->input->post('nama'),
    'email' => $this->input->post('email'),
    'tgl_lahir' => $this->input->post('tgl_lahir'),
    'alamat' => $this->input->post('alamat')
    
    
    );
    var_dump($data);
    die;
    $this->db->insert('user', $data);
    
}
function edit_data($where,$table){		
    return $this->db->get_where($table,$where);
}
function update_data($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
}

    // public function getdata($id){
    //     $data =  $this->db->query("SELECT * FROM user WHERE id = '".$id"' ");
    //     return $query;
    // }

// public function getsiswa($nim){
//     $query= $this->db->query('SELECT*FROM siswa WHERE 'nim' ='. $nim);
//     return->$query->row();
// }



}