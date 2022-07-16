<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $data['page_title']?></title>
    <link href="<?= ASSETS?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= ASSETS?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= ASSETS?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= ASSETS?>css/price-range.css" rel="stylesheet">
    <link href="<?= ASSETS?>css/animate.css" rel="stylesheet">
	<link href="<?= ASSETS?>css/main.css" rel="stylesheet">
	<link href="<?= ASSETS?>css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?= ASSETS  ?>js/html5shiv.js"></script>
    <script src="<?= ASSETS  ?>js/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="<?= ASSETS  ?>images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= ASSETS  ?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= ASSETS  ?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= ASSETS  ?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= ASSETS  ?>images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?=ROOT?>">
								<img src="<?= ASSETS  ?>images/home/logo.png" alt=""/>
							</a>
						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php if(isset($data['user_data']) && $data['user_data']->role == 'admin'): ?>
									<li><a href="<?=ROOT?>profile"><i class="fa fa-user"></i>Tài khoản</a></li>
								<?php endif; ?>
								<li><a href="<?=ROOT?>product"><i class="fa fa-crosshairs"></i>Sản phẩm</a></li>
								<li><a href="<?=ROOT?>cart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>

								<?php if(isset($data['user_data'])): ?>
									<li><a href="<?=ROOT?>user/logout"><i class="fa fa-lock"></i>Đăng xuất</a></li>
								<?php else: ?>
 									<li><a href="<?=ROOT?>user/login"><i class="fa fa-lock"></i>Đăng nhập</a></li>
								<?php endif; ?>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<!-- <div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">

								<li><a href="<?=ROOT?>index" class="<?= $page_title == "Home" ? "active" : ""; ?>">Home</a></li>
								<li class="dropdown"><a href="<?=ROOT?>shop" class="<?= $page_title == "Shop" ? "active" : ""; ?>">Shop</a></li>
								<li class="dropdown"><a href="<?=ROOT?>blog" class="<?= $page_title == "Blog" ? "active" : ""; ?>">Blog</a></li>
								<li><a href="<?=ROOT?>contact-us" class="<?= $page_title == "Contact-us" ? "active" : ""; ?>">Contact</a></li>
							</ul>
						</div>
					</div>
					<?php if(isset($show_search)): ?>
					<div class="col-sm-3">
						<form method="get">
							<div class="search_box pull-right">
								<input name="find" type="text" placeholder="Search"/>
							</div>
						</form>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div> -->
	</header><!--/header-->

	<style type="text/css">
		.product-image{
			transition: all 1s ease;
		}
		.product-image:hover{
			transform: scale(1.5);
		}
	</style>
