<?php
require_once('Animal.php');
require_once('Ape.php');
require_once('Frog.php');

echo "<h2>Release 0</h2>";

$Shawn = new Animal("Shawn");
echo "Name: " . $Shawn->name . "<br>";
echo "Legs: " . $Shawn->legs . "<br>";
echo "Cold Blooded: " . $Shawn->cold_blooded . "<br><br>";

echo "<h2>Release 1</h2>";

$Apes = new Ape("Apes");
echo "Name: " . $Apes->name . "<br>";
echo "Legs: " . $Apes->legs . "<br>";
echo "Cold Blooded: " . $Apes->cold_blooded . "<br>";
echo "Yell: ";
$Apes->yell();

echo "<br>";

$Roger = new Frog("Roger");
echo "Name: " . $Roger->name . "<br>";
echo "Legs: " . $Roger->legs . "<br>";
echo "Cold Blooded: " . $Roger->cold_blooded . "<br>";
echo "Jump: ";
$Roger->jump();
?>