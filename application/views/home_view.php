<?php
    if($this->session->userdata('jabatan') == "asleb")
        {
?>
<div class="headhome">
        <div class="profilecona">
            <?php if(!empty($pegawai))
            {
            ?>
               <div class="divisia">
                    <?php echo $pegawai[0]['nama_pegawai'] ?><br />
                    <label class="label-div"> <?php echo $pegawai[0]['jurusan'] ?></label><br />
                    <label class="label-div"> <?php echo $pegawai[0]['id_pegawai'] ?></label>
                </div>
            <?php } ?>
        </div>
    <br />
	
 <!-- List Keluhan Lab -->   
<div class="heads">
	<h2>List Keluhan Lab</h2>
</div>
	<table class="table table-striped table-condensed">
    <tr style="border-color: Gray;color: #3C3C3C;">
		<th>ID</th>
		<th>Tanggal Keluhan</th>
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
		<td><?php echo $keluh['status'] ?></td>
		<td><?php echo $keluh['pengerjaan'] ?></td>
		<td>
			<a href="<?php echo site_url('keluhan/keluhandetail?id='.$keluh['id_keluhan'])?>">View</a>
		</td>
	</tr>
		<?php 
				}
			} 
			else 
			{
		?>
	<tr>
		<td colspan="7" align="center"><div style="font-weight: bolder;color:BLue;">Data Tidak Ada</div></td>
	</tr>
		<?php
			}
		?>
	</table>
    <br />

 <!-- LIST Booking Laboratory -->   
<div class="heads">
	<h2>List Booking Laboratory</h2>
