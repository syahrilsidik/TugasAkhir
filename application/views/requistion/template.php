<?php 
if($this->session->userdata('employeeid') == null || $this->session->userdata('userrole') == null)
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
<link rel="stylesheet" href="<?php echo base_url().'Script/Script/themes/base/jquery.ui.all.css'?>" />
	<script src="<?php echo base_url().'Script/Script/ui/jquery.ui.core.js' ?>"></script>
	<script src="<?php echo base_url().'Script/Script/ui/jquery.ui.widget.js' ?>"></script>
	<script src="<?php echo base_url().'Script/Script/ui/jquery.ui.mouse.js' ?>"></script>
	<script src="<?php echo base_url().'Script/Script/ui/jquery.ui.button.js' ?>"></script>
	<script src="<?php echo base_url().'Script/Script/ui/jquery.ui.draggable.js' ?> "></script>
	<script src="<?php echo base_url().'Script/Script/ui/jquery.ui.position.js'?>"></script>
	<script src="<?php echo base_url().'Script/Script/ui/jquery.ui.resizable.js'?>"></script>
	<script src="<?php echo base_url().'Script/Script/ui/jquery.ui.button.js'?>"></script>
	<script src="<?php echo base_url().'Script/Script/ui/jquery.ui.dialog.js'?>"></script>
	<script src="<?php echo base_url() ?>Script/Script/ui/jquery.ui.effect.js"></script>
	<script src="<?php echo base_url() ?>Script/Script/ui/jquery.ui.effect-blind.js"></script>
	<script src="<?php echo base_url() ?>Script/Script/ui/jquery.ui.effect-explode.js"></script>
    <script src="<?php echo base_url().'Script/jquery.datepick.js'?>"></script>
    <script src="<?php echo base_url().'Script/jquerycssmenu.js'?>"></script>
	<link rel="stylesheet" href="<?php echo base_url().'Script/Script/demos/demos.css'?>" />
    <link rel="stylesheet" href="<?php echo base_url().'Script/Script/themes/base/jquery.ui.dialog.css'?>" />
    <link rel="stylesheet" href="<?php echo base_url().'Script/Script/themes/base/jquery.ui.theme.css'?>" />
    <link rel="stylesheet" href="<?php echo base_url().'Script/Script/themes/base/jquery-ui.css'?>" />
    <link rel="stylesheet" href="<?php echo base_url().'Script/Script/themes/base/jquery.ui.all.css'?>" />
    <link rel="stylesheet" href="<?php echo base_url().'style/Style.css' ?>" />
    <link rel="stylesheet" href="<?php echo base_url().'style/jquery.datepick.css' ?>" />
    <link rel="stylesheet" href="<?php echo base_url().'style/StyleMenu.css' ?>" />
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

$employeeid = $this->session->userdata('employeeid');
$userrole = $this->session->userdata('userrole');

if($userrole == 'User'){ $level = 1; }
else if($userrole == 'IT'){ $level = 2; }
else if($userrole == 'HR-GA') { $level = 3; }
else { $level = 4; }

function get_menu($data, $parent = 0) {
	static $i = 100;
	$tab = str_repeat("\t\t", $i);
	if (isset($data[$parent])) {
		$html = "\n$tab<ul id='menu'>";
		//$i++;
		
		foreach ($data[$parent] as $v) {
			$child = get_menu($data, $v->id);
			$html .= "\n\t$tab<li style='text-align:center;'>";
			$html .= '<a href="'.site_url($v->url).'">'.$v->menu_name.'</a>';
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

$result = mysql_query("SELECT * FROM menu WHERE level LIKE '%$level%' ORDER BY id");
while ($row = mysql_fetch_object($result)) {
	$data[$row->parent_id][] = $row;
}

$menu = get_menu($data);

 ?>
<body>
    <div class="Container" align="center">
    <div class="Wrapper">
        <div id="Header">
            <div style="float: left;">
                <div><label style="color: #E78518;">Requisition</label> Job And Order <label style="color: #E78518;">System</label></div>
                <div style="font-size: 13px;">Application to support request's form on WQA - Asia Pacific </div>
            </div>
            <div class="whoislogin">
                Logged in as <?php echo $userrole ?>
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
            Copyright &copy; 2014 WQA-APAC - Reza Rachmadan</div>
    </div>
</div>
</body>
</html>
