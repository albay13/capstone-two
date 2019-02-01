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
                        <a href="../index.php"><i class="fa fa-home font-20"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item">Tickets</li>
                    <li class="breadcrumb-item"> <a href="ticket.php">All Tickets</a></li>
                    <li class="breadcrumb-item"><a href="ticket.php">Add Ticket</a></li>
                </ol>
            </div>
             <div class="page-content fade-in-up">
            	<div class="row">
            		<div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Add Ticket</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <?php
                                    include '../../includes/add_ticket.form.php';
                                ?>
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
	<script src="<?php echo base_url.'assets/js/app.min.js'; ?>" type="text/javascript"></script>
 	<script src="<?php echo base_url.'assets/js/script.js'; ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url.'assets/js/tinymce/tinymce.min.js';?>"></script>
    <script src="<?php echo base_url.'assets/js/tinymce/tinymce.js';?>"></script>
    <script src="<?php echo base_url.'assets/js/tinymce/init-tinymce.js'; ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
                $("#text-counter").hide();
                $("#sub-category").hide();
                //Character count when user types
                $("#ticket_title").on('keyup',function(){
                        var length = $(this).val().length;
                    if(length == 0){
                        $("#text-counter").hide();
                        $(".text-count").text(0);
                    }else if(length > 0 && length < 70){
                        $("#text-counter").show();
                        $(".text-count").text(length);
                        $("#text-counter").css("color","black");
                    }else if(length == 70){
                        $("#text-counter").show();
                        $(".text-count").text(length);
                        $("#text-counter").css("color","red");
                    }  
                });
                //When user select ticket category
                $("#ticket_category").on('change',function(){
                        var selected = $(this).val();
                        $.post(
                            "<?php echo base_url.'core/ajax/selected_category.php';?>",
                            {id:selected},
                            function(data){
                                if(data == 'false'){
                                    $("#sub-category").hide();
                                }else{
                                    $("#sub-category").show();
                                    $("#select-sub-category").html(data);
                                }
                            }
                        );
                });
                $("#add_ticket_form").on('submit',function(e){
                        e.preventDefault();
                        var btn = $("#create_ticket");
                        var default_btn = "Create Ticket";
                        if($("#ticket_title").val() == '' || $("#department").val() == '' || $("#priority").val() == '' || $("#status").val() == '' || $("#ticket_category").val() == '' || $("#content").val() == '' || $("#uploaded_file").val() == '' || $("#notes").val() == ''){
                            return false;
                        }else{
                            $.ajax({
                                url:'<?php echo base_url.'core/ajax/insert_ticket.php'; ?>',
                                method:'POST',
                                data:new FormData(this),
                                contentType:false,
                                cache:false,
                                processData:false,
                                success:function(data){
                                    btn.html("<i class='fa fa-spinner fa-spin'></i> Processing");
                                    setTimeout(function(){
                                        btn.html(default_btn);
                                        swal("Success",data,'success');
                                    },2000);
                                    }
                            });
                        }
                });
        });
    </script>
   

  
</html>