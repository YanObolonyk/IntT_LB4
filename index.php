<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LB4</title>
    <style>
        div, input[type="number"], input[type="button"] {
            display: inline-block;
            vertical-align: middle;
        }
        input[type="button"] {
            background-color: #cbc2b4;
            padding-inline: 10px;
        }
    </style>
</head>
<body>
<br>Калькулятор<br><br>

<form id="myForm" method="POST">
<input type="number" id="num1" name="num1" value="0" required>
<div>
        <input type="radio" name="operation" value="+" required> +
    <br>
        <input type="radio" name="operation" value="-"> -
    <br>
        <input type="radio" name="operation" value="/"> /
    <br>
        <input type="radio" name="operation" value="*"> *
    <br>
</div>
<input type="number" id="num2" name="num2" value="0" required>
<input type="submit" value="Розрахувати">
</form><br><br>

<script>
        
</script>

<h3>Результат:</h3>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the inputs from the form
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    // Initialize result variable
    $result = "";

    // Perform the calculation
    if (is_numeric($num1) && is_numeric($num2)) {
        switch ($operation) {
            case "+":
                $result = $num1 + $num2;
                break;
            case "-":
                $result = $num1 - $num2;
                break;
            case "*":
                $result = $num1 * $num2;
                break;
            case "/":
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Помилка: ділення на нуль!";
                }
                break;
            default:
                $result = "Невірна операція!";
        }
    } else {
        $result = "Введіть дійсні числа!";
    }

    // Save the operation and result to the beginning of "history.txt"
    $historyFile = 'history.txt';
    $currentEntry = "$num1 $operation $num2 = $result\n";

    // Prepend the new entry to the file
    if (file_exists($historyFile)) {
        $oldContent = file_get_contents($historyFile);
        $newContent = $currentEntry . $oldContent;
    } else {
        $newContent = $currentEntry;
    }
    file_put_contents($historyFile, $newContent);

    // Display the result
    echo $result;
}
?>

<h3>Історія:</h3>

<?php
$myfile = fopen("history.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>

</body>
</html>