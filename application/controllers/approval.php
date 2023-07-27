<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends CI_Controller
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





    function approval_list()
    {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/approval";

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

        $data['link'] = "approval_kabag/hapus";



        $dataapproval = $this->model_app->dataapproval($id_dept);
        $data['dataapproval'] = $dataapproval;


        $this->load->view('template', $data);
    }

    function approval_no($ticket)
    {

        $data['status'] = 0;
        $email = $this->model_app->getemailapproval($ticket);

        $id_user = trim($this->session->userdata('id_user'));
        $tanggal = $time = date("Y-m-d  H:i:s");

        $tracking['id_ticket'] = $ticket;
        $tracking['tanggal'] = $tanggal;
        $tracking['status'] = "Ticket tidak disetujui";
        $tracking['deskripsi'] = "";
        $tracking['id_user'] = $id_user;


        $this->db->trans_start();

        $this->db->where('id_ticket', $ticket);
        $this->db->update('ticket', $data);

        $this->db->insert('tracking', $tracking);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            redirect('approval/approval_list');
        } else {
            // NOTIFIKASI EMAIL
            // require_once("vendor/autoload.php");
            // $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

            // $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
            //     new GuzzleHttp\Client(),
            //     $config
            // );
            // $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
            // $sendSmtpEmail['subject'] = 'Ticket Approved';
            // $sendSmtpEmail['htmlContent'] = "<html><body><h1>Tiket Anda Tidak Ditolak</h1><p>Ticket Anda telah ditolak sementara oleh Admin pada tanggal $tanggal</p></body></html>";
            // $sendSmtpEmail['sender'] = array('name' => 'Admin', 'email' => 'yabestelloy@gmail.com');
            // $sendSmtpEmail['to'] = array(
            //     array('email' => $email, 'name' => $email)
            // );
            // $sendSmtpEmail['replyTo'] = array('email' => 'yohanaadella@gmail.com', 'name' => 'Admin');
            // $sendSmtpEmail['headers'] = array('Some-Custom-Name' => 'unique-id-1234');
            // $sendSmtpEmail['params'] = array('parameter' => 'My param value', 'subject' => 'New Subject');
            // $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            // print_r($result);
            // END NOTIFIKASI EMAIL
            redirect('approval/approval_list');
        }
    }

    function approval_reaction($ticket)
    {

        $data['status'] = 1;

        $id_user = trim($this->session->userdata('id_user'));
        $tanggal = $time = date("Y-m-d  H:i:s");

        $tracking['id_ticket'] = $ticket;
        $tracking['tanggal'] = $tanggal;
        $tracking['status'] = "Ticket dikembalikan ke posisi belum di setujui";
        $tracking['deskripsi'] = "";
        $tracking['id_user'] = $id_user;


        $this->db->trans_start();

        $this->db->where('id_ticket', $ticket);
        $this->db->update('ticket', $data);

        $this->db->insert('tracking', $tracking);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            redirect('approval/approval_list');
        } else {

            redirect('approval/approval_list');
        }
    }

    function approval_yes($ticket)
    {
        $email = $this->model_app->getemailapproval($ticket);
        $data['status'] = 2;

        $id_user = trim($this->session->userdata('id_user'));
        $tanggal = $time = date("Y-m-d  H:i:s");

        $tracking['id_ticket'] = $ticket;
        $tracking['tanggal'] = $tanggal;
        $tracking['status'] = "Ticket disetujui";
        $tracking['deskripsi'] = "";
        $tracking['id_user'] = $id_user;

        $this->db->trans_start();

        $this->db->where('id_ticket', $ticket);
        $this->db->update('ticket', $data);

        $this->db->insert('tracking', $tracking);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            redirect('approval/approval_list');
        } else {
            // NOTIFIKASI EMAIL
            // require_once("vendor/autoload.php");
            // $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

            // $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
            //     new GuzzleHttp\Client(),
            //     $config
            // );
            // $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
            // $sendSmtpEmail['subject'] = 'Ticket Approved';
            // $sendSmtpEmail['htmlContent'] = "<html><body><h1>Tiket Anda Sudah Disetujui</h1><p>Ticket Anda telah disetujui Admin pada tanggal $tanggal</p></body></html>";
            // $sendSmtpEmail['sender'] = array('name' => 'Admin', 'email' => 'yabestelloy@gmail.com');
            // $sendSmtpEmail['to'] = array(
            //     array('email' => $email, 'name' => $email)
            // );
            // $sendSmtpEmail['replyTo'] = array('email' => 'yohanaadella@gmail.com', 'name' => 'Admin');
            // $sendSmtpEmail['headers'] = array('Some-Custom-Name' => 'unique-id-1234');
            // $sendSmtpEmail['params'] = array('parameter' => 'My param value', 'subject' => 'New Subject');
            // $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            // print_r($result);
            // END NOTIFIKASI EMAIL
            redirect('approval/approval_list');
        }
    }

    function hapus()
    {
        $id = $_POST['id'];

        $this->db->trans_start();

        $this->db->where('id_jabatan', $id);
        $this->db->delete('jabatan');

        $this->db->trans_complete();
    }

    function approval()
    {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_jabatan";

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

        $data['url'] = "jabatan/save";

        $data['id_jabatan'] = "";
        $data['nama_jabatan'] = "";


        $this->load->view('template', $data);
    }
}
