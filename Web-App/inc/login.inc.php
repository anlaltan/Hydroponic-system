<?php
    if(isset($_POST['login-submit'])){
        require "database.inc.php";
        $mailuid = $_POST['mailuid'];
        $password = $_POST['pwd'];

        if(empty($mailuid) || empty($password)){
            header("Location: ../index.php?error=emptyfields&mailuid=".$mailuid);
            exit();
        }
        else{
            $sql = "SELECT * FROM users WHERE usernameUsers=? OR emailUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "ss", $mailuid, $password);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($password, $row['pwdUsers']);
                    if($pwdCheck == false){
                        header("Location: ../index.php?error=wrongpwd");
                        exit();
                    }
                    elseif($pwdCheck == true){
                        session_start();
                        $_SESSION['id'] = $row['idUsers'];
                        $_SESSION['username'] = $row['usernameUsers'];
                        $_SESSION['email'] = $row['emailUsers'];
                        header("Location: ../index.php?login=success");
                        exit();
                    }
                }
                else{
                    header("Location: ../index.php?login=wronguidpwd");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location: ../register.php");
        exit();
    }