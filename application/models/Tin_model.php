<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertDanhMuc($tendanhmuc)
	{
		$dl = array(
			'name' =>  $tendanhmuc
			);
		return $this->db->insert('news_dir', $dl);
	}
	public function loadDanhsach()
	{
		$this->db->select('*');	
		$dl = $this->db->get('news_dir');
		$dl = $dl->result_array();
		return $dl;
	}
	public function getDataById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dl = $this->db->get('news_dir');
		$dl =  $dl->result_array();
		return $dl;
	}
	public function updateById($id,$tendanhmuc)
	{
		$dlupdate = array(
			'id' => $id,
			'name' => $tendanhmuc
			 );
		$this->db->where('id', $id);
		return $this->db->update('news_dir', $dlupdate);
	}
	public function deleteById($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('news_dir');
	}
	

	// model cho tin tuc 
	public function insertTin($tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)
	{

		$dulieu = array(
			'tieude' => $tieude, 
			'iddanhmuc' => $iddanhmuc, 
			'anhtin' => $anhtin, 
			'noidungtin' => $noidungtin,
			'trichdan' => $trichdan
			);
		$this->db->insert('tintuc', $dulieu);
		 
		return $this->db->insert_id();
	}
	public function loadDanhSachTin()
	{
		$this->db->select('*');
		$dl = $this->db->get('tintuc');
		$dl = $dl->result_array();
		return $dl ; 
		
	}
	public function updateTinById($Id,$tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)
	{
		$dulieusua = array(
			'id' =>  $Id, 
			'tieude' =>  $tieude, 
			'iddanhmuc' =>  $iddanhmuc, 
			'anhtin' =>  $anhtin, 
			'trichdan' =>  $trichdan, 
			'noidungtin' =>  $noidungtin
			);
		$this->db->where('id', $Id);
		return $this->db->update('tintuc', $dulieusua);

	}
	public function getTinById($id)
	{
		 $this->db->select('*');
 		$this->db->from('news_dir');
		 
		$this->db->join('tintuc', 'tintuc.iddanhmuc = news_dir.id', 'left');

	 	$this->db->where('tintuc.id', $id); 
		 $ketqua = $this->db->get();
		 $ketqua = $ketqua->result_array();
		 return $ketqua; 
	}

	public function getTendanhmucByIdTin($id)
	{
		$this->db->select('*');
		$this->db->from('news_dir');		 
		$this->db->join('tintuc', 'tintuc.iddanhmuc = news_dir.id', 'left');
		$this->db->where('tintuc.id', $id);
		$ketqua = $this->db->get();
		$ketqua = $ketqua->result_array();
		$ten = $ketqua[0]['name'] ; 
		return $ten ; 
	}

	public function deleteTinById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tintuc');
	}

	public function loadDanhSachTin2($sotintrong1trang)
	{		   
		$this->db->select('*');
		$this->db->join('tintuc', 'tintuc.iddanhmuc = news_dir.id', 'left'); 
		$ketqua = $this->db->get('news_dir',$sotintrong1trang,0);
		$ketqua = $ketqua->result_array();
		return $ketqua; 				 
	}
	public function soTrang($sotintrong1trang) 
	{		 
		$this->db->select('*');
		$ketqua2 = $this->db->get('tintuc');
		$ketqua2 = $ketqua2->result_array();
		$soluongtin = count($ketqua2);
		$sotrang = ceil($soluongtin/$sotintrong1trang) ; 
		return $sotrang ; 
	}

	public function loadTinTheoTrang($trangthumay,$sotintrong1trang)
	{
		$this->db->select('*');	
		$this->db->join('tintuc', 'tintuc.iddanhmuc = news_dir.id', 'left'); 
		$vitri = ($trangthumay-1)*$sotintrong1trang;
		$ketqua = $this->db->get('news_dir',$sotintrong1trang,$vitri); // table 1, use as from
		$ketqua = $ketqua->result_array();
		return $ketqua;
		// SELECT * FROM ( `news_dir`) LEFT JOIN `tintuc` ON `tintuc`.`iddanhmuc` = `news_dir`.`id` LIMIT =2 OFFSET= vitri
	}

	public function loadTinTheoDanhMuc($sotintrong1trang,$idDanhMuc)	{		   
		$this->db->select('*');	
		$this->db->join('tintuc', 'tintuc.iddanhmuc = news_dir.id', 'left'); 
		$this->db->where('tintuc.iddanhmuc', $idDanhMuc);
		$ketqua = $this->db->get('news_dir',$sotintrong1trang,0);
		$ketqua = $ketqua->result_array();
		return $ketqua; 				 
	}

	public function loadTinLienQuan($sotintrong1trang,$idDanhMuc,$idTin)	{		   
		$this->db->select('*');	
		$this->db->join('tintuc', 'tintuc.iddanhmuc = news_dir.id', 'left'); 
		$this->db->where('tintuc.iddanhmuc', $idDanhMuc);
		$this->db->where('tintuc.id !=', $idTin);

		
		$ketqua = $this->db->get('news_dir',$sotintrong1trang,0);
		$ketqua = $ketqua->result_array();
		return $ketqua; 				 
	}



	public function getIddanhmucByIdTin($id)
	{
		$this->db->select('*');
		$this->db->from('news_dir');		 
		$this->db->join('tintuc', 'tintuc.iddanhmuc = news_dir.id', 'left');
		$this->db->where('tintuc.id', $id);
		$ketqua = $this->db->get();
		$ketqua = $ketqua->result_array();
		$iddanhmuc = $ketqua[0]['iddanhmuc'] ; 
		return $iddanhmuc ; 
	}
	public function updateHeaderJson($dulieu)
	{
		$dl = array(
			'nameAttr' => 'QuanLyHeader', 
			'id' => '2', 
			'valueAttr' => $dulieu
			);
		$this->db->where('nameAttr', 'QuanLyHeader');
		return $this->db->update('homepageattr', $dl);
	}

	public function laydulieuHeader()
	{
		$this->db->select('*');
		$this->db->where('nameAttr', 'QuanLyHeader');
		$dl = $this->db->get('homepageattr');
		$dl = $dl->result_array();
		$dl = $dl[0]['valueAttr'];
		 return $dl ;
		 

	}
}

/* End of file Tin_model.php */
/* Location: ./application/models/Tin_model.php */