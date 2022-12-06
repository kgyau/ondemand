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
                    <button id="register_btn"type="submit" name="submit" onclick="validatename()" onclick="validatenum()"class="btn btn-success">Sign Up</button>
                    

                </div>

            </form>
        </div>
    

    </div>

    
    <script>
function validatename(){
    var regName = /^[a-zA-Z]+$/;
    var name = document.getElementById('fname').value;
    if(!regName.test(name)){
        alert('Please enter your full name (at least 10 characters).');
        document.getElementById('fname').focus();
        return false;
    }else{
        alert('Valid name given.');
        return true;
    }
}


function validatenum()
{
  var phoneno = /^\d{10}$/;
  var num = document.getElementById('cnumber').value;

  if(!phoneno.value.match(num)) {
    alert('Please enter a 10 digit number).');
    document.getElementById('cnumber').focus();
    return false;
 }
    else{
        alert("Valid Number");
        return true;
        }
}

</script>




</body>

</html>