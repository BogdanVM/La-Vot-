<html>
<head>
  <title>La Vot!</title>
 </head>
<link href="Design.css" rel="stylesheet" type="text/css">
<body>
     
    <div id="Ani">
       <?php
       
          $con = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link)); 
        $query = "SELECT * FROM Trecut";
        $result = mysqli_query($con, $query);
         while( $row = mysqli_fetch_assoc($result))
        {
            ?>
            <form action="Tabel_Rezultate.php" method="post">
            <input type="submit" name="<?php echo $row['An'] ?>" id="anRez" value="<?php echo $row['An'] ?>">
            </form>
            <?php
               $year = $row['An'];
               while($row['An'] == $year)
               {
                  $row = mysqli_fetch_assoc($result);
               }
        }
        
       ?>
    </div>
   
</body>
</html>
