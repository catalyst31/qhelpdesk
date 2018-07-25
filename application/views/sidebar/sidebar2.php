<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
<ul class="nav menu">

<?php if($this->session->userdata('level')=="ADMIN")
{?>
<div class="col-sm-3 col-lg-2 sidebar" style="background-color:#f0f5f5"></div>
<?php 
}else if($this->session->userdata('level')=="TECHNICIAN"){?>

<div class="col-sm-3 col-lg-2 sidebar" style="background-color:#f0f5f5"></div>

<?php } else if($this->session->userdata('level')=="USER" AND $this->session->userdata('id_jabatan')==3){?>

<div class="col-sm-3 col-lg-2 sidebar" style="background-color:#f0f5f5"></div>

<?php } else if($this->session->userdata('level')=="USER" AND $this->session->userdata('id_jabatan')==1){?>

<div class="col-sm-3 col-lg-2 sidebar" style="background-color:#f0f5f5"></div>

<?php } else if($this->session->userdata('level')=="USER" AND $this->session->userdata('id_jabatan')==2){?>


<div class="col-sm-3 col-lg-2 sidebar" style="background-color:#f0f5f5"></div>

<?php }?>
</ul>

	</div><!--/.sidebar-->