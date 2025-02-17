<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $win_code = htmlspecialchars($_POST['WIN']);
    $message = htmlspecialchars($_POST['message']);
    $messengers = implode(", ", $_POST['messenger']);

    // Твоя почта, на которую будут приходить заявки
    $to = "waffenagust@gmail.com"; // Замени на свою почту

    // Тема письма
    $subject = "Новая заявка с сайта 100WAVE";

    // Текст письма
    $email_content = "Имя: $name\n";
    $email_content .= "Телефон: $phone\n";
    $email_content .= "WIN код: $win_code\n";
    $email_content .= "Мессенджеры для связи: $messengers\n";
    $email_content .= "Сообщение:\n$message\n";

    // Заголовки письма
    $headers = "From: no-reply@100wave.com\r\n";
    $headers .= "Reply-To: $to\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Отправка письма
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Спасибо! Ваше сообщение отправлено.";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
} else {
    echo "Ошибка: форма не была отправлена.";
}
?>