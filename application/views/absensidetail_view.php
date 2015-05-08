<?php
//if($this->session->userdata('userrole') != null)
  //  if($this->session->userdata('userrole') == "HR-GA")
    //    redirect(site_url('home'));



?>
<style>
#heads{
    padding: 15px;
    width:600px;
    text-align: left;
}

#heads h2{
    text-align: left;
    color:#373737;
    font-size: 18px;
}

#heads label{
    font-weight: normal;
    font-size: 15px;
}

#heads input[type=text]{
    width:400px;
    height:35px;
    border-radius: 5px;
    border: 1px solid #373737;
}

#heads textarea{
    width:450px;
    height:60px;
    border-radius: 5px;
    border: 1px solid #373737;
}

#heads select{
    width:260px;
    height:35px;
    border: 1px solid #373737;
    border-radius: 5px;
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
    border: 2px solid #373737;
    border-radius: 5px;
    font-weight: bold;
}

.buttonsubmit:hover{
    width:170px;
    height:35px;
    border: 2px solid #373737;
    border-radius: 5px;
    background-color: gray;
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
    width: 30%;
    height:24px;
}
#watermark {
	font-size: 50pt;
	position: absolute;
	width: 100px;
	height: 100px;
	margin: 0;
      z-index: ;
	left:301px;
	top:27px;
	width:300px;
	padding:10px;
	text-align: center;
  }
</style>
        <?php
            $id_pegawai = $this->session->userdata('id_pegawai');
        ?>
<div id="heads">
    <div class="critical">
        <h2>Detail Absensi</h2>
            <?php
                //$nowdate = date('ymdHis');
                 if(!empty($wery2))
                    { 
            ?>
            
            <table>
                <tr>
                    <td>Tanggal</td>
                    <td>: <?php echo $wery2[0]['tgl_masuk'] ?></td>
                <tr>
                    <td>Jam Datang</td>
                    <td>: <?php echo $wery2[0]['jam_datang'] ?></td>
                </tr>
                    <td>Jam Pulang</td>
                    <td>: <?php echo $wery2[0]['jam_pulang'] ?></td>
                </tr>
            </table>    
            <br />
            Detail
            <table cellpadding="5" style="font-size: 13px;width:100%">
            <tr>
            
            <th>Waktu Tugas</th>
            <th>Kegiatan</th>
            <th>Ruang</th>
            <th>Uraian</th>
            </tr>
            <?php foreach ($wery2 as $row){
                        if($wery2[0]['tgl_masuk']==$row['tgl_masuk']){?>
                <tr>
                   <td class="td-content"><?php echo $row['jam_mulai'].' s/d '.$row['jam_selesai'] ?></td>
                   <td class="td-content"><?php echo $row['kegiatan'] ?></td>
                   <td class="td-content"><?php echo $row['lab'] ?></td>
                   <td class="td-content"><?php echo $row['uraian'] ?></td>
                </tr> 
            <?php }elseif($row['tgl_masuk']!=$row['tgl_masuk']){?>
                   <tr> ""</tr><?php }}?>
            </table>
            </div>
            <div class="btn-submit">
            <a href="<?php echo site_url('keluhan') ?>" style="font-size: 12px;color:#373737;font-weight: bold;">
                    BACK</a>
            </div>
        </div>
        <?php 
        } else { echo 'No Data Found'; } ?>
    </div>
</div>
