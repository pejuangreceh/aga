<?php
class Sendingemail_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }
    public function index()
    {
        $this->load->helper('form');
        $this->load->view('contact_email_form');
    }
    public function send_mail()
    {
        // require_once(DIR . 'autoload.php');
        require_once("vendor/autoload.php");
        $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

        $apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
            new GuzzleHttp\Client(),
            $config
        );
        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
        $sendSmtpEmail['subject'] = 'Testing kirim Email dari localhost';
        $sendSmtpEmail['htmlContent'] = '<html><body><h1>Created Ticket{{params.parameter}}</h1></body></html>';
        $sendSmtpEmail['sender'] = array('name' => 'Yabes Kirim', 'email' => 'yabestelloy@gmail.com');
        $sendSmtpEmail['to'] = array(
            array('email' => 'elloyyabest@gmail.com', 'name' => 'Yabes Terima')
        );
        $sendSmtpEmail['replyTo'] = array('email' => 'elloyyabest02@gmail.com', 'name' => 'Yabes Reply');
        $sendSmtpEmail['headers'] = array('Some-Custom-Name' => 'unique-id-1234');
        $sendSmtpEmail['params'] = array('parameter' => 'My param value', 'subject' => 'New Subject');

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        }
    }
}
