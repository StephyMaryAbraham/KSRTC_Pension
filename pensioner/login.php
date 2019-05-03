<?php 
include('includes/controller.php');

 ?>
<!DOCTYPE html>
<html>
<head>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <link href="assets/css/estyle.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    
    #regContainer{
    margin-top: 2%; 
     margin-bottom: 2%; 
}

.panel-login {
    border-color: #ccc;
     background-color: #f9f8f8;
    -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
    text-align:center;
}
.panel-login>.panel-heading a{
    text-decoration: none;
    font-weight: bold;
    font-size: 28px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
    font-size: 34px;
}
.panel-login>.panel-heading hr{
    margin-top: 10px;
    margin-bottom: 0px;
    clear: both;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
    height: 45px;
    border: 1px solid #ddd;
    font-size: 16px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
    outline:none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-color: #ccc;
}
.btn-login {
    background-color:#3D9DB3;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #2d92a9;
}
.btn-login:hover,
.btn-login:focus {
    color: #fff;
    background-color: #198da8;
    border-color: #53A3CD;
}
.btn-register {
    background-color: #17ae47;
    outline: none;
    color: #fff;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
    color: #fff;
    background-color: #1CA347;
    border-color: #1CA347;
}

.fullscreen_bg {
  
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: 50% 50%;
    /*background-image: url('https://wallpaperscraft.com/image/apple_brand_imac_desk_keyboard_79998_1680x1050.jpg');*/
    background-repeat:repeat;
  }

.panel-heading a{
    font-size: 48px;
    color: rgb(6, 106, 117);
    padding: 2px 0 10px 0;
    font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif;
    font-weight: bold;
    text-align: center;
    padding-bottom: 30px;
}

.panel-heading a{
    background: -webkit-repeating-linear-gradient(-45deg, 
    rgb(18, 83, 93) , 
    rgb(18, 83, 93) 20px, 
    rgb(64, 111, 118) 20px, 
    rgb(64, 111, 118) 40px, 
    rgb(18, 83, 93) 40px);
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
}

</style>
<script>
    $(function() {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

});


</script>
</head>

<body>


  <?php echo $msg->display();  ?>     


<div id="fullscreen_bg" class="fullscreen_bg">
<div id="regContainer" class="container">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <a href="#" class="active" id="login-form-link">Login</a>
              </div><div class="col-xs-6">
                <a href="#" id="register-form-link">Register</a>
              </div>
            

            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="action.php" method="post" role="form" style="display: block;">
                  <div class="form-group">
                    <label for="username">EmailId</label>
                    <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="EmailId" value="" data-validation="required" data-validation-error-msg-required="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" data-validation="required" data-validation-error-msg-required="This field is required">
                  </div>
                  
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="send" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                      </div>
                    </div>
                  </div>
                </form>
                <form id="register-form" action="action.php" method="post" role="form" style="display: none;">
                  <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" name="name" id="username" tabindex="1" class="form-control" placeholder="Full Name" value="" data-validation="required" data-validation-error-msg-required="This field is required">
                  </div>
                  

                  <div class="form-group">
                    <label for="username">Age</label>
                    <input type="text" name="age" id="username" tabindex="1" class="form-control" placeholder="Age" value="" data-validation="required" data-validation-error-msg-required="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="username">Year of pension</label>
                    <input type="date" name="year" id="username" tabindex="1" class="form-control" value="" data-validation="required" data-validation-error-msg-required="This field is required">
                  </div>
                  
                  <div class="form-group">
                    <label for="username">Salary</label>
                    <input type="text" name="salary" id="username" tabindex="1" class="form-control" placeholder="Salary" value="" data-validation="required" data-validation-error-msg-required="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="username">Station</label>
                   
                    <select name="station" id="" class="form-control" data-validation="required" data-validation-error-msg-required="This field is required">
                    <option value="">--Select--</option>
                    <?php $query = $connection->prepare("SELECT * FROM `station`");
        
        $query->execute();
       //$details =$query->fetch(PDO::FETCH_ASSOC);    
  while($stations=$query->fetch(PDO::FETCH_ASSOC)){
        ?> 
        <option value="<?php echo $stations['station_id']; ?>"><?php echo $stations['station_place']; ?></option>
        <?php } ?>
        </select>
      
                  </div>
                  <div class="form-group">
                    <label for="username">Email</label>
                    <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="Username" value="" data-validation="required" data-validation-error-msg-required="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" data-validation="required" data-validation-error-msg-required="This field is required">
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Confirm password</label>
                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" data-validation="required" data-validation-error-msg-required="This field is required">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="send" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
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

<script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/jquery.form-validator.min.js"></script>
<script>
        $(document).ready(function(){
         $.validate({
    lang: 'en',
    modules : 'location, date, security, file',
  });
         });
    </script>  
</body>
</html>
