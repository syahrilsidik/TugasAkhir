<style>
.headhome{
    width:700px;
    padding: 20px;
}
.heads h2{
    text-align: left;
    color:#373737;
    font-size: 16px;
}
#heads{
    padding: 15px;
    width:600px;
    text-align: left;
}

#heads h2{
    font-size: 18px;
    color:#373737;
}

#heads label{
    font-weight: normal;
    font-size: 15px;
}

#heads input[type=text]{
    width:300px;
    height:40px;
    border-radius: 5px;
    border: 1px solid #373737;
    font-size: 15px;
    box-sizing: border-box;
    padding: 10px;
}

#heads select{
    width:260px;
    height:40px;
    border: 1px solid #373737;
    border-radius: 5px;
    font-size: 15px;
    box-sizing: border-box;
    padding: 10px;
}

.isiform{
    border-style: inherit;
    padding: 20px;
    background-color: red;
}

.btn-submit{
    padding-top: 10px;
}

.buttonsubmit{
    width:150px;
    height:35px;
    background-color: #0080FF;
    border-radius: 3px;
    font-weight: bold;
    border-width: 0px;
    color: white;
    cursor: pointer;
}

.buttonsubmit:hover{
     width:150px;
    height:35px;
    background-color: #373737;
    border-radius: 3px;
    font-weight: bold;
    border-width: 0px;
    color: white;
}

.efek {
  position:relative;
  width:600px;
  height:100%;
  padding:1em 1.5em;
  margin:2em auto;
  /*color:#fff;
  background:#373737;*/
  color: #373737;
  overflow:hidden;
  border-radius:5px;
  border: 1px solid #373737;
}

.efek:before {
  content:"";
  position:absolute;
  top:0;
  right:0;
  border-width:10px 60px 60px 10px;
  border-style:solid;
  border-color:#fff #fff #373737 #373737;
  background:#658E15;
  -webkit-box-shadow:0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
  -moz-box-shadow:0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
  box-shadow:0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
  display:block; width:0; /* Firefox 3.0 damage limitation */
}

#addbutton{
    background-color:White;width: 15px;height:15px;border-radius:40px;padding: 3px;cursor: pointer;border:5px solid #373737;
}

#btndelete{
   background-color:Red;color:white;font-weight:bolder;height:20px;border-radius:2px;padding: 9px;cursor: pointer;border:0px solid #373737;
}

#DivAddItemRequest{
    cursor: pointer;
}
#DivAddItemRequest:Hover{
    cursor: pointer;
    color:blue;
}
</style>
<div id="heads" >
	<div class="critical">
    	<h2>Tambah Booking Lab</h2>
        	<div id="message" style="display: none;color:red;font-size: 14px;"></div>
        	<div class="efek" style="font-size: 14px;">
            <?php foreach($kuses AS $row)
                {
                    ?>
            <div style="padding-top: 5px;">ID Pegawai : <b><?php echo $row['id_pegawai']?></b> </div>          
            <div style="padding-top: 10px;">Nama Pegawai : <b><?php echo $row['nama_pegawai']?></b></div>
            <div style="padding-top: 10px;">Kelas : <b><?php echo $row['kelas']?></b></div>
            <div style="padding-top: 10px;">Alamat : <b><?php echo $row['alamat']?></b></div>
            <div style="padding-top: 10px;">No Handphone : <b><?php echo $row['no_hp']?></b></div>
            <div style="padding-top: 10px;">Jurusan : <b><?php echo $row['jurusan']?></b></div>
            <div style="padding-top: 10px;">Password : <b><?php echo $row['password']?></b></div>    
            <?php } ?>  
               	<br />
                <div class="btn-submit">
                <a href="<?php  echo site_url('user')?>">Back</a>
            </div>
    </div>
</div>
<?php
 ?>