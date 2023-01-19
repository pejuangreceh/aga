<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coba_email extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_app');
    }
    public function index()
    {
        $this->load->view('coba_email');
    }
    public function send_email()
    {
        // $email = $this->input->post('email');
        // $subject = $this->input->post('subject');
        // $pesan = $this->input->post('pesan');

        if (!empty($email)) {
            $config = array(
                'protocol' => 'smtp',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                // 'smtp_host' => 'smtp.mail.yahoo.com',
                // 'smtp_user' => 'yabestelloy@yahoo.com',
                // 'smtp_pass' => 'satuduatiga',
                'smtp_port' => '25',
            );
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from('yabestelloy@yahoo.com', 'Yabes');
            $this->email->to('elloyyabest@gmail.com');
            $this->email->subject('test subjek');
            $this->email->message('test pesan');

            return $this->email->send();

            if ($this->email->send()) {
                echo "Email berhasil dikirimkan";
            } else {
                show_error($this->email->print_debbuger());
            }
        }
    }
}
