<?php 
if($this->session->userdata('id_pegawai') == null || $this->session->userdata('jabatan') == null)
{
    redirect(site_url('login','refresh'));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>It Application</title>
<link rel="SHORTCUT ICON" href="<?php echo base_url() ?>image/wqa.ico" />
<script type="text/javascript" src="<?php echo base_url().'Script/Script/jquery-1.9.1.js' ?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-theme.min.cs'?>" />
<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" />
	<script src="<?php echo base_url().'Script/Script/ui/jquery.ui.core.js' ?>"></script>
	<script src="<?php echo base_url().'assets/js/bootstrap.min.js' ?>"></script>
    <script>
    
    $(function(){
       $(".DatePicker").datepick({
        dateFormat:"yyyy-mm-dd"
       }); 
   });
    </script>

</head>
<style>
.logout{
    color: white;text-decoration: none;font-size: 14px;
}

.logout:hover{
    color: aqua;text-decoration: none;font-size: 14px;
}

.whoislogin{
    color:White;
    text-shadow:1px 1px 1px Gray;
    font-weight: bold;
    float:right;
    text-transform: none;
    font-size: 16px;
    font-style: normal;
}
</style>
<?php

$employeeid = $this->session->userdata('id_pegawai');
$jabatan = $this->session->userdata('jabatan');

if($jabatan == 'asleb'){ $level = '1'; }
elseif($jabatan == 'admin') { $level = '2'; }
else {$level='3';}

function get_menu($data, $parent = 0) {
	static $i = 100;
	$tab = str_repeat("\t\t", $i);
	if (isset($data[$parent])) {
		$html = "\n$tab<ul id='menu'>";
		//$i++;
		
		foreach ($data[$parent] as $v) {
			$child = get_menu($data, $v->id);
			$html .= "\n\t$tab<li style='text-align:center;'>";
			$html .= '<a href="'.site_url($v->link).'">'.$v->menu.'</a>';
			if ($child) {
				$i--;
				$html .= $child;
				$html .= "\n\t$tab";
			}
			$html .= '</li>';
		}
        
		$html .= "\n$tab</ul>";
		return $html;
	} else {
		return false;
	}
}

$result = mysql_query("SELECT * FROM menu WHERE access LIKE '%$level%' ORDER BY id");
while ($row = mysql_fetch_object($result)) {
	$data[$row->parent_id][] = $row;
}

$menu = get_menu($data);

 ?>
<body>
    <div class="Container" align="center">
    <div class="Wrapper">
        <div id="Header">
        
            <div class="whoislogin">
                Logged in as <?php echo $jabatan ?>
            </div>
        </div>
        <div>
            <div style="float: right;padding-top: 5px;padding-right: 10px;"><a class="logout" href="<?php echo site_url('logout') ?>">Log out</a></div>
             <div id="myjquerymenu" style="font-weight: bolder;">
             <?php echo $menu; ?><ul id="menu"></ul>
             </div>
        </div>
      <!-- <ul id="menu">
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="<?php echo site_url('jobrequest') ?>">Job Request</a></li>
            <li><a href="<?php echo site_url('itemrequest') ?>">Item Request</a></li>
            <li>
            
                <a href="#">Request List</a>
                <ul>
                    <li><a href="">Job Request List</a></li>
                    <li><a href="">Item Request List</a></li>
                </ul>
            
            </li>
            <li><a href="<?php echo site_url('account') ?>">User</a></li>
            <li><a href="<?php echo site_url('changepass') ?>">Change Password</a></li>
            <li><a href="#">Change Status</a>
                    <ul>
                        <li><a href="#">Change Status Job</a></li>
                        <li><a href="#">Change Status Item</a></li>
                    </ul>
                </li>
            <li><a href="#">Approval</a></li>
        </ul> --><br />
        <div id="contents" align="center">
        <?php  echo $contents ?>
        </div>
        <div id=""></div>
        <br />
        <div style="font-size: 12px;font-weight: bolder;padding: 10px;color:white;">
            Copyright &copy; 2014 Syahril Sidik</div>
    </div>
    <div class="gradient"></div>
</div>
</body>
</html>
