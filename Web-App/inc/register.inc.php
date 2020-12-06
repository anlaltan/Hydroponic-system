<?php
if (isset($_POST['register-submit'])) {
  require 'database.inc.php';

  $username = $_POST['username'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];
  $macid = $_POST['macid'];
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($macid)) {
    header("Location: ../register.php?error=emptyfields&username=".$username."&mail=".$email."&macid=".$macid);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?error=invalidusernamemail");
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../register.php?error=invalidusername&mail=".$email);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?error=invalidmail&username=".$username);
    exit();
  }
  else if ($password !== $passwordRepeat) {
    header("Location: ../register.php?error=passwordcheck&usernmae=".$username."&mail=".$email);
    exit();
  }
  else {
    $sql = "SELECT usernameUsers FROM users WHERE usernameUsers=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../register.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCount = mysqli_stmt_num_rows($stmt);
      mysqli_stmt_close($stmt);
      if ($resultCount > 0) {
        header("Location: ../register.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
        $sql = "INSERT INTO users (usernameUsers, emailUsers, pwdUsers, macidUsers) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../register.php?error=sqlerror");
          exit();
        }
        else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $macid);
          mysqli_stmt_execute($stmt);
          $last_id = mysqli_insert_id($conn);
          $conn->query("INSERT INTO getdata (phData, ecData, wtempData, atempData, idUsers) VALUES (NULL,NULL,NULL,NULL,$last_id)");
          $conn->query("INSERT INTO command (command, idUsers) VALUES (NULL,$last_id)");
          header("Location: ../register.php?signup=success&id=".$last_id);
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: ../register.php");
  exit();
}
