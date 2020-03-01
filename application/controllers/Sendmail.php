<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
	}

}

/* End of file Sendmail.php */
/* Location: ./application/controllers/Sendmail.php */