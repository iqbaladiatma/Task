<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basic Mini Project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Basic Concepts Demo</h1>

        <!-- Variables and Data Types -->
        <div class="section">
            <h2>1. Variables and Data Types</h2>
            <?php
                $string = "Hello World";
                $integer = 42;
                $float = 3.14;
                $boolean = true;
                $array = ["apple", "banana", "orange"];

                echo "<p>String: $string</p>";
                echo "<p>Integer: $integer</p>";
                echo "<p>Float: $float</p>";
                echo "<p>Boolean: " . ($boolean ? 'true' : 'false') . "</p>";
                echo "<p>Array: " . implode(", ", $array) . "</p>";
            ?>
        </div>

        <!-- Operators -->
        <div class="section">
            <h2>2. Operators</h2>
            <?php
                $num1 = 10;
                $num2 = 5;

                echo "<p>Addition: $num1 + $num2 = " . ($num1 + $num2) . "</p>";
                echo "<p>Subtraction: $num1 - $num2 = " . ($num1 - $num2) . "</p>";
                echo "<p>Multiplication: $num1 * $num2 = " . ($num1 * $num2) . "</p>";
                echo "<p>Division: $num1 / $num2 = " . ($num1 / $num2) . "</p>";
            ?>
        </div>

        <!-- Control Structures -->
        <div class="section">
            <h2>3. Control Structures</h2>
            <?php
                $score = 85;

                // If-else
                echo "<p>If-else example (Score: $score):<br>";
                if ($score >= 90) {
                    echo "Grade: A";
                } elseif ($score >= 80) {
                    echo "Grade: B";
                } else {
                    echo "Grade: C";
                }
                echo "</p>";

                // Loop
                echo "<p>For loop example:<br>";
                for ($i = 1; $i <= 5; $i++) {
                    echo "$i ";
                }
                echo "</p>";
            ?>
        </div>

        <!-- Functions -->
        <div class="section">
            <h2>4. Functions</h2>
            <?php
                function calculateArea($length, $width) {
                    return $length * $width;
                }

                function greet($name) {
                    return "Hello, $name!";
                }

                $length = 6;
                $width = 4;
                echo "<p>Rectangle area ($length x $width): " . calculateArea($length, $width) . "</p>";
                echo "<p>" . greet("User") . "</p>";
            ?>
        </div>

        <!-- Form Handling -->
        <div class="section">
            <h2>5. Form Handling</h2>
            <form method="post">
                <p>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name">
                </p>
                <p>
                    <label for="age">Age:</label>
                    <input type="number" name="age" id="age">
                </p>
                <input type="submit" value="Submit">
            </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST["name"] ?? "";
                    $age = $_POST["age"] ?? "";
                    
                    if ($name && $age) {
                        echo "<p>Submitted data:</p>";
                        echo "<p>Name: " . htmlspecialchars($name) . "</p>";
                        echo "<p>Age: " . htmlspecialchars($age) . "</p>";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
