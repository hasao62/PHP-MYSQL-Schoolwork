<!DOCTYPE html>
<html>
<head>
    <title>Coin Exchange Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        .result {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Coin Exchange Calculator</h2>
    <p>Enter an amount in dollars (e.g., 1.16 for $1.16):</p>

    <form method="POST">
        <input type="text" name="amount" required>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $amount = $_POST["amount"];
    
        // Validate the input
        if (!is_numeric($amount) || $amount < 0) {
            echo "<p style='color: red;'>Invalid amount! Please enter a valid positive number.</p>";
        } else {
            // Convert dollars to cents to avoid floating-point issues
            $cents = round($amount * 100);

            // Coin values in cents
            $coins = [
                "Quarters" => 25,
                "Dimes" => 10,
                "Nickels" => 5,
                "Pennies" => 1
            ];

            // Array to store the number of each coin
            $coinCount = [];

            // Calculate the number of each coin
            foreach ($coins as $coin => $value) {
                $coinCount[$coin] = intdiv($cents, $value);
                $cents %= $value;
            }
            echo "<p>Exchange Amount: </p>";
            foreach ($coinCount as $coin => $count) {
                echo "<p>$coin: $count</p>";
            }
            echo "</div>";

        }
    }
    ?>
</body>
</html>
