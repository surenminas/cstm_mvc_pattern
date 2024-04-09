<?php

require 'rb.php';
$db = require '../config/config_db.php';

R::setup( $db['dsn'], $db['user'], $db['password']);
R::freeze( TRUE );
R::fancyDebug( TRUE );


//CREADE
// $cat = R::dispense('category');
// $cat->name = 'PHP';
// $cat->description = 'PHP';
// $id = R::store( $cat );

//READ
//$id = R::load('category', 3);

//UPDATE
// $cat = R::load('category', 3);
// $cat->name = 'C#';
// $cat->description = "C#";
// $cat = R::store($cat);

//delete
// $cat = R::load('category', 1);
// R::trash( $cat );

//select All
//$cat = R::findAll('category', ' ORDER BY id DESC LIMIT 2 ');

//select one
// $cat = R::findOne('category', 'id = 3');


