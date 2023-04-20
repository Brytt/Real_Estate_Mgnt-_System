<?php    
    
    $messages = $engine->getMessages();
    $messagescount = $engine->getMessagesCount();
    $notifications = $engine->getNotifications();
    $notificationscount = $engine->getNotificationsCount();
    $ticketsCount = $engine->getticketsCount();
    $insight = $engine->getInsight();
 
    
    
?>


<div id="wrapper" class="wrapper bg-ash">
    <!-- Header Menu Area Start Here -->
    <div class="navbar navbar-expand-md header-menu-one bg-light">
        <div class="nav-bar-header-one">
            <div class="header-logo">
                <a href="index.php?pg=<?php echo md5('dashboard');?>&option=<?php echo md5(''); ?>">
                    <img style="max-width: 1000px; height: 80px;" src="media/img/rke_logo.png" alt="logo">
                </a>
            </div>
            <div class="toggle-button sidebar-toggle">
                <button type="button" class="item-link">
                    <span class="btn-icon-wrap">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="d-md-none mobile-nav-bar">
            <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse"
                data-target="#mobile-navbar" aria-expanded="false">
                <i class="far fa-arrow-alt-circle-down"></i>
            </button>
            <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar" style="text-align:right;">
            <ul class="navbar-nav">
                <li class="navbar-item header-search-bar">
                    <div class="input-group stylish-input-group">

                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="navbar-item dropdown header-admin">
                    <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        <div class="admin-title">
                            <h5 class="item-title"><?php  echo $session->get("userfullname"); ?></h5>
                            <span>
                                <?php 
                                $system_user_type = array("ADMINISTRATOR", "EXECUTIVE USER", " MANAGER", "USER");
                                $i=1; 
                                foreach($system_user_type as $val_type){
                                    if($i == $session->get("useraccesslevel")){
                                        echo $val_type;
                                    }
                                    $i++;
                                    }
                                ?></span>
                        </div>
                        <div class="admin-img">
                            <img src="media/img/figure/admin.jpg" alt="Admin">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="item-header">
                            <h6 class="item-title"><?php  echo $session->get("userfullname"); ?></h6>
                        </div>
                        <div class="item-content">
                            <ul class="settings-list">
                                <li><a
                                        href="index.php?pg=<?php echo md5('profile');?> &option=<?php echo md5('details'); ?>">
                                        <i class="flaticon-user"></i>My Profile</a>
                                </li>
                                <li><a
                                        href="index.php?pg=<?php echo md5('user');?>&option=<?php echo md5('password'); ?>"><i
                                            class="flaticon-gear-loading"></i>Change Password</href=>
                                </li>
                                <li><a href="#" onclick="logout();"><i class="flaticon-turn-off"></i>Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Header Menu Area End Here -->
    <!-- Page Area Start Here -->
    <div class="dashboard-page-one">


        <script>
        function logout() {
            swal({

                    title: "Are you sure?",
                    text: "You want to logout!",
                    icon: "warning",
                    dangerMode: true,
                    buttons: ["No", "Yes, Logout"],
                })
                .then((confirm) => {
                    if (confirm) {
                        window.location.href = 'index.php?action=logout';
                    }
                });

        }
        </script>