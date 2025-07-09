<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Looping</title>

</head>

<body>

    <h1>Berlatih Looping</h1>    
     <?php 

        echo "<h3>Soal No 1 Looping I Love PHP</h3>";
        echo "<h4>Looping 1</h4>";
        $i = 2;
        while($i <= 20){
            echo $i . " - I Love PHP <br>";
            $i+=2;
        }
        echo  "<h4>Looping 1</h4>";
        $a = 20;
        do {
            echo $a . " - I Love PHP <br>";
            $a-=2;
        } while ($a >= 1);

        echo "<h3>Soal No 2 Looping Array Modulo </h3>";

        $numbers = [18, 45, 29, 61, 47, 34];


        echo "Array numbers: ";
        print_r($numbers);
        foreach ($numbers as $num) {
            $item[] = $num % 5;
        }
         echo "<br>";

        echo "Array sisa bagi 5:  "; 
        print_r($item);
         echo "<br>";

        echo "<br>";       
        echo "<h3> Soal No 3 Looping Asociative Array </h3>";

        $items = [
            ['001', 'Keyboard Logitek', 60000, 'Keyboard yang mantap untuk kantoran', 'logitek.jpeg'], 
            ['002', 'Keyboard MSI', 300000, 'Keyboard gaming MSI mekanik', 'msi.jpeg'],
            ['003', 'Mouse Genius', 50000, 'Mouse Genius biar lebih pinter', 'genius.jpeg'],
            ['004', 'Mouse Jerry', 30000, 'Mouse yang disukai kucing', 'jerry.jpeg']
        ];

        foreach($items as $arrays){
            $output = [
                "id" => $arrays[0],
                "name" => $arrays[1],
                "price" => $arrays[2],
                "description" => $arrays[3],
                "image" => $arrays[4],
            ];
            print_r($output);
            echo "<br>";
        }

        echo "<h3>Soal No 4 Asterix </h3>";
        echo "Asterix: <br>";
        for($k =1; $k <=5; $k++){
            for($j = 1; $j <= $k; $j++){
                echo "*";
            }
            echo "<br>";
        }
        echo "<br>";        

    ?></body>

</html>
