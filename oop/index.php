<?php

require_once 'animal.php';
require_once 'frog.php';
require_once 'ape.php';

// release 0
$sheep = new animal('shaun');
echo 'Name : ' . $sheep->name;
echo '<br>';
echo 'legs: ' . $sheep->legs;
echo '<br>';
echo 'cold blooded: ' . $sheep->cold_blooded;

// release 1
echo '<br><br>';
$kodok = new frog("buduk");
echo 'Name : ' . $kodok->name;
echo '<br>';
echo 'legs: ' . $kodok->legs;
echo '<br>';
echo 'cold blooded: ' . $kodok->cold_blooded;
echo '<br>';
$kodok->jump();

echo '<br><br>';
$sungokong = new ape("kera sakti");
echo 'Name : ' . $sungokong->name;
echo '<br>';
echo 'legs: ' . $sungokong->legs;
echo '<br>';
echo 'cold blooded: ' . $sungokong->cold_blooded;
echo '<br>';
$sungokong->yell();
