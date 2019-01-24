<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Lista retete</h1>
<!-- <table>	
<tr>	
		<th>Nume reteta</th>
		<th>Descriere reteta</th>
		<th>durata</th>
		<th>ingrediente</th>
		<th>ingrediente</th>
		<th>categorie</th>
		<th>Numar Portii</th>
		<?php 	
				if(!empty($_GET['id'])){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbName = "retete_db";

			$conn = new mysqli($servername,$username,$password,$dbName);

			if($conn->connect_error){
				die("connection failed".$conn->connect_error);
			}

			$query = mysqli_query($conn, "select * from retete");
			while ($row= mysqli_fetch_array($query)	) {
				echo "<tr>";
				echo "<td>".$row["nume_reteta"]."</td>";
				echo "<td>".$row["descriere"]."</td>";
				echo "<td>".$row["durata"]."</td>";
				echo "<td>".$row["ingrediente"]."</td>";
				echo "<td>".$row["ingrediente"]."</td>";
				echo "<td>".$row["categorie"]."</td>";
				echo "<td>".$row["portii"]."</td>";
				echo "</tr>";
			}
			   //Get image data from database
    		$result = $conn->query("SELECT poza FROM retete WHERE id = {$_GET['id']}");
    
    		if($result->num_rows > 0){
        		$imgData = $result->fetch_assoc();
        
        //Render image
        		header("Content-type: image/jpg"); 
        		echo $imgData['img']; 
    			}else{
        		echo 'Image not found...';
        mysqli_close($conn);

    }}

			
		 ?>
</table> -->

<?php
if(!empty($_GET['id'])){
    //DB details
    $dbHost     = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName     = 'retete_db';
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    //Check connection
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Get image data from database
    $result = $db->query("SELECT poza FROM retete WHERE id = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
        echo 'Image not found...';
    }
}
?>
</body>
</html>