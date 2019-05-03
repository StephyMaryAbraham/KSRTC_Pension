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
        <h1 class="page-header"><b>Manage Complaint</b></h1>
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




<?php


 ?>

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

$id=$_REQUEST['id'];
  $query = $connection->prepare("SELECT * FROM `complaint` join `pensioner` on complaint.pensioner_id=pensioner.penr_id where com_id=$id");
        
        $query->execute();
       //$details =$query->fetch(PDO::FETCH_ASSOC);    
  while($com=$query->fetch(PDO::FETCH_ASSOC)){
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
          <p class="card-text"><strong>Pensioner Register Number: </strong>&nbsp <?php echo $com['penr_reg']; ?></p>
          <p class="card-text"><strong>Pensioner Name: </strong>&nbsp <?php echo $com['penr_name'];?> </p>
          <p class="card-text"><strong>Comolaint Title: </strong>&nbsp <?php echo $com['com_title'];?> </p>
          <p class="card-text"><strong>Comolaint Content: </strong> &nbsp<?php echo $com['com_content'];?> </p>
          <?php
            
                 }
             
            ?>
         <form method='POST' action="action.php">
          <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Reply</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10">
                                        <div class="form-group">
                                            
                                                <textarea type="text" rows="3" cols="3" id="" class="form-control" name="reply" placeholder=""></textarea>
                                    
                                        </div>
                                    </div>
                                </div>
        
      
     <input type="hidden" name="com_id" value="<?php echo $id; ?>">
        
       <!--  <div class="col-md-4 col-sm-4 text-center">
          
          <a href="" class="btn btn-primary btn-block btn-md"><span class="fa fa-close"></span> Not Now  </a>
        </div> -->
        <!-- <div class="col-md-4 col-sm-4 text-center">
          
         <a href="" class="btn btn-success btn-block btn-md"><span class="fa fa-check"></span> Shortlist </a>
        </div> -->
        <div class="col-md-4 col-sm-4 text-center">
          
          <input type="submit" name="send" class="btn btn-success btn-block btn-md" value="Reply" >
        </div>
       </form>
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
  
