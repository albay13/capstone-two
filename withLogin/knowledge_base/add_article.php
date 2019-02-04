<?php
include '../../core/init.php';
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
                    <h1 class="page-title"><i class="fa fa-book"></i> Knowledge Base</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url.'withLogin'; ?>"><i class="fa fa-home font-20"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url.'withLogin/knowledge_base/articles.php'; ?>">Knowledge Base</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url.'withLogin/knowledge_base/articles.php'; ?>">Articles</a></li>
                        <li class="breadcrumb-item">Add Article</li>
                    </ol>
                </div>
                <div class="page-content fade-in-up">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Add Article</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <?php include '../../includes/add_article.form.php'; ?>
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
    <script src="<?php echo base_url.'assets/DataTables/datatables.min.js';?>" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url.'assets/js/tinymce/tinymce.min.js';?>"></script>
    <script src="<?php echo base_url.'assets/js/tinymce/tinymce.js';?>"></script>
    <script src="<?php echo base_url.'assets/js/tinymce/init-tinymce.js'; ?>"></script>
    <script src="<?php echo base_url.'assets/js/script.js'; ?>"></script>
    <script type="text/javascript">
    $(function() {
    var table = $('#ticket_tbl').DataTable({
    "dom": '<"toolbar">frtip',
    });
    $("div.toolbar")
    .html('<a class="btn btn-primary btn-sm ml-2" href="add_article.php" id="add_ticket"><i class="fa fa-plus"></i> Add Article</a>');
    $("#add_status").on('click',function(){
    $("#add_category_modal").modal("show");
    });
    })
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $("#sub-category").hide();
    $("#article_category").on('change',function(){
    var selected = $(this).val();
    $.post(
    "<?php echo base_url.'core/ajax/selected_article_category.php';?>",
    {id:selected},
    function(data){
        if(data == 'false'){
            $("#sub-category").hide();
            $("#select-sub-category").html("<select name='sub_category' id='sub_category'><option value='0' selected></option></select>");
        }else{
            $("#sub-category").show();
            $("#select-sub-category").html(data);
                }
        }
    );
    });
    $("#add_article_form").on('submit',function(e){
                        e.preventDefault();
                        var btn = $("#btn-post-article");
                        var default_btn = "Post Article";
                        if($("#article_title").val() == '' || $("#article_content").val() == '' || $("#article_category").val() == ''){
                            return false;
                        }else{
                            $.ajax({
                                url:'<?php echo base_url.'core/ajax/insert_article.php'; ?>',
                                method:'POST',
                                data:new FormData(this),
                                contentType:false,
                                cache:false,
                                processData:false,
                                success:function(data){
                                    btn.html("<i class='fa fa-spinner fa-spin'></i> Processing");
                                    setTimeout(function(){
                                        btn.html(default_btn);
                                        swal({title:"Success",text:data,type:'success'}).then(function(){
                                            location.reload();
                                        });
                                    },2000);
                                    }
                            });
                        }
                });
    });
    </script>
</html>