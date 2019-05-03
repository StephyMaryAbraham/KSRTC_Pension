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

         <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="">
                            <h2>
                              Chat with Station Master
                            </h2>

                           
                           
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="chat_area.php" method="get">
                                <div class="row clearfix">
                                  <div class="row">
                                   
                                        <label for="email_address_2" class="col-sm-2 form-control-label">Station Master</label>
                                   
                                    <div class="form-line">
                                        <div class="form-group">
                                          <div class="col-sm-5">
                                            
                                               <select name="masterid" id="" class="form-control">
                                                 <option value="">Select</option>
                                                 <?php  $query = $connection->prepare("SELECT * FROM `station_master` join station on station_master.sm_station_id=station.station_id");
        
                                                     $query->execute();
          
                                            while($station_master=$query->fetch(PDO::FETCH_ASSOC))
                                              {
                                             ?>
                                             <option value="<?php echo $station_master['sm_id']; ?>"><?php echo $station_master['station_place']; ?></option>
                                             <?php 
                                                   }
                                              ?>
                                               </select>
                                               </div>
                                             </div>
                                                <div class="col-sm-offset-8 col-sm-4">

                                        <input type="submit" name="send" value="Chat" class="btn btn-primary m-t-15 waves-effect">
                                   </div>
                                            </div>
                                        
                                    
                                </div>
                                </div>
                                
                                <!-- <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" name="send" value="Chat" class="btn btn-primary m-t-15 waves-effect">
                                    </div>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            </div>
      
                   
            <?php
            include('includes/footer.php');
            ?>