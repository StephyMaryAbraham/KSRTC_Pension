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
                                Pension Amount of current month based on the corporation fund
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
  <th style="background-color:#6495ED;text-align:center;">Pension No</th>
  <th style="background-color:#6495ED;text-align:center;">Pensioner Register Number</th>
  <th style="background-color:#6495ED;text-align:center;">Pensioner Name</th>
  <th style="background-color:#6495ED;text-align:center;">Pension Amount</th>
  
  
  
  
<th style="background-color:#6495ED;text-align:center;">Actions</th>

  
  </tr>
        </thead>
        <tbody >
           
           <?php
    

       
     $year=date('Y');
     $month=date('m');
         $sql=$connection->prepare("select sum(cor_amount) as total from corporation where year(cor_date)=$year and month(cor_date)=$month");
        
$sql->execute();
$total=$sql->fetch(PDO::FETCH_ASSOC);
$total_amount=$total['total'];

$sqll=$connection->prepare("select sum(pension_amount) as pension_sum from pension_details where pension_status=1");
$sqll->execute();
$cnt=$sqll->fetch(PDO::FETCH_ASSOC);

$pension_total=$cnt['pension_sum'];
$percentage=100/$pension_total;
$pension=$total_amount/100;


if($total_amount>=$pension_total)
{
  $balance=$total_amount-$pension_total;
$sql1=$connection->prepare("Select * from `pension_details` join `pensioner` on pension_details.pensioner_id=pensioner.penr_id join monthly_pension on pension_details.pensioner_id=monthly_pension.mp_penr_id where pension_details.pension_status=1 and monthly_pension.mp_penr_id is null");
    $sql1->execute();
}

else
{
$sql1=$connection->prepare("select *,round(pension_details.pension_amount*$percentage*$pension) as pension_amount from `pension_details` join `pensioner` on pension_details.pensioner_id=pensioner.penr_id left join monthly_pension on pension_details.pensioner_id=monthly_pension.mp_penr_id where pension_details.pension_status=1 and monthly_pension.mp_penr_id is null");
    $sql1->execute();
}



    $x=1;
     while($amount=$sql1->fetch(PDO::FETCH_ASSOC)){

    

        ?>
              
            <tr>
            <td style="text-align:center;"><?php echo $x;?></td>
            

            
            <td style="text-align:center;"><?php echo $amount['pension_number']; ?></td>
            <td style="text-align:center;"><?php echo $amount['penr_reg']; ?></td>
            <td style="text-align:center;"><?php echo $amount['penr_name'];?></td>
            <td style="text-align:center;"><?php echo $amount['pension_amount'];?></td>
           
            
         <form method="post" action="action.php">
          <input type="hidden" name="id" value="<?php echo $amount['pensioner_id']; ?>">
          <input type="hidden" name="pen_amount" value="<?php echo $amount['pension_amount']; ?>">
            <td style="text-align:center;"><input type="submit" class="btn btn-info" name="send" value="Distribute"></td>
            
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