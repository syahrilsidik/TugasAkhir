
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
						
<!--Jquery-->
<script>
$(document).ready(function(){       
    
	$("#employees").change(function(){
	var n = $(this).val();
	$("#div4").load("<?php echo base_url()?>absensi", {name:n});
    });
});
</script>
<!--End Jquery--> 
<h1 class="page-header">
<small>List Absensi</small>
</h1>
<div class="alert alert-success" role="alert" style="display:<?php echo $dis ?>">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  <?php echo $msg ?>
</div>
<?php if($this->session->userdata('jabatan')=="asleb"){
$hide="none";
}else {
$hide="";}?>
<!--Table Choose-->
	<form class="form-inline right-top" role="form" style="display:<?php echo $hide;?>">
		<div class="form-group">
			<label for="employees">Employees : </label>
				<select class="form-control" id="employees" name="employees">
					<option>-Choose-</option>
					<?php foreach ($kuses as $row){ ?>
					<option value="<?php echo $row['id_pegawai']?>"><?php echo $row['nama_pegawai']?></option>
					<?php } ?>
				</select>
		</div>
	</form>
<!--table-->
        <table class="table table-striped table-condensed">
			<tr>
				<th>#</th>
                <th>Tanggal Masuk</th>
                <th>Jam Datang</th>
                <th>Jam Pulang</th>
                <th>Actions</th>
            </tr>
            <?php 
            
            if($uery != null)
            { $a=0;
                foreach($uery AS $row)
                {
             $a++;
             ?>
            <tr class="<?php if($row['status']==1){ 
								echo "success";
								}elseif($row['status']==2){ echo "pending"; }else{echo "warning";}
			?>" ><td hidden><?php echo $row['no'] ?></td>
				<td><?php echo $a; ?></td>
                <td><?php echo $row['tgl_masuk'] ?></td>
                <td><?php echo $row['jam_datang'] ?></td>
                <td><?php echo $row['jam_pulang'] ?></td>
                <td><a href="<?php echo site_url('absensi/absensidetail?id='.$row['no'])?>"><i class="fa fa-fw fa-edit"></i>View</a>
                    |<a href="<?php echo site_url('absensi/editabsensi?id='.$row['no'])?>">Edit</a> |
                    <a href="<?php echo site_url('absensi/deleteabsensi?id='.$row['no']) ?>" onclick="return confirm('Are you sure want to delete this request ? Yes/No')">Delete</a>
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
            <td colspan="7" align="center"><?php echo $links ?></td>
		</table>
		
		<div id="div4">
		</div>