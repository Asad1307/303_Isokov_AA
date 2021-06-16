<?php

require_once '../Utils/PdoFactory.php';
require_once '../DataAccess/ScheduleRepository.php';
require_once '../vendor/autoload.php';
class_alias('\RedBeanPHP\R', '\R');
R::setup('sqlite:../data/car_service.db');

$workerId = (int)$_GET['id'];

$schedulerRepository = new ScheduleRepository();
$schedule = $schedulerRepository->getById($workerId)[0];
if(array_key_exists('updateSchedule',$_POST)){
$schedule['mon_start'] = $_POST['mon_start'];
$schedule['tue_start'] = $_POST['tue_start'];
$schedule['wed_start'] = $_POST['wed_start'];
$schedule['thu_start'] = $_POST['thu_start'];
$schedule['fri_start'] = $_POST['fri_start'];
$schedule['sat_start'] = $_POST['sat_start'];
$schedule['sun_start'] = $_POST['sun_start'];
$schedule['mon_end'] = $_POST['mon_end'];
$schedule['tue_end'] = $_POST['tue_end'];
$schedule['wed_end'] = $_POST['wed_end'];
$schedule['thu_end'] = $_POST['thu_end'];
$schedule['fri_end'] = $_POST['fri_end'];
$schedule['sat_end'] = $_POST['sat_end'];
$schedule['sun_end'] = $_POST['sun_end'];
$schedule['id'] = $workerId;
$schedulerRepository->updateSchedule($schedule);
header('Location: schedule.show.php?id='.$workerId, true, 303);
exit();
}

if(array_key_exists('return',$_POST)){
header('Location: index.php', true, 303);
exit();
}

?>
<h1>Update info</h1>
<form  method="POST" >
            <label>Monday: <input type="time" name="mon_start" value="<?= $schedule['mon_start']?>"> - <input type="time" name="mon_end" value="<?= $schedule['mon_end']?>"></label><br><br>
            <label>Tuesday: <input type="time" name="tue_start" value="<?= $schedule['tue_start']?>"> - <input type="time" name="tue_end" value="<?= $schedule['tue_end']?>"></label><br><br>
            <label>Wednesday: <input type="time" name="wed_start" value="<?= $schedule['wed_start']?>"> - <input type="time" name="wed_end" value="<?= $schedule['wed_end']?>"></label><br><br>
            <label>Thursday : <input type="time" name="thu_start" value="<?= $schedule['thu_start']?>"> - <input type="time" name="thu_end" value="<?= $schedule['thu_end']?>"></label><br><br>
            <label>Friday : <input type="time" name="fri_start" value="<?= $schedule['fri_start']?>"> - <input type="time" name="fri_end" value="<?= $schedule['fri_end']?>"></label><br><br>
            <label>Saturday: <input type="time" name="sat_start" value="<?= $schedule['sat_start']?>"> - <input type="time" name="sat_end" value="<?= $schedule['sat_end']?>"></label><br><br>
            <label>Sunday: <input type="time" name="sun_start" value="<?= $schedule['sun_start']?>"> - <input type="time" name="sun_end" value="<?= $schedule['sun_end']?>"></label><br><br>
    <input type="submit" name="updateSchedule" value="Update">
</form>