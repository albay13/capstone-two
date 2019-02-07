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
                    <li class="breadcrumb-item"><a href="ticket.php">Edit Custom View</a></li>
                </ol>
            </div>
             <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Edit Custom View</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <form id="edit_custom_views_form" name="edit_custom_views_form" method="post"> 
                                    <?php include '../../includes/edit_custom_view.form.php'; ?>
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
    <div class="modal fade" id="add_category_modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-send"></i> Add Custom View</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
            <?php include '../../includes/add_custom_view.form.php'; ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
    <script src="<?php echo base_url.'/assets/sweetDist/sweetalert.min.js';?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url.'assets/sweetDist/sweetalert.css';?>">
    <script src="<?php echo base_url.'assets/js/script.js'; ?>"></script>
     <script type="text/javascript">
        $(function() {
            var table = $('#ticket_tbl').DataTable({
              "dom": '<"toolbar">frtip',
            });
            $("div.toolbar")
                     .html('<a class="btn btn-primary btn-sm ml-2 text-light" id="add_custom_views"><i class="fa fa-plus"></i> Custom Views</a>');
            $("#add_custom_views").on('click',function(){
                    $("#add_category_modal").modal("show");
            });
            $("#add_custom_views_form").on('submit',function(e){
                    e.preventDefault();
                    if($("#query_name").val() == '' || $("#status").val() == '' || $("#category").val() == '' || $("#order_by").val() == '' || $("#sort_by").val() == ''){
                        return false;
                    }else{
                        $.post(
                            "<?php echo base_url.'core/ajax/insert_custom_views.php'; ?>",
                            $(this).serialize(),
                            function(data){
                                alert(data);
                            }
                        );
                    }
            });
        })  
    </script>
</html>