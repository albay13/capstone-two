<?php
include '../../core/init.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>All Tickets | Tickets</title>
	<meta charset="utf-8">
	<meta name="viewpoert" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url."assets/images/rephil.png" ?>">
	<link href="<?php echo base_url.'assets/css/bootstrap.min.css';?>" rel="stylesheet" />
	<link href="<?php echo base_url.'assets/DataTables/datatables.min.css';?>" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/css/main.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/css/style.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/font-awesome/css/font-awesome.min.css';?>">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Merienda+One" rel="stylesheet">
	<link href="<?php echo base_url.'assets/themify-icons/css/themify-icons.css';?>" rel="stylesheet" />
    <style type="text/css">
        .toolbar{
            float: right;
        }
    </style>
</head>
<body class="fixed-navbar">
	<div class="page-wrapper">
		<?php
			include '../../includes/header.php';
			include '../../includes/sidenav.php';
        ?>
		<div class="content-wrapper">
			<div class="page-heading">
				<h1 class="page-title"><i class="fa fa-send"></i> Tickets</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-home font-20"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item">Tickets</li>
                    <li class="breadcrumb-item"><a href="ticket.php">All Tickets</a></li>
                </ol>
            </div>
             <div class="page-content fade-in-up">
            	<div class="row">
            		<div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">All Tickets</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                            	 <table class="table table-striped table-bordered table-hover" id="ticket_tbl" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th style="text-align: center;">Priority</th>
                                    <th style="text-align: center;">Status</th>
                                    <th>Category</th>
                                    <th>Last Reply</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th style="text-align: center;">Priority</th>
                                    <th style="text-align: center;">Status</th>
                                    <th>Category</th>
                                    <th>Last Reply</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    $tickets = $crud->fetch_data("SELECT * FROM ticket_info_tbl ");
                                    $status = $crud->fetch_data("SELECT * FROM status_tbl ORDER BY status_name");
                                    foreach($tickets as $rows){
                                ?>
                                <tr>
                                    <td><?php echo $rows["ticket_title"]; ?></td>
                                    <td style="text-align: center;"><?php $main->priority_badge($rows["ticket_priority"]); ?></td>
                                    <?php 
                                        foreach($status as $row_stats){
                                            if($rows["ticket_status"] == $row_stats["id"]){
                                    ?>
                                         <td class="text-center" style="color:<?php echo "#".$row_stats["text_color"]; ?>;background-color:<?php echo "#".$row_stats["bg_color"]; ?>"><?php echo $row_stats["status_name"]; ?></td>
                                    <?php        
                                            }
                                        }

                                    ?>
                                    <td><?php echo $rows["ticket_title"]; ?></td>
                                    <td><?php echo $rows["ticket_title"]; ?></td>
                                    <td><a href="view_ticket.php?ticket_id=<?php echo $rows["id"]; ?>" data-toggle="tooltip" title="Views" class="btn btn-warning btn-sm text-light"><i class="fa fa-eye"></i></a> | <a href="view_ticket.php?ticket_id=<?php echo $rows["id"]; ?>" data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm text-light"><i class="fa fa-cog"></i></a> | <a href="view_ticket.php?ticket_id=<?php echo $rows["id"]; ?>" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm text-light"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
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
</body>
	<script src="<?php echo base_url.'assets/js/jquery-3.3.1.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url.'assets/js/popper.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url.'assets/js/bootstrap.min.js';?>"></script>
	<script src="<?php echo base_url.'assets/metisMenu/dist/metisMenu.min.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url.'assets/js/jquery-slimscroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
	 <script src="<?php echo base_url.'assets/DataTables/datatables.min.js';?>" type="text/javascript"></script>
 	<script src="<?php echo base_url.'assets/js/app.min.js'; ?>" type="text/javascript"></script>
 	<script src="<?php echo base_url.'assets/js/script.js'; ?>"></script>
 	 <script type="text/javascript">
        $(function() {
            var table = $('#ticket_tbl').DataTable({
              "dom": '<"toolbar">frtip',
            });
            $("div.toolbar")
                     .html('<a class="btn btn-primary btn-sm ml-2" href="add_ticket.php" id="add_ticket"><i class="fa fa-plus"></i> Add Ticket</a>');
            $("#add_status").on('click',function(){
                    $("#add_category_modal").modal("show");
            });
        })
    </script>
</html>