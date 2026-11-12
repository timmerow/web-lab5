<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$term = $_POST['term'] ?? '';
$definition = $_POST['definition'] ?? '';
$image = $_POST['image'] ?? '';

$message = 'Заполните все поля и укажите ссылку на изображение с http:// или https://.';
if (is_string($term) && trim($term) !== '' &&
    is_string($definition) && trim($definition) !== '' &&
    is_string($image) && filter_var($image, FILTER_VALIDATE_URL) &&
    in_array(parse_url($image, PHP_URL_SCHEME), ['http', 'https'], true)) {
    require 'db.php';
    $query = $mysql->prepare('INSERT INTO terms (term, definition, image) VALUES (?, ?, ?)');
    $query->bind_param('sss', $term, $definition, $image);
    $query->execute();
    $message = 'Термин успешно добавлен в базу данных.';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление термина</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><div class="container">Словарь веб-разработки</div></header>
    <main class="container">
        <section>
            <h1>Добавление термина</h1>
            <p><?= htmlspecialchars($message) ?></p>
            <a class="button" href="index.php">На главную</a>
        </section>
    </main>
</body>
</html>
