<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('test_view');
	}
	public function addSlide()
	{
		echo basename($_FILES["slide_image"]["name"]); 
	//	$slide_image = base_url().'uploads/'.basename( $_FILES["slide_image"]["name"]);
	
		$slide_image = $this->input->post('slide_image');
		echo "<pre>";
		var_dump($slide_image);
		echo "</pre>";
		
		 
		
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */