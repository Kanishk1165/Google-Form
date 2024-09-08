<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $gmail = $_POST['mail'];
        $password= $_POST['pass'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "select *from form where email = '$gmail' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['pass'] == $password)
                    {
                        header("locaction: index.php");
                        die;

                    }
                }
            }
            echo "<script type='text/javascript'> alert('Invalid Username or Password')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Invalid Username or Password')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="styles1.css">

</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form method ="POST">
            <label>Email</label>
            <input type="email" name="mail" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="submit">
        </form>
        <p>Not have an account? <a href="signup.php">Sign Up Here</a></p>
</body>
</html>