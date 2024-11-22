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
Калькулятор<br><br>
<form id="myForm" onsubmit="return validateForm(event)" method="POST">
<input type="number" id="num1" value="0" required>

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

<input type="number" id="num2" value="0" required>

<input type="button" value="Розрахувати" onclick="validateForm(event)">
</form><br><br>

<script>
        function validateForm(event) {
            event.preventDefault(); 
            const num1 = document.getElementById('num1').value;
            const num2 = document.getElementById('num2').value;
            const operation = document.querySelector('input[name="operation"]:checked');

            if (!num1 || !num2) {
                alert('Заповніть числа.');
                return;
            }

            if (!operation) {
                alert('Оберіть операцію.');
                return;
            }

            alert('Обчислення...');
            document.getElementById('myForm').submit();
                       
        }
</script>

<h3>Результат:</h3>

<h3>Історія:</h3>

<?php

?>

</body>
</html>