<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Script PHP for sending message</title>
</head>
<body>

  <?php 

  //Include PHPMailer
  require 'phpmailer/PHPMailerAutoload.php';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];

  $mail = new PHPMailer();
  //Apply SMTP 
  $mail->isSMTP();

  $mail->SMTPOptions = array(
      'ssl'=> array (
        'verify_peer'=> false,
        'verify_peer_name'=> false,
        'allow_self_signed'=>true
      )

  );
    //Seeting up config for possible errors
    $mail->SMTPDebug=2; 

    //Host
    $mail->Host = "smtp.gmail.com";

    //Protection 
    $mail->SMTPSecure = "tls";
    //Port
    $mail->Port = 587;

    //Auth
    $mail->SMTPAuth = true;

    //User and password 
    $mail->Username='123companytest@gmail.com';  //Criei email generico para testes de envio
    $mail->Password='companytest321';

    //Email details
    $mail->setFrom ('123companytest@gmail.com', 'Company X');
    $mail->addAddress ('noah.may.hem@gmail.com');
    $mail->isHTML(true);    
    $mail->Subject = ("$subject");
    $mail->Body = ("Nova mensagem! <br> Nome: $name <br> Assunto: $subject <br> Email: $email <br><br> $message");


    //Verifies whether the mail went throught or not
    if($mail->send()){
     echo '<script>alert("Mensagem Enviada com sucesso!")</script>';
      header("location: index.php");
    } else {
     echo "Erro no envio";
    }


 ?>

</body>
</html>