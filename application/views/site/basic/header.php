<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo SITE_TITLE; ?></title>
    <link rel="icon" href="<?php echo PUBLIC_PATH; ?>site/img/Fevicon.png" type="image/png">

    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>site/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>site/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>site/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>site/vendors/linericon/style.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>site/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>site/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>site/css/style.css">
</head>
<body>
<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->

                <a class="navbar-brand logo_h" href="<?php echo base_url();?>"><img src="<?php echo PUBLIC_PATH; ?>site/img/logoo.png"
                                                                      alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-start pr-lg-5 pr-3">
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>">خانه </a></li>
                        <?php
                        foreach ($menu as $key => $menulist) {
                            if ($menulist['chid'] == 0) {
                                ?>
                                <li class="nav-item submenu dropdown ">
                                    <a href="<?php echo $menulist['address_file']; ?>" class="nav-link dropdown-toggle"
                                        role="button" aria-haspopup="true"
                                       aria-expanded="false"><?php echo $menulist['title']; ?></a>
                                    <ul class="dropdown-menu dropdown-menu-right text-right">
                                        <?php
                                        foreach ($menu as $key => $value) {
                                            // if(!empty($sub)){
                                            if ($value['chid'] == $menulist['id']) {
                                                // foreach ($sub as $key => $sval) {
                                                ?>
                                                <li class="nav-item"><a class="nav-link"
                                                                        href="<?php echo $value['address_file']; ?>"><?php echo $value['title']; ?></a>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </ul>

                                </li>


                                <?php
                            }
//                            else {
//
////                                                ?>
<!---->
<!--                                    <li class="nav-item"><a class="nav-link"-->
<!--                                                            href="--><?php //echo $menulist['address_file']; ?><!--">--><?php //echo $menulist['title']; ?><!-- </a>-->
<!--                                    </li>-->
<!--                                    --><?php
//
//                            }

                        }
                        ?>
                    </ul>
                    <?php
                    if ($this->session->has_userdata('user_info') AND $this->session->userdata('user_info')['status'] == true) {

                        ?>
                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white text-center" href="#"
                                       id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <b><?php echo $this->session->userdata('user_info')['name'] ?> عزیز خوش
                                            آمدید</b> <i class="far fa-user" style="font-size: 20px; color: white"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right text-right"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo base_url('panel');?>">پروفایل</a>
                                        <li class="dropdown-divider"></li>
                                        <a class="dropdown-item" href="<?php echo base_url('panel/profile/logout'); ?>">خروج</a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <?php

                    } else { ?>

                        <!--                        <ul class="navbar-left menu_nav ">-->
                        <!--                            <li class="nav-item">-->
                        <!--                                <button class="button button-header bg">ثبت نام</button>-->
                        <!--                                <button class="button button-header bg"><a-->
                        <!--                                            href="--><?php //echo base_url('panel/login/index'); ?><!--" ">ورود</a></button>-->
                        <!--                            </li>-->
                        <!--                        </ul>-->

                    <?php } ?>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->
