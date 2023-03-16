<?php
include_once('./conn.php');
session_start();
if (isset($_POST['btn'])) {
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $upass = $_POST['upass'];
    $cpass = $_POST['cpass'];

    $select_users = $conn->prepare("SELECT * FROM log12 WHERE uemail = ?");
    $select_users->execute([$uemail]);

    if ($select_users->rowCount() > 0) {

        $error = "Email already Exits...please give correct E-mail!";
    } else {

        if ($upass != $cpass) {

            $error = "Please Enter correct password!!";
        } else {

            $insert_user = $conn->prepare("INSERT INTO log12 (uname, uemail,upassword ) VALUES(?,?,?)");
            $insert_user->execute([$uname, $uemail, $cpass]);
            // Set the error message in a session variable
            $_SESSION['error'] = "Succesfully Registered Login Now";
            header("Location: login.php");
            exit;

        //     if ($insert_user) {


        //         $fetch_user = $conn->prepare("SELECT * FROM log12 WHERE uemail = ? AND upassword=?");

        //         $fetch_user->execute([$uemail, $cpass]);

        //         $row = $fetch_user->fetchAll(PDO::FETCH_ASSOC);



        //         if ($fetch_user->rowCount() > 0) {
        //             // $creationerror="Register successfully.";

       // header("Location: login.php");
        //        }
        //   }
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="container2">
        <h1>Register</h1>

        <?php
        if ($error) {
            echo "<p id='hii'>$error</p>";
        }
        ?>
        <form action="" method="POST">
            <div class="field">
                <label>Username</label>
                <input type="text" name="uname" placeholder="Enter the Username" required>

            </div>
            <div class="field">
                <label>Email Id</label>
                <input type="email" name="uemail" placeholder="Enter the Email" required>

            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="upass" placeholder="Enter the Password" required>

            </div>
            <div class="field">
                <label>Confirm Password</label>
                <input type="password" name="cpass" placeholder="Enter the Confirm Password" required>
            </div>
            <div class="fail">
                <input type="submit" name="btn" value="Signup">
            </div>
            <p>Already a user?
                <a href="./login.php">Login</a>
            </p>

</body>

</html>