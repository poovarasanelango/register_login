<?php
include('./conn.php');
// $errormsg='';
if (isset($_POST['for_btn'])) {
    $checkemail = $_POST['checkemail'];
    $new_password = $_POST['new_password'];
    $re_password = $_POST['re_password'];
    //Check if email exists in database

    if (!empty($checkemail) && !empty($new_password) && !empty($re_password)) {

        $check = $conn->prepare("select * from log12 where uemail=?");
        $check->execute([$checkemail]);
        // $row =$check->fetch(PDO::FETCH_ASSOC);
        if ($check->rowCount() > 0) {
            if ($new_password != $re_password) {
                $errormsg = "please enter same password.";
            } else {
                $update_query = $conn->prepare("UPDATE log12 SET upassword=? WHERE uemail=?");
                $update_query->execute([$re_password, $checkemail]);
                header("location:login.php");
                exit();
            }
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
    <title>Forget Password?</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container3">
        <h1>Forget Password?</h1>
        <?php
    if ($errormsg) {
        echo "<p>$errormsg</p>";
    }
    ?>
        <form action="" method="POST">
            <div class="forgetpass">
                <div class="forg">
                    <label>Email</label>
                    <br>
                    <input type="email" id="search" name="checkemail" placeholder="Enter Your email">
                </div>
                <div class="forg">
                    <label>New Password</label>
                    <br>
                    <input type="password" id="search" name="new_password" placeholder="Enter Your new password">
                </div>
                <div class="forg">
                    <label>Confirm Password</label>
                    <br>
                    <input type="password" id="search" name="re_password" placeholder="Re-enter Your password">
                </div>
                <div class="fail">
                    <input type="submit" id="submit" name="for_btn">
                </div>
                <p>already have an account? <a href="login.php">login now</a></p>

            </div>
    </div>
    </div>
    </form>
    </div>
</body>

</html>