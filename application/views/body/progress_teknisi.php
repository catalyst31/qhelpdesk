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
        <a href="#" style="text-decoration:none">DETAIL TICKET</a>
      </div>
      <div class="panel-body">

        <div class="list-group">
          <a href="#" class="list-group-item active">
          <table>
          <tr>
          <td>No.Ticket&nbsp;</td>
          <td>:&nbsp;<span class="label label-default"><?php echo $id_ticket;?></span></td>
          </tr>

          <tr>
          <td>Status&nbsp;</td>
          <td>:&nbsp;<?php
          						        if($status==1) { echo "<span class='label label-info'>OPEN</span>";}
                              else if($status==2) { echo "<span class='label label-warning'>PENDING</span>";}
                              else if($status==3) { echo "<span class='label label-success'>CLOSED</span>";}
          ?></td>
          </tr>
          </table> 
          </a>
          <!-- TODO : Change to $ variable -->
          <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-user"></span>&nbsp;
            <?php echo $create_by;?>
          </a>
          <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-calendar"></span>&nbsp;
            <?php echo $tanggal;?>
          </a>
          <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-info-sign"></span>&nbsp;
            <?php echo $subject;?>
          </a>
          <a href="#" class="list-group-item" style="text-align:justify;">
            <span class="glyphicon glyphicon-align-left"></span> &nbsp;
            <?php echo $description;?>
          </a>
          <!-- <a href="#" class="list-group-item">
            <span class="glyphicon glyphicon-briefcase"></span> &nbsp;
            <?php echo $files;?>
          </a> -->
        </div>

        <?php if($files == NULL){

}else{?>
        <a href="<?php echo base_url()?>list_ticket/download_attachment/<?php echo $id_ticket?>">
        
          <button class="btn btn-success glyphicon glyphicon-download">
          <span><?php echo $files ?></span>
          </button>
        </a>
        <?php }?>


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
        <form method="post" action="<?php echo base_url();?><?php echo $url;?>" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="id_ticket" value="<?php echo $id_ticket;?>">
          <div class="col-md-6">
            <div class="form-group">
              <label>Update Status</label>
              <?php echo form_dropdown('id_status',$dd_status, $id_status, ' id="id_status" required class="form-control"');?>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Deskripsi Progress</label>
              <textarea name="deskripsi_progress" class="form-control" rows="10"required></textarea>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>



        

      </div>

    </div>

  </div>
  <!--/.row-->