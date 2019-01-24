<?php


    $connect = mysqli_connect("localhost", "root", "", "retete_db"); 
    
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Flavours</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    </style>
  </head>
  <body>

   <?php include_once('navigation.php');  ?>
   <div class="container white-bg">   
        <div class="row">
          <div class="col-md-12">
           
        <?php  
                $id=$_GET['id']; 
                $id = mysqli_real_escape_string($connect,$id);
                $query = "SELECT * FROM `retete` WHERE `id`='" . $id . "'";
                $result = mysqli_query($connect,$query);

                while($row = mysqli_fetch_object( $result )) {
            echo 
            '<h1 class="title-detaliu">'.$row->nume_reteta."</h1>".
            '<div class="col-md-12">'. '<img class=" img-fluid rounded mx-auto d-block" alt="Responsive image" src="data:image/jpeg;base64,'.base64_encode($row->poza).'" class="img-fluid"  />'.
            '</div>'.
            "<div class='reteta flex'>".
            '<div class="detaliu">'.
            
            "<h4>Descriere:</h4>".
            "<p>".$row->descriere."</p>".
            "<h4>Timp preparare:</h4>".
            "<p >"."<i class='fas fa-clock'></i> "." ".$row->durata." Minute"."</p>".
            "<h4>Ingrediente:</h4>".
            "<p> ".$row->ingrediente."</p>".
            "<h4>Instructiuni:</h4>".
            "<p> ".$row->instructiuni."</p>".
            "<h4>Categorie: </h4>".
            "<p>".$row->categorie."</p>".
            "<h4>Portii: </h4>".
            "<p>"."<i class='fas fa-utensils'></i>"." ".$row->portii." Portii"."</p>".
            '<form class="text-center back" method="POST" action="index.php">
                            <button type="submit" class="btn btn-info">Back</button>
                         </form>'.
            '</div>'.
            
            "</div>";
             mysqli_close($connect);
                } 
                ?> 
            
             
          </div>
        </div>
    </div>


   <!-- Bootstrap core JavaScript -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    </script>




  </body>
</html>
