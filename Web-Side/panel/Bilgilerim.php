<?php
include 'session.php';
GirisLazim($link);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Anti-Hile | Admin Paneli</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="skin-blue fixed">
	<div class="wrapper">
		<header class="main-header">
			<a href="<?php echo $link->genel;?>" class="logo">
				<!-- LOGO -->
				Anti-Hile
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Navbar Right Menu -->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Menüyü Gizle/Göster</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->

						<!-- Notifications: style can be found in dropdown.less -->

						<!-- Tasks: style can be found in dropdown.less -->

						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bolt"></i>
								<span class="hidden-xs">MENU</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="https://mc-heads.net/avatar/<?php echo $_SESSION['kisisel']['Minecraft_Nick'];?>/160.png" class="" alt="Steve !">
									<p>
										<?php echo $_SESSION['kisisel']['Musteri'] . " - " . $_SESSION['kisisel']['Sunucu_ISIM'];?>
										<small>Lisansınız <?php echo round(abs($_SESSION['kisisel']['Sunucu_BZ'] - $_SESSION['kisisel']['Sunucu_SZ'])/60/60/24)?> Gündür Aktif.</small>
									</p>
								</li>
								<!-- Menu Body -->
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="<?php echo $link->bilgilerim;?>" class="btn btn-default btn-flat">Profilim</a>
									</div>
									<div class="pull-right">
										<a href="<?php echo $link->cikisyap;?>" class="btn btn-default btn-flat">Çıkış Yap</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<div class="main-sidebar">
			<!-- Inner sidebar -->
			<div class="sidebar">
				<!-- user panel (Optional) -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="https://mc-heads.net/avatar/<?php echo $_SESSION['kisisel']['Minecraft_Nick'];?>/160.png" class="img-responsive" alt="Steve !">
					</div>
					<div class="pull-left info">
						<p><?php echo $_SESSION['kisisel']['Musteri'];?></p>

						<a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
					</div>
				</div><!-- /.user-panel -->

				<!-- Search Form (Optional) -->
				<!-- /.sidebar-form -->

				<!-- Sidebar Menu -->
				<ul class="sidebar-menu">
					<li class="header">PANEL</li>
					<!-- Optionally, you can add icons to the links -->
					<li><a href="<?php echo $link->genel;?>"><span>Genel Durum</span></a></li>
					<li class="active"><a href="<?php echo $link->bilgilerim;?>"><span>Bilgilerim</span></a></li>
					<li><a href="<?php echo $link->log;?>"><span>Anti-Hile Rapor</span></a></li>
				</ul><!-- /.sidebar-menu -->

			</div><!-- /.sidebar -->
		</div><!-- /.main-sidebar -->
	</div>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Bilgilerim
				<small><?php echo $_SESSION['kisisel']['Musteri'];?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
				<li class="active">Bilgilerim</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-md-7">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Bilgileriniz</h3>
						</div>
						<div class="box-body">
							<div class="input-group">
								<label>Lisans Tarihleri</label>
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-hourglass"></i></span>
								<input type="text" class="form-control" value="<?php echo date('d.m.Y H:i:s',$_SESSION['kisisel']['Sunucu_BZ'])?>" disabled="">
								<span class="glyphicon glyphicon-resize-horizontal input-group-addon" style="position: initial;"></span>
								<input type="text" class="form-control" disabled="" value="<?php echo date('d.m.Y H:i:s',$_SESSION['kisisel']['Sunucu_SZ'])?>">
								<span class="input-group-addon"><i class="fa fa-hourglass"></i></span>
							</div>
							<br>
							<div class="input-group">
								<label>Müşteri ismi</label>
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" class="form-control" disabled="" value="<?php echo $_SESSION['kisisel']['Musteri'] ?>">
							</div>
							<br>
							<div class="input-group">
								<label>Sunucu ismi</label>
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-gamepad"></i></span>
								<input type="text" class="form-control" disabled="" value="<?php echo $_SESSION['kisisel']['Sunucu_ISIM'] ?>">
							</div>
							<br>
							<div class="input-group">
								<label>Sunucu Bağlantı Bilgileri</label>
							</div>
							<div class="input-group">
								<span class="input-group-addon">IP</span>
								<input type="text" class="form-control" disabled="" value="<?php echo $_SESSION['kisisel']['Sunucu_IP'] ?>">
								<span class="input-group-addon">PORT</span>
								<input type="text" class="form-control" disabled="" value="<?php echo $_SESSION['kisisel']['Sunucu_PORT'] ?>">
							</div>
							<br>
							<div class="input-group">
								<label>Sunucu Anti-Hile Client Url</label>
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-link"></i></span>
								<input type="text" class="form-control" disabled="" value="<?php echo $_SESSION['kisisel']['Sunucu_URL']; ?>">
							</div>
							<br>
							<div class="input-group">
								<label>Lisans Durumu</label>
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-info"></i></span>
								<input type="text" class="form-control" disabled="" value="<?php echo ($_SESSION['kisisel']['Durum'] == 1 ? "AKTIF" : "PASIF"); ?>" style="background-color: <?php echo $_SESSION['kisisel']['Durum'] == 1 ? "#71dc79" : "#dc7171"?>;">
								<!-- /input-group -->
							</div>
							<br>
							<!-- /.box-body -->
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Parola Değiştir</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form method="POST" role="form">
							<div class="box-body">
								<div class="alert alert-warning alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-warning"></i> Dikkat !</h4>
									Sistemimizde Parolamı Unuttum Özelliği Yoktur.
								</div>
								<div class="form-group">
									<label>Eski Parola</label>
									<input type="password" class="form-control" id="eskiparola" placeholder="Eski Parola">
								</div>
								<div class="form-group">
									<label>Yeni Parola</label>
									<input type="password" class="form-control" id="yeniparola" placeholder="Yeni Parola">
								</div>
								<div class="form-group">
									<label>Yeni Parola Tekrar</label>
									<input type="password" class="form-control" id="yeniparolat" placeholder="Tekrar Yeni Parola">
								</div>
								<div class="form-group">
									<center>
										<div class="g-recaptcha" data-sitekey="6Ld_uCgTAAAAAJ_HdIVhHC-_Hri3rHU7Zd63Q1ly"></div> <!--http://omererkan.com/recaptcha-kullanimi/!-->
									</center>
								</div>
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<center><button type="submit" class="btn btn-primary">Parolamı Değiştir!</button>
								</center>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 1.0
		</div>
		<strong>Copyright © 2016 <a href="http://anti-hile.eu5.org">Anti-Hile</a></strong> Tüm Hakları Saklıdır.
	</footer>
	<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.6 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- Morris.js charts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="plugins/morris/morris.min.js"></script>
	<!-- Sparkline -->
	<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
	<!-- jvectormap -->
	<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="plugins/knob/jquery.knob.js"></script>
	<!-- daterangepicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
	<script src="plugins/daterangepicker/daterangepicker.js"></script>
	<!-- datepicker -->
	<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- Slimscroll -->
	<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<script type="text/javascript">setTimeout(function(){document.getElementById("freewha").parentNode.removeChild(document.getElementById("freewha"));}, 1000);</script>
</body>
</html>