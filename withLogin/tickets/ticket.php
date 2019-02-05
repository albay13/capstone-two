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
        .toolbar,.custom_view{
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
                            <div id="filter_ticket_tbl" for="For filtering table">
                            	 <table class="table table-striped table-bordered table-hover" id="ticket_tbl"  cellspacing="0" width="100%">
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
                            </table>
                            </div>
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
            custom_view();
            function custom_view(id = ''){
                var table = $('#ticket_tbl').DataTable({
                  "dom": '<"custom_view"><"toolbar">frtip',
                  "processing" : true,
                  "serverSide" : true,
                  "order" : [],
                  "ajax" :{
                    url:"<?php echo base_url.'core/ajax/fetch_custom_views.php'; ?>",
                    method:"POST",
                    data:{id:id}
                  }
                });
            }
           
            $("div.toolbar")
                     .html('<a class="btn btn-primary btn-sm ml-2" href="add_ticket.php" id="add_ticket"><i class="fa fa-plus"></i> Add Ticket</a>');
            $("div.custom_view").html("<?php $crud->custom_view(); ?>");
            $("#add_status").on('click',function(){
                    $("#add_category_modal").modal("show");
            });
            //Custom View
            $(".filter-table").on('click',function(){
                var id = $(this).data('id');
                $("#ticket_tbl").DataTable().destroy();
                custom_view(id);
            });
        })
    </script>
</html>