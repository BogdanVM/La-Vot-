<?php
          session_start();
          $con = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link));
          $qr = "SELECT * FROM Candidati";
          $result = mysqli_query($con, $qr);
          $row = mysqli_fetch_assoc($result);
          if($row['Nume']){
          
          if(isset($_POST['beginning'])){
                
                
                 
                
                $query = "UPDATE Candidati SET Sfarsit = ? WHERE Voturi = 0";
                $stmt = mysqli_prepare($con,$query);
                
                date_default_timezone_set('Europe/Bucharest');
              
                $time_to_end = (date('H') + $_POST['hour']) . ':' . (date('i') + $_POST['minutes']);
                
                mysqli_stmt_bind_param($stmt, "s", $time_to_end);
                mysqli_stmt_execute($stmt);
                mysqli_close($con);
                
                
                
                
                echo "<script> window.close(); </script>";
                }
               else{
                       echo "<script> alert('Va rugam sa completati toate campurile !'); </script>";
                       echo "<script> window.close(); </script>";
               }
                
                            
                
       
     }
     else{
        echo "<script> alert('Va rugam sa adaugati candidatii !'); window.close(); </script>";
        
     }
?>