</div>
<table class="table table-striped table-condensed">  <tr style="border-color: Gray;color: #3C3C3C;">
    <th>ID</th>
    <th>Kelas</th>
    <th>Lab</th>
    <th>Matakuliah</th>
    <th>Tanggal Pakai</th>
    <th>Jam</th>
    <th>Actions</th>
  </tr>
  <?php 
            
            if($booking != null)
            {
                foreach($booking AS $booked)
                {
                    
             ?>
  <tr>
    <td><?php echo $booked['id_booking'] ?></td>
    <td><?php echo $booked['nama_kelas'] ?></td>
    <td><?php echo $booked['nama_lab'] ?></td>
    <td><?php echo $booked['nama_matakuliah'] ?></td>
    <td><?php echo date('d-M-Y', strtotime($booked['tgl_pakai'])) ?></td>
    <td><?php echo $booked['jam_mulai'] ?></td>
    <td><a href="<?php echo site_url('booking/viewdetail?id='.$booked['id_booking'])?>">Views</a></td>
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
        <?php  } else if($this->session->userdata('jabatan') == "administrator"){ ?>
		
<!-- VIEW ADMINISTRATOR -->
        <div class="headhome">
        <div class="profilecona">
            <?php if(!empty($pegawai))
            {
            ?>
               <div class="divisia">
                    <?php echo $pegawai[0]['nama_pegawai'] ?><br />
                    <label class="label-div"> <?php echo $pegawai[0]['jurusan'] ?></label><br />
                    <label class="label-div"> <?php echo $pegawai[0]['id_pegawai'] ?></label>
                </div>
            <?php } ?>
        </div>
    <br />
<div style="font-size: 12px;">
 <!-- JOB REQUEST -->   
        <h1 class="page-header">
			<small>List Keluhan</small>
		</h1>
        <table class="table table-striped table-condensed">
            <tr style="border-color: Gray;color: #3C3C3C;">
                <th>#</th>
				<th>ID</th>
                <th>Tanggal Keluhan</th>
                <th>Lab</th>
                <th>Matakuliah</th>
                <th>Tanggal Pakai</th>
                <th>Actions</th>
            </tr>
            <?php 
            
            if($keluhan != null)
            { 
				$a=0;
                foreach($keluhan AS $keluh)
                {
                $a++;    
             ?>
            <tr>
				<td><?php echo $a;?></td>
                <td><?php echo $keluh['id_keluhan'] ?></td>
				<td><?php echo $keluh['tgl_keluhan'] ?></td>
				<td><?php echo $keluh['nama_lab'] ?></td>
				<td><?php echo $keluh['status'] ?></td>
				<td><?php echo $keluh['pengerjaan'] ?></td>
                <td><a class="btn btn-info btn-sm" href="<?php echo site_url('keluhan/keluhandetail?id='.$keluh['id_keluhan'])?>"><span class="glyphicon glyphicon-th"></span></a>
                    <a class="btn btn-danger btn-sm" href="<?php echo site_url('keluhan/deletekeluhan?id='.$keluh['id_keluhan']) ?>" onclick="return confirm('Are you sure want to delete this request ? Yes/No')"><span class="glyphicon glyphicon-trash"></span></a>
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
        <a href="<?php echo site_url('keluhan')?>">See More...</a>
         <br />
<?php }else {?>
</table>
<!-- VIEW ADMINISTRATOR -->
        <div class="headhome">
        <div class="profilecona">
            <?php if(!empty($pegawai))
            {
            ?>
               <div class="divisia">
                    <?php echo $pegawai[0]['nama_pegawai'] ?><br />
                    <label class="label-div"> <?php echo $pegawai[0]['jurusan'] ?></label><br />
                    <label class="label-div"> <?php echo $pegawai[0]['id_pegawai'] ?></label>
                </div>
            <?php } ?>
        </div>
    <br />
<div style="font-size: 12px;">
 <!-- JOB REQUEST -->   
        <div class="heads">
			<h2>List Keluhan Lab versi Admin</h2>
		</div>
        <table class="table table-striped table-condensed">
            <tr style="border-color: Gray;color: #3C3C3C;">
                <th>ID</th>
                <th>Tanggal Keluhan</th>
                <th>Lab</th>
                <th>Matakuliah</th>
                <th>Tanggal Pakai</th>
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
		<td><?php echo $keluh['status'] ?></td>
		<td><?php echo $keluh['pengerjaan'] ?></td>
                <td><a href="<?php echo site_url('keluhan/keluhandetail?id='.$keluh['id_keluhan'])?>">View</a>
                    |
                    <a href="<?php echo site_url('keluhan/deletekeluhan?id='.$keluh['id_keluhan']) ?>" onclick="return confirm('Are you sure want to delete this request ? Yes/No')">Delete</a>
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
        <a href="<?php echo site_url('keluhan')?>">View More Keluhan</a>
         <br />

 <!-- ITEM REQUEST -->   
        <div class="heads"><h2>List Booking Laboratory <?php echo $this->session->userdata('jabatan');?></h2></div>
        <table style="width: 100%;border-collapse: collapse;border:1px solid #373737;" border="1" cellpadding="5">
          <tr style="border-color: Gray;color: #3C3C3C;">
            <th>ID</th>
            <th>Kelas</th>
            <th>Lab</th>
            <th>Matakuliah</th>
            <th>Tanggal Pakai</th>
            <th>Jam</th>
            <th>Actions</th>
          </tr>
          <?php 
            
            if($booking != null)
            {
                foreach($booking AS $booked)
                {
                    
             ?>
          <tr>
            <td><?php echo $booked['id_booking'] ?></td>
            <td><?php echo $booked['nama_kelas'] ?></td>
            <td><?php echo $booked['nama_lab'] ?></td>
            <td><?php echo $booked['nama_matakuliah'] ?></td>
            <td><?php echo date('d-M-Y', strtotime($booked['tgl_pakai'])) ?></td>
            <td><?php echo $booked['jam_mulai'] ?></td>
            <td><a href="<?php echo site_url('booking/viewdetail?id='.$booked['id_booking'])?>">Views</a></td>
          </tr>
          <?php 
                }
            } else {
            ?>
          <tr>
            <td colspan="7" align="center"><div style="font-weight: bolder;color:BLue;">Data Tidak Ada</div></td>
          </tr>
          <?php
                }}
            ?>
        </table>
        </div>
</div>