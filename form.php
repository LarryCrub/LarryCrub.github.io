<?
    
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    
    
 
    $email_sent = mail(
        'ivan.abramov.95@mail.ru',
        'Заявка Абрамов И.А.',
        "				
        
            E-mail: $email <br/>
            Телефон: $phone <br/>
            
            
        "
    );
    
    if ($email_sent === true) {
        echo 'Good';
    }
    if ($email_sent === false) {
        echo 'Bad' ;
}

?>

<?php 

$mail->CharSet = 'utf-8';

$phone = $_POST['phone'];
$email = $_POST['email'];

//$mail->SMTPDebug = 3;                              

$mail->isSMTP();                                      
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'abramov.design@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'bP1EW09cu3peRbpD60Um'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('abramov.design@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('ivan.abramov.95@mail.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
$mail->Body    = 'оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>
