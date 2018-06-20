

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log In</title>

    
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
        if(isset($error_msg)){
          echo '<div class="alert alert-warning" role="alert">';

          echo $error_msg;
              
          echo '</div>';
        }

      ?>
    
      <div class="row">
          <div class="col-xs-3"></div>
          <div class="col-sm-6" style="padding: 40px;">
           

           <?php 

           echo form_open('admin/login_post');

           echo '<div class="text-center mb-4" style="margin-bottom: 30px;">
                  <img src="http://localhost/CI/Group_project/Image/newuser.png">  
                </div>';

           #email
           echo '<div class="form-label-group" style="margin-bottom: 20px;">';

                $data_email = array(
                            'name' => 'uname',
                            'id' => 'email_id',
                            'class' => 'form-control', 
                            'placeholder' => 'username'
                        );

                    echo form_input($data_email);
                 echo "<div style = 'color:red'>".form_error('uname')."</div>";

           echo '</div>';

           #password
           echo '<div class="form-label-group">';

                $data_password = array(
                            'name' => 'password',
                            'id' => 'password_id',
                            'class' => 'form-control', 
                            'placeholder' => 'password',
                            'type' => 'password'
                        );

                    echo form_input($data_password);
                   echo "<div style = 'color:red'>".form_error('password')."</div>";

           echo '</div>';

            #login-cancel
               echo '<div class="row">';
                 #submit
                 echo '<div class="col-sm-6">';
                      echo form_submit('submit', 'Login', "class='btn btn-lg btn-primary btn-block', style='margin: 40px auto'");                     
                 echo '</div>';

                 #cancel
                 echo '<div class="col-sm-6">';
                      echo '<a class="btn btn-lg btn-warning btn-block" style="margin: 40px auto;" href="http://localhost/CI/Admin/">Cancel</a>';
                 echo '</div>';

                
               echo '</div>';

           ?>

          </div>
          <div class="col-xs-3"></div>
      </div>

     

  </body>

</html>
