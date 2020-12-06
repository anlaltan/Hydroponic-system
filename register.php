<?php
    require "header.php";
?>
<div class="jumbotron">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                        <div class="card-body">
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptfields"){
                                        echo'<p>Fill in all fields!</p>';
                                    }
                                    elseif($_GET["error"] == "invaliduidmail"){
                                        echo'<p>Invalid username and mail!</p>';
                                    }
                                    elseif($_GET["error"] == "invaliduid") {
                                        echo'<p>Invalid username!</p>';
                                    }
                                    elseif($_GET["error"] == "invalidmail"){
                                        echo'<p>Invalid e-mail!</p>';
                                    }
                                    elseif($_GET["error"] == "passwordcheck"){
                                        echo'<p>Your password do not match!</p>';
                                    }
                                    elseif($_GET["error"] == "usertaken"){
                                        echo'<p>Username is already taken!</p>';
                                    }
                                    elseif($_GET["error"] == "macidtaken"){
                                        echo'<p>This MAC id is already taken!</p>';
                                    }
                                }
                                elseif(isset($_GET["register"])){
                                    if($_GET["register"] == "success"){
                                        echo'<p>Registration successful!</p>';
                                    }
                                }
                            ?>
                            <form class="form-horizontal" action="inc/register.inc.php" method="post">
                                <?php
                                    if(!empty($_GET["username"])){
                                        echo'<div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" value="'.$_GET["username"].'"></div>';
                                    }
                                    else{
                                        echo'<div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username"></div>';
                                    }
                                    if(!empty($_GET["mail"])){
                                        echo'<div class="form-group"><input class="form-control" type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'"></div>';
                                    }
                                    else{
                                        echo'<div class="form-group"><input class="form-control" type="text" name="mail" placeholder="E-mail"></div>';
                                    }
                                    if(!empty($_GET["macid"])){
                                        echo'<div class="form-group"><input class="form-control" type="text" name="macid" placeholder="MAC id" value="'.$_GET["macid"].'"></div>';
                                    }
                                    else{
                                        echo'<div class="form-group"><input class="form-control" type="text" name="macid" placeholder="MAC id"></div>';
                                    }
                                ?>
                                <div class="form-group"><input class="form-control" type="password" name="pwd" placeholder="Password"></div>
                                <div class="form-group"><input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat password"></div>
                                <div class="form-group"><button class="btn btn-primary btn-lg btn-block login-button" type="submit" name="register-submit">Register</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require "footer.php";
?>