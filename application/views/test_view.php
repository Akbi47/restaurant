<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="test/addSlide" method="post" enctype="multipart/form-data">
	<fieldset class="form-group">
		<label for="formGroupExampleInput">Example label</label>
		<input name="slide_image[]" type="file"  >
	</fieldset>
	<fieldset class="form-group">
 		<input type="submit" class="form-control" id="formGroupExampleInput2" >
	</fieldset>
</form>
	
</body>
</html>