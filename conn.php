<?php
//$uname=$_POST['uname'];


// $email=$_POST['email'];;
// $upswd1=$_POST['upswd1'];
//$upswd2=$_POST['upswd2'];
//   echo "<script>alert($email);</script>";  
//   echo "<script>alert($upswd1);</script>"; 
  //connect to database
  $conn = new PDO('mysql:host=localhost;dbname=register','root','root');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
//   //query to check if username and password match
//   $stmt = $conn->prepare('SELECT * FROM log1 WHERE email = ? AND upswd1 = ?');
//   //$stmt->execute(['uname' => $username, 'password' => $password]);
//   $stmt->execute([$email,$upswd1]);
//   $user = $stmt->fetch();
//  // var_dump($user);
//   if($user){
//       //start session and redirect to protected page
//       session_start();
//       $_SESSION['user'] = $user;
//       header('location: welcome.html');
//       //echo "login";
//   }else{
//       //display error message
//       echo 'Invalid username or password';
//   }


// if($conn){
//     echo "'it's work";
// }else {
//     echo "failed";
// }
    ?>