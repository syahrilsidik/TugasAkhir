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
 <?php if(!empty($_GET['msg']))
                        {
                            $msg = $_GET['msg'];
                        }
                        else
                        {
                            $msg = "";
                        } ?>
<div class="headhome">
<div class="heads">
  <h2>List User <hr></h2>
    <div id="message" style="color:red;font-size: 14px;"> <?php echo $msg ?></div><br />
</div>

<br />
        <table style="width: 100%;border-collapse: collapse;border:1px solid #373737;" border="1" cellpadding="5">
            <tr style="border-color: Gray;color: #3C3C3C;">
                <th>ID Pegawai</th>
                <th>Nama Pegawai</th>
                <th>Jurusan</th>
              <th>Actions</th>
            </tr>
            <?php 
            
            if($kuses != null)
            {
                foreach($kuses AS $row)
                {
                    
             ?>
            <tr>
                <td><?php echo $row['id_pegawai'] ?></td>
                <td><?php echo $row['nama_pegawai'] ?></td>
                <td><?php echo $row['jurusan'] ?></td>
                <td><a href="<?php echo site_url('user/viewuser?id='.$row['id_pegawai'])?>">View</a>
                    |<a href="<?php echo site_url('user/edituser?id='.$row['id_pegawai'])?>">Edit</a> |
                    <a href="<?php echo site_url('user/delete?id='.$row['id_pegawai']) ?>" onclick="return confirm('Are you sure want to delete this user ? Yes/No')">Delete</a>
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