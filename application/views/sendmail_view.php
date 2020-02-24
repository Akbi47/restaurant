<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Guimail trong backend</title>

	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 

 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body>	
<div class="container">
	<div class="row">
		<div class="col-sm-6 push-sm-3">
		<br>
		<br>
		<br>
		<br>
		<br>
			<form action="sendmail/do_send" method="post">
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Tên người gửi </label>
					<input name="ten" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">Email người nhận</label>
					<input name="nguoinhan" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Example input">
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">Nội dung</label>
					<textarea name="noidung" id="" >
						
					</textarea>
				</fieldset>
				<fieldset class="form-group">
					 
					<input type="submit" class="form-control btn btn-outline-danger" value="Gửi"  >
				</fieldset>


			</form>	

		</div>
	</div>
</div>
	
	
</body>
</html>