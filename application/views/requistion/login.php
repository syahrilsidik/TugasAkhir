<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">

	<title>Sistem Informasi Pengelolaan Lab</title>
    
	<link rel="stylesheet" href="<?php echo base_url() ?>style/csslogin/css/style.css"/>
</head>
<?php
if(!empty($_GET["msg"]))
{
    $message = $_GET["msg"];
}
else
{
    $message = "";
}
?>
<script>
function valid() {
	var idpeg = document.forms["login"]["txtidpegawai"].value;

	if (idpeg == null ||idpeg == "")
  	{
  	alert("Anda Belum Mengisi Username");
  	return false;
  	}
	var idpass = document.forms["login"]["txtpassword"].value;

	if (idpass == null ||idpass == "")
  	{
  	alert("Anda Belum Mengisi Password");
  	return false;
  	}
}
</script>
<body>

  <section>
  <span></span>
  <div align="center" style="font-size: 16px;font-weight: bolder;color: red;"><?php echo $message ?> </div>
  <h1>Member Login</h1>
  <form method="post" action="<?php echo site_url('login/ceklogin') ?>" name="login" onSubmit="return valid()">
    <input placeholder='User Name' type='text' name="txtidpegawai" autocomplete="off">
    <input placeholder='Password' type='password' name="txtpassword">
  
  <button>LOGIN</button>
  </form>
  <h2>
    <a href='<?php echo site_url('keluhan/mhs') ?>'>Mahasiswa ? MASUK SINI </a>
  </h2>
</section>

</body>

</html>