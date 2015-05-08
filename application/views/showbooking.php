<script>
	$( document ).ready(function () {
		var customerId
     $("#mytable td").click(function() {
     alert($(this).html());
     });
     });
            
</script>

<table class="table table-striped table-condensed" id="mytable">
            <tr style="border-color: Gray;color: #3C3C3C;">
                <th>Lab / Jam</th>
                <th>08:00 - 09:40</th>
                <th>10:00 - 11:40</th>
                <th>13:00 - 14:40</th>
                <th>15:00 - 16:40</th>
                <th>18:30 - 20:00</th>
                <th>20:10 - 21:40</th>
            </tr>
            <tr>
	            <?php 
	                foreach($booking AS $booked)
	                {
				?>
            <td><?php echo $booked['idLab'] ?></td>
               
            <?php 
                
                 $a=$dte;
                 $dd=$booked["$a"];
                 $ddx=explode(",",$dd);
	             foreach($ddx as $roe){
				 	if($roe =="0"){
						$ro="FREE";
						$bg="success";
					}else{
						$ro="BOOKED";
						$bg="danger";
					}
				 
             ?>
               <td class="<?php echo $bg ?>"><?php echo $ro ?></td>
               
            
          <?php 
          }if($booked['idLab']= "FREE"){
          	echo "</tr>";}}?>
          </tr>
        </table>