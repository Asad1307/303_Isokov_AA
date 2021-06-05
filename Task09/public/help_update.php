<?php

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);


if (strcasecmp($_POST['surname_new'],"")!=0){
    if (strcasecmp($_POST['name_new'],"")!=0){
        if (strcasecmp($_POST['patronymic_new'],"")!=0){
            if (isset($_POST['specialization_new'])){
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_new']."'".", 'name'="."'".$_POST['name_new']."'".", 'patronymic'="."'".$_POST['patronymic_new']."'".", 'specialization'="."'".$_POST['specialization_new']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
            else{
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_new']."'".", 'name'="."'".$_POST['name_new']."'".", 'patronymic'="."'".$_POST['patronymic_new']."'".", 'specialization'="."'".$_POST['specialization_old']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
        }
        else{
            if (isset($_POST['specialization_new'])){
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_new']."'".", 'name'="."'".$_POST['name_new']."'".", 'patronymic'="."'".$_POST['patronymic_old']."'".", 'specialization'="."'".$_POST['specialization_new']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
            else{
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_new']."'".", 'name'="."'".$_POST['name_new']."'".", 'patronymic'="."'".$_POST['patronymic_old']."'".", 'specialization'="."'".$_POST['specialization_old']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
        }
    }
    else{
        if (strcasecmp($_POST['patronymic_new'],"")!=0){
            if (isset($_POST['specialization_new'])){
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_new']."'".", 'name'="."'".$_POST['name_old']."'".", 'patronymic'="."'".$_POST['patronymic_new']."'".", 'specialization'="."'".$_POST['specialization_new']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
            else{
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_new']."'".", 'name'="."'".$_POST['name_old']."'".", 'patronymic'="."'".$_POST['patronymic_new']."'".", 'specialization'="."'".$_POST['specialization_old']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
        }
        else{
            if (isset($_POST['specialization_new'])){
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_new']."'".", 'name'="."'".$_POST['name_old']."'".", 'patronymic'="."'".$_POST['patronymic_old']."'".", 'specialization'="."'".$_POST['specialization_new']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
            else{
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_new']."'".", 'name'="."'".$_POST['name_old']."'".", 'patronymic'="."'".$_POST['patronymic_old']."'".", 'specialization'="."'".$_POST['specialization_old']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
        }
    }
}
else{
    if (strcasecmp($_POST['name_new'],"")!=0){
        if (strcasecmp($_POST['patronymic_new'],"")!=0){
            if (isset($_POST['specialization_new'])){
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_old']."'".", 'name'="."'".$_POST['name_new']."'".", 'patronymic'="."'".$_POST['patronymic_new']."'".", 'specialization'="."'".$_POST['specialization_new']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
            else{
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_old']."'".", 'name'="."'".$_POST['name_new']."'".", 'patronymic'="."'".$_POST['patronymic_new']."'".", 'specialization'="."'".$_POST['specialization_old']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
        }
        else{
            if (isset($_POST['specialization_new'])){
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_old']."'".", 'name'="."'".$_POST['name_new']."'".", 'patronymic'="."'".$_POST['patronymic_old']."'".", 'specialization'="."'".$_POST['specialization_new']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
            else{
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_old']."'".", 'name'="."'".$_POST['name_new']."'".", 'patronymic'="."'".$_POST['patronymic_old']."'".", 'specialization'="."'".$_POST['specialization_old']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
        }
    }
    else{
        if (strcasecmp($_POST['patronymic_new'],"")!=0){
            if (isset($_POST['specialization_new'])){
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_old']."'".", 'name'="."'".$_POST['name_old']."'".", 'patronymic'="."'".$_POST['patronymic_new']."'".", 'specialization'="."'".$_POST['specialization_new']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
            else{
                $query = "UPDATE 'workers' SET 'surname'="."'".$_POST['surname_old']."'".", 'name'="."'".$_POST['name_old']."'".", 'patronymic'="."'".$_POST['patronymic_new']."'".", 'specialization'="."'".$_POST['specialization_old']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
        }
        else{
            if (isset($_POST['specialization_new'])){
                $query = "UPDATE workers SET surname="."'".$_POST['surname_old']."'".", 'name'="."'".$_POST['name_old']."'".", 'patronymic'="."'".$_POST['patronymic_old']."'".", 'specialization'="."'".$_POST['specialization_new']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
            else{
                $query = "UPDATE workers SET surname="."'".$_POST['surname_old']."'".", 'name'="."'".$_POST['name_old']."'".", 'patronymic'="."'".$_POST['patronymic_old']."'".", 'specialization'="."'".$_POST['specialization_old']."'".", 'percentage_of_revenue'=".$_POST['percentage_of_revenue'].", 'status'="."'".$_POST['status']."'"."  WHERE id_w=".$_POST['w_id']."; ";
            }
        }
    }
}
    



$statement = $pdo->query($query);

//  Удаляем все услуги, которые мог выполнять работник. Новые вставляем заново
$query = "DELETE FROM 'workers_services' WHERE worker_id=:id".";";
$statement = $pdo->prepare($query);
$statement->bindValue(':id',$_POST['w_id'],PDO::PARAM_STR);;
$statement->execute();



if (isset($_POST['change_of_oil_in_ICE'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 1);";
    $statement = $pdo->query($query);
}
if (isset($_POST['oil_filter_change'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 2);";
    $statement = $pdo->query($query);
}
if (isset($_POST['fuel_filter_change'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 3);";
    $statement = $pdo->query($query);
}
if (isset($_POST['brake_fluid_change'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 4);";
    $statement = $pdo->query($query);
}
if (isset($_POST['injector_flushing'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 5);";
    $statement = $pdo->query($query);
}
if (isset($_POST['replacement_of_spark_plugs'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 6);";
    $statement = $pdo->query($query);
}
if (isset($_POST['change_of_oil'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 7);";
    $statement = $pdo->query($query);
}
if (isset($_POST['engine_overhaul'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 8);";
    $statement = $pdo->query($query);
}
if (isset($_POST['belt_and_chain_replacement_in_valvetrain'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 9);";
    $statement = $pdo->query($query);
}
if (isset($_POST['radiator_replacement'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 10);";
    $statement = $pdo->query($query);
}
if (isset($_POST['turbine_replacement'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 11);";
    $statement = $pdo->query($query);
}
if (isset($_POST['full_body_painting'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 12);";
    $statement = $pdo->query($query);
}
if (isset($_POST['local_body_painting'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 13);";
    $statement = $pdo->query($query);
}
if (isset($_POST['bumper_repair'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 14);";
    $statement = $pdo->query($query);
}
if (isset($_POST['vacuum_dent_removal'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 15);";
    $statement = $pdo->query($query);
}
if (isset($_POST['restoration_of_body_geometry'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 16);";
    $statement = $pdo->query($query);
}
if (isset($_POST['clutch_replacement'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 17);";
    $statement = $pdo->query($query);
}
if (isset($_POST['shock_absorber_replacement'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 18);";
    $statement = $pdo->query($query);
}
if (isset($_POST['camber_toe_diagnostics'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 19);";
    $statement = $pdo->query($query);
}
if (isset($_POST['wheel_balancing'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 20);";
    $statement = $pdo->query($query);
}
if (isset($_POST['automatic_transmission_replacement'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 21);";
    $statement = $pdo->query($query);
}
if (isset($_POST['manual_transmission_repair'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 22);";
    $statement = $pdo->query($query);
}
if (isset($_POST['parking_sensors_installation'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 23);";
    $statement = $pdo->query($query);
}
if (isset($_POST['rear_view_cameras_installation'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 24);";
    $statement = $pdo->query($query);
}
if (isset($_POST['car_soundproofing'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 25);";
    $statement = $pdo->query($query);
}
if (isset($_POST['car_wash'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 26);";
    $statement = $pdo->query($query);
}
if (isset($_POST['car_polishing'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 27);";
    $statement = $pdo->query($query);
}
if (isset($_POST['car_dry_cleaning'])) {
    $query = "INSERT INTO 'workers_services'('worker_id','service_id') VALUES (".$_POST['w_id'].", 28);";
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