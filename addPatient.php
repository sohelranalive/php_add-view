<?php

if (isset($_POST['btn'])) {
    function add_new_patient() {
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
        $sql = "INSERT INTO patients (patient_name, father_name, mother_name, phone_number, date, time) VALUES ('$_POST[patient_name]' , '$_POST[father_name]' , '$_POST[mother_name]' , '$_POST[phone_number]' , '$_POST[date]' , '$_POST[time]') ";
        mysqli_query($db_connect, $sql);
    }

    add_new_patient();
}
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
                <div class="col-md-10">

                    <form action="" method="post" role="form" class="form-horizontal">

                        <div class="form-group">
                            <label class="control-label col-md-3" for="patient_name">Patient Name</label>
                            <div class="col-md-9">
                                <input type="text" name="patient_name" id="patient_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="last_name">Father's Name</label>
                            <div class="col-md-9">
                                <input type="text" name="father_name" id="father_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="last_name">Mother's Name</label>
                            <div class="col-md-9">
                                <input type="text" name="mother_name" id="mother_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="phone_number">Phone Number</label>
                            <div class="col-md-9">
                                <input type="number" name="phone_number" id="phone_number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="date">Choose Date</label>
                            <div class="col-md-9">
                                <input type="date" name="date" id="date" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3" for="time">Pick Time</label>
                            <div class="col-md-9">
                                <input type="time" name="time" id="time" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <input type="submit" name="btn" class="btn btn-primary" value="Save Me">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="js/ajax_jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>

