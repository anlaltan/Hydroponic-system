<?php
    require "header.php";
    require "inc/database.inc.php";
    $stmt = $conn->prepare('SELECT pwdUsers, macidUsers, usernameUsers FROM users WHERE idUsers = ?');
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($password, $macId, $username);
    $stmt->fetch();
    $stmt->close();
?>
<div class="container">
            <div class="starter-template">
                <h1>Profile</h1>
                <div>
				<h5>Your account details are below</h5>
				<table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">PASSWORD</th>
                    <th scope="col">MAC ID</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$_SESSION['id']?></td>
                        <td><?=$username?></td>
                        <td><?=$password?></td>
                        <td><?=$macId?></td>
                    </tr>
                </tbody>
				</table>
			</div>
            </div>
            </div>