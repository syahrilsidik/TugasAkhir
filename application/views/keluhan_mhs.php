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
<h1 class="page-header">
<small>List Keluhan Mahasiswa</small>
</h1>  <div id="message" style="color:red;font-size: 14px;"> <?php echo $msg ?></div><br />
        <table class="table table-striped table-condensed">
            <tr style="border-color: Gray;color: #3C3C3C;">
                <th>ID Keluhan</th>
                <th>Nama Pelapor</th>
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
                <td><?php echo $keluh['id_keluhanmhs'] ?></td>
                <td><?php echo $keluh['nama_mhs'] ?></td>
                <td><?php echo $keluh['lab'] ?></td>
                <td><?php echo $keluh['status'] ?></td>
                <td><?php echo $keluh['pengerjaan'] ?></td>
                <td><a href="<?php echo site_url('keluhan/mhsviewdetail?id='.$keluh['id_keluhanmhs'])?>">View</a>
                    |<div style="display: <?php echo $show1?>"><a href="<?php echo site_url('keluhan/mhsviewdetailedit?id='.$keluh['id_keluhanmhs'])?>">Ubah pengerjaan</a></div> |
                    <div style="display: <?php echo $show2?>"><a href="<?php echo site_url('keluhan/deletekeluhanmhs?id='.$keluh['id_keluhanmhs']) ?>" onclick="return confirm('Are you sure want to delete this request ? Yes/No')">Delete</a></div>
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