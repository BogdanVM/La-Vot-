<?php session_start(); ?>
<html>
<head><title>La Vot!</title></head>
<body>
<?php
    session_start();
    if (isset($_REQUEST['Login'])) {
      if($_POST['Parola'] && $_POST['utilizator'])
            Login();
       else{
           echo "<script> alert('Va rugam completati toate campurile!'); window.location.href='index.php'; </script>";
           
        }
      }
      function Login(){
          $con = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link)); 
        $user = $_POST['utilizator'];
        $pass = $_POST['Parola'];
        
        $query = "SELECT * FROM Conturi WHERE Nume = '$user' AND Parola = '$pass'";
        $result = mysqli_query($con, $query);
        $date = mysqli_fetch_array($result);
        
        $username = $date['Nume'];
        $parola = $date['Parola'];
        $email = $date['Email'];
        
        if($user == $username && $pass == $parola){
              if ($date['Admin'] == "NU"){
                 $_SESSION['Nume'] = $username;
                 $_SESSION['parola'] = $parola;
                 echo "<script>location.assign('Vot.php')</script>";
              }
              else{
                  echo "<script>location.assign('Admin_index.php')</script>";
              }
        }
        else{
           echo "<script>alert('Date gresite!'); window.location.href='index.php';</script>";
        }
        
        
       /*while( $row = mysqli_fetch_assoc($result)){
        //if ($result)
           
        if($row['Nume'] = $user && $row['Parola'] = $pass){
                header("Location: Vot.php");
                break;
                }
         else echo "Ati gresit datele";
          }
        */
        mysqli_close($con);
      }
?>
</body>
</html>
