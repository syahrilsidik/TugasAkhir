<script>

	$(document).ready(function(){
		
		var date = new Date();
		date.setDate(date.getDate() + 1);
		$('#tanggal').datepicker({format:'D, yyyy-mm-dd',startDate:date});
		$("#tombol").click(function(){
			
			//variable for display
			var as=1;
			//var tanggal = $("#tanggal").val();
			var lab = $("#lab").val();
			var kelas = $("#kelas").val();
			var dosen = $("#dosen").val();
			var matkul = $("#matakuliah").val();
			var ket = $("#ket").val();
			
			
			
			//input start and end
			//var start= $("#start").val();
			var start = $("#start").val();
			var pecah = start.split('-');
			//tanggal
			var tanggal = $("#tanggal").val();
			var hacep = tanggal.split(',');
			//enddd
			
			
			//variable for save
			var labs = $("#lab :selected").text();
			var kelass = $("#kelas :selected").text();
			var dosens = $("#dosen :selected").text();
			var matkuls = $("#matakuliah :selected").text();
			var starts = $("#start :selected").text();
			
			var num=$("#tabel tr").length;
			var hed="<tr>";
			var col1="<td>"+ as +"</td>";
			var col2="<td><input type='hidden' name='detail["+num+"][tgl]' id='tgl"+num+"' value='"+hacep[1]+"' />"+ hacep[1] +"</td>";
			var col3="<td><input type='hidden' name='detail["+num+"][lab]' id='tgl"+num+"' value='"+lab+"' />"+ labs +"</td>";
			var col4="<td><input type='hidden' name='detail["+num+"][kelas]' id='tgl"+num+"' value='"+kelas+"' /><input type='hidden' name='detail["+num+"][dosen]' id='tgl"+num+"' value='"+dosen+"' />"+ kelass +"</td>";
			var col5="<td><input type='hidden' name='detail["+num+"][matkul]' id='tgl"+num+"' value='"+matkul+"' />"+ matkuls +"</td>";
			var col6="<td><input type='hidden' name='detail["+num+"][start]' id='tgl"+num+"' value='"+hacep[1]+"T"+pecah[0]+"' /><input type='hidden' name='detail["+num+"][end]' id='tgl"+num+"' value='"+hacep[1]+"T"+pecah[1]+"' />"+ starts +"</td>";
			var ket="<td><input type='hidden' name='detail["+num+"][ket]' id='tgl"+num+"' value='"+ket+"' />"+ ket +"</td>";
			var act="<td><button type='submit' class='btn btn-danger fa fa-minus-square' id='btndelete'></button></td>";
			var fot="<tr>";
			
			var apd = hed+col1+col2+col3+col4+col5+col6+ket+act+fot;
		
			$("#tabel").append(apd)
			return false;
		});
		
		$("#lab").change(function(){
			var ini=$(this).val();
			var tanggal = $("#tanggal").val();
			var hacep = tanggal.split(',');
			//alert(hacep[0]);
			$.ajax({
				type:"POST",
				url: "<?php echo site_url('booking/getsesi');?>",
				dataType: "html",
				data: {
					hari:hacep[0],
					labi:ini
					},
				success:function(data){
					$("#start").html(data);
					//alert(data);
			},
			});
			});
		
		$(document).on('click','#btndelete',function(){
		var vtr = $(this).parent().parent();
		vtr.remove();
		});
		
		$("#kelas").change(function(){
			var datad = $(this).val()
			$.ajax({
				type:"POST",
				url: "<?php echo site_url('booking/getdosen');?>",
				dataType: "html",
				data: {kelas:datad},
				success:function(data){
					$("#dosen").html(data);
					//alert(data);
			},
			});
			});
		$("#dosen").change(function(){
			var datad = $(this).val();
			var data = $("#kelas").val();
			alert(datad);
			$.ajax({
				type:"POST",
				url: "<?php echo site_url('booking/getmatkul');?>",
				dataType: "html",
				data: {kelas:data,dosen:datad},
				success:function(data){
					$("#matakuliah").html(data);
					//alert(data);
			},
			});
			});
		$("#tanggal").change(function(){
			var tanggal = $(this).val();
			var hacep = tanggal.split(',');
			//alert(hacep[0]);
			$.ajax({
				type:"POST",
				url: "<?php echo site_url('booking/cektgl');?>",
				dataType: "html",
				data: {
					hari:hacep[1],
					},
				success:function(data){
					//$("#start").html(data);
					alert(data);
			},
			});
		});
		
	});
</script>
<?php
date_default_timezone_set("Asia/Jakarta");
            $nowdate = date('Gis');
			$now=date('dmYHms');
			$employeeid = $this->session->userdata('id_pegawai');
?>

<form class="form-horizontal" role="form" id="foms">
   <div class="form-group">
      <label for="lab" class="col-sm-2 control-label">Tanggal Peminjaman</label>
      <div class="col-sm-5">
         <input type="text" class="form-control" id="tanggal" onfocus="blur()">
      </div>
   </div>
   <div class="form-group">
      <label for="lab" class="col-sm-2 control-label">Lab</label>
	  <div class="col-sm-5">
         <select class="form-control" id="lab">
         <?php foreach($lab as $row){ ?>
         	<option  value="<?php echo $row['id_lab']?>"><?php echo $row['nama_lab']?></option>
         	<?php }?>
         </select>
      </div>
   </div>
   <div class="form-group">
      <label for="kelas" class="col-sm-2 control-label">Kelas</label>
	  <div class="col-sm-5">
         <select class="form-control" id="kelas" required>
         	<option value=''>-Choose-</option>
         	<?php foreach($kelas as $ro){ ?>
         	<option value="<?php echo $ro['id_kelas']?>"><?php echo $ro['nama_kelas']?></option>
         	<?php }?>
         </select>
      </div>
   </div>
   <div class="form-group">
      <label for="dosen" class="col-sm-2 control-label">Dosen</label>
	  <div class="col-sm-5">
         <select class="form-control" id="dosen">
         </select>
      </div>
   </div>
   <div class="form-group">
      <label for="matakuliah" class="col-sm-2 control-label">Matakuliah</label>
	  <div class="col-sm-5">
         <select class="form-control" id="matakuliah" required>
         	<option>sdasd</option>
         </select>
      </div>
   </div>
   <div class="form-group">
      <label for="start" class="col-sm-2 control-label">Jam Mulai</label>
	  <div class="col-sm-5">
         <select class="form-control" id="start" required>
         </select>
      </div>
   </div>
   <div class="form-group">
      <label for="ket" class="col-sm-2 control-label ">Keterangan</label>
      <div class="col-sm-5">
         <textarea class="form-control" id="ket" style="resize: none;"></textarea>
      </div>
   </div>
   <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-default" id="tombol">Booked Now</button>
      </div>
   </div>
</form>
<form name="addabsen" method="post" action="<?php echo site_url('booking/addbooking') ?>">

<input type="text" name="idb" hidden value="AB<?php echo $now?>SN">
<div class="box">
<div class="box-header">
<div class="box-body no-padding">
<table class="table table-striped" id="tabel">
            <tr style="border-color: Gray;color: #3C3C3C;">
                <th width="25">#</th>
                <th>Tanggal</th>
                <th>Lab</th>
                <th>Kelas</th>
                <th>Matakuliah</th>
                <th>Jam</th>
                <th>Ket</th>
                <th></th>
            </tr>
</table>

</div>
</div>
</div>
<div class="btn-submit">
            	<input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" class="buttonsubmit" />
            	<input type="reset" name="btnreset" id="btncancel" value="Reset" class="buttonsubmit" />
            </div>
</form>