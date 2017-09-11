<?php

require ('../vendor/autoload.php');

Flight::set('flight.views.path', './../views');

Flight::register('db', 'PDO', ['sqlite:./../db/main.db'], function($db) {
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});

Flight::route('GET /', function() {
    $db = Flight::db();
    $sql = 'select * from zoomall where 1=1';

    if ($_GET['category']) {
        $sql .= " and category = '{$_GET['category']}'";
    }
    Flight::render('form.php', ['method' => 'post'], 'cont');
    Flight::render('table.php',
        ['result' => $db->query($sql)]
    );
});

Flight::route('GET /search', function() {
    Flight::render('form.php', ['method' => 'get', 'action' => '/']);
    });

/*
 * добавление данных в таблицу
 */

Flight::route('POST /', function() {
    $db = Flight::db();
    $name = $_POST['name'];
    $category = $_POST['category'];
    $sub = $_POST['sub'];


    if ((isset($name)) && (trim($name) != '')){
        $element['name'] = $name;
    };

    if ((isset($category)) && !empty($category)){
        $element['category'] = $category;
    }

    if ((isset($sub)) && !empty($sub))
        foreach ($sub as $key => $value){
        $element[$key] = $value;
        }

    $db->exec(sprintf(
        'INSERT INTO ZOOMALL (%s) VALUES ("%s")',
        implode(',', array_keys($element)),
        implode('","', array_values($element))
    ));

    Flight::redirect('/');
    exit();
});
/*
 * поиск по элементам
 */
/*
Flight::route('GET /', function() {
    $db = Flight::db();
    $name = $_POST['name'];
    $category = $_POST['category'];
    $sub = $_POST['sub'];
    $sql = $db->query("SELECT * FROM ZOOMALL WHERE 1=1 ");


    if ((isset($name)) && (trim($name) != '')){
        $lowerName = mb_strtolower($name);
        $sql .= "AND UPPER(name) LIKE '%{$lowerName}%' ";
    };

    if ((isset($category)) && !empty($category)){
        $andIn = 'AND category IN (' . "'" . implode("','", $category) . "'" . ') ';
        $sql .= $andIn;
    }

    if ((isset($sub)) && !empty($sub)) {
        $subcat = [];
    foreach ($sub as $key => $value) {
        $subcat[] = "$key = '{$value}'";
    }
    $sql .= 'AND ('. implode(" OR ", $subcat) . ')';
        }

    return $sql;

});
*/

/*
 * удаление записи при нажатии кнопки Удалить
 */

Flight::route('POST /delete', function() {
    $db = Flight::db();
    $db->exec("DELETE FROM ZOOMALL where id = {$_POST['id']}");

    Flight::redirect('/');

});


Flight::start();

