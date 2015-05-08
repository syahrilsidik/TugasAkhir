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
<script>
$(document).ready(function(){
$("#DivAddItemRequest").click(function(){
		// hitung table data
		var rowCount = $("#tabledata tr").length;
		tro = "<tr>";
		col1= "<td> <textarea style='width:160px' name='detail["+rowCount+"][keluhan]' id='keluhan"+rowCount+"' /></textarea></td>";
		col2= "<td> <div id='btndelete'>-</div></td>";
		trc = "</tr>";
		tds = tro+col1+col2+trc;
		
		$("#tabledata tbody").append(tds);
	    $('#txtkeluhan').val("");
		return false;
	});
    
 $(document).on('click','#btndelete',function(){
		var vtr = $(this).parent().parent();
		vtr.remove();
	});
 });
</script>
<?php 
	$rul = $this->session->userdata('jabatan');
	echo $rul;
	if($rul == 'administrator' ||$rul =='admin')
	{
		$show1 = "none";
		$show2 = "true";
		}else{
		$show1 = "true";
		$show2 = "none";}
		
 ?>
 <?php if(!empty($_GET['msg']))
                        {
                            $msg = $_GET['msg'];
                            $dis = '';
                        }
                        else
                        {
                            $msg = "";
                            $dis = 'none';
                        } ?>
<div class="headhome">
<div class="heads">
  <h2>List Keluhan Lab</h2>
  <div id="message" style="color:red;font-size: 14px;"> <?php echo $msg ?></div><br />
</div>
        <table style="width: 100%;border-collapse: collapse;border:1px solid #373737;" border="1" cellpadding="5">
            <tr style="border-color: Gray;color: #3C3C3C;">
                <th>ID</th>
                <th>Tgl Keluhan</th>
                <th>Lab</th>
                <th>Status</th>
                <th>Pengerjaan</th>
                <th>Actions</th>
            </tr>
            <?php 
            
            if($keluhan != null)
            {
                foreach($keluhan AS $keluh)
                {
                    
             ?>
            <tr>
                <td><?php echo $keluh['id_keluhan'] ?></td>
                <td><?php echo $keluh['tgl_keluhan'] ?></td>
                <td><?php echo $keluh['nama_lab'] ?></td>
                <td><?php echo $keluh['id_pegawai'] ?></td>
                <td><?php echo $keluh['pengerjaan'] ?></td>
                <td><a href="<?php echo site_url('keluhan/keluhandetail?id='.$keluh['id_keluhan'])?>">View</a>
                    |<div style="display: <?php echo $show1?>"><a href="<?php echo site_url('keluhan/keluhanedit?id='.$keluh['id_keluhan'])?>">Ubah pengerjaan</a></div> |
                    <div style="display: <?php echo $show2?>"><a href="<?php echo site_url('keluhan/deletekeluhan?id='.$keluh['id_keluhan']) ?>" onclick="return confirm('Are you sure want to delete this request ? Yes/No')">Delete</a></div>
                    </td>
            </tr>
            <?php 
                }
            } else {
            ?>
            <tr>
                <td colspan="7" align="center"><div style="font-weight: bolder;color:BLue;">Data Tidak Ada</div></td>
            </tr>
            <?php
                }
            ?>
        </table>
        </div>

<?php
            $nowdate = date('ymdHis');
                    
                        if(!empty($_GET['msg']))
                        {
                            $msg = $_GET['msg'];
                            $dis = '';
                        }
                        else
                        {
                            $msg = "";
                            $dis = 'none';
                        }
         ?>
<script>
function validateForm() {
    var prior = document.forms["addkeluhan"]["txtlab"].value;
    if (prior == null || prior == "-Choose-") {
        $("#message").show();
        $("#message").text("Lab Harus Diisi");
        return false;
    }
    var prio = document.forms["addkeluhan"]["txtstatus"].value;
    if (prio == null || prio == "-Choose-") {
        $("#message").show();
        $("#message").text("Status Harus Diisi");
        return false;
    }
    
    var x;
    var tr = $("#body-add").find(tr);
    var len = $("#body-add tr").length;
    
    if(len == 0)
    {
        $("#message").show();
        $("#message").text("Please Click Add Keluhan !");
        return false;
    }
    
    if(len != 0)
    {
        for(x = 2;x <= (len+1);x++)
            {
                if($("#keluhan"+x+"").val() == "" )
                {
                    $("#message").show();
                    $("#message").text("Please fill blank column in row "+(x-1)+"");
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
<div id="heads" style="display: <?php echo $show2 ?>" >
    <div class="critical">
        <h2>Tambah Keluhan Lab</h2>
        <div id="message" style="display: none;color:red;font-size: 14px;"> </div>
        <form name="addkeluhan" method="post" action="<?php echo site_url('keluhan/addkeluhan') ?>" onsubmit="return validateForm()">
        <div class="efek" style="font-size: 14px;">
            <div style="padding-top: 5px;">Keluhan ID :</div>
                <div style="padding-top: 10px;">
                    <input type="text" style="color: gray;" name="txtid_keluhan" value="KL<?php echo $nowdate ?>" onfocus="blur()"/></div>
            <div style="padding-top: 10px;">Lab :</div>
                <div style="padding-top: 10px;">
                    <select name="txtlab" id="prior">
                        <option>-Choose-</option>
                        <?php
                        foreach($lab as $labs){
						?>
                        <option value="<?php echo $labs->id_lab;?>"><?php echo $labs->nama_lab;?></option>
                        <?php } ?>
                    </select>
                </div>
            <div style="padding-top: 10px;">Priority :</div>
                <div style="padding-top: 10px;">
                    <select name="txtstatus" id="prior">
                        <option>-Choose-</option>
                        <option>Medium</option>
                        <option>Urgent</option>
                    </select>
                </div>
                <br />
                <div class="btn-submit">
            <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="buttonsubmit" />
            <input type="reset" name="btnreset" id="btncancel" value="Reset" class="buttonsubmit" />
            </div>
            <div>
            <table id="tabledata" cellpading="5">
                <thead>
                 <tr>
                    <div style="font-weight: bolder;" id="DivAddItemRequest">Add Item Request </div>
                        </tr>
                    <tr id="tr-head">
                        <td>Item Name </td>
                        <td>Qty </td>
                        <td>Reason </td>
                    </tr>
                </thead>
                <tbody id="body-add">
                
                </tbody>
            </table>
            </div>
                <div style="font-size: 11px;">
                                Note : Click Add Item Request to create and add your request
                            </div>
            
        </div>
        </form>
    </div>
</div>
<?php
 ?>