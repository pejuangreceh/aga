<?php
// nama
// username
// email
// password
// kantor
// cabang (ga wajib)
// jabatan

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
	}


	function index()
	{
		$data = "";

		$this->load->view('login', $data);
	}

	function daftar()
	{
		$id_user = trim($this->session->userdata('id_user'));
		$getkodekaryawan = $this->model_app->getkodekaryawan();

		$nik = $getkodekaryawan;
		//notification 

		$sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
		$row_listticket = $this->db->query($sql_listticket)->row();

		$data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

		$data['nik'] = $nik;
		$data['nama'] = "";
		$data['email'] = "";
		$data['alamat'] = "";
		$data['password'] = "";


		$data['dd_jk'] = $this->model_app->dropdown_jk();
		$data['id_jk'] = "";

		$data['dd_jabatan'] = $this->model_app->dropdown_jabatan();
		$data['id_jabatan'] = "";

		$data['dd_bagian_departemen'] = $this->model_app->dropdown_bag_departemen();
		$data['id_bagian_departemen'] = "";


		$data['url'] = "login/save";

		$data['flag'] = "add";

		$this->load->view('daftar', $data);
	}

	function save()
	{
		$getkodekaryawan = $this->model_app->getkodekaryawan();

		$nik = $getkodekaryawan;

		$datauser['name'] = $this->input->post('nama');
		$datauser['username'] = $nik;
		$datauser['email'] = trim($this->input->post('email'));
		$datauser['password'] = $this->input->post('password');
		$datauser['level'] = "USER";
		$datauser['kantor'] = $this->input->post('kantor');
		$datauser['cabang'] = $this->input->post('cabang');
		$datauser['jabatan'] = strtoupper(trim($this->input->post('id_jabatan')));
		$this->db->insert('user', $datauser);

		$getkodekaryawan = $this->model_app->getkodekaryawan();

		$nik = $getkodekaryawan;

		$nama = $this->input->post('nama');
		$email = trim($this->input->post('email'));
		$jk = strtoupper(trim($this->input->post('id_jk')));
		$alamat = strtoupper(trim($this->input->post('alamat')));
		$id_bagian_dept = strtoupper(trim($this->input->post('id_bagian_departemen')));
		$id_jabatan = strtoupper(trim($this->input->post('id_jabatan')));

		$data['nik'] = $nik;
		$data['nama'] = $nama;
		$data['email'] = $email;
		$data['jk'] = $jk;
		$data['alamat'] = $alamat;
		$data['id_bagian_dept'] = $id_bagian_dept;
		$data['id_jabatan'] = $id_jabatan;

		$this->db->trans_start();

		$this->db->insert('karyawan', $data);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
			redirect('login/daftar');
		} else {
			$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
			redirect('login');
		}


		redirect('login');
	}

	function login_akses()
	{

		$username = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));
		if (strpos($username, '@')) {
			$akses = $this->db->query("select A.username, A.email, B.nama, B.jk, A.level, B.id_jabatan, C.id_dept FROM user A 
		LEFT JOIN karyawan B ON B.nik = A.username
        LEFT JOIN bagian_departemen C ON C.id_bagian_dept = B.id_bagian_dept
	 WHERE A.email='$username' AND A.password = '$password'");
		} else {
			$akses = $this->db->query("select A.username, A.email, B.nama, B.jk,  A.level, B.id_jabatan, C.id_dept FROM user A 
		LEFT JOIN karyawan B ON B.nik = A.username
        LEFT JOIN bagian_departemen C ON C.id_bagian_dept = B.id_bagian_dept
	 WHERE A.username = '$username' AND A.password = '$password'");
		}

		if ($akses->num_rows() == 1) {

			foreach ($akses->result_array() as $data) {

				$session['id_user'] = $data['username'];
				$session['email'] = $data['email'];
				$session['nama'] = $data['nama'];
				$session['jk'] = $data['jk'];
				$session['level'] = $data['level'];
				$session['id_jabatan'] = $data['id_jabatan'];
				$session['id_dept'] = $data['id_dept'];

				$this->session->set_userdata($session);

				redirect('home');
			}
		} else {
			$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> username / Password salah.
			    </div>");
			redirect('login');
		}
	}


	public function logout()
	{

		$this->session->sess_destroy();

		redirect('login');
	}
}
