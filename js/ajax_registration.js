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