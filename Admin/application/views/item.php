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
        <li ><a href="http://localhost/CI/Admin/index.php/admin/aisle">Aisles</a></li> 
        <li><a href="http://localhost/CI/Admin/index.php/admin/category">Categories</a></li> 
        <li class="active"><a href="http://localhost/CI/Admin/index.php/admin/item">Items</a></li> 
        
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
          <h2>Item Details</h2>
                                                                                                
          <div class="table-responsive centered text-center" style="height: 800px;">          
          <table class="table table-hover">
            <thead>
              <tr>
               
                <th>Item Id</th>
                <th>Item Name</th>
                <th>Item Image</th>
                <th>Item Description</th>
                <th>Item Price</th>
                
                <th>Action</th>
                
              </tr>
            </thead>
    <tbody>
      <?php

        foreach ($item as $key => $value)
         {

          $id = $value['Item_Id'];

          echo '<tr>';
          echo '<td>'.$value['Item_Id'].'</td>';
          echo '<td>'.$value['Item_Name'].'</td>';
         echo '<td>'; 
          echo '<img class="img-responsive img-thumbnail" style="width: 70%; height: 140px;" src="data:image/jpeg;base64,'.base64_encode( $value['Item_Image'] ).'"/>';
         echo '</td>';
          echo '<td>'.$value['Item_Description'].'</td>';
          echo '<td>'.$value['Item_Price'].'</td>';
          
         
        echo '<td><button class="btn btn-danger btn-sm" id='.$value['Item_Id'].'>
              <span class="glyphicon glyphicon-trash"></span> Delete 
              </button></td>';
        echo '<td><a href="#" class="btn btn-info btn-sm" name='.$value['Item_Id'].'>
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
  

         <h2>Add/Edit Item</h2>

         <?php 

         if(isset($edit_item)){

          $attributes = array('enctype' => 'multipart/form-data');
                  echo form_open_multipart('admin/add_items_post',$attributes);
                  echo '<div class="form-group">';

                   echo '<input type="hidden" name="item_id" value="'.$edit_item[0]['Item_Id'].'">';

                  echo '<label for="exampleInputEmail1">';
                  echo "Item Name";
                  echo '</label style="margin-top:20px;"><br/>';
                  $data_iname = array(
                                'name' => 'iname',
                                'id' => 'i_id',
                                'class' => 'form-control',
                                'placeholder' => 'Enter Item Name',
                                'value' => $edit_item[0]['Item_Name']
                                );
                  echo form_input($data_iname);
                  
                   echo "<div style = 'color:red'>".form_error('iname')."</div>";
                   echo '</div>';
                  echo '<br/>';

                  echo '<div class="form-group">';
                  echo '<label for="exampleInputEmail1">';
                  echo "Item Price";
                 echo '</label style="margin-top:20px;"><br/>';
                  $data_price = array(
                                'name' => 'pname',
                                'id' => 'p_id',
                                'class' => 'form-control',
                                'placeholder' => 'Enter Item Price',
                                'value' => $edit_item[0]['Item_Price']
                                );
                  echo form_input($data_price);
                 
                  echo "<div style = 'color:red'>".form_error('pname')."</div>";
                   echo '</div>';
                 echo '<br/>';

                  echo '<div class="form-group">';
                   echo '<label for="exampleInputEmail1">';
                  echo "Item Description";
                  echo '</label><br/>';
                  $data_decs = array(
                                   'name' => 'ides',
                                    'id' => 'c_exp_id',
                                    'rows' => '2', 
                                    'cols' => '30',
                                    'class' => 'form-control',
                                'placeholder' => 'Enter Item Description',
                                'value' => $edit_item[0]['Item_Description']                             
                                      );
                  echo form_textarea($data_decs);
                 
                   echo "<div style = 'color:red'>".form_error('ides')."</div>";
                    echo '</div>';
                 echo '<br/>';

                 echo '<label for="exampleInputEmail1">';
                echo "Category Type";
                echo '</label>';
                echo '<div class="dropdown form-group">';
                echo '<button class="btn btn-default dropdown-toggle" type="button" id="category_id_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%;">'.$edit_item[0]['Category_Name'] .'<span class="caret"></span>
                </button>';
                
                
                 echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" name="drop">';

                    
                      foreach ($categories as $key => $value) {
                        echo '<li><a class="cat_val">'.$value['Category_Name'].'</a></li>';
                      }
                    
                  echo '</ul>';

                  echo '<input type="hidden" id="category_id" name="category_id" value="'.$edit_item[0]['Category_Name'].'">';
                  echo "<div style = 'color:red'>".form_error('category_id')."</div>";
                  echo '</div>';


                 echo '<label for="exampleInputEmail1">';
                echo "Location Name";
                echo '</label>';
                echo '<div class="dropdown form-group">';
                echo '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%;">'.$edit_item[0]['Location_Name'].'<span class="caret"></span>
                </button>';
                
                
                 echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" name="drop">';

                    
                      foreach ($locations as $key => $value) {
                        echo '<li><a class="location_val">'.$value['Location_Name'].'</a></li>';
                      }
                    
                  echo '</ul>';

                  echo '<input type="hidden" id="location_id" name="location_id" value="'.$edit_item[0]['Location_Name'].'">';
                  echo "<div style = 'color:red'>".form_error('location_id')."</div>";
                  echo '</div>';


                echo '<label for="exampleInputEmail1">';
                echo "Aisle Name";
                echo '</label>';
                echo '<div class="dropdown form-group">';
                echo '<button class="btn btn-default dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%;" id="asile_name_text">'.$edit_item[0]['Aisle_Name'].' <span class="caret"></span>
                </button>';
                
                  echo '<ul class="dropdown-menu" id="update_aisle" aria-labelledby="dropdownMenu1" name="drop">';

                  echo '</ul>';
                 echo '<input type="hidden" id="aisle_id" name="aisle_id" value="'.$edit_item[0]['Aisle_Name'].'">';
                 echo "<div style = 'color:red'>".form_error('aisle_id')."</div>";
                  echo '</div>';

            

               echo '<div class="form-group">';
                echo '<label for="exampleInputEmail1">';
               echo "Item Image";
               
               echo '<input type="file" name="image">'; 
               echo "<div style = 'color:red'>".form_error('image')."</div>";
               echo '<br/>';
               echo '<img class="img-responsive img-thumbnail" style="width: 70%; height: 140px;" src="data:image/jpeg;base64,'.base64_encode( $edit_item[0]['Item_Image']).'"/>';
               echo '</div>';


               echo form_submit('submit', 'Update', "class='btn btn-sm btn-primary btn-block', style='margin: 40px auto'");    

                 echo '<input type="button" class="btn btn-sm btn-default btn-block" value="cancel" id="btn_cancel"/>';

         }
         else{

                $attributes = array('enctype' => 'multipart/form-data');
                  echo form_open_multipart('admin/add_items',$attributes);
                  echo '<div class="form-group">';
                  echo '<label for="exampleInputEmail1">';
                  echo "Item Name";
                  echo '</label style="margin-top:20px;"><br/>';
                  $data_iname = array(
                                'name' => 'iname',
                                'id' => 'i_id',
                                'class' => 'form-control',
                                'placeholder' => 'Enter Item Name'
                                );
                  echo form_input($data_iname);
                   echo "<div style = 'color:red'>".form_error('iname')."</div>";
                    echo '</div>';
                  echo '<br/>';

                  echo '<div class="form-group">';
                  echo '<label for="exampleInputEmail1">';
                  echo "Item Price";
                 echo '</label style="margin-top:20px;"><br/>';
                  $data_price = array(
                                'name' => 'pname',
                                'id' => 'p_id',
                                'class' => 'form-control',
                                'placeholder' => 'Enter Item Price'
                                );
                  echo form_input($data_price);
                  echo "<div style = 'color:red'>".form_error('pname')."</div>";
                   echo '</div>';
                 echo '<br/>';

                  echo '<div class="form-group">';
                   echo '<label for="exampleInputEmail1">';
                  echo "Item Description";
                  echo '</label><br/>';
                  $data_decs = array(
                                   'name' => 'ides',
                                    'id' => 'c_exp_id',
                                    'rows' => '2', 
                                    'cols' => '30',
                                    'class' => 'form-control',
                                'placeholder' => 'Enter Item Description'                             
                                      );
                  echo form_textarea($data_decs);
                   echo "<div style = 'color:red'>".form_error('ides')."</div>";
                    echo '</div>';
                 echo '<br/>';

                 echo '<label for="exampleInputEmail1">';
                echo "Category Type";
                echo '</label>';
                echo '<div class="dropdown form-group">';
                echo '<button class="btn btn-default dropdown-toggle" type="button" id="category_id_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%;"> Select location...<span class="caret"></span>
                </button>';
                
                
                 echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" name="drop">';

                    
                      foreach ($categories as $key => $value) {
                        echo '<li><a class="cat_val">'.$value['Category_Name'].'</a></li>';
                      }
                    
                  echo '</ul>';

                  echo '<input type="hidden" id="category_id" name="category_id" value="">';
                  echo "<div style = 'color:red'>".form_error('category_id')."</div>";
                  echo '</div>';


                 echo '<label for="exampleInputEmail1">';
                echo "Location Name";
                echo '</label>';
                echo '<div class="dropdown form-group">';
                echo '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%;"> Select location...<span class="caret"></span>
                </button>';
                
                
                 echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" name="drop">';

                    
                      foreach ($locations as $key => $value) {
                        echo '<li><a class="location_val">'.$value['Location_Name'].'</a></li>';
                      }
                    
                  echo '</ul>';

                  echo '<input type="hidden" id="location_id" name="location_id" value="">';
                  echo "<div style = 'color:red'>".form_error('location_id')."</div>";
                  echo '</div>';


                   echo '<label for="exampleInputEmail1">';
                echo "Aisle Name";
                echo '</label>';

                echo '<div class="dropdown form-group">';
                echo '<button class="btn btn-default dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%;" id="asile_name_text"> Select Aisle...<span class="caret"></span>
                </button>';
                
                  echo '<ul class="dropdown-menu" id="update_aisle" aria-labelledby="dropdownMenu1" name="drop">';

                  echo '</ul>';
                 echo '<input type="hidden" id="aisle_id" name="aisle_id" value="">';
                 echo "<div style = 'color:red'>".form_error('aisle_id')."</div>";
                  echo '</div>';

            

               echo '<div class="form-group">';
                echo '<label for="exampleInputEmail1">';
               echo "Item Image";
               
               echo '<input type="file" name="image">'; 
               echo "<div style = 'color:red'>".form_error('image')."</div>";
                echo '</div>';


               echo form_submit('submit', 'Add', "class='btn btn-sm btn-primary btn-block', style='margin: 40px auto'");    

         }

         ?>
  
            
            
  
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
                 if(confirm('Please click ok if you want to remove item')){
                      window.location = "http://localhost/CI/Admin/index.php/admin/delete_item?id="+selText;
                  } 
                 

               
           });

             $('body').on('click','.location_val' ,function (){
            
               var selText = $(this).text();
              
              $('#dropdownMenu1').html(selText+' <span class="caret"></span>');

               $('#location_id').val(selText);

               $('#update_aisle').html("");

               var datastring = 'location=' + selText;

               var str="";

               $.ajax({

                  type:'POST',
                  url:'http://localhost/CI/Admin/index.php/admin/update_aisle_dropdown',
                  data: datastring,
                  dataType: 'json',
                  success: function(rows){

                       $.each(rows,function(index,item){       

                        str += "<li><a class='aisle_name'>"+ item.Aisle_Name +"</a></li>";

                       });
                      
                       $('#update_aisle').append(str);
                  }

               }); 

               
             

            });

            $('body').on('click', '.aisle_name', function (){
            
              var selText = $(this).text();
             

              $('#asile_name_text').html(selText+' <span class="caret"></span>');

                 $('#aisle_id').val(selText);

                

            });

            $('body').on('click', '.cat_val', function (){
            
              var selText = $(this).text();
             

              $('#category_id_dropdown').html(selText+' <span class="caret"></span>');

                 $('#category_id').val(selText);

                

            });

             $("td a").click(function()
            {
                 var selText = $(this).attr('name');
                 
                window.location = "http://localhost/CI/Admin/index.php/admin/edit_item?id="+selText; 
                
                     
           });

        $("#btn_cancel").click(function()
            {
              
              window.location = "http://localhost/CI/Admin/index.php/admin/item";
                     
           });
            
 
      });
          

    </script>
</html>
              
    

