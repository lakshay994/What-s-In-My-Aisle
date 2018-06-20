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
        <li><a href="http://localhost/CI/Admin/index.php/admin/user">Users</a></li>
        <li class="active"><a href="http://localhost/CI/Admin/index.php/admin/location">Locations</a></li>
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
          <h2>Location Details</h2>
                                                                                                
          <div class="table-responsive centered text-center"">          
          <table class="table table-hover">
            <thead>
              <tr>
               
                <th>Location Id</th>
                <th>Location Name</th>
                <th>Action</th>
                
              </tr>
            </thead>
                <tbody>
                  <?php

                    foreach ($loc as $key => $value)
                     {
                      echo '<tr>';
                      echo '<td>'.$value['Location_Id'].'</td>';
                      echo '<td>'.$value['Location_Name'].'</td>';
                     
                  echo '<td><button class="btn btn-danger btn-sm" id='.$value['Location_Id'].'>
                          <span class="glyphicon glyphicon-trash"></span> Delete 
                          </button></td>';
                    echo '<td><a href="#" class="btn btn-info btn-sm" name='.$value['Location_Id'].'>
                          <span class="glyphicon glyphicon-edit"></span> Edit
                          </a></td>';
                    echo '</tr>';
                    }

                  ?>
                
                 </tbody>
              </table>
        </div>
              
            </div>



<!--Form data to add locations-->

<div class="col-sm-1"></div>
<div class="col-sm-3">
  
  
         <h2>Add/Edit Location</h2>
            
         <?php 
          if(isset($edit_location)){
            
              echo form_open('admin/edit_location_post');
            echo '<div class="form-group">';
            echo '<label for="exampleInputEmail1">';

            echo '<input type="hidden" name="location_id" value="'.$edit_location[0]['Location_Id'].'">';

            echo "Location Name";
            echo '</label>';
            $data_lname = array(
                          'name' => 'location',
                          'id' => 'l_id',
                          'class' => 'form-control',
                          'placeholder' => 'Enter Location Name',
                          'value' => $edit_location[0]['Location_Name']
                          );
            echo form_input($data_lname);
             echo "<div style = 'color:red'>".form_error('location')."</div>";
               
           echo form_submit('submit', 'Update', "class='btn btn-sm btn-primary btn-block', style='margin: 40px auto'");   

            echo '<input type="button" class="btn btn-sm btn-default btn-block" value="cancel" id="btn_cancel"/>';

          }
         
          else{

            echo form_open('admin/add_location');
            echo '<div class="form-group">';
            echo '<label for="exampleInputEmail1">';
            echo "Location Name";
            echo '</label>';
            $data_lname = array(
                          'name' => 'location',
                          'id' => 'l_id',
                          'class' => 'form-control',
                          'placeholder' => 'Enter Location Name'
                          );
            echo form_input($data_lname);
             echo "<div style = 'color:red'>".form_error('location')."</div>";  
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
                  if(confirm('Please click ok if you want to remove location, associated aisle, and items')){
                     window.location = "http://localhost/CI/Admin/index.php/admin/delete_location?id="+selText;
                  }  

               
           });

             $("td a").click(function()
            {
                 var selText = $(this).attr('name');
                 
                window.location = "http://localhost/CI/Admin/index.php/admin/edit_location?id="+selText; 
                
                     
           });


           $("#btn_cancel").click(function()
            {
              
              window.location = "http://localhost/CI/Admin/index.php/admin/location";
                     
           });
 
        });


      


    </script>
</html>
              



