<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title><?=$page_title . ' - ' . WEBSITE_TITLE?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=ASSETS?>admin/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=ASSETS?>admin/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?=ASSETS?>admin/css/style.css" rel="stylesheet">
    <link href="<?=ASSETS?>admin/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?=ASSETS?>admin//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="<?=ASSETS?>admin//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?=ROOT?>admin" class="logo"><b>ehopper</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->

                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<!-- <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?=ROOT?>">Website</a></li>
            	</ul> -->
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?=ROOT?>user/logout">Đăng xuất</a></li>
                </ul>

            </div>
        </header>
      <!--header end-->
