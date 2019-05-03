<?php 
include('includes/header.php');
include('includes/sidebar.php');

?>
  
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
        <h1 class="page-header"><b>Manage Application</b></h1>
      </div>
    </div>

     <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h2>
                                Manage Applications
                            </h2>
                        </div>

    <style>
.btn{border-radius: 0;}
.btn-md {
border-width: 0;
outline: none;
border-radius: 0;
box-shadow: 2px 2px 2px rgba(0, 0, 0, .6);
cursor: pointer;
}

.card
{
 margin: 0 auto; 
        float: none; 
        margin-bottom: 10px;
}    
    h3 {
      text-align: center;margin:40px;
    }
</style>




<!--  -->

  </br>
  </br>
  </br>
            
      <div class="row">
                    <div class="col-md-12">
                       <!--  <div class="white-box">
                            <h3 class="box-title">        </h3> </div> -->
        

    
    <div class="row">
                           
         

<div class="container-fluid">
<?php
echo $msg->display();
$id=$_REQUEST['id'];
  $query = $connection->prepare("SELECT * FROM `pensioner` left join `station` on pensioner.penr_station_id=station.station_id where pensioner.penr_status=0 and pensioner.penr_id='$id'");
        
        $query->execute();
       //$details =$query->fetch(PDO::FETCH_ASSOC);    
  while($penr=$query->fetch(PDO::FETCH_ASSOC)){
        ?>

  <div class="row">
      <div class="col-12">
     <div class="card"  style="width: 80rem;">
            <div class="card-block">
        <div class="row">
        <div class="col-md-4 col-sm-4 text-center">
          <img src="assets/images/card-image.png" alt="" class="btn-md">
        </div>
        
          <h2 class="card-title"></h2>
          <p class="card-text"><strong>Pensioner Register Number: </strong>&nbsp <?php echo $penr['penr_reg']; ?></p>
          <p class="card-text"><strong>Pensioner Name: </strong>&nbsp <?php echo $penr['penr_name'];?> </p>
          <p class="card-text"><strong>Pensioner Salary: </strong>&nbsp <?php echo $penr['penr_salary'];?> </p>
          
          <?php
            
                 }
             
            ?>
            </div>
    </div>
  </div> 
</div>
</div>
         <form class="form-horizontal" action="action.php" method='POST'>
          <div class="form-group">
  
    <label for="" class="control-label col-sm-2">Pension Amount:</label>
  
  <div class="col-sm-10">
  <div class="row">
  
<div class="col-sm-4">
  <input type="text" placeholder="" class="form-control" id="companyname" name="pen_amount" value=" "></div>
   
 
</div>

</div>
</div>



<div class="form-group">
  
    <label for="" class="control-label col-sm-2">Pension Start Date:</label>
  
  <div class="col-sm-10">
  <div class="row">
  
<div class="col-sm-4">
  <input type="date" placeholder="" class="form-control" id="companyname" name="pen_date" value=" "></div>
   
 
</div>

</div>
</div>
        
      
     <input type="hidden" name="pen_id" value="<?php echo $id; ?>">
      
        <div class="form-group">
<div class="row">
<div class="col-sm-offset-6 col-sm-6">
<input type="submit" class="btn btn-success btn-lg" name="send" value="Add Data">

</div>
</div>
</div>
       </form>
        
              </div>
          
                    
                </div>
            
            </div>
            </div>
          
    

      
            <?php
            include('includes/footer.php');
            ?>

            <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
  
