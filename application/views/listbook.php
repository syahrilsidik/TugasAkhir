<script>
	$(document).ready(function() {
		//alert("dasdasd");
    $('#example').dataTable();
} );
</script>
<div class="box">
<div class="box-header">
                  <h3 class="box-title">List Peminjaman Lab</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
<table id="example" class="table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Class</th>
                <th>Date Booking</th>
                <th>Lab</th>
                <th>Lecturer</th>
                <th>Matakuliah</th>
                <th>Start</th>
                <th>End</th>
                <th>Title</th>
            </tr>
        </thead>
        
        <tbody>
        <?php 
        	foreach($list as $data){
        ?>
        	<tr class="<?php if($data['status']==1){ 
								echo "success";
								}elseif($data['status']==2){ echo "pending"; }elseif($data['status']==3){ echo "warning"; }else{echo "";}
			?>" >	
        		
        		<td><?php echo $data['nama_kelas']?></td>
        		<td><?php echo $data['tgl_pakai']?></td>	
        		<td><?php echo $data['nama_lab']?></td>		
        		<td><?php echo $data['NamaDosen']?></td>	
        		<td><?php echo $data['idMatkul']?></td>	
        		<td><?php echo $data['start']?></td>	
        		<td><?php echo $data['end']?></td>	
        		<td><?php echo $data['title']?></td>	
        	</tr>
        <?php } ?>
        </tbody>
        </table>
        </div>