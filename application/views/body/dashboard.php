		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Home <?php echo $this->session->userdata('level');?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<div class="ico_collection" style="font-size :39px; position: relative; bottom: 9px; "></div>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_ticket;?></div>
							<div class="text-muted">Total Tickets</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_karyawan;?></div>
							<div class="text-muted">Total Employees</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_user;?></div>
							<div class="text-muted">Total Users</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<div class="ico_settings1" style="font-size :39px; position: relative; bottom: 9px; "></div>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_teknisi;?></div>
							<div class="text-muted">Total Technicians</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
	
		
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Tickets<br>Solved</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $jml_ticket_solved;?>" ><span class="percent"><?php echo ceil($jml_ticket_solved);?> %</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Tickets On<br>Process</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $jml_ticket_process;?>" ><span class="percent"><?php echo ceil($jml_ticket_process);?> %</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Tickets Waiting For Approval Internal</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $jml_ticket_app_int;?>" ><span class="percent"><?php echo ceil($jml_ticket_app_int);?> %</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Tickets Waiting For Approval Technician</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $jml_ticket_app_tek;?>" ><span class="percent"><?php echo ceil($jml_ticket_app_tek);?>%</span>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->


		<div class="row">




			<div class="col-xs-6 col-md-6">
				

				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<div class="glyphicon glyphicon-thumbs-up" style="font-size :39px; position: relative; top: 6px; "></div>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo ceil($jml_feedback_positiv);?>%</div>
							<div class="text-muted">Feedback Positive</div>
						</div>
					</div>
				</div>

			</div>


			<div class="col-xs-6 col-md-6">
				

				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<div class="glyphicon glyphicon-thumbs-down" style="font-size :39px; position: relative; top: 6px; "></div>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo ceil($jml_feedback_negativ);?>%</div>
							<div class="text-muted">Feedback Negative</div>
						</div>
					</div>
				</div>

			</div>



			

		</div><!--/.row-->
								
		
								
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->