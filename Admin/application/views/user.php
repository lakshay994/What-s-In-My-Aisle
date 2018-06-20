<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>What's in my aisle?</title>

    
    <!-- Custom styles for this template -->
   
    <link href="http://localhost/CI/Admin/css/style.css" rel="stylesheet">


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
      <ul class="nav navbar-nav">
        <li><a href="http://localhost/CI/Admin/index.php/admin/home">Home</a></li>
        <li class="active"><a href="http://localhost/CI/Admin/index.php/admin/user">Users</a></li>
        <li><a href="http://localhost/CI/Admin/index.php/admin/location">Locations</a></li>
        <li><a href="http://localhost/CI/Admin/index.php/admin/aisle">Aisles</a></li> 
        <li><a href="http://localhost/CI/Admin/index.php/admin/category">Categories</a></li> 
        <li><a href="http://localhost/CI/Admin/index.php/admin/item">Items</a></li> 
        
      </ul>
      <ul class="nav navbar-nav navbar-right">   
        <li><a href="http://localhost/CI/Admin/index.php/admin/"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
 


<div class="container">
  <div class="row">
    
    <div class=" col-sm-8 centered text-center"">
          <h2>User Details</h2>
                                                                                                
          <div class="table-responsive centered text-center"">          
          <table class="table table-hover">
            <thead>
              <tr>
               
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email Id</th>
                <th>Password</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
              <?php

                foreach ($user as $key => $value)
                 {
                  echo '<tr>';
                  echo '<td>'.$value['Fname'].'</td>';
                  echo '<td>'.$value['Lname'].'</td>';
                  echo '<td>'.$value['Email'].'</td>';
                  echo '<td>'.$value['Password'].'</td>';
                  
                 echo '<td><button class="btn btn-danger btn-sm" id='.$value['Email'].'>
                      <span class="glyphicon glyphicon-trash"></span> Delete 
                      </button></td>';
                echo '<td><a href="#" class="btn btn-info btn-sm" name='.$value['Email'].'>
                      <span class="glyphicon glyphicon-edit"></span> Edit
                      </a></td>';
                echo '</tr>';
                }

              ?>
            
            </tbody>
          </table>
          </div>

          
                   
</div>

<!--Add button-->
<div class="col-sm-1"></div>
<div class="col-sm-3">
  


<div id="add_user">

         <h2>Add/Edit user</h2>
  
          <?php

          if(isset($edit_user)){

            echo form_open('admin/edit_user_post');
                echo '<div class="form-group">';
                echo '<label for="exampleInputEmail1">';
                echo "First Name";
                echo '</label style="margin-top:20px;"><br/>';
                $data_fname = array(
                              'name' => 'fname',
                              'id' => 'f_id',
                              'class' => 'form-control',
                              'placeholder' => 'Enter First Name',
                              'value' => $edit_user[0]['Fname']
                              );
                echo form_input($data_fname);
                echo "<div style = 'color:red'>".form_error('fname')."</div>"; 
                 echo '</div>';  
                echo '<br/>';

                echo '<div class="form-group">';
                echo '<label for="exampleInputEmail1">';
                echo "Last Name";
               echo '</label style="margin-top:20px;"><br/>';
                $data_lname = array(
                              'name' => 'lname',
                              'id' => 'l_id',
                              'class' => 'form-control',
                              'placeholder' => 'Enter Last Name',
                              'value' => $edit_user[0]['Lname']
                              );
                echo form_input($data_lname);
                 echo "<div style = 'color:red'>".form_error('lname')."</div>"; 
                  echo '</div>';  
                 echo '<br/>';

                echo '<div class="form-group">';
                 echo '<label for="exampleInputEmail1">';
                echo "Email Id";
                echo '</label><br/>';
                $data_email = array(
                                 'name' => 'email',
                                  'id' => 'email_id',
                                  'class' => 'form-control', 
                                   'placeholder' => 'Enter Email',
                                   'readonly' => 'readonly',
                                   'value' => $edit_user[0]['Email']
                                      );
               echo form_input($data_email);
                echo "<div style = 'color:red'>".form_error('email')."</div>";   
                 echo '</div>';
                echo '<br/>';

              echo '<div class="form-group">';
                 echo '<label for="exampleInputEmail1">';
                echo "Password ";
                echo '</label><br/>';
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
              



               echo form_submit('submit', 'Update', "class='btn btn-sm btn-primary btn-block', style='margin: 40px auto'");  

               echo '<input type="button" class="btn btn-sm btn-default btn-block" value="cancel" id="btn_cancel"/>';

          }
          else{

                echo form_open('admin/add_user');
                echo '<div class="form-group">';
                echo '<label for="exampleInputEmail1">';
                echo "First Name";
                echo '</label style="margin-top:20px;"><br/>';
                $data_fname = array(
                              'name' => 'fname',
                              'id' => 'f_id',
                              'class' => 'form-control',
                              'placeholder' => 'Enter First Name'
                              );
                echo form_input($data_fname);
                echo "<div style = 'color:red'>".form_error('fname')."</div>"; 
                 echo '</div>';  
                echo '<br/>';

                echo '<div class="form-group">';
                echo '<label for="exampleInputEmail1">';
                echo "Last Name";
               echo '</label style="margin-top:20px;"><br/>';
                $data_lname = array(
                              'name' => 'lname',
                              'id' => 'l_id',
                              'class' => 'form-control',
                              'placeholder' => 'Enter Last Name'
                              );
                echo form_input($data_lname);
                 echo "<div style = 'color:red'>".form_error('lname')."</div>";  
                  echo '</div>'; 
                 echo '<br/>';

                echo '<div class="form-group">';
                 echo '<label for="exampleInputEmail1">';
                echo "Email Id";
                echo '</label><br/>';
                $data_email = array(
                                 'name' => 'email',
                                  'id' => 'email_id',
                                  'class' => 'form-control', 
                                   'placeholder' => 'Enter Email'
                                      );
               echo form_input($data_email);
                echo "<div style = 'color:red'>".form_error('email')."</div>";  
                 echo '</div>'; 
                echo '<br/>';

              echo '<div class="form-group">';
                 echo '<label for="exampleInputEmail1">';
                echo "Password ";
                echo '</label><br/>';
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



               echo form_submit('submit', 'Add', "class='btn btn-sm btn-primary btn-block', style='margin: 40px auto'");  

          }
          
          ?>
           
</div>
</div>
</div>
</div>




<div class="footer-copyright  text-center" style="background-color: #c3c3c3; padding: 10px; color: black; margin-top: 20px;">
        © 2018 Copyright:
        <a href="#"> What's in my Aisle? </a>
</div>
 
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
      
          $(document).ready(function() {

            $("tbody td button ").click(function()
            {
                  var selText = $(this).attr('id');
                  if(confirm('Please click ok if you want to remove: ' + selText)){
                     window.location = "http://localhost/CI/Admin/index.php/admin/delete_user?id="+selText;
                  }            
     
           });
 
           $("td a").click(function()
            {
                 var selText = $(this).attr('name');
                   
                window.location = "http://localhost/CI/Admin/index.php/admin/edit_user?id="+selText;
                     
           });

           $("#btn_cancel").click(function()
            {
              
              window.location = "http://localhost/CI/Admin/index.php/admin/user";
                     
           });

          });

    

           


    </script>
</html>
              
    


