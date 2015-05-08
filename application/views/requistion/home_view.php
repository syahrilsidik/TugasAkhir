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
.headprofile{
    font-size: 22px;font-weight: bold;
}

.profilecona{
    width: 100%;
    height:100%;
    border-radius:10px 10px 0 0;
    border:1px solid Gray;
}

.fotopro{
    width:110px;
    height: 150px;
    box-shadow: 4px 4px 4px black;
}
.divisia{
    font-size: 30px;color:Black;
}
.label-div{
    font-size: 20px;
}
</style>
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
<?php if($this->session->userdata('userrole') == 'asleb') 
{
    
}
else
{
    ?>
        <div class="heads">
                            <h2>Your Request 'Completed'</h2>
                                                                    </div>
        <table style="width: 100%;border-collapse: collapse;border:1px solid #373737;" border="1" cellpadding="5">
            <tr style="border-color: Gray;color: #3C3C3C;">
                <th>No</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Kegiatan</th>
                <th>Ruang</th>
                <th>Uraian</th>
            </tr>
            <?php 
            
            if($laporanabsen != null)
            {
                $x=0;
                foreach($laporanabsen AS $laporan)
                {
                    
             ?>
            <tr>
                <td><?php echo $x ?></td>
                <td><?php echo $laporan['tanggal']?></td>
                <td><?php echo date('F j, Y',strtotime($laporan['jam_datang'])) ?></td>
                <td><?php echo date('F j, Y',strtotime($laporan['jam_pulang'])) ?></div></td>
                <td><?php echo $laporan['kegiatan'] ?></td>
                <td><?php echo $laporan['ruang'] ?></td>
                <td><?php echo $laporan['uraian'] ?></td>
            </tr>
            <?php 
                $x++;}
            } else {
            ?>
            <tr>
                <td colspan="7" align="center"><div style="font-weight: bolder;color:BLue;">No request is completed</div></td>
            </tr>
            <?php
                }
            ?>
        </table>
    <?php } ?>
         <br />

 <!-- ITEM REQUEST -->   
<?php if($this->session->userdata('userrole') == NULL) 
{
    
}
else
{
    ?>
        <div class="heads"><h2>Your Item Request</h2></div>
        <table style="width: 100%;border-collapse: collapse;border:1px solid #373737;" border="1" cellpadding="5">
            <tr style="border-color: Gray;color: #3C3C3C;">
                <th>Item Request ID</th>
                <th>Request Date</th>
                <th>Finish Date</th>
                <th>Priority</th>
                <th>Request Status</th>
            </tr>
            <?php 
            
            if($itemrequest != null)
            {
                foreach($itemrequest AS $itemrequest)
                {
                    
             ?>
            <tr>
                <td><?php echo $itemrequest['itemrequestid'] ?></td>
                <td><?php echo date('F j, Y',strtotime($itemrequest['startdate'])) ?></td>
                <td><?php echo date('F j, Y',strtotime($itemrequest['lastupdate'])) ?></td>
                <td><?php echo $itemrequest['priority'] ?></div></td>
                <td><?php echo $itemrequest['status'] ?></td>
            </tr>
            <?php 
                }
            } else {
            ?>
            <tr>
                <td colspan="7" align="center"><div style="font-weight: bolder;color:BLue;">No request is completed</div></td>
            </tr>
            <?php
                }
            ?>
        </table>
    <?php } ?>
    </div>
</div>