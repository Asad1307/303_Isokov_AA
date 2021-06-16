<?php
require_once '../Utils/PdoFactory.php';
require_once '../DataAccess/WorkersRepository.php';
require_once '../Models/WorkerModel.php';
require_once '../vendor/autoload.php';
class_alias('\RedBeanPHP\R', '\R');
R::setup('sqlite:../data/car_service.db');
$workerId = (int)$_GET['id'];

$workerRepository = new WorkersRepository();
$schedule = $workerRepository->getWorker($workerId)[0];

if(array_key_exists('deleteWorker',$_POST)){
    $workerRepository->removeWorkerById($workerId);
    header('Location: index.php', true, 303);
    exit();
}

if(array_key_exists('return',$_POST)){
    header('Location: index.php', true, 303);
    exit();
}

?>


<html lang="en">
<h4>Are you sure you want to delete worker '<?php echo $schedule['first_name']; ?>'?</h4>
<form method="post">
    <input type="submit" name="deleteWorker" value="Yes">
    <input type="submit" name="return" value="No">
</form>

</html>
