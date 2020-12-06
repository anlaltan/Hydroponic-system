<?php
    session_start();
    require "inc/database.inc.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <link rel="shortcut icon" href="image/logo1.svg"/>
        <title>Hydro Auto</title>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="image/logo1.svg" width="30" height="30" class="d-inline-block align-top" alt="logo"></a>
            <!--<div class="collapse navbar-collapse" id="exCollapsingNavbar">-->
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <?php
                        if(isset($_SESSION['id'])){
                            echo'<li class="nav-item"><a href="profile.php?id='.$_SESSION['id'].'" class="nav-link">Profile</a></li>
                            <li class="nav-item"><a href="dashboard.php" class="nav-link">Dashboard</a></li>';
                        }
                    ?>
                </ul>
                <?php
                    if(!isset($_SESSION['id'])){
                        echo'<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                                <li class="dropdown order-1">
                                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Login <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right mt-2">
                                    <li class="px-3 py-2">
                                        <form class="form" action="inc/login.inc.php" method="post">
                                                <div class="form-group">
                                                    <input placeholder="Mail/Username" class="form-control form-control-sm" name="mailuid" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <input placeholder="Password" class="form-control form-control-sm" name="pwd" type="password">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block" name="login-submit">Login</button>
                                                </div>
                                                <div class="form-group">
                                                    <a href="register.php" class="btn btn-primary btn-block">Signup</a>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>';}
                    elseif(isset($_SESSION['id'])){
                        echo '<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                                <li class="dropdown order-1">
                                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Logout<span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right mt-2">
                                    <li class="px-3 py-2">
                                        <form class="form" action="inc/logout.inc.php" method="post">
                                            <div class="form-group">
                                                <button type="submit" name="login-submit" class="btn btn-primary btn-block">Logout</button>
                                            </div>
                                        </form>
                                    </li>
                                    </ul>
                                </li>
                                </ul>';
                    }
                    ?>
            <!--</div>-->
        </div>
    </nav>