<?php

if (!isset($_SESSION['USERID'])) {

  redirect(web_root . "admin/index.php");

}

?>

<?php

$query = "SELECT * FROM tblorder";

$mydb->setQuery($query);

$cur = $mydb->executeQuery();

$rowscount = $mydb->num_rows($cur);

$res = isset($rowscount) ? $rowscount : 0;



if ($res > 0) {

  $order = '<span style="color:black;">' . $res . '</span>';

} else {

  $order = '<span> ' . $res . '</span>';

}

?>

<?php

$query = "SELECT * FROM tblcustomer";

$mydb->setQuery($query);

$cur = $mydb->executeQuery();

$rowscount = $mydb->num_rows($cur);

$res = isset($rowscount) ? $rowscount : 0;



if ($res > 0) {

  $customer = '<span style="color:black;">' . $res . '</span>';

} else {

  $customer = '<span> ' . $res . '</span>';

}

?>

<?php

$query = "SELECT * FROM tblproduct";

$mydb->setQuery($query);

$cur = $mydb->executeQuery();

$rowscount = $mydb->num_rows($cur);

$res = isset($rowscount) ? $rowscount : 0;



if ($res > 0) {

  $product = '<span style="color:black;">' . $res . '</span>';

} else {

  $product = '<span> ' . $res . '</span>';

}

?>

<?php

$query = "SELECT * FROM tblsummary WHERE ORDEREDSTATS = 'Received'";

$mydb->setQuery($query);

$cur = $mydb->executeQuery();

$rowscount = $mydb->num_rows($cur);

$res = isset($rowscount) ? $rowscount : 0;



if ($res > 0) {

  $receive = '<span style="color:black;">' . $res . '</span>';

} else {

  $receive = '<span> ' . $res . '</span>';

}

?>



<style>
.main__title {

    display: flex;

    align-items: center;

}

.main__title>img {

    max-height: 100px;

    object-fit: contain;

    margin-right: 20px;

}

.main__greeting>h1 {

    font-size: 24px;

    color: #2e4a66;

    margin-bottom: 5px;

}

.main__greeting>p {

    font-size: 14px;

    font-weight: 700;

    color: #a5aaad;

}

.main__cards {

    display: grid;

    grid-template-columns: 1fr 1fr 1fr 1fr;

    gap: 30px;

    margin: 20px 0;

}

.card {

    display: flex;

    flex-direction: column;

    justify-content: space-around;

    height: 150px;

    padding: 25px;

    border-radius: 5px;

    background: #ffffff;

    box-shadow: 5px 5px 13px #ededed, -5px -5px 13px #ffffff;

}

.card_inner {

    display: flex;

    align-items: center;

    justify-content: space-between;

}

.card img {
    -webkit-transform: scale(1);
    transform: scale(1);
    -webkit-transition: .3s ease-in-out;
    transition: .3s ease-in-out;
}

.card :hover img {
    -webkit-transform: scale(1.3);
    transform: scale(1.3);
}

.card_inner>span {

    font-size: 25px;

}

.text-primary-p {

    color: #a5aaad;

    font-size: 14px;

    font-weight: 700;

}

.charts {

    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 30px;

    margin-top: 50px;

}



.charts__left {

    padding: 25px;

    border-radius: 5px;

    background: #ffffff;

    box-shadow: 5px 5px 13px #ededed, -5px -5px 13px #ffffff;

}



.charts__left__title {

    display: flex;

    align-items: center;

    justify-content: space-between;

}



.charts__left__title>div>h1 {

    font-size: 24px;

    color: #2e4a66;

    margin-bottom: 5px;

}



.charts__left__title>div>p {

    font-size: 14px;

    font-weight: 700;

    color: #a5aaad;

}



