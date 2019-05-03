<?php 
session_start();
include('includes/header.php');
include('includes/sidebar.php');


?>
	<style>
		body {
   /* margin: 0 auto;
    max-width: 800px;
    padding: 0 20px;*/
}

.chat {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

.darker {
    border-color: #ccc;
    background-color: #ddd;
}

.chat   ::after {
    content: "";
    clear: both;
    display: table;
}

.container img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

.container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

.time-right {
    float: right;
    color: #aaa;
}

.time-left {
    float: right;
    color: #999;
}
 
 .send
 {
  bottom: 0px;
  position:fixed;
  background-color:white;
 }

	</style>
		
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

  
 $statement = $connection->prepare("SELECT * FROM `chat` where chat_receiverid=:master_id and chat_senderid=:adminid || chat_receiverid=:adminid and chat_senderid=:master_id");
         $statement->bindparam(":master_id", $master_id);
         $statement->bindparam(":adminid", $adminid);
         //$_SESSION['master']=$_REQUEST['masterid'];
         $master_id=$_SESSION['sm_id'];
         $adminid=1; 


        $statement->execute();


         $statement1 = $connection->prepare("SELECT sm_name FROM `station_master` where sm_id=:master_id");
         $statement1->bindparam(":master_id", $master_id);

         $statement1->execute();
         $station_master=$statement1->fetch(PDO::FETCH_ASSOC);
       //$details =$query->fetch(PDO::FETCH_ASSOC);    
  while($chat=$statement->fetch(PDO::FETCH_ASSOC)){
        

 ?>

      

<div class="container-fluid <?php if($chat['chat_type']=='admin'){?>darker<?php }  ?> chat">
  
  <p><?php echo $chat['chat_content']; ?></p>
  <span class="<?php if($chat['chat_type']=='admin'){?>time-left<?php }else { ?>time-right <?php } ?>"><?php if($chat['chat_type']=='admin'){ echo "admin"; }else { echo "me"; } ?></span>
</div>

<!-- <div class="container-fluid chat">
  
  <p>Sweet! So, what do you wanna do today?</p>
  <span class="time-right">11:02</span>
</div> -->

<?php } ?>

      





     
   <br>
   <br>
   <br>
   <br>
   <br>
<form action="action.php" method="post">
   <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 msg send">
                                       
      <div class="row">
                                               
          <div class="col-sm-8">
                <div class="form-group">   
          <input type="text" id="" class="form-control" name="chat" placeholder="">
      </div>
      </div>
                                       
           <input type="hidden" name="masterid" value="<?php echo $master_id; ?>">                         
      <div class="col-sm-3">
            <div class="form-group">
          <input type="submit" name="send" value="Send" class="form-control btn btn-info">
          </div>
      </div>
          </div>
                                          
  </div>
  </form>

        
			
                   
            <?php
            include('includes/footer.php');
            ?>

            <script>
            	
            </script>