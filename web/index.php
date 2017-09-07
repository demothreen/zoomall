<?php

require ('../vendor/autoload.php');

Flight::set('flight.views.path', './../views');

Flight::register('db', 'PDO', ['sqlite:./../db/main.db'], function($db) {
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});

Flight::route('GET /', function() {
    Flight::render('form.php');
});

Flight::route('GET /', function() {
    $db = Flight::db();
    $result = $db->query('SELECT * FROM `zoomall`');
    //var_dump($result->fetchAll());
});

Flight::route('POST /', function() {
    $db = Flight::db();
    $name = $_POST['name'];
    $category = $_POST['category'];
    var_dump($_POST);
    $db->exec(sprintf(
        'INSERT INTO ZOOMALL (%s) VALUES ("%s")',
        implode(',', ['name', 'category']),
        implode('","', [$name, $category])
    ));
    Flight::redirect('/');
    exit();
});

//$name = $_POST['name'];
//$category = $_POST['category'];
//$db = Flight::db();
//$db->exec("INSERT INTO ZOOMALL ('name', 'category') VALUES ($name,$category)");
/*$db->exec(sprintf(
    'INSERT INTO '. zoomall .' (%s) VALUES ("%s")',
    implode(',', ['name', 'category']),
    implode('","', [$name, $category])
));*/



Flight::start();





























