<?php
require_once('connection.php');
session_start();
$id = $_SESSION['id'];

// get pw
$sql = "SELECT * FROM account_information WHERE id = '$id'";
$query = $handler->query($sql);
$row = $query->fetch(PDO::FETCH_OBJ);

//echo $row->id . " - " . $row->password;

if (isset($_POST['submit'])) {
  // POST variables 
  $newEmail = $_POST['email1'];
  $newEmail2 = $_POST['email2'];
  $password = $_POST['password1'];
  if ($newEmail == $newEmail2 && password_verify($password, $row->password)) {
      try {
        $sql = "UPDATE account_information SET email = :email WHERE id = '$id'";
        $stmt = $handler->prepare($sql);
        $stmt->bindParam(':email', $newEmail, PDO::PARAM_STR, 12);
        $stmt->execute();
        echo "Email updated.";
      } catch (PDOException $e) {
        echo "We have an error"."<br>";
        echo $e->getMessage()."<br>";
      }
  } else {
      echo "Emails don't match or pw is incorrect.";
  }
}

if (isset($_POST['pw-change'])) {
  // POST variables 
  $newPw1 = $_POST['newPw1'];
  $newPw2 = $_POST['newPw2']; 
  $newPw = password_hash($_POST['newPw1'], PASSWORD_DEFAULT);
  $password = $_POST['password1'];
  if ($newPw1 == $newPw2 && password_verify($password, $row->password)) {
      try {
        $sql = "UPDATE account_information SET password = :password WHERE id = '$id'";
        $stmt = $handler->prepare($sql);
        $stmt->bindParam(':password', $newPw, PDO::PARAM_STR, 12);
        $stmt->execute();
        echo "Password updated.";
      } catch (PDOException $e) {
        echo "We have an error"."<br>";
        echo $e->getMessage()."<br>";
      }
  } else {
      echo "Passwords don't match or pw is incorrect.";
  }
}