<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class slides_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function layDuLieuSlide()
	{
		$this->db->select('*');
		$this->db->where('nameAttr', 'slides_topbanner');
		$dl = $this->db->get('homepageattr');
		$dl = $dl->result_array();
		// echo '<pre>';
		// print_r($dl);
		foreach ($dl as $value) {
			$tg = $value['valueAttr'];
		}

	 	return $tg; 
		 
	}

	public function updateDuLieuSlide($dulieucanupdate)
	{
		// lay du lieu can update 
		$chuanbidulieu = array(
			'nameAttr' => 'slides_topbanner',
			'valueAttr' => $dulieucanupdate
			 );
		
		$this->db->where('nameAttr', 'slides_topbanner');
		return $this->db->update('homepageattr', $chuanbidulieu);
	}
	public function booking($tenkh,$email,$sdt,$ngaydatban,$giodatban,$songuoi)
	{
		$khachhang = array(
			'tenkh' => $tenkh,
			'email' => $email,
			'sdt' => $sdt,
			'ngaydatban' => $ngaydatban,
			'giodatban' => $giodatban,
			'songuoi' => $songuoi
			 );
		 
		return $this->db->insert('datban', $khachhang);
	}

}

/* End of file slides_model.php */
/* Location: ./application/models/slides_model.php */