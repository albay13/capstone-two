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
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
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
                                <div class="ibox-title">All Tickets <div class="custom_view"></div></div>
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
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th style="text-align: center;">Priority</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                            </tbody>
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
    <script src="<?php echo base_url.'/assets/sweetDist/sweetalert.min.js';?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/sweetDist/sweetalert.css';?>">
 	<script src="<?php echo base_url.'assets/js/script.js'; ?>"></script>
 	 <script type="text/javascript">
        $(function() {

            custom_view();
            added_buttons();
            function custom_view(id = ''){
                var table = $('#ticket_tbl').DataTable({
                  rowCallback: function(row, data, index){
                    $(row).find('td:eq(1)').css({'text-align':'center'});
                    $.post(
                        "<?php echo base_url.'core/ajax/fetch_status_property.php'; ?>",
                        {id:data[2]},
                        function(data){
                            var obj = JSON.parse(data);
                            $(row).find('td:eq(2)').text(obj.status_name);
                            $(row).find('td:eq(2)').css({'color':obj.fontcolor,'background-color':obj.bgcolor,'text-align':'center'});
                            $(row).find('td:eq(3)').css({'text-align':'center'});
                        }
                    );
                  },
                  "dom": '<"toolbar">frtip',
                  "processing" : true,
                  "serverSide" : true,
                  "order" : [],
                  "searching" : false,
                  "ajax" :{
                    url:"<?php echo base_url.'core/ajax/fetch_custom_views.php'; ?>",
                    method:"POST",
                    data:{id:id},
                   },
                });
                 added_buttons();
            }
          
           $("div.custom_view").html("<?php $crud->custom_view(); ?>");
           $(".filter-table").on('click',function(){
                var id = $(this).data('id');
                $("#ticket_tbl").DataTable().destroy();
                custom_view(id);
            });
           $(".delete").on('click',function(){
                var ticket_id = $(this).data('id');
                swal({
                  title: "Are you sure?",
                  text: "You will not be able to recover this data",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "No, cancel plx!",
                  closeOnConfirm: false,
                  closeOnCancel: false
                },
                function(isConfirm) {
                  if (isConfirm) {
                    $.post(
                        "<?php echo base_url.'core/ajax/delete_data.php'; ?>",
                        {ticket_id:ticket_id},
                        function(data){
                            swal({title:"Deleted!",text:"You have successfully deleted a ticket",type:"success"},function(){
                                    location.reload();
                            });
                        }
                    );
                  } else {
                    swal("Cancelled", "Ticket was not deleted!", "error");
                  }
                });
            });
            function added_buttons(){
                $("div.toolbar")
                     .html('<a class="btn btn-primary btn-sm ml-2" href="add_ticket.php" id="add_ticket"><i class="fa fa-plus"></i> Add Ticket</a>');
            }  
        })
    </script>
</html>