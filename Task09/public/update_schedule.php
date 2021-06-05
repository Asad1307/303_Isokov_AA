<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обновление данных о графике работы мастера</title>
</head>

<body>
    <form method="post" enctype="application/x-www-form-urlencoded" action="help_update_schedule.php">

        <?php

            $id_w = $_GET['id_w'];
            $busyness_id = $_GET['busyness_id'];
            $data_old = $_GET['data'];
            $work_hours_start_old = $_GET['work_hours_start'];
            $work_hours_end_old = $_GET['work_hours_end'];
            $is_actual = $_GET['is_actual'];
        ?>

        <input type="hidden" name="id_w" value=<?=$id_w?>>
        <input type="hidden" name="busyness_id" value=<?=$busyness_id?>>
        <input type="hidden" name="data_old" value=<?=$data_old?>>
        <input type="hidden" name="work_hours_start_old" value=<?=$work_hours_start_old?>>
        <input type="hidden" name="work_hours_end_old" value=<?=$work_hours_end_old?>>
        <input type="hidden" name="is_actual" value=<?=$is_actual?>>
        
        <fieldset>
            <legend> Ввод обновленных данных о графике работы мастера на день (8-часовой рабочий день) </legend>
            <p><label>Дата: <input type="date" name="date_busyness"></label></p>
            <p><label>Время начала рабочего дня: <input type="time" min="08:00" max="12:00" name="busyness_time_start"></label></p>
            <p><label>Время окончания рабочего дня: <input type="time" min="16:00" max="20:00" name="busyness_time_end"></label></p>

        </fieldset>
        
        <p><button>Отправить данные</button></p>
    </form>
</body>
</html> 