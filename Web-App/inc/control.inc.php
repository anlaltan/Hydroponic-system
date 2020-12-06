<?php
if (isset($_POST['control-submit'])){
    require '../header.php';
    require 'database.inc.php';
    
    $id = $_SESSION['id'];
    $ph = $_POST['ph'];
    $wtemp = $_POST['wtemp'];
    $atemp = $_POST['atemp'];
    $lights = $_POST['lights'];
    $time = $_POST['appt'];
    $counter = 0;
    if(isset($_POST['phCheck'])){
        $counter++;
    }
    if(isset($_POST['wtempCheck'])){
        $counter += 2;
    }
    if(isset($_POST['atempCheck'])){
        $counter += 4;
    }
    if(isset($_POST['lightsCheck'])){
        $counter += 8;
    }
    if(isset($_POST['timerCheck'])){
        $counter += 16;
    }
    $command = "$counter,";
    $stmt = $conn->prepare('SELECT commands FROM command WHERE idUsers = ?');
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($ressult);
    $stmt->fetch();
    $stmt->close();
    $values = explode(",", $ressult);
    if(!isset($_POST['phCheck'])){
        $command .= "$values[1],";
    }
    elseif(isset($_POST['phCheck'])){
        $command .= "$ph,";
    }
    if(!isset($_POST['wtempCheck'])){
        $command .= "$values[2],";
    }
    elseif(isset($_POST['wtempCheck'])){
        $command .= "$wtemp,";
    }
    if(empty($atemp)){
        $command .= "$values[3],";
    }
    elseif(!empty($atemp)){
        $command .= "$atemp,";
    }
    if(!isset($_POST['lightsCheck'])){
        $command .= "$values[4],";
    }
    elseif(isset($_POST['lightsCheck'])){
        $command .= "$lights,";
    }
    if(!isset($_POST['appt'])){
        for($i = 5; $i < count($values)-1; $i++){
            $command .= "$values[$i]";
        }
    }
    elseif(isset($_POST['appt'])){
        for ($x = 0; $x < count($time); $x++) {
            $command .= "$time[$x],";
        }
    }
    $sql = "UPDATE command set commands='$command' WHERE idUsers='$id'";
    mysqli_query($conn, $sql);
    header("Location: ../control.php?changes=saved&counter=".$counter);
    }
else {
    header("Location: ../control.php");
    exit();
}
?>