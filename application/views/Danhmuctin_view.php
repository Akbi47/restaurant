<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>quản lý danh mục </title>
	

</head>
<body>
<?php 
	include 'header_backend.php';
 ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
		        <div class="jumbotron jumbotron-fluid text-xs-center">
					<div class="container">
						<h1 class="display-5">Thêm danh mục tin </h1>
						<p class="lead">Form này cho phép thêm danh mục tin và cơ sở dữ liệu.</p>
					</div>
				</div>
				
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Tên danh mục</label>
						<input name="tendanhmuc" type="text" class="form-control" id="tendanhmuc" placeholder="Tên danh mục">
					</fieldset>
					<fieldset class="form-group">
 						<input type="button" class="form-control" id="nuthemdanhmuc" value="Thêm danh mục">
					</fieldset>
				<!-- </form> -->
			</div> <!-- end cot trai -->
			<div class="col-sm-6 cacdanhmuc">
				        <div class="jumbotron jumbotron-fluid text-xs-center">
							<div class="container">
								<h1 class="display-5">Danh sách danh mục tin </h1>
								<p class="lead">Các danh mục tin đã thêm .</p>
							</div>
						</div>
						<?php foreach ($dulieu as $motketqua): ?>
							
					

						<div class="card card-inverse card-primary mb-3 text-center">
						  <div class="card-block">
							<div class="thaotac text-xs-right">
		


								<a   data-href="<?php echo base_url(); ?>/tin/suadanhmuc/<?= $motketqua['id'] ?>" class="nutedit btn btn-danger"> <i class="fa fa-pencil"></i></a>

 						  		 <a    data-href="<?= $motketqua['id'] ?>" class="nutxoa btn btn-warning"> <i class="fa fa-remove"></i></a>
							</div>
						  	 

							<div class="jquery_button text-xs-right hidden-xs-up">

								 <a href="" class="btn btn-success nutluu"> Lưu </a>

 						  		  
							</div>
						  	 


						    <h4 class="card-blockquote">
								 
									<fieldset class="form-group jquery_tendanhmuc   hidden-xs-up">

									<input type="hidden" class="form-control id" value="  <?= $motketqua['id']; ?>">
 										<input type="text" class="form-control tendanhmucsua"  value="<?= $motketqua['name']; ?>">
									</fieldset>
									 
							<div class="noidung_ten">
								
									<?= $motketqua['name']; ?>
							</div>
						      
 						    </h4> 
							
 						  						    
						  </div>
						</div> <!-- het mot danh mục -->


						<?php endforeach ?>
			</div>

		</div>
	</div>
	
	<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>
  	<script>
 		 
 	$(function(){
 		$('body').on('click', '.nutedit', function(event) {

 			$(this).parent().addClass('hidden-xs-up');
 			$(this).parent().next().next().find('.noidung_ten').addClass('hidden-xs-up');
 			$(this).parent().next().removeClass('hidden-xs-up');

 			$(this).parent().next().next().find('.jquery_tendanhmuc').removeClass('hidden-xs-up');

 			// sử dụng ajax để kết nối với controller cập nhật dữ liệu 


 			 


 			event.preventDefault();
 			/* Act on the event */
 		});

 		
	$('body').on('click', '.nutluu', function(event) {

 			 giatriten = $(this) // la .nutluu
 			 .parent()  //  doi tuong .jquery button
 			 .next()  // cardblock
 			 .children('.jquery_tendanhmuc') // doi tuong jquery_tendanhmuc
 			 .children('.tendanhmucsua').val();
 			 giatriid = $(this).parent().next().children('.jquery_tendanhmuc').children('.id').val();
 			// console.log(giatriten);		
 			// console.log(giatriid);		
 			 
 			 phantu1 = $(this).parent().addClass('hidden-xs-up');
 			 phantu2 = $(this).parent().next().children('.jquery_tendanhmuc').addClass('hidden-xs-up');

 			 noidung = $(this).parent().next().children('.jquery_tendanhmuc').children('.tendanhmucsua').val();

 			 hienthi1 = $(this).parent().prev().removeClass('hidden-xs-up');
 			 hienthi2 = $(this).parent()
 			 .next()
 			 .children('.noidung_ten')
 			 .html(noidung) // set noi dung

 			 .removeClass('hidden-xs-up');  // cho hien thi lai 

 			 //cho hien thi nut
 			// console.log(noidung);
 			$.ajax({
 				url:duongdan+'/tin/updatedanhmuc',
 				type: 'POST',
 				dataType: 'json',
 				data: {
 					tendanhmuc: giatriten,
 					id: giatriid
 				},
 			})
 			.done(function() {
 				console.log("success");
 			})
 			.fail(function() {
 				console.log("error");
 			})
 			.always(function() {
 				console.log("complete");
 			});
 			

 			event.preventDefault();
 			/* Act on the event */
 		});




 		var duongdan = '<?php echo base_url() ?>' ; 
 		// bat su kien click nut 
 		$('#nuthemdanhmuc').click(function(event) {
 			/* Act on the event */
 			// var tendanhmuc = $('#tendanhmuc').val();
 			// console.log(tendanhmuc);
 			$.ajax({
 				url: duongdan+'tin/addJquery',  // gửi đi controller xử lý 
 				type: 'POST',
 				dataType: 'json',
 				data: {tendanhmuc: $('#tendanhmuc').val()} ,
				async: false
 			})
 			.done(function(data, textStatus, jqXHR) {
 				console.log("success");
 			})
 			.fail(function(jqXHR, textStatus, errorThrown) {
 				console.log("error");
 			})
 			.always(function(dataOrjqXHR, textStatus, jqXHRorErrorThrown) {
 				console.log(dataOrjqXHR);
 				// dung jquery ve ra noi dung them moi
 				noidung = '<div class="card card-inverse card-primary mb-3 text-center">';
 				noidung += ' <div class="card-block">';
 				noidung += '<div class="thaotac text-xs-right">';
 				noidung += '<a data-href="'+dataOrjqXHR+'" class="nutedit btn btn-danger"> <i class="fa fa-pencil"></i></a>';
 				noidung += ' <a data-href="'+dataOrjqXHR+'" class="nutxoa btn btn-warning"> <i class="fa fa-remove"></i></a>';
 				noidung += '</div>';
 				noidung += '<h4 class="card-blockquote">';
 				noidung += '<div class="noidung_ten">';
 				noidung += $('#tendanhmuc').val();
 				noidung += '</div> ';
 				noidung += '</h4> ';
 				noidung += '</div>';
 				noidung += '</div>';
 				$('.cacdanhmuc').append(noidung); // ve va dua noi dung vao 
 				$('#tendanhmuc').val(''); // xoa trang 
				// res return http://127.0.0.1/mvc-project/restaurant/tin/xoadanhmuc/1
				// and we use dom to move to parent of this id for deleting it	
 			});
 			

 		}); // het jquery cho nut them moi
 		// begin jquery cho nut xoa

 		$('body').on('click', '.nutxoa', function(event) {
 			/* Act on the event */
 			idtin = $(this).data('href'); // return data of element
 			doituongcanxoa = $(this).parent().parent().parent(); // delete obj when click delete symbol
 			$.ajax({
 			 			 	url: duongdan + 'tin/xoadanhmuc/'+idtin,
 			 			 	type: 'POST',
 			 			 	dataType: 'json'
 			 			 })
 			 			 .done(function() {
 			 			 	console.log("success");
 			 			 })
 			 			 .fail(function() {
 			 			 	console.log("error");
 			 			 })
 			 			 .always(function() {
 			 			 	console.log("complete");
 			 			 	// dung jquery , xoa luôn phân tử , đỡ phải load lại 
 			 			 //	$(this).parent().parent().parent().remove();
 			 			 	 doituongcanxoa.remove();
 			 			 });

 		});
 		 
 	})
 	</script>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?= base_url() ?>1.css">
</body>
</html>