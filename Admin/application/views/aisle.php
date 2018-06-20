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
        <li><a href="http://localhost/CI/Admin/index.php/admin/location">Locations</a></li>
        <li class="active"><a href="http://localhost/CI/Admin/index.php/admin/aisle">Aisles</a></li> 
        <li><a href="http://localhost/CI/Admin/index.php/admin/category">Categories</a></li> 
        <li><a href="http://localhost/CI/Admin/index.php/admin/item">Items</a></li> 
        
      </ul>
      <ul class="nav navbar-nav navbar-right">   
        <li><a href="http://localhost/CI/Admin/index.php/admin/"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  </nav>





  <div class="container">
  <div class="row">
    
    <div class=" col-sm-8 centered text-center"">
          <h2>Aisle Details</h2>
                                                                                                
          <div class="table-responsive centered text-center" style="height: 400px;">          
          <table class="table table-hover">
    <thead>
      <tr>
       
        <th>Aisle Id</th>
        <th>Aisle Name</th>
        <th>Location Id</th>
        <th>Location Name</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
      <?php

        foreach ($aisle as $key => $value)
         {
          echo '<tr>';
          echo '<td>'.$value['Aisle_Id'].'</td>';
          echo '<td>'.$value['Aisle_Name'].'</td>';
          echo '<td>'.$value['Location_Id'].'</td>';
          echo '<td>'.$value['Location_Name'].'</td>';
          
        echo '<td><button class="btn btn-danger btn-sm" id='.$value['Aisle_Id'].'>
              <span class="glyphicon glyphicon-trash"></span> Delete 
              </button></td>';
        echo '<td><a class="btn btn-info btn-sm" name='.$value['Aisle_Id'].'>
              <span class="glyphicon glyphicon-edit"></span> Edit
              </a></td>';

        echo '</tr>';
        }

      ?>
    
    </tbody>
  </table>
  </div>
              
</div>



<!--Form data to add users-->

<div class="col-sm-1"></div>
<div class="col-sm-3">
  
  
  
         <h2>Add/Edit aisle</h2>

         <?php 

         if(isset($edit_aisle)){

            echo form_open('admin/add_aisle_post');
              echo '<div class="form-group">';
              echo '<label for="exampleInputEmail1">';

               echo '<input type="hidden" name="aisle_id" value="'.$edit_aisle[0]['Aisle_Id'].'">';
              
              echo "Aisle Name";
              echo '</label>';
              $data_aname = array(
                            'name' => 'aname',
                            'id' => 'a_id',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Aisle Name',
                            'value' => $edit_aisle[0]['Aisle_Name']
                            );
              echo form_input($data_aname);
              echo "<div style = 'color:red'>".form_error('aname')."</div>";

              echo '<br/>';
              echo '<label for="exampleInputEmail1">';
              echo "Location Name";
              echo '</label>';
              echo '<div class="dropdown form-group">';
              echo '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%;">';
              echo $edit_aisle[0]['Location_Name'];
              echo'<span class="caret"></span>
              </button>';
              
              
               echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" name="drop">';

                  
                    foreach ($locations as $key => $value) {
                      echo '<li><a href="#">'.$value['Location_Name'].'</a></li>';
                    }
                  
                echo '</ul>';
            
            echo '</div>';

            echo "<div style = 'color:red'>".form_error('location_name')."</div>";

            echo '<input type="hidden" value="'.$edit_aisle[0]['Location_Name'].'" name = location_name id="location_id">';

             echo form_submit('submit', 'Update', "class='btn btn-sm btn-primary btn-block', style='margin: 40px auto'");                     
                                
             echo '<input type="button" class="btn btn-sm btn-default btn-block" value="cancel" id="btn_cancel"/>';


         }
         else{
          
              echo form_open('admin/add_aisle');
              echo '<div class="form-group">';
              echo '<label for="exampleInputEmail1">';
              echo "Aisle Name";
              echo '</label>';
              $data_aname = array(
                            'name' => 'aname',
                            'id' => 'a_id',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Aisle Name'
                            );
              echo form_input($data_aname);
              echo "<div style = 'color:red'>".form_error('aname')."</div>";

              echo '<br/>';
              echo '<label for="exampleInputEmail1">';
              echo "Location Name";
              echo '</label>';
              echo '<div class="dropdown form-group">';
              echo '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%;">
                Select location...
                <span class="caret"></span>
              </button>';
              
              
               echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" name="drop">';

                  
                    foreach ($locations as $key => $value) {
                      echo '<li><a href="#">'.$value['Location_Name'].'</a></li>';
                    }
                  
                echo '</ul>';
            
            echo '</div>';

            echo "<div style = 'color:red'>".form_error('location_name')."</div>";

            echo '<input type="hidden" value="" name = location_name id="location_id">';

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
                  
                  if(confirm('Please click ok if you want to remove  aisle and associated items')){
                     window.location = "http://localhost/CI/Admin/index.php/admin/delete_aisle?id="+selText;

                  }  

             
            });

          $('body .dropdown-menu li a').on('click', function (){
            
               var selText = $(this).text();
              
              $('#dropdownMenu1').html(selText+' <span class="caret"></span>');
               $('#location_id').val(selText);

            });

           $("td a").click(function()
            {
                 var selText = $(this).attr('name');
                 
                window.location = "http://localhost/CI/Admin/index.php/admin/edit_aisle?id="+selText; 
                
                     
           });

           $("#btn_cancel").click(function()
            {
              
              window.location = "http://localhost/CI/Admin/index.php/admin/aisle";
                     
           });
 
 
         });
      

      

    </script>

</html>


