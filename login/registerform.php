<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="swal/sweetalert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="swal/sweetalert.js"></script>
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="../js/formvalid.js"></script>
</head>

<body>


    <br>
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">  <!-- makes the  input bar short   -->

            <div class="page-header">
                <h1 style="text-align: center;">Sign Up</h1>
            </div>
    
            
            <form id="register_form" name="myregisterform" class="form-horizontal animated bounce"  action="../actions/registerprocess.php" method="post"> 
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="fname" type="text" class="form-control" name="fullname" placeholder="Full Name">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="eml" type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="pword" type="password" class="form-control" name="password" placeholder="Password"
                        required>
                </div>

                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="cty" type="text" class="form-control" name="city" placeholder="City">
                </div>
                <br>
               
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="cnumber" type="text" class="form-control" name="contactnumber" placeholder="Contact Number">
                </div>
                <br>
               
                <br>

                <div class="input-group">
                    <button id="register_btn"type="submit" name="submit" class="btn btn-success">Sign Up</button>
                    

                </div>

            </form>
        </div>
    

    </div>
    <script>
    $('document').ready(function() {   
    /* handle form validation */  
    $("#register_form").validate({
        rules:
     {
     fullname: {
        required: true,
     minlength: 7
     },
     password: {
     required: true,
     minlength: 6,
     maxlength: 8
     },
    
     email: {
              required: true,
              email: true
              },
      },
         messages:
      {
              user_name: "please enter fullname",
              password:{
                        required: "please provide a password",
                        minlength: "password at least have 6 characters"
                       },
              user_email: "please enter a valid email address",
     
         },
      submitHandler: submitForm 
         });  
      /* handle form submit */
      function submitForm() {  
      var data = $("#register_form").serialize();    
      $.ajax({    
      type : 'POST',
      url  : '../actions/registerprocess.php',
      data : data,
      beforeSend: function() { 
       $("#error").fadeOut();
       $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
      },
      success :  function(response) {      
          if(response==1){         
               $("#error").fadeIn(1000, function(){
                 $("#error").html('<div class="alert alert-danger"> <span  class="glyphicon glyphicon-info-sign"></span>   Sorry email already taken !</div>');           
                 $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account');          
               });                    
          } else if(response=="registered"){         
               $("#btn-submit").html('<img src="ajax-loader.gif" />   Signing Up ...');
               setTimeout('$(".form-signin").fadeOut(500,  function(){ $(".register_container").load("../actions/login.php"); }); ',3000);         
          } else {          
               $("#error").fadeIn(1000, function(){           
                    $("#error").html('<div class="alert alert-danger"><span  class="glyphicon glyphicon-info-sign"></span>   '+data+' !</div>');           
                   $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account');         
               });           
             }
          }
      });
      return false;
    }
  });
  </script>

</body>

</html>