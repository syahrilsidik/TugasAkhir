<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dynamic Menu With Bootstrap</title>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-table.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/sb-admin.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap-table.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datetimepicker.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datetimepicker.min.css">
<link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='<?php echo base_url()?>fc/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo base_url()?>fc/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url()?>fc/lib/moment.min.js'></script>
<script src='<?php echo base_url()?>fc/lib/jquery.min.js'></script>
<script src='<?php echo base_url()?>fc/fullcalendar.min.js'></script>

<style type="text/css">
	.bs-example{
		margin:20px;
	}
	.image-circle{
		border-radius:50%;
		width:165px;
		height:165px;
		display:block;
		border:4px solid #fff;
		margin: 10px;
	}
</style>
</head>
<body>
<!--mobile navbar-->
<div id="wrapper">
		<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-header">
				<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
					<span class="sr-only">Toogle Navigation<span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">SIPL</a>
			</div>
<!--top navbar-->
			<div id="navbarCollapse" class="collapse navbar-collapse">
				<ul class="nav navbar-right top-nav">
					<?php
					$employeeid = $this->session->userdata('id_pegawai');
					$jabatan = $this->session->userdata('jabatan');
					$nama = $this->session->userdata('nama_pegawai	');
					
					
					if($jabatan == 'asleb'){ $level = '1'; }
					elseif($jabatan == 'admin') { $level = '2'; }
					elseif($jabatan == 'dosen') { $level = '4'; }
					else {$level='3';}
					
					$dat=mysql_query("SELECT * FROM menu WHERE access LIKE '%$level%' ORDER BY id");
					
					$bb = 0;
					while($data=mysql_fetch_array($dat)){;

					if($bb > $data['parent_id']){
						echo "</ul></li>";
					}
					if($data['parent_id']==1 && $data['status']==1){
						echo "<li><a href=".site_url($data['link'])."><i class=".$data['icon']."></i>".$data['menu']."</a></li>";
					}
					if($data['parent_id']==1 && $data['status']==2){
						echo "<li class='dropdown'>
								<a data-toggle='dropdown' class='dropdown-toggle' href=".site_url($data['link']).">".$data['menu']."<b class='caret'></b></a>
								<ul role='menu' class='dropdown-menu'>";
					}
					if($data['parent_id']==2 && $data['status']==3){
						echo "<li><a href=".site_url($data['link']).">".$data['menu']."</a></li>";
					}
					//if($data['status']==3 && $data['bawah']==2){
						//echo "</ul></li>";
					//}
					$bb = $data['parent_id'];
					}
					?>
				</ul>
			</div>
<!--side navbar-->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav side-nav">
			<li align="center">
				<div class="col-md-12 col-xs-12" align="center">
					<div class="outter"><img src="<?php echo base_url()?>assets/pic/none.png" class="image-circle"></div>
					<h3><?php echo $nama?></h3>
				</div>
			</li>
			<li>
				<a href="#"><i class="fa fa-fw fa-edit"></i>Edit Profile</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-fw fa-table"></i>Dashboard</a>
			</li>
			<li>
				<a href="<?php echo site_url('logout') ?>"> <i class="fa fa-fw fa-power-off"></i> Log out</a>
			</li>
		</ul>
	</div>
</nav>
<!--Page-->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<?php  echo $contents ?>
				</div>
			</div>
		</div>
	</div>
</div>
</body>