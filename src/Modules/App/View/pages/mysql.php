<!DOCTYPE html>
<html lang="en">

<head>
    <title>MySql</title>
    <style type="text/css" media="screen">
        #editor {
            position: absolute;
            top: 2rem;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>
</head>

<body>
<a href="/">&#x2190; go Main</a>
    <div id="editor">-- "ДАМП"
-- Структура таблиц
CREATE TABLE motorcycle_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE motorcycles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type_id INT,
    discontinued TINYINT(1) DEFAULT 0,
    FOREIGN KEY (type_id) REFERENCES motorcycle_types(id)
);

-- Вставка данных
I№SERT INTO motorcycle_types (name) VALUES ('Sport');
INSERT INTO motorcycle_types (name) VALUES ('Cruiser');
INSERT INTO motorcycle_types (name) VALUES ('Touring');

INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('Ninja', 1, 0);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('ZX-10R', 1, 0);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('Softail', 2, 0);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('Road Glide', 3, 0);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('Vulcan', 2, 1);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('GSX-R1000', 1, 0);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('CBR1000RR', 1, 0);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('R1', 1, 0);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('Hayabusa', 1, 1);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('Street Glide', 2, 0);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('Road King', 2, 0);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('Electra Glide', 3, 0);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('Gold Wing', 3, 0);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('Valkyrie', 2, 1);
INSERT INTO motorcycles (name, type_id, discontinued) VALUES ('V-Star 1100', 2, 1);

-- Запрос с подсчетом мотоциклов снятых с производства
SELECT
    mt.name AS type_name,
    COUNT(m.id) AS motorcycle_count,
    SUM(CASE WHEN m.discontinued = 1 THEN 1 ELSE 0 END) AS discontinued_count
FROM
    motorcycle_types mt
LEFT JOIN
    motorcycles m ON mt.id = m.type_id
GROUP BY
    mt.id, mt.name;

-- Запрос с подсчетом мотоциклов НЕ снятых с производства
SELECT
    mt.name AS type_name,
    COUNT(m.id) AS motorcycle_count
FROM
    motorcycle_types mt
LEFT JOIN
    motorcycles m ON mt.id = m.type_id AND m.discontinued = 0
GROUP BY
    mt.id, mt.name;

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.33.0/ace.min.js"
        integrity="sha512-RFjWk8prkK/avV0PuBatirOL57/Q/WSh6BZ82tohL95Ug5h+S9sZoVpRtk+L8LI6q0q5z5wCyrb9N2X+IuNcfA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/twilight");
        editor.session.setMode("ace/mode/sql");
    </script>
</body>

</html>