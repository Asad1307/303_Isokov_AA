<?php

require_once 'Events.php';

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

if (strcasecmp($_POST['worker'],"")!=0 and strcasecmp($_POST['car_category'],"")!=0):?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

    <?php
    $worker = $_POST['worker'];
    $car_category = $_POST['car_category'];
    $id_service = $_POST['id_service'];


    $event = new Events($pdo);
  
    $busyness = $event->getBusynessforWorker($worker);

    $service_info = $event->getServiceInfoByServiceId($id_service,$car_category);

    ?>
    <legend>
    <?php foreach($service_info as $info):
    $service_car_category = $info->servicesCarCategoriesId;?>
    <?= "Время выполнения Вашей услуги в часах: ".$info->durationInHours."; цена услуги в рублях: ".$info->price ;?><br><br>
    
    <?php endforeach; ?>


    Расписание мастера:<br>
    <?php foreach($busyness as $busy):
    $time_busy = explode(" ",$busy->serviceExecutionTime,2);
    $time_busy1 = $time_busy[array_key_last($time_busy)];

    
    ?>
    <?=$busy->busynessData."; начало рабочего дня: ".$busy->workHoursStart."; конец рабочего дня: ".$busy->workHoursEnd;?><br>
    <?="Занят на заказе с: ".$time_busy1." в течение ".$busy->durationInHours." часов";?><br>
    <?php endforeach; ?>
    </legend>

<form method="post" enctype="application/x-www-form-urlencoded" action="submit_order.php">
    <fieldset>
            <p><label>Выберите дату: <input type="date" name="date_order"></label></p>
            <p><label>Выберите время начала согласно расписанию мастера: <input type="time" name="time_order"></label></p>
            <p><label>Введите Ваш номер телефона в формате "+7...": <input type="tel" name="phone_number"></label><p>
            <p><label>Введите марку Вашей машины: <input name="car_brand"></label><p>
            <p><label>Введите модель Вашей машины: <input name="car_model"></label><p>
            <p><label>Введите номер, который Вы видите справа: <input name="id_worker">
            <?=$worker?>
            </label></p>
            <p><label>Введите номер, который Вы видите справа: <input name="id_service_car_category">
            <?=$service_car_category?>
            </label></p>
    </fieldset>
 
<button type="submit">Отправить данные</button>

</form>
</body>
</html> 


<?php endif;?>