.charts__left__title>i {

    color: #ffffff;

    font-size: 20px;

    background: #ffc100;

    border-radius: 200px 0px 200px 200px;

    -moz-border-radius: 200px 0px 200px 200px;

    -webkit-border-radius: 200px 0px 200px 200px;

    border: 0px solid #000000;

    padding: 15px;

}



.charts__right {

    padding: 25px;

    border-radius: 5px;

    background: #ffffff;

    box-shadow: 5px 5px 13px #ededed, -5px -5px 13px #ffffff;

}



.charts__right__title {

    display: flex;

    align-items: center;

    justify-content: space-between;

}



.charts__right__title>div>h1 {

    font-size: 24px;

    color: #2e4a66;

    margin-bottom: 5px;

}



.charts__right__title>div>p {

    font-size: 14px;

    font-weight: 700;

    color: #a5aaad;

}



.charts__right__title>i {

    color: #ffffff;

    font-size: 20px;

    background: #39447a;

    border-radius: 200px 0px 200px 200px;

    -moz-border-radius: 200px 0px 200px 200px;

    -webkit-border-radius: 200px 0px 200px 200px;

    border: 0px solid #000000;

    padding: 15px;

}



.charts__right__cards {

    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 20px;

    margin-top: 30px;

}

.card1 {

    background: #d1ecf1;

    color: #35a4ba;

    text-align: top right;

    padding: 25px;

    border-radius: 5px;

    font-size: 14px;

}



.card2 {

    background: #d2f9ee;

    color: #38e1b0;

    text-align: top right;

    padding: 25px;

    border-radius: 5px;

    font-size: 14px;

}



.card3 {

    background: #d6d8d9;

    color: #3a3e41;

    text-align: top right;

    padding: 25px;

    border-radius: 5px;

    font-size: 14px;

}



.card4 {

    background: #fddcdf;

    color: #f65a6f;

    text-align: top right;

    padding: 25px;

    border-radius: 5px;

    font-size: 14px;

}

@media only screen and (max-width: 978px) {

    .container {

        grid-template-columns: 1fr;

        /* grid-template-rows: 0.2fr 2.2fr; */

        grid-template-rows: 0.2fr 3fr;

        grid-template-areas:

            "nav"

            "main";

    }



    #sidebar {

        display: none;

    }



    .sidebar__title>i {

        display: inline;

    }



    .nav_icon {

        display: inline;

    }

}

@media only screen and (max-width: 855px) {

    .main__cards {

        grid-template-columns: 1fr;

        gap: 10px;

        margin-bottom: 0;

    }



    .charts {

        grid-template-columns: 1fr;

        margin-top: 30px;

    }



}



@media only screen and (max-width: 480px) {

    .navbar__left {

        display: none;

    }

}
</style>

<?php

$user = new User();

$singleuser = $user->single_user($_SESSION['USERID']);



?>

<!-- 
<div class="container-fluid">
    <div class="card">
        <div class="card-body"> -->
<!-- <div class="main__title">

                    <img src="assets/blogger.png" alt="" />

                    <div class="main__greeting">

                        <h1><?php echo $_SESSION['U_ROLE']; ?></h1>

                        <p>Welcome to your dashboard</p>

                    </div>

                </div> -->



<!-- MAIN TITLE ENDS HERE -->



<!-- MAIN CARDS STARTS HERE -->


