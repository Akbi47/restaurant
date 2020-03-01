<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->model('slides_model');
		$dl = $this->slides_model->layDuLieuSlide();
		$dl = array('mangdl' => $dl);
		$this->load->view('trangchu', $dl);
	}
	public function datban()
	{
		$tenkh = $this->input->post('tenkh');
		$email = $this->input->post('email');
		$sdt = $this->input->post('sdt');
		$ngaydatban = $this->input->post('ngaydatban');
		$giodatban = $this->input->post('giodatban');
		$a = (string) $ngaydatban;
		$b = (string) $giodatban;
		$giodatban = $a . " " . $b;
		$songuoi = $this->input->post('songuoi');

		// goi model ra , va insert va cs dl 
		$this->load->model('slides_model');
		if ($this->slides_model->booking($tenkh, $email, $sdt, $ngaydatban, $giodatban, $songuoi)) {


			$this->load->config('email');
			$this->load->library('email');
			$config['crlf'] = "\r\n"; //double quotes ("), not single (') 
			$config['newline'] = "\r\n";  //double quotes ("), not single (') 
			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from('anhkhoaquachvo@gmail.com', 'Stephen Watt');
			$this->email->to('Grale1961@superrito.com');
			//$this->email->subject($subject);
			$this->email->subject("Thông báo có khách vừa đặt bàn tên là : " . $tenkh . "và mobile: " . $sdt . "và email: " . $email);
			$this->email->message("Tên : " . $tenkh . "\n" . "Điện thoại : " . $sdt . " Thời gian : ngày" . $a . "lúc" . $b);
			if ($this->email->send()) {
				echo 'Your Email has successfully been sent.';
				$this->load->view('thanhcong');
			} else {
				show_error($this->email->print_debugger());
			}
		} else {
			$this->load->view('thatbai');
		}
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
