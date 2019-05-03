<?php 
include('includes/header.php');
include('includes/sidebar.php');

?>
  
     <script src="https://ajax.googleapis.pen/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
        <h1 class="page-header"><b>Pension Details</b></h1>
      </div>
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

$id=$_SESSION['pensioner_id'];
  $query = $connection->prepare("SELECT * FROM `pension_details` left join `pensioner` on pension_details.pensioner_id=pensioner.penr_id where pensioner.penr_id=$id");
        
        $query->execute();
       //$details =$query->fetch(PDO::FETCH_ASSOC);    
  $pen=$query->fetch(PDO::FETCH_ASSOC);
    if($pen['penr_status']==1)
    {

      if($pen['pension_status']==0){
        ?>
      
    
<h3>Your Pension is pending to be approved by administrator</h3>
<?php } ?>
  <div class="row">
      <div class="col-12">
     <div class="card"  style="width: 80rem;">
            <div class="card-block">
        <div class="row">
        <div class="col-md-4 col-sm-4 text-center">
          <img src="assets/images/card-image.png" alt="" class="btn-md">
        </div>
        
          <h2 class="card-title"></h2>
          <p class="card-text"><strong>Pension Amount: </strong>&nbsp <?php echo $pen['pension_amount']; ?></p>
          <p class="card-text"><strong>Pension Start Date: </strong>&nbsp <?php echo $pen['pension_startdate'];?> </p>
          <p class="card-text"><strong>Pension Number: </strong>&nbsp <?php echo $pen['pension_number'];?> </p>
          
          <?php
            
                 }

                 else
                 {
                  ?>

<h2>Your Pension is pending to be approved by the Station Master</h2>
                  <?php
                 }
             
            ?>
         
        </div>
              </div>
          </div>
    </div>
  </div> 
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
  
