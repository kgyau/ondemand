<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="swal/sweetalert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="swal/sweetalert.js"></script>
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="../js/emailvalidation.js"></script>
</head>

<body>


    <br>
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">  <!-- makes the  input bar short   -->

            <div class="page-header">
                <h1 style="text-align: center;">Log in</h1>
            </div>

            <body>
            <form id="loginid" name="myloginform" class="form-horizontal animated bounce"  action="../actions/loginprocess.php" method="post">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="emailid" type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="passwordid" type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
               
                <br>

                <div class="input-group">
                    <button id="loginsubmit" type="submit" name="lsubmit" onclick="" class="btn btn-success">Log In</button>
                    

                </div>

            </form>
        </div>
    

    </div>

    
</body>
</html>    
     
