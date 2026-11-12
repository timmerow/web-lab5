CREATE TABLE IF NOT EXISTS terms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    term VARCHAR(100) NOT NULL,
    definition VARCHAR(500) NOT NULL,
    image VARCHAR(1000) NOT NULL
) DEFAULT CHARSET=utf8mb4;

INSERT INTO terms (term, definition, image) VALUES
('Браузер', 'Программа для просмотра веб-страниц.', 'images/browser.png'),
('Веб-сервер', 'Программа, которая принимает HTTP-запросы и отправляет ответы.', 'images/server.png'),
('URL', 'Адрес ресурса в интернете, например веб-страницы или изображения.', 'images/url.png'),
('HTTP', 'Протокол обмена запросами и ответами в вебе.', 'images/http.png'),
('HTTPS', 'HTTP с шифрованием соединения с помощью TLS.', 'images/https.png'),
('HTML', 'Язык разметки, который задаёт структуру веб-страницы.', 'images/html.png'),
('CSS', 'Язык стилей, который задаёт оформление веб-страницы.', 'images/css.png'),
('JavaScript', 'Язык программирования, который позволяет сделать веб-страницу интерактивной.', 'images/javascript.png'),
('PHP', 'Язык программирования, на котором можно формировать веб-страницы на сервере.', 'images/php.png'),
('MySQL', 'Система управления базами данных, которая хранит данные в таблицах.', 'images/mysql.png');
