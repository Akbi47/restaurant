<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tintuc extends CI_Controller {
	 
	private $soluongtin1trang; 
	 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tin_model');
		$this->soluongtin1trang = 3 ; 
	}

	public function index()
	{
		$dl = $this->tin_model->loadDanhSachTin2($this->soluongtin1trang); 
		$sotrang = $this->tin_model->soTrang($this->soluongtin1trang); 
		$danhmuc = $this->tin_model->loadDanhsach();

		$mangdl =  array(
			'dulieutin' => $dl,
			'sotrang' => $sotrang,
			'cacdanhmuc' => $danhmuc
			 );
		 $this->load->view('news',$mangdl);

	}
	public function page($trang)
	{
 
		// tính vị trí
		 $dl = $this->tin_model->loadTinTheoTrang($trang,$this->soluongtin1trang);

		$sotrang = $this->tin_model->soTrang($this->soluongtin1trang); 
		$danhmuc = $this->tin_model->loadDanhsach();
		 
		 


		$mangdl =  array(
			'dulieutin' => $dl,
			'sotrang' => $sotrang,
			'cacdanhmuc' => $danhmuc
			 );


		 $this->load->view('news',$mangdl);
 
	}
	public function chiTietTin($idTin)
	{
		$dl = $this->tin_model->getTinById($idTin);
		$danhmuc = $this->tin_model->loadDanhsach();
		// lay ve id cua danh muc
		$idDanhMuc = $this->tin_model->getIdDanhMucByIdTin($idTin);
		 
		 // lay ve du lieu ma co id trùng vơi id của dòng trên 
		$tinlienquan = $this->tin_model->loadTinLienQuan($this->soluongtin1trang,$idDanhMuc,$idTin);
 
		$dulieunguoidung =  array(
			'suachua' => 'vinamilk',
			'suatuoi' => 'TRUEMILK'
			 );


		$this->session->set_userdata($dulieunguoidung);

		 
		//$this->session->unset_userdata('suachua' );
		//$this->session->unset_userdata('suachua' );
		 


		$dl = array(
			'dulieutin' => $dl,
			'cacdanhmuc' => $danhmuc,
			'tinlienquan' => $tinlienquan
		 );
		$this->load->view('news_detail', $dl, FALSE);
	}

	public function danhmuc($idDanhMuc)
	{
		$dl = $this->tin_model->loadTinTheoDanhMuc($this->soluongtin1trang,$idDanhMuc); 		 
		$sotrang = $this->tin_model->soTrang($this->soluongtin1trang); 
		$danhmuc = $this->tin_model->loadDanhsach();

		$mangdl =  array(
			'dulieutin' => $dl,
			'sotrang' => $sotrang,
			'cacdanhmuc' => $danhmuc
			 );
		 $this->load->view('news',$mangdl);
	}
	public function themDLHeader()
	{
		$dlHeader = array(
			'mangXH' => array(
				'linkFB' => "http" , 
				'linkTwitter' => "http" , 
				'linkP' => "http" , 
				'linkGP' => "http"  
				),
			'soHotLine' => array(
				'textHotLine' => "Gọi để đặt bàn", 
				'soDT' => "0934 688 632" 
				),
			'gioMoCua' => array(
				'text' => "Giờ mở cửa", 
				'gio' => "9h - 8h"
				),
			'logo' => "http://127.0.0.1:4001/bai5slide//uploads/1.jpg" 

			);
		$dlHeader = json_encode($dlHeader);
		if($this->tin_model->updateHeaderJson($dlHeader))
		{
			echo ' <div class="alert alert-success" role="alert">    <strong>Thanh công !</strong>  </div>';
		}
		else 
		{
			echo ' <div class="alert alert-warning" role="alert">    <strong>That bai !</strong>  </div>';
		}
	}
	public function quanLyHeader()
	{
		$dl =  $this->tin_model->laydulieuHeader();
		
		// giai ma json 
		$dl = json_decode($dl,true);
		$dulieu = array('dulieu' => $dl );
		 
		 $this->load->view('quanLyHeader', $dulieu, FALSE);
		  
	}
	public function suaheader()
	{
		$linkFB = $this->input->post('linkFB');
		$linkGP = $this->input->post('linkGP');
		$linkP = $this->input->post('linkP');
		$linkTwitter = $this->input->post('linkTwitter');
		$soHotLine = $this->input->post('soHotLine');
		$textHotLine = $this->input->post('textHotLine');
		$gio = $this->input->post('gio');
		$text = $this->input->post('text');
		$soDT = $this->input->post('soDT');

		// xu ly phan anh 
		$anhlogocu = $this->input->post('logocu');
		$logo = $_FILES['logo']['name'];

		// neu khon upload gi 
		if(empty($logo))
		{
			$logo = $anhlogocu; 
		}
		else // da co file 
		{
			$duongdan = "uploads/";
			$duongdan = $duongdan . basename($_FILES['logo']['name']);
			move_uploaded_file($_FILES['logo']['tmp_name'], $duongdan);
			$logo = base_url().'uploads/'.basename($_FILES['logo']['name']);
		}
	

		// dong goi du lieu thanh mot mang 
		$dlHeader = array(
			'mangXH' => array(
				'linkFB' => $linkFB, 
				'linkTwitter' =>  $linkTwitter,  
				'linkP' =>  $linkP,  
				'linkGP' =>  $linkGP 
				),
			'soHotLine' => array(
				'textHotLine' => $textHotLine, 
				'soDT' => $soDT
				),
			'gioMoCua' => array(
				'text' => $text, 
				'gio' => $gio
				),
			'logo' => $logo 

			);
		// ma hoa thanh json 
		$dlHeader = json_encode($dlHeader);
 		// goi model cap nhat du lieu 
 		if($this->tin_model->updateHeaderJson($dlHeader) )
 		{
 			 $this->load->view('thanhcong3');
		 
		}
		else{
			 $this->load->view('thatbai3');	

 		}
	}
	 

}

/* End of file Tintuc.php */
/* Location: ./application/controllers/Tintuc.php */