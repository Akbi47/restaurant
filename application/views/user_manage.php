<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/1.css">
	<title>
		Trang quan ly user 
	</title>
</head>
<body>
		<div class="container">
			<div class="row text-xs-center">
				<h2> Quan ly san pham </h2>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="card-deck-wrapper">
					<div class="card-deck">
						<?php foreach($sanphams as $sanpham):?>
						<div class="card">
							<img class="card-img-top img-fluid" src="<?php echo $sanpham['anh'];?>" alt="Card image cap">
							<div class="card-block">
								<h4 class="card-title"><?php echo $sanpham['ten'];?></h4>
								<p class="card-text"><?php echo $sanpham['mota'];?></p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							</div>
						</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="container text-xs-center">
			<div class="row">

				<form method="post" action="quanly/themsp" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 form-control-label">Ten</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="ten" placeholder="Ten" name="ten">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 form-control-label">Upload anh</label>
						<div class="col-sm-10">
							<input type="file" class="form-control" id="anh" placeholder="Anh" name="anh">
						</div>
					</div>
					 <div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 form-control-label">Mo ta san pham</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="mota" placeholder="mota"  name="mota">
						</div>
					</div>
					 
					<div class="form-group row">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-secondary">Luu</button>
						</div>
					</div>
				</form>
			</div>
		</div>
</body>
</html>