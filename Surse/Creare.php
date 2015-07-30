<?php session_start(); ?>


<?php
    function RandomString($length = 10) {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($chars);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $chars[rand(0, $charLength - 1)];
    }
    return $randomString;
    }

    
    
    require_once('class.phpmailer.php');
    // optional, gets called from within class.phpmailer.php if not already loaded
    include("class.smtp.php");
    $con = mysqli_connect("localhost","root","root","Alegatori") or die("Error " . mysqli_error($link));
    $query = "SELECT * FROM Date";
    $result = mysqli_query($con, $query);
   // $date = mysqli_fetch_array($result);
    
    
    
    while ($date = mysqli_fetch_array($result)){
   
     
           $qer = "INSERT INTO Conturi (Nume, Parola, Email, Admin) VALUES (?,?,?,'NU')";
           $stmt = mysqli_prepare($con, $qer);
           $pass = RandomString();
           mysqli_stmt_bind_param($stmt, "sss", $date['Nume'], $pass , $date['Email']);
           mysqli_stmt_execute($stmt);
           
          $message = 'Numele de utilizator: ' . $date['Nume'] . '  Parola: ' . $pass;
            

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
           /*$to      = $date['Email'];
           $subject = 'Date pentru logare';
           $message = 'Numele de utilizator: ' . $date['Nume'] . '  Parola: ' . $pass;
           $headers = 'From: Administrator';

           mail($to, $subject, $message, $headers);*/
           
           
        
    }
    
    mysqli_close($con);
    
    $_SESSION['creat'] = true;
    echo "<script>window.close();</script>";
   
?>

