          <?php
					$employeeid = $this->session->userdata('id_pegawai');
					$jabatan = $this->session->userdata('jabatan');
					$nama = $this->session->userdata('nama_pegawai');
					
					?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Calendar</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar 2.2.5-->
    <link href="<?php echo base_url()?>assets/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url()?>assets/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
    <!-- Theme style -->
    <link href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery 2.1.3 -->
    
    <script src="<?php echo base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- jQuery UI 1.11.1 -->
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
    <script src='<?php echo base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js'></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes
    <script src="<?php echo base_url()?>assets/dist/js/demo.js" type="text/javascript"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
  </head>
  <body class="skin-red">
    <div class="wrapper">
      
      <header class="main-header">
        <a href="../index2.html" class="logo"><b>Admin</b>LTE</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              
                  <!-- Menu Footer-->
                  <li>
                    <div class="pull-right">
                      <a href="<?php echo site_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul> 
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $nama?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $jabatan?></a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php

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
					echo "<li>
							<a href=".site_url($data['link']).">
								<i class=".$data['icon']."></i> <span>".$data['menu']."</span>
							</a>
						 </li>";
						
					}
					if($data['parent_id']==1 && $data['status']==2){
						echo "<li class='treeview'>
								<a href=".site_url($data['link']).">
									<i class='fa fa-files-o'></i>
										<span>".$data['menu']."</span>
										<i class='fa fa-angle-left pull-right'></i>
								</a>
							<ul class='treeview-menu'>";
                
					}
					if($data['parent_id']==2 && $data['status']==3){
						echo "<li><a href=".site_url($data['link'])."><i class='fa fa-circle-o'></i>".$data['menu']."</a></li>";
					}
					//if($data['status']==3 && $data['bawah']==2){
						//echo "</ul></li>";
					//}
					$bb = $data['parent_id'];
					}
					?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Calendar
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Calendar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<?php echo $contents?>  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
    <!-- Page specific script -->
    

  </body>
</html>