<?php
require 'db.php';
$terms = $mysql->query('SELECT term, definition, image FROM terms ORDER BY id')->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЛР5 — Словарь веб-разработки</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><div class="container">Словарь веб-разработки</div></header>
    <main class="container">
        <section>
            <h1>Термины и определения</h1>
            <table>
                <thead>
                    <tr><th>Термин</th><th>Определение</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($terms as $row) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row['term']) ?></td>
                            <td><?= htmlspecialchars($row['definition']) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Иллюстрации</h2>
            <div class="images">
                <?php foreach ($terms as $row) { ?>
                    <img src="<?= htmlspecialchars($row['image']) ?>"
                         alt="<?= htmlspecialchars($row['term']) ?>"
                         title="<?= htmlspecialchars($row['term']) ?>">
                <?php } ?>
            </div>
        </section>
        <section>
            <h2>Добавить термин</h2>
            <form action="add.php" method="post">
                <label for="term">Термин</label>
                <input type="text" id="term" name="term" maxlength="100" required>

                <label for="definition">Определение</label>
                <textarea id="definition" name="definition" rows="3" maxlength="500" required></textarea>

                <label for="image">Ссылка на изображение</label>
                <input type="url" id="image" name="image" maxlength="1000" required>

                <button type="submit">Добавить</button>
            </form>
        </section>
    </main>
</body>
</html>
