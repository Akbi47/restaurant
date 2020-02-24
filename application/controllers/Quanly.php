<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quanly extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('sanpham_model');
		$result = $this->sanpham_model->get_all();

		$this->load->view('user_manage', array(
				'sanphams' => $result
			));
	}
	public function themsp()
	{
		 $target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["anh"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anh"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["anh"]["size"] > 50000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			
		    if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["anh"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$anh = base_url().'uploads/'.basename( $_FILES["anh"]["name"]);
		//echo $anh;
		$ten = $this->input->post('ten');
		//$anh = $this->input->post('anh');
		$mota = $this->input->post('mota');
		
		$this->load->model('sanpham_model');

		echo $this->sanpham_model->insert($ten, $anh, $mota);
 	}

 	function detail($id){
		$this->load->model('sanpham_model');

 		$result = $this->sanpham_model->get_by_id($id);

 		$this->load->view('detail', array(
 				'sanpham' => $result
 			));
 	}

 	function suasp(){
 		 $target_dir = "upload/";
		$target_file = $target_dir . basename($_FILES["anh"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["anh"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["anh"]["size"] > 50000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			
		    if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["anh"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$anh = base_url().'upload/'.basename( $_FILES["anh"]["name"]);
		//echo $anh;
		$ten = $this->input->post('ten');
		//$anh = $this->input->post('anh');
		$mota = $this->input->post('mota');
		$id = $this->input->post('id');
		
		$this->load->model('sanpham_model');

		echo $this->sanpham_model->update($id, $ten, $anh, $mota);
 	}

}
