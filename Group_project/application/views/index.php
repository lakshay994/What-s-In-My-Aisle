
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>What's in my aisle?</title>

    
    <!-- Custom styles for this template -->
    <link href="http://localhost/CI/Group_project/css/the-big-picture.css" rel="stylesheet">
    <link href="http://localhost/CI/Group_project/css/style.css" rel="stylesheet">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  </head>

  <body>

    <!-- Navigation -->
    
      <div class="container" style="text-align: center; margin-top: 20px;">
        <a href="#" style="font-size: 35px; color: white; text-decoration: none;"><span style="letter-spacing: 3px">

        What's in my aisle?</span></a>
      </div>

      <?php 
        if(isset($success_msg)){
          echo '<div class="alert alert-success" role="alert">';

          echo $success_msg;
              
          echo '</div>';
        }

      ?>
    

<section style="margin-top: 100px;">
    <div class="container">
      <div class="row">
        <div class="col-sm-6" style="height: 300px;">
          
            <div style="width: 50%; margin: 0 auto;">
              <span class="glyphicon-ring" style="padding: 22px 18px 0px 0px; "> 
                  <span class="glyphicon glyphicon-log-in" style="font-size: 90px; color: white; "></span>
              </span>
             </div>   

             <div style="width: 50%; margin: 40px auto;">
                <div style="height: 40px; width: 150px; background-color: white; text-align: center; padding-top: 10px;  border-radius: 20px;">
                  <a href="<?php echo base_url();?>index.php/account/login"><strong>Log In</strong></a>
                </div>
             </div>
         
        </div>
        <div class="col-sm-6"  style="height: 200px;">
          
            <div style="width: 50%; margin: 0 auto;">
              <span class="glyphicon-ring"> 
                  <span class="glyphicon glyphicon-user" style="font-size: 90px; color: white; margin-top: 20px;"></span>
              </span>
             </div>   

             <div style="width: 50%; margin: 40px auto;">
                <div style="height: 40px; width: 150px; background-color: white; text-align: center; padding-top: 10px;  border-radius: 20px;">
                  <a href="<?php echo base_url();?>index.php/account/signup"><strong>Sign Up</strong></a>
                </div>
             </div>

        </div>
      </div>
    </div>
</section>
       <div class="footer-copyright  text-center  navbar-fixed-bottom" style="background-color: #c3c3c3; padding: 10px; color: black; margin-top: 20px;">
        © 2018 Copyright:
        <a href="#"> What's in my Aisle? </a>
    </div>


  </body>

</html>
