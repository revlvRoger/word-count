
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
if(isset($_POST['Submit'])){
    // loop through the uploaded files
    foreach ($_FILES as $key => $value){
        $image_tmp = $value['tmp_name'];
        $image = $value['name'];
        $image_file = "{$UPLOADDIR}{$image}";

        // move the file to the permanent location
        if(move_uploaded_file($image_tmp,$image_file)){
            echo <<<HEREDOC
    <img src="{$image_file}" alt="file not found" /></br>
</div>
HEREDOC;
        }
        else{
            echo "<h1>image file upload failed, image too big after compression</h1>";
        }
    }
}
else{
    ?>
    <form name='baccs' method='post' enctype='multipart/form-data' action=''>
    <table>
    <tr>
        <td><input type='file' name='image'></td>
    </tr>
    <tr>
        <td><input name='Submit' type='submit' value='Upload image'></td>
    </tr>
</table>
</form>
<?php
}
?>
        <h1>Top 20 Words</h1>
        <?php
        $myFile = file_get_contents('alice.txt');
        $strlower = strtolower($myFile);
        $words = array_count_values(str_word_count($strlower, 1));
        echo "<pre>";
        arsort($words);
        print_r(array_slice($words, 0, 20));
        echo "Counting words";
        ksort($words);
        echo "<pre>";
        print_r($words);
        ?>
    </div>
    <table border="2px">
        <h1>CSV File</h1>
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