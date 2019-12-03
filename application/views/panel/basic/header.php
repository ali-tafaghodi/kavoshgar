<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?php echo PUBLIC_PATH; ?>panel/img/favicon.html">

    <title><?php echo 'پنل مدیریت' ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo PUBLIC_PATH; ?>panel/styles/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_PATH; ?>panel/styles/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo PUBLIC_PATH; ?>panel/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo PUBLIC_PATH; ?>panel/styles/style.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_PATH; ?>panel/styles/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>

    <![endif]-->
</head>

<body>

<section id="container" class="">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
        </div>
        <!--logo start-->
        <a href="#" class="logo"><span>پنل مدیریت </span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-tasks"></i>
                        <span class="badge bg-success"><?php echo $count_news;?></span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                            <p class="green">شما <?php echo $count_news;?> ثبت نام در خبرنامه دارید</p>
                        </li>
                        <?php
                        foreach ($news as $news_list):
                        ?>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc"><?php echo $news_list['email'];?></div>
                                    <div class="percent"><?php  echo persianNumber(_getDate(strtotime($news_list['created_at'])));?></div>
                                </div>

                            </a>
                        </li>
                        <?php endforeach;?>




                        <li class="external">
                            <a href="<?php echo base_url('panel/profile/list_newsletter')?>">نمایش تمام ثبت نام ها</a>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-envelope-alt"></i>
                        <span class="badge bg-important"><?php echo $count; ?></span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li>
                            <p class="red">شما <?php echo $count; ?> پیام جدید دارید</p>
                        </li>

                        <?php
                        foreach ($contact as $contact_list):
                        ?>
                        <li>
                            <a href="<?php echo base_url().'panel/profile/read_contact/'.$contact_list['id'];?>">
                                    <span class="photo">
                                        <img alt="avatar" src="<?php echo PUBLIC_PATH; ?>panel/img/avatar-mini.jpg"></span>
                                <span class="subject">
                                        <span class="from"><?php echo $contact_list['name'];?></span>
                                        <span class="time">همین حالا</span>
                                    </span>
                                <span class="message"><?php echo word_limiter($contact_list['subject'],10);?>
                                    </span>
                            </a>
                        </li>

                        <?php
                        endforeach;
                        ?>

                        <li>
                            <a href="<?php echo base_url().'panel/profile/list_contact';?>">نمایش تمامی پیام ها</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                        <i class="icon-bell-alt"></i>
                        <span class="badge bg-warning"><?php echo $count_comment; ?></span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                            <p class="yellow">شما <?php echo $count_comment; ?> دیدگاه جدید دارید</p>
                        </li>
                        <?php
                        foreach ($comments as $comment_list):
                        ?>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="icon-bolt"></i></span>
                                <?php echo $comment_list['subject'];?>

                                <span class="small italic"></span>
                            </a>
                        </li>

                        <?php
                        endforeach;
                        ?>


                        <li>
                            <a href="<?php echo base_url().'panel/profile/list_coment';?>">نمایش تمامی دیدگاه ها</a>
                        </li>
                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="<?php echo PUBLIC_PATH; ?>panel/img/avatar1_small.jpg">
                        <span class="username"><?php echo $this->name;?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="<?php echo base_url().'panel/profile'?>"><i class=" icon-suitcase"></i>پروفایل</a></li>
                        <li><a href="#"><i class="icon-cog"></i>تنظیمات</a></li>
                        <li><a href="<?php echo base_url().'panel/profile/list_coment';?>"><i class="icon-bell-alt"></i>اعلام ها</a></li>
                        <li><a href="<?php echo base_url('site/login/logout');?>"><i class="icon-key"></i>خروج</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="active">
                    <a class="" href="<?php echo base_url().'panel/dashboard';?>">
                        <i class="icon-dashboard"></i>
                        <span>صفحه اصلی</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-book"></i>
                        <span>دسته بندی مطالب</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url('panel/category/category/list_category');?>">لیست دسته بندی مطالب</a></li>
                        <!-- <li><a class="" href="<?php echo site_url('panel/procat/index');?>">افزودن منو جدید</a></li> -->
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-cogs"></i>
                        <span>پست ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo site_url('panel/post/list_post/list');?>">لیست پست ها</a></li>
                        <li><a class="" href="<?php echo site_url('panel/post/list_post/index');?>">افزودن پست جدید </a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-tasks"></i>
                        <span>مدیریت منوها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo site_url('panel/list_menue/list');?>">لیست منو ها</a></li>
                        <li><a class="" href="<?php echo site_url('panel/list_menue/index');?>">افزودن منو جدید</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-book"></i>
                        <span>مدیریت صفحه ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo site_url('panel/page/list');?>">لیست صفحه ها </a></li>
                        <li><a class="" href="<?php echo site_url('panel/page/index');?>">افزودن صفحه جدید </a></li>
                    </ul>
                </li>
                <li>
                    <a class="" href="<?php echo site_url();?>">
                        <i class="icon-user"></i>
                        <span>صفحه ورود به سایت</span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
            <section class="wrapper">
