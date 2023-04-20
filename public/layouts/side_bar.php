<!-- Sidebar Area Start Here -->
<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
    <div class="mobile-sidebar-header d-md-none">
        <div class="header-logo">
            <a href="index.php"><img src="img/log.jpg" alt=""></a>
        </div>
    </div>
    <div class="sidebar-menu-content">
        <ul class="nav nav-sidebar-menu sidebar-toggle-view" id="main-nav-sidebar-menu">


            <li class="nav-item">
                <a href="index.php?pg=<?php echo md5('dashboard');?>&option=<?php echo md5(''); ?>" class="nav-link <?php 
                if($pg==md5("dashboard"))
                echo "menu-active";
                else if($pg=="dashboard")
                echo "menu-active";
                ?>">
                <i class="flaticon-dashboard"></i><span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a href="index.php?pg=<?php echo md5('properties');?>&option=<?php echo md5(''); ?>" class="nav-link <?php echo ($pg== md5("properties"))?"menu-active":""; ?> ">
                    <i class="fa fa-school"></i><span>Properties</span></a>
            </li>

            <?php if($session->get('usertype') != "2"){?>

            <li class="nav-item">
                <a href="index.php?pg=<?php echo md5('client');?>&option=<?php echo md5(''); ?>" class="nav-link <?php echo($pg == md5("client"))?"menu-active":""; ?>"><i
                        class="fa fa-user"></i><span>Client</span></a>
            </li>


            <li class="nav-item">
                <a href="index.php?pg=<?php echo md5('land_sale');?>&option=<?php echo md5(''); ?>" class="nav-link <?php echo($pg == md5("land_sale"))?"menu-active":""; ?>"><i
                        class="fa fa-map"></i><span>Land </span></a>
            </li>

            <li class="nav-item">
                <a href="index.php?pg=<?php echo md5('rent_apartment');?>&option=<?php echo md5(''); ?>"
                    class="nav-link <?php echo($pg == md5("rent_apartment"))?"menu-active":""; ?>"><i class="fa fa-building"></i><span>Rent</span></a>
            </li>

            <li class="nav-item">
                <a href="index.php?pg=<?php echo md5('quotation');?>&option=<?php echo md5(''); ?>" class="nav-link <?php echo($pg == md5("quotation"))?"menu-active":""; ?>"><i class="fa fa-address-book"></i><span>Quotation</span></a>
            </li>

            <li class="nav-item">
                <a href="index.php?pg=<?php echo md5('inspection');?>&option=<?php echo md5(''); ?>" class="nav-link <?php echo($pg == md5("inspection"))?"menu-active":""; ?>"><i class="fa fa-search-plus"></i><span>Inspection</span></a>
            </li>


            <li class="nav-item">
                <a href="index.php?pg=<?php echo md5('expenditure');?>&option=<?php echo md5(''); ?>"
                    class="nav-link <?php echo($pg == md5("expenditure"))?"menu-active":""; ?>"><i class="flaticon-money"></i><span>Expenditure </span></a>
            </li>

            <?php } ?>



            <?php if($session->get('usertype') != "4" ){?>
          
            <li class="nav-item">
                <a href="index.php?pg=<?php echo md5('staff');?>&option=<?php echo md5(''); ?>" class="nav-link <?php echo($pg == md5("staff"))?"menu-active":""; ?>"><i
                        class="fa fa-users"></i><span>Staff</span></a>
            </li>
            <?php } ?>


            <?php if($session->get('usertype') == "1" || $session->get('usertype') == "2"){?>
          
            <li class="nav-item sidebar-nav-item <?php echo($pg == md5("report"))?"active":""; ?>">
                <a href="#" class="nav-link <?php echo($pg == md5("report"))?"menu-active":""; ?>"><i class="flaticon-script"></i><span>Report</span></a>
                <ul  <?php echo($pg == md5("report"))?'class="nav sub-group-menu menu-open" style="display:block;"':'class="nav sub-group-menu menu-open" style="display:none;"'; ?>>


                    <li class="nav-item">
                        <a href="index.php?pg=<?php echo md5('report');?>&trigger=<?php echo md5('property');?>"
                            class="nav-link <?php echo($trigger == md5("property"))?"menu-active":""; ?>"><i class="fas fa-angle-right"></i>Property</a>
                    </li>


                    <li class="nav-item">
                        <a href="index.php?pg=<?php echo md5('report');?>&trigger=<?php echo md5('staff'); ?>"
                            class="nav-link <?php echo($trigger == md5("staff"))?"menu-active":""; ?>"><i class="fas fa-angle-right"></i>Staff</a>
                    </li>


                    <li class="nav-item">
                        <a href="index.php?pg=<?php echo md5('report');?>&trigger=<?php echo md5('cleint'); ?>"
                            class="nav-link <?php echo($trigger == md5("cleint"))?"menu-active":""; ?>"><i class="fas fa-angle-right"></i>Client</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?pg=<?php echo md5('report');?>&trigger=<?php echo md5('landreport'); ?>"
                            class="nav-link <?php echo($trigger == md5("landreport"))?"menu-active":""; ?>"><i class="fas fa-angle-right"></i>Land Report</a>
                    </li>


                    <li class="nav-item">
                        <a href="index.php?pg=<?php echo md5('report');?>&trigger=<?php echo md5('apartmentreport'); ?>"
                            class="nav-link <?php echo($trigger == md5("apartmentreport"))?"menu-active":""; ?>"><i class="fas fa-angle-right"></i>Rent Report</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?pg=<?php echo md5('report');?>&trigger=<?php echo md5('paymentreport'); ?>"
                            class="nav-link <?php echo($trigger == md5("paymentreport"))?"menu-active":""; ?>"><i class="fas fa-angle-right"></i> General Payment Report</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?pg=<?php echo md5('report');?>&trigger=<?php echo md5('expenditurereport'); ?>"
                            class="nav-link <?php echo($trigger == md5("expenditurereport"))?"menu-active":""; ?>"><i class="fas fa-angle-right"></i>Expenditure</a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?pg=<?php echo md5('report');?>&trigger=<?php echo md5('inspectionreport'); ?>"
                            class="nav-link <?php echo($trigger == md5("inspectionreport"))?"menu-active":""; ?>"><i class="fas fa-angle-right"></i>Inspection</a>
                    </li>


                    <li class="nav-item">
                        <a href="index.php?pg=<?php echo md5('report');?>&trigger=<?php echo md5('quotationreport'); ?>"
                            class="nav-link <?php echo($trigger == md5("quotationreport"))?"menu-active":""; ?>"><i class="fas fa-angle-right"></i>Quoatation</a>
                    </li>


                </ul>
            </li>
            <?php } ?>


            <?php if($session->get('usertype') == "1"){?>
            <li class="nav-item">
                <a href="index.php?pg=<?php echo md5('user');?>&option=<?php echo md5(''); ?>" class="nav-link <?php echo($pg == md5("user"))?"menu-active":""; ?>"><i
                        class="fa fa-cogs"></i><span>Manage User</span></a>
            </li>
            <?php } ?>

        </ul>

    </div>
</div>
<!-- Sidebar Area End Here -->