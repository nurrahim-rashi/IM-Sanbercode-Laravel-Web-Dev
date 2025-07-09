<?php
echo "<h1> Belajar Conditional <3 </h1>";

echo "<h3> Soal No 1 Greetings </h3>";

function greetings($name) {
    echo "Halo $name, Selamat Datang di Sanbercode!<br>";
}
greetings("Justin");
greetings("Luke");
greetings("Rashifa");

echo "<br>";
echo "<h3>Soal No 2 Reverse String</h3>";

function reverseString($str) {
    $reversed = "";
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }
    echo $reversed . "<br>";
}

reverseString("sanbercode");
reverseString("welcome");
reverseString("5sos");

echo "<br>";
echo "<h3>Soal No 3 Palindrome </h3>";

function palindrome($str) {
    $reversed = "";
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }

    if ($reversed == $str) {
        echo "true<br>";
    } else {
        echo "false<br>";
    }
}

echo "civic: ";
palindrome("civic");
echo "nababan: ";
palindrome("nababan");
echo "jambaban: ";
palindrome("jambaban");
echo "racecar: ";
palindrome("racecar");


echo "<br>";
echo "<h3>Soal No 4 Tentukan Nilai </h3>";

function tentukan_nilai($nilai) {
    if ($nilai >= 85 && $nilai <= 100) {
        return "Sangat Baik<br>";
    } elseif ($nilai >= 70 && $nilai < 85) {
        return "Baik<br>";
    } elseif ($nilai >= 60 && $nilai < 70) {
        return "Cukup<br>";
    } else {
        return "Kurang<br>";
    }
}

echo "98: ";
echo tentukan_nilai(98);
echo "76: ";
echo tentukan_nilai(76);
echo "67: ";
echo tentukan_nilai(67);
echo "43: ";
echo tentukan_nilai(43);

?>
