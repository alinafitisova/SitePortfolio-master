<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->isHTML(true);

// От кого письмо
$mail->setFrom('alinafitisova@gmail.com','Заявка на написение сайта');
// Кому отправитель
$mail->addAddress('alinafitisova@gmail.com');
// Тема письма
$mail->Subject = 'Привет, хочу заказать сайт';

$body = '<h1>Заявка из сайта портфолио!</h1>';

if(trim(!empty($_POST['name']))) {
    $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))) {
    $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
}
// if(trim(!empty($_POST['phone']))) {
//     $body.='<p><strong>Phone:</strong> '.$_POST['phone'].'</p>';
// }


$mail->Body = $body;

//Отправляем
if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Данные отправлены';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);

?>