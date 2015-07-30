<?php session_start();
     
 ?>
<html>
<head>
  <title>La Vot!</title>
 </head>
<link href="Design.css" rel="stylesheet" type="text/css">
<style>
body{
     background-image: url("designattik_background.jpg");
     background-repeat: no-repeat;
     background-size: cover;
}

</style>

<body>
      <div id="detalii">
         <a href="index.php" class="logout" onclick="return confirm('Sunte&#355;i sigur c&#259; vre&#355;i s&#259; v&#259; deloga&#355;i?');"> Delogare </a> <h1 style="font-family: URW Chancery L; text-align: center">  Bun venit la interfa&#355;a de administrator! <a href="Redirect.php" class="myButton" onclick="return confirm('Sunte&#355;i sigur c&#259; vre&#355;i s&#259; &#238;ncepe&#355;i scrutinul?');"> &#206;ncepe&#355;i scrutin </a></h1>
          <label id="textAdm"> Aici pute&#355;i s&#259; crea&#355;i scrutinul, s&#259; ad&#259;uga&#355;i candida&#355;ii, s&#259; crea&#355;i conturile aleg&#259;torilor &#x219;i s&#259; vizualiza&#355;i rezultatele din scrutinele precedente. </label></br><br/>
         <label style="color: red; font-size: 22px; font-family: Ubuntu;"> *Aten&#355;ie! </label> <label style="color: #D2D810; font-size: 22px; font-family: Ubuntu;">  Odat&#259; ap&#259;sat butonul "&#206;ncepe&#355;i scrutin" contul dumneavoastr&#259; va fi &#x219;ters temporar, pe toat&#259; perioada scrutinului. Verifica&#355;i dac&#259; a&#355;i &#238;ndeplinit to&#355;i pa&#x219;ii necesari </label>
          </div>
          
          
          <table id="admBtn">
               <tr>
                  
                  <td> <input type="submit" name="creare" value="Creare conturi" id="creare" onclick=window.open("Creare.php","popup","width=300,height=200,left=150,top=200");> </td>
                  <td> <input type="submit" value="Ad&#259;ugare candida&#355;i" id="add" onclick=window.open("Adaugare.php","demo","width=550,height=300,left=150,top=200,toolbar=0,status=0,");> </td>
                  <td> <input type="submit" value="Vezi rezultate" id="results" onclick=window.open("Rezultate.php","demo","width=550,height=300,left=150,top=200,toolbar=0,status=0,");> </td>
                  <td> <input type="submit" value="Seta&#355;i durata" id="begin" onclick=window.open("Ora.php","demo","width=550,height=300,left=150,top=200,toolbar=0,status=0,");> </td>
                </tr>
                <tr>
                    <td></td><td></td>
                    <td>  </td>
                    </tr>
                </tr>
            </table>


          
          
         
         
          <?php
              
            
              
          ?>
          <script>
                
             </script>
</body>
</html>
