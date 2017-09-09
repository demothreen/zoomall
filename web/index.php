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



Flight::start();





























