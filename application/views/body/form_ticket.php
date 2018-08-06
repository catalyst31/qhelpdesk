<style>
	
	#file_error{color: #FF0000;}
	</style>
<script>
	function validate() {
		$("#file_error").html("");
		$(".demoInputBox").css("border-color","#F0F0F0");
		var file_size = $('#file1')[0].files[0].size;
		if(file_size>5e+6) {
			$("#file_error").html("Max. Files 5 MB");
			$(".demoInputBox").css("border-color","#FF0000");
			return false;
		} 
		return true;
	}
	</script>
<div class="row">
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<svg class="glyph stroked home">
					<use xlink:href="#stroked-home"></use>
				</svg>
			</a>
		</li>
		<li class="active">New Ticket</li>
	</ol>
</div>
<!--/.row-->

<br>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<svg class="glyph stroked male user ">
					<use xlink:href="#stroked-male-user" />
				</svg>
				<a href="#" style="text-decoration:none; color:white">Create New Ticket</a>
			</div>
			<div class="panel-body">

				<div class="col-md-12">
					<form method="post" action="<?php echo base_url();?><?php echo $url;?>" enctype="multipart/form-data" onSubmit="return validate();">

						<input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user;?>">
						<!-- <input type="hidden" class="form-control" name="id_ticket" value="<?php echo $id_ticket;?>">
					<input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user;?>"> -->

						<div class="panel panel-danger">
							<div class="panel-heading">
								Reporter
							</div>
							<div class="panel-body">

								<div class="col-md-6">

									<div class="form-group">
										<label>NIK</label>

										<input class="form-control" name="nik" placeholder="nik" value="<?php echo $id_user;?>" disabled>
									</div>

									<div class="form-group">
										<label>Position</label>

										<input class="form-control" name="position" placeholder="" value="<?php echo $position; ?>" disabled>
									</div>

								</div>

								<div class="col-md-6">

									<div class="form-group">
										<label>Name</label>
										<input class="form-control" name="name" placeholder="name" value="<?php echo $name;?>" disabled>

									</div>

									<div class="form-group">
										<label>Division</label>
										<input class="form-control" name="division" placeholder="Division" value="<?php echo $division ?>" disabled>
									</div>

								</div>

							</div>
						</div>

						<div class="panel panel-danger">
							<div class="panel-heading">
								Description Of Problems
							</div>
							<div class="panel-body">

								<div class="col-md-6">

									<div class="form-group">
										<label>To Division*</label>
										<?php echo form_dropdown('id_division',$dd_division, $id_division, ' id="id_division" required class="form-control"');?>
									</div>


								</div>



								<div class="col-md-6">

									<div class="form-group">
										<label>Subject*</label>

										<input class="form-control" name="problem_summary" placeholder="" value="<?php echo $problem_summary;?>" required>

										<!-- <input class="form-control" name="problem_summary" placeholder="" value=" " required> -->
									</div>

									<div class="form-group">
										<label>Description*</label>

										<textarea name="problem_detail" required class="form-control" rows="10"><?php echo $problem_detail;?></textarea>



									</div>

									<div class="form-group">
										<label>Attachment</label>
										<div><input type="file" name="file1" id="file1" class="demoInputBox" /> <span id="file_error"></span></div>
										<br>
									   
										<!-- <input type="file" class="form-control" name="file2" placeholder=""> -->
									</div>



								</div>

							</div>
						</div>

						<div class="col-md-6"></div>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success">Simpan</button>
							<a href="<?php echo base_url();?>" class="btn btn-default">Batal</a>
						</div>





				</div>

				</form>


			</div>
		</div>
	</div>
</div>
<!--/.row-->