<?php
    require "header.php";
    require "inc/database.inc.php";
    $stmt = $conn->prepare("SELECT phData, ecData, wtempData, atempData FROM getdata WHERE idUsers = ?");
    $stmt->bind_param('s', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($phData, $ecData, $wtempData, $atempData);
    $stmt->fetch();
    $stmt->close();
?>
<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                        <?php
                            echo'<a class="nav-link active" href="dashboard.php">Overview <span class="sr-only">(current)</span></a>';
                        ?>
                        </li>
                        <li class="nav-item">
                        <?php
                            echo'<a class="nav-link" href="control.php">Control</a>';
                        ?>
                        </li>
                    </ul>
                </nav>
                <main class="col-sm-3 col-md-10">
                    <h1>Dashboard</h1>
                    <form class="form-horizontal" action="inc/refresh.inc.php" method="post">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>PH</th>
                                <th>EC</th>
                                <th>WATER TEMP</th>
                                <th>AIR TEMP</th>
                                <th>HUMİDİTY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><?=$phData?></th>
                                <th><?=$ecData?></th>
                                <th><?=$wtempData?></th>
                                <th><?=$atempData?></th>
                                <th><?=$humiData?></th>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="form-group"><button class="btn btn-primary btn-lg btn-block login-button" type="submit" name="refresh-submit">Refresh</button></div>
                    </form>
                </main>
            </div>
        </div>
    </div>