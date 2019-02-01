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
			 <div class="page-content fade-in-up">
            	 <div class="row">
                     <div class="col-lg-7">
                        <!-- Ticket Content -->
                        <?php
                        $ticket_id = $_GET["ticket_id"];
                        $ticket_query = $crud->fetch_data("SELECT * FROM ticket_info_tbl INNER JOIN ticket_tbl ON ticket_info_tbl.id = ticket_tbl.id WHERE ticket_tbl.id = '$ticket_id'");
                        $ticket_info = mysqli_fetch_array($ticket_query);
                        ?>
                        <div class="ibox">
                            <div class="ibox-head">
                                <div style="text-transform: capitalize;" class="ibox-title"><?php echo $ticket_info["ticket_title"]; ?></div>
                                <div class="ibox-tools">
                                   <?php
                                        $main->priority_badge($ticket_info["ticket_priority"]);
                                   ?>
                                </div>
                            </div>
                            <div class="ibox-body">
                               <?php
                                    echo $ticket_info["query"];
                               ?>
                            </div>
                            <div class="ibox-footer p-2 pl-4">
                               <div style="text-transform: capitalize;" class="ibox-title"><b>Added Notes</b></div>
                               <div><?php echo $ticket_info["ticket_notes"]; ?></div>
                            </div>
                        </div>
                        <!-- Reply to ticket -->
                        <div class="ibox">
                                        <div class="ibox-head">
                                            <div class="ibox-title">Reply to Ticket</div>
                                            <div class="ibox-tools">
                                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                            </div>
                                        </div>
                                        <div class="ibox-body">
                                           
                                        </div>
                                    </div>
                </div>
                <div class="col-lg-5">
                        <!-- Ticket Details -->    
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Ticket Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                               <table>
                                   <tbody>
                                       <tr>
                                           <td></td>
                                       </tr>
                                   </tbody>
                               </table>
                            </div>
                        </div>
                        <!-- Ticket History -->
                        <div class="ibox">
                                        <div class="ibox-head">
                                            <div class="ibox-title">Ticket History</div>
                                            <div class="ibox-tools">
                                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                            </div>
                                        </div>
                                        <div class="ibox-body">
                                           
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
</html>