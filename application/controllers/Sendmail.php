<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require('mail/PHPMailerAutoload.php');

class Sendmail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('sendmail_view');
		
	}
	public function do_send()
	{
		// nhan ve thong tin da 
		$ten_nguoi_gui = $this->input->post('ten');
		$nguoinhan = $this->input->post('nguoinhan');
		$noidung = $this->input->post('noidung');


		
		$this->load->config('email');
        $this->load->library('email');
        
       // $from = $this->config->item('smtp_user');
        // $to = $this->input->post('to');
        // $subject = $this->input->post('subject');
        // $message = $this->input->post('message');

        $this->email->set_newline("\r\n");
        $this->email->from($ten_nguoi_gui);
        $this->email->to($nguoinhan);
        //$this->email->subject($subject);
        $this->email->message($noidung);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }


	// 	$mail = new PHPMailer;

	// 	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	// 	$mail->isSMTP();                                      // Set mailer to use SMTP
	// 	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	// 	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	// 	$mail->Username = 'vietndphp018@gmail.com';                 // SMTP username
	// 	$mail->Password = 'nlcuilcskmikqqra';                           // SMTP password
	// 	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	// 	$mail->Port = 587;                                    // TCP port to connect to

		
	// 	$mail->setFrom('viet@fedu.vn', $ten );
	// 	$mail->addAddress($nguoinhan);     // Add a recipient
	// 	// $mail->addAddress('ellen@example.com');               // Name is optional
	// 	// $mail->addReplyTo('info@example.com', 'Information');
	// 	// $mail->addCC('cc@example.com');
	// 	// $mail->addBCC('bcc@example.com');

	// 	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	// 	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	// 	// $mail->isHTML(true);                                  // Set email format to HTML

	// 	$mail->Subject = $ten;
	// 	$mail->Body    = $noidung;
	// //	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	// 	$mail->Charset = "UTF-8";
	// 	if(!$mail->send()) {
	// 	    echo 'Message could not be sent.';
	// 	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	// 	} else {
	// 	    echo 'Thư đã được gửi rồi .';
	// 	}
	}

}

/* End of file Sendmail.php */
/* Location: ./application/controllers/Sendmail.php */