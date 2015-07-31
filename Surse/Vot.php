<!DOCTYPE html>
<head>
   <title>La Vot!</title>
  
</head>

<link href="Design.css" rel="stylesheet" type="text/css">
<style>
body{
     background-image: url("ryb.jpg");
     background-repeat: no-repeat;
     background-size: cover;
     
}

</style>

<body>
    
    <div id="voting_screen">
       
      <label id = "info">Alegeti candidatul:</label> <br/>
      <?php
        
        $con = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link)); 
        $query = "SELECT * FROM Candidati";
        $result = mysqli_query($con, $query);
        ?>
        <table id="tabel">
        <?php
        $id = 1;
        while( $row = mysqli_fetch_assoc($result))
        {
             $nume = $row['Nume'];
            //$btn = newt_button(14, 10, $row['Nume']);
            echo "<form name=\"Patient\" action=\"Votare.php\" method=\"post\">";
            ?>
            <tr style="left: 20px;">
               <td style="font-family: Purisa; color:white "><h1><?php echo $row['Nume'] ?></h1></td> 
               <td> <?php echo '<img height="140" width="140" src="data:image;base64,'.$row['Poza'].' "> '; ?></td>
               <td> <input type="submit" value="Voteaza" class="vote" name="<?php echo $id ?>"> </td>
                
               </tr>
            <?php
              
              
            $id = $id + 1;
           
        }
             ?>
             <tr>
                <td></td>
                <td> <img src="Vot_nul.jpg"/> </td>
                <td> <input type="submit" value="Nu votez!" class="vote" name="vot_nul"> </td>
              </tr>
       </table>
      <?php
          
      ?>
  </div>
</body>
</html>
