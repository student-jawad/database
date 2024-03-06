<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST" ?? false)
    {
        $gmail = isset($_POST['mail']) ? $_POST['mail'] : '';
        $password = isset($_POST['pass']) ? $_POST['pass'] : '';

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "select * from form where email = '$gmail' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['pass'] == $password)
                    {
                        $_SESSION['username'] = $user_data['username']; // Store the username in the session
                        header("location: index.php");
                        die;
                    }
                }
            }  else{
                echo "<script type='text/javascript'> alert('wrong username or password')</script>";
                 }
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
    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <label>Email</label>
            <input type="email" name="" required>
            <label>Password</label>
            <input type="password" name="" required>
            <input type="submit" name="" value="Submit">
        </form>
        <p>Don't have an account?  <a href="signup.php">Sign Up here</a></p>
</body>
</html>
