

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up</title>

    
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
        if(isset($warning)){
          echo '<div class="alert alert-danger" role="alert">';

          echo $warning;
          echo '&nbsp;<a href="http://localhost/CI/Group_Project/index.php/account/login">here</a>';
              
          echo '</div>';
        }
      ?>
    
      <div class="row">
          <div class="col-xs-3"></div>
          <div class="col-sm-6" style="padding: 40px;">
          
           <?php
              echo form_open('account/signup_post');
                
                echo '<div class="text-center mb-4" style="margin-bottom: 30px;">
                  <img src="http://localhost/CI/Group_project/Image/newuser.png">  
                </div>';
                
                echo '<div class="row">';


                #Firstname
                echo '<div class="col-sm-6">
                            <div class="form-label-group" style="margin-bottom: 20px;">';

                       $data_fname = array(
                          'name' => 'fname',
                          'id' => 'fname_id',
                          'class' => 'form-control',
                          'placeholder' => 'First Name',
                          'autofocus'   => 'autofocus'
                       );  

                       echo form_input($data_fname);
                       echo "<div style = 'color:red'>".form_error('fname')."</div>";   

                echo '</div>
                  </div>';

                #Lastname
                echo '<div class="col-sm-6">
                            <div class="form-label-group" style="margin-bottom: 20px;">';

                       $data_lname = array(
                          'name' => 'lname',
                          'id' => 'lname_id',
                          'class' => 'form-control',
                          'placeholder' => 'Last Name'
                          
                       );  

                       echo form_input($data_lname);  
                       echo "<div style = 'color:red'>".form_error('lname')."</div>";


                echo '</div>
                  </div>';

                echo '</div>';  
               
               #email
               echo '<div class="form-label-group" style="margin-bottom: 20px;">';

                    $data_email = array(
                        'name' => 'email',
                        'id' => 'email_id',
                        'class' => 'form-control', 
                        'placeholder' => 'Email'
                    );

                    echo form_input($data_email);
                    echo "<div style = 'color:red'>".form_error('email')."</div>";

               echo '</div>';

               #password
               echo '<div class="form-label-group" style="margin-bottom: 20px;">';

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
               
               #submit-cancel
               echo '<div class="row">';
                 #submit
                 echo '<div class="col-sm-6">';
                      echo form_submit('submit', 'Sign Up', "class='btn btn-lg btn-primary btn-block', style='margin: 40px auto'");                     
                 echo '</div>';

                 #cancel
                 echo '<div class="col-sm-6">';
                      echo '<a class="btn btn-lg btn-warning btn-block" style="margin: 40px auto;" href="http://localhost/CI/Group_project/">Cancel</a>';
                 echo '</div>';

                
               echo '</div>';
           ?>
           <?php echo form_close(); ?>

          </div>
          <div class="col-xs-3"></div>
      </div>

     

  </body>

</html>
