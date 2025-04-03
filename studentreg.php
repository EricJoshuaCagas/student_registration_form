<!-- filepath: c:\xampp\htdocs\StudentReg\studentreg.php -->
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'] ?? '';
    $middle_initial = $_POST['middle_initial'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $dob_month = $_POST['dob_month'] ?? '';
    $dob_day = $_POST['dob_day'] ?? '';
    $dob_year = $_POST['dob_year'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $email_address = $_POST['email_address'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';

    // Combine date of birth
    $date_of_birth = "$dob_year-$dob_month-$dob_day"; // Format as YYYY-MM-DD

    // Database connection
    $servername = "localhost";
    $username = "root"; // Default XAMPP username
    $password = ""; // Default XAMPP password
    $dbname = "SRS";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO basic_information (first_name, middle_initial, last_name, date_of_birth, gender, email_address, phone_number)
            VALUES ('$first_name', '$middle_initial', '$last_name', '$date_of_birth', '$gender', '$email_address', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Form Submitted Successfully</h1>";
        echo "<p>Data has been inserted into the database.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>