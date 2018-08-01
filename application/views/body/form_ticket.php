<script language="javascript" type="text/javascript">
    
	$(document).ready(function() {

		$("#id_kategori").change(function(){
	 		// Put an animated GIF image insight of content
		
			var data = {id_kategori:$("#id_kategori").val()};
			$.ajax({
					type: "POST",
					url : "<?php echo base_url().'select/select_sub_kategori'?>",				
					data: data,
					success: function(msg){
						$('#div-order').html(msg);
					}
			});
		});   

	});

</script>			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">New Ticket</li>
			</ol>
		</div><!--/.row-->
		
	<br>
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
<a href="#" style="text-decoration:none; font-color:white">Ticket</a></div>
					<div class="panel-body">
						
					<div class="col-md-12">
					<!-- <form method="post" action="<?php echo base_url();?><?php echo $url;?>"> -->
					<form method="post" action="POST">

					<input type="hidden" class="form-control" name="id_ticket" value="kosong">
					<input type="hidden" class="form-control" name="id_user" value="kosong">
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
						<!-- <input class="form-control" name="nama" placeholder="Nama" value="tes" disabled> -->
						<input class="form-control" name="nama" placeholder="Nama" value="<?php echo $this->session->userdata('id_user');?>" disabled>
					    </div>

					    <div class="form-group">
						<label>Department</label>
						<!-- <input class="form-control" name="departemen" placeholder="Departemen" value="tes" disabled> -->

						<input class="form-control" name="departemen" placeholder="" value="<?php 
						        if($this->session->userdata('id_position')==4290) { echo "IT";}
						        else if($row->status==3) { echo "WAITING APPROVAL TECHNICIAN";}
						        else if($row->status==4) { echo "PROCESS TECHNICIAN";}
						        else if($row->status==5) { echo "PENDING TECHNICIAN";}
						        else if($row->status==6) { echo "SOLVED";}
						        ?>
						" disabled>
					    </div>

					     </div>

					    <div class="col-md-6">

					    <div class="form-group">
						<label>Name</label>
						<!-- <input class="form-control" name="nama" placeholder="Departemen" value="tes" disabled> -->
						<input class="form-control" name="nama" placeholder="Departemen" value="<?php echo $this->session->userdata('nama');?>" disabled>
						
					    </div>
						
					    <!-- <div class="form-group">
						<label>Sub Departement</label>
						<input class="form-control" name="departemen" placeholder="Departemen" value="<?php echo $bagian_departemen;?>" disabled>
					    </div> -->

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
						<label>To Department*</label>
						<?php echo form_dropdown('id_kategori',$dd_kategori, $id_kategori, ' id="id_kategori" required class="form-control"');?>
					    </div>

					    <!-- <div id="div-order">

						<?php if($flag=="edit")
						{

	                     echo form_dropdown('id_sub_kategori',$dd_sub_kategori, $id_sub_kategori, 'required class="form-control"');

						}else{}
					    ?>

					    </div> -->

						<!-- <div class="form-group">
						<label>Attachment</label>
						<input type="file" class="form-control" name="file" placeholder="file" value="<?php echo $problem_summary;?>">
					    </div> -->

					    <!-- <div class="form-group">
						<label>Urgently*</label>
						<?php echo form_dropdown('id_kondisi',$dd_kondisi, $id_kondisi, ' id="id_kondisi" required class="form-control"');?>
					    </div> -->

						<!-- <div class="form-group">
						<label>Attachment </label>
						<input type="file" class="form-control" name="file" placeholder="" value="<?php echo $file;?>" required>
					    </div> -->

					    

				        </div>



				        <div class="col-md-6">

					    <div class="form-group">
						<label>Subject*</label>

						<!-- <input class="form-control" name="problem_summary" placeholder="" value="<?php echo $problem_summary;?>" required> -->

						<input class="form-control" name="problem_summary" placeholder="" value=" " required>
					    </div>

					    <div class="form-group">
						<label>Description</label>
<!-- 						
						<textarea name="problem_detail" required class="form-control" rows="10"><?php echo $problem_detail;?></textarea> -->
						
						<textarea name="problem_detail" required class="form-control" rows="10"></textarea>


					    </div>

					    

				        </div>
						
					</div>
				</div>

			

					
		

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>home"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