<div class="row">
    <!-- <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Sales Overview</h5>
                    </div>
                    <div>
                        <select class="form-select">
                            <option value="1">March 2023</option>
                            <option value="2">April 2023</option>
                            <option value="3">May 2023</option>
                            <option value="4">June 2023</option>
                        </select>
                    </div>
                </div>
                <div id="chart"></div>
            </div>
        </div>
    </div> -->
    <div class="main__cards">

        <div class="card"><a class="btn" href="<?php echo web_root; ?>admin/customers/index.php">

                <img src="assets/relationship.png" style="width: 50px; height: 50px;" />

                <div class="card_inner">

                    <p class="text-primary-p">Number of Customers</p>

                    <span class="font-bold text-title"><?php echo $customer; ?></span>

                </div>
            </a>
        </div>



        <div class="card">
            <a class="btn" href="<?php echo web_root; ?>admin/products/index.php">

                <img src="assets/gift.png" style="width: 50px; height: 50px;" />


                <div class="card_inner">

                    <p class="text-primary-p">Number of Products</p>

                    <span class="font-bold text-title"><?php echo $product; ?></span>

                </div>
            </a>
        </div>



        <div class="card"><a class="btn" href="<?php echo web_root; ?>admin/orders/index.php">

                <img src="assets/order-now.png" style="width: 50px; height: 50px; " />


                <div class="card_inner">

                    <p class="text-primary-p">Number of Orders</p>

                    <span class="font-bold text-title"><?php echo $order; ?></span>

                </div>
            </a>
        </div>



        <div class="card"><a class="btn" href="<?php echo web_root; ?>admin/orders/index.php">

                <img src="assets/receiver.png" style="width: 50px; height: 50px;" />


                <div class="card_inner">

                    <p class="text-primary-p">Received Orders</p>

                    <span class="font-bold text-title"><?php echo $receive; ?></span>

                </div>
            </a>
        </div>




    </div>


    <!-- </div>
        </div>
    </div> -->

    <!-- MAIN CARDS ENDS HERE -->

    <!-- CHARTS STARTS HERE -->

    <?php

$sql = "SELECT  * FROM `tblproduct`";

$mydb->setQuery($sql);

$res = $mydb->loadResultList();

foreach ($res as $row) {

  # code...

  $productname[] = $row->PRODESC;

  $qty[] = $row->PROQTY;

}



?>

    <!-- <div class="charts">

        <div class="charts__left">

            <div class="charts__left__title">

                <div>

                    <h1>Remaining Quantity</h1>

                    <p>Pie Chart</p>

                </div>

                <i class="fa fa-pie-chart" aria-hidden="true"></i>

            </div>

            <div class="tab-content no-padding"><canvas class="chart tab-pane active" id="chartjs_pie"
                    style="position: relative; height: 100px;"></canvas></div>

        </div>



        <?php

  $totAmount = 0;

  $Capital = 0;

  $totQty = 0;

  $markupPrice = 0;

  $totIncome = 0;



  $query = "SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C 

WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND ORDEREDSTATS='Received' AND S.`CUSTOMERID`=C.`CUSTOMERID`  

AND ORDEREDDATE >= CURRENT_DATE() GROUP BY `PRODESC`";

  $mydb->setQuery($query);

  $cur = $mydb->loadResultList();



  if (!isset($cus)) {

    foreach ($cur as $result) {

      # code...		
  
      $AMOUNT = $result->PROPRICE * $result->QTY;

      $INCOME = $AMOUNT - ($result->ORIGINALPRICE * $result->QTY);

      '.$result->ORDEREDDATE.';

      '.$result->ORIGINALPRICE.';

      '.$result->PROPRICE.';

      '.$result->QTY.';

      '.$AMOUNT.';

      '.$INCOME.';

      $Capital += $result->ORIGINALPRICE;

      $markupPrice += $result->PROPRICE;

      $totQty += $result->QTY;

      $totAmount += $AMOUNT;

      $totIncome += $INCOME;

    }
  }

  ?>

        <div class="charts__right">

            <div class="charts__right__title">

                <div>

                    <h1>Sales & Income</h1>

                    <p>Stats Report</p>

                </div>

                <i class="fa fa-peso-sign" aria-hidden="true">&#8369;</i>

            </div>



            <div class="charts__right__cards">

                <div class="card1">

                    <h3>Today's Income</h3>

                    <h4>&#8369;<?php echo number_format($totIncome, 2); ?></h4>

                </div>



                <div class="card2">

                    <h3>Today's Sales</h3>

                    <h4>&#8369;<?php echo number_format($totAmount, 2); ?></h4>

                </div>

                <?php

      $totAmount = 0;

      $Capital = 0;

      $totQty = 0;

      $markupPrice = 0;

      $totIncome = 0;



      $query = "SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C 

WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND ORDEREDSTATS='Received' AND S.`CUSTOMERID`=C.`CUSTOMERID`  

 GROUP BY `PRODESC`";

      $mydb->setQuery($query);

      $cur = $mydb->loadResultList();



      if (!isset($cus)) {

        foreach ($cur as $result) {

          # code...		
      
          $AMOUNT = $result->PROPRICE * $result->QTY;

          $INCOME = $AMOUNT - ($result->ORIGINALPRICE * $result->QTY);

          '.$result->ORDEREDDATE.';

          '.$result->ORIGINALPRICE.';

          '.$result->PROPRICE.';

          '.$result->QTY.';

          '.$AMOUNT.';

          '.$INCOME.';

          $Capital += $result->ORIGINALPRICE;

          $markupPrice += $result->PROPRICE;

          $totQty += $result->QTY;

          $totAmount += $AMOUNT;

          $totIncome += $INCOME;

        }
      }

      ?>

                <div class="card3">

                    <h3>Total Income</h3>

                    <h4>&#8369;<?php echo number_format($totIncome, 2); ?></h4>

                </div>



                <div class="card4">

                    <h3>Total Sales</h3>

                    <h4>&#8369;<?php echo number_format($totAmount, 2); ?></h4>

                </div>

            </div>

        </div>

    </div> -->



    <form class="" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

        <?php

  $totAmount = 0;

  $totEx = 0;

  $totQty = 0;



  $totIncome = 0;



  $query = "SELECT *,SUM(ORDEREDQTY) as 'QTY'  FROM `tblproduct` P  ,`tblpromopro` PR ,`tblorder` O, `tblsummary` S ,`tblcustomer` C 

