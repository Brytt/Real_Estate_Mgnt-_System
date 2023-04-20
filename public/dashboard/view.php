<?php 

    function round_up ($value, $places=0) {
        if ($places < 0) { $places = 0; }
        $mult = pow(10, $places);
        return ceil($value * $mult) / $mult;
      }


        $insight = $engine->getInsight();
    ?>
<!-- Dashboard summery Start Here -->

<div class="dashboard-content-one">

    <!-- Breadcubs Area Start Here -->
    <div class="row gutters-20 mt-4">
        <div class="col-xl-3 col-sm-6 ">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-yellow">
                            <i class="fa fa-school text-black-50 mt-3"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">No. of Property</div>
                            <div class="item-number"><span class="counter"
                                    data-num="<?php echo $insight['propertycount']; ?>"><?php echo $insight['propertycount']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 ">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-green ">
                            <i class="flaticon-multiple-users-silhouette text-green"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Active Clients</div>
                            <div class="item-number"><span class="counter"
                                    data-num="<?php echo $insight['clientcount']; ?>"><?php echo $insight['clientcount']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if( $session->get('usertype') != "4"  ){?>

        <div class="col-xl-3 col-sm-6 ">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-blue">
                            <i class="flaticon-money  text-blue"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <h6 class="item-title ">Monthly Income</h6>

                            <?php 
                                $total_income = $insight['income_count'][0]['ALT_TOTAL_PAYMENT'];  
                            ?>
                            <div class="item-number"> <i class='w-5 fa-solid fa-cedi-sign'></i> <span class="counter"
                                    data-num="<?php echo $total_income; ?>">
                                    <?php echo $total_income; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 ">
            <div class="dashboard-summery-one mg-b-20">

                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-red">
                            <i class="flaticon-money text-red"></i>
                        </div>
                    </div>
                    <div class="col-6 p-0 m-0">
                        <div class="item-content">
                            <h6 class="item-title">Expenditure</h6>
                            <?php 
                                $total_expenses = $insight['exp_count'][0]['EXP_AMOUNT'];  
                            ?>
                            <div class="item-number"> <i class='w-5 fa-solid fa-cedi-sign'></i> <span class="counter"
                                    data-num="<?php echo $total_expenses; ?>">
                                    <?php echo $total_expenses; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <?php if($session->get('usertype') != "2"){?>
    <div class="row gutters-20">
        <div class="col-6 col-sm-4 col-lg-2 ">
            <div class="d-sm-flex align-items-center justify-content-between ">
                <h5 class="h5 text-gray-800 ml-2 mb-0">Quick Menu</h5>
            </div>
        </div>
    </div>

    <div class="row gutters-20">

        <div class="col-6 col-sm-4 col-lg-2 p-3">
            <a class="text-decoration-none"
                href="index.php?pg=<?php echo md5('properties');?>&option=<?php echo md5(''); ?>">
                <div class="card quick_hover py-3 m-0">
                    <div class="row text-center">
                        <img class="rounded mx-auto d-block" style="height: 5rem;" src="media/images/property.png"
                            alt="">
                    </div>
                    <div class="h6 text-dark mt-1 pt-0 text-center">Property</div>
                </div>
            </a>
        </div>

        <div class="col-6 col-sm-4 col-lg-2 p-3">
            <a class="text-decoration-none"
                href="index.php?pg=<?php echo md5('land_sale');?>&option=<?php echo md5(''); ?>">
                <div class="card quick_hover py-3 m-0">
                    <div class="row text-center">
                        <img class="rounded mx-auto d-block" style="height: 5rem;" src="media/images/land.png" alt="">
                    </div>
                    <div class="h6 text-dark mt-1 pt-0 text-center">Land</div>
                </div>
            </a>
        </div>


        <div class="col-6 col-sm-4 col-lg-2 p-3">
            <a class="text-decoration-none"
                href="index.php?pg=<?php echo md5('rent_apartment');?>&option=<?php echo md5(''); ?>">
                <div class="card quick_hover py-3 m-0">
                    <div class="row text-center">
                        <img class="rounded mx-auto d-block" style="height: 5rem;" src="media/images/c.png" alt="">
                    </div>
                    <div class="h6 text-dark mt-1 pt-0 text-center">Apartment</div>
                </div>
            </a>
        </div>


        <div class="col-6 col-sm-4 col-lg-2 p-3">
            <a class="text-decoration-none"
                href="index.php?pg=<?php echo md5('client');?>&option=<?php echo md5(''); ?>">
                <div class="card quick_hover py-3 m-0">
                    <div class="row text-center">
                        <img class="rounded mx-auto d-block" style="height: 5rem;" src="media/images/clients.jpg"
                            alt="">
                    </div>
                    <div class="h6 text-dark mt-1 pt-0 text-center">Client</div>
                </div>
            </a>
        </div>



        <div class="col-6 col-sm-4 col-lg-2 p-3">
            <a class="text-decoration-none"
                href="index.php?pg=<?php echo md5('quotation');?>&option=<?php echo md5(''); ?>">
                <div class="card quick_hover py-3 m-0">
                    <div class="row text-center">
                        <img class="rounded mx-auto d-block" style="height: 5rem;" src="media/images/quotation.webp"
                            alt="">
                    </div>
                    <div class="h6 text-dark mt-1 pt-0 text-center">Quotation</div>
                </div>
            </a>
        </div>

        <div class="col-6 col-sm-4 col-lg-2 p-3">
            <a class="text-decoration-none"
                href="index.php?pg=<?php echo md5('inspection');?>&option=<?php echo md5(''); ?>">
                <div class="card quick_hover py-3 m-0">
                    <div class="row text-center">
                        <img class="rounded mx-auto d-block" style="height: 5rem;"
                            src="media/images/customer_history-1.png" alt="">
                    </div>
                    <div class="h6 text-dark mt-1 pt-0 text-center">Inspection</div>
                </div>
            </a>
        </div>



    </div>

    <?php } ?>
    <!-- Content Row -->

    <?php if($session->get('usertype') != "4"){?>
    <div class="row gutters-20">

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4 mr-0">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Active Clients</h6>

                </div>



                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div class="doughnut-chart-wrap">
                            <canvas id="staff-doughnut-chart" width="100" height="300"></canvas>
                        </div>
                        <div class="student-report">
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-warning"></i> Client:
                                    <?php echo $insight['clientcount']; ?>
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Inspection:
                                    <?php echo $insight['inspectioncount']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Sales Overview</h6>

                </div>


                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div class=" col-12 earning-report">

                        </div>
                        <div class="earning-chart-wrap">
                            <canvas id="earning-line-chart" width="660" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php } ?>



    <?php if($session->get('usertype') != "2"){?>
    <div class="row gutters-20 mt-5">
        <div class="col-lg-7 col-md-12 col-sm-12 col-12">
            <div class="card shadow mb-4 mr-0">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Apartments CheckOut</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-wrap">
                        <div class="table-responsive tblHeightSet">
                            <table class="table display product-overview mb-30" id="support_table">
                                <thead>
                                    <tr>
                                        <th>Client Name</th>
                                        <th>Property</th>
                                        <th>Unit</th>
                                        <th>Check-Out</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        while($obj = $stmtlistApt->FetchNextObject()){
                                ?>
                                    <tr>
                                        <td><?php echo ucwords(strtolower($obj->AR_CLIENT_NAME));?></td>
                                        <td><?php echo ucwords(strtolower($obj->AR_PROPERTY_NAME));?></td>
                                        <td><?php echo$obj->AR_APARTMENT_NUMBER;?></td>
                                        <td>
                                            <?php echo $engine->checkExpiring($obj->AR_CHECKING_OUT_DATE);?>
                                        </td>

                                    </tr>

                                    <?php

                                    }
                                    
                                    ?>

                                    <tr>
                                        <td colspan="4" class="empty-text text-center">
                                            <a class="text-decoration-none text-center"
                                                href="index.php?pg=<?php echo md5('rent_apartment');?>&option=<?php echo md5(''); ?>">
                                                View more </a>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-lg-5 col-md-12 col-sm-12 col-12">
            <div class="card shadow mb-4 mr-0">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Land Repayment</h6>
                </div>
                <div>

                    <div class="mt">
                        <ul class="m-0 p-3">


                            <?php
                                    while($obj = $stmtlistLand->FetchNextObject()){
                                    
                                ?>
                            <li>

                                <div class="row " style="width:100%">
                                    <div class=" col-sm-2 prog-avatar ">
                                        <img style="border-radius:50%;" src="media\img\figure\parents.jpg" alt=""
                                            width="auto" height="50%" class="my-1">
                                    </div>
                                    <div class=" col-sm-7 text-left">
                                        <div class="title client_name" style="color: #232383;">
                                            <?php echo ucwords(strtolower($obj->LS_CLIENT_NAME));?>
                                        </div>
                                        <div>
                                            <span class="clsAvailable"><b>
                                                    <?php echo ucwords(strtolower($obj->LS_PROPERTY_NAME));?></b></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 text-right">
                                        <div class="text-white">
                                            <?php  $engine->checkNextPayDate($obj->LS_NEXT_PAY_DATE);?>
                                        </div>
                                        <div class=" balance_score text-right" style="color: #232383;">
                                            GH:<span>&#8373;</span>
                                            <?php echo$obj->LS_BALANCE;?>
                                        </div>
                                    </div>

                                    <?php

                                    }
                                    
                                    
                                ?>

                            </li>

                            <div class="row">
                                <div class="col-md-12 p-3 text-center">
                                    <a class="text-decoration-none"
                                        href="index.php?pg=<?php echo md5('land_sale');?>&option=<?php echo md5(''); ?>">
                                        View more </a>
                                </div>
                            </div>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php } ?>


    <script src="https://kit.fontawesome.com/1e251ad7a1.js" crossorigin="anonymous"></script>

    <script>
    /*-------------------------------------
          Doughnut Chart 
      -------------------------------------*/
    if ($("#staff-doughnut-chart").length) {

        var doughnutChartData = {
            labels: ["Inspection", "Client"],
            datasets: [{
                backgroundColor: ["#304ffe", "#ffa601"],
                data: [<?php echo (int)$insight['inspectioncount']; ?>,
                    <?php echo (int)$insight['clientcount']; ?>
                ],
                label: "Property"
            }, ]
        };
        var doughnutChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 65,
            rotation: -9.4,
            animation: {
                duration: 2000
            },
            legend: {
                display: false
            },
            tooltips: {
                enabled: true
            },
        };
        var studentCanvas = $("#staff-doughnut-chart").get(0).getContext("2d");
        var studentChart = new Chart(studentCanvas, {
            type: 'doughnut',
            data: doughnutChartData,
            options: doughnutChartOptions
        });

    }


    /*-------------------------------------
          Line Chart 
      -------------------------------------*/
    if ($("#earning-line-chart").length) {

        var monthsArray = new Array();
        var amountArray = new Array();

        monthsArray.push(' ');
        amountArray.push('0')

        <?php
    $query = $sql->Execute($sql->Prepare("SELECT  Month( GEN_REV_CREATED_DATE ) AS month, SUM(GEN_REV_AMOUNT) AS amount  FROM general_revenue_tb WHERE GEN_REV_STATUS !='0' GROUP BY Month(GEN_REV_CREATED_DATE ) ORDER BY  Month(GEN_REV_CREATED_DATE ) ;"),array());
    print $sql->ErrorMsg();


    while($obj = $query->FetchNextObject()){ 

    
?>
        monthsArray.push('<?php echo $system_month_short[$obj->MONTH];?>');
        amountArray.push('<?php echo $obj->AMOUNT;?>');

        <?php 
        }
    ?>


        var lineChartData = {
            labels: monthsArray,
            datasets: [{
                data: amountArray,
                backgroundColor: '#417dfc',
                borderColor: '#417dfc',
                borderWidth: 1,
                pointRadius: 0,
                pointBackgroundColor: '#304ffe',
                pointBorderColor: '#ffffff',
                pointHoverRadius: 6,
                pointHoverBorderWidth: 3,
                fill: 'origin',
                label: "Fees Income"
            }]
        };
        var lineChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 2000
            },
            scales: {

                xAxes: [{
                    display: true,
                    ticks: {
                        display: true,
                        fontColor: "#222222",
                        fontSize: 16,
                        padding: 20
                    },
                    gridLines: {
                        display: true,
                        drawBorder: true,
                        color: '#cccccc',
                        borderDash: [5, 5]
                    }
                }],
                yAxes: [{
                    display: true,
                    ticks: {
                        display: true,
                        autoSkip: true,
                        maxRotation: 0,
                        fontColor: "#646464",
                        fontSize: 16,
                        stepSize: 25000,
                        padding: 20,
                        callback: function(value) {
                            var ranges = [{
                                    divider: 1e6,
                                    suffix: 'M'
                                },
                                {
                                    divider: 1e3,
                                    suffix: 'k'
                                }
                            ];

                            function formatNumber(n) {
                                for (var i = 0; i < ranges.length; i++) {
                                    if (n >= ranges[i].divider) {
                                        return (n / ranges[i].divider).toString() + ranges[i].suffix;
                                    }
                                }
                                return n;
                            }
                            return formatNumber(value);
                        }
                    },
                    gridLines: {
                        display: true,
                        drawBorder: false,
                        color: '#cccccc',
                        borderDash: [5, 5],
                        zeroLineBorderDash: [5, 5],
                    }
                }]
            },
            legend: {
                display: false
            },
            tooltips: {
                mode: 'index',
                intersect: false,
                enabled: true
            },
            elements: {
                line: {
                    tension: .35
                },
                point: {
                    pointStyle: 'circle'
                }
            }
        };
        var earningCanvas = $("#earning-line-chart").get(0).getContext("2d");
        var earningChart = new Chart(earningCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
        });
    }
    </script>