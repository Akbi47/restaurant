<!DOCTYPE html>
<html lang="en"><head>
	<title> Tin tuc Chi tiet - Artica </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">

 
	<script type="text/javascript" src="<?= base_url(); ?>vendor/bootstrap.js"></script>


  	<script type="text/javascript" src="<?= base_url(); ?>1.js"></script>

	<link rel="stylesheet" href="<?= base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/font-awesome.css">
	<link rel="stylesheet" href="<?= base_url(); ?>1.css">
 </head>
 <body>
 		<?php 
			include 'header_backend.php';
		 ?>
		<?php foreach ($dulieu as $key => $value): ?>
			<?php 
				if($key == "mangXH"){
					$mangXH = $value; 
 				}			 
				if($key == "soHotLine"){
					$soHotLine = $value; 
					 
				}			 
				if($key == "gioMoCua"){
					$gioMoCua = $value; 
				 
				}	
				if($key == "logo"){
					$logo = $value; 
				 
				}	


				
			 ?>
		<?php endforeach ?>


		 <div class="container-fluid">
		 	<div class="row">
		 		<div class="col-sm-8 push-sm-2">
		 			<div class="jumbotron jumbotron-fluid text-xs-center">
					<div class="container">
						<h1 class="display-5">Quản lý header </h1>
						<p class="lead">Form này cho phép sửa header.</p>
					</div>
				</div>
				<form action="<?php  echo base_url(); ?>/tintuc/suaheader" method="post" 
				enctype = multipart/form-data>
					<h4 class="alert alert-info"> Thông tin mạng xã hội</h4>
	 
					 
					<fieldset class="form-group">						
						<label for="formGroupExampleInput">Link Facebook</label>
						<input value="<?= $mangXH['linkFB'] ?>" name="linkFB" type="text" class="form-control" id="linkFB" placeholder="linkFB">
					</fieldset>
					<fieldset class="form-group">						
						<label for="formGroupExampleInput">Link twitter</label>
						<input value="<?= $mangXH['linkTwitter'] ?>" name="linkTwitter" type="text" class="form-control" id="linkTwitter" placeholder="linkTwitter">
					</fieldset>
					<fieldset class="form-group">						
						<label for="formGroupExampleInput">Link Pinterest</label>
						<input value="<?= $mangXH['linkP'] ?>" name="linkP" type="text" class="form-control" id="linkP" placeholder="linkP">
					</fieldset>
					<fieldset class="form-group">						
						<label for="formGroupExampleInput">Link Google plus</label>
						<input value="<?= $mangXH['linkGP'] ?>" name="linkGP" type="text" class="form-control" id="linkGP" placeholder="linkGP">
					</fieldset>
					

					<hr>
					<h4 class="alert alert-info"> Thông tin số hotline</h4>
					<fieldset class="form-group">						
						<label for="formGroupExampleInput">Text của hotline : </label>
						<input 
						value="<?= $soHotLine['textHotLine'] ?>"

						 name="textHotLine" type="text" class="form-control" id="textHotLine" placeholder="Gọi để đặt bàn">
					</fieldset>

					<fieldset class="form-group">						
						<label for="formGroupExampleInput">Số  hotline : </label>
						<input 
						value="<?= $soHotLine['soDT'] ?>"
						name="soDT" type="text" class="form-control" id="soDT" placeholder="Số điện thoại ">
					</fieldset>

					<h4 class="alert alert-info"> Thông tin Giờ mở cửa</h4>
					<fieldset class="form-group">						
						<label for="formGroupExampleInput">Text của giờ mở cửa : </label>
						<input
						value="<?= $gioMoCua['text'] ?>"

						 name="text" type="text" class="form-control" id="text" placeholder="Giờ mở cửa">
					</fieldset>

					<fieldset class="form-group">						
						<label for="formGroupExampleInput">Thời gian mở cửa </label>
						<input 
						value="<?= $gioMoCua['gio'] ?>"
						name="gio" type="text" class="form-control" id="gio" placeholder="9h-8h ">
					</fieldset>

					<h4 class="alert alert-info"> Logo</h4>
					<fieldset class="form-group">	
						<img src="<?= $logo ?>" alt="" class="img-fluid">	
						<input name="logocu"  type="hidden" value="<?= $logo ?>">				
						<label for="formGroupExampleInput">Upload Logo : </label>
						<input type="file" name="logo" >
					</fieldset>
 



					<fieldset class="form-group">
 						<input type="submit" class="form-control btn btn-outline-info" id="nuthemdanhmuc" value="Lưu thông tin">
					</fieldset>
				</form>
		 		</div>
		 	</div>
		 </div>
 </body>
 </html>