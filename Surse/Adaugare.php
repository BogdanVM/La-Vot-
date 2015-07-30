<html>
<head>
<title>La Vot!</title>
</head>
<style>
   body{
        background-image: url("papirus.png");
        background-repeat: no-repeat;
        background-size: cover;
   }
   </style>
<body>
      
     <div id="adaug">
          <form method="post" enctype="multipart/form-data">
          <label style="font-family: Papyrus; font-size:30px; text-shadow: 1px 1px #342086;"> Numele candidatului: </label>
          <input type="text" name="numeTxt" id="numeTxt"><br/>
          <label style="font-family: Papyrus; font-size:22px; text-shadow: 1px 1px #342086;">Adauga poza: </label>
          
          <input type="file" name="image"><br/><br/><br/>
          <input type="submit" name="urmator" id="Login" value="Urmatorul">
          <input type="submit" name="final" id="Login" value="Finalizare">
          </form>
     </div>
   <?php
       if(isset($_POST['urmator']))
            {
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                {
                    echo "Please select an image.";
                }
                else
                {
                    if($_POST['numeTxt']){
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= $_POST['numeTxt'];
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    saveimage($name, $image);
                    }
                    else {echo "Va rugam specificati candidatul!";}
                }
            }
            if(isset($_POST['final'])){
                 if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                {
                    echo "Please select an image.";
                }
                else
                {
                    if($_POST['numeTxt']){
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= $_POST['numeTxt'];
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    saveimage($name, $image);
                     echo "<script>window.close();</script>";
                    }
                    else {echo "Va rugam specificati candidatul!";}
                }
            }
            function saveimage($name,$image)
            {
                $con = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link));
                $qry="INSERT INTO Candidati (Nume,Voturi,Poza,Sfarsit) VALUES ('$name',0,'$image',0)";
                $stmt = mysqli_prepare($con, $qry);
                mysqli_stmt_execute($stmt);
                
            }
            
   ?>
</body>
</html>
