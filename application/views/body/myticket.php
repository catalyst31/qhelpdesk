			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">My Ticket</li>
			</ol>
		</div><!--/.row-->
		
	<br>
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
<a href="#" style="text-decoration:none">My Ticket</a> <a href="<?php echo base_url();?>myticket/pdfmyticket" class="btn btn-danger" target="_blank">Pdf</a></div>
					<div class="panel-body"></div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="no" data-sortable="true" width="10px"> No</th>
						        <th data-field="idd" data-sortable="true">Ticket No.</th>
						        <th data-field="iddd" data-sortable="true">Date</th>
						        <th data-field="iddddd" data-sortable="true">To Division</th>
						        <th data-field="idxddddd" data-sortable="true">Subject</th>
						        <th data-field="idddddd" data-sortable="true">Status</th>
						    </tr>
                            </thead>
                            <tbody>
                           <?php $no = 0; foreach($datamyticket as $row) : $no++;?>
						     <tr>
						        <td data-field="no" width="10px"><?php echo $no;?></td>
						        <td data-field="id"><a href="<?php echo base_url();?>list_ticket/detail_ticket/<?php echo $row->id_ticket;?>"><?php echo $row->id_ticket;?></a></td>
						        <td data-field="id"><?php echo $row->create_date;?></td>
						        <td data-field="id"><?php echo $row->division_name;?></td>
						        <td data-field="id"><?php echo $row->title;?></td>
								<td data-field="id"><?php 
								if($row->status==1) { echo "<button type='submit' class='btn btn-sm btn-primary' disabled>OPEN</button>";}
						        else if($row->status==2) { echo "<button type='submit' class='btn btn-sm btn-warning' disabled>PENDING</button>";}
						        else if($row->status==3) { echo "<button type='submit' class='btn btn-sm btn-success' disabled>CLOSED</button>";}
						        ?></td>
						    </tr>
						    <?php endforeach;?>
						    </tbody>
						    
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	


		<?php echo $this->session->flashdata("msg");?>

	
						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>


<?php $this->load->view('konfirmasi');?>

<script type="text/javascript">
$(document).ready(function(){

$(".hapus").click(function(){
var id = $(this).data('id');

$(".modal-body #mod").text(id);

});

});
</script>







					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
