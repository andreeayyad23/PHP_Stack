<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Simple PHP Calculator</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-4">
            <div class="form-group">
                <label for="num1">Number 1:</label>
                <input type="text" name="num1" id="num1" class="form-control" placeholder="Enter a number">
            </div>
            <div class="form-group">
                <label for="num2">Number 2:</label>
                <input type="text" name="num2" id="num2" class="form-control" placeholder="Enter a number">
            </div>
            <div class="form-group">
                <label for="operation">Operation:</label>
                <select name="operation" id="operation" class="form-control" required>
                    <option value="">Select Operation</option>
                    <option value="add">Addition</option>
                    <option value="subtract">Subtraction</option>
                    <option value="multiply">Multiplication</option>
                    <option value="divide">Division</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Run</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the input values
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];
            $result = null;

            // Check if inputs are empty
            if (empty($num1) || empty($num2)) {
                echo "<div class='alert alert-danger mt-4'>Please enter both numbers.</div>";
            } else {
                // Convert inputs to float
                $num1 = floatval($num1);
                $num2 = floatval($num2);

                // Perform the calculation based on the selected operation
                switch ($operation) {
                    case 'add':
                        $result = $num1 + $num2;
                        break;
                    case 'subtract':
                        $result = $num1 - $num2;
                        break;
                    case 'multiply':
                        $result = $num1 * $num2;
                        break;
                    case 'divide':
                        if ($num2 == 0) {
                            echo "<div class='alert alert-danger mt-4'>Cannot divide by zero!</div>";
                            return; // Exit the script if division by zero
                        }
                        $result = $num1 / $num2;
                        break;    
                    default:
                        echo "<div class='alert alert-danger mt-4'>Invalid operation!</div>";
                        return; // Exit the script if operation is invalid
                }

                // Display the result if it's valid
                if ($result !== null) {
                    echo "<div class='alert alert-info mt-4'>Result: $result</div>";
                }
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>