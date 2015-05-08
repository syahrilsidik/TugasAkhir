<style>
#heads{
	padding: 15px;
	width: auto;
	text-align: left;
}

input[type="submit"]{
        background: #222;
        border: none;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.3);
        text-transform:uppercase;
        color: #eee;
        cursor: pointer;
        font-size: 15px;
        margin: 5px 0;
        padding: 5px 22px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-border-radius:4px;
        -webkit-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
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
	width: auto;
	height: 40px;
	border-radius: 5px;
	border: 1px solid #373737;
	padding: 10px;
	box-sizing: border-box;
}

#heads textarea{
    width:450px;
    height:60px;
    border-radius: 5px;
    border: 1px inset #373737;
}

#heads select{
    width:260px;
    height:40px;
    border: 1px solid #373737;
    border-radius: 5px;
    padding:10px;
    box-sizing: border-box;
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
  box-shadow:0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
  border: 2px solid #373737;
}

.efek:before {
  content:"";
  position:absolute;
  top:0;
  right:0;
  border-width:1px 10px 10px 1px;
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
   background-color:Red;width: 15px;height:15px;border-radius:40px;padding: 3px;cursor: pointer;border:5px solid #373737;
}

.td-content{
    font-weight: bolder;
    color: #373737;
    border:0px solid gray;
	width: 15%;
    height:24px;
}
</style>
<div id="heads">
  <div class="critical">
    <h2>Detail Absensi</h2>
    <?php
                //$nowdate = date('ymdHis');
                 if(!empty($wery2))
                    { 
            ?>
<form action="<?php echo site_url('Absensi/saveedit') ?>" method="post" name="formEdit" onSubmit="return validasi()">
    <table>
      <tr>
        <td>Tanggal</td>
        <td>: <input type="text" hidden value="<?php echo $wery2[0]['no'] ?>" name="no" />
        <input type="text" value="<?php echo $wery2[0]['tgl_masuk'] ?>" name="txttanggal" /></td>
      <tr>
        <td>Jam Datang</td>
        <td>: <input type="text" value="<?php echo $wery2[0]['jam_datang'] ?>" name="jamdatang" /></td>
      </tr>
      <td>Jam Pulang</td>
        <td>: <input type="text" value="<?php echo $wery2[0]['jam_pulang'] ?>" name="jampulang" /></td>
      </tr>
    </table>
    <br />
    Detail
    <table cellpadding="5" style="font-size: 13px;width:80%">
      <tr>
      	<th style="display:none;"></th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>
        <th>Kegiatan</th>
        <th>Ruang</th>
        <th>Uraian</th>
      </tr>
      <?php
	   $x=1;
	   foreach ($wery2 as $row){?>
      <tr> 
      	<td class="td-content" style="display:none;"><input type="hidden" name="detail[<?php echo $x ?>][no_detailabsensi]"  value="<?php echo $row['no_detailabsensi'] ?>" /></td>
        <td class="td-content"><input type="text" name="detail[<?php echo $x ?>][jammulai]" value="<?php echo $row['jam_mulai']?>" /></td>
        <td class="td-content"><input type="text" name="detail[<?php echo $x ?>][jamselesai]" value="<?php echo $row['jam_selesai']?>" /></td>
        <td class="td-content"><input type="text" name="detail[<?php echo $x ?>][kegiatan]" value="<?php echo $row['kegiatan'] ?>" /></td>
        <td class="td-content"><input type="text" name="detail[<?php echo $x ?>][lab]" value="<?php echo $row['lab'] ?>" /></td>
        <td class="td-content"><input type="text" name="detail[<?php echo $x ?>][uraian]" value="<?php echo $row['uraian'] ?>" /></td>
      </tr>
      <?php $x++; }?>
    </table>
  </div>
  <div class="btn-submit"> 
    <p>
      <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit"/>
    </p>
    
    <p><a href="<?php echo site_url('keluhan') ?>" style="font-size: 12px;color:#373737;font-weight: bold;">BACK</a></p>
  </div>
</div>
<?php 
        } else { echo 'No Data Found'; } ?>
</div>
</form>
