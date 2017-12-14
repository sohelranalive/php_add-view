<?php

function select_patient_info() {
    
    $db_connect = mysqli_connect('localhost', 'root', '');
    if ($db_connect) {
        $db_select = mysqli_select_db($db_connect, 'db_newpatient');
        if ($db_select) {
            //echo 'Database Selected';
        } else {
            die('Connection failed' . mysqli_error($db_connect));
        }
    } else {
        die('Connection failed' . mysqli_error($db_connect));
    }
    $sql = "SELECT * FROM patients";
    if (mysqli_query($db_connect, $sql)) {
        $query_result = mysqli_query($db_connect, $sql);
        return $query_result;
    } else {
        die("Query Problem" . mysqli_error($db_connect));
    }
}

$query_result = select_patient_info();
?>

<html>
    <head>
        <title>Bootstrap Input & Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/my_style.css">
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box_one">Patient Add and View</div>
                    <hr/>
                    <a href="addPatient.php">AddPatient</a>
                    <a href="viewPatient.php">ViewPatient</a>
                    <hr/>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Phone Number</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                        <?php while($patient_info=  mysqli_fetch_assoc($query_result)){?>
                        <tr>
                            <td><?php echo $patient_info['id']; ?></td>
                            <td><?php echo $patient_info['patient_name']; ?></td>
                            <td><?php echo $patient_info['father_name']; ?></td>
                            <td><?php echo $patient_info['mother_name']; ?></td>
                            <td><?php echo $patient_info['phone_number']; ?></td>
                            <td><?php echo $patient_info['date']; ?></td>
                            <td><?php echo $patient_info['time']; ?></td>
                            </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>


        <script src="js/ajax_jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>



