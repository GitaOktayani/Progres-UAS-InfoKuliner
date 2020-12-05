<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body{
     background-color:dimgray;
    }
    .col-md-4{
      margin-top: 100px;
      background-color: #F8F8FF;
      box-shadow: black;
    
      
    }
      
    .judul{
      margin-left: 120px;
    }
  </style>
</head>
<body>



<div class="wrap-form-contact">
<div class="container">
<div class="col-md-4 col-md-offset-4">
  <h2 class="judul">LOGIN</h2>
  <form action="" id="loginform" method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Enter password">
        <span><?=(isset($msg))?$msg:'';?></span>
    </div>
    <div class="form-group pull-right">
    <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </form>
</div>
</div>
<script type="text/javascript">
        $.ajax({
            type: "POST",
            url: 'login.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
  
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    location.href = 'kuliner.php'
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
     });
});
</script>
</body> 
</html>
