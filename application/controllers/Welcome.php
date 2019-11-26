<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->db->query("SET time_zone='+7:00'");
        $waktu_sql = $this->db->query("SELECT NOW() AS waktu")->row_array();
        $this->waktu_sql = $waktu_sql['waktu'];
        $this->opsi = array("a","b","c","d","e");
	}
	
	public function get_servertime() {
		$now = new DateTime(); 
        $dt = $now->format("M j, Y H:i:s O"); 

        j($dt);
	}

	public function cek_aktif() {
		if ($this->session->userdata('admin_valid') == false && $this->session->userdata('admin_id') == "") {
			redirect('login');
		} 
	}

	public function m_ujian() {
		$this->cek_aktif();
		
		//var def session
		$a['sess_level'] = $this->session->userdata('admin_level');
		$a['sess_user'] = $this->session->userdata('admin_user');
		$a['sess_konid'] = $this->session->userdata('admin_konid');

		//var def uri segment
		$uri2 = $this->uri->segment(2);
		$uri3 = $this->uri->segment(3);
		$uri4 = $this->uri->segment(4);
		//var post from json
		$p = json_decode(file_get_contents('php://input'));
		//return as json
		$jeson = array();
		
		//$a['data'] = $this->db->query("SELECT tr_guru_tes.*, m_mapel.nama AS mapel FROM tr_guru_tes INNER JOIN m_mapel ON tr_guru_tes.id_mapel = m_mapel.id WHERE tr_guru_tes.id_guru = '".$a['sess_konid']."'")->result();

		$a['pola_tes'] = array(""=>"Pengacakan Soal", "acak"=>"Soal Diacak", "set"=>"Soal Diurutkan");

		$a['p_mapel'] = obj_to_array($this->db->query("SELECT * FROM m_mapel WHERE id IN (SELECT id_mapel FROM tr_guru_mapel WHERE id_guru = '".$a['sess_konid']."')")->result(), "id,nama");
		
		if ($uri3 == "det") {
			$are = array();

			$a = $this->db->query("SELECT * FROM tr_guru_tes WHERE id = '$uri4'")->row();
			
			if (!empty($a)) {
				$pc_waktu = explode(" ", $a->tgl_mulai);
				$pc_tgl = explode("-", $pc_waktu[0]);

				$pc_terlambat = explode(" ", $a->terlambat);

				$are['id'] = $a->id;
				$are['id_guru'] = $a->id_guru;
				$are['id_mapel'] = $a->id_mapel;
				$are['nama_ujian'] = $a->nama_ujian;
				$are['jumlah_soal'] = $a->jumlah_soal;
				$are['waktu'] = $a->waktu;
				$are['terlambat'] = $pc_terlambat[0];
				$are['terlambat2'] = substr($pc_terlambat[1],0,5);
				$are['jenis'] = $a->jenis;
				$are['detil_jenis'] = $a->detil_jenis;
				$are['tgl_mulai'] = $pc_waktu[0];
				$are['wkt_mulai'] = substr($pc_waktu[1],0,5);
				$are['token'] = $a->token;
			} else {
				$are['id'] = "";
				$are['id_guru'] = "";
				$are['id_mapel'] = "";
				$are['nama_ujian'] = "";
				$are['jumlah_soal'] = "";
				$are['waktu'] = "";
				$are['terlambat'] = "";
				$are['terlambat2'] = "";
				$are['jenis'] = "";
				$are['detil_jenis'] = "";
				$are['tgl_mulai'] = "";
				$are['wkt_mulai'] = "";
				$are['token'] = "";
			}

			j($are);
			exit();
		} else if ($uri3 == "simpan") {
			$ket 	= "";

			$ambil_data = $this->db->query("SELECT id FROM m_soal WHERE id_mapel = '".bersih($p, "mapel")."' AND id_guru = '".$a['sess_konid']."'")->num_rows();


			$jml_soal_diminta = intval(bersih($p, "jumlah_soal"));
			
			if ($ambil_data < $jml_soal_diminta) {
				$ret_arr['status'] 	= "gagal";
				$ret_arr['caption']	= "Jumlah soal diinput, melebihi jumlah soal yang ada: ".$ambil_data;
			} else {
				if ($p->id != 0) {
					$this->db->query("UPDATE tr_guru_tes SET 
						id_mapel = '".bersih($p,"mapel")."', 
						nama_ujian = '".bersih($p,"nama_ujian")."', 
						jumlah_soal = '".bersih($p,"jumlah_soal")."', 
						waktu = '".bersih($p,"waktu")."', 
						terlambat = '".bersih($p,"terlambat")." ".bersih($p,"terlambat2")."', 
						tgl_mulai = '".bersih($p,"tgl_mulai")." ".bersih($p,"wkt_mulai")."', 
						jenis = '".bersih($p,"acak")."'
						WHERE id = '".bersih($p,"id")."'");
					$ket = "edit";
				} else {
					$ket = "tambah";
					$token = strtoupper(random_string('alpha', 5));

					$this->db->query("INSERT INTO tr_guru_tes VALUES (
						null, 
						'".$a['sess_konid']."', 
						'".bersih($p,"mapel")."',
						'".bersih($p,"nama_ujian")."', 
						'".bersih($p,"jumlah_soal")."', 
						'".bersih($p,"waktu")."', 
						'".bersih($p,"acak")."', 
						'', 
						'".bersih($p,"tgl_mulai")." ".bersih($p,"wkt_mulai")."', 
						'".bersih($p,"terlambat")." ".bersih($p,"terlambat2")."', 
						'$token')");
				}


				$ret_arr['status'] 	= "ok";
				$ret_arr['caption']	= $ket." sukses";
			}
			j($ret_arr);
			exit();
		} else if ($uri3 == "hapus") {
			$this->db->query("DELETE FROM tr_guru_tes WHERE id = '".$uri4."'");
			$ret_arr['status'] 	= "ok";
			$ret_arr['caption']	= "hapus sukses";
			j($ret_arr);
			exit();
		} else if ($uri3 == "data") {
				$start = $this->input->post('start');
		        $length = $this->input->post('length');
		        $draw = $this->input->post('draw');
		        $search = $this->input->post('search');

		        $d_total_row = $this->db->query("SELECT a.id
		        	FROM tr_guru_tes a
		        	INNER JOIN m_mapel b ON a.id_mapel = b.id 
		        	WHERE a.id_guru = '".$a['sess_konid']."' 
                    AND (a.nama_ujian LIKE '%".$search['value']."%' 
					OR b.nama LIKE '%".$search['value']."%')")->num_rows();
		    	
		    	//echo $this->db->last_query();

		        $q_datanya = $this->db->query("SELECT a.*, b.nama AS mapel
												FROM tr_guru_tes a
									        	INNER JOIN m_mapel b ON a.id_mapel = b.id 
									        	WHERE a.id_guru = '".$a['sess_konid']."'
							                    AND (a.nama_ujian LIKE '%".$search['value']."%'
												OR b.nama LIKE '%".$search['value']."%') 
		                                        ORDER BY a.id DESC LIMIT ".$start.", ".$length."")->result_array();
		        $data = array();
		        $no = ($start+1);

		        foreach ($q_datanya as $d) {
		        	$jenis_soal = $d['jenis'] == "acak" ? "Soal diacak" : "Soal urut";
                
		            $data_ok = array();
		            $data_ok[0] = $no++;
		            $data_ok[1] = $d['nama_ujian']."<br>Token : <b>".$d['token']."</b> &nbsp;&nbsp; <a href='#' onclick='return refresh_token(".$d['id'].")' title='Perbarui Token'><i class='fa fa-refresh'></i></a>";
		            $data_ok[2] = $d['mapel'];
		            $data_ok[3] = $d['jumlah_soal'];
		            $data_ok[4] = tjs($d['tgl_mulai'],"s")."<br>(".$d['waktu']." menit)";
		            $data_ok[5] = $jenis_soal;
		            $data_ok[6] = '
		            	<div class="btn-group">
                          <a href="#" onclick="return m_ujian_e('.$d['id'].');" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil" style="margin-left: 0px; color: #fff"></i> &nbsp;&nbsp;Edit</a>
                          <a href="#" onclick="return m_ujian_h('.$d['id'].');" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove" style="margin-left: 0px; color: #fff"></i> &nbsp;&nbsp;Hapus</a>
                        </div>
	                         ';

		            $data[] = $data_ok;
		        }

		        $json_data = array(
		                    "draw" => $draw,
		                    "iTotalRecords" => $d_total_row,
		                    "iTotalDisplayRecords" => $d_total_row,
		                    "data" => $data
		                );
		        j($json_data);
		        exit;
		} else if ($uri3 == "refresh_token") {
			$token = strtoupper(random_string('alpha', 5));

			$this->db->query("UPDATE tr_guru_tes SET token = '$token' WHERE id = '$uri4'");

			$ret_arr['status'] = "ok";
			j($ret_arr);
			exit();
		} else {
			$a['p']	= "m_guru_tes";
		}
		if($a['sess_level'] == "admin"){
		cek_hakakses(array("admin"), $this->session->userdata('admin_level'));
		$this->load->view('dashboard/template/header', $a);
		$this->load->view('dashboard/admin/menu', $a);
		$this->load->view('dashboard/admin/verifikasisoal', $a);
		$this->load->view('dashboard/template/footer', $a);
		}else if ($a['sess_level'] == "guru"){
			cek_hakakses(array("guru"), $this->session->userdata('admin_level'));
			$this->load->view('dashboard/template/header', $a);
			$this->load->view('dashboard/trainer/tambah_ujian', $a);
			$this->load->view('dashboard/template/footer', $a);
		}
	}

	public function get_akhir($tabel, $field, $kode_awal, $pad) {
		$get_akhir	= $this->db->query("SELECT MAX($field) AS max FROM $tabel LIMIT 1")->row();
		$data		= (intval($get_akhir->max)) + 1;
		$last		= $kode_awal.str_pad($data, $pad, '0', STR_PAD_LEFT);
	
		return $last;
	}
	
}
