<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
</head>
<style>
	.tbl_ini {
	border-right: medium #666666;
	border-bottom:thin #666666;
	border-left:thin #666666;
	border-top:thin #666666;
	}
	input{
	border-top-left-radius: 2em 0.5em;
	border-top-right-radius: 1em 3em;
	border-bottom-right-radius: 4em 0.5em;
	border-bottom-left-radius: 1em 3em;
	}
</style>
<body>
<table width="500" border="0">
  <tr>
    <td>Form Keluhan Lab</td>
  </tr>
  <tr>
    <td><table width="500" border="0" class="tbl_ini">
      <tr>
        <td>Nama Asleb</td>
        <td>&nbsp;</td>
        <td><input type="txt_nama" value="<?php ?>" class="txtbox" /></td>
      </tr>
      <tr>
        <td>Lab</td>
        <td>&nbsp;</td>
        <td>
        	<select name="cmb_lab">
        		<option value="NULL">PILIH LAB</option>
                <?php foreach ($lab as $row) 
				{
				?>
                <option value="<?php echo $row->id_lab ?>"> <?php echo $row->nama_lab ?> </option>
                <?php }?>
            </select>        </td>
      </tr>
      <tr>
        <td>Keluhan</td>
        <td>&nbsp;</td>
        <td><textarea name="txt_keluhan" class="ta_keluhan" ></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" value="Kirim Keluhan" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
