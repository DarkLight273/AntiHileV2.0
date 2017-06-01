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
					<li class="active"><a href="<?php echo $link->genel;?>"><span>Genel Durum</span></a></li>
					<li><a href="<?php echo $link->bilgilerim;?>"><span>Bilgilerim</span></a></li>
					<li><a href="<?php echo $link->log;?>"><span>Anti-Hile Rapor</span></a></li>
				</ul><!-- /.sidebar-menu -->

			</div><!-- /.sidebar -->
		</div><!-- /.main-sidebar -->
	</div>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Genel Durum
				<small><?php echo $_SESSION['kisisel']['Sunucu_ISIM'];?></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
				<li class="active">Genel Durum</li>
			</ol>
		</section>
		<div class="content">
			<div class="row">
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="icon">
							<i class="fa fa-shield"></i>
						</div>
						<div class="inner">
							<h3>200</h3>

							<p>Giriş Sayısı</p>
						</div>
						<a href="<?php echo $link->log;?>" class="small-box-footer">
							Rapor Ekranı <i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="icon">
							<i class="fa fa-thumbs-up"></i>
						</div>
						<div class="inner">
							<h3>120</h3>

							<p>Hilesiz Giriş</p>
						</div>
						<a href="<?php echo $link->log;?>" class="small-box-footer">
							Rapor Ekranı <i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="icon">
							<i class="fa fa-thumbs-down"></i>
						</div>
						<div class="inner">
							<h3>80</h3>

							<p>Hileli Giriş Denemesi</p>
						</div>
						<a href="<?php echo $link->log;?>" class="small-box-footer">
							Rapor Ekranı <i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<center>
					<div class="col-md-12 col-sm-6 col-xs-12">
						<div class="info-box bg-yellow color-palette">
							<span class="info-box-icon"><i class="fa fa-hourglass"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Lisans Durumu</span>
								<span class="info-box-number"><?php echo date('d.m.Y H:i:s',$_SESSION['kisisel']['Sunucu_BZ']) . " - " . date('d.m.Y H:i:s',$_SESSION['kisisel']['Sunucu_SZ']);?> </span>

								<div class="progress">
									<div class="progress-bar" style="width: <?php echo round(abs(time() - $_SESSION['kisisel']['Sunucu_SZ'])/60/60/24 +1)/round(abs($_SESSION['kisisel']['Sunucu_BZ'] - $_SESSION['kisisel']['Sunucu_SZ'])/60/60/24) * 100;?>%"></div>
								</div>
								<span class="progress-description">
									Lisansınızın Bitmesine <?php echo round(abs(time() - $_SESSION['kisisel']['Sunucu_SZ'])/60/60/24) + 1;?> Gün Var.
								</span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
				</center>
			</div>
		</div>
		<section class="content-header">
			<h1>
				Gerçek Zamanlı Rapor Ekranı
			</h1>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Sunucu Üzerinde Gerçekleşen Son 10 Anti-Hile Aktivitesi</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div id="log" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
							<thead>
								<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">Zaman</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Oyuncu</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Sürüm</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">IP</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Durum</th></tr>
							</thead>
							<tbody>
								<tr role="row" class="odd" style="background-color: #66FF00"><!--background-color: rgb(60, 188, 70);-->
									<td class="sorting_1">02:50:01 28.08.2016</td>
									<td><img src="https://mc-heads.net/avatar/Whomobile/20.png"> <strong>Whomobile</strong></td>
									<td>1.8.8</td>
									<td>127.0.0.1</td>
									<td>Başarılı</td>
								</tr><tr role="row" class="odd" style="background-color: #66FF00">
								<td class="sorting_1">02:50:01 28.08.2016</td>
								<td><img src="https://mc-heads.net/avatar/kemal895/20.png"> <strong>kemal895</strong></td>
								<td>1.8.8-OptiFine_HD_U_F3</td>
								<td>127.0.0.1</td>
								<td>Başarılı</td>
							</tr><tr role="row" class="even" style="background-color: #FE4857"><!--background-color: rgb(188, 60, 60);-->
							<td class="sorting_1">02:50:01 28.08.2016</td>
							<td><img src="https://mc-heads.net/avatar/Whomobile/20.png"> <strong>Whomobile</strong></td>
							<td>Wurst</td>
							<td>127.0.0.1</td>
							<td>Başarısız</td>
						</tr></tbody>
						<tfoot>
							<tr><th rowspan="1" colspan="1">Zaman</th><th rowspan="1" colspan="1">Oyuncu</th><th rowspan="1" colspan="1">Sürüm</th><th rowspan="1" colspan="1">IP</th><th rowspan="1" colspan="1">Durum</th></tr>
						</tfoot>
					</table></div></div></div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			<!-- /.box -->
		</div>
	</div>
</section>
</div>
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
<script type="text/javascript">
setTimeout(function(){document.getElementById("freewha").parentNode.removeChild(document.getElementById("freewha"));}, 1000);</script>
</body>
</html>