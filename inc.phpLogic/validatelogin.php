<?php
include("grievance.php");
$email = $_POST['user_email'];
$password = $_POST['password'];

$query = "select * from userAccounts where emailAddress = :email and PASSWORD = :password";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();
$count = $stmt->rowCount();
if($count == 1){
  $_SESSION['email'] = $email;
  $_SESSION['password'] = $password;

}
  if(isset($_SESSION['email'])){
  $sql = 'select fullName from userAccounts where emailAddress = :email';
  $stmt2 = $conn->prepare($sql);
  $stmt2->bindParam(':email', $_SESSION['email']);
  $stmt2->execute();

  $results = $stmt2->fetch(PDO::FETCH_ASSOC);
    $_SESSION['name'] = $results['fullName'];
    if(isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
  echo  "<script> function updateUserName(username) {
      let welcome = document.getElementById('welcome-user');
      welcome.innerHTML = 'Welcome, '+ username + '.' ; }

    </script><br>";
   echo "<script>updateUserName("+$name+");</script><br>";
print_r($_SESSION);
  header("location:../index.php");
  exit;
  }
}

else{
  die("Invalid Log In");
/*  echo"<script>
  let node = document.createElement('P');
  let email = document.getElementById('login');
  let textnode = document.createTextNode('Invalid Login');
  node.appendChild(textnode);
  email.appendChild(node); </script>";
*/
}
?>
