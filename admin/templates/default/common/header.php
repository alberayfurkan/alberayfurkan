<!DOCTYPE html>
<html class="loading" lang="tr" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <title><?php echo $config->get('SITE_GENERATOR') ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $config->get('URL') ?>assets/admin/img/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL'); ?>assets/admin/lib/datatable/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL')  ?>assets/admin/lib/datatable/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL')  ?>assets/admin/lib/datatable/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL')  ?>assets/admin/lib/datatable/css/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL')  ?>assets/admin/lib/sweetalert/sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL') ?>assets/admin/css/apexcharts.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL') ?>assets/admin/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL') ?>assets/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL') ?>assets/admin/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL') ?>assets/admin/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL') ?>assets/admin/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL') ?>assets/admin/css/menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->get('URL') ?>assets/admin/css/style.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <!-- Mobil Menü-->
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <?php
                            global $db;
                            $id = $_COOKIE['user_id'];

                            $users = $db->getRows("SELECT * FROM users WHERE id = $id");

                            foreach ($users['row'] as $row) {
                            ?>
                                <span class="user-name fw-bolder"><?php echo $row['fullname']; ?></span><span class="user-status">Admin</span>
                            <?php
                            }
                            if (empty($row['photo'])) {
                                $avatar = 'assets/admin/img/profile.jpg';
                            } else {
                                $avatar = "uploads/images/" . $row['photo'];
                            }
                            ?>
                        </div>
                        <span class="avatar">
                            <img class="round" src="<?php echo $config->get('URL') . $avatar; ?>" alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>

                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="<?php $system->router('admin', 'users', 'profile') ?>"><i class="me-50" data-feather="user"></i> <?php echo $data['LANG']['HEADER_PROFILE'] ?></a>
                        <a class="dropdown-item" href="<?php $system->router('admin', 'login', 'logout') ?>"><i class="me-50" data-feather="power"></i> <?php echo $data['LANG']['HEADER_LOGOUT'] ?></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="">
                        <span class="brand-logo">
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <h2 class="brand-text"><?php echo $config->get('SITE_GENERATOR') ?></h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>

        <div class="shadow-bottom"></div>

        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="<?php echo $_GET['mod'] == 'home' ? 'active' : ''; ?> nav-item">
                    <a class="d-flex align-items-center" href="<?php $system->router('admin', 'home'); ?>">
                        <i data-feather="home"></i><span class="menu-title text-truncate"><?php echo $data['LANG']['MENU_DASHBOARD'] ?></span>
                    </a>
                </li>

                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="<?php $system->router('admin', 'constant'); ?>">
                        <i data-feather="align-left"></i><span class="menu-title text-truncate">Sabit İçerikler</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="d-flex align-items-center" href="<?php $system->router('admin', 'contact'); ?>">
                        <i data-feather="mail"></i><span class="menu-title text-truncate">İletişim Formu</span>
                    </a>
                </li>

                <li class="<?php echo $_GET['mod'] == 'users' ? 'active' : ''; ?>  nav-item">
                    <a class="d-flex align-items-center" href="<?php $system->router('admin', 'users'); ?>">
                        <i data-feather="users"></i><span class="menu-title text-truncate"><?php echo $data['LANG']['MENU_USERS_TITLE'] ?></span>
                    </a>
                </li>

                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="<?php $system->router('admin', 'settings'); ?>">
                        <i data-feather="settings"></i><span class="menu-title text-truncate">Ayarlar</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>