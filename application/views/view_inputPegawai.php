<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo base_url(); ?>datepicker/rfnet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>datepicker/datetimepicker_css.js"></script>
</head>

<body>
<form action="http://localhost/CIEE/index.php/CTRL/addPegawai" method="post">
<table width="500" border="0">
  <tr>
    <td bgcolor="#D8D99B">FORM INPUT PEGAWAI</td>
  </tr>
  <tr>
    <td><table width="500" border="1">
      <tr>
        <td>ID Pegawai</td>
        <td>&nbsp;</td>
        <td><input type="text" name="txt_idPegawai" class="txt" /></td>
      </tr>
      <tr>
        <td>Nama Pegawai</td>
        <td>&nbsp;</td>
        <td><input type="text" name="txt_namaPegawai" class="txt" /></td>
      </tr>
      <tr>
        <td>Jurusan</td>
        <td><input type="text" name="ttl" id="ttl" size="20" /></td>
        <td><input type="text" name="txt_jurusan" class="txt" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" value="Simpan" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
