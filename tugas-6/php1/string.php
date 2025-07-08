<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>String PHP</title>
</head>
<body>
    <h1>Berlatih String PHP</h1>
    <?php   
        echo "<h3> Soal No 1</h3>";
        $first_sentence = "Hello PHP!";
        $second_sentence = "I'm ready for the challenges";

        echo "Kalimat 1 : $first_sentence <br>";
        echo "Panjang Kalimat 1 : " . strlen($first_sentence) . "<br>";
        echo "Jumlah Kata Kalimat 1 : " . str_word_count($first_sentence) . "<br><br>";

        echo "Kalimat 2 : $second_sentence <br>";
        echo "Panjang Kalimat 2 : " . strlen($second_sentence) . "<br>";
        echo "Jumlah Kata Kalimat 2 : " . str_word_count($second_sentence) . "<br>";

        echo "<h3> Soal No 2</h3>";
        $string2 = "I love PHP";

        $words = explode(" ", $string2);

        echo "Kata 1 Kalimat 2 : " . $words[0] . "<br>";
        echo "Kata 2 Kalimat 2 : " . $words[1] . "<br>";
        echo "Kata 3 Kalimat 2 : " . $words[2] . "<br>";

        echo "<h3> Soal No 3 </h3>";
        $string3 = "PHP is old but sexy!";
        $new_string3 = str_replace("sexy", "awesome", $string3);

        echo "Kalimat 3 : $string3 <br>";
        echo "New Kalimat 3 : $new_string3 <br>";
    ?>
</body>
</html>
