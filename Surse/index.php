<?php session_start(); ?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
   <meta http-equiv="Content-Language" content="en-US">

   <title>La Vot!</title>
  
</head>

<link href="Design.css" rel="stylesheet" type="text/css">
<style>
body{
        background-image: url("siteBackground.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        
}

table{
      
}
</style>
<body>
     
     <form action="indexx.php" method="post">
     
     <div class="titlu"> <label id="Viitorul">Viitorul este aici!          Voteaz&#259; online! </label>
         
    <h1 id="Header"> Logheaz&#259;-te </h1>
   <table align="center" style="position:fixed; top: 50%; left: 40%; height: 30px;">
     <tr> 
    <td><p id="lbl_uti">Utilizator</p>
    <input name="utilizator" type="text" id="utilizator" title="utilizator" placeholder="Utilizator" onfocus="value=''"></td></tr>
    <tr>
    <td><p id="lbl_pass">Parol&#259;</p>
    
    <input name="Parola" type="password" id="Parola" title="Parola" placeholder="Parol&#259;" onfocus="value=''"> </td>
    </tr>
    <tr><td>
    <input name="Login" type="submit" class="Login" id="Login" title="Login" value="Login"></td></tr>
    </table>
    
    <?php
       
       
            
        

       date_default_timezone_set('Europe/Bucharest');
       setlocale(LC_TIME, array('ro.utf-8', 'ro_RO.UTF-8', 'ro_RO.utf-8', 'ro', 'ro_RO', 'ro_RO.ISO8859-2'));
       $con = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link)); 
       $query = "SELECT * FROM Candidati";
       $result = mysqli_query($con,$query);
       
       $row = mysqli_fetch_assoc($result);
       
       $hour = $row['Sfarsit'][0] . $row['Sfarsit'][1];
       $min = $row['Sfarsit'][3] . $row['Sfarsit'][4];
       $data_de_azi = date("j F Y");
       
       if(date('H') > $hour){
             if($row['Sfarsit']){
             //$conn = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link));
             $qer = "DELETE FROM Conturi WHERE Admin = 'NU'";
             
             $prc = "SELECT * FROM Conturi";
             $res = mysqli_query($con,$prc);
             $num_total = mysqli_num_rows($res) - 1;
             
             $stmt = mysqli_prepare($con,$qer);
             mysqli_stmt_execute($stmt);
             
             
             //$cn = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link));
             $sel = "SELECT * FROM Candidati";
             $ins = "INSERT INTO Trecut(Nume,Voturi,Procent,An) VALUES (?,?,?,NOW())";
             
             $result = mysqli_query($con,$sel);
             
             while ($row = mysqli_fetch_assoc($result)){
                   
                  $num_total .= $row['Voturi'];
             }
             $res = mysqli_query($con,$sel);
             while ($row = mysqli_fetch_assoc($res)){
                  $state = mysqli_prepare($con,$ins);
                  $procent = ($row['Voturi'] * 100) / $num_total;
                  mysqli_stmt_bind_param($state, "sid", $row['Nume'], $row['Voturi'],$procent);
                  mysqli_stmt_execute($state);
                  
             }
             
             $del = "DELETE FROM Candidati";
         //    $st = mysqli_query($cn,$del);
             $rz = mysqli_prepare($con,$del);
             mysqli_stmt_execute($rz);
             
             
            // $connect = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link));
             $qqr = "SELECT * FROM Conturi";
             $rslt = mysqli_query($con, $qqr);
             $date = mysqli_fetch_array($rslt);
             //$to      = $date['Email'];
           $message = 'Numele de utilizator: ' . $date['Nume'] . '  Parola: ' . $date['Parola'];
            $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
    // telling the class to use SMTP
    $mail->IsSMTP();
    // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPDebug  = 0;
    // enable SMTP authentication
    $mail->SMTPAuth   = true;
    // sets the prefix to the servier
    $mail->SMTPSecure = "ssl";
    // sets GMAIL as the SMTP server
    $mail->Host       = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port       = 465;
    // GMAIL username
    $mail->Username   = "bogdanvm98@gmail.com";
    // GMAIL password
    $mail->Password   = "bogdanmihai98";
    //Set reply-to email this is your own email, not the gmail account 
    //used for sending emails
    $mail->SetFrom('bogdanvm98@gmail.com');
    $mail->FromName = "From Administrator";
    // Mail Subject
    $mail->Subject    = "Datele pentru logare";

    //Main message
    $mail->MsgHTML($message);

    //Your email, here you will receive the messages from this form. 
    //This must be different from the one you use to send emails, 
    //so we will just pass email from functions arguments
    $mail->AddAddress($date['Email'], $date['Nume']);
    $mail->Send();

           //mail($to, $subject, $message, $headers);
           //mysqli_close($connect);
           }
       }
       else if (date('i') > $min && date('H') >= $hour){
            if($row['Sfarsit']){
            //$conn = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link));
             $qer = "DELETE FROM Conturi WHERE Admin = 'NU'";
           
             
             $stmt = mysqli_prepare($con,$qer);
             mysqli_stmt_execute($stmt);
             
             
             //$cn = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link));
             $sel = "SELECT * FROM Candidati";
             $ins = "INSERT INTO Trecut(Nume,Voturi,Procent,An) VALUES (?,?,?,NOW())";
             
             $result = mysqli_query($con,$sel);
             $num_total = 0;
             while ($row = mysqli_fetch_assoc($result)){
                   
                  $num_total = $num_total + $row['Voturi'];
             }
             
             $res = mysqli_query($con,$sel);
             while($row = mysqli_fetch_assoc($res)){
                    $state = mysqli_prepare($con,$ins);
                  $procent = ($row['Voturi'] * 100) / $num_total;
                  mysqli_stmt_bind_param($state, "sid", $row['Nume'], $row['Voturi'],$procent);
                  mysqli_stmt_execute($state);
             }
             
             $del = "DELETE FROM Candidati";
              $rz = mysqli_prepare($con,$del);
             mysqli_stmt_execute($rz);
             
             require_once('class.phpmailer.php');
             // optional, gets called from within class.phpmailer.php if not already loaded
             include("class.smtp.php");
            //$connect = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link));
            $qqr = "SELECT * FROM Conturi";
            $rslt = mysqli_query($con, $qqr);
            $date = mysqli_fetch_array($rslt);
            $message = 'Numele de utilizator: ' . $date['Nume'] . '  Parola: ' . $date['Parola'];
            $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
    // telling the class to use SMTP
    $mail->IsSMTP();
    // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPDebug  = 0;
    // enable SMTP authentication
    $mail->SMTPAuth   = true;
    // sets the prefix to the servier
    $mail->SMTPSecure = "ssl";
    // sets GMAIL as the SMTP server
    $mail->Host       = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port       = 465;
    // GMAIL username
    $mail->Username   = "bogdanvm98@gmail.com";
    // GMAIL password
    $mail->Password   = "bogdanmihai98";
    //Set reply-to email this is your own email, not the gmail account 
    //used for sending emails
    $mail->SetFrom('bogdanvm98@gmail.com');
    $mail->FromName = "From Administrator";
    // Mail Subject
    $mail->Subject    = "Datele pentru logare";

    //Main message
    $mail->MsgHTML($message);

    //Your email, here you will receive the messages from this form. 
    //This must be different from the one you use to send emails, 
    //so we will just pass email from functions arguments
    $mail->AddAddress($date['Email'], $date['Nume']);
    $mail->Send();
            
            

            //mail($to, $subject, $message, $headers);
            //mysqli_close($connect);
            }
       }
     mysqli_close($con);
    ?>
    
    
   
   </form>
      
   
</body>
</html>
