<?php

require_once '../Utils/PdoFactory.php';
require_once '../Models/IdViewModel.php';
require_once '../DataAccess/WorkersRepository.php';
require_once '../Models/WorkerModel.php';
require_once '../vendor/autoload.php';
class_alias('\RedBeanPHP\R', '\R');
R::setup('sqlite:../data/car_service.db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$patronymic = $_POST['patronymic'];
$speciality_id = $_POST['speciality_id'];
$date_of_birth = $_POST['date_of_birth'];

$workerRepository = new WorkersRepository();
$worker = new WorkerModel();
    $worker->first_name = $first_name;
    $worker->last_name = $last_name;
    $worker->patronymic= $patronymic;
    $worker->speciality_id = $speciality_id;
    $worker->date_of_birth = $date_of_birth;
    $worker->earning_in_percents = 90;
    $worker->employee_status_id = 1;
$workerRepository->addWorker($worker);

header('Location: index.php', true, 303);
exit();
}
?>
<h1>Add worker</h1>
<form name="add-worker" method="POST" action="add-worker.php">
    <label>First name: <input type="text" name="first_name"></label><br><br>
    <label>Last name: <input type="text" name="last_name"></label><br><br>
    <label>Patronymic: <input type="text" name="patronymic"></label><br><br>
    <label>Date of birth: <input type="date" name="date_of_birth"></label><br><br>
    <label>Speciality:
    <select name="speciality_id">
        <option value=1>Auto mechanic</option>
        <option value=2>Auto electrician</option>
        <option value=3">Rebar operator</option>
    </select>
    </label><br><br>
    <input type="submit" value="Add">
</form>