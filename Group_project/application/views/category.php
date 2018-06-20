
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
       
           echo '<li><a href="http://localhost/CI/Group_Project/index.php/user/home">Home</a></li>';
        

          foreach ($categories as $key => $value) {
            
            if($page == $value['Category_Name']){
              echo '<li class="active">';

            }


            else{
              echo '<li>';
              }


            
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
      
      <div class="row">
       

        
        <div class="col-sm-6">
          <div class="dropdown" >
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%;">
                Select location...
                <span class="caret"></span>
              </button>
              
                <!-- < select name="location" >   -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" name="drop" >

                  <?php
                    foreach ($locations as $key => $value) {
                      echo '<li><a href="#">'.$value['Location_Name'].'</a></li>';
                    }
                  ?>
                </ul>
            
            </div>
        </div>


        <?php
          echo form_open('user/post_data');
            
              /*$data_search = array(
                        'name' => 'loc',
                        'id' => 'loc_id',
                        'class' => 'form-control',
                        
                        );  
               //echo form_input($data_search);
           //echo form_hidden($data_search);*/
          echo '<input type="hidden" name="loc" id="loc_id">';
                  

          #Form to Post the data for the search
           //echo form_open('user/search_post');
           echo '<div class="col-sm-6">';
           echo ' <div class="input-group">';
           $data_search = array(
                        'name' => 'search',
                        'id' => 'search_id',
                        'class' => 'form-control',
                        'placeholder' => 'Search For'

                        );  

           echo form_input($data_search);
           echo ' <span class="input-group-btn">';
           echo form_submit('button', 'search', "class='btn btn-default'");
          // echo form_close();
           echo '</span></button>';
           echo '</span>';
           echo '</div></div></div></div>';
          // echo form_submit('button', 'post');

           echo '<input type="submit" name="submit" hidden="hidden">';
?>


       
    <div class="container" style="margin-top: 40px;">
      <div class="row">
        
         <?php 

                     foreach($item_details as $key=>$value)
                        {

                        echo '<div><div class="col-sm-6 col-md-3"><div class="thumbnail">';

                        echo '<img class="img-responsive img-thumbnail" style="width: 100%; height: 210px;" src="data:image/jpeg;base64,'.base64_encode( $value['Item_Image'] ).'"/>';

                        echo '<div class="caption"><h3>'.$value['Item_Name'].'</h3>';
                        echo ' <p style="height: auto;">'.$value['Item_Description'].'</p>';
                        echo ' <span class="badge" style="font-size: 15px;">'.$value['Item_Price'].'</span>';
                        echo ' <span class="label label-primary" style="font-size: 15px;">'.$value['Aisle_Name'].'</span>';

                        echo '&nbsp;<span class="label label-success" style="font-size: 15px;">'.$value['Location_Name'].'</span>';

                        echo '</div></div></div></div>';

                        }
                  
        ?>    
                

      </div>
    </div>


  
    <div class="footer-copyright  text-center" style="background-color: #c3c3c3; padding: 10px; color: black; margin-top: 20px;">
        © 2018 Copyright:
        <a href="#"> What's in my Aisle? </a>
    </div>

    <script type="text/javascript">

    
        
      $('document').ready(function(){
          $('body .dropdown-menu li a').on('click', function (){
            
               var selText = $(this).text();
              
              $('#dropdownMenu1').html(selText+' <span class="caret"></span>');
               $('#loc_id').val(selText);

            });
             

        });

          



      
         
      
    </script>

  </body>
</html>