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