<?php session_start(); ?>
<html>
<head>
   <title>La Vot!</title>
</head>
<style>
body{
     background-image: url("designattik_background.jpg");
     background-repeat: no-repeat;
     background-size: cover;
}

</style>
<body>
      <label style="font-family: Purisa; font-size: 30px; text-align: center; position: fixed; top: 10%; left: 50%;"> V&#259; rug&#259;m s&#259; a&#x219;tepta&#355;i!</label><br/>
<img src="ajax-loader.gif" style="position: fixed; top: 50%; left: 50%; width: 20px; height: 20px;"/>
   <?php
        if ($_SESSION['creat']){
             $_SESSION['creat'] = false;
             echo "<script>window.close();</script>";
          }
        
     ?>
</body>
</html>
