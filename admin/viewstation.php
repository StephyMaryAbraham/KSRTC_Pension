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
 
		<?php echo $msg->display();  ?>
<table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="6" style="background-color:#6495ED;text-align:center;">KSRTC Stations</th>
                            
                        </tr>
	<tr>
	<th style="background-color:#6495ED;text-align:center;">SI No</th>
	<th style="background-color:#6495ED;text-align:center;">Location</th>
	<th style="background-color:#6495ED;text-align:center;">Address</th>
	<th style="background-color:#6495ED;text-align:center;">District</th>
	
<th style="background-color:#6495ED;text-align:center;">Actions</th>

	
	</tr>
        </thead>
        <tbody >
           
           <?php
    
$x=1;
       
     
          

         
       $query = $connection->prepare("SELECT * FROM `station`");
        
        $query->execute();
       //$details =$query->fetch(PDO::FETCH_ASSOC);    
  while($stations=$query->fetch(PDO::FETCH_ASSOC)){
        ?>
                
            <tr>
            <td style="text-align:center;"><?php echo $x;?></td>
      
            <td style="text-align:center;"><?php echo $stations['station_place'];?></td>
            <td style="text-align:center;"><?php echo $stations['station_address'];?></td>
            <td style="text-align:center;"><?php echo $stations['station_district'];?></td>
           
            <td style="text-align:center;"><a href="delete_station.php?id=<?php echo $stations['station_id']; ?>" id="delete" class="btn btn-danger">Delete</a>
            <a href="edit_station.php?id=<?php echo $stations['station_id']; ?>" class="btn btn-info">Edit</a></td>
           
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