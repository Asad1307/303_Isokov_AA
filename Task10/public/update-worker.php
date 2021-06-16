<?php

require_once '../Utils/PdoFactory.php';
require_once '../DataAccess/WorkersRepository.php';
require_once '../DataAccess/EventsRepository.php';
require_once '../vendor/autoload.php';
class_alias('\RedBeanPHP\R', '\R');
R::setup('sqlite:../data/car_service.db');
if(!R::testConnection()) die('No DB connection!');

$workerId = (int)$_GET['id'];

$workerRepository = new WorkersRepository();
$worker = $workerRepository->getWorker($workerId)[0];
var_dump($worker);
if(array_key_exists('updateWorker',$_POST)){
    $worker['first_name']= $_POST['first_name'];
    $worker['last_name'] = $_POST['last_name'];
    $worker['first_name'] = $_POST['first_name'];
    $worker['patronymic'] = $_POST['patronymic'];
    $worker['speciality_id'] = $_POST['speciality_id'];
    $worker['date_of_birth'] = $_POST['date_of_birth'];
    $worker['earning_in_percents'] = $_POST['earning_in_percents'];
    $worker['employee_status_id'] = $_POST['employee_status_id'];
    $workerRepository->updateWorker($worker);
    header('Location: index.php', true, 303);
    exit();
}

if(array_key_exists('return',$_POST)){
    header('Location: index.php', true, 303);
    exit();
}

?>
<h1>Update info</h1>
<form  method="POST" >
    <label>First name: <input type="text" name="first_name" value="<?= $worker['first_name']?>"></label><br><br>
    <label>Last name: <input type="text" name="last_name" value="<?= $worker['last_name']?>"></label><br><br>
    <label>Patronymic: <input type="text" name="patronymic" value="<?= $worker['patronymic']?>"></label><br><br>
    <label>Speciality id: <input type="text" name="speciality_id" value="<?= $worker['speciality_id']?>"></label><br><br>
    <label>Date of birth : <input type="date" name="date_of_birth" value="<?= $worker['date_of_birth']?>"></label><br><br>
    <label>Earning in percents: <input type="text" name="earning_in_percents" value="<?= $worker['earning_in_percents']?>"></label><br><br>
    <label>Employee status id: <input type="text" name="employee_status_id" value="<?= $worker['employee_status_id']?>"></label><br><br>

    <input type="submit" name="updateWorker" value="Update">
</form>