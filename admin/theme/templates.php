<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?> | Admin Dashboard</title>

    <link rel="stylesheet" href="<?php echo web_root; ?>admin/assets/css/styles.min.css" />
    <link rel="icon" href="<?php echo web_root; ?>/../img/windales.png">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/themify-icons/0.1.2/css/themify-icons.css"> -->
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- datetime picker CSS -->
    <link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo web_root; ?>css/datepicker.css" rel="stylesheet" media="screen">

</head>
<style>
.sidebar-nav ul .sidebar-item.selected>.sidebar-link,
.sidebar-nav ul .sidebar-item.selected>.sidebar-link.active,
.sidebar-nav ul .sidebar-item>.sidebar-link.active {
    background-color: #e90c0c;
    color: #fff;
}
</style>
<?php
admin_confirm_logged_in();
?>


<?php
$query = "SELECT * FROM tblsummary WHERE ORDEREDSTATS = 'Pending'";
$mydb->setQuery($query);
$cur = $mydb->executeQuery();
$rowscount = $mydb->num_rows($cur);
$res = isset($rowscount) ? $rowscount : 0;

if ($res > 0) {
    $order = '<span style="color:red;">(' . $res . ')</span>';
} else {
    $order = '<span> (' . $res . ')</span>';
}
?>

<?php
$query = "SELECT * FROM messagein WHERE ReceiveTime >= CURRENT_DATE()";
$mydb->setQuery($query);
$cur = $mydb->executeQuery();
$rowscount = $mydb->num_rows($cur);
$res = isset($rowscount) ? $rowscount : 0;

if ($res > 0) {
    $code = '<span style="color:red;">(' . $res . ')</span>';
} else {
    $code = '<span> (' . $res . ')</span>';
}
?>

