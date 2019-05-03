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
		<?php

if(isset($_POST['send']))
{
  $id=trim($_POST['id']);
    $query = $connection->prepare("Update `pension_details` set pension_status=1 where pension_id='$id'");
        
        $query->execute();
      }
 ?>
		<?php echo $msg->display();  ?>
<table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="12" style="background-color:#6495ED;text-align:center;">UNAPPROVED STATION MASTERS</th>
                            
                        </tr>
	<tr>
	<th style="background-color:#6495ED;text-align:center;">SI No</th>
	<th style="background-color:#6495ED;text-align:center;">Station Master Name</th>
	<th style="background-color:#6495ED;text-align:center;">Email</th>
	<th style="background-color:#6495ED;text-align:center;">Station</th>
	
	
	
<th style="background-color:#6495ED;text-align:center;">Actions</th>

	
	</tr>
        </thead>
        <tbody >
           
           <?php
    
$x=1;
       
     
          

         
       $query = $connection->prepare("SELECT * FROM `station_master` join station on station_master.sm_station_id=station.station_id where station_master.sm_status=0");
        
        $query->execute();
       //$details =$query->fetch(PDO::FETCH_ASSOC);    
  while($sm=$query->fetch(PDO::FETCH_ASSOC)){
        ?>
                
            <tr>
            <td style="text-align:center;"><?php echo $x;?></td>
            

            
            <td style="text-align:center;"><?php echo $sm['sm_name']; ?></td>
            <td style="text-align:center;"><?php echo $sm['sm_email']; ?></td>
            <td style="text-align:center;"><?php echo $sm['station_place'];?></td>
            
            
         <form method="post" action="action.php">
         	<input type="hidden" name="id" value="<?php echo $sm['sm_id']; ?>">
            <td style="text-align:center;"><input type="submit" class="btn btn-info" name="send" value="Approve"></td>
            
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