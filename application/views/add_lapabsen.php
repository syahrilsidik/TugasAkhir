<style>
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
<script>
$(document).ready(function(){
$("#addabsen").click(function(){
		// hitung table data
		var rowCount = $("#tabledata tr").length;
		tro = "<tr>";
		col1= "<td> <input type='text' style='width:100px' name='detail["+rowCount+"][jammulai]' id='jammulai"+rowCount+"' /></td>";
		col2= "<td> <input type='text' style='width:100px' name='detail["+rowCount+"][jamselesai]' id='jamselesai"+rowCount+"' /></td>";
		col3= "<td> <input type='text' style='width:120px' name='detail["+rowCount+"][kegiatan]' id='kegiatan"+rowCount+"' /></td>";
		col4= "<td> <input type='text' style='width:80px' name='detail["+rowCount+"][ruang]' id='ruang"+rowCount+"' /></td>";
		col5= "<td> <input type='text' style='width:130px' name='detail["+rowCount+"][uraian]' id='uraian"+rowCount+"' /></td>";
		col6= "<td> <div id='btndelete'>Rem</div></td>";
		trc = "</tr>";
		tds = tro+col1+col2+col3+col4+col5+col6+trc;
		
		$("#tabledata tbody").append(tds);
	    $('#txtkeluhan').val("");
		return false;
	});
    
 $(document).on('click','#btndelete',function(){
	//$("#btndelete").click(function(){	
		var vtr = $(this).parent().parent();
		vtr.remove();
	});
 });
</script>

<script>
function validateForm() {
    var tgl = document.forms["addabsen"]["txttanggal"].value;
    if (tgl == null || tgl == "") {
        alert("Masukkan tanggal.");
 		return false;
    }
    var JD = document.forms["addabsen"]["jamdatang"].value;
    if (JD == null || JD == "") {
        alert("Masukkan jam Datang.");
  		return false;
    }
    
	var JP = document.forms["addabsen"]["jampulang"].value;
    if (JP == null || JP == "") {
        alert("Masukkan Jam Pulang.");
  		return false;
    }
	
    var x;
    var tr = $("#body-add").find(tr);
    var len = $("#body-add tr").length;
    
    if(len == 0)
    {
        alert("Klik Add Absen.");
  		return false;
    }
    
    if(len != 0)
    {
        for(x = 2;x <= (len+1);x++)
            {
                if($("#detail"+x+"").val() == "" )
                {
                   alert("Klik Add Absen.");
  					return false;
                }
            }
    }
}

$(function(){
    $("#btncancel").click(function(){
        $("#message").hide();
         $("#message").text("");
         
         var x;
    var tr = $("#body-add").find(tr);
    var len = $("#body-add tr").length;
         
    });
});
</script>
<?php
date_default_timezone_set("Asia/Jakarta");
            $nowdate = date('Gis');
			$now=date('dmYHms');
?>
<div id="heads" >
    <div class="critical">
        <h2>Add Laporan Absen</h2>
        <div id="message" style="display: none;color:red;font-size: 14px;"></div>
        <form name="addabsen" method="post" action="<?php echo site_url('Absensi/save_absensi') ?>" onsubmit="return validateForm()">
        <div class="efek" style="font-size: 14px;">
            <div style="padding-top: 5px;">Tanggal Masuk :</div>
                <div style="padding-top: 10px;">
                <input type="text" name="no" hidden value="AB<?php echo $now?>SN">
                    <input type="text" style="color:gray"; name="txttanggal" id="txttanggal"  class="DatePicker" readonly />
                </div>
        	<div style="padding-top: 5px;">Jam Datang :</div>
                <div style="padding-top: 10px;">
                    <input type="text" style="color:grey" name="jamdatang"  />
                </div>
            <div style="padding-top: 5px;">Jam Pulang :</div>
                <div style="padding-top: 10px;">
                    <input type="text" style="color:grey" name="jampulang"  />
                </div>
            <div>
            <table id="tabledata" cellpading="5">
                <thead>
                 <tr>
                    <div style="font-weight: bolder;" id="addabsen">Add Kegiatan</div>
                        </tr>
                    <tr id="tr-head">
                        <td>Jam Mulai</td>
                        <td>Jam Selesai </td>
                        <td>Kegiatan</td>
                        <td>Ruang</td>
                        <td>Uraian</td>
                    </tr>
                </thead>
                <tbody id="body-add">
                
                </tbody>
            </table>
            </div>
             <div class="btn-submit">
            	<input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="buttonsubmit" />
            	<input type="reset" name="btnreset" id="btncancel" value="Reset" class="buttonsubmit" />
            </div>
        </form>
    </div>
    </div>
