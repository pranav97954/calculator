<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cal.css">
    <title>Calculator</title>
    <style>
        .body{
            background-color:white;
        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" class ="container">
        <input type="number" name="num01"  placeholder="Enter a number">
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num02"  placeholder="Enter second number">
        <button>Calculate</button>
    

    <?php
       if($_SERVER["REQUEST_METHOD"] == "POST"){
          $num01 = filter_input(INPUT_POST,"num01",FILTER_SANITIZE_NUMBER_FLOAT);
          $num02 = filter_input(INPUT_POST,"num02",FILTER_SANITIZE_NUMBER_FLOAT);
          $operator = htmlspecialchars($_POST["operator"]);

          //Error Handlers
          $errors = false;
          if(empty($num01) || empty($num02) || empty($operator)){
            echo "<p id='crc'>Fill in all field</p>";
            $errors = true;
          }
          else if(!is_numeric($num01) || !is_numeric($num02)){
            echo "<p id='crc'>Only Write Number!</p>";
            $errors = true;
          }

          //Calculate the numbers if no errors
          if(!$errors){
            $value;
            switch($operator){
                case "add":
                    $value = $num01 + $num02;
                    break;
                case "subtract":
                    $value = $num01 - $num02;
                    break;
                case "multiply":
                    $value = $num01 * $num02;
                    break;
                case "divide":
                    $value = $num01 / $num02;
                    break;
                default:
                    echo "<p id='crc'>Something went wrong </p>";
            }
            echo "<p? id='crc'>Result =".$value."</p>";
           }

        }
    ?>
    </form>
</body>
</html>