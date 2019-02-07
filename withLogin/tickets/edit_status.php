<?php
include '../../core/init.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Status | Tickets</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/jquery-minicolors/jquery.minicolors.css'; ?>">
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
				<h1 class="page-title"><i class="fa fa-send"></i> Status</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-home font-20"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item">Tickets</li>
                    <li class="breadcrumb-item"><a href="ticket.php">Edit Custom Status</a></li>
                </ol>
            </div>
            <?php 
                if(isset($_POST["add_custom_status"])){
                    $data = array(
                        "status_name" => mysqli_real_escape_string($con,$_POST["status_name"]),
                        "bg_color" => mysqli_real_escape_string($con,$_POST["status_bgcolor"]),
                        "text_color" => mysqli_real_escape_string($con,$_POST["status_fontcolor"]),
                        "visibility_status" => "1"
                    );
                    if($crud->insert_data("status_tbl",$data)){
                        echo '<div class="alert alert-success alert-bordered"><strong>Success!</strong> Custom status was added</div>';
                    }else{
                        echo '<div class="alert alert-danger alert-bordered"><strong>Failed!</strong> Custom status was not added</div>';
                    }
                }
            ?>
             <div class="page-content fade-in-up">
            	<div class="row">
            		<div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Edit Custom Status</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                            	<form id="edit_status_form" name="edit_status_form+form" method="post">
                                    <?php
                                        include '../../includes/edit_status.form.php';
                                    ?>
                                </form>
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
    <!-- Modals -->
    <div class="modal fade" id="add_status_modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-send"></i> Add Custom Status</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
            <?php include '../../includes/add_status.form.php'; ?>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="<?php echo base_url.'assets/js/validations.js'; ?>"></script>
    <script src="<?php echo base_url.'/assets/sweetDist/sweetalert.min.js';?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/sweetDist/sweetalert.css';?>">
    <script type="text/javascript" src="<?php echo base_url.'assets/jquery-minicolors/jquery.minicolors.min.js'; ?>"></script>
 	<script src="<?php echo base_url.'assets/js/script.js'; ?>"></script>
    <script type="text/javascript">
       $(document).ready(function(){
            $('.minicolors').each(function(){
                $(this).minicolors({
                    theme:"bootstrap",
                    control:$(this).attr("data-control")||"hue",
                    format: $(this).attr('data-format') || 'hex',
                    opacity:$(this).attr("data-opacity"),
                    swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
                    position: $(this).attr('data-position') || 'bottom left',
                });
            });
       });
   </script>
 	<script type="text/javascript">
        $(function() {
            // DataTables Settings
            var table = $('#status-table').DataTable({
              "dom": '<"toolbar">frtip',
            });
            $("div.toolbar")
                     .html('<button class="btn btn-primary btn-sm ml-2" type="button" id="add_status"><i class="fa fa-plus"></i> Add Status</button>');
            $("#add_status").on('click',function(){
                    $("#add_status_modal").modal("show");
            });
             $(".delete").on('click',function(){
                var status_id = $(this).data('id');
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
                        {status_id:status_id},
                        function(data){
                            swal({title:"Deleted!",text:"You have successfully deleted a category",type:"success"},function(){
                                    location.reload();
                            });
                        }
                    );
                  } else {
                    swal("Cancelled", "Status was not deleted!", "error");
                  }
                });
            });
        });
    </script>
</html>