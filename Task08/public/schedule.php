<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>График работы</title>
</head>


<body>


<?php

require_once 'Events.php';

$path = '../data/ss_new.db';

$pdo = new PDO("sqlite:".$path);

$event = new Events($pdo);
$workersIds = $event->getWorkers();


?>

    <form method="post" enctype="application/x-www-form-urlencoded" action="help_schedule.php">

        

                <label>
                    <legend> Выбрать работника </legend>
                    <select style="width: 200px;" name="id_w">
                        <option value=<?= null ?>>

                        </option>
                        <?php foreach($workersIds as $key => $idObject): ?>
                            <option value=<?= $idObject->id_w ?>>
                                <?= $idObject->id_w.". ".$idObject->surname." ".$idObject->name." ".$idObject->patronymic ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>

        <fieldset>
            <legend> График работы мастера на неделю </legend>
                <fieldset>
                    <p><label>1-й рабочий день: <input type="date" name="date1"></label></p>
                    <p><label>Начало работы: <input type="time" name="time1_start"></label></p>
                    <p><label>Конец работы: <input type="time" name="time1_end"></label></p>
                </fieldset>
                <fieldset>
                    <p><label>2-й рабочий день: <input type="date" name="date2"></label></p>
                    <p><label>Начало работы: <input type="time" name="time2_start"></label></p>
                    <p><label>Конец работы: <input type="time" name="time2_end"></label></p>
                </fieldset>
                <fieldset>
                    <p><label>3-й рабочий день: <input type="date" name="date3"></label></p>
                    <p><label>Начало работы: <input type="time" name="time3_start"></label></p>
                    <p><label>Конец работы: <input type="time" name="time3_end"></label></p>
                </fieldset>
                <fieldset>
                    <p><label>4-й рабочий день: <input type="date" name="date4"></label></p>
                    <p><label>Начало работы: <input type="time" name="time4_start"></label></p>
                    <p><label>Конец работы: <input type="time" name="time4_end"></label></p>
                </fieldset>
                <fieldset>
                    <p><label>5-й рабочий день: <input type="date" name="date5"></label></p>
                    <p><label>Начало работы: <input type="time" name="time5_start"></label></p>
                    <p><label>Конец работы: <input type="time" name="time5_end"></label></p>
                </fieldset>
                <fieldset>
                    <p><label>6-й рабочий день: <input type="date" name="date6"></label></p>
                    <p><label>Начало работы: <input type="time" name="time6_start"></label></p>
                    <p><label>Конец работы: <input type="time" name="time6_end"></label></p>
                </fieldset>
                <fieldset>
                    <p><label>7-й рабочий день: <input type="date" name="date7"></label></p>
                    <p><label>Начало работы: <input type="time" name="time7_start"></label></p>
                    <p><label>Конец работы: <input type="time" name="time7_end"></label></p>
                </fieldset>
        </fieldset>

        <p><button>Отправить данные</button></p>

    </form>

</body>

</html>