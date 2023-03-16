<?php
$uname=$_POST['uname'];
$uemail=$_POST['email'];
$upass=$_POST['upass'];
$cpass=$_POST['cpass'];

  // $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn= new PDO("mysql:host=localhost;dbname=register", "root","root");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO log12 (uname, uemail,upassword)
  VALUES ('$uname', '$email', $upassword)";
  // use exec() because no results are returned
  $conn->exec($sql);


 ?>
// <?php
// include('./conn.php');
// if(isset ($_POST['btm'])){
//     $uname=$_POST['uname'];
//     $email=$_POST['email'];
//     $upswd1=$_POST['upswd1'];
//     $upswd2=$_POST['upswd2'];

//     $select_users = $conn->prepare("SELECT * FROM log1 WHERE email = ?");
//     $select_users->execute([$email]);
 
//     if ($select_users->rowCount() > 0) {
 
//        $creationerror = "Email already Taken...please give correct E-mail !!!";
 
//        // echo '<script>alert("email already taken!");</script>';
//     } else {
 
//        if ($upswd1 != $cupsw2) {
 
//           $creationerror = "Please Enter same password!!!";
 
//           // echo '<script>alert("password not matched! please enter same password !!!");</script>';
 
//        } else {
 
//           $insert_user = $conn->prepare("INSERT INTO log1 (uname, email,upswd1,upswd2) VALUES(?,?,?)");
//           $insert_user->execute([$uname, $email, $upswd1,$upswd2]);
 
//           if ($insert_user) {
 
//              $fetch_user = $conn->prepare("SELECT * FROM log1 WHERE email = ? AND upswd1 = ?");
 
//              $fetch_user->execute([$email, $upswd2]);
 
//              $row = $fetch_user->fetch(PDO::FETCH_ASSOC);
 
//              if ($fetch_user->rowCount() > 0) {
 
//                 $namevar = $row['uname'];
 
//                 // echo "<script>alert('$namevar');</script>";
//                 //    // 60*60*24 = 86400 seconds which is equals to 1 day;
//                 //    // to set cookies for 1 month use 60*60*24*30
//                       setcookie('uname', $namevar, time() + 5);
                
//                       header('location:login.php');
                
//              }
//           }
//        }
//     }
//  }
 


// ?>

