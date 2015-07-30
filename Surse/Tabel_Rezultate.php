<html>
<head>
  <title>La Vot!</title>
 </head>
 <link href="Design.css" rel="stylesheet" type="text/css">
<body>
<?php
        $con = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link)); 
        $query = "SELECT * FROM Trecut";
        $res = mysqli_query($con,$query);
        ?>
         
       <?php
        while($row = mysqli_fetch_assoc($res)){
             if(isset($_POST[$row['An']])){
                  $yr = $row['An'];
                 ?>
                 <div class="CSSTableGenerator">
                 <table id="tbl_rez" name="<?php echo $row['An'] ?>">
                 <form action="Rezultate.php" method="post">
                   <input type="submit" value="&#206;napoi" id="Login">
                   </form>
                 <tr> 
                    <th> Candidat </th>
                    <th> Numar Voturi </th>
                    <th> Procent </th>
                   </tr>
                   <?php 
                     while($row['An'] == $yr){
                   ?>
                    <tr>
                        <td style="font-family: Comic Sans MS"> <?php echo $row['Nume'] ?> </td>
                        <td style="font-family: Comic Sans MS"> <?php echo $row['Voturi'] ?> </td>
                        <td style="font-family: Comic Sans MS"> <?php echo $row['Procent'] . '%' ?> </td>
                        
                    </tr>
                    <?php
                      $row = mysqli_fetch_assoc($res);
                    }
                    ?>
                   </table>
                   </div>
                   <?php
                   break;
             }
        }
    ?>
 </body>
 </html>
