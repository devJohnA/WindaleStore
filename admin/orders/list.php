<div class="container">
    <?php
    // Ensure user is logged in
    if (!isset($_SESSION['USERID'])) {
        redirect(web_root."admin/index.php");
    }

    // Function to display any messages
    check_message();
    ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="main__title">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="fs-4">List of Orders</h1>
                        </div>
                    </div>

                    <form action="controller.php?action=delete" Method="POST">
                        <div class="table-responsive">
                            <table id="dash-table" class="table table-striped table-bordered table-hover"
                                style="font-size:12px" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Order#</th>
                                        <th>Customer</th>
                                        <th>DateOrdered</th>
                                        <th>Price</th>
                                        <th>PaymentMethod</th>
                                        <th>Status</th>
                                        <th width="120px">Action</th>
                                        <th>View Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM tblsummary s ,tblcustomer c 
                                              WHERE s.CUSTOMERID=c.CUSTOMERID ORDER BY ORDEREDNUM desc ";
                                    $mydb->setQuery($query);
                                    $cur = $mydb->loadResultList();

                                    foreach ($cur as $result) {
                                        echo '<tr>';
                                        echo '<td width="3%" align="center">' . $result->ORDEREDNUM . '</td>';
                                        echo '<td><a href="index.php?view=customerdetails&customerid=' . $result->CUSTOMERID . '" title="View customer information">' . $result->FNAME . ' ' . $result->LNAME . '</a></td>';
                                        echo '<td>' . date_format(date_create($result->ORDEREDDATE), "M/d/Y h:i:s ") . '</td>';
                                        echo '<td> &#8369;' . number_format($result->PAYMENT, 2) . '</td>';
                                        echo '<td>' . $result->PAYMENTMETHOD . '</td>';
                                        echo '<td>' . $result->ORDEREDSTATS . '</td>';

                                        // Actions based on order status
                                        if ($result->ORDEREDSTATS == 'Pending') {
                                            echo '<td style="text-align: center;">
                                                   
                                                    <a href="controller.php?action=edit&id=' . $result->ORDEREDNUM . '&customerid=' . $result->CUSTOMERID . '&actions=confirm" class="btn btn-warning btn-sm">Confirm</a>
                                                </td>';
                                        // } elseif ($result->ORDEREDSTATS == 'Cancelled') {
                                        //     echo '<td style="text-align: center;">
                                        //             <a href="#" class="btn btn-danger btn-sm" disabled>Cancelled</a>
                                        //         </td>';
                                        } elseif ($result->ORDEREDSTATS == 'Confirmed') {
                                            if ($result->PAYMENTMETHOD == "Cash on Delivery") {
                                                echo '<td style="text-align: center;">
                                                        <a href="#" class="btn btn-success btn-sm" disabled>Confirmed</a>
                                                        <a href="controller.php?action=edit&id=' . $result->ORDEREDNUM . '&customerid=' . $result->CUSTOMERID . '&actions=deliver" class="btn btn-primary btn-sm">On The Way</a>
                                                    </td>';
                                            } elseif ($result->PAYMENTMETHOD == "Cash on Pickup") {
                                                echo '<td style="text-align: center;">
                                                        <a href="#" class="btn btn-success btn-sm" disabled>Confirmed</a>
                                                    </td>';
                                            } elseif ($result->ORDEREDSTATS == 'Received') {
                                                echo '<td style="text-align: center;">
                                                        <a href="#" class="btn btn-success btn-sm" disabled>Received</a>
                                                    </td>';
                                            }
                                        } elseif ($result->ORDEREDSTATS == 'On The Way') {
                                            echo '<td style="text-align: center;">
                                                    <a href="#" class="btn btn-success btn-sm" disabled>On The Way</a>
                                                </td>';
                                        } elseif ($result->ORDEREDSTATS == 'Received') {
                                            echo '<td style="text-align: center;">
                                                    <a href="#" class="btn btn-success btn-sm" disabled>Received</a>
                                                </td>';
                                        }

                                        // View Order button
                                        echo '<td><center><a href="#" title="View list Of ordered" class="orders btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-id="' . $result->ORDEREDNUM . '">View Order</a></center></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for displaying detailed order -->
    <div class="modal fade" id="myModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 style="cursor:pointer;" class="close" data-dismiss="modal" onclick="handleModalClose()"><span
                            class="btn-close" aria-label="Close"> </span>
                    </h1>
                    <h4 class="modal-title">Order Details</h4>
                </div>
                <div class="modal-body" id="modal-body-content">
                    <!-- Content will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container -->
<script src="assets/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.orders').click(function(e) {
        e.preventDefault();
        var ordernumber = $(this).data('id');
        $.ajax({
            url: 'orderedproduct.php',
            type: 'post',
            data: {
                ordernumber: ordernumber
            },
            success: function(response) {
                $('#modal-body-content').html(response);
                $('#myModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

function handleModalClose() {
    $('body').removeClass('modal-open'); // Fix for modal scrollbar issue
    $('.modal-backdrop').remove(); // Fix for modal backdrop remaining
    $('html, body').animate({
        scrollTop: 0
    }, 'fast'); // Scroll to top of page
}
</script>