<body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="<?php echo web_root; ?>admin/index.php" class="text-nowrap logo-img">
                        <img src="<?php echo web_root; ?>admin/assets/img/windale.jpg" width="120" height="" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo web_root; ?>admin/dashboard/index.php"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo web_root; ?>admin/products/index.php"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-list"></i>
                                </span>
                                <span class="hide-menu">Products/Stock</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo web_root; ?>admin/orders/index.php">
                                <span>
                                    <i class="ti ti-shopping-cart"></i>
                                </span>
                                <span class="hide-menu">Orders </span><?php echo $order; ?>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo web_root; ?>admin/category/index.php"
                                aria-expanded="false">
                                <span>
                                    <i class="fas fa-th-list"></i>
                                </span>
                                <span class="hide-menu">Categories</span>
                            </a>
                        </li>
                        <?php if ($_SESSION['U_ROLE'] == 'Administrator') { ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo web_root; ?>admin/user/index.php"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">User</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo web_root; ?>admin/settings/index.php"
                                aria-expanded="false">
                                <span>
                                    <i class="fas fa-truck"></i>
                                </span>
                                <span class="hide-menu">Set Delivery Fee</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo web_root; ?>admin/report/index.php"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <span class="hide-menu">Reports</span>
                            </a>
                        </li>
                        <?php } ?>
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo web_root; ?>admin/customers/index.php"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">Customers</span>
                            </a>
                        </li> -->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li> -->
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <?php
$user = new User();
$singleuser = $user->single_user($_SESSION['USERID']);
?>

                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/img/admin.jpg" alt="" width="55" height="45"
                                        class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <?php if ($_SESSION['U_ROLE'] == 'Administrator' || $_SESSION['U_ROLE'] == 'Staff') { ?>
                                        <a class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3"><?php echo $_SESSION['U_NAME']; ?></p>
                                        </a>
                                        <a href="<?php echo web_root; ?>admin/user/index.php?view=edit&id=<?php echo $_SESSION['USERID']; ?>"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-pencil fs-6"></i>
                                            <p class="mb-0 fs-3">Edit My Profile</p>
                                        </a>
                                        <?php } ?>
                                        <a href="<?php echo web_root; ?>admin/logout.php"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->

            <!-- Page content -->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                    if ($title <> 'Dashboard') {
                        echo '<p class="breadcrumb" style="margin-top: 8px;">
                        <a href="index.php" title="' . $title . '">' . $title . '</a>
                        ' . (isset($header) ? ' / ' . $header : '') . '</p>';
                    } ?>

                        <?php check_message(); ?>
                        <?php require_once $content; ?>
                    </div>
                </div>
            </div>
            <!-- /#page-wrapper -->

            <!-- Profile Modal -->
            <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal fade" id="usermodal" tabindex="-1" aria-labelledby="usermodalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="usermodalLabel">Profile Image</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="<?php echo web_root; ?>admin/user/controller.php?action=photos"
                                        enctype="multipart/form-data" method="post">
                                        <div class="modal-body">
                                            <div class="mb-3 text-center">
                                                <img class="img-fluid rounded" title="profile image"
                                                    src="<?php echo web_root . 'admin/user/' . $singleuser->USERIMAGE ?>">
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" name="MIDNO" id="MIDNO"
                                                    value="<?php echo $_SESSION['USERID']; ?>">
                                                <input name="MAX_FILE_SIZE" type="hidden" value="1000000">
                                                <input class="form-control" id="photo" name="photo" type="file">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="savephoto">Upload
                                                Photo</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile Modal end -->
        </div>
    </div>
    <script src="<?php echo web_root; ?>admin/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn. datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn. datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo web_root; ?>admin/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo web_root; ?>admin/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo web_root; ?>admin/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo web_root; ?>admin/assets/js/scripts.min.js"></script>
    <script src="<?php echo web_root; ?>admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo web_root; ?>admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo web_root; ?>admin/assets/js/sidebarmenu.js"></script>
    <script src="<?php echo web_root; ?>admin/assets/js/app.min.js"></script>
    <!-- <script src="<?php echo web_root; ?>admin/assets/libs/apexcharts/dist/apexcharts.min.js"></script> -->
    <script src="<?php echo web_root; ?>admin/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="<?php echo web_root; ?>admin/assets/js/dashboard.js"></script>
    <script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.uk.js" charset="UTF-8">
    </script>
    <script type="text/javascript">
    $(document).on("click", ".PROID", function() {
        // var id = $(this).attr('id');
        var proid = $(this).data('id')
        // alert(proid)
        $(".modal-body #proid").val(proid)

    });
    </script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <!--<script>
    $(document).ready(function() {
        var t = $('#example').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            // "sort": false,
            //ordering start at column 1
            "order": [
                [6, 'desc']
            ]
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });




    $(document).ready(function() {
        $('#dash-table').DataTable({
            responsive: true,
            "sort": false
        });

    }); -->

    <script>
    $('.date_pickerfrom').datetimepicker({
        format: 'mm/dd/yyyy',
        startDate: '01/01/2000',
        language: 'en',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0

    });


    $('.date_pickerto').datetimepicker({
        format: 'mm/dd/yyyy',
        startDate: '01/01/2000',
        language: 'en',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0

    });
    // $(function() {
    //         var dates = $( "#date_pickerfrom, #date_pickerto" ).datepicker({                                   
    //             defaultDate:'',
    //             changeMonth: true,
    //             numberOfMonths: 1,
    //             onSelect: function( selectedDate ) {
    //             var now =Date();
    //                 var option = this.id == "from" ? "minDate" : "maxDate",
    //                     instance = $(this).data("datepicker"),
    //                     date = $.datepicker.parseDate(
    //                         instance.settings.dateFormat ||
    //                         $.datepicker._defaults.dateFormat,
    //                         selectedDate, instance.settings );
    //                 dates.not( this ).datepicker( "option", option, date );
    //             }
    //         });


    $('#date_picker').datetimepicker({
        format: 'mm/dd/yyyy',
        language: 'en',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        changeMonth: true,
        changeYear: true,
        yearRange: '1945:' + (new Date).getFullYear()
    });
    </script>

</body>

</html>