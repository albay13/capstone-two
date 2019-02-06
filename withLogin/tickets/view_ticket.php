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
                        <div class="col-lg-8">
                            <!-- Ticket Content -->
                            <?php
                            $ticket_id = $_GET["ticket_id"];
                            $get_username = $crud->fetch_data("SELECT user_level,username from accounts_tbl LEFT JOIN ticket_tbl ON accounts_tbl.id = ticket_tbl.requester_id");
                            $username = mysqli_fetch_array($get_username);
                            $ticket_query = $crud->fetch_data("SELECT * FROM ticket_info_tbl INNER JOIN ticket_tbl ON ticket_info_tbl.id = ticket_tbl.id WHERE ticket_tbl.id = '$ticket_id'");
                            $ticket_info = mysqli_fetch_array($ticket_query);
                            $ticket_status = $ticket_info["ticket_status"];
                            $select_status = $crud->fetch_data("SELECT * FROM status_tbl where id = '$ticket_status';");
                            $status = mysqli_fetch_array($select_status);
                            ?>
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div style="text-transform: capitalize;" class="ibox-title"><?php echo $ticket_info["ticket_title"]; ?></div>
                                    <div class="ibox-tools">
                                        <?php
                                        $crud->priority_badge($ticket_info["ticket_priority"]);
                                        ?> | 
                                        <span class="badge" style="color:#<?php echo $status["text_color"]; ?>;  background-color: #<?php echo $status["bg_color"]; ?>;"><?php echo $status["status_name"]; ?></span>
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
                            <!-- Replies -->
                            <?php
                            $fetch_reply = $crud->fetch_data("SELECT * FROM ticket_reply_tbl WHERE ticket_id = '$ticket_id' ORDER BY date_reply DESC");
                            foreach($fetch_reply as $reply){
                            ?>
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title"><img width="32" class="mr-2" src="<?php echo base_url.'assets/images/admin-avatar.png';?>" /><?php echo "<span style='text-transform:capitalize;'>".$username["user_level"]."</span>"; ?></div>
                                    <div class="ibox-tools">
                                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <?php
                                    echo $reply["reply"];
                                    ?>
                                </div>
                                <div class="ibox-footer p-2 pl-4">
                                    <small class="text-muted">Posted On : <?php echo $main->date_format($reply["date_reply"]); ?> </small>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
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
                                    <?php include '../../includes/reply_ticket.form.php'; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Ticket Details -->
                            <?php
                            $category = $crud->fetch_data("SELECT category_name from categories_tbl where id = '".$ticket_info["ticket_category_id"]."'");
                            $ctgry = mysqli_fetch_array($category);
                            $ticket_details = $crud->fetch_data("SELECT personal_info_tbl.email,personal_info_tbl.first_name,personal_info_tbl.last_name FROM personal_info_tbl LEFT JOIN ticket_tbl ON ticket_tbl.requester_id = personal_info_tbl.login_id WHERE ticket_tbl.id = '$ticket_id' ");
                            $row_ticket_dtls = mysqli_fetch_array($ticket_details);
                            ?>
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">Ticket Details</div>
                                    <div class="ibox-tools">
                                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <table class="table table">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: right; width: 50%;">#</td>
                                                <td style="width: 50%;"><?php echo $_GET["ticket_id"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; width: 50%;">Username</td>
                                                <td style="width: 50%;"><?php echo $username["username"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; width: 50%;">Email</td>
                                                <td style="width: 50%;"><?php echo $row_ticket_dtls["email"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; width: 50%;">Name</td>
                                                <td style="width: 50%;"><?php echo $row_ticket_dtls["first_name"]." ".$row_ticket_dtls["last_name"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; width: 50%;">Created</td>
                                                <td><?php
                                                    echo $main->date_format($ticket_info["date_created"]);
                                                ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;">Category</td>
                                                <td><?php echo $ctgry["category_name"]; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="ibox-footer p-2 pl-4">
                                    <div style="text-transform: capitalize;" class="ibox-title"><b>Actions</b></div>
                                    <div class="container">
                                        <div class=" row">
                                            <div class="btn-group mr-1">
                                                <button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  data-toggle="tooltip" title="Change status">
                                                <i class="fa fa-exchange"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <?php
                                                    $status = $crud->fetch_data("SELECT * FROM status_tbl");
                                                    foreach($status as $get_statuses){
                                                    ?>
                                                    <a data-action="Ticket changed status" data-value="<?php echo $get_statuses["id"]; ?>" class="dropdown-item change-status"><?php echo $get_statuses["status_name"]; ?></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <a class="btn btn-danger btn-sm text-light"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
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
    <script>
    $(document).ready(function(){
    $("#reply_ticket_form").on('submit',function(e){
    e.preventDefault();
    if($("#reply").val() == "" || $("#attachment").val() == ""){
    return false;
    }else{
    $.ajax({
        url: "../../core/ajax/reply_ticket.php",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        processData:false,
        cache:false,
        success:function(data){
        swal({title:"Success",text:data,type:'success'}).then(function(){
        location.reload();
        });
        }
        });
        }
    });
    $(".change-status").on('click',function(){
        var value = $(this).data("value");
        $.post(
        "<?php echo base_url.'core/ajax/changed_status.php'; ?>",
        {ticket_id:"<?php echo $ticket_id; ?>",status:value},
        function(data){
        swal({title:"Success",text:data,type:'success'}).then(function(){
        location.reload();
        });
        }
        );
        });
    });
    </script>
</html>