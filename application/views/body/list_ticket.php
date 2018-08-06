<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/chart.min.js"></script>
<script src="<?php echo base_url();?>assets/js/chart-data.js"></script>
<script src="<?php echo base_url();?>assets/js/easypiechart.js"></script>
<script src="<?php echo base_url();?>assets/js/easypiechart-data.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<script>
	!function ($) {
		$(document).on("click", "ul.nav li.parent > a > span.icon", function () {
			$(this).find('em:first').toggleClass("glyphicon-minus");
		});
		$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
	}(window.jQuery);

	$(window).on('resize', function () {
		if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function () {
		if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	})
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
		<li class="active">List Ticket</li>
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
				<a href="#" style="text-decoration:none">List Ticket</a>
			</div>
			<div class="panel-body">
				<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"
				 data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th data-field="no" data-sortable="true" width="10px"> No</th>
							<th data-field="idd3" data-sortable="true">Ticket No.</th>
							<th data-field="iddd" data-sortable="true">Date</th>
							<th data-field="iddds" data-sortable="true">Reported</th>
							<th data-field="idddXs" data-sortable="true">To Division</th>
							<th data-field="iddddd" data-sortable="true">Subject</th>
							<th data-field="idddddd" data-sortable="true">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach($datalist_ticket as $row) : $no++;?>
						<tr>
							<!-- Start No -->
							<td data-field="no" width="10px">
								<?php echo $no;?>
							</td>
							<!-- End No -->
							<!-- Start Ticket Number -->
							<td data-field="id">

								<a href="<?php echo base_url();?>list_ticket/detail_ticket/<?php echo $row->id_ticket;?>">
									<?php echo $row->id_ticket;?>
								</a>

							</td>
							<!-- End Ticket Number -->

							<!-- Start Date-->
							<td data-field="id">
								<?php echo $row->create_date;?>
							</td>
							<!-- End Date-->

							<!-- Start Reported By-->
							<td data-field="iddsd">
								<?php echo $row->employe_name;?>
							</td>
							<!-- End Reported By-->

							<!-- Start Dept-->
							<td data-field="iddsd">
								<?php echo $row->division_name;?>
							</td>
							<!-- End Dept-->

							<!-- Start Subject-->
							<td data-field="id">
								<?php echo $row->title;?>
							</td>
							<!-- End Subject-->

							<!-- Start Status-->
							<td data-field="id">
								<?php 
								if($row->status==1 && $row->file==NULL) { echo "<span class='label label-info'>OPEN</span>";}
						        else if($row->status==1 && $row->file==$row->file) { echo "<span class='label label-info'>OPEN</span>&nbsp;<span class='label label-success glyphicon glyphicon-paperclip'> </span>";}
						        else if($row->status==2 && $row->file==NULL) { echo "<span class='label label-warning'>PENDING</span>";}
						        else if($row->status==2 && $row->file==$row->file) { echo "<span class='label label-warning'>PENDING</span>&nbsp;<span class='label label-success glyphicon glyphicon-paperclip'> </span>";}
						        else if($row->status==3 && $row->file==NULL) { echo "<span class='label label-danger'>CLOSED</span>";}
						        else if($row->status==3 && $row->file==$row->file) { echo "<span class='label label-danger'>CLOSED</span>&nbsp;<span class='label label-success glyphicon glyphicon-paperclip'> </span>";}
						        
						        ?>
							</td>
							<!-- End Status-->
						</tr>
						<?php endforeach;?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>
<!--/.row-->


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
	$(document).ready(function () {

		$(".hapus").click(function () {
			var id = $(this).data('id');

			$(".modal-body #mod").text(id);

		});

	});
</script>







</div>
</div>
</div>
</div>
<!--/.row-->