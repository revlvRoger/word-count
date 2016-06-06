
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise</title>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <?php
        $myFile = file_get_contents('alice.txt');
        $strlower = strtolower($myFile);
        $words = array_count_values(str_word_count($strlower, 1));
        echo "<pre>";
        arsort($words);
        print_r(array_slice($words, 0, 20));
        ksort($words);
        echo "<pre>";
        print_r($words);
        ?>
    </div>
    <table border="2px">
        <?php
            $fileCsv = fopen("todo.csv", "r");
            while (($line = fgetcsv($fileCsv)) !== false) {
                    echo "<tr>";
                    foreach ($line as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>\n";
            }
            fclose($f);
            ?>
</table>
</div>
</body>
</html>