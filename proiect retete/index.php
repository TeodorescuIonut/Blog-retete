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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

  </head>

  <body>

   <?php include_once('navigation.php');  ?>

    <!-- Page Content -->
    <div class="hero">
      <div class="container">
      <div class="jumbotron">
        <h1 class="display-4">Retete culinare</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <form class="search-form" action="search.php" method="GET" id="searchFrom">
                <input class="form-control " id="searchBar"  type="search" name="q" placeholder="Search" aria-label="Search">
        </form>
      </div>
      </div>

    </div>


    <div class="container white-bg">  
        <div class="row">
          <div class="col-md-12">
          <?php  
                $query = "SELECT * FROM retete ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  

            echo "<div class='reteta flex'>".
            '<div>'.
            '<img class="imagine-reteta-lista" src="data:image/jpeg;base64,'.base64_encode($row['poza'] ).'" class="img-thumnail float-left"  />'.
            '</div>'.
            '<div>'.
            '<h1>'.$row["nume_reteta"]."</h1>"."<p><b>Descriere:</b> ".$row["descriere"]."</p>".
            "<p>"."<i class='fas fa-clock'></i><b>Timp preparare:</b> "." ".$row["durata"]." Minute"."</p>".
            "<p><b>Categorie:</b> ".$row["categorie"]."</p>".
            "<p>"."<i class='fas fa-utensils'></i> <b>Portii:</b> "." ".$row["portii"]." Portii"."</p>".
            '<div class="form-row align-items-center">'.
            '<form method="post" action="reteta-detaliu.php?id=' . $row['id'] . '">
                <button type="submit"class="btn btn-info">Read More</button>
             </form>'.
             '<form method="post" action="delete.php?del=' . $row['id'] . '">
                <button type="submit"class="delete btn btn-danger">Delete</button>
             </form>'.
             '</div>'.
            '</div>'.
            "</div>";
                } 
                mysqli_close($connect); 
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

