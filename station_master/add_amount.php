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


<?php





 ?>

           <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h2>
                              Add Amount    
                            </h2>
<?php

 
 echo $msg->display();       
            ?>
                           
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method='POST' action="action.php">
          <div class="form-group">
  
    <label for="" class="control-label col-sm-2">Amount:</label>
  
  <div class="col-sm-10">
  <div class="row">
  
<div class="col-sm-4">
  <input type="text" placeholder="" class="form-control" id="companyname" name="amount" value=" " data-validation="required"></div>
   
 
</div>

</div>
</div>



        
      
     <input type="hidden" name="pen_id" value="<?php echo $id; ?>">
      
        <div class="form-group">
<div class="row">
<div class="col-sm-offset-6 col-sm-6">
<input type="submit" class="btn btn-success btn-lg" name="send" value="Add Amount">

</div>
</div>
</div>
       </form>
                        </div>
                    </div>
                </div>
            </div>



            </div>
    
    </section>
        
			
                   
            <?php
            include('includes/footer.php');
            ?>