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

		 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h2>
                                Add Amount to Corporation
                            </h2>
                        </div>
		<?php


 ?>
		<?php echo $msg->display();  ?>
<table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="12" style="background-color:#6495ED;text-align:center;">KSRTC PENSIONER APPLLICATION</th>
                            
                        </tr>
	<tr>
	<th style="background-color:#6495ED;text-align:center;">SI No</th>
	<th style="background-color:#6495ED;text-align:center;">Station</th>
	<th style="background-color:#6495ED;text-align:center;">Station Master</th>
	<th style="background-color:#6495ED;text-align:center;">Amount</th>
	<th style="background-color:#6495ED;text-align:center;">Date</th>
	
	
<th style="background-color:#6495ED;text-align:center;">Actions</th>

	
	</tr>
        </thead>
        <tbody >
           
           <?php
    
$x=1;
       
     
          

         
       $query = $connection->prepare("SELECT * FROM `station_amount` join station on station_amount.sa_station_id=station.station_id join station_master on station_amount.sa_station_id=station_master.sm_station_id where station_amount.sa_status=0");
        
        $query->execute();
       //$details =$query->fetch(PDO::FETCH_ASSOC);    
  while($amount=$query->fetch(PDO::FETCH_ASSOC)){
        ?>
                
            <tr>
            <td style="text-align:center;"><?php echo $x;?></td>
            

            
            <td style="text-align:center;"><?php echo $amount['station_place']; ?></td>
            <td style="text-align:center;"><?php echo $amount['sm_name']; ?></td>
            <td style="text-align:center;"><?php echo $amount['sa_amount'];?></td>
            <td style="text-align:center;"><?php echo $amount['sa_date'];?></td>
            
         <form method="post" action="action.php">
         	<input type="hidden" name="id" value="<?php echo $amount['sa_id']; ?>">
         	<input type="hidden" name="station_id" value="<?php echo $amount['sa_station_id']; ?>">
            <td style="text-align:center;"><input type="submit" class="btn btn-info" name="send" value="Add"></td>
            
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