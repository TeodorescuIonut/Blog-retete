<html>
<body>
		
<form method="GET" action=" " >
 <input type="file" name="img">
 <input type="submit" name="display_image" value="Display">
</form>

</body>
</html>


<?php

$getname = $_GET['img'];

echo "< img src = fetch_image.php?name=".$getname." width=200 height=200 >";

?>