<?php 

  session_start();

  if(!isset($_SESSION['email'])){   
    header("Location: http://localhost/CI/Group_project/");
  }

?>

<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>What's in my aisle?</title>

    
    <!-- Custom styles for this template -->
    
    <link href="http://localhost/CI/Group_project/css/style.css" rel="stylesheet">


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand disabled" href="#">What's in my Aisle?</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-left">

        <?php
          echo '<li class="active"><a href="http://localhost/CI/Group_Project/index.php/user/home">Home</a></li>';
        

          foreach ($categories as $key => $value) {
            
            echo '<li>';
            echo '<a href="http://localhost/CI/Group_Project/index.php/user/category/?cname='.$value['Category_Name'].'">'.$value['Category_Name'].'</a>';
            echo '</li>';

          }

        ?>

        
      </ul>  


      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: skyblue;"><?php echo $_SESSION['email']?></a></li>
        <li>
          <?php 
            echo '<a href="http://localhost/CI/Group_Project/index.php/user/logout"><span class="glyphicon glyphicon-log-out" style="font-size: 20px;"></span></a>';
            
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
  

  <div class="container">
    <div class="jumbotron">
      <h1>Welcome to Store</h1>

      <p>We help you to locate the item!</p>
      <h5>First do the signup. Select the near by location of the store from top dropdown menu. Then select the category of the item which you want and search the items you want. If item is available in the store then it returns the aisley number.</h5>
      
    </div>
  </div>
    
  <div class="container" style="margin-top:-20px;">
    <div class="row" style="padding: 13px; ">
      <div class="panel panel-default">
        <div class="panel-body">
            Follow us on...
        </div>
      </div>
    </div>
  </div>

  <div class="container hidden-xs" style="margin-top: 0px;">
    
    <div class="col-sm-3">
      <a href="https://www.facebook.com/"><img src="http://localhost/CI/Group_project/Image/fb.png"  class="img-circle center-block"></a>
    </div>

    <div class="col-sm-3">
      <a href="https://plus.google.com/"><img src="http://localhost/CI/Group_project/Image/google.png" class="img-circle center-block"></a>
    </div>

    <div class="col-sm-3">
      <a href="https://twitter.com/twitter"><img src="http://localhost/CI/Group_project/Image/twitter.png" alt="..." class="img-circle center-block"></a>
    </div>

    <div class="col-sm-3">
      <a href="https://www.instagram.com/"><img src="http://localhost/CI/Group_project/Image/insta.png" class="img-circle center-block"></a>
    </div>

  </div>  

  <div class="container visible-xs" style="margin-top: 0px;">
    
   <div class="row">
    <div class="col-xs-6" style="padding: 10px;">
      <a href="https://www.facebook.com/"><img src="http://localhost/CI/Group_project/Image/fb.png"  class="img-circle center-block"></a>
    </div>

    <div class="col-xs-6" style="padding: 10px;">
      <a href="https://plus.google.com/"><img src="http://localhost/CI/Group_project/Image/google.png" class="img-circle center-block"></a>
    </div>

</div> 

  <div class="row">
    <div class="col-xs-6" style="padding: 10px;">
     <a href="https://twitter.com/twitter"><img src="http://localhost/CI/Group_project/Image/twitter.png" alt="..." class="img-circle center-block"></a>
    </div>

    <div class="col-xs-6" style="padding: 10px;">
      <a href="https://instagram.com/"><img src="http://localhost/CI/Group_project/Image/insta.png" class="img-circle center-block"></a>
    </div>

  </div>  
</div>

    <div class="footer-copyright  text-center" style="background-color: #c3c3c3; padding: 10px; color: black; margin-top: 20px;">
        © 2018 Copyright:
        <a href="#"> What's in my Aisle? </a>
    </div>

  </body>
</html>