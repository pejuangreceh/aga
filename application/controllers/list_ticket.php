<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_ticket extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_app');


        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
            redirect('login');
        }
    }


    function ticket_list()
    {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/list_ticket";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));

        //notification 

        $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
        $row_listticket = $this->db->query($sql_listticket)->row();

        $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

        $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
        $row_approvalticket = $this->db->query($sql_approvalticket)->row();

        $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

        $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
        $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

        $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

        //end notification

        $datalist_ticket = $this->model_app->datalist_ticket();
        $data['datalist_ticket'] = $datalist_ticket;

        $this->load->view('template', $data);
    }
    function klasifikasi()
    {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/klasifikasi";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));

        $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
        $row_listticket = $this->db->query($sql_listticket)->row();

        $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

        $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
        $row_approvalticket = $this->db->query($sql_approvalticket)->row();

        $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

        $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
        $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

        $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

        //end notification

        $datalist_ticket = $this->model_app->datalist_klasifikasi();
        $data['datalist_ticket'] = $datalist_ticket;

        $this->load->view('template', $data);
    }




    function assignment()
    {

        $id_ticket = strtoupper(trim($this->input->post('id_ticket')));
        $id_teknisi = strtoupper(trim($this->input->post('id_teknisi')));

        $id_user = trim($this->session->userdata('id_user'));
        $tanggal = $time = date("Y-m-d  H:i:s");

        $data['id_teknisi'] = $id_teknisi;
        $data['status'] = 3;


        $tracking['id_ticket'] = $id_ticket;
        $tracking['tanggal'] = $tanggal;
        $tracking['status'] = "Pemilihan Teknisi";
        $tracking['deskripsi'] = "TICKET DIBERIKAN KEPADA TEKNISI";
        $tracking['id_user'] = $id_user;

        $this->db->trans_start();

        $this->db->where('id_ticket', $id_ticket);
        $this->db->update('ticket', $data);

        $this->db->insert('tracking', $tracking);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
                </div>");
            redirect('list_ticket/ticket_list');
        } else {
            $this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
                </div>");
            redirect('list_ticket/ticket_list');
        }
    }

    function view_progress_teknisi($id)
    {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/progress_teknisi";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));

        //notification 

        $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
        $row_listticket = $this->db->query($sql_listticket)->row();

        $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

        $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
        $row_approvalticket = $this->db->query($sql_approvalticket)->row();

        $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

        $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
        $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

        $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

        //end notification

        $sql = "SELECT A.status, A.progress, A.tanggal,  A.tanggal_proses, A.tanggal_solved, F.nama AS nama_teknisi, D.nama, C.id_kategori, A.id_ticket, A.tanggal, B.nama_sub_kategori, C.nama_kategori
                FROM ticket A 
                LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
                LEFT JOIN karyawan D ON D.nik = A.reported 
                LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
                LEFT JOIN karyawan F ON F.nik = E.nik 
                WHERE A.id_ticket = '$id'";

        $row = $this->db->query($sql)->row();

        $id_kategori = $row->id_kategori;

        $data['dd_teknisi'] = $this->model_app->dropdown_teknisi($id_kategori);
        $data['id_teknisi'] = "";

        $data['id_ticket'] = $id;
        $data['nama_teknisi'] = $row->nama_teknisi;
        $data['tanggal'] = $row->tanggal;
        $data['nama_sub_kategori'] = $row->nama_sub_kategori;
        $data['nama_kategori'] = $row->nama_kategori;
        $data['reported'] = $row->nama;
        $data['progress'] = $row->progress;
        $data['tanggal_proses'] = $row->tanggal_proses;
        $data['tanggal'] = $row->tanggal;
        $data['tanggal_solved'] = $row->tanggal_solved;

        //TRACKING TICKET
        $data_trackingticket = $this->model_app->data_trackingticket($id);
        $data['data_trackingticket'] = $data_trackingticket;


        $this->load->view('template', $data);
    }

    public function pdflistticket()
    {

        $datalist_ticket = $this->model_app->datalist_ticket();
        $data['datalist_ticket'] = $datalist_ticket;


        ob_start();
        $content = $this->load->view('body/pdflistticket', $data);
        $content = ob_get_clean();
        $this->load->library('html2pdf');
        try {
            $html2pdf = new HTML2PDF('L', 'A4', 'en');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('Report_ppic.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    function pilih_teknisi($id)
    {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/pilih_teknisi";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id_user = trim($this->session->userdata('id_user'));

        //notification 

        $sql_listticket = "SELECT COUNT(id_ticket) AS jml_list_ticket FROM ticket WHERE status = 2";
        $row_listticket = $this->db->query($sql_listticket)->row();

        $data['notif_list_ticket'] = $row_listticket->jml_list_ticket;

        $sql_approvalticket = "SELECT COUNT(A.id_ticket) AS jml_approval_ticket FROM ticket A 
        LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori 
        LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN bagian_departemen E ON E.id_bagian_dept = D.id_bagian_dept WHERE E.id_dept = $id_dept AND status = 1";
        $row_approvalticket = $this->db->query($sql_approvalticket)->row();

        $data['notif_approval'] = $row_approvalticket->jml_approval_ticket;

        $sql_assignmentticket = "SELECT COUNT(id_ticket) AS jml_assignment_ticket FROM ticket WHERE status = 3 AND id_teknisi='$id_user'";
        $row_assignmentticket = $this->db->query($sql_assignmentticket)->row();

        $data['notif_assignment'] = $row_assignmentticket->jml_assignment_ticket;

        //end notification

        $sql = "SELECT A.status, D.nama, C.id_kategori, A.id_ticket, A.tanggal, A.gejala, B.nama_sub_kategori, C.nama_kategori
                FROM ticket A 
                LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                LEFT JOIN kategori C ON C.id_kategori = B.id_kategori 
                LEFT JOIN karyawan D ON D.nik = A.reported 
                WHERE A.id_ticket = '$id'";
        $row = $this->db->query($sql)->row();



        // $id_kategori = $row->id_kategori;

        $data['url'] = "list_ticket/assignment";

        $data['dd_teknisi'] = $this->model_app->dropdown_teknisi();
        $data['id_teknisi'] = "";
        $data['id_ticket'] = $id;
        $data['tanggal'] = $row->tanggal;
        $data['nama_sub_kategori'] = $row->nama_sub_kategori;
        $data['nama_kategori'] = $row->nama_kategori;
        $data['reported'] = $row->nama;
        $data['gejala'] = $row->gejala;
        $array_gejala = explode(',', $data['gejala']);
        $data['gejala_teknisi'] = $this->model_app->datateknisi();
        // MULAI PERHITUNGAN
        $data['presentase'] = array();
        // perulangan mengambil seluruh data teknisi dan basis aturan gejala tiap teknisi
        foreach ($data['gejala_teknisi'] as $d) {
            $i = 0;
            $temp_gejala = array();
            // echo $d->id_teknisi . " = ";
            foreach ($array_gejala as $g) {
                $temp_array = explode(',', $d->gejala);
                if (in_array($g, $temp_array)) {
                    // echo " $g ";
                    $i++;
                    // Simpan gejala dalam array $temp_gejala
                    $temp_gejala[] = $g;
                } else {
                    $temp_gejala[] = 0;
                }
            }
            // Jika Teknisi relevan (punya 4 gejala yang sama) maka simpan array gejala dalam variabel $data['presentase'] dengan key $d->id_teknisi
            if ($i >= 4) {
                $data['presentase'][$d->id_teknisi] = $temp_gejala;
            }
        }
        // DEBUG
        // echo '<br>PRESENTASE 1 ';
        // echo '<pre>';
        // print_r($data['presentase']);
        // echo '</pre>';

        // MENGHITUNG DATA PRESENTASE YANG RELEVAN TERHADAP GEJALA YANG DIINPUTKAN
        $total_teknisi_relevan = count($data['presentase']);
        // copy data untuk diubah lalu lakukan pembagian dengan jumlah teknisi relevan
        $data['presentase2'] = $data['presentase'];
        foreach ($data['presentase'] as $t => $value) {
            $temp_gejala = array();
            for ($i = 0; $i < count($value); $i++) {
                if ($value[$i] != 0) {
                    # code...
                    $temp_gejala[] = 1 / $total_teknisi_relevan;
                } else {
                    $temp_gejala[] = 0 / $total_teknisi_relevan;
                }
            }
            $data['presentase2'][$t] = $temp_gejala;
        }
        // DEBUG
        // echo 'PRESENTASE 2 <pre>';
        // print_r($data['presentase2']);
        // echo '</pre>';

        // MENGHITUNG TEKNISI TERHADAP GEJALA
        $data['presentase3'] = $data['presentase2'];
        foreach ($data['presentase2'] as $t => $value) {
            $temp_gejala = array();
            for ($i = 0; $i < count($value); $i++) {

                if ($value[$i] != 0) {
                    # code...
                    $temp_gejala[] = $value[$i] * 0.17;
                } else {
                    $temp_gejala[] = 0;
                }
            }
            $data['presentase3'][$t] = $temp_gejala;
        }
        // DEBUG
        // echo 'PRESENTASE 3 <pre>';
        // print_r($data['presentase3']);
        // echo '</pre>';

        $sumArray = array();

        // Perulangan untuk menjumlahkan nilai berdasarkan indeks
        foreach ($data['presentase3'] as $key => $value) {
            for ($i = 0; $i < count($value); $i++) {
                if (isset($sumArray[$i])) {
                    $sumArray[$i] += $value[$i];
                } else {
                    $sumArray[$i] = $value[$i];
                }
            }
        }
        // DEBUG
        // echo 'TOTAL PERKALIAN TIAP TEKNISI * 1 / 6 <pre>';
        // print_r($sumArray);
        // echo '</pre>';

        // MENGHITUNG PEMBAGIAN TEKNISI UNTUK TOTAL SKOR
        $data['rekomendasi_teknisi'] = array();
        $data['presentase_rekomendasi_teknisi'] = array();
        $data['presentase4'] = $data['presentase3'];
        foreach ($data['presentase3'] as $t => $value) {
            $temp_gejala = array();
            for ($i = 0; $i < count($value); $i++) {

                if ($value[$i] != 0) {
                    $temp_gejala[] = $value[$i] / $sumArray[$i];
                } else {
                    $temp_gejala[] = 0;
                }
            }
            $data['rekomendasi_teknisi'][$t] = array_sum($temp_gejala);
            // $data['presentase_rekomendasi_teknisi'][$t] = $data['rekomendasi_teknisi'][$t] / array_sum($data['rekomendasi_teknisi']) * 100;
            $data['presentase4'][$t] = $temp_gejala;
        }
        // DEBUG
        // echo 'PRESENTASE 4 <pre>';
        // print_r($data['presentase4']);
        // echo '</pre>';
        // DEBUG
        // echo 'HASIL AKHIR REKOMENDASI <pre>';
        // print_r($data['rekomendasi_teknisi']);
        // echo '</pre>';

        foreach ($data['rekomendasi_teknisi'] as $key => $value) {
            $data['presentase_rekomendasi_teknisi'][$key] = $value / array_sum($data['rekomendasi_teknisi']) * 100;
        }
        // DEBUG
        // echo 'HASIL AKHIR PRESENTASE REKOMENDASI <pre>';
        // print_r($data['presentase_rekomendasi_teknisi']);
        // echo '</pre>';
        // SORTING
        arsort($data['presentase_rekomendasi_teknisi']);

        // DEBUG
        // foreach ($data['presentase_rekomendasi_teknisi'] as $key => $value) {
        //     echo "$key => $value <br>";
        // }
        // SELESAI PERHITUNGAN
        $this->load->view('template', $data);
    }
    function hitung($a = NULL)
    {
    }
}
