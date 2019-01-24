<?php
$connect = mysqli_connect("localhost", "root", "", "retete_db");
if (isset($_POST["insert"])) {
    $lastName     = $_POST["Nume_reteta"];
    $descriere    = $_POST["descriere"];
    $timp         = $_POST["timp"];
    $ingrediente  = $_POST["ingrediente"];
    $instructiuni = $_POST["instructiuni"];
    $categorie    = $_POST["categorie"];
    $numar_portii = $_POST["numar_portii"];
    $file         = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query        = "INSERT INTO retete(poza,nume_reteta,descriere,durata,ingrediente,instructiuni,categorie,portii) VALUES ('$file','$lastName','$descriere','$timp','$ingrediente','$instructiuni','$categorie','$numar_portii')";
    if (mysqli_query($connect, $query)) {
        echo '<script>alert("Image Inserted into Database")</script>';
    } else {
        echo '<script>alert("Please insert all the fields")</script>';
    }
    header("Location: index.php");
}
?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Adauga retete</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
          
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
           <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
           <meta name="description" content="">
           <meta name="author" content=""> 
            <link rel="stylesheet" type="text/css" href="style.css"> 
      </head>  
      <body>  
             <?php
include_once('navigation.php');
?>
    <div class="hero">
      <div class="container">
        <div class="jumbotron">
          <h1 class="display-4 text-center">Adauga reteta</h1>
        </div>
      </div>
    </div>
         
    <div class="container white-bg">   
        <div class="row">
          <div class="col-md-12">
                
                <form class="narrow" action="recipe.php" method="post" enctype="multipart/form-data">
					<div class="form-group col-md-4 mb-3">
		    			<label for="validationCustom01">Nume reteta:</label>
		    			<input type="text" class="form-control" id="validationCustom01"  name="Nume_reteta" required>
	 				</div>
					<div class="form-group col-md-12 mb-3">
					    <label for="exampleFormControlTextarea1">Descriere:</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descriere" required></textarea>
					</div>
					<div class="form-group col-md-4 mb-3">
		    			<label for="validationCustom01">Timp preparare (min):</label>
		    			<input type="number" class="form-control" id="validationCustom01"  name="timp" required>
	 				</div>
	 				<div class="form-group col-md-12 mb-3">
					    <label for="exampleFormControlTextarea1">Ingrediente:</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ingrediente" required></textarea>
					</div>
					<div class="form-group col-md-12 mb-3">
					    <label for="exampleFormControlTextarea1">Instructiuni:</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="instructiuni" required></textarea>
					</div>
					<div class="form-group col-md-4 mb-3">
		    			<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Categorie:</label>
						  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="categorie" required>
						    <option selected>Selecteaza...</option>
						    <option value="Chicken recipies" name="categorie">Chicken recipies</option>
                            <option value="Pork recipies" name="categorie">Pork recipies</option>
                            <option value="Fish recipies" name="categorie">Fish recipies</option>
                            <option value="Vegan recepies" name="categorie">Vegan recepies</option>
						  </select>
						  	<div class="invalid-feedback">Example invalid custom select feedback</div>
	 				</div>
	 				<div class="form-group col-md-4 mb-3">
		    			<label for="validationCustom01">Numar portii:</label>
		    			<input type="number" class="form-control" id="validationCustom01"  name="numar_portii" required>
	 				</div>
	 				  <div class="form-group col-md-12 mb-3">
					  <div class="custom-file">
  						<input type="file" class="custom-file-input" name="image" id="image" required>
  						<label class="custom-file-label" for="customFile">Choose file</label>
					  </div>
					</div>
					<form class="form-group col-md-4 mb-3 text-center" action="recipe-added.php">
					<button type="submit" class="text-center btn btn-info" name="insert" id="insert" value="Insert">Submit</button>
				  	</form>
				</form> 
                </div>   
                </div>  
           </div>           
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 }); 
 </script>
 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    </script>  

