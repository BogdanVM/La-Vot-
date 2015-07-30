<html>
<head><title>La Vot!</title></head>
<body>

<?php

      function RandomString() {
          $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $charLength = strlen($chars);
          $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                 $randomString .= $chars[rand(0, $charLength - 1)];
            }
          return $randomString;
           }
     
     $con = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link)); 
     $query = "SELECT * FROM Candidati";
     $result = mysqli_query($con, $query);
     $row = mysqli_fetch_assoc($result);
     
     if ($row['Nume']){
       if($row['Sfarsit']){
           //$conn = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link));
           $qer = "UPDATE Conturi SET Parola = ? WHERE Admin = 'DA'";
             $statement = mysqli_prepare($con, $qer);
            mysqli_stmt_bind_param($statement, "s", RandomString());
                   mysqli_stmt_execute($statement);
                   mysqli_close($con);
                   echo "<script>location.assign('index.php')</script>";
          }
        else{
                echo "<script> alert('Va rugam setati durata scrutinului!'); </script>";
                echo "<script>location.assign('Admin_index.php')</script>";
        }
    }
 
    else{
       echo "<script> alert('Va rugam adaugati candidatii!'); </script>";
       echo "<script>location.assign('Admin_index.php')</script>";
    }
         
?>
</body>
</html>
