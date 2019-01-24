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

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

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

          <!-- Search query -->
<?php 
    if(isset($_GET['q']) && $_GET['q'] !== ' '){
      $searchq = $_GET['q'];
      
      $q = mysqli_query($connect, "SELECT * FROM retete WHERE nume_reteta LIKE '%$searchq%' OR descriere LIKE '%$searchq%'") or die(mysqli_error());
      $c = mysqli_num_rows($q);
      if($c == 0){
        echo '<h1>No search results for </h1><b>"' . $searchq . '"</b>';
      } else {
         echo "<h1>Rezultatele cautarii sunt: </h1>";
        while($row = mysqli_fetch_array($q)){
          echo 
          "<div class='squery reteta flex '>".
          
          '<div>'.
          '<img class="imagine-reteta-lista" src="data:image/jpeg;base64,'.base64_encode($row['poza'] ).'" class="img-thumnail float-left"  />'.
          '</div>'.
          '<div>'.
          '<h1>'.$row["nume_reteta"]."</h1>"."<p>Descriere: ".$row["descriere"]."</p>".
          "<p>"."<i class='fas fa-clock'></i>Timp preparare: "." ".$row["durata"]." Minute"."</p>".
          "<p>Ingrediente: ".$row["ingrediente"]."</p>".
          "<p>Categorie: ".$row["categorie"]."</p>".
          "<p>"."<i class='fas fa-utensils'></i> Portii: "." ".$row["portii"]." Portii"."</p>".
          '<form method="post" action="reteta-detaliu.php?id=' . $row['id'] . '">
                <button type="submit"class="btn btn-info">Read More</button>
           </form>'.
          '</div>'.
          "</div>";
        }
      }
    } 
   ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    </script>

  </body>

</html>