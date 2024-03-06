<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $Gender = $_POST['gender'];
        $num = $_POST['number'];
        $address = $_POST['add'];
        $gmail = $_POST['mail'];
        $password = $_POST['pass'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "insert into form (fname, lname, gender, cnum, address, email, pass) values ('$firstname', '$lastname', '$Gender', '$num', '$address', '$gmail', '$password')";

            mysqli_query($con, $query);

            echo "<script type='text/javascript'> alert('Successfully Register')</script> ";
        }
        else 
        {
            echo "<script type='text/javascript'> alert('Please Enter some Valid Information')</script> ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form login and registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup">
        <h1>Sign up</h1>
        <h4>Enter your detail's</h4>
        <form method="post">
            <label>First Name</label>
            <input type="text" name="fname" required>
            <label>Last Name</label>
            <input type="text" name="lname" required>
            <label>Gender</label>
            <input type="text" name="gender" required>
            <label>Contact</label>
            <input type="tel" name="number" required>
            <label>Valid address</label>
            <input type="text" name="add" required>
            <label>Email</label>
            <input type="email" name="mail" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="Submit">
        </form>
        <p>By clicking, you agree to our<br>
        <a href="./T&M.php">Terms and Conditions</a> and <a href="./P&P.php">Policy Privacy</a></p>
        <p> Already have an account? <a href="./login.php">Login Here!</a></p>
    </div>
</body>
</html>