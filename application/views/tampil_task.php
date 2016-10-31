<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url('asset/boostrap/css/bootstrap.min.css');?>" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url('asset/boostrap/css/bootstrap-theme.min.css');?>" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url('asset/font-awesome/css/font-awesome.min.css');?>">
	<script src="<?php echo base_url('asset/jquery.js');?>" type="text/javascript"></script>
</head>
<body onload="load_temp()">
	
	<div class="test">
		<label>Task</label>
		<input type="text" id="task" class="form-control"> <br>
		<span class="col col-md-3"><button class="button form-control btn-primary">Simpan</button></span>
	</div>
	<br>
	<div class="update" style="display:none;">
		<h1>Form Edit</h1>
		<input type="text" class="edit kosong" value="">
		<button class="buttonedit">Edit</button>
	</div>

	<br>
	<br>
	<div class="tampil"></div>
	
	<script type="text/javascript">
		
		function load_temp(){
				$.ajax({
				type:"post",
				url:"<?php echo base_url();?>task/load_temp",
				data:"",
				success:function(html)
				{
					$(".tampil").html(html);
				}
			});
		}
	
		function hapus(id)
		{
			$.ajax({
				type:"GET",
				url:"<?php echo base_url();?>task/hapus",
				data:"id="+id,
				success:function(html)
				{
					$("#hapus"+id).hide(2000);
				}
			});
		}


		$(document).ready(function(){
			$(".button").click(function(){
				var task = $("#task").val();
				if(task == '')
				{
					alert("Isikan Task telebih dahulu");
					die;
				}
				else
				{
					$.ajax({
						type:"post",
						data:"task="+task,
						url:"<?php echo base_url();?>task/simpan",
						success:function(html){
							$("#task").val("");
							//alert("Proses Simpan Berhasil");
							load_temp();
						}
					});
				}
			})
		})
	</script>

	<script type="text/javascript">
		$(function(){
			var id;
			var task;
			$(document).on("click","tbody .edit",function(){
				id = $(this).attr("id");
				task = $(this).attr("title");
			

				$(".e"+id).click(function(){
					$(".kosong").val("");
					$(".edit").attr('value',task);
					$(".edit").attr('placeholder',task);
					$(".test").hide();
					$(".update").show();
				})
				
				$(".buttonedit").click(function(){
				var edit = $(".edit").val();
					$.ajax({
						type:"post",
						data:"edit="+edit+"&id="+id,
						url:"<?php echo base_url();?>task/update",
						success:function(html){
							load_temp();
							$(".test").show();
							$(".update").hide();
						}
					})
				});
			});
		})
	</script>
</body>
</html>