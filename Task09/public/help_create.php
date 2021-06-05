<?php

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

$query = "INSERT INTO 'workers'('surname', 'name', 'patronymic', 'date_of_birth', 'specialization', 'percentage_of_revenue', 'status') VALUES ("."'".$_POST['surname']."','".$_POST['name']."','".$_POST['patronymic']."','".$_POST['date_of_birth']."','".$_POST['specialization']."',".$_POST['percentage_of_revenue'].",'".$_POST['status']."');";

$statement = $pdo->query($query);

$last_row_id_w = $pdo->lastInsertID();

if (isset($_POST['change_of_oil_in_ICE'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 1);";
    $statement = $pdo->query($query);
}
if (isset($_POST['oil_filter_change'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 2);";
    $statement = $pdo->query($query);
}
if (isset($_POST['fuel_filter_change'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 3);";
    $statement = $pdo->query($query);
}
if (isset($_POST['brake_fluid_change'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 4);";
    $statement = $pdo->query($query);
}
if (isset($_POST['injector_flushing'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 5);";
    $statement = $pdo->query($query);
}
if (isset($_POST['replacement_of_spark_plugs'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 6);";
    $statement = $pdo->query($query);
}
if (isset($_POST['change_of_oil'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 7);";
    $statement = $pdo->query($query);
}
if (isset($_POST['engine_overhaul'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 8);";
    $statement = $pdo->query($query);
}
if (isset($_POST['belt_and_chain_replacement_in_valvetrain'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 9);";
    $statement = $pdo->query($query);
}
if (isset($_POST['radiator_replacement'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 10);";
    $statement = $pdo->query($query);
}
if (isset($_POST['turbine_replacement'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 11);";
    $statement = $pdo->query($query);
}
if (isset($_POST['full_body_painting'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 12);";
    $statement = $pdo->query($query);
}
if (isset($_POST['local_body_painting'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 13);";
    $statement = $pdo->query($query);
}
if (isset($_POST['bumper_repair'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 14);";
    $statement = $pdo->query($query);
}
if (isset($_POST['vacuum_dent_removal'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 15);";
    $statement = $pdo->query($query);
}
if (isset($_POST['restoration_of_body_geometry'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 16);";
    $statement = $pdo->query($query);
}
if (isset($_POST['clutch_replacement'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 17);";
    $statement = $pdo->query($query);
}
if (isset($_POST['shock_absorber_replacement'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 18);";
    $statement = $pdo->query($query);
}
if (isset($_POST['camber_toe_diagnostics'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 19);";
    $statement = $pdo->query($query);
}
if (isset($_POST['wheel_balancing'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 20);";
    $statement = $pdo->query($query);
}
if (isset($_POST['automatic_transmission_replacement'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 21);";
    $statement = $pdo->query($query);
}
if (isset($_POST['manual_transmission_repair'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 22);";
    $statement = $pdo->query($query);
}
if (isset($_POST['parking_sensors_installation'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 23);";
    $statement = $pdo->query($query);
}
if (isset($_POST['rear_view_cameras_installation'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 24);";
    $statement = $pdo->query($query);
}
if (isset($_POST['car_soundproofing'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 25);";
    $statement = $pdo->query($query);
}
if (isset($_POST['car_wash'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 26);";
    $statement = $pdo->query($query);
}
if (isset($_POST['car_polishing'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 27);";
    $statement = $pdo->query($query);
}
if (isset($_POST['car_dry_cleaning'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$last_row_id_w.", 28);";
    $statement = $pdo->query($query);
}


?>

<!DOCTYPE html>
<html lang="en">


<body>

<form method="post" enctype="application/x-www-form-urlencoded" action="index.php">
 
<p><button>Вернуться к главному меню</button></p>
</form>

</body>

</html>