<?php
    require "header.php";
    require "inc/database.inc.php";
    $stmt = $conn->prepare('SELECT commands FROM command WHERE idUsers = ?');
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($command);
    $stmt->fetch();
    $stmt->close();
?>
<script type="text/javascript"> 
    $(document).ready(function() { 
        $('input[type="checkbox"]').click(function() { 
        var inputValue = $(this).attr("value"); 
        $("." + inputValue).toggle(); 
        }); 
    });
</script>
<script> 
    $(document).ready(function () { 
      // Denotes total number of rows 
    var rowIdx = 0; 
      // jQuery button click event to add a row 
    $('#addBtn').on('click', function () { 
        // Adding a row inside the tbody. 
        $('#tbody').append(`<tr id="R${++rowIdx}"> 
            <td class="row-index text-center"> 
            <p>${rowIdx}</p> 
            </td>
            <td class="text-center"><input type="time" id="appt" name="appt[]"></td> 
            <td class="text-center"><button class="btn btn-danger remove" type="button">Remove</button></td> 
            </tr>`); 
    }); 

      // jQuery button click event to remove a row. 
    $('#tbody').on('click', '.remove', function () { 
        // Getting all the rows next to the row 
        // containing the clicked button 
        var child = $(this).closest('tr').nextAll(); 
        // Iterating across all the rows  
        // obtained to change the index 
        child.each(function () { 
          // Getting <tr> id. 
        var id = $(this).attr('id'); 
          // Getting the <p> inside the .row-index class. 
        var idx = $(this).children('.row-index').children('p');
          // Gets the row number from <tr> id. 
        var dig = parseInt(id.substring(1)); 
          // Modifying row index. 
        idx.html(`Row ${dig - 1}`); 
          // Modifying row id. 
        $(this).attr('id', `R${dig - 1}`); 
        }); 
        // Removing the current row. 
        $(this).closest('tr').remove(); 
        // Decreasing total number of rows by 1. 
        rowIdx--; 
}); 
    }); 
</script> 
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Overview</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="control.php">Controls<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                </nav>
                <main class="col-sm-3 col-md-10">
                    <h1>Controls</h1>
                    <form class="form-horizontal" action="inc/control.inc.php" method="post">
                        <div class="card">
                            <div class="card-header">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="phCheck" id="phCheck" value="ph">
                                    <label class="custom-control-label" for="phCheck">PH Control</label>
                                </div>
                            </div>
                            <div class="ph card-body" id="phtext" style="display:none">
                                <h5 class="card-title">Determine ph value</h5>
                                <input type="number" name="ph" min="1" max="14" class="card-text">
                            </div>
                            <div class="card-header">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="wtempCheck" id="wtempCheck" value="wtemp">
                                    <label class="custom-control-label" for="wtempCheck">Water Temp Control</label>
                                </div>
                            </div>
                            <div class="wtemp card-body" id="wtemptext" style="display:none">
                                <h5 class="card-title">Determine Water Temp value</h5>
                                <input type="number" name="wtemp" min="1" max="14" class="card-text">
                            </div>
                            <div class="card-header">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="atempCheck" id="atempCheck" value="atemp">
                                    <label class="custom-control-label" for="atempCheck">Air Temp Control</label>
                                </div>
                            </div>
                            <div class="atemp card-body" id="atemptext" style="display:none">
                                <h5 class="card-title">Determine Air Temp value</h5>
                                <input type="number" name="atemp" min="1" max="14" class="card-text">
                            </div>
                            <div class="card-header">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="lightsCheck" id="lightsCheck" value="lights">
                                    <label class="custom-control-label" for="lightsCheck">Lights Control</label>
                                </div>
                            </div>
                            <div class="lights card-body" id="lightstext" style="display:none">
                                <h5 class="card-title">Determine Lights status</h5>
                                    <select id="lights" name="lights">
                                    <option value="turn on">Turn On</option>
                                    <option value="turn off">Turn Off</option></select>
                            </div>
                            <div class="card-header">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="timerCheck" id="timerCheck" value="timer">
                                    <label class="custom-control-label" for="timerCheck">Timer Control</label>
                                </div>
                            </div>
                            <div class="timer card-body" id="timertext" style="display:none">
                                <h5 class="card-title">Determine Timer status</h5>
                                <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Remove Time</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                        </tbody>
                                    </table>
                                    <button class="btn btn-md btn-primary" id="addBtn" type="button">Add New Time</button> 
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-lg btn-block login-button" type="submit" name="control-submit">GO</button></div>
                            </form>
                            <div class="starter-template">
                                <h1>Last Save</h1>
                                <?php $values = explode(",", $command);
                                echo '<p>PH:'.$values[1].'</p>';
                                echo '<p>Water Temp:'.$values[2].'</p>';
                                echo '<p>Air Temp:'.$values[3].'</p>';
                                echo '<p>Lights:'.$values[4].'</p>';
                                echo '<p>Times:';
                                for($i = 5; $i < count($values)-1; $i++){
                                    echo '<p>'.$values[$i].'</p>';
                                }
                                
                                ?>
                            </div>
                            
                        </div>
                    </div>
                </main>
            </div>
        </div>
</div>
