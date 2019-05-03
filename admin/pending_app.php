<?php 
include('includes/header.php');
include('includes/sidebar.php');

?>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		<!--  -->
		<?php echo $msg->display();  ?>
<table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="12" style="background-color:#6495ED;text-align:center;">KSRTC PENSIONER APPLLICATION</th>
                            
                        </tr>
	<tr>
	<th style="background-color:#6495ED;text-align:center;">SI No</th>
	<th style="background-color:#6495ED;text-align:center;">Pension No</th>
	<th style="background-color:#6495ED;text-align:center;">Pensioner Register Number</th>
	<th style="background-color:#6495ED;text-align:center;">Pensioner Name</th>
	<th style="background-color:#6495ED;text-align:center;">Pensioner Year</th>
	<th style="background-color:#6495ED;text-align:center;">Pensioner Station</th>
	<th style="background-color:#6495ED;text-align:center;">Pensioner Salary</th>
	<th style="background-color:#6495ED;text-align:center;">Pension Amount</th>
	<th style="background-color:#6495ED;text-align:center;">Pension Start Date</th>
	
	
<th style="background-color:#6495ED;text-align:center;">Actions</th>

	
	</tr>
        </thead>
        <tbody >
           
           <?php
    
$x=1;
       
     
          

         
       $query = $connection->prepare("SELECT * FROM `pensioner` left join `station` on pensioner.penr_station_id=station.station_id join `pension_details` on pensioner.penr_id=pension_details.pensioner_id where pension_details.pension_status=0");
        
        $query->execute();
       //$details =$query->fetch(PDO::FETCH_ASSOC);    
  while($penr=$query->fetch(PDO::FETCH_ASSOC)){
        ?>
                
            <tr>
            <td style="text-align:center;"><?php echo $x;?></td>
            

            
            <td style="text-align:center;"><?php echo $penr['pension_number']; ?></td>
            <td style="text-align:center;"><?php echo $penr['penr_reg']; ?></td>
            <td style="text-align:center;"><?php echo $penr['penr_name'];?></td>
            <td style="text-align:center;"><?php echo $penr['penr_year'];?></td>
            <td style="text-align:center;"><?php echo $penr['station_place'];?></td>
            <td style="text-align:center;"><?php echo $penr['penr_salary'];?></td>
            <td style="text-align:center;"><?php echo $penr['pension_amount'];?></td>
            <td style="text-align:center;"><?php echo $penr['pension_startdate'];?></td>
            
         <form method="post" action="action.php">
         	<input type="hidden" name="id" value="<?php echo $penr['pension_id']; ?>">
            <td style="text-align:center;"><input type="submit" class="btn btn-info" name="send" value="Approve Pensioner"></td>
            
          </form>
           
            	
            </tr>
            <?php
            $x++;
                 }
             
            ?>
        </tbody>
			
						
			
                        </table>

        
			
                   
            <?php
            include('includes/footer.php');
            ?>

             <script>
    
        $(document).ready(function() {
    $('#example').DataTable();
} );

$(document).ready(function(){
    $('.table').DataTable();
});	
            	
            		$(document).on("click","#delete", function(e) {
            			var link=$(this).attr("href");
	    e.preventDefault();
	    bootbox.confirm({
	        title: "<center><b>Deleting Station</b></center>",
	        message: "Do you want to delete this station ?",
	        buttons: {
	            confirm: {
	                label: 'Yes',
	                className: 'btn-success'
	            },
	            cancel: {
	                label: 'No',
	                className: 'btn-danger'
	            }
	        },
	        callback: function(result) {
	            if (result != false) {
	               window.location = link;
	            }
	        }
	         });
	    });

</script>