WHERE P.`PROID`=PR.`PROID` AND PR.`PROID`=O.`PROID` AND O.`ORDEREDNUM`=S.`ORDEREDNUM` AND ORDEREDSTATS='Received' AND S.`CUSTOMERID`=C.`CUSTOMERID`  

 GROUP BY `PRODESC`";

  $mydb->setQuery($query);

  $cur = $mydb->loadResultList();



  if (!isset($cus)) {

    foreach ($cur as $result) {

      # code...	
  
      $AMOUNT = $result->PROPRICE * $result->QTY;

      $EXPENSES = $result->ORIGINALPRICE * $result->QTY;

      $INCOME = $AMOUNT - ($result->ORIGINALPRICE * $result->QTY);

      $Capital += $result->ORIGINALPRICE;

      $markupPrice += $result->PROPRICE;

      $totQty += $result->QTY;

      $totEx += $EXPENSES;

      $totAmount += $AMOUNT;

      $totIncome += $INCOME;

    }
  }

  ?>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <script type="text/javascript">
        var options = {

            series: [



                {

                    name: "<?php echo $result->PRODESC; ?>",

                    data: [<?php echo $result->PROQTY; ?>],

                },

            ],

            chart: {

                type: "bar",

                height: 250, // make this 250

                sparkline: {

                    enabled: true, // make this true

                },

            },

            plotOptions: {

                bar: {

                    horizontal: false,

                    columnWidth: "55%",

                    endingShape: "rounded",

                },

            },

            dataLabels: {

                enabled: false,

            },

            stroke: {

                show: true,

                width: 2,

                colors: ["transparent"],

            },

            xaxis: {

                categories: ["<?php echo date_format(date_create($result->ORDEREDDATE), "M/d/Y h:i:s A"); ?>"],

            },

            yaxis: {

                title: {

                    text: "&#8369;",

                },

            },

            fill: {

                opacity: 1,

            },

            tooltip: {

                y: {

                    formatter: function(val) {

                        return val;

                    },

                },

            },

        };



        var chart = new ApexCharts(document.querySelector("#apex1"), options);

        chart.render();
        </script>

        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

        <script type="text/javascript">
        var ctx = document.getElementById("chartjs_pie").getContext('2d');

        var myChart = new Chart(ctx, {

            type: 'pie',

            data: {

                labels: <?php echo json_encode($productname); ?>,

                datasets: [{

                    backgroundColor: [

                        "#0048BA",

                        "#B0BF1A",

                        "#7CB9E8",

                        "#B284BE",

                        "#DB2D43",

                        "#9F2B68",

                        "#3B7A57",

                        "#FFBF00",

                        "#3DDC84",

                        "#00FFFF",

                        "#FDEE00",

                        "#FF9966",

                        "red",

                        "gray",

                        "blue",

                        "yellow",

                        "violet",

                        "black",

                        "green",

                        "orange",

                        "brown",

                        "pink",

                        "maroon",

                        "yellowgreen",

                        "fushia"

                    ],

                    data: <?php echo json_encode($qty); ?>,

                }]

            },

            options: {

                legend: {

                    display: false,

                    position: 'bottom',



                    labels: {

                        fontColor: '#71748d',

                        fontFamily: 'Circular Std Book',

                        fontSize: 14,

                    }

                },





            }

        });
        </script>

        <script src=https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js></script>

        <script src=https://code.jquery.com/jquery-3.3.1.min.js></script>



        <script>
        $(function() {

                    //get the bar chart canvas

                    Var cData = JSON.parse('<?php echo $qty; ?>');

                    Var ctx = $("#bar-chart");



                    //bar chart data

                    Var data = {

                            Labels: cData.label,

                            Datasets: [

                                    {

                                        Label: cData.label,

                                        Data: cData.data,

                                        backgroundColor: [

                                            "#DEB887",

                                            "#A9A9A9",

                                            "#DC143C",

                                            "#F4A460",

                                            "#2E8B57",

                                            "#1D7A46",

                                            "#CDA776",

                                            "#CDA776",

                                            "#989898",

                                            "#CB252B",

                                            "#E39371",

                                        ],

                                        borderColor: [

                                            "#CDA776",

                                            "#989898",

                                            "#CB252B",

                                            "#E39371",

                                            "#1D7A46",

                                            "#F4A460",

                                            “#CDA776”,

                                            “#DEB887”,

                                            “#A9A9A9”,

                                            “#DC143C”,

                                            “#F4A460”,

                                            “#2E8B57”,

            ],

            borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]

          }

        ]

      };



      //options

      Var options = {

                                                Responsive: true,

                                                Title: {

                                                    Display: true,

                                                    Position: "top",

                                                    Text: "Monthly Registered Users Count",

                                                    fontSize: 18,

                                                    fontColor: "#111"

                                                },

                                                Legend: {

                                                    Display: true,

                                                    Position: "bottom",

                                                    Labels: {

                                                        fontColor: "#333",

                                                        fontSize: 16

                                                    }

                                                }

                                            };



                                            //create bar Chart class object

                                            Var chart1 = new Chart(ctx, {

                                                Type: "bar",

                                                Data: data,

                                                Options: options

                                            });



                                        });
        </script>

        <!-- <script src="<?php echo web_root; ?>admin/assets/js/scripts.min.js"></script>
        <script src="<?php echo web_root; ?>admin/assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo web_root; ?>admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo web_root; ?>admin/assets/js/sidebarmenu.js"></script>
        <script src="<?php echo web_root; ?>admin/assets/js/app.min.js"></script>
        <script src="<?php echo web_root; ?>admin/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="<?php echo web_root; ?>admin/assets/libs/simplebar/dist/simplebar.js"></script>
        <script src="<?php echo web_root; ?>admin/assets/js/dashboard.js"></script> -->