<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>them moi du lieu </title>
	<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?= base_url() ?>1.css">
</head>
<body>
  <nav class="navbar navbar-light bg-faded">
          <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
            &#9776;
          </button>
          <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
            <a class="navbar-brand" href="#">Backend slide</a>
            <ul class="nav navbar-nav">
              <li class="nav-item ">
                <a class="nav-link" href="<?= base_url() ?>/Do_edit">Sua slide <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?= base_url() ?>/slides">Them slide</a>
              </li>
              
            </ul>
          </div>
        </nav>
<div class="container">
	<div class="row">
		<div class="col-sm-6 push-sm-3">
		<h3 class=" text-xs-center"> Thêm mới slide</h3>
		<hr>
			<form action="slides/addSlide" method="post" enctype="multipart/form-data">
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Tiêu đề slide</label>
					<input name="title" type="text" class="form-control" id="title" placeholder="Tiêu đề">
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Mô tả slide</label>
					<input name="description" type="text" class="form-control" id="description" placeholder="Mô tả slide">
				</fieldset>

				<fieldset class="form-group">
					<label for="formGroupExampleInput">Link của nút</label>
					<input name="button_link" type="text" class="form-control" id="button_link" placeholder="Link của nút">
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Text của nút</label>
					<input name="button_text" type="text" class="form-control" id="button_text" placeholder="Text của nút">
				</fieldset>				
				 

				<fieldset class="form-group">
					<label for="formGroupExampleInput">Upload file</label><br>
					<input name="slide_image" type="file" style="border: 1px solid rgba(0,0,0,.15);border-radius: .25rem;padding: 6px 236px 6px 8px;">
				</fieldset>
				<fieldset class="form-group">
			 		<input type="submit" class="form-control" value="Thêm mới">
				</fieldset>
			</form>
		</div>
	</div>

</div>

	
</body>
</html>