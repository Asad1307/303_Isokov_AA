<?php


require_once '../Utils/PdoFactory.php';
require_once '../DataAccess/ScheduleRepository.php';
require_once '../vendor/autoload.php';
class_alias('\RedBeanPHP\R', '\R');
R::setup('sqlite:../data/car_service.db');
$workerId = (int)$_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $schedulerRepository = new ScheduleRepository();
    $schedule = new ScheduleModel();

    $schedule->mon_start = $_POST['mon_start'];
    $schedule->tue_start = $_POST['tue_start'];
    $schedule->wed_start = $_POST['wed_start'];
    $schedule->thu_start = $_POST['thu_start'];
    $schedule->fri_start = $_POST['fri_start'];
    $schedule->sat_start = $_POST['sat_start'];
    $schedule->sun_start = $_POST['sun_start'];
    $schedule->mon_end = $_POST['mon_end'];
    $schedule->tue_end = $_POST['tue_end'];
    $schedule->wed_end = $_POST['wed_end'];
    $schedule->thu_end = $_POST['thu_end'];
    $schedule->fri_end = $_POST['fri_end'];
    $schedule->sat_end = $_POST['sat_end'];
    $schedule->sun_end = $_POST['sun_end'];
    $schedule->id = $workerId;
    $schedulerRepository->addSchedule($schedule);

    header('Location: schedule.show.php?id='.$workerId, true, 303);
    exit();
}

?>
<form  method="POST">
    <label>Monday: <input type="time" name="mon_start"> - <input type="time" name="mon_end"></label><br><br>
    <label>Tuesday: <input type="time" name="tue_start"> - <input type="time" name="tue_end"></label><br><br>
    <label>Wednesday: <input type="time" name="wed_start"> - <input type="time" name="wed_end"></label><br><br>
    <label>Thursday : <input type="time" name="thu_start"> - <input type="time" name="thu_end"></label><br><br>
    <label>Friday : <input type="time" name="fri_start"> - <input type="time" name="fri_end"></label><br><br>
    <label>Saturday: <input type="time" name="sat_start"> - <input type="time" name="sat_end"></label><br><br>
    <label>Sunday: <input type="time" name="sun_start"> - <input type="time" name="sun_end"></label><br><br>
    <input type="submit" name="createSchedule" value="Create">
</form>