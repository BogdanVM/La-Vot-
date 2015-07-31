<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="refresh" content="3;url=index.php">
   <title>La Vot!</title>

</head>
<style>
   body{
        background-image: url("siteBackground.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        
}
</style>

<link href="Design.css" rel="stylesheet" type="text/css">

<body>
        <img src="tick.png" style="width: 100px; height: 100px; position: fixed; top: 43%; left: 10%;"/>
        <label style="font-family: Purisa; font-size: 36px; color: green; position: fixed; top: 50%; left: 20%;"> Votul dumneavoastr&#259; a fost &#238;nregistrat! </label>
  <?php
          
          $_SESSION['Votat'] = true;
          if (isset($_POST['vot_nul'])){
                 $conn = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link));
                   $msql = "DELETE FROM Conturi WHERE Nume = ? AND Parola = ?";
                   $state = mysqli_prepare($conn, $msql);
                   mysqli_stmt_bind_param($state, "ss", $_SESSION['Nume'], $_SESSION['parola']);
                   mysqli_stmt_execute($state);
                   mysqli_close($conn);
                    
          }
          else{     
               $con = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link)); 
               $query = "SELECT * FROM Candidati";
                $res = mysqli_query($con, $query);
              $id = 1;
              while($row = mysqli_fetch_assoc($res)){
              if (isset($_POST[$id])) {
                   $nr_vot = $row['Voturi'] + 1;
                   $nume = $row['Nume'];
                   
                   $qer = "UPDATE Candidati SET Voturi = ? WHERE Nume = ?";
                   $stmt = mysqli_prepare($con, $qer);
                   mysqli_stmt_bind_param($stmt, "is", $nr_vot, $nume);
                   mysqli_stmt_execute($stmt);
                   
                   $msql = "DELETE FROM Conturi WHERE Nume = ? AND Parola = ?";
                   $state = mysqli_prepare($con, $msql);
                   mysqli_stmt_bind_param($state, "ss", $_SESSION['Nume'], $_SESSION['parola']);
                   mysqli_stmt_execute($state);
                   mysqli_close($con);
                    
              }
            $id = $id + 1;
             }
          }
        
   ?>
 
</body>
</html>
