<?php
	include '../core/init.php';
	if(isset($_GET['logout'])){
		$login->logout();
		header('Location:'.base_url);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard | IT Help Desk</title>
		<meta charset="utf-8">
		<meta name="viewpoert" content="width=device-width, initial-scale=1">
		<link rel="icon" href="<?php echo base_url."assets/images/rephil.png" ?>">
		<link href="<?php echo base_url.'assets/css/bootstrap.min.css';?>" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/css/main.min.css'; ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/css/style.css';?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/font-awesome/css/font-awesome.min.css';?>">
		<link href="https://fonts.googleapis.com/css?family=Dosis|Merienda+One" rel="stylesheet">
		<link href="<?php echo base_url.'assets/themify-icons/css/themify-icons.css';?>" rel="stylesheet" />
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="https://www.amcharts.com/lib/3/serial.js"></script>
        <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
        <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
		<style type="text/css">
			.widget-stat-icon {
			    position: absolute;
			    top: 0;
			    right: 0;
			    width: 60px;
			    height: 100%;
			    line-height: 80px;
			    text-align: center;
			    font-size: 30px;
			    background-color: rgba(0,0,0,.1);
			}
		</style>
	</head>
	<body class="fixed-navbar">
		<div class="page-wrapper">
			<?php
                include '../core/ajax/line_bar_mix.chart.php';
				include '../includes/header.php';
				include '../includes/sidenav.php';
			?>
			<div class="content-wrapper">
				<div class="page-content fade-in-up">
					<div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $crud->count_all_data("ticket_tbl"); ?></h2>
                                <div class="m-b-5">No. of Tickets</div><i class="ti-ticket widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $crud->count_all_data("ticket_info_tbl WHERE ticket_status = '3'"); ?></h2>
                                <div class="m-b-5">Ticket Closed</div><i class="ti-na widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $crud->count_all_data("ticket_info_tbl WHERE ticket_status = '1'"); ?></h2>
                                <div class="m-b-5">New Tickets</div><i class="ti-new-window widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $crud->count_all_data("ticket_info_tbl WHERE ticket_priority = 'high'"); ?></h2>
                                <div class="m-b-5">High Priority Ticket</div><i class="ti-user widget-stat-icon"></i>
                                <!-- <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox">
                            <div class="ibox-body">
                                <div class="flexbox mb-4">
                                    <div>
                                        <h3 class="m-0">Ticket Statistics</h3>
                                        <div>Overall no. of tickets</div>
                                    </div>
                                    <div class="d-inline-flex">
                                        <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);">
                                            <div class="text-muted">New Tickets</div>
                                            <div class="text-center">
                                                <span class="h2 m-0"><?php echo $crud->count_all_data("ticket_info_tbl WHERE ticket_status = '1'"); ?></span>
                                               <!--  <span class="text-success ml-2"><i class="fa fa-level-up"></i> +25%</span> -->
                                            </div>
                                        </div>
                                        <div class="px-3">
                                            <div class="text-muted">Closed Tickets</div>
                                            <div class="text-center">
                                                <span class="h2 m-0"><?php echo $crud->count_all_data("ticket_info_tbl WHERE ticket_status = '3'"); ?></span>
                                                <!-- <span class="text-warning ml-2"><i class="fa fa-level-down"></i> -12%</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div id="chartdiv"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">New Tickets - High Priority</div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped">
                                    <thead>
                                         <tr>
                                            <th>Title</th>
                                            <th style="text-align: center;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetch_query = $crud->fetch_data("SELECT * FROM ticket_info_tbl WHERE ticket_priority = 'high' AND ticket_status = '1'");
                                            foreach($fetch_query as $rows){
                                        ?>
                                            <tr>
                                                <td><?php echo $rows["ticket_title"]; ?></td>
                                                <td style="text-align: center;"><a href="tickets/view_ticket.php?ticket_id=<?php echo $rows["id"]; ?>" data-toggle="tooltip" title="View Ticket" class="btn btn-info btn-sm text-light">View</a></td>
                                            </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                     <tfoot>
                                         <tr>
                                            <th>Title</th>
                                            <th style="text-align: center;">Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
				<footer class="page-footer">
					<div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
					<div class="to-top"><i class="fa fa-angle-double-up"></i></div>
				</footer>
			</div>
		</div>
		<div class="sidenav-backdrop backdrop"></div>
		<div class="preloader-backdrop">
			<div class="page-preloader">Loading</div>
		</div>
	</body>
	<script src="<?php echo base_url.'assets/js/jquery-3.3.1.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url.'assets/js/popper.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url.'assets/js/bootstrap.min.js';?>"></script>
	<script src="<?php echo base_url.'assets/metisMenu/dist/metisMenu.min.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url.'assets/js/jquery-slimscroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
    
	<script src="<?php echo base_url.'assets/js/app.min.js'; ?>" type="text/javascript"></script>
</html>