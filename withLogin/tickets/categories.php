<?php
include '../../core/init.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Categories | Tickets</title>
	<meta charset="utf-8">
	<meta name="viewpoert" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url."assets/images/rephil.png" ?>">
	<link href="<?php echo base_url.'assets/css/bootstrap.min.css';?>" rel="stylesheet" />
	<link href="<?php echo base_url.'assets/DataTables/datatables.min.css';?>" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/css/main.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/css/style.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/font-awesome/css/font-awesome.min.css';?>">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Merienda+One" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/select2/dist/css/select2.min.css';?>">
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
				<h1 class="page-title"><i class="fa fa-send"></i> Categories</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="fa fa-home font-20"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item">Tickets</li>
                    <li class="breadcrumb-item"><a href="ticket.php">Categories</a></li>
                </ol>
            </div>
             <div class="page-content fade-in-up">
            	<div class="row">
            		<div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">All Categories</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                            	 <table class="table table-striped table-bordered table-hover" id="categories-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Parent Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Parent Category</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Yuri Berry</td>
                                    <td>Chief Marketing Officer (CMO)</td>
                                    <td>New York</td>
                                    <td><a data-toggle="tooltip" title="Edit" class="btn btn-info btn-sm text-light"><i class="fa fa-cog"></i></a> | <a data-toggle="tooltip" title="Delete" class="btn btn-danger btn-sm text-light"><i class="fa fa-trash"></i></a></td>
                                </tr>
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
    <!-- Modals -->
    <div class="modal fade" id="add_category_modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-send"></i> Add Custom Category</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
            <?php include '../../includes/add_category.form.php'; ?>
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
    <script src="<?php echo base_url.'assets/js/tinymce/tinymce.min.js';?>"></script>
 	<script src="<?php echo base_url.'assets/js/tinymce/tinymce.js';?>"></script>
    <script src="<?php echo base_url.'assets/js/tinymce/init-tinymce.js'; ?>"></script>
    <script src="<?php echo base_url.'assets/select2/dist/js/select2.full.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url.'assets/js/form-plugins.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url.'assets/js/validations.js'; ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url.'assets/js/script.js'; ?>"></script>
 	 <script type="text/javascript">
        $(function() {
            // DataTables Settings
            var table = $('#categories-table').DataTable({
              "dom": '<"toolbar">frtip',
            });
            $("div.toolbar")
                     .html('<button class="btn btn-primary btn-sm ml-2" type="button" id="add_status"><i class="fa fa-plus"></i> Add Category</button>');
            $("#add_status").on('click',function(){
                    $("#add_category_modal").modal("show");
            });
            $(".delete").on('click',function(){
                return("Are you sure you want to delete?");
            });
            $("#add_category_form").on('submit',function(e){
                    e.preventDefault();
                    var btn = $("#add_custom_category");
                    var default_btn = "Add Custom Category";
                    var category_name = $("#category_name").val();
                    var category_desc = $("#category_desc").val();
                    var parent_category = $("#parent_category").val();
                    var category_icon = $("#category_icon").val();
                    var user_group = $("#user_group").val();
                    if(category_name == '' || category_desc == '' || parent_category == ''|| category_icon == '' || user_group == ''){
                       return false; 
                    }else{    
                        $.ajax({
                            url:"<?php echo base_url.'core/ajax/insert_category.php'; ?>",
                            method:"POST",
                            data:new FormData(this),
                            contentType:false,
                            cache:false,
                            processData:false,
                            success:function(data){
                                btn.html("<i class='fa fa-spinner fa-spin'></i> Loading");
                                setTimeout(function(){
                                    btn.html(default_btn);
                                    $("#add_category_modal").modal("hide");
                                    swal("Success",data,'success');
                                },2000);
                            }
                        });
                    }
            });
        })
    </script>
</html>