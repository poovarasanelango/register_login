<?php
include('./conn.php');
if (isset($_POST['btm'])) {

    $uemail = $_POST['uemail'];
    $upass = $_POST['upass'];

    // echo "<script>alert($uemail);</script>";   
    //  echo "<script>alert($upswd);</script>"; 
    // echo $uemail;

    $stmt = $conn->prepare('SELECT * FROM log12 WHERE uemail = ? AND upassword = ?');

    $stmt->execute([$uemail, $upass]);

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {

        //echo "<script>alert('welcome');</script>";  
        header('location:welcome.php');
    } else {
        echo "<script>alert('Incorrect Inputs');</script>";
    }
}



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>



    <div class="container">
        <h1>Login</h1>
        <?php
        session_start();
        // Check if an error message is set in the session
        if (isset($_SESSION['error'])) {
            // Retrieve the error message and display it within a div with red text color
            echo '<div style="color: green; text-align:center;">' . htmlspecialchars($_SESSION['error']) . '</div>';
            // Unset the error message so it doesn't show up on subsequent page loads
            unset($_SESSION['error']);
        }
        ?>
        <form action="" method="POST">
            <div class="field">
                <label>Useremail</label>
                <input type="email" name="uemail" placeholder="Enter the Username" required>

            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="upass" placeholder="Enter the Password" required>

            </div>
            <div class="pass">
                <a href="forget.php">forgot Password?</a>
            </div>
            <div class="fail">
                <input type="submit" name="btm" value="login">
            </div>
            <p>Please Register?
                <a href="./reg.php">Sign up</a>
            </p>


        </form>
    </div>

</body>

</html>