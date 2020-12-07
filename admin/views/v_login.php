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
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" id="email" placeholder="Enter password">
        <span><?=(isset($msg))?$msg:'';?></span>
    </div>
    <div class="form-group pull-right">
    <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </form>
</div>
</div>
<script type="text/javascript">
     //  $(document).ready(function() {
//  $('#loginform').submit(function(e) {
     //var email = $('email').val();
    // if(email != ''){
      $.ajax({
            type: "POST",
            url: 'login.php',
            data: $(this).serialize(),
            success: function(data)
            if(data == 'No'){
              alert('Email atau Password Salah');
            }
            else{
              llocation.href = ' http://localhost/infokuliner/admin/index.php?mod=kuliner';
            }
       });
     }
     else{
       alert("Masukan Email dan Password")
     }
        
     });
});
</script>
</body> 
</html>
