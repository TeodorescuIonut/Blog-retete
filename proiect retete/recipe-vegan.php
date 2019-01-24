
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
    <title>Vegan recipes</title>

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
    <div class="hero-vegan">
      <div class="container">
      <div class="jumbotron ">
        <h1 class="display-4">Retete vegane</h1>
      </div>
      </div>
    </div>

<div class="container white-bg">   
        <div class="row">
          <div class="col-md-12">
          <?php  
                $query = "SELECT * FROM retete WHERE categorie ='Vegan recepies' ";  
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
            '<form method="post" action="reteta-detaliu.php?id=' . $row['id'] . '">
                <button type="submit"class="btn btn-info">Read More</button>
             </form>'.
            '</div>'.
            "</div>";
                } 
                mysqli_close($connect); 
                ?>  
          </div>
        </div>
    </div>

</body>
   <!-- Bootstrap core JavaScript -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    </script>

</html>