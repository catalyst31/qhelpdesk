
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
						<!-- <input class="form-control" name="nama" placeholder="Nama" value="tes" disabled> -->
						<input class="form-control" name="nama" placeholder="Nama" value="<?php echo $id_user;?>" disabled>
					    </div>

					    <div class="form-group">
						<label>Position</label>
						<!-- <input class="form-control" name="departemen" placeholder="Departemen" value="tes" disabled> -->

						<input class="form-control" name="departemen" placeholder="" value="<?php echo $title ?>" disabled>
					    </div>

					     </div>

					    <div class="col-md-6">

					    <div class="form-group">
						<label>Name</label>
						<!-- <input class="form-control" name="nama" placeholder="Departemen" value="tes" disabled> -->
						<input class="form-control" name="nama" placeholder="Departemen" value="<?php echo $name;?>" disabled>
						
					    </div>
						
					    <div class="form-group">
						<label>Departement</label>
						<input class="form-control" name="departemen" placeholder="Departemen" value="<?php echo $division ?>" disabled>
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
						<label>To Department*</label>
						<?php echo form_dropdown('id',$dd_kategori, $id_kategori, ' id="id" required class="form-control"');?>
					    </div>


				        </div>



				        <div class="col-md-6">

					    <div class="form-group">
						<label>Subject*</label>

						<input class="form-control" name="problem_summary" placeholder="" value="<?php echo $problem_summary;?>" required>

						<!-- <input class="form-control" name="problem_summary" placeholder="" value=" " required> -->
					    </div>

					    <div class="form-group">
						<label>Description</label>
						
						<textarea name="problem_detail" required class="form-control" rows="10"><?php echo $problem_detail;?></textarea>
						
						<textarea name="problem_detail" required class="form-control" rows="10"></textarea>


					    </div>

						<div class="form-group">
						<label>Attachment</label>
						<input type="file" class="form-control" name="file" placeholder="" value="<?php $file;?>">
					    </div>

					    

				        </div>
						
					</div>
				</div>

			

					
		

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
