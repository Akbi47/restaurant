<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>them moi du lieu </title>
	<script type="text/javascript" src="<?= base_url() ?>/vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>/1.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?= base_url() ?>/1.css">
</head>
<body>


        <nav class="navbar navbar-light bg-faded">
          <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
            &#9776;
          </button>
          <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
            <a class="navbar-brand" href="#">Backend slide</a>
            <ul class="nav navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="<?= base_url() ?>/Do_edit">Sua slide <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>/slides">Them slide</a>
              </li>
              
            </ul>
          </div>
        </nav>
<div class="container">
	<div class="row">
		<div class="col-sm-6 push-sm-3">
		<h3 class=" text-xs-center"> Sửa slide</h3>
		<?php $dem = 0; ?>
		<form action="slides/suaSlide" method="post" enctype="multipart/form-data">
		<?php foreach ($mangdl as $key => $value): ?>
			<hr>
		<?php $dem++ ; ?>
		<h2> Slide số <?= $dem ; ?> </h2>
		<hr>
			
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Tiêu đề slide</label>
					<input name="title[]" type="text" class="form-control" id="title" 
					value="<?= $value['title'] ?>" 
					>
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Mô tả slide</label>
					<input name="description[]" type="text" class="form-control" id="description" 
					value="<?= $value['description'] ?>" 
					>
				</fieldset>

				<fieldset class="form-group">
					<label for="formGroupExampleInput">Link của nút</label>
					<input name="button_link[]" type="text" class="form-control" id="button_link" 
					value="<?= $value['button_link'] ?>" 
					 >
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Text của nút</label>
					<input name="button_text[]" type="text" class="form-control" id="button_text"
					value="<?= $value['button_text'] ?>" 

					>
				</fieldset>				
				 

				<fieldset class="form-group">
					<label for="formGroupExampleInput">Upload file</label>
					<img src="<?= $value['slide_image'] ?>" alt="" width="40%">
					 <input name="slide_image_old[]" type="hidden" class="form-control" id="button_text"
					value="<?= $value['slide_image'] ?>" >

					<input name="slide_image[]" type="file"  >
				</fieldset>
				

		<?php endforeach ?>
				<fieldset class="form-group">
			 		<input type="submit" class="form-control" value="Lưu">
				</fieldset>
			</form>
		</div>
	</div>

</div>

	
</body>
</html>