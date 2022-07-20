<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset ($_POST['enviar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->CharSet = 'utf8';

    try {
        
        // Configuração do email
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'bb6b9957c9564c';
        $mail->Password = 'f3c8b8b5e4fab5';

        // Quem envia
        $mail->setFrom('contato@example.com', 'Mailer');

        // Quem recebe
        $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        
        // Para quem responde 
        $mail->addReplyTo($email, 'Retorno de contato');


        // Content
        $mail->isHTML(true);                                  //Set email format to HTML
       
        // Set email format to HTML
        $mail->Subject = "contato site - ".$assunto;
   
        // Corpo da mensagem em formato HTML
        $mail->Body    = "<br>Nome: </br> $nome <br> <b>E-mail: <br> $email <br> <b>Assunto: <br> $assunto <br> <b>Mensagem: <br> $mensagem";
        
        // Corpo da mensagem em formato texto
        $mail->AltBody = "Nome: $nome \n E-mail: $email \n Assunto: $assunto \n Mensagem: $mensagem";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Tente novamente, sua mensagem não presta. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
</head>
<body>
    <h1>Contato Usando phpmailer</h1>
    <form action="contato.php" method="post">
        <p>    
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </p> 
        
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </p>

        <p>
            <label for="assunto">Assunto:</label>
            <select name="assunto" id="assunto" required>
                <option value=""></option>
                <option value="Duvidas">Dúvidas</option>
                <option value="Reclamações">Reclamações</option>
                <option value="Elogios">Elogios</option>
            </select>
        </p>

        <p>
            <label for="mensagem">Mensagem:</label> <br>
            <textarea name="mensagem" id="mensagem" cols="30" rows="10" required></textarea>
        </p>
        
        <button type="submit" name="enviar">Enviar</button>

    </form>

    <p>
        <a href="index.php">Voltar</a>
    </p>

</body>
</html>