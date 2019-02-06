<?php 
    $id = $_SESSION["id"];
    $result = $crud->fetch_data("SELECT * FROM personal_info_tbl INNER JOIN accounts_tbl ON personal_info_tbl.login_id = accounts_tbl.id WHERE accounts_tbl.id='$id'");
    $rows = mysqli_fetch_array($result);
?>
<nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="<?php echo base_url.'assets/images/admin-avatar.png';?>" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?php echo $rows["first_name"]. " " .$rows["last_name"]; ?></div><small style="text-transform: capitalize;"><?php echo $rows["user_level"];?></small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a href="<?php echo base_url.'index.php'; ?>"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="heading text-uppercase">Services</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-send"></i>
                            <span class="nav-label">Tickets</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="<?php echo base_url.'withLogin/tickets/ticket.php'; ?>">All Tickets</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url.'withLogin/tickets/categories.php'; ?>">Categories</a>
                            </li>
                            <!-- <li>
                                <a href="panels.html">Custom Fields</a>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url.'withLogin/tickets/status.php'; ?>">Custom Status</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url.'withLogin/tickets/custom_views.php'; ?>">Custom Views</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-book"></i>
                            <span class="nav-label">Knowledge Base</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="<?php echo base_url.'withLogin/knowledge_base/articles.php'; ?>">Articles</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url.'withLogin/knowledge_base/article_categories.php'; ?>">Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">FAQs</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="<?php echo base_url.'withLogin/faqs/FAQs.php'; ?>">Questions</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Reports</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="charts_flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="charts_morris.html">Morris Charts</a>
                            </li>
                            <li>
                                <a href="chartjs.html">Chart.js</a>
                            </li>
                            <li>
                                <a href="charts_sparkline.html">Sparkline Charts</a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="heading text-uppercase">Access Privileges</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                            <span class="nav-label">Manage Accounts</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-2-level collapse">
                            <li>
                                <a href="<?php echo base_url.'withLogin/add_account.php'; ?>"> Add Account</a>
                            </li>
                            <li>
                                <a href="mail_view.html">Edit Profile</a>
                            </li>
                            <li>
                                <a href="mail_compose.html">Drop Account</a>
                            </li>
                        </ul>
                    </li>
                   <!--  <li>
                        <a href="calendar.html"><i class="sidebar-item-icon fa fa-eye"></i>
                            <span class="nav-label">View Activity log</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Pages</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="profile.html">Profile</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                            <li>
                                <a href="lockscreen.html">Lockscreen</a>
                            </li>
                            <li>
                                <a href="forgot_password.html">Forgot password</a>
                            </li>
                            <li>
                                <a href="error_404.html">404 error</a>
                            </li>
                            <li>
                                <a href="error_500.html">500 error</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                            <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="javascript:;">Level 2</a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-3-level collapse">
                                    <li>
                                        <a href="javascript:;">Level 3</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Level 3</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </nav>