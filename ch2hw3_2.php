<!DOCTYPE html>
<html>
<head>
    <title>Grade Filter Application</title>
</head>
<body>
    <h2>Enter Your Grade (0-100)</h2>
    <form method="POST">
        <input type="number" name="grade" required>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $grade = $_POST["grade"];
        $currentDate = date("Y-m-d"); // Get current date in YYYY-MM-DD format

        if (!is_numeric($grade) || $grade < 0 || $grade > 100) {
            echo "<p style='color:red;'>Invalid input! Please enter a number between 0 and 100.</p>";
        } else {
            if ($grade >= 90) {
                $letterGrade = "A";
            } elseif ($grade >= 80) {
                $letterGrade = "B";
            } elseif ($grade >= 70) {
                $letterGrade = "C";
            } elseif ($grade >= 60) {
                $letterGrade = "D";
            } else {
                $letterGrade = "F";
            }

            echo "<p>Your Grade: $grade</p>";
            echo "<p>Letter Grade: <strong>$letterGrade</strong></p>";
        }

        echo "<p>Current Date: $currentDate</p>";
    }
    ?>
</body>
</html>
