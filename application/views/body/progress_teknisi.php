<div class="row">
  <ol class="breadcrumb">
    <li>
      <a href="#">
        <svg class="glyph stroked home">
          <use xlink:href="#stroked-home"></use>
        </svg>
      </a>
    </li>
    <li class="active">Detail Ticket</li>
  </ol>
</div>
<!--/.row-->

<br>


<div class="row">

  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <svg class="glyph stroked male user ">
          <use xlink:href="#stroked-male-user" />
        </svg>
        <a href="<?php echo base_url();?>list_ticket/ticket_list" style="text-decoration:none">DETAIL TICKET</a>
      </div>
      <div class="panel-body">

        <div class="list-group">
          <a href="#" class="list-group-item active">
            <!-- <?php echo $id_ticket;?> -->
            No. Ticket :&nbsp;
            <?php echo $id_ticket;?>
          </a>
          <!-- TODO : Change to $ variable -->
          <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-calendar"></span>&nbsp;
            <?php echo $create_by;?>
          </a>
          <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-calendar"></span>&nbsp;
            <?php echo $tanggal;?>
          </a>
          <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-briefcase"></span>&nbsp;
            <?php echo $subject;?>
          </a>
          <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-briefcase"></span> &nbsp;
            <?php echo $description;?>
          </a>
          <a href="#" class="list-group-item">
            <?php if($files == NULL) { echo "Tidak Ada Attachment"; }
  else
  {?>
            <span class="glyphicon glyphicon-user"></span> &nbsp;
            <?php echo $files;?>
            <?php }?>
          </a>
        </div>

        <?php if($files == NULL){

}else{?>
        <a href="<?php echo base_url('upload/'.$files); ?>">
          <button type="submit" class="btn btn-success">Download</button>
        </a>
        <?php }?>



        <!-- <a href="" class="list-group-item"><span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $files;?></a> -->

        <!-- <div class="list-group">
<a href="#" class="list-group-item active">
PROCESSED BY
</a>
<a href="#" class="list-group-item"><span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $nama_teknisi;?></a>
<a href="#" class="list-group-item">

<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $progress;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress;?>%">
    <span><?php echo $progress;?> % Complete (Progress)</span>
  </div>
</div>

</a>

<a href="#" class="list-group-item">
<b>PROGRESS : <span class="label label-primary"><?php echo $progress;?> %</span></b>
</a>

<a href="#" class="list-group-item">
<b>TICKET DATE : <?php echo $tanggal;?></b>
</a>


 <?php if($tanggal_solved == "0000-00-00 00:00:00") {  } else {?>
<a href="#" class="list-group-item">
<b>
 
SOLVED DATE : <span class="label label-primary"><?php echo $tanggal;?></span></b>
 
</a>

 <?php }?>

<a href="#" class="list-group-item">
<b>
<?php if($tanggal_proses == "0000-00-00 00:00:00") { echo "BELUM DI PROSES"; }
else
{?>
PROCESS DATE: <?php echo $tanggal_proses;?>
<?php }?>
</b>
</a>


</div> -->

        <div class="panel panel-danger">
          <div class="panel-heading">SYSTEM TRACKING TICKET</div>
          <div class="panel-body">

            <table class="table table-condensed">
              <tr>
                <th>NO</th>
                <th>DATE</th>
                <th>DESCRIPTION</th>
                <th>BY</th>
              </tr>

              <?php $no = 0; foreach($data_trackingticket as $row) : $no++;?>
              <tr>
                <td>
                  <?php echo $no;?>
                </td>
                <td>
                  <?php echo $row->date;?>
                </td>
                <td>
                  <?php echo $row->comment;?>
                </td>
                <td>
                  <?php echo $row->create_by;?>
                </td>
              </tr>
              <?php endforeach;?>
            </table>

          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Update Status</label>
            <?php echo form_dropdown('id_status',$dd_status, $id_status, ' id="id_status" required class="form-control"');?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Deskripsi Progress</label>
            <textarea name="deskripsi_progress" class="form-control" rows="10"></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>

      </div>

    </div>

  </div>
  <!--/.